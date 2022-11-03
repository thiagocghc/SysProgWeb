<?php
session_start();
include './includes/connect.php';
include './includes/valida_login.php';
include './includes/head.php';


if (isset($_POST['botaoEnviar'])) {
  $produto = $_POST['produto'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $tipo = $_POST['tipo'];
  $sql = "INSERT INTO `produto`(nome_prod,descricao,preco,tipo) values ('$produto','$descricao',$preco,'$tipo')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    //echo "Dados cadastrados com sucesso!!";
    header('location:lista_produtos.php');
  } else {
    die(mysqli_error($con));
  }
}

include './includes/jumbotron.php';
?>

<div class="container mb-4">
  <div class="row align-items-center">
    <div class="col-6 d-flex">
      <h2>Cadastro de Produtos</h2>
    </div>
    <div class="col-6 d-flex flex-row-reverse"> <a href="lista_produto_admin.php" class="btn btn-primary"> <i class="bi bi-arrow-right-square-fill"></i> Voltar </a></div>
  </div>


  <form method="post">
    <div class="form-group my-2">
      <label for="produto">Produto</label>
      <input type="text" name="produto" class="form-control" placeholder="Nome do produto" autocomplete="off">
    </div>

    <div class="form-group my-2">
      <label for="descricao">Descrição</label>
      <input type="text" name="descricao" class="form-control" placeholder="Descrição do Produto" autocomplete="off">
    </div>

    <div class="row">
      <div class="form-group col-6 my-2">
        <label for="preco">Preço</label>
        <input type="number" name="preco" class="form-control" placeholder="Digite o preço" autocomplete="off">
      </div>

      <div class="form-group col-6 my-2">
        <label for="qtde">Qtde</label>
        <input type="number" name="qtde" class="form-control" placeholder="Quantidade" autocomplete="off">
      </div>
    </div>


    <div class="form-group my-2">
      <label for="tipo">Tipo</label>
      <select class="form-select" name="tipo" aria-label="Default select example">
        <option selected>Selecione o tipo do produto</option>
        <option value="1">Smartphones</option>
        <option value="2">Notebooks</option>
        <option value="3">Monitores</option>
      </select>
    </div>
    <button type="submit" name="botaoEnviar" class="btn btn-primary"> Cadastrar </button>
  </form>
</div>

</body>

</html>