<?php
session_start();
include './includes/connect.php';

if (isset($_POST['botaoLogar'])) {

  $usuario = mysqli_real_escape_string($con, $_POST['login']);
  $senha = md5(mysqli_real_escape_string($con, $_POST['senha']));
  //testes com variáveis estáticas--------
  //$id = 1;
  //$usuario = "thiagoalmeida@live.com";
  //$senha = 6565;
  //$sql = "SELECT * FROM `cadastro`";
  //$sql = "SELECT * FROM `cadastro` WHERE id=$id";
  $sql = "SELECT * FROM `cliente` WHERE email LIKE '$usuario' and senha='$senha'";

  $result = mysqli_query($con, $sql);
  //var_dump($result);
  $row = mysqli_num_rows($result);

  if ($row == 1) {
    //echo "OK";
    while ($row = mysqli_fetch_assoc($result)) {
      //pegando o nome do usuário------
      $nome = $row['nome'];
      //echo $nome;
    }
    $_SESSION['usuario'] = $nome;
    //header('location:painel.php');
    header('location:lista_cliente_admin.php');
    exit();
  } else {
    //echo "Erro aoo efetuar Login!";
    header('location:index.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/login.css" />

  <title>Document</title>
</head>

<body>
  <div class="container col-11 col-md-9" id="form-container">
    <div class="row align-items-center gx-5">
      <div class="col-md-6 order-md-2">
        <h2>Faça o login</h2>
        <form method="POST">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="login" name="login" placeholder="Digite seu email" />
            <label for="login" class="form-label">Digite o seu email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="senha" name="senha" placeholder="digite sua senha" />
            <label for="senha" class="form-label">Digite a sua senha</label>
          </div>
          <input type="submit" class="btn btn-primary" name="botaoLogar" value="entrar" />
        </form>
      </div>

      <div class="col-md-6 order-md-1">
        <div class="col-12">
          <img class="img-fluid" src="login.svg" alt="Entrar no sistema" />
        </div>
        <div class="col-12" id="link-container">
          <a href="cadastro.php">Cadastre-se</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>