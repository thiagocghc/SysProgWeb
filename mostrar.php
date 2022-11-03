<?php
include './includes/connect.php';
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



  <div class="container">

    <div class="row justify-content-between">
      <div class="col-2">
        <button class="btn btn-primary my-5">
          <a class="text-light" href="user.php"> Adicionar usuarios</a>
        </button>
      </div>
      <div class="col-1">
        <button class="btn btn-primary my-5">
          <a class="text-light" href="user.php">Voltar</a>
        </button>
      </div>
    </div>

    <div class="row">

      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#Id</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Telefone</th>
              <th scope="col">Senha</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <?php
          $sql = "SELECT * FROM `cliente`";
          $result = mysqli_query($con, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $nome = $row['nome'];
              $email = $row['email'];
              $telefone = $row['telefone'];
              $senha = $row['senha'];
              echo '
                              <tr>
                                <td>' . $id . '</td>
                                <td>' . $nome . '</td>
                                <td>' . $email . '</td>
                                <td>' . $telefone . '</td>
                                <td>' . $senha . '</td>
                                <td><button class="btn btn-primary">
                                <a class="text-light" href="update.php?updateid=' . $id . '"> <i class="bi bi-pencil-square"></i> </a>
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

</body>

</html>