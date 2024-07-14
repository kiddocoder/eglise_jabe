<?php

include ("../../db_connection/mysqli/conn.php");
$valid['success'] = array('success' => false, 'messages' => array());
if ($_POST) {
    // Get form data
    $schoolID = $_POST['schoolID'];
    $namechef = $_POST['name'];
    $namesecret = $_POST['surname'];
    $telchef = $_POST['telchef'];
    $telsecret = $_POST['telsecret'];
    $name = $_POST['school'];

    

    // Update the student record
    $query = "UPDATE schools SET school_name='$name', chef='$namechef',secretaire='$namesecret',telchef='$telchef', telsecret='$telsecret' where schoolID='$schoolID'";
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
?>
