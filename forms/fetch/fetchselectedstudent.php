<?php
  require_once("../../root.php");
  include(Root_path."db_connection/mysqli/conn.php");
  $schoolID = $_GET['id'];
$output=array();
  $query = "SELECT count(*) as total FROM students WHERE schoolID=$schoolID";
  $result = $conn->query($query);
 
      if($result->num_rows>0){
        $row=$result->fetch_array();
        
        $output [] = array(
            "total" =>$row['total']
        );
      
      }  // if num rows  
      
      $conn->close();

 // Envoi des données au format JSON
 header('Content-Type: application/json'); 
      echo json_encode($output);
                        
    ?>