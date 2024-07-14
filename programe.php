
<?php 
require_once("./root.php");
include(Root_path."db_connection/pdo/conn.php");
include(Root_path."users/include/header_admin.php");

  // get date to star 
  $datestar= $_GET['date'];
  

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   /**
   customizing style for form
   */


   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

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

@media screen and (max-width: 419px){
    .gender .category{
        flex-direction: column;
    }   
}







/* DAYS  */
.center .days {
    list-style-type: none;
    text-align: center;
    background-color: #33b5e5;
    height: 65px;
    overflow-x: auto;
    overflow-y: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.days::-webkit-scrollbar {
    width: 0;
    background-color: transparent;
}


/* Hide scroll bar for firefox and edge */

.days {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.days li {
    margin-right: 2px;
    padding: 5px;
    border: 1px solid black;
    border-radius: 5px;
}

.days li a {
    font-size: 13px;
    text-decoration: none;
    color: white;
}

.days .live {
    padding: 15px;
}

.days .calendar {
    padding: 6px;
}

.days .calendar a {
    font-size: 25px;
}
  li {
     list-style-type: none;
     display: inline-flex;
     color: black;
     margin-top: 5px;
     margin-right: 5px;
     border: 5px;
     border-radius: 12px;
     padding: 5px
 }
 
  li:hover {
     background-color: blanchedalmond;
     cursor: pointer;
 }
 
  li a {
     text-decoration: none;
 }
 
 
  </style>
</head>
<body>
  <?php
  $reque= "SELECT  MIN(date) as datemin ,MAX(date) as datemax  from programs " ;
  $reque=$conn->query($reque);
  $rows = $reque->fetch() ;

  ?>
<div class="center">

    <ul class="days">
    <button class="view" onclick="window.location='<?php echo base_url;?> ../../dashboard.php'"><img src="../images/images/add.png" alt="">RETOUR</button>

    <button class="view"  onclick="window.location='<?php echo base_url;?>./forms/delete/deletepro.php?date=<?= $datestar ?>'"><img src="../images/images/add.png" alt="">Vider l'ancien programme</button>
    <?php
$startDate = new  DateTime($rows['datemin']);//new DateTime('2023-10-19'); // Set your desired start date
$endDate =  new  DateTime($rows['datemax']);//new DateTime('2023-11-19'); // Set your desired end date 
$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($startDate, $interval, $endDate);
$i=1;
foreach ($period as $date) {
    if ($date->format('l') === 'Saturday') {
     //   echo $date->format('Y-m-d') . "\n\n\n\n";

?>
      <li class="day2">
        <a href="<?php echo base_url;?>/programe.php?date=<?php echo $date->format('Y-m-d') ?>">
          <div class="day"><?php echo  "sat ".$i; ?></div>
          <div class="date"><?php echo  $date->format('Y-m-d') ; ?></div>
        </a>
      </li> 
  
      <?php 
      $i++ ;
    }
    
}
?>

      <li class="calendar">
        <a href="/eglisee/calendrier/">
          <div><i class="far fa-calendar"></i></div>
        </a>
      </li>
      <!--
    <button class="view" onclick="window.location='<?php //echo base_url;?>./forms/add/addprograme.php'" ><img src="../images/images/add.png" alt="">Ajouter Un programme  </button>
-->
<button class="view" id="addproModalBtn" data-target="#addProModal" data-toggle="modal" >Ajouter Un programme  </button>
    </ul>
    
</div>   
   
    <!-- Datatable -->
    <div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
					<table class="table table-striped" id="data_tables">
						<thead>
						 <tr>
							<td></td>
						    <th>N°</th>
							<th>UWUZORONGORA </th>
              <th>ICAZOKORA</th>
							<th>ISHURE</th>
							<th>ITARIKI</th>
              
						 
						</tr>
						</thead>
						<tbody>
						 <?php
             $req1 ="SELECT s.school_name as school_name,p.chef as chef, p.chef_task as chef_task ,p.chef_vice as chef_vice,p.chef_vice_task as chef_vice_task,p.secretaire as secretaire,p.secret_task as secret_task,p.secret_vice as secret_vice ,p.secret_vice_task as secret_vice_task,p.person as person ,p.person_task as person_task, p.date as date  FROM  programs p LEFT JOIN  schools s on  p.schoolID=s.schoolID  WHERE p.date like '%$datestar%'";
						  $req= $conn->query($req1);
								?> 		
							
								<?php
								$i=1;
								  
								  while($fetch = $req->fetch()){

								?>
                <tr>
								<td></td>
								<td><?php echo $i ?></td>
								<td><?php echo htmlspecialchars($fetch['chef']);?></a></td>
								<?php $i++ ; ?>
                <td><?php echo htmlspecialchars($fetch['chef_task']) ?></td>
								<td><?php echo htmlspecialchars($fetch['school_name']) ?></td>
								<td><?php echo htmlspecialchars($fetch['date']) ?></td>
                </tr>
                <tr>
								<td></td>
								<td><?php echo $i ?></td>
								<td><?php echo htmlspecialchars($fetch['chef_vice']);?></a></td>
								<?php $i++ ; ?>
                <td><?php echo htmlspecialchars($fetch['chef_vice_task']) ?></td>
								<td><?php echo htmlspecialchars($fetch['school_name']) ?></td>
								<td><?php echo htmlspecialchars($fetch['date']) ?></td>
                </tr>
                <tr>
								<td></td>
								<td><?php echo $i ?></td>
								<td><?php echo htmlspecialchars($fetch['secretaire']);?></a></td>
								<?php $i++ ; ?>
                <td><?php echo htmlspecialchars($fetch['secret_task']) ?></td>
								<td><?php echo htmlspecialchars($fetch['school_name']) ?></td>
								<td><?php echo htmlspecialchars($fetch['date']) ?></td>
                </tr>
                <tr>
								<td></td>
								<td><?php echo $i ?></td>
								<td><?php echo htmlspecialchars($fetch['secret_vice']);?></a></td>
								<?php $i++ ; ?>
                <td><?php echo htmlspecialchars($fetch['secret_vice_task']) ?></td>
								<td><?php echo htmlspecialchars($fetch['school_name']) ?></td>
								<td><?php echo htmlspecialchars($fetch['date']) ?></td>
                </tr>
                <tr>
								<td></td>
								<td><?php echo $i ?></td>
								<td><?php echo htmlspecialchars($fetch['person']);?></a></td>
								<?php $i++ ; ?>
                <td><?php echo htmlspecialchars($fetch['person_task']) ?></td>
								<td><?php echo htmlspecialchars($fetch['school_name']) ?></td>
								<td><?php echo htmlspecialchars($fetch['date']) ?></td>
                </tr>
              
							<?php
							}
							?>
						</tbody>
					</table>
		</div>

    <?php
/**
 * form displayed , modal  to add programs
 */
    ?>

 <div id="modalcontainer">
   <div class="modalcontent">
            <h3>Add program</h3>
            

        <form class="form-horizontal" id="submitProForm" action="forms/save/saveprogram.php" method="POST">
            <div class="user_details">
                <div class="input_box form-group">
				<label for="ecole">ECOLE</label>
					<?php 
						// Include the database config file 
						include_once (Root_path."db_connection/mysqli/conn.php"); 
						
						// get all faculity 
						$query = "SELECT * FROM schools"; 
						$result = $conn->query($query); 
					?>

					<!-- league dropdown -->
					<select id="league" name="school" class="form-control">
                        <div class="input-box form-group">
						<option value="">Choose school</option>
						<?php 
						if($result->num_rows > 0){ 
							while($row = $result->fetch_assoc()){  
								echo '<option value="'.$row['schoolID'].'">'.$row['school_name'].'</option>'; 
							} 
						}else{ 
							echo '<option value="">School  not found</option>'; 
						} 
						?>
					</select>

                    <label for="t_name">Chef </label>
                    <input class="form-control" type="text" name="chef" id="t_name" placeholder="Enter name of chef" required>
                
                <label for="t_name">Chef_vice</label>
                    <input class="form-control" type="text" name="chef_vice" id="t_name" placeholder="Enter name of chef_vice" required>

                    
                <label for="t_name">Secretary</label>
                    <input class="form-control" type="text" name="secret" id="t_name" placeholder="Enter name of Secretary" required>
                    
                    
                <label for="t_name">Secretary_vice</label>
                    <input class="form-control" type="text" name="secret_vice" id="t_name" placeholder="Enter name of Secretary_vice" required>
                    
                    <label for="t_name">other person name</label>
                    <input class="form-control" type="text" name="person" id="t_name" placeholder="Enter  person name " required>
                     
					
                    
                    </div>
                <div class="input_box form-group" >
                    
                    <input class="form-control" type="hidden" name="t_name" id="t_name"  required>
                    <label for="birth">saturday date </label>
                    <input class="form-control" type="date" name="date" id="birth" required>

                    <label for="t_name">chef task</label>
                    <input class="form-control" type="text" name="chef_task" id="t_name" placeholder="Enter  chef task " required>
                    
                    <label for="t_name">chef_vice task</label>
                    <input class="form-control" type="text" name="chef_vice_task" id="t_name" placeholder="Enter  chef_vice task " required>
                    
                    <label for="t_name">Secretary task</label>
                    <input class="form-control" type="text" name="secret_task" id="t_name" placeholder="Enter  Secretary task " required>

                     <label for="t_name">Secretary_vice task</label>
                    <input class="form-control" type="text" name="secret_vice_task" id="t_name" placeholder="Enter  Secretary_vice task " required>
                     
					
                    <label for="t_name">other person  task</label>
                    <input class="form-control" type="text" name="person_task" id="t_name" placeholder="Enter  person  task " required>
                     
					
                </div>

               
            <div class="reg_btn">
            <input type="submit" value="Add Program" name="save">
            <input type="reset" value="reset" name="reset">
            
            </div>

         </form>  <!--for add progam form -->
         
     </div> 

    </div>
<!-- Datatable js code -->
<script>
        $(document).ready(function () {
            $('#data_tables').DataTable();
        });
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


</body>
</html>

