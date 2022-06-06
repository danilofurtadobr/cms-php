<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>SCC</title>
</head>
<body> -->

    <form class="form-login" action="/login" method="post">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-molecule mr-2"></i>
                <span class="font-weight-light">Sistema</span>
                <span class="font-weight-bold ml-1">Casa de Caridade</span>
                <i class="icofont-network ml-2"></i>
            </div>
            <div class="card-body">
                <?php echo getFlash('message') ?>
                <div class="form-group">
                    <label for="user">Login</label>
                    <input type="user" id="user" name="user"
                        class="form-control"
                        placeholder="Informe o CPF ou CNPJ" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password"
                        class="form-control"
                        placeholder="Informe a senha" autofocus>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Entrar</button>
            </div>
        </div>
    </form>
<!-- 
</body>
</html> -->