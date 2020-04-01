<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<?php
require_once 'Usuario.php';
$usuarios = new Usuario();
$usuario = $usuarios->abrirArquivo(16);
$dados = array(
   'cpf_usuario' => $usuario['fk_cpf_login'],
   'arquivo' => $usuario['pdf']
);
if(strlen($usuario['fk_cpf_login']) > 0 && strlen($usuario['pdf']) > 0):
   $iniciar = curl_init();
   curl_setopt($iniciar, CURLOPT_URL, 'https://developer-rsg.000webhostapp.com/teste_dream/adicionar_arquivo_delphi.php');

   curl_setopt($iniciar, CURLOPT_POST, 1);

   curl_setopt($iniciar, CURLOPT_POSTFIELDS, $dados);

   curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

   $resposta = curl_exec($iniciar);

   curl_close($iniciar);

   print_r($resposta);
else:
   echo "<script>alert('Ocorreu um erro! Tente novamente!');</script>";
endif;
?>
</body>
</html>