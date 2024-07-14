<?php 
  session_start();
  require_once("./root.php");
  include(Root_path."db_connection/mysqli/conn.php");
  function FormatNumber($number){
      if (is_int($number)) {
		$formatted = number_format($number, 0);
	  } else {
		$formatted = number_format($number, 2); 
	  }
	  return $formatted;
	  
  }
  //prepare request 
  $sql = "      SELECT * FROM ( SELECT 
  s.school_name AS school_name,
COALESCE(LEAST(c.created_at, app.created_at), c.created_at, app.created_at) AS Date_c,
  COALESCE(stud.tot_students,0) AS 'total_etudiant',
  COALESCE(SUM(app.presents),0) AS 'total_present_calls', 
  COALESCE(SUM(c.commende),0) AS 'total_comande', 
  COALESCE(SUM(c.visitor),0) AS 'total_visitors',
  COALESCE(SUM(c.parole),0) AS 'total_words',
  COALESCE(SUM(c.visitor_seek),0) AS 'total_visite_seek',
  COALESCE(SUM(c.visitor_prison),0) AS 'total_prison',
  COALESCE(SUM(c.gift),0) AS 'total_aide',
  COALESCE(SUM(c.week_study),0) AS 'total_week',
  COALESCE(SUM(c.familly_prayer),0) AS 'total_familly'
  FROM schools s
  LEFT JOIN 
   (SELECT * FROM calls) c ON c.schoolID = s.schoolID
   LEFT JOIN 
   (SELECT a.created_at AS created_at , a.schoolID AS schoolID,COALESCE(COUNT(a.appel),0) AS presents FROM appels a JOIN students st ON st.studentID = a.studentID WHERE a.appel LIKE '%pr%'
   GROUP BY a.schoolID) app ON app.schoolID = s.schoolID
   LEFT JOIN 
   (SELECT st.schoolID AS schoolID ,COALESCE(COUNT(st.studentID),0) AS tot_students
    FROM students st 
    GROUP BY st.schoolID
   ) stud ON stud.schoolID = s.schoolID
   GROUP BY school_name, Date_c ORDER BY Date_c DESC
) AS subquery 
WHERE Date_c IS NOT  NULL";
if(isset($_GET['date'])){
   $getdate = $_GET['date'];
   $sql.=" AND Date_c LIKE '%$getdate%'";
}
	$result = $conn->query($sql);
	$Datas = array(); // Initialize an empty array to store the grouped data
	
	if ($result->num_rows > 0) {
	  while($rows = $result->fetch_assoc()){
	    $date = $rows['Date_c'];
	    // Check if the date key already exists in the $Datas array
	    if (array_key_exists($date, $Datas)) {
		// If the date key exists, append the current row to the existing date key
		$Datas[$date][] = $rows;
	    } else {
		// If the date key doesn't exist, create a new date key and assign the current row to it
		$Datas[$date] = array($rows);
	    }
	  }
	}
	
	
   if (isset($_SESSION['emailAd'])) {
	?>

<!DOCTYPE html>
<html>
<head>
<title>imprimer</title>
<link rel="stylesheet" href="./assets/fontawesome/css/all.css">
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
  }
  .rapport .footer{
	text-transform: capitalize;
	margin: 20px;
  }
</style>
</head>
    <body>
       <div class="header">
            <span>
			Sachez bien ,si vous télèchargez un rapport , il sera supprimé dans <br> l'historique : donc conservez  bien les fichiers PDF pour les évaluations ultélieures !
		</span>
	 </div>
	<div class="wrapper">
		<?php
		   foreach($Datas as $key => $trs){
	      ?>
       <div  class="pdf download" onclick="PDF('rapport-<?=$key?>', 'rapport-<?=$key?>.pdf')">
            <i class="fa-solid fa-download"></i>
            <span>Download as PDF</span>
      </div>
	 <div id="rapport-<?=$key?>" class="rapport">
		 <h3 class="title" align="center">RAPPORT DU <?php echo date("d/m/Y l", strtotime($key)) ?></h3>
                <table id="myTable" class="table table-striped" id="data_tables">
						<thead>
						<tr>
						<th><span>ISHURE</span></th>
						<th class="vertical"><span>MEMB</span></th>
						<th class="vertical"><span>PRES</span></th>
						<th class="perc"><span>%</span></th>
						<th class="vertical"><span>VISI</span></th>
						<th class="vertical"><span>TOT</span></th>
						<th class="vertical"><span>PARO</span></th>
						<th class="perc"><span>%</span></th>
						<th class="vertical"><span>MALA</span></th>
						<th class="perc"><span>%</span></th>
						<th class="vertical"><span>PRISO</span></th>
						<th class="perc"><span>%</span></th>
						<th class="vertical"><span>AIDE</span></th>
						<th class="perc"><span>%</span></th>
						<th class="vertical"><span>SEMA</span></th>
						<th class="perc"><span>%</span></th>
						<th class="vertical"><span>FAML</span></th>
						<th class="perc"><span>%</span></th>
						<th class="vertical"><span>DON</span></th>
						<th class="perc"><span>% GEN</span></th>
						<th><span>PLACE</span></th>
						</tr>

						</thead>
						<tbody>		
							<tr>
								<?php
								    $totper1=$totper2=$totper3=$totper4=0;
									$totper5=$totper6=$totper7=0;
                                      $totper=$pres=$visi=$et=0 ;
									  $word=$seek=$aide=$prison=0;
									  $study=$familly=$cmd=0;
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
										//$i=1;
                                        foreach($trs as $row){
                                                if($row['total_etudiant']!=0){
								?>
								<td><?php echo '<span style="margin-left:5px;"></span>'; echo htmlspecialchars($row['school_name'])?></td>
								<td><?php echo $row['total_etudiant'] ?></td>
								<?php $et=$et+ $row['total_etudiant']?>
								<td><?=$row['total_present_calls'] ?></td>
								<?php $pres=$pres+ $row['total_present_calls']?>
								<td class="perc"><?php
                                                 $ker = ($row['total_present_calls']*100)/$row['total_etudiant'] ;
								   echo FormatNumber($ker);
                                                $totper1 = FormatNumber($ker);
								 ?></td>
								<td><?php echo $row['total_visitors'] ?></td>
								<?php $visi=$visi+ $row['total_visitors']?>
								<td><?php echo $row['total_visitors']+$row['total_present_calls'] ?></td>
								<td><?php echo $row['total_words'] ?></td>
								<?php $word=$word+ $row['total_words']?>
								<td class="perc"><?php
                                                  $ker = ($row['total_words']*100)/$row['total_etudiant'];
								  echo FormatNumber($ker);
								   $totper2 = FormatNumber($ker);
								 ?></td>
                                                <td><?php echo $row['total_visite_seek'] ?></td>
								 <?php $seek=$seek+ $row['total_visite_seek']?>
								 <td class="perc"><?php
                                                 $ker = ($row['total_visite_seek']*100)/$row['total_etudiant'];
						               echo FormatNumber($ker);
								   $totper3 = FormatNumber($ker); 
								 ?></td>
								 <td><?php echo $row['total_prison'] ?></td>
								 <?php $prison=$prison+ $row['total_prison']?>
								 <td class="perc"><?php
                                               $ker = ($row['total_prison']*100)/$row['total_etudiant'];
							     echo FormatNumber($ker);
								$totper4 =  FormatNumber($ker); 
								 ?></td>
								 <td><?php echo $row['total_aide'] ?></td>
								 <?php $aide=$aide+ $row['total_aide']?>
								 <td class="perc"><?php
                                                $ker = ($row['total_aide']*100)/$row['total_etudiant'];
								 echo FormatNumber($ker);
								   $totper5 = FormatNumber($ker);
								 ?></td>
								 <td><?php echo $row['total_week'] ?></td>
								 <?php $study=$study+ $row['total_week']?>
								 <td class="perc"><?php
                                                $ker = ($row['total_week']*100)/$row['total_etudiant'];
								 echo FormatNumber($ker);
								   $totper6 = FormatNumber($ker);
								 ?></td>
								  <td><?php echo $row['total_familly'] ?></td>
								  <?php $familly=$familly+ $row['total_familly']?>
								  <td class="perc"><?php
                                             $ker = ($row['total_familly']*100)/$row['total_etudiant'];
							   echo FormatNumber($ker);
								   $totper7 = FormatNumber($ker);
								 ?></td>
								 <td><?php echo $row['total_comande'] ?></td>
								 <?php $cmd=$cmd+ $row['total_comande']?>

								 <td class="perc"><?php $gen=($totper1+$totper2+$totper3+$totper4+$totper5+$totper6+$totper7)/7 ;
								 echo FormatNumber($gen);
								 ?></td>
								 <td></td>
							</tr>
							
							<?php
                             }
						    }
							}
							?>
							<tr>
							
								<td><?php echo '<span style="margin-left:5px;"></span>';?>TWESE HAMWE</td>
								<td><?php echo $et ?></td>
								<td><?php echo $pres ?></td>
								<td></td>
								<td><?php echo $visi ?></td>
								<td></td>	
								<td><?php echo $word ?></td>
								<td></td>
								<td><?php echo $seek ?></td>
								<td></td>
								<td><?php echo $prison ?></td>
								<td></td>
								<td><?php echo $aide ?></td>
								<td></td>
								<td><?php echo $study ?></td>
								<td></td>
								<td><?php echo $familly ?></td>
								<td></td>
								<td><?php echo $cmd ?></td>
								<td></td>
								<td id="empity"></td>
							</tr>
						</tbody>
					</table>
   

        <h3 align="right" class="footer">Imprimé par : <?php echo $_SESSION['nameAd'];?></h3>
       </div>
      <?php } ?>
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
        function printTable() {
            var printContents = document.getElementById("myTable").outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            
        }
</script>
<script>
            var rows, switching, i, x, y, shouldSwitch;
            tables = document.querySelectorAll("#myTable");
	      tables.forEach((table)=>{
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = parseFloat(rows[i].getElementsByTagName("TD")[19].innerHTML);
			  if(x <= 0.00){
                        table.deleteRow(i);
                        i--;
			  }
                    y = parseFloat(rows[i + 1].getElementsByTagName("TD")[19].innerHTML);
                    if (x < y) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
	})
		tables.forEach((table) => {
            var rows = table.rows;
            for (var i = 1; i < rows.length - 1; i++) {
            var k = (i<=1) ? " ére":" éme";
                rows[i].getElementsByTagName("TD")[20].innerHTML = i+k;
                
            }
        })

	</script>
	<script>
	  function PDF(elementId, fileName) {
            const element = document.getElementById(elementId);
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
  </body>
</html>
