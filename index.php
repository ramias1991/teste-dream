<?php
require_once "Usuario.php";

if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
    $id = addslashes($_SESSION["id"]);
} else {
    header("Location: login.php");
}
if($_SESSION['id'] == ''){
    $_SESSION['id'] = null;
}

$usuario = new Usuario();
$user = $usuario->getUsuario($id);
$arquivos = $usuario->getArquivos($user['cpf']);
$c = 1;
?>

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

<body class=>

<div class="container">

<h2 class="mt-5">
    <?php
        echo $user['nome'];
        
    ?>
</h2>
<h4 class="mt-5">Arquivos</h4>
<table class='table table-striped table-bordered table-hover mt-4 w-md-100'>
    <thead class='thead-dark'>
        <tr>
            <th>#</th>
            <th>Arquivo</th>
            <th>Ação</th>
        </tr>
</thead>
    <?php
        foreach($arquivos as $arquivo): ?>
            <tr>
                <td><?php echo $c++; ?></td>
                <td>
                    <?php
                        echo $arquivo['nome'];
                        $mimetype = $arquivo['mimetype'];
                        $type = explode("/", $mimetype);
                    ?>
                </td>
                <td>
                    [ <a target="_blanck" href="abrir_arquivo.php?id_arquivo=<?php echo $arquivo["id"];?>">Visualizar</a> ] - 
                    [ <a href="abrir_arquivo.php?id_arquivo=<?php echo $arquivo["id"];?>" download="<?php echo $arquivo['nome'] . "." . $type[1];?>">Download</a> ]
                </td>
            </tr>
        <?php endforeach; ?>
</table>

<a href="logout.php" class="btn btn-danger mt-5">Sair</a>

</div>

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
</body>

</html>
