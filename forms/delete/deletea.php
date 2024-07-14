<?php


$database_username = 'root';
$database_password = '';
$pdo_conn = new PDO( 'mysql:host=localhost;dbname=eglise_db', $database_username, $database_password );

//delete
$pdo_statement=$pdo_conn->prepare("DELETE FROM archive ");

echo "<script>
         window.comfirm(vous aurez pas assez à vos archives !);
      </script>";
$pdo_statement->execute();

echo "<script>
         window.location.href = '../../dashboard.php';
      </script>";
?>