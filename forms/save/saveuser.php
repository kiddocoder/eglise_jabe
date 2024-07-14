



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
    $name =$_POST['name'];

    $telephone =$_POST['phone'];
    $surname =$_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];


    $query = "INSERT INTO users(schoolID,us_name,us_surname,us_phone ,us_email ,us_password, born_day ,born_month, born_year
        ) 
            VALUES ('$schoolID', '$name', '$surname','$telephone', '$email', '$password', '$day', '$month','$year')";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Bien Ajouté !'); window.location='../../dashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}

?>