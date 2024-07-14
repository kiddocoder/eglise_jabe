




<?php 

include(Root_path."db_connection/pdo/conn.php");


$reque= "SELECT  MIN(date) as datemin ,MAX(date) as datemax  from programs " ;
  $reque=$conn->query($reque);
  $rows = $reque->fetch() ;

?>

<?php

//include("../../db_connection/mysqli/conn.php");
//session_start();
if (isset($_POST['update'])) {
    // Get form data

    $adminID = $_SESSION['adminID'] ;
    $name = $_POST['adminName'] ;
    $password =$_POST['pass'] ;
    $email =$_POST['adminEmail'] ;


    // Update the admins record
    $query = "UPDATE admins SET adminName='$name', password='$password',adminEmail='$email' WHERE adminID='$adminID'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Succesful.'); window.location='../../dashboard.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
    

$email = $_SESSION['emailAd'] ;
$name= $_SESSION['nameAd'];
$adminID=$_SESSION['adminID'];

?>

<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">

					<div onclick="location.href='<?php echo base_url;?>dashboard.php';" class="option2 nav-option border-bottom">
						<i class="fa-solid fa-user-graduate"></i>
						<h3>Les Etudiants</h3>
					</div>
					<div onclick="location.href='<?php echo base_url;?>schools.php';" class="option2 nav-option border-bottom">
						<i class="fas fa-school"></i>
						<h3>Les Ecoles</h3>
					</div>
					<div onclick="location.href='<?php echo base_url;?>call.php';" class="option2 nav-option border-bottom">
						<i class="fa-solid fa-book"></i>
						<h3>Les Appels</h3>	
					</div>
					
					<div onclick="location.href='<?php echo base_url;?>report.php';" class="option2 nav-option border-bottom">
						<i class="fa-solid fa-chart-bar"></i>
						<h3>Rapport</h3>
					</div>
                    <div onclick="location.href='<?php echo base_url;?>commande.php';" class="option2 nav-option border-bottom">
						<i class="fa-solid fa-shopping-cart"></i>
						<h3>Commandes</h3>
					</div>
					<div onclick="location.href='<?php echo base_url;?>programe.php?date=<?= $rows['datemin']?>';" class="option2 nav-option border-bottom">
						<i class="fa-solid fa-calendar"></i>
						<h3>Programme</h3>
					</div>
					<div onclick="location.href='<?php echo base_url;?>user.php';" class="option2 nav-option border-bottom">
						<i class="fa-solid fa-user"></i>
						<h3>Utilisateurs</h3>
					</div>
					<div id="addproModalBtn2" class="option2 nav-option border-bottom">
						<i class="fa-solid fa-user"></i>
						<h3>modify admin infos</h3>
					</div>
				</div>
			</nav>
          </div>
          

		<div class="main">

			<div class="searchbar2">
				<input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<i class="fa-solid fa-search"></i>
				</div>
			</div>
            

			
<?php  
	/**
	 * update admin infos form modal here 
	 */
	?>
<div id="modalcontainer2">
   <div class="modalcontent2">
	<center><fieldset><legend><h2>Update Admin infos </h2></legend>
    
    <form method="POST" action="./update_admin.php">
		<div class="input_box">
        <label for="adminName:">adminName:</label>
        <input  class="form_control"type="text" name="adminName" value="<?php echo $name; ?>">
		</div>
		<div class="input_box">
        <label for="com">Email:</label>
        <input type="email" name="adminEmail" id="name" value="<?php echo $email; ?>" required><br>
        </div>
		
        <label for="qua">password:</label>
		<div class="input_box">
        <input type="password" name="pass" id="addr" value="<?php echo $password; ?>" required>
        </div>
		<br>
		<br>
        <input type="submit" name="update" value="Update">
		<br>
		<br>
      </form>
       </fieldset></center>
      </div>
	</div>

			<script>
    var modalbtn2 = document.getElementById('addproModalBtn2');
    var modalcontainer2 = document.getElementById('modalcontainer2');
    modalbtn2.addEventListener('click',function(){
      modalcontainer2.style.display='block';
    });
    modalcontainer2.addEventListener('click',function(event){
     if(event.target===modalcontainer2){
      modalcontainer2.style.display='none';
     }
    });
  
    </script>
<style>
	 #modalcontainer2{
    display:none;
    position:fixed ;
    top:0;
    left:0;
    width: 100%;
    height:100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 9999;
   }
.modalcontent2{
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

.modalcontainer2 .title p::before{
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