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
      <h2>Relatório de Vendas</h2>
    </div>
  </div>

  <div class="container mb-4">
    <div class="row align-items-center">
      <div class="col-6 d-flex">
        <button class="btn btn-primary my-3">
          <a class="text-light" href="venda2.php"> <i class="bi bi-plus-circle-fill"></i> Adicionar </a>
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
              <th scope="col">#Cod.</th>
              <th scope="col">Vendedor</th>
              <th scope="col">Qtde. Vendas</th>
              <th scope="col">Total de Vendas</th>
            </tr>
          </thead>

          <?php

          $query = "SELECT vendedor.id_vendedor, vendedor.nome, COUNT(venda.id_vendedor) as qtde, SUM(item_venda.total) as total
            FROM vendedor
            INNER JOIN venda
            ON vendedor.id_vendedor = venda.id_vendedor
            INNER JOIN item_venda
            ON item_venda.id_venda = venda.id_venda
            GROUP BY venda.id_vendedor ASC LIMIT 10";

          //var_dump($query);

          $sql = mysqli_query($con, $query) or die("Erro ao executar a consulta");
          while ($resultado = mysqli_fetch_array($sql)) {
            $id         = $resultado['id_vendedor'];
            $nome       = $resultado['nome'];
            $qtde       = $resultado['qtde'];
            $total      = $resultado['total'];
            //Configuração de Data	
            //$data           = $implantacao;
            //$dateTime       = DateTime::createFromFormat('Y-m-d', $data);
            //$implantacao    = $dateTime->format('d/m/Y');
            $data = "27/09/2002";
            echo "<tr>
												<td>" . $id . "</td>
												<td>" . $nome . "</td>
                        <td>" . $qtde . "</td>
												<td>" . $total . " </td>
											  </tr>";
          }
          ?>
          </tbody>
        </table>
        </form>
      </div>


    </div>

  </div>
</div>

</div>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>

</html>