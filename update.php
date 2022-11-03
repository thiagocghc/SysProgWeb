<?php
//conecta no banco
include './includes/connect.php';
//busca o ID para atalizar
$id = $_GET['updateid'];
//seleciona os dados do ID
$sql = "SELECT * FROM `cadastro` WHERE id=$id";
//executa a query
$result = mysqli_query($con, $sql);
//trnasforma o resulta em array e armazena na var linha
$row = mysqli_fetch_assoc($result);
//atribui na variavel nome o valor que vem da tabela
$nome = $row['nome'];
$email = $row['email'];
$telefone = $row['telefone'];
$senha = $row['senha'];

if (isset($_POST['botaoAtualizar'])) {
  //recebe os dados dos inputs via POST e armazena em cada variável
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['fone'];
  $senha = md5($_POST['senha']);
  //monta o SQL para atualizar os dados no banco
  $sql = "UPDATE `cadastro` SET nome='$nome',email='$email',telefone='$telefone',senha='$senha' WHERE id=$id";
  //executa a query
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "Dados atualizados com sucesso!!";
    //header('location:mostrar.php');
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

  <title>Crud Completo</title>
</head>

<body>

  <div class="container my-5">
    <h1>Cadastro</h1>
    <form method="post">
      <div class="form-group my-2">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" autocomplete="off" value="<?php echo $nome; ?>">
      </div>

      <div class="form-group my-2">
        <label for="email">email</label>
        <input type="email" name="email" class="form-control" placeholder="Digite seu email" autocomplete="off" value="<?php echo $email; ?>">
      </div>

      <div class="form-group my-2">
        <label for="fone">Telefone</label>
        <input type="fone" name="fone" class="form-control" placeholder="Digite seu telefone" autocomplete="off" value="<?php echo $telefone; ?>">

        <div class="form-group my-2">
          <label for="senha">senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Digite seu senha" autocomplete="off" value="<?php echo $senha; ?>">

        </div>
        <button type="submit" name="botaoAtualizar" class="btn btn-primary"> Atualizar </button>
    </form>

  </div>



</body>

</html>