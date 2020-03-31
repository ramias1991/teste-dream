<?php
require_once 'Usuario.php';

$usuarios = new Usuario();
$lista = $usuarios->getUsuarios();
$c = 1;
    
?>

<style>
    .cliente h6 {
        cursor: pointer;
        font-size: 18px;
    }
    .arquivos {
        display: none;
    }
    footer {
        height: 50px;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>Cadastro de arquivos</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="mb-5">


    <div class="container mt-5">
        <h1> Cadastro de Arquivos </h1>
        <br/>

    <form method="post" enctype="multipart/form-data" action="adicionar_arquivo.php">
        <select name="cpf_usuario" id="" class="form-control w-50 m-2">
        <option value="">Selecione o Paciente</option>
        <?php
            foreach($lista as $usuario){ ?>
                <option value="<?php echo $usuario['cpf']; ?>"><?php echo $usuario['nome']; ?></option>
            <?php }
        ?>
        </select>
        <input type="file" name="arquivo" class="form-control w-50 m-2" required>
        <input type="submit" value="Enviar" class="btn btn-primary mt-2 m-2">
    </form>

<br><br>

<table class="table table-sm">
    <thead class="thead-dark">
        <tr>
            <th><h5>PACIENTES</h5></th>
        </tr>
    </thead>    
    <?php foreach($lista as $user): ?>
    <tr class="cliente c<?php echo $user['cpf'];?>">
        <td>
            <?php
                echo "<h6>" . $c++ . " - " . $user['nome'] . "</h6>";
                $arquivos = $usuarios->getArquivos($user['cpf']);
                echo "<ol class='arquivos' cpf='c".$user['cpf']."'>";
                if(count($arquivos) > 0){
                foreach($arquivos as $arquivo): ?>
                        <li>
                            <?php 
                                echo $arquivo['nome'] . '<a target="_blanck" href="abrir_arquivo.php?id_arquivo=' . $arquivo["id"] . '"> [ Visualizar ]</a> ';
                                $tipo = explode("/", $arquivo['mimetype']);
                                echo '<a target="_blanck" href="abrir_arquivo.php?id_arquivo=' . $arquivo["id"] . ' download=' . $arquivo['nome'] . '.' . $tipo[1] . '"> [ Download ]</a> ';
                            ?>
                        </li>
                <?php endforeach;
                } else {
                    echo "[ NENHUM ARQUIVO ]";
                }
                echo "</ol>";
            ?>
                
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<script>
    var clientes = document.querySelectorAll('tr.cliente')
    clientes.forEach(cli=>{
        cli.addEventListener('click', e => {
            var classes = cli.className
            cpf = classes.split(' ')
            var arquivos = document.querySelector('[cpf=' + cpf[1] + ']')
            console.log(cpf[1])
            if(arquivos.style.display == 'block'){
                arquivos.style.display = 'none';
            } else {
                arquivos.style.display = 'block';
            }
        })
    })
    
</script>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/script-jquery.js"></script>
    <script src="js/script-popper.js"></script>
    <script src="js/script-bootstrap.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
        (function() {
            'use strict'

            if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement('style')
                msViewportStyle.appendChild(
                    document.createTextNode(
                        '@-ms-viewport{width:auto!important}'
                    )
                )
                document.head.appendChild(msViewportStyle)
            }

        }())

    </script>
</div>
    <footer class="bg-dark text-white mt-5 pt-3 fixed-bottom">
        <div class="container">
            <span>Dream Sistemas - <?php echo date("Y"); ?> </span>
        </div>
    </footer>
</body>

</html>
