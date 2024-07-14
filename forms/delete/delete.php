<?php

$id = $_GET['id'];
$database_username = 'root';
$database_password = '';
$pdo_conn = new PDO( 'mysql:host=localhost;dbname=eglise_db', $database_username, $database_password );

//delete
$pdo_statement=$pdo_conn->prepare("DELETE FROM users WHERE userID=".$id."");
$pdo_statement->execute();

echo "<script>
         window.location.href = '../../dashboard.php';
      </script>";
?>