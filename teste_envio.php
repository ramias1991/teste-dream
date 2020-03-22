<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<?php
if(!empty($_GET['ms'])){
$ms = addslashes($_GET['ms']);
$iniciar = curl_init();
curl_setopt($iniciar, CURLOPT_URL, 'http://sngpc.anvisa.gov.br/ConsultaMedicamento/index.asp');

curl_setopt($iniciar, CURLOPT_POST, 1);

curl_setopt($iniciar, CURLOPT_POSTFIELDS, "NU_REG=$ms");

curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($iniciar);

curl_close($iniciar);

print_r($resposta);
} else {
   echo "<script>alert('MS vazio');</script>";
}
?>

<script>
   var elem = document.querySelector('label b')
   if(elem == undefined){
      alert('Elemento não encontrado')
   } else{
      alert('Elemento Encontrado')
   }
</script>
</body>
</html>