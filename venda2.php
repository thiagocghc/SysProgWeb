<?php
session_start();
include './includes/connect.php';
include './includes/valida_login.php';

if (isset($_POST['botaoEnviar'])) {

  $vendedor = $_POST['vendedor'];
  $data = $_POST['data'];
  //$cpf = $_POST['cpf'];
  $codcli = $_POST['codcli'];
  //$email = $_POST['email'];
  $codprod = $_POST['codprod'];
  $descprod = $_POST['search_prod'];
  $qtde = $_POST['qtde'];
  $preco_unit = $_POST['preco'];
  $total = $_POST['total'];

  $sql = "INSERT INTO venda VALUES ('','$codcli','$data','$total','$vendedor')";
  $result = mysqli_query($con, $sql);

  $idVenda = mysqli_insert_id($con);
  //var_dump($recuperaId);

  $sql2 = "INSERT INTO item_venda VALUES ('','$codprod','$idVenda','$qtde','$preco_unit','$total')";
  $result2 = mysqli_query($con, $sql2);

  if ($result && $result2) {
    echo '<script language="javascript">';
    echo 'alert("Venda cadastrada com Sucesso!!")';  //not showing an alert box.
    echo '</script>';
  } else {
    die(mysqli_error($con));
  }
}

include './includes/head.php';
include './includes/jumbotron.php';
?>

<div class="row mt-4">
  <div class="col-12 text-center">
    <h2>Cadastrar Venda</h2>
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

  <form method="post">

    <div class="row mb-4">
      <div class="form-group col-6 my-2 mb-3">
        <label for="cpf">Buscar Cliente</label>
        <input class="form-control col-6" id="search_box" name="search_box" placeholder="Buscar Cliente" type="text" onkeyup="javascript:load_data(this.value)" />
        <span id="search_result" name="search_result"></span>
        <input type="hidden" id="codcli" name="codcli" value="">
      </div>

      <div class="form-group col-3 my-2">
        <label for="vendedor">Cód. Vendedor</label>
        <input class="form-control col-6" id="vendedor" name="vendedor" placeholder="Cód. Vendedor" type="text" />
      </div>

      <div class="form-group col-3 my-2">
        <label for="data">Data</label>
        <input class="form-control col-6" id="data" name="data" placeholder="MM/DD/YYY" type="date" />
      </div>

    </div>

    <div class="row">

      <div class="form-group col-1 my-2">
        <label for="codprod">Cód</label>
        <input class="form-control col-6" id="codprod" name="codprod" placeholder="Cod. Produto" type="text" />
      </div>

      <div class="form-group col-6 mb-5 my-2">
        <label for="descprod">Buscar Produto</label>
        <input class="form-control col-6" id="search_prod" name="search_prod" placeholder="Descrição do Produto" type="text" onkeyup="javascript:load_prod(this.value)" />
        <span id="result_prod" name="result_prod"></span>
      </div>

      <div class="form-group col-1 my-2">
        <label for="qtde">Qtde</label>
        <input class="form-control col-6" id="qtde" name="qtde" type="number" />
      </div>

      <div class="form-group col-2 my-2">
        <label for="preco">Preço</label>
        <input class="form-control col-6" id="preco" name="preco" placeholder="R$" type="number" />
      </div>

      <div class="form-group col-2 my-2">
        <label for="total">Total</label>
        <input class="form-control col-6" id="total" name="total" onclick="calculaValor()" placeholder="R$" type="number" />
      </div>


    </div>

    <button type="submit" name="botaoEnviar" class="btn btn-primary"> Cadastrar </button>
  </form>
</div>

</div>

</div>

<script>
  function calculaValor() {
    var valor = document.getElementById("preco").value;
    var qtde = document.getElementById("qtde").value;

    var valor_total = valor * qtde;

    document.getElementById('total').value += valor_total;
  }

  function select_data(event) {

    var data = event.textContent;
    document.getElementsByName('search_box')[0].value = data;
    document.getElementById('search_result').innerHTML = '';
  }

  function select_prod(event) {

    var data = event.textContent;
    document.getElementsByName('search_prod')[0].value = data;
    document.getElementById('result_prod').innerHTML = '';
  }

  function load_data(query) {
    if (query.length > 2) {

      var form_data = new FormData();
      form_data.append('query', query)

      var ajax_request = new XMLHttpRequest();

      ajax_request.open('POST', 'process_search.php');

      ajax_request.send(form_data);

      ajax_request.onreadystatechange = function() {
        if (ajax_request.readyState == 4 && ajax_request.status == 200) {
          var response = JSON.parse(ajax_request.responseText);

          var html = '<div class="list-group">';

          if (response.length > 0) {

            for (var cont = 0; cont < response.length; cont++) {
              html += '<a href="#" class="list-group-item list-group-item-action" onclick="select_data(this)">' + response[cont].nome + '</a>';

              document.getElementById("codcli").value = response[cont].id;
            }

          } else {
            html += '<a href="#" class="list-group-item list-group-item-disabled">Cliente não encontrado </a>';
          }

          html += '</div>';

          document.getElementById('search_result').innerHTML = html;
        }
      }


    } else {
      document.getElementById('search_result').innerHTML = '';
    }
  }

  function load_prod(prod) {
    if (prod.length > 2) {

      var form_data = new FormData();
      form_data.append('prod', prod)

      var ajax_request2 = new XMLHttpRequest();

      ajax_request2.open('POST', 'process_search_prod.php');

      ajax_request2.send(form_data);

      ajax_request2.onreadystatechange = function() {
        if (ajax_request2.readyState == 4 && ajax_request2.status == 200) {
          var response = JSON.parse(ajax_request2.responseText);

          var html = '<div class="list-group">';

          if (response.length > 0) {

            for (var cont = 0; cont < response.length; cont++) {

              //console.log("entrou")
              html += '<a href="#" class="list-group-item list-group-item-action" onclick="select_prod(this)">' + response[cont].nome_prod + '</a>';

              document.getElementById("codprod").value = response[cont].id_prod;
              document.getElementById("preco").value = response[cont].preco;

            }

          } else {
            html += '<a href="#" class="list-group-item list-group-item-disabled">Produto não encontrado </a>';
          }
          html += '</div>';

          document.getElementById('result_prod').innerHTML = html;
        }
      }

    } else {
      document.getElementById('result_prod').innerHTML = '';
    }
  }
</script>

<?php include './includes/footer.php'; ?>