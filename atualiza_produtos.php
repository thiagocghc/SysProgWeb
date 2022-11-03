<?php
//conecta no banco
include './includes/connect.php';
//busca o ID para atalizar
$id_prod = $_GET['updateid'];
//seleciona os dados do ID

$sql = "SELECT * FROM `produto` WHERE id_prod=$id_prod";
//executa a query
$result = mysqli_query($con, $sql);
//trnasforma o resulta em array e armazena na var linha
$row = mysqli_fetch_assoc($result);
//atribui na variavel nome o valor que vem da tabela
$nome = $row['nome_prod'];
$desc = $row['descricao'];
$preco = $row['preco'];

if (isset($_POST['botaoAtualizar'])) {

  //verifica se o POST está vazio
  if (!empty($_POST['nome_prod']) && !empty($_POST['descricao']) && !empty($_POST['preco'])) {

    //recebe os dados dos inputs via POST e armazena em cada variável
    $nome_prod = $_POST['nome_prod'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
  }

  //monta o SQL para atualizar os dados no banco
  $sql = "UPDATE `produto` SET nome_prod='$nome_prod',descricao='$descricao',preco='$preco' WHERE id_prod=$id_prod";

  //echo var_dump($sql);

  //executa a query
  $result = mysqli_query($con, $sql);
  if ($result) {
    //echo "Dados atualizados com sucesso!!";
    header('location:lista_produto_admin.php');
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
    <h1>Atualizar Produtos</h1>
    <form method="POST">
      <div class="form-group my-2">
        <label for="nome_prod">Produto</label>
        <input type="text" name="nome_prod" class="form-control" autocomplete="off" value="<?php echo $nome; ?>">
      </div>

      <div class="form-group my-2">
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" class="form-control" autocomplete="off" value="<?php echo $desc; ?>">
      </div>

      <div class="form-group my-2">
        <label for="preco">Preço</label>
        <input type="text" name="preco" class="form-control" autocomplete="off" value="<?php echo $preco; ?>">

      </div>
      <button type="submit" name="botaoAtualizar" class="btn btn-primary"> <i class="bi bi-glyphicon-refresh"></i> Atualizar </button>
    </form>

  </div>

</body>

</html>