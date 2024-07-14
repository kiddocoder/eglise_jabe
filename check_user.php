

<?php
    if(isset($_POST['login'])){
         
        session_start();
        include("./db_connection/mysqli/conn.php");
     
        $username =$_POST['username'];
        $password=$_POST['password'];
        $email =$_POST['username'];
        $query=mysqli_query($conn,"SELECT * FROM users WHERE us_surname='$username' and us_password='$password' or us_email='$email'");
        
     
        if (mysqli_num_rows($query) == 0){
            $_SESSION['message']="Login Failed. User not Found!";
            header('location:./Authentification.php');
        }
        else{
            $row=mysqli_fetch_array($query);  
            
                $_SESSION['userID']=$row['userID'];
                $_SESSION['username'] = $row['us_name'];
                $_SESSION['surname'] = $row['us_surname'];
                $_SESSION['email'] = $row['us_email'];
                $_SESSION['password'] = $row['us_password'];
                $_SESSION['phone'] = $row['us_phone'];
            

                header('location:./users/home.php');
            }
            
        }
    
?>