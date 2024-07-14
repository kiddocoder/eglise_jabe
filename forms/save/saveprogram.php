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

if (isset($_POST['save'])) {
    // Insert a new student record
    $schoolID = $_POST['school'];
    $chef =$_POST['chef'];
    $chef_vice =$_POST['chef_vice'];
    $secret =$_POST['secret'];
    $secret_vice =$_POST['secret_vice'];
    $chef_task = $_POST['chef_task'];
    $secret_task = $_POST['secret_task'];
    $chef_vice_task = $_POST['chef_vice_task'];
    $secret_vice_task = $_POST['secret_vice_task'];
    $person = $_POST['person'];
    $person_task = $_POST['person_task'];
    $date = $_POST['date'];



    $query = "INSERT INTO programs (schoolID,chef,chef_task	,chef_vice,chef_vice_task,secretaire,secret_task,secret_vice,secret_vice_task,person,person_task,date) 
            VALUES ('$schoolID', '$chef', '$chef_task','$chef_vice','$chef_vice_task', '$secret', '$secret_task', '$secret_vice', '$secret_vice_task','$person','$person_task' ,'$date')";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('successfully added !'); window.location='./../../dashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}

?>