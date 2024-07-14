<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."users/include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/pdo/conn.php");
?>
<style>
	body{
		background:black;
	}
.students{
		width: 100px;
		background : rgba(0,0,0,0,360);
		list-style: none;
		height: 20px;

	}
	td{
		height: 10px;	
	}
</style>

<div class="report-container">
			<div class="report-header">
			
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
					 echo '<select style="width: 350px;" name="school" id="school" class="form-control">';
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
			
            <span style="color: blue;display:none;" id="loading1">Loading...</span>
            <button class="view" style="color: white;display:block;" id="absbtn1"> Abs par élève</button>
			<span style="color: blue;display:none;" id="loading2">Loading...</span>
			<button class="view" style="color: white;display:block;" id="absbtn2" > Listes</button>
			<span style="color: blue;display:none;" id="loading3">Loading...</span>
			<button class="view" style="color: white;display:block;" id="absbtn3"> fiche1</button>
			<span style="color: blue;display:none;" id="loading4">Loading...</span>
			<button class="view" style="color: white;display:block;" id="absbtn4" > fiche2</button>
			<span style="color: blue;display:none;" id="loading5">Loading...</span>
			<button class="view" style="color: white;display:block;" id="absbtn5" > fiche3</button>
			<span style="color: blue;display:none;" id="loading6">Loading...</span>
			<button class="view" style="color: white;display:block;" id="absbtn6" > fiche4</button>
			

	</div>
    <form method="POST" action="./forms/save/save_appel.php?id=<?=$schoolID?> && total=<?=$rows['total']?>">
    <!-- Datatable -->
    <div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">

	
					<table class="table table-striped" id="data_tables">
					<thead>
						
					</thead>
					


                </table>
				<input style="float:right; border:1px solid; border-radius:5px "  type="submit" name="saveall" value="save all records">
			</form>
    </div>
                </div>
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


</body>
</html>