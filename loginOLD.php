<?php
 session_start();
 include './includes/connect.php';

      $usuario = mysqli_real_escape_string($con,$_POST['login']);
      $senha = md5(mysqli_real_escape_string($con,$_POST['senha']));
      //testes com variáveis estáticas--------
      //$id = 1;
      //$usuario = "thiagoalmeida@live.com";
      //$senha = 6565;
      //$sql = "SELECT * FROM `cadastro`";
      //$sql = "SELECT * FROM `cadastro` WHERE id=$id";
      $sql = "SELECT * FROM `cadastro` WHERE email LIKE '$usuario' and senha='$senha'";

      $result = mysqli_query($con,$sql);
      //var_dump($result);
      $row = mysqli_num_rows($result);

      if($row==1){
        //echo "OK";
        while($row=mysqli_fetch_assoc($result)){
          //pegando o nome do usuário------
          $nome = $row['nome'];
          //echo $nome;
        }
        $_SESSION['usuario'] = $nome;
        header('location:painel.php');
        exit();
      }
      else{
        //echo "Erro aoo efetuar Login!";
        header('location:index.php');
      }
