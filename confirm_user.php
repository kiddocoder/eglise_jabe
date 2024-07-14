<?php

include("conn.php");

 // Sanitize user input
$name = $_POST['username'];
$email =  $_POST['useremail'];
$pass =  $_POST['userpassword'];
$number =  $_POST['usernumber'];
$passconfirm = mysqli_real_escape_string($conn, $_POST['confirm_password']);

 if (isset($_POST['signup'])) {

    if ($pass == $passconfirm) {
        // Hash the password for added security
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
         $query = "INSERT INTO users (id,name, email, password) VALUES (null,'name',$number, '$email', '$hashedPass')";
         // Execute the query
        if (mysqli_query($conn, $query)) {
            echo "User added successfully";
          header("location: index.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Password does not match !";
    }
}
 // Close the database connection
mysqli_close($conn,$base_de_donnees);
?>