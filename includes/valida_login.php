<?php
//se não existir sessao retorna a tela de login
if(!$_SESSION['usuario']){
  header('location:index.php');
}
//se não existir sessao inicia a sessão
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>