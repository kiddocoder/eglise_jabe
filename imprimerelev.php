<?php 

  session_start();
  require_once("./root.php");
 
  include(Root_path."db_connection/pdo/conn.php");
?>
	<script src="./ssets/jquery/jquery.min.js"></script>
<script src="./assets/js/html2canvas.js"></script>
<script src="./assets/js/html2pdf.js"></script>
<style>
	@font-face {
     font-family: 'roboto';
     src: url("assets/Roboto/*") format('truetype');
   }
   *{
	font-family: 'roboto';
	margin: 0;
	padding: 0;
	box-sizing: border-box;
   }

   body{
	width: 100%;
	height: 100vh;
   }

table {
	border : 1px solid transparent; 
      border-collapse: collapse;
}
/*table tbody > tr,table thead>tr {
	border: 1px solid #000;
}*/
table thead tr >th{
	font-weight:900;
}
table thead tr > th,table tbody tr >td{
	border: 1px solid #000;
}
table thead tr > th:not(:first-child){
	width: 25px;
}
table thead tr > th:first-child,tbody tr td:first-child{
	width: 170px;
}
table tbody tr{
	height: 25px;
}
thead th > span{
	margin: 2px;
	font-size: 12px;
}
table tbody tr >td:not(:first-child){
	font-size: 14px;
	text-align: center;
}
.sch{
	margin-left: 5px;
}
.perc{
	background-color: #F6F6F6E3;
}
 /*.vertical {
      writing-mode: vertical-rl;
      height: 225px;
      vertical-align: 8;
      transform: rotate(-180deg);
	font-size:14px;
  }*/
  .download{
      display: flex;
      align-items: center;
      justify-content: center;
      height: 50px;
      width: 180px;
      background-color: #f8fcff;
      border-radius: 5px;
      gap: 5px;
      color: #0a5889;
	cursor: pointer;
      box-shadow: 0 0 10px ;
  }
  .fa-download{
      font-size: 25px; 
  }
  .header{
	background: #391AE8;
	padding: 10px;
	margin-bottom: 15px;
	display: flex;
	align-items: center;
	justify-content: center;
  }
  .header span{
	text-align: center;
	color: #fdfdfd;
	font-size: 24px;
	font-weight: 600;
	text-shadow: 0 0 0 10px;
  }
  .wrapper{
	margin: auto 45px;
  }
  .rapport{
	display: flex;
	flex-direction: column;
	justify-content: center;
  }
  .rapport .title{
	margin-bottom: 20px;
	text-transform: uppercase;
  }
  .rapport .footer{
	text-transform: capitalize;
	margin: 20px;
  }
</style>
<?php 

   if (isset($_SESSION['emailAd'])) {
	$schoolID=$_GET['id'];
	?>
<br><br>
<?php 
    $schoolID=$_GET['id'];
    $if1="SELECT * FROM students st  join schools s on s.schoolID=st.schoolID
           left join appels a on a.studentID=st.studentID    
     where st.schoolID=$schoolID order by  st.name , st.surname desc";


       $i=1;
       $req = $conn->query($if1);
       $row= $req->fetch() ;
   
   ?>
     <div class="wrapper">
     <div  class="pdf download" onclick="PDF('rapport', 'membres-<?=$row['school_name']?>.pdf')">
            <i class="fa-solid fa-download"></i>
            <span>Download as PDF</span>
      </div>
       <div id="rapport" class="rapport">
		 <h3 class="title" align="center"> LISTES DES MEMBRES <?php echo  $row['school_name'] ;  ?> </h3>
       <table id="myTable" class="table table-striped">
						<thead>
						 <tr>
						    <th>N°</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Naissance</th>
                            <th>Télphone</th>
                            <th>Commune</th>
                            <th>Quartier</th>
                            <th>Avenue</th>
                            <th>N.Avenue</th>
						</tr>
						</thead>
						<tbody>
						 <?php

                         $schoolID=$_GET['id'];
                         $if="SELECT * FROM students st  join schools s on s.schoolID=st.schoolID
                                left join appels a on a.studentID=st.studentID    
                          where st.schoolID=$schoolID order by  st.name , st.surname desc ";


                            $i=1;
						    $req = $conn->query($if);
								?> 	
									
							<tr>
								<?php
								  
								  while ($fetch = $req->fetch()){

								?>
								<td><?php echo $i?></td>
						
								<td><?php echo htmlspecialchars($fetch['name']);$i++?></a></td>
								<td><?php echo htmlspecialchars($fetch['surname']) ?></td>
								<td><?php echo htmlspecialchars($fetch['date_naissance']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['telephone']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['commune']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['quarter']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['street']) ?></td>
                                <td><?php echo htmlspecialchars($fetch['street_number']) ?></td>
								</tr>
                            
							<?php
							}
							?>
						</tbody>
					</table>
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

<script>
	  function PDF(elementId, fileName) {
		const element = document.getElementById(elementId);
            html2pdf()
                .set({
                    margin: 10,
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

                    

