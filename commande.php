<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."users/include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/pdo/conn.php");
?>
<style>
 .modalcontainer8,.modalcontainer{
    display:none;
    position:fixed ;
    top: 80px;
    left:0;
    width: 100%;
    height:100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 9999;
   }
  
   .modalcontent8,.modalcontent{
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

<div class="box-container" id="box-container">
			<div class="box box1" id="boxeffectif">

				<div class="text" id="effectiftotal">
                    <?php
					 $req=$conn->query('SELECT SUM(Nbre_Livre) AS total FROM commandes');

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Total LIvres</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-book"></i>

			</div>
            <div class="box box1" id="boxeffectif">

				<div class="text" id="effectiftotal">
                    <?php
					 $req=$conn->query('SELECT SUM(pu*Nbre_Livre) AS total FROM commandes ');

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Caisse</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-cash-register"></i>

			</div>
            <div class="box box1" id="boxeffectif">

				<div class="text" id="effectiftotal">
                    <?php
					 $req=$conn->query('SELECT SUM(pu*Nbre_Livre-payer-rembours) AS total FROM commandes');

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Dette</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-money-bill-wave"></i>

			</div>
            <div class="box box1" id="boxeffectif">

				<div class="text" id="effectiftotal">
                    <?php
					 $req=$conn->query('SELECT SUM(rembours) AS total FROM commandes');

					while ($fetch = $req->fetch()){
						
					?>
					<h2 class="topic-heading"><?php echo htmlspecialchars($fetch['total']) ?></h2>
					<h2 class="topic">Rembours</h2>
					<?php
				     };
					 ?>
				</div>
				<i style="color:white;" class="fa-solid fa-money-check-alt"></i>

			</div>
                    </div>
<div class="report-container">
		<div class="report-header">
       <button class="view" id="commander">Commander</button>
       <div class="remove_messages"></div>
       
        </div>
			<div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
					<table class="table table-striped" id="data_tables">
                
					
					


                    </table>
			
           </div>
</div>
<div style="margin-top: 25px;">
		<p align="center" class="copyright"><strong>&#169;</strong> Copyright 2022-<?php $date=date("Y"); echo $date;?>.  Developed by <a href="" target="_blank">Trésor kiddo pro</a>. All Rights Reserved.</p>
	</div>
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
<!--  /**
addremb form
*/ -->
<div class="modalcontainer8" id="modalcontainer8">
    <div class="modalcontent8">
<div id="add-product-messages1"></div>

<form id="addrembform" action="./forms/save/addremb.php" method="post">
    <div class="user_details">
        <div class="input_box">
            <label for="">Votre dette:</label>
            <input type="button" id="dette">
   <label for="">Rembour:</label>
   <input type="hidden" name="cmdID" id="cmdID">
   
   <input type="number" id="rembour" name="rembour">
</div>
<div class="input_box">
<input style="display:block;background:blue;color:white;" type="submit" value="Payer">
</div>
</div>
</form>
  </div>
</div>
<!--  /**
add command form
*/ -->

<div class="modalcontainer" id="modalcontainer">
    <div class="modalcontent">
    <center><fieldset>
 <legend>
	 
		 <h2>Ajouter Commande</h2>
	 
	 </legend>
	 <div id="add-product-messages"></div>
	 <form id="addcommande" action="./forms/save/save_commande.php" method="POST">
		 <div class="user_details">
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
                 <label for="">Nbr_Livres:</label>
                 <input type="number" name="qte" id="qte" required>
                </div>
                 <div class="input_box">
                 <label for="">PU:</label>
                 <input type="number" name="pu" id="pu" required>
                 <label for="">PAYE:</label>
                 <input type="number" name="payer" id="payer" required>
                 <br>
                 <br>
                 <div class="total_message"></div>
                </div>

                <div class="reg_btn">
		               <input  class="primary_btn" type="submit" value="Commander" name="save">
		       <input type="reset" value="Reset" >
               
            
		    <br>
		     <br>
		          </div>
         </div>
         <form>
    </fieldset></center>
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
<script src="assets/js/commande.js"></script>
</body>
</html>