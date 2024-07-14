<?php 

  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/pdo/conn.php");
?>

    <!DOCTYPE html>
	<html>
		<head>
      <title> Liste</title>
        <style>
			.deux{
				color:white;
				background-color: red;
			}
		</style>
		</head>
<body>
           <center> <h4><?php echo date('d-m-Y'); ?></h4></center>
            <br>
            <hr>
				<!-- Datatable -->
				<div class="datatable" id="mytable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
					<table class="table table-striped" id="data_tables">
						<thead>
						 <tr>
							<th></th>
							<th>N°</th>
						    <th>Nom de l'Ecole</th>
                            <th>Inscrits</th>
							<th>abscences</th>
							
						</tr>
						</thead>
						<tbody>
						 <?php
						 $i=1;
                         $req= "SELECT s.school_name
                          as school_name ,count( distinct st.studentID) as totalel, count(a.appel) as total from schools s inner join students st on st.schoolID=s.schoolID inner join appels a on a.studentID=st.studentID where a.appel='ab' group by s.school_name";
						    $req = $conn->query($req);
								?> 		
							
								<?php
								  
								  while ($fetch = $req->fetch()){
								?>
								<tr class="<?php $m=($fetch['total']>=3)? 'deux':'trs' ; echo $m ;?>">
								<td></td>
								<td><?php echo $i ?></td>
								<td><?php echo htmlspecialchars($fetch['school_name']) ?></td>
								<?php $i++ ; ?>
                                <td><?php echo htmlspecialchars($fetch['totalel']) ?></td>
								
								<td><?php echo htmlspecialchars($fetch['total'])?></td>
							</tr>
							
							<?php
							}
							?>
                           
						</tbody>
					</table>
				</div>
             
	</body>
    </html>