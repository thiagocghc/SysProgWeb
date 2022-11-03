<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->

    <?php include './includes/menu.php'; ?>

    <!-- Page content-->
    <div class="jumbotron light mb-4">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h1 class="display-3">Sistema Prog Web!</h1>
            <p>Sistema completo com Bootstrap, PHP 7.1 e conexão com o banco de dados MYSQL.</p>
          </div>
          <div class="col-6 d-flex align-items-center justify-content-end">
            <h3 class="text-primary"> Olá, <?php echo $_SESSION['usuario']; ?> </h3>
          </div>
        </div>
      </div>
    </div>