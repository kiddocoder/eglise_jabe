<?php 

  session_start();
  require_once("./root.php");
 
  include(Root_path."db_connection/pdo/conn.php");
?>

<?php 

   if (isset($_SESSION['adminID'])) {
	$schoolID=$_GET['id'];
	?>

<center><h3>
<?php 
    $schoolID=$_GET['id'];
    $if1="SELECT * FROM students st  join schools s on s.schoolID=st.schoolID
           left join appels a on a.studentID=st.studentID    
     where st.schoolID=$schoolID order by  st.name , st.surname desc ";


       $i=1;
       $req = $conn->query($if1);
       $row= $req->fetch() ;
      // echo  $row['school_name'] ;
   
   ?>
   
	 <center><table border="1" cellspacing="0" width="100%" id="data_tables">
	 <caption>
			<tr>
            UMWAKA:.......................................
             MISIYONI:...................................
			 INTARA:......................................
			</tr><br>
			<TR>
				ISHENGERO:...............................................
				IGIHANDE CA:.............................................
				IGITIGIRI C'ABAZI GUSOMA NO KWANDIKA:...........
			</TR>
   </caption>
						<thead>
						 <tr>
						    
							<th>AMAZINA Y'ABAGIZE UMURWI</th>
							<th colspan="5">MUKAKARO</th>
							<th colspan="5">MYANDAGARO</th>
                            <th colspan="5">NYAKANGA</th>
                            
                            
						</tr>
						</thead>
						<tbody>
						 <?php

                         $schoolID=$_GET['id'];
                         $if="SELECT * FROM students st  join schools s on s.schoolID=st.schoolID
               
                          where st.schoolID=$schoolID order by  st.name , st.surname desc ";


                            $i=1;
						    $req = $conn->query($if);
								?> 	
									
							<tr>
								<?php
								  
								  while ($fetch = $req->fetch()){

								?>
								
						
								<td> <?php echo $i; echo '.'; echo htmlspecialchars($fetch['name']);$i++?></a>
								<?php echo htmlspecialchars($fetch['surname']) ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
								
								</tr>
                            
							<?php
							}
							?>
							<tr>
								
								<td>A.ABAJE</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>B.ABASHITSI</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>C.BOSE HAMWE</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>D. IVUGABUTUMWA:Ababwiye ubutumwa abandi</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>
                          <tr>
							<td>Ivyirwa vya Bibikiya vyatanzwe</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						  </tr>
						  <tr>
							<td>Ivyirwa vy'ijwi ry'ubuhanuzi vyatanzwe</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						  </tr>
						  <tr>
							<td>E.UKUGIRANEZA:Abagendereye abafunzwe</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						  </tr>
						  <tr>
							<td>Abagendereye abarwayi</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						  </tr>
                            <tr>
								<td>Impuzu zatanzwe</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>
							<tr>
								<td>Agaciro k'indya n'impuzu vyatanzwe </td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
                             <tr>
								<td>Igitigiri c'abantu bafashijwe n'abizera</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							 </tr>
							 <tr>
								<td>Igitigiri c'Abizera bafashije abindi bantu </td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							 </tr>

							 <tr>
								<td>Amasaha yakoreshejwe mugufasha abandi </td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							 </tr>
							 <tr>
								<td>F.UGUKURA MUVYAMPWEMU :Abize indwi</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>
							<tr>
								<td>Abakora ibikorane vyo gusenga mu muryango</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>G.IGITIGIRI C'ABATANZE AYO MARAPORO YOSE</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
                            <td>H.igitigiri c'abagize commende y'indongozi kino gice</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
							<tr>
								<td>I.MAFARANGA Y'INDONGOZI YATANZWE</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							
						</tbody>
					</table>

                    <?php
	} 
	else {
	?>
  <script>
	alert("You are not admin. Please login!");
	window.location='./index.php';
</script>
<?php
} 
?>


                    

