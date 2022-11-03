<?php
include './includes/connect.php';

if (isset($_POST['prod'])) {
  $data = array();

  //$filter = "Mon";

  $filter = mysqli_escape_string($con, $_POST['prod']);

  $sql = "SELECT id_prod, nome_prod, preco FROM produto 
          WHERE nome_prod LIKE '%" . $filter . "%'
          ORDER BY id_prod DESC LIMIT 2";

  $result = mysqli_query($con, $sql);

  $replace_text = '<b>' . $filter . '</b>';

  foreach ($result as $row) {
    $data[] = array(
      'id_prod' => str_ireplace($filter, $replace_text, $row["id_prod"]),
      'nome_prod' => str_ireplace($filter, $replace_text, $row["nome_prod"]),
      'preco' => str_ireplace($filter, $replace_text, $row["preco"])
    );
  }

  //var_dump($data);

  echo json_encode($data);
}
