<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/pdo/conn.php");
?>

<?php 

   if (isset($_SESSION['emailAd'])) {

	?>
<!DOCTYPE html>
<html>
  <head>
   <!--bootstrap5 library linked-->

  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/fontawesome/css/all.css">

  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <style>
	input{
		width: 40px;

	}
</style>
  </head>
	<body>
		<div class="report-container">
			<div class="report-header">
				<div>
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
					 echo '<select style="width: 350px;" name="school" class="form-control" onchange="loadappels();getabscencebtn();fiche1();fiche2();fiche3();fiche4()">';
					 echo '<option value="0">selectionnez l\'école,puis Appelez!</option>';
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
			<p id="removeProductBtn">
		
				</p>
			<button class="view" onclick="window.location='<?php echo base_url;?>imprimerelev.php?id=<?=$schoolID?>'"><img src="../images/images/add.png" alt=""> Listes</button>
			<button class="view" onclick="window.location='<?php echo base_url;?>/imprimerfiche1.php?id=<?=$schoolID?>'"><img src="../images/images/add.png" alt=""> Fiche vide1</button>
			<button class="view" onclick="window.location='<?php echo base_url;?>/imprimerfiche2.php?id=<?=$schoolID?>'"><img src="../images/images/add.png" alt=""> Fiche vide2</button>

			<button class="view" onclick="window.location='<?php echo base_url;?>/imprimerfiche3.php?id=<?=$schoolID?>'"><img src="../images/images/add.png" alt=""> Fiche vide3</button>
			<button class="view" onclick="window.location='<?php echo base_url;?>/imprimerfiche4.php?id=<?=$schoolID?>'"><img src="../images/images/add.png" alt=""> Fiche vide4</button>


			
			</div>
			
				<!-- Datatable -->
				<div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
					<table class="table table-striped" id="data_tables">
						<thead> 
						 <tr>
						    <th>N°</th>
							<th>Name</th>
							<th>Surname</th>
                            
							<th>Appel</th>
							
						</tr>
						</thead>
						<tbody>
						 <?php

                         $schoolID=$_GET['id'];
                         $if="SELECT * FROM students  
                          where schoolID='$schoolID' order by  name , surname  desc ";
        
		$if1="SELECT count(*) as total  FROM students  
		where schoolID='$schoolID'";
 $req1 = $conn->query($if1);
 $rows = $req1->fetch();

                            $i=1;
						    $req = $conn->query($if);
								?> 	
									
							<tr>
							<form method="POST" action="./forms/save/save_appel.php?id=<?=$schoolID?> && total=<?=$rows['total']?>">
								<?php
								  
								  while ($fetch = $req->fetch()){

								?>
								<td><?php echo $i?></td>
						
								<td><?php echo htmlspecialchars($fetch['name']);$i++ ;?></a></td>
								<td><?php echo htmlspecialchars($fetch['surname']) ?></td>
								<td><select name="presence[]">
                                       <option value="pr">present</option>
									   <option value="ab">abscent</option>
								</select>
								
								
							</td>
								
                                
								
								<input type="hidden" name="studentID[]" id="id" value="<?php echo htmlspecialchars($fetch['studentID']) ;?>" required>
								
						        
							</tr>
							<?php
							}
							?>
						</tbody>
						
					</table>
					<input style="float:right; border:1px solid; border-radius:5px "  type="submit" name="saveall" value="save all records">
					</form>
				</div>
			</div>
	
	<div style="margin-top: 25px;">
		<p align="center" class="copyright"><strong>&#169;</strong> Copyright 2022-<?php $date=date("Y"); echo $date;?>.  Developed by <a href="#">Trésor Kiddo pro</a>. All Rights Reserved.</p>
	</div>
	
  <?php
	} 
	else {
	?>
  <script>
	alert("You are not Admin!");
	window.location='./index.php';
</script>
<?php
} 
?>


    <!-- Js for Navbar -->
	<script>
		let menuicn = document.querySelector(".menuicn");
		let nav = document.querySelector(".navcontainer");

		menuicn.addEventListener("click", () => {
			nav.classList.toggle("navclose");
		})
	</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="assets/js/appel.js"></script>
<script>alert("ok");</script>
</body>
</html>