<?php
  require_once("../../root.php");
  include(Root_path."db_connection/mysqli/conn.php");
  $schoolID = $_POST['schoolID'];

  $query = "SELECT * FROM schools WHERE schoolID=$schoolID";
  $result = $conn->query($query);
 
      if($result->num_rows>0){
        $rows=$result->fetch_array();
      
      }  // if num rows  
      
      $conn->close();
         
      echo json_encode($rows);
                        
    ?>