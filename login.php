<?php
require_once 'Usuario.php';

if(isset($_POST['cpf']) && !empty($_POST['cpf'])){
    $cpf = addslashes($_POST['cpf']);
    $senha = addslashes($_POST['senha']);
    $usuario = new Usuario();
    $usuario->login($cpf, md5($senha));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-dark">
    
    <div class="container">
        <div class="col-md-6 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h5 class="card-title">Login</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" maxlength="11">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control">
                        </div>
                        <input type="submit" value="Entrar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/script-jquery.js"></script>
    <script src="js/script-popper.js"></script>
    <script src="js/script-bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>
</html>