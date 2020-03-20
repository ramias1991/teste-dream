<?php
$iniciar = curl_init();
curl_setopt($iniciar, CURLOPT_URL, 'http://localhost/projetos/teste_dream/adicionar_arquivo_delphi.php');

$dados = array(
   'cpf_usuario' => '12345678900',
   'arquivo' => 'C:/xampp/tmp/phpCD91.tmp'
);

curl_setopt($iniciar, CURLOPT_POST, 1);

curl_setopt($iniciar, CURLOPT_POSTFIELDS, $dados);

curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($iniciar);

curl_close($iniciar);

print_r($resposta);