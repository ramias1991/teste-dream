<?php 
session_start();
require_once 'Conexao.php';

class Usuario extends Conexao{
    
    public function login($cpf, $senha){
        $sql = "SELECT * FROM usuario WHERE cpf = :cpf";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = "SELECT * FROM usuario WHERE cpf = :cpf AND senha = :senha";
            $sql = $this->Conectar()->prepare($sql);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if($sql->rowCount() > 0){
                $usuario = $sql->fetch();
                $_SESSION['id'] = $usuario['id'];
                header('Location: index.php');
            } else {
                echo "<script>";
                echo "alert('Senha inconrreta!!');";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "alert('CPF não encontrado!');";
            echo "</script>";
        }
    }

    public function verificarUsuario($cpf){
        $sql = "SELECT * FROM usuario WHERE cpf = :cpf";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getUsuarios(){
        $sql = "SELECT * FROM usuario";
        $sql = $this->Conectar()->query($sql);

        $array = array();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
            return $array;
        }
    }

    public function getUsuario($id){
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        }
    }

    public function getArquivos($cpf){
        $sql = "SELECT * FROM arquivo WHERE fk_cpf_login = :cpf";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();
        
        $array = array();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else {
            echo "[ NENHUM ARQUIVO ENCONTRADO! ]";
        }
        
        return $array;
    }

    public function abrirArquivo($id){
        $sql = "SELECT * FROM arquivo WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            return $array;
        } else {
            echo "[ NENHUM ARQUIVO ENCONTRADO! ]";
        }
    }

    public function verificarQtdArquivoCpf($cpf){
        $sql = "SELECT * FROM arquivo WHERE fk_cpf_login = :cpf";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();
        return $sql->rowCount();
    }

    public function salvarArquivo($cpf, $arquivo, $mimetype, $nomeArquivo){
        
        $nr_i = $this->verificarQtdArquivoCpf($cpf);
        
        if(strlen($cpf) > 0 && $this->verificarUsuario($cpf)){
            $sql = "INSERT INTO arquivo (fk_cpf_login, pdf, mimetype, nome) VALUES(:cpf, :pdf, :mimetype, :nome)";
            $sql = $this->Conectar()->prepare($sql);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindParam(":pdf", $arquivo, PDO::PARAM_LOB);
            $sql->bindValue("mimetype", $mimetype);
            $sql->bindValue(":nome", $nomeArquivo);
            $sql->execute();

            $nr_d = $this->verificarQtdArquivoCpf($cpf);
            if($nr_i == $nr_d){
                echo "<script>";
                echo "alert('Erro ao enviar o arquivo, tente novamente!');";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert('Arquivo inserido com sucesso!');";
                echo "</script>";
            }
            echo "<script>";
            //echo "location.href = 'enviar.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Nenhum paciente selecionado!');";
            //echo "location.href = 'enviar.php';";
            echo "</script>";
        }

    }
}