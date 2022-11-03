<?php
include './includes/connect.php';

if (isset($_POST['query'])) {
  $data = array();

  $filter = mysqli_escape_string($con, $_POST['query']);

  $sql = "SELECT id, nome,email FROM cliente 
          WHERE nome LIKE '%" . $filter . "%'
          ORDER BY id DESC LIMIT 2";

  $result = mysqli_query($con, $sql);

  $replace_text = '<b>' . $filter . '</b>';

  foreach ($result as $row) {
    $data[] = array(
      'id' => str_ireplace($filter, $replace_text, $row["id"]),
      'nome' => str_ireplace($filter, $replace_text, $row["nome"]),
      'email' => str_ireplace($filter, $replace_text, $row["email"])
    );
  }

  echo json_encode($data);
}
