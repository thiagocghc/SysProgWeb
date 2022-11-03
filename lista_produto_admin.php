<?php
session_start();
include './includes/connect.php';
include './includes/valida_login.php';
include './includes/head.php';
include './includes/jumbotron.php';
?>
<!-- BusCA DADOS nO BANCO -->

<div class="container">

  <div class="row mt-4">
    <div class="col-12 text-center">
      <h2>Produtos</h2>
    </div>
  </div>

  <div class="container mb-4">
    <div class="row align-items-center">
      <div class="col-6 d-flex">
        <button class="btn btn-primary my-3">
          <a class="text-light" href="produto.php"> <i class="bi bi-plus-circle-fill"></i> Adicionar </a>
        </button>
      </div>
      <div class="col-6 d-flex flex-row-reverse">

        <button class="btn btn-primary my-3">
          <a class="text-light" href="produto.php">Voltar</a>
        </button>

      </div>
    </div>

    <div class="row">

      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#Id</th>
              <th scope="col">Produto</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Qtde</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <?php
          $sql = "SELECT * FROM `produto`";
          $result = mysqli_query($con, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id_prod'];
              $produto = $row['nome_prod'];
              $descricao = $row['descricao'];
              $preco = $row['preco'];
              $tipo = $row['tipo'];
              echo '
                              <tr>
                                <td>' . $id . '</td>
                                <td>' . $produto . '</td>
                                <td>' . $descricao . '</td>
                                <td>' . $preco . '</td>
                                <td>' . $tipo . '</td>
                                <td><button class="btn btn-primary">
                                <a class="text-light" href="atualiza_produtos.php?updateid=' . $id . '"> <i class="bi bi-pencil-square"></i> </a>
                              </button>
                              <button class="btn btn-danger">
                                <a class="text-light" href="delete.php?deleteid=' . $id . '"> <i class="bi bi-x-square-fill"></i> </a>
                              </button></td>
                              </tr>';
            }
          }
          ?>

        </table>
      </div>
    </div>
  </div>

</div>
</div>


</div>

<?php include './includes/footer.php'; ?>