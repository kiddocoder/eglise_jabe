<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Recover password </title>
  
 <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">
    <!--bootstrap5 library linked-->

  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">

  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <link rel="shortcut icon" href="./images/images/diva.jpeg" type="image/x-icon">
  <!--custom style-->

  <style type="text/css">
   .registration-form{
      background: #f7f7f7;
      padding: 20px;
     
      margin: 55px 0px;
    }
    .err-msg{
      color:red;
    }
    .registration-form form{
      border: 1px solid #e8e8e8;
      padding: 10px;
      background: #f3f3f3;
    }
    body{

    background-image: url('/images/images/background.webp');

    
  }
img{
   margin-top: 10px;
   width: 90px;
   height: 90px;
   border: 1px solid black;
   border-radius: 90px;
 }
    @media (max-width: 412px) {
      .text-center img{
        width: 100px;
      }
   }

   .btn{
    margin-top: 5px;
    width: 100%;
   }

   .red{
        color: red;
        margin: 0px;
   }
   button{
     border:1px solid white ;
     border-radius: 10px;
     background-color: grey;
     color:white;
     border: 1px solid white ;
   }
   .control{
     display: flex;
   }
  .control input[type=number]{
    align-items: center;
  }
  .row{
    margin-top: auto;
  }
  a{
    text-decoration: none;
  }
  </style>
</head>
<body>
 
 <div class="row">
   <div class="col-sm-4">
     
   </div>
   <div class="col-sm-4">
     <div class="registration-form">
   <center><h3>Recover your password</h3></center>
            <center><input class="form-control" type="email" name="useremail" placeholder="Enter Your E-mail" required><br>
            <input class="form-control" type="number" name="usernumber" placeholder="Enter your Phone Number"> <br>
            <input class=" btn btn-success" type="submit" name="recover" value="Recover " ></center>
            <?php
session_start(); // Start the session
include("db_connection/mysqli/conn.php"); // Include your database connection file
 if (isset($_POST['login'])) {
    // Check if the email and password keys are set
    if (isset($_POST['username']) && isset($_POST['userpassword'])) {
        // Sanitize user input
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['userpassword']);
         // Query the database
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];
             // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Password is correct, set session variables
                $_SESSION['name'] = $row['name'];
                $_SESSION['password'] = $storedPassword;
                 // Redirect to the welcome page
                header("Location: home.php");
                exit();
            } else {
                // Password is incorrect
                echo "Incorrect password. Please try again.";
            }
        } else {
            // User not found
            echo "User not found. Please check your name.";
        }
    } else {
        // Handle the case when email or password is not set
        echo "Please provide both username and password.";
    }
}
 // Close the database connection
mysqli_close($conn);
?>
               
        </form>
    </div>
 <div class="col-sm-4"></div>
 </div>
 </div>
</body>
</html>