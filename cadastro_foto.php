<?php
include './includes/connect.php';

if (isset($_POST['botaoEnviar'])) {

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['fone'];
  $senha = md5($_POST['password']);
  $tipo = "user";
  //recebendo a foto
  $arquivo = $_FILES['foto'];
  //var_dump($_FILES['foto']);
  if ($arquivo['error']) die("falha ao enviar arquivo!!");
  //definindo o enderço
  $pasta = "./uploads/fotos/";
  //recebendo o nome do arquivo
  $nome_arquivo = $arquivo['name'];
  //renomeando o arquivo
  $new_name = uniqid();
  //armazenando a extensao
  $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
  //verificando a extensão do arquivo é permitida
  if ($extensao != "jpg" && $extensao != "png") die("falha ao enviar arquivo!!");
  //criando o caminho
  $path = $pasta . $new_name . "." . $extensao;
  //salvando o arquivo na pasta local do servidor
  $foto = move_uploaded_file($arquivo['tmp_name'], $path);

  //log do sistema
  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d/m/Y H:i');
  //echo $date . "<br><br>";
  $log = $date;

  $sql = "INSERT INTO `cliente` values ('','$nome','$email','$telefone','$senha','$tipo','$log','$path')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    //echo "Dados cadastrados com sucesso!!";
    header('location:lista_cliente_foto.php');
  } else {
    die(mysqli_error($con));
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- JavaScript -->

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous" defer></script>

  <!-- CSS Interno -->
  <link rel="stylesheet" href="./style2.css">

  <title>Sistema Prog Web 2022</title>
</head>

<body>

  <div class="jumbotron light mb-4">
    <div class="container">
      <h1 class="display-3">Sistema Prog Web!</h1>
      <p>Sistema completo com Bootstrap, PHP 7.1 e conexão com o banco de dados MYSQL.</p>
    </div>
  </div>

  <div class="container my-5">
    <h1>Cadastre-se</h1>
    <form method="POST" action="" enctype="multipart/form-data">
      <input type="hidden" name="tipo" id="tipo" value="user">

      <div class="row">

        <div class="form-group col-4 my-2">
          <label for="nome">Foto</label>
          <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group col-8 my-2">
          <label for="nome">Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-4 my-2">
          <label for="nome">Telefone</label>
          <input type="text" name="fone" class="form-control" placeholder="Digite seu telefone" autocomplete="off">
        </div>

        <div class="form-group col-8 my-2">
          <label for="email">Login</label>
          <input type="email" name="email" class="form-control" placeholder="Digite seu email" autocomplete="off">
        </div>

      </div>


      <div class="row">
        <div class="form-group col-6 my-2">
          <label for="senha">Senha</label>
          <input type="password" name="password" class="form-control" placeholder="Digite sua senha" autocomplete="off">
        </div>

        <div class="form-group col-6 my-2">
          <label for="senha">Repita a Senha</label>
          <input type="password" name="confirmpassword" class="form-control" placeholder="Confirme sua senha" size="32" maxlength="32" autocomplete="off">
        </div>

      </div>
      <button type="reset" name="cancelar" class="btn btn-danger"> Cancelar </button>
      <button type="submit" name="botaoEnviar" class="btn btn-primary"> Cadastrar </button>
    </form>

  </div>
</body>

</html>