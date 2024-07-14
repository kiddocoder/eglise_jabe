<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/pdo/conn.php");
  
?>

<style>
 #modalcontainer4,#modalcontainer{
    display:none;
    position:fixed ;
    top: 80px;;
    left:0;
    width: 100%;
    height:100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 9999;
   }
.modalcontent4 ,.modalcontent{
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
#loader{
	display:none;
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
.error{
	        
            top: 40px;
            left: 0;
            width: 300px;
            color:red;
            border: none;
			display:none;
            padding: 0;
            margin: 0;
}
.error p{
	padding: 0;
    margin: 0;	
}
.input_group{
	display: flex;
	align-items:center;
}
.indicatif{
	width: 60px;
	margin-right:1px;
}
.numero{
	flex:1;
}
</style>


<?php 

   if (isset($_SESSION['emailAd'])) {
	?>
    <script src="./assets/js/html2canvas.js"></script>
<script src="./assets/js/html2pdf.js"></script>
	<div class="box-container" id="box-container">
			<div class="box box1" id="boxeffectif">

				<div class="text" id="effectiftotal">
                    <?php
					 $req=$conn->query('SELECT count(*) AS total FROM students st INNER JOIN schools s ON st.schoolID = s.schoolID');

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Students</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-user-graduate"></i>

			</div>
			<div class="box box1">
				<div class="text">
                    <?php
					 $req=$conn->query('SELECT count(*) AS total FROM schools');

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Churches</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-school"></i>
			</div>

			<div class="box box2">
				<div class="text">
				   <?php
				  date_default_timezone_set("Etc/GMT+8");
				     $date1 = date("Y-m-d");
					 echo $date1 ;
					 $req=$conn->query("SELECT count(appel) AS total FROM appels where appel LIKE '%pr%' AND created_at LIKE '%$date1%'");

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Presents today</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-calendar"></i>
			</div>

			<div class="box box3">
				<div class="text">
				<?php
				     $date2=date("Y-m-d");
					 echo $date2;
					 $req=$conn->query("SELECT SUM(gift) AS total FROM calls WHERE created_at Like '%$date2%'");

					while ($fetch = $req->fetch()){
						if($fetch['total']==0){
							$fetch['total']=0;
						}
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Gifts Today</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-gift"></i>
			</div>
		</div>

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
					 echo '<option value="0">selectionnez l\'école</option>';
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
				<select style="width: 200px;" name="" id="categories" class="form-control">
					<option value="10000">view with category</option>
					<option value="31-800">31 et plus</option>
					<option value="19-30">19-30 Ans</option>
					<option value="16-18">16-18 Ans</option>
					<option value="13-15">13-15 Ans</option>
					<option value="10-12">10-12 Ans</option>
					<option value="7-9">7-9 Ans</option>
					<option value="4-6">4-6 Ans </option>
					<option value="0-3">0-3 Ans</option>
				</select>
	
				<button class="view" id="imprimer"><img src="../images/images/add.png" alt=""> Imprimer</button>

			<div class="remove-messages"></div>
				<button class="view" id="modalbtn"> Ajouter l'élève</button>
			</div>
			
				<!-- Datatable -->
				<div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 0px; margin:0 auto;">
					<table class="table table-striped" id="data_tables">
						<thead>
						 <tr>
						
						    <th>N°</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Date de naissance</th>
							<th>Téléphone</th>
							<th>Commune</th>
							<th>Quartier</th>
							<th>Avenue</th>
							<th>No Av.</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>
						</thead>
				</table>
				
								<div class="popup_box">

<!-- <i class="fas fa-exclamation"></i> -->
<i class="fa-solid fa-exclamation"></i>
<h1> sera supprimé de façon permanente!</h1>
<label>voulez-vous continuer  ?</label>
<div class="btns">
  <button class="btn1">Annuler</button>
  <button  class="btn2">Supprimer</button>
</div>
</div>
						
				</div>
			</div>
	<?php  
	/**
	 * add student form modal here 
	 */
	?>

<div id="modalcontainer">
   <div class="modalcontent">

<center><fieldset>
 <legend>
	 
		 <h2>Ajouter l'élève</h2>
	 
	 </legend>
	 <div id="add-product-messages"></div>
	 <form id="addstudent" action="./forms/save/save_student.php" method="POST">
		 <div class="user_details">
			 <div class="input_box">
				 <!-- Home team -->
				 <div class="form-group">
				 <label for="name">Nom</label>
				 <input type="text" name="name" id="nom" class="form-control" required>
				</div>
				 <!-- Away team -->
				 <label for="pname">Prenom</label>
				 <input type="text" name="surname" id="pname" class="form-control" required>
				 <!-- Away team -->
				 <label for="pname">Date de naissance</label>
				<input type="date" name="age" id="date_nai">
				 <label for="qua">Quartier</label>
				 <input type="text" name="qua" id="qua" required>
			 
				 <label for="av">Avenue</label>
				 <input type="text" name="av" id="av"required>
			 
			 </div>

			 <div class="input_box">
				<div class="form-group">
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
					 echo '<label for="name">Ecole:</label>';
					 echo '<select id="school" name="school" class="form-control">';
					// echo '<option value="0">selectionnez son école</option>';
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
		   <label for="telephone">Telephone:</label>
		   <div class="input-group">
				 <select name="" id="indicatif" class="indicatif">
					<option value="+257">+257</option>
				 </select>
				 <input type="text" id="numero" class="numero" name="telephone">
				 <div id="numero_error" class="error">Numero invalide!</div>
				</div>

				 <label for="commune">Commune</label>
				 <input type="text" name="commune" id="com" required>
				 <label for="numav">No Avenue</label>
				 <input type="text" name="numav" id="numav"required>
			 </div>
		 </div>
		 <div class="reg_btn">
		 <input type="submit" value="Ajouter l'élève" name="save">
		 <input type="reset" value="reset" >
		 <br>
		 <br>
		 </div>
	 </form>
	 </fieldset></center>
 </div> 
</div>

<?php  
	/**
	 * update student form modal here 
	 */
	?>

<div id="modalcontainer4">
   <div class="modalcontent4">

<center><fieldset>
 <legend>
	 
		 <h2>Update  l'élève</h2>
	 
	 </legend>
	 <div id="add-product-messages1"></div>
	 <form id="updatestudent" action="./forms/update/update_student.php" method="POST">
		 <div class="user_details">
			 <div class="input_box">
				<input type="hidden" name="studentID" id="studentID">
				<input type="hidden" name="school" id="schoolID">
				 <label for="name">Nom</label>
				 <input type="text" name="name" id="nomelev" class="form-control" required>
				 <label for="pname">Prenom</label>
				 <input type="text" name="surname" id="surname" class="form-control" required>
				 <label for="pname">Date de naissance</label>
				<input type="date" id="age2" name="age">
				 <label for="qua">Quartier</label>
				 <input type="text" name="qua" id="quarter" required>
			 
				 <label for="av">Avenue</label>
				 <input type="text" name="av" id="street" required>
			 
			 </div>

			 <div class="input_box">
				 <label for="">Telephone:</label>
		   <div class="input-group">
				 <select name="" id="indicatif" class="indicatif">
					<option value="+257">+257</option>
				 </select>
				 <input type="text" id="numero2" class="numero" name="telephone">
				 <div id="numero_error2" class="error">Numero invalide!</div>
				</div>
				 <label for="commune">Commune</label>
				 <input type="text" name="commune" id="commune" required>
				 <label for="numav">No Avenue</label>
				 <input type="text" name="numav" id="street_number"required>
			 </div>
		 </div>
		 <div class="reg_btn">
		 <input type="submit" value="Update" name="save">
		 <input type="reset" value="reset" >
		 <br>
		 <br>
		 </div>
	 </form>
	 </fieldset></center>
 </div> 
</div>

	<div style="margin-top: 25px;">
		<p align="center" class="copyright"><strong>&#169;</strong> Copyright 2022-<?php $date=date("Y"); echo $date;?>.  Developed by <a href="" target="_blank">Trésor kiddo pro</a>. All Rights Reserved.</p>
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
<script src="assets/js/dashboard.js"></script>
<script>
    modalcontainer.addEventListener('click',function(event){
     if(event.target===modalcontainer){
      modalcontainer.style.display='none';
     } 
    });
  
    </script>
	<script>
	  function PDF(elementId, fileName) {
            html2pdf()
                .set({
                    margin: [2.5,3],
                    filename: fileName,
                    image: { type: 'jpeg', quality: 1.2 },
                    html2canvas: { 
				backgroundColor: '#ffffff' },
                    jsPDF: { 
				unit: 'mm', 
				format: 'a4',
				compress: false,
				floatPrecision: 16,
				orientation: 'l'
				}
                })
            .from(element)
            .toPdf()
            .output('datauristring')
            .then(function (pdfDataUri) {
            const link = document.createElement('a');
            link.href = pdfDataUri;
            link.download = fileName;
            link.click();
            });
        }	
	 </script>
	 <script>
		$('#school').on('change', function() {
			var schoolId = $(this).val(); 
			$("#imprimer").val(schoolId);
			$('#imprimer').on('click',function(){
				var schoolID = this.value;
				window.location = '<?php echo base_url;?>imprimerelev.php?id='+schoolID;
			})
		})
	 </script>
</body>
</html>