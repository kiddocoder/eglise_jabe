<?php 

   session_start();
   $message="";

   if(count($_POST)>0){
       $con=mysqli_connect('127.0.0.1:3306', 'root','', 'eglise_db') or die('Enable to connect');
       $resultat= mysqli_query($con, "SELECT * FROM admins WHERE adminEmail='".$_POST['email']."' AND password='".$_POST['pass']."' ");
       $row= mysqli_fetch_array($resultat);
        
       if (is_array($row)) {

        $_SESSION['adminID'] = $row['adminID'];
        $_SESSION['emailAd'] = $row['adminEmail'];
        $_SESSION['nameAd'] = $row['adminName'];
        $_SESSION['photoAdmin'] = $row['photoAdmin'];
        if (isset($_SESSION['adminID'])) {
            header("location:dashboard.php");
           }
    
       } 
       
       else {
        $message="Invalid Email or Password";
       }
       
   }
   elseif (isset($_SESSION['adminID'])) {
     header("location:dashboard.php");
   }
   else {
    # code...
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--bootstrap5 library linked-->
  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <link rel="shortcut icon" href="./images/images/admi.png" type="image/x-icon">

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
   body{
    background-image: url('./images/images/IMG-20231015-WA0016.jpg');
    align-items: center;
   }
  </style>
</head>
<body>

<div class="container-fluid">
 <div class="row">
   <div class="col-sm-4">
   </div>
   <div class="col-sm-4">
    
    <!--====registration form====-->
    <div class="registration-form">
      <h4 class="text-center"><img src="./images/images/admi.png" width="100px" alt="Logo"></h4>
      <h4 class="text-center">Admin Login</h4>

      <form action="" method="post">
      <h5>
        <?php if ($message!="") {

            echo("<h6 class='red'>$message</h6>");
        }
        ?>
        </h5>
        <!--// Email//-->
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control"  placeholder="Enter Email" name="email" required>   
        </div>
        
        <!--//Password//-->
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control"  placeholder="Enter Password" name="pass" required>
        </div>

        
        <button type="submit" class="btn btn-success" name="login">Login</button>
      </form>
    </div>
   </div>
   <div class="col-sm-4">
   </div>
 </div>
  
</div>

</body>
</html>