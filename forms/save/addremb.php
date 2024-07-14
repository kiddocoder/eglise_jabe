<?php

include ("../../db_connection/mysqli/conn.php");
$valid['success'] = array('success' => false, 'messages' => array());
if ($_POST) {
    // Get form data
   $remb= $_POST['rembour'];
   $cmdID=$_POST['cmdID'];
   $dateremb= date('Y-m-d');
$req = "SELECT rembours FROM commandes WHERE cmdID='$cmdID'";
$result= $conn->query($req);

$row = $result->fetch_array();
  $remb= $remb+$row[0];
    // Update the commandes record
    $query = "UPDATE commandes SET rembours = '$remb', date_remb ='$dateremb' WHERE cmdID='$cmdID'";
    if($conn->query($query) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Updated";	
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while Updating school";
    }
    
       
}

 // Close the connection
 $conn->close();
 
  echo json_encode($valid);  
 