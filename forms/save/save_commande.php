<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eglise_db";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);
$valid['success'] = array('success' => false, 'messages' => array());
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST) {
    // Get form data
    $school = $_POST['school'];
    $pu=$_POST['pu'];
    $payer=$_POST['payer'];
    $qte=$_POST['qte'];

    // Insert a new class record
    $query = "INSERT INTO commandes (schoolID,Nbre_Livre,pu,payer,date_remb) VALUES ('$school', '$pu','$qte','$payer','')";
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