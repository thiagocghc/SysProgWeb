<?php 
  include './includes/connect.php';
  if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid']; 
    $sql = "DELETE FROM `cadastro` WHERE id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
      //echo "Cadastro deletado com sucesso!!";
      header('location:mostrar.php');
    }else{
      die(mysqli_error($con));
    }
  }
