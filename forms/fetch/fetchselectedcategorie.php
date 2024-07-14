<?php
  require_once("../../root.php");
  include(Root_path."db_connection/mysqli/conn.php");
 $output = array();
 $selectedcategories = explode(',',$_GET['categorie']);
 $wherelcause = '';
 $output = [];
 foreach($selectedcategories as $categories){
 $agerange= explode('-',$categories);
 $minage = $agerange[0];
 $maxage = isset($agerange[1]) ? $agerange[1] : 800;
  if($maxage){
     $wherelcause.="OR (DATEDIFF(NOW(),date_naissance)/365) BETWEEN $minage AND $maxage " ;
 
  }else{
     $wherelcause.="OR (DATEDIFF(NOW(),date_naissance)/365)>= $minage ";
  }
 }
 $wherelcause='WHERE'.ltrim($wherelcause,'OR');
 $query = "SELECT count(*) as total FROM students $wherelcause";
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