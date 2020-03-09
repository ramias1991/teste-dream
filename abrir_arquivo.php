<?php
require_once 'Usuario.php';

$usuario = new Usuario();

if(isset($_GET['id_arquivo']) && !empty($_GET['id_arquivo'])){
	$id_arquivo = addslashes($_GET['id_arquivo']);
	$arquivo = $usuario->abrirArquivo($id_arquivo);
	$doc = $arquivo['pdf'];
	$tipo = $arquivo['mimetype'];


	header("Content-type: $tipo");
	echo $doc;
}

?>