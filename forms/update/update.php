<?php

include("../../db_connection/mysqli/conn.php");

if (isset($_POST['update'])) {
    // Get form data
    $userID = $_POST['userID'];
    $schoolID = $_POST['school'];
    $name = $_POST['name'];
    $telephone = $_POST['phone'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];


    // Update the student record
    $query = "UPDATE users SET  us_name='$name', us_surname='$surname',us_phone=$telephone,schoolID='$schoolID', us_email='$email', us_password='$password', born_day='$day',born_month='$month',born_year='$year' WHERE userID='$userID'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Succesful.'); window.location='../../dashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
        echo 'select school';
    }

    // Close the connection
    $conn->close();
}

// Fetch existing user record
if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    $query = "SELECT * FROM users WHERE userID='$userID'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Store the fetched data into variables
    
        $schoolID = $row['schoolID'];
        $name = $row['us_name'];
        $telephone = $row['us_phone'];
        $surname = $row['us_surname'];
        $email = $row['us_email'];
        $password = $row['us_password'];
        $month = $row['born_month'];
        $day = $row['born_day'];
        $year = $row['born_year'];
    
       
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Users</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: cadetblue;
    font-family: 'Poppins', sans-serif;
}

.container{
    max-width: 700px;
    width: 100%;
    background: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1),
                0px 5px 12px -2px rgba(0, 0, 0, 0.1),
                0px 18px 36px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 10px;
}

.container .title{
    padding: 25px;
    background: #f6f8fa;
}

.container .title p{
    font-size: 25px;
    font-weight: 500;
    position: relative;
}

.container .title p::before{
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 3px;
    background: linear-gradient(to right, #F37A65, #D64141);
}

.user_details{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    padding: 25px;
}

.user_details .input_box{
    width: calc(100% / 2 - 20px);
    margin: 0 0 12px 0;
}

.input_box label{
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
}

.input_box label::after{
    content: " *";
    color: red;
}

.input_box input{
    width: 100%;
    height: 30px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 14px;
    padding-left: 15px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
    background-color: #f6f8fa;
    font-family: 'Poppins', sans-serif;
    transition: all 120ms ease-out 0s;
}

select{
    width: 32%;
    height: 30px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 14px;
    padding-left: 15px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
    background-color: #f6f8fa;
    font-family: 'Poppins', sans-serif;
    transition: all 120ms ease-out 0s;
}


.input_box input:focus,
.input_box input:valid{
    box-shadow: 0px 0px 0px 2px #AC8ECE;
}

form .gender{
    padding: 0px 25px;
}

.gender .gender_title{
    font-size: 20px;
    font-weight: 500;
}

.gender .category{
    width: 80%;
    display: flex;
    justify-content: space-between;
    margin: 5px 0;
}

.gender .category label{
    display: flex;
    align-items: center;
    cursor: pointer;
}

.gender .category label .dot{
    height: 18px;
    width: 18px;
    background: #d9d9d9;
    border-radius: 50%;
    margin-right: 10px;
    border: 4px solid transparent;
    transition: all 0.3s ease;
}

#radio_1:checked ~ .category label .one,
#radio_2:checked ~ .category label .two,
#radio_3:checked ~ .category label .three{
    border-color: #d9d9d9;
    background: #D64141;
}

.gender input{
    display: none;
}

.reg_btn{
    padding: 25px;
    margin: 15px 0;
}

.reg_btn input{
    height: 45px;
    width: 100%;
    border: none;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    background: linear-gradient(to right, #F37A65, #D64141);
    border-radius: 5px;
    color: #ffffff;
    letter-spacing: 1px;
    text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
}

.reg_btn input:hover{
    background: linear-gradient(to right, #D64141, #F37A65);
}

@media screen and (max-width: 584px){

    /* .user_details{
        max-height: 340px;
        overflow-y: scroll;
    } */

    .user_details::-webkit-scrollbar{
        width: 0;
    }

    .user_details .input_box{
        width: 100%;
    }

    .gender .category{
        width: 100%;
    }

}

@media screen and (max-width: 419px){
    .user_details .input_box{
        flex-direction: column;
    }  
     
}
</style>
</head>
<body>
<div class="container">
        <div class="title">
            <p>Update user identities</p>
        </div>

   <form action="./update.php" method="POST">
      
        
            <div class="user_details">
            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                <div class="input_box">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['us_name']); ?>"  required>
                </div>
                <div class="input_box">
                    <label for="username">Surname</label>
                    <input type="text" name="surname" id="surname" value="<?php echo htmlspecialchars($row['us_surname']); ?>" required>
                </div>

                <div class="input_box">
                 <?php
                    // Database connection details
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "eglise_db";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // SQL query to select school names
                    $sql = "SELECT schoolID, school_name FROM schools";

                    $result = $conn->query($sql);

                    // Check if there are any schools
                    if ($result->num_rows > 0) {
                        // Create select dropdown
                        echo '<label for="name">Ecole</label>';
                        echo '<select name="school" class="form-control">';
                        echo '<option value="0">selectionnez son école</option>';
                        // Output school names as options
                        while ($row = $result->fetch_assoc()) {
                           
                            echo '<option value="' . $row["schoolID"] . '">' . $row["school_name"] . '</option>';
                        }
                        
                        echo '</select>';
                    } else {
                        echo "No schools found.";
                    }

                    // Close the connection
                    $conn->close();
                    ?>
                </div>
                <div class="input_box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    
                </div>
                <div class="input_box">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone" id="phone" value="<?php echo $telephone; ?>" required>
                </div>
                <div class="input_box">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" value="<?php echo $password ; ?>"required>
                </div>
                <div class="input_box">
                <label for="birth">Birthday</label>
                <select name="month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="day"></select>
                <select name="year"></select>
                </div>
            </div>
            <div class="reg_btn">
              <input type="submit" value="Update" name="update">
            </div>

        </form>
    </div>

    <!-- Js for year -->
    <script>
        var ysel = document.getElementsByName("year")[0],
        msel = document.getElementsByName("month")[0],
        dsel = document.getElementsByName("day")[0]; for (var i = new Date().getUTCFullYear(); i>=1902; i--){
        var opt = new Option();
        opt.value = opt.text = i;
        ysel.add(opt); } ysel.addEventListener("change",validate_date); msel.addEventListener("change",validate_date);

    function validate_date(){
        var y = +ysel.value, m = msel.value, d = dsel.value;
        if (m === "2")  var mlength = 28 + (!(y & 3) && ((y % 100)!==0 || !(y & 15)));
        else var mlength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][m - 1];
        dsel.length = 0;
        for(var i=1;i<=mlength;i++){    var opt=new Option();   opt.value = opt.text = i;   if(i==d) opt.selected=true;     dsel.add(opt);
        } } validate_date();
    </script>
    
</body>
</html>