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
    $name = $_POST['name'];
    $namesecret = $_POST['surname'];
    $telchef = $_POST['telchef'];
    $telsecret = $_POST['telsecret'];
    $school = $_POST['school'];

    // Insert a new class record
    $query = "INSERT INTO schools (school_name,chef,secretaire,telchef,telsecret) VALUES ('$school', '$name','$namesecret','$telchef','$telsecret')";
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