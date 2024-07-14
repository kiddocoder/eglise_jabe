<?php
session_start(); // Start the session
include("conn.php"); // Include your database connection file
 if (isset($_POST['login'])) {
    // Check if the email and password keys are set
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Sanitize user input
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
         // Query the database
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];
             // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Password is correct, set session variables
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['name'];
                $_SESSION['password'] = $storedPassword;
                 // Redirect to the welcome page
                header("Location: welcome.php");
                exit();
            } else {
                // Password is incorrect
                echo "Incorrect password. Please try again.";
            }
        } else {
            // User not found
            echo "User not found. Please check your email.";
        }
    } else {
        // Handle the case when email or password is not set
        echo "Please provide both email and password.";
    }
}
 // Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
</head>
<body>
  <h2>Login Form</h2>
  <form action="" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <input type="submit" value="Login" name="login">
  </form>
</body>
</html>