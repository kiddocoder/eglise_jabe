<?php

include ("../../db_connection/mysqli/conn.php");
$valid['success'] = array('success' => false, 'messages' => array());
if ($_POST) {
    // Get form data
    $schoolID = $_POST['school'];
    $studentID = $_POST['studentID'];
    $name =$_POST['name'];
    $date =$_POST['age'];
    $telephone =$_POST['telephone'];
    $surname =$_POST['surname'];
    $commune = $_POST['commune'];
    $quarter = $_POST['qua'];
    $street = $_POST['av'];
    $street_number = $_POST['numav'];

    

    // Update the student record
    $query = "UPDATE students SET schoolID='$schoolID', surname='$surname',telephone='$telephone',commune='$commune', quarter='$quarter',street= '$street',street_number='$street_number', date_naissance='$date' where studentID='$studentID'";
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
 