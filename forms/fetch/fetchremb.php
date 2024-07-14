
<?php
                         require_once("../../root.php");
                        include(Root_path."db_connection/mysqli/conn.php");
						 $i=1;
                         $cmdID=$_POST['id'];
                         $output = array();
                         $query= "SELECT c.cmdID AS cmdID,s.school_name as school_name,c.rembours as rembours,(c.pu*c.Nbre_Livre-c.payer-c.rembours) as dette from commandes c INNER JOIN schools s ON s.schoolID= c.schoolID WHERE cmdID=$cmdID";
						    $req = $conn->query($query);
                            
                            $fetch = $req->fetch_array();
                                    
                            $conn->close();
                            header('Content-Type:application/json');
                            echo json_encode($fetch);
?>
       
								