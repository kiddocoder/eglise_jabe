<?php
session_start();
include("./db_connection/mysqli/conn.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Athentification </title>
  
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
        <form action="../check_user.php" method="POST">
        
        <center><img src="./images/images/diva.jpeg"></center>
    <br>
    <center><p style="color:blue;font: size 5px;"> ISHURE RY'ISABATO</p> 
    <h4 class="red">
        <?php
            if (isset($_SESSION['message'])){
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
         ?>
        </h4>
            <center><input class="form-control" type="text" name="username" placeholder="Enter Username"><br><br>
            <input class="form-control" type="password" name="password" placeholder="Password"> <br><br>
            <input class=" btn btn-success" type="submit" name="login" value="Log in " >
          </center>
               <center><a href="recover.php" class="recover"><h3>Forgot Password?</h3></a></center><br>
           
        </form>
    </div>
 <div class="col-sm-4"></div>
 </div>
 </div>
</body>
</html>