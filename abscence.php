<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/pdo/conn.php");

?>
        <style>
			.deux{
				color:white;
				background-color: red;
			}
		</style>
<?php 

   if (isset($_SESSION['emailAd'])) {
	$schoolID=$_GET['id'];
	?>

  <?php   
   $schoolID=$_GET['id'];
   $if1="SELECT school_name,schoolID   FROM schools 
    where schoolID=$schoolID ";
      $req1 = $conn->query($if1);
      $row = $req1->fetch();

  ?>
  <center><h4><?php echo $row['school_name'] ?></h4></center>
   <hr>
  <!-- Datatable -->
  <button class="view" id="viderarchive" onclick="deletearchive(<?php echo $row['schoolID'] ?>)"> Vider l'archive</button>
  <div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
					<table class="table table-striped" id="data_tables">
						<thead>
						 <tr>
						    <th>N°</th>
							<th>Name</th>
							<th>Surname</th>
							<th>Abscences</th>
						</tr>
						</thead>
						<tbody>
						 <?php

                         $schoolID=$_GET['id'];
                        $if= "Select a.studentID as studentID,count(a.appelID) as 'effectif',st.studentID as 'studentid',st.name as 'name',st.surname as 'surname',st.schoolID as 'school' from archive a join students st on a.studentID=st.studentID join schools s on s.schoolID= a.schoolID where a.appel like '%ab%' AND a.schoolID ='$schoolID' group by a.studentID";
                            $i=1;
						    $req = $conn->query($if);
								?> 	
								
								<?php
                          //  if a student have 
								?>
							
								<?php
								  
								  while ($fetch = $req->fetch()){

								?>

                       <tr class="<?php $m=($fetch['effectif']>=3)? 'deux':'trs' ; echo $m ;?>">
								<td><?php echo $i?></td>
						
								<td><?php echo htmlspecialchars($fetch['name']);$i++?></a></td>
								<td><?php echo $fetch['surname'] ; ?></td>
								<td><?php echo $fetch['effectif'] ; ?></td>
								
								<?php
								if(($fetch['effectif']>12)){
                                $studentID=$fetch['studentID']; 
										
                 $if2= "DELETE  FROM  archive where studentID='$studentID'";
	        $conn->query($if2);
			$if3= "DELETE  FROM  appels where studentID='$studentID'";
	        $conn->query($if3);
			$if4= "DELETE  FROM  students where studentID='$studentID'";
	        $conn->query($if4);

                                 }

                                      ?>
							
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

	<!--  /**
	delete modal 
	*/ -->
	<div class="popup_box">

<!-- <i class="fas fa-exclamation"></i> -->
<i class="fa-solid fa-exclamation"></i>
<h1> Vos archives seront supprimées de façon permanente!</h1>
<label>voulez-vous continuer?</label>
<div class="btns">
  <button  class="btn1">Annuler</button>
  <button class="btn2">Supprimer</button>
</div>
</div>

	<div style="margin-top: 25px;">
		<p align="center" class="copyright"><strong>&#169;</strong> Copyright 2022-<?php $date=date("Y"); echo $date;?>.  Developed by <a href="#">Trésor Kiddo pro</a>. All Rights Reserved.</p>
	</div>
	
  <?php
	 }else {
	?>
	
  <script>
	alert("You are not Admin!");
	window.location='./index.php';
</script>
<?php
} 
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="assets/js/abscence.js"></script>
<!-- Datatable js code -->

</body>
</html>