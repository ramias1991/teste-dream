<?php
require_once 'Usuario.php';
$usuarios = new Usuario();

if(isset($_POST['cpf_usuario']) && !empty($_POST['cpf_usuario'])){
    $cpf = addslashes($_POST['cpf_usuario']);
    $mimetype = 'application/pdf';
    $format = explode("/", $mimetype);
    $nomeArquivo = addslashes("Arquivo " . strtoupper($format[1]) . $_POST['cpf_usuario'] . time());
    $arquivo = $_POST['arquivo'];

    //$conteudo = file_get_contents($arquivo);
    $usuarios->salvarArquivo($cpf, $arquivo, $mimetype, $nomeArquivo);
} 