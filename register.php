
<?php 
  session_start();
  require_once("./root.php");
 /* include(Root_path."include/header_admin.php");
 include(Root_path."include/side_bar_admin.php"); */
  include(Root_path."db_connection/mysqli/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  
  body{
    background-image: url('/images/images/background.webp');
    
  }
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
  . control input[type=number]{
    align-items: center;
  }
  .row{
    margin-top: auto;
  }
  </style>

    <title>Create User  Account </title>
</head>
<body>
<?php 

   if (isset($_SESSION['emailAd'])) {
	?>
 <div class="row">
   <div class="col-sm-4">
     
   </div>
   <div class="col-sm-4">
    <div class="registration-form">
   
        <form action="confirm_user.php" method="post">
       <center> <h3 style="color:blue;">Create User Account</h3><br>
            <center>
              <div class="control">
                <button> <i class="fa-solid fa-user"></i></button>
              <input class="form-control" type="text" name="userfirstname" placeholder="Enter User First Name" required></div><br>

                <div class="control">
           <button> <i class="fa-solid fa-user"></i></button>
              <input class="form-control" type="text" name="username" placeholder="Enter Username" required></div><br>
               <div class="control">
                <button> <i class="fa-solid fa-home"></i></button>
              <input class="form-control" type="text" name="userquarter" placeholder="Enter User Quarter" required></div><br>
                 <div class="control">
                <button> <i class="fa-solid fa-school"></i></button>
              <input class="form-control" type="text" name="userschool" placeholder="Enter User School" required></div><br>
                <div class="control">
           <button> <i class="fa-solid fa-book"></i></button>
            <input class="form-control" type="email" name=" useremail" placeholder="Enter User E-mail" required></div><br>
           <div class="control">
           <button> <i class="fa-solid fa-phone"></i></button>
            <input class="form-control" type="number" name=" usernumber" placeholder="Enter User  Phone Number" required></div><br>
              <div class="control">
           <button> <i class="fa-solid fa-pen"></i></button>
            <input class="form-control" type="password" name=" userpassword" placeholder="Enter User Password" required></div><br>
              <div class="control">
           <button> <i class="fa-solid fa-pen"></i></button>
            <input class="form-control" type="password" name=" confirm_password" placeholder="Confirm Password" required></div><br>
            <input class="btn btn-success" type="submit" value="Sign up" name="signup" >
            <center><br><h6></h6></center>
        </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
 </div>
  <?php

	} 
	//else {
	?>
  <script>
	alert("You are not Admin!");
window.location='./index.php';
</script>
<?php
//} 
?>
</body>
</html>