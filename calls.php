<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."users/include/header_admin.php");
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
		<button class="view" onclick="location.href='<?php echo base_url;?>./appel.php'">appeler les élèves </button>
			</div>
			
				<!-- Datatable -->
				<div class="datatable" style="overflow-x: auto; width: 100%;margin-top: 5px;">
					<table width="100%"cellspacing="0" class="table table-striped" id="data_tables">
						<thead>
						 <tr>
							<th></th>
						    <th>N°</th>
							<th>ISHURE</th>
							<th>abashitsi</th>
							<th>ababiwye ubutumwa abandi</th>
							<th>abagendereye abarwayi</th>
							<th>abagendereye abafunzwe</th>
							<th>abizera fashije abandi</th>
							<th>abize indwi</th>
							<th>gusengera mu muryango</th>
							<th>abagize comande</th>
							<th>Appeller</th>
							
						</tr>
						</thead>
						<tbody>
						<?php
                               $i=1;
						    $req = $conn->query( 'SELECT * FROM schools');
								?> 
								
								<tr>
							
								<form action="./forms/save/save_call.php" method="post">
								  
								  
								
								<?php
								  
								  while ($fetch = $req->fetch()){

								?>
								<!--
								<form action="process.php" method="post" id="dataForm">
								  -->
								 <td></td>
							     <td><?php echo $i?></td>

								 <input type="hidden" name="schoolID" value="<?php echo $fetch['schoolID']?>">
								 <td><?php echo htmlspecialchars($fetch['school_name']); $i++?></td>
								
		
                                 <td><input type="number" name="visitor" required></td>
								 <td><input type="number" name="total_prayer" required></td>
								 <td><input type="number" name="visitor_seek" required></td>
								 <td><input type="number" name="visitor_prison" required></td>
								 <td><input type="number" name="total_gift" required></td>
							     <td><input type="number" name="student_week" required></td>
								 <td><input type="number" name="family_prayer" required></td>
							     <td><input type="number" name="commende" required></td>
								
								 
								 <td>
									<input type="checkbox" name="selectedata[]" value="<?php echo $fetch['schoolID'] ;?>">
									</td>
									</tr>
									
							<?php
							}
						
							?>
								
							
							<?php
							//}
						
							?>
						</tbody>
					</table>
					<button style="float:right; border:1px solid; border-radius:5px "  type="submit" name="saveall"> save all records</button>
					</form>	
				</div>
			</div>
		</div>
	</div>
	<div style="margin-top: 5px;">
	<p align="center" class="copyright"><strong>&#169;</strong> Copyright 2022-<?php $date=date("Y"); echo $date;?>.  Developed by <a href="" target="_blank">Trésor kiddo pro</a>. All Rights Reserved.</p>
		<?php  //include(Root_path."users/include/footer.php"); ?>
	</div>
  <?php
	} 
	else {
	?>
  <script>
//alert("You are not Admin or user !");
//	window.location='./index.php';
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

</body>
</html>