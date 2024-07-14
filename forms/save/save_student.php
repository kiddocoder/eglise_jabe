<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eglise_db";
  
// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
    // Insert a new student record
    $schoolID = $_POST['school'];
    $name =$_POST['name'];
    $age =$_POST['age'];
    $telephone =$_POST['telephone'];
    $surname =$_POST['surname'];
    $commune = $_POST['commune'];
    $quarter = $_POST['qua'];
    $street = $_POST['av'];
    $street_number = $_POST['numav'];


    $query = "INSERT INTO students (schoolID, name, surname,date_naissance,telephone, commune, quarter, street, street_number) 
            VALUES ('$schoolID', '$name', '$surname','$age','$telephone', '$commune', '$quarter', '$street', '$street_number')";

if($conn->query($query) === TRUE) {
    $valid['success'] = true;
    $valid['messages'] = "Successfully Added";	
} else {
    $valid['success'] = false;
    $valid['messages'] = "Error while adding a student";
}

    // Close the connection
    $conn->close();

    echo json_encode($valid);

}

?>