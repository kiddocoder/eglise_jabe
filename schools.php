<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php");
   
  include(Root_path."db_connection/pdo/conn.php");
  //include(Root_path."users/include/header_admin.php");
?>
   <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

#modalcontainer4, #modalcontainer3{
    display:none;
    position:fixed ;
    top:0;
    left:0;
    width: 100%;
    height:100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 9999;
   }
.modalcontent4,.modalcontent3{
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
.container{
    max-width: 700px;
    width: 100%;
    background: cadetblue;
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

     .user_details{
        max-height: 340px;
        overflow-y: scroll;
    } 

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
    .gender .category{
        flex-direction: column;
    }   
}

</style>
<?php 

   if (isset($_SESSION['emailAd'])) {
	?>

		<div class="report-container">
			<div class="report-header">
				<button class="view" id="addproModalBtn3"><img src="../images/images/add.png" alt=""> Ajouter l'Ecole</button>
                <div class="remove-messages"></div>
				<button class="view" onclick="window.location='<?php echo base_url;?>listeabs.php'"><img src="../images/images/add.png" alt="">Lister les abscences </button>
			</div>
			
				<!-- Datatable -->
				<div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
					<table class="table table-striped" id="data_tables">
						<thead>
						 <tr>
							<th></th>
							<th>N°</th>
						    <th>Nom de l'Ecole</th>
							<th>chef</th>
							<th>TELEPHONE</th>
							<th>secretaire</th>
							<th>TELEPHONE </th>
							<th>Update</th>
							<th>Delete</th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
                        </div>
      </div>
      <div style="margin-top: 25px;">
		<p align="center" class="copyright"><strong>&#169;</strong> Copyright 2022-<?php $date=date("Y"); echo $date;?>.  Developed by <a href="" target="_blank">Trésor kiddo pro</a>. All Rights Reserved.</p>
	</div>
	<?php  
	/**
	 * add school form modal here 
	 */
	?>
<div id="modalcontainer3">
   <div class="modalcontent3">

        <center><fieldset>
    <legend>
        
            <h2>Registration</h2>
        
        </legend>
        <div id="add-product-messages"></div>
        <form id="addschool" action="forms/save/save_school.php" method="POST">
            <div class="user_details">
                <div class="input_box">
            <label for="phone">Nom Ecole</label>
                    <input type="text" name="school" id="phone" placeholder="Enter school Name" required>
                    <label for="name">Nom Complet chef</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                    <label for="username">Nom Complet secret</label>
                    <input type="text" name="surname" id="surname" placeholder="Enter your surname" required>
            </div>
                <div class="input_box">
                    <label for="email">TELEPHONE CHEF</label>
                    <input type="number" name="telchef" id="email" placeholder="Enter cheef  number" required>
                    <label for="phone">TELEPHONE SECRET</label>
                    <input type="number" name="telsecret" id="phone" placeholder="Enter your number" required>
                
             <div class="reg_btn">
              <input id="" type="submit" value="Add School" name="save">
            </div>
        </div>
        </form>
        </fieldset></center>
    </div>
</div>
<!--  
/**
delete modal 
*/

 -->
 <div class="popup_box">

<!-- <i class="fas fa-exclamation"></i> -->
<i class="fa-solid fa-exclamation"></i>
<h1> sera supprimée de façon permanente!</h1>
<label>voulez-vous continuer  ?</label>
<div class="btns">
  <button  class="btn1">Annuler</button>
  <button class="btn2">Supprimer</button>
</div>
</div>



<?php 
/***
 * 
 * @ All updates modal form here 
 * 
 */
?>

 <div id="modalcontainer4">
   <div class="modalcontent4">
    
  <center><fieldset><legend><h2>Update School</h2></legend>
  <div id="add-product-messages1"></div>
    <form method="POST" action="./forms/update/update_school.php" id="updateschool">
    <input type="hidden" name="schoolID" id="schoolID">
    <div class="user_details">
                <div class="input_box">
                    <label for="name">Nom Complet chef</label>
                    <input type="text" name="name" id="namechef" required>
                </div>
                <div class="input_box">
                    <label for="username">Nom Complet secret</label>
                    <input type="text" name="surname" id="namesecret" required>
                </div>
                <div class="input_box">
                    <label for="email">TELEPHONE CHEF</label>
                    <input type="number" name="telchef" id="telchef" required>
                    
                </div>
                <div class="input_box">
                    <label for="phone">TELEPHONE SECRET</label>
                    <input type="number" name="telsecret" id="telsecret" required>
                </div>
                <div class="input_box">
                    <label for="phone">Ecole</label>
                    <input type="text" name="school" id="schoolname" required>
                </div>
                <div class="reg_btn">
            <input type="submit" value="Apdate Records" name="update">
            </div>
        </form>
   </div>
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
<script src="assets/js/school.js"></script>
</body>
</html>