<?php
require_once 'Usuario.php';
$usuarios = new Usuario();

if(isset($_POST['cpf_usuario']) && !empty($_POST['cpf_usuario'])){
    $file = $_FILES['arquivo'];
    $cpf = addslashes($_POST['cpf_usuario']);
    $mimetype = addslashes($file['type']);
    $format = explode("/", $mimetype);
    $nomeArquivo = addslashes("Arquivo " . strtoupper($format[1]) . $_POST['cpf_usuario'] . time());
    $tamanho = $file['size'];
    $arquivo = $file['tmp_name'];
    
    //$fp = fopen($arquivo, "rb");
    //$conteudo = fread($fp, $tamanho);
    //fclose($fp);

    //print_r($file);
    $conteudo = file_get_contents($arquivo);
    $usuarios->salvarArquivo($cpf, $conteudo, $mimetype, $nomeArquivo);
} 