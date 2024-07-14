<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/pdo/conn.php");
?>

<style>
	#modalcontainer{
    display:none;
    position:fixed ;
    top:0;
    left:0;
    width: 100%;
    height:100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 9999;
   }
.modalcontent{
  position: absolute;
    top: 250px;
    left:50%;
  align-items:center ;
      text-align: center ;
    max-width: 700px;
    width: 100%;
    background:cadetblue;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1),
                0px 5px 12px -2px rgba(0, 0, 0, 0.1),
                0px 18px 36px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 10px;
    transform:translate(-50%,-50%);
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

.modalcontainer .title p::before{
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

@media screen and (max-width: 419px){
    .gender .category{
        flex-direction: column;
    }   
}

</style>
<?php 

   if (isset($_SESSION['emailAd'])) {
	?>
    
	<div class="box-container">
			<div class="box box1">
				<div class="text">
                    <?php
					 $req=$conn->query('SELECT count(*) AS total FROM users');

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Totals</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-users"></i>
			</div>

			<div class="box box2">
				<div class="text">
				   <?php
				     $date=date("Y-m-d");
					 $req=$conn->query("SELECT count(*) AS total FROM users WHERE created_at like '%$date%'");

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Today Join</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-users"></i>
			</div>

		
		</div>

		<div class="report-container">
			<div class="report-header">
				<h1 class="recent-Articles">Recent Users</h1>
				<button class="view" id="addproModalBtn" ><img src="./images/images/add.png" alt=""> Add User</button>
			</div>
			
				<!-- Datatable -->
				<div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
					<table class="table table-striped" id="data_tables">
						<thead>
						 <tr>
                            <th>ID</th>
                            <th>school</th>
                            
                            <th>Name</th>
                            <th>Number</th>
                            <th>Email</th>
							<th>birthday</th>
                            <th></th>
                            <th></th>
						</tr>
						</thead>
						<tbody>
						 <?php
						    $req = $conn->query('SELECT * FROM users u,schools s WHERE u.deleted=0 and s.
                            schoolID=u.schoolID');
								?> 		
							<tr>
								<?php
								  
								  while ($fetch = $req->fetch()){ 
								?>
								<td>User <?php echo htmlspecialchars($fetch['userID']);?></td>
								<td><?php echo htmlspecialchars($fetch['school_name']); ?> </td>
                                
                              
								<td><?php echo htmlspecialchars($fetch['us_name']) ?> <?=htmlspecialchars($fetch['us_surname']) ?></td>
								<td><?=htmlspecialchars($fetch['us_phone']);?></td>
								<td><?php echo htmlspecialchars($fetch['us_email']);?></td>
								<td><?php echo htmlspecialchars($fetch['born_day']); ?>-<?=htmlspecialchars($fetch['born_month']); ?>-<?=htmlspecialchars($fetch['born_year']);?></td>
								<td><a href="forms/update/update.php?id=<?=htmlspecialchars($fetch['userID']) ?>" title="Update"><img src="./images/images/edit.png" alt="edit"></a></td>
								<td><a href="forms/delete/delete.php?id=<?=htmlspecialchars($fetch['userID']) ?>" title="Delete" onclick="return window.confirm('Do you want to delete?');"><img src="./images/images/delete.png" alt="delete"></a></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<?php  
	/**
	 * add users form modal here 
	 */
	?>
<div id="modalcontainer">
   <div class="modalcontent">
   <legend>
            <p>Registration</p>
			</legend>
        <form action="forms/save/saveuser.php" method="POST">
            <div class="user_details">
                <div class="input_box">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="input_box">
                    <label for="username">Surname</label>
                    <input type="text" name="surname" id="surname" placeholder="Enter your surname" required>
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
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    <?php if (isset($name_error)): ?>
                        <span style="color:red;"><?php echo $name_error; ?></span>
                    <?php endif ?>
                </div>
                <div class="input_box">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="phone" id="phone" placeholder="Enter your number" required>
                </div>
                <div class="input_box">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
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
            <input type="submit" value="Register" name="save">
			<input type="reset" value="reset">
			<br><br>
            </div>
        </form>
    </div>
</div>

	<div style="margin-top: 25px;">
		<p align="center" class="copyright"><strong>&#169;</strong> Copyright 2022-<?php $date=date("Y"); echo $date;?>.  Developed by Tresor kiddo pro. All Rights Reserved.</p>
	</div>
	
  <?php
	} 
	else {
	?>
  <script>
	alert("You are not Admin!");
	window.location='../index.php';
</script>
<?php
} 
?>

<!-- Datatable js code -->
<script>
        $(document).ready(function () {
            $('#data_tables').DataTable();
        });
    </script>
    <!-- Js for Navbar -->
	<script>
		let menuicn = document.querySelector(".menuicn");
		let nav = document.querySelector(".navcontainer");

		menuicn.addEventListener("click", () => {
			nav.classList.toggle("navclose");
		})
	</script>

<script>
    var modalbtn = document.getElementById('addproModalBtn');
    var modalcontainer = document.getElementById('modalcontainer');
    modalbtn.addEventListener('click',function(){
      modalcontainer.style.display='block';
    });
    modalcontainer.addEventListener('click',function(event){
     if(event.target===modalcontainer){
      modalcontainer.style.display='none';
     }
    });
  
    </script>

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

