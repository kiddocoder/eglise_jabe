
<?php
                         require_once("../../root.php");
                        include(Root_path."db_connection/mysqli/conn.php");
                        $schoolID =$_GET['id'];
						 $i=1;

						    $req = $conn->query("SELECT a.*, b.* FROM schools a, students b WHERE b.schoolID=a.schoolID AND b.schoolID = {$schoolID}");
                            $output = array('data' => array());
                            $i=1;
                            if($req->num_rows > 0) { 
                                while ($fetch = $req->fetch_array()){
                                    $increment= $i ;
                                    $studentID= $fetch[9];
                                    $active='';
                                    
                                    $update = '<button style="border: none ;" onclick="updatestudent('.$studentID.')" ><img src="./images/images/edit.png" alt="edit"></button>' ;
                                    $delete= '<button style="border: none ;" class="deletebtn" onclick="deletestudent('.$studentID.')"  data-schoolid="'.$studentID.'"><img src="./images/images/delete.png" alt="delete"></button>';
                                     $output['data'][] = array(
                                       
                                        $increment,
                                    //Nom
                                    $fetch[11],
                                    //Prénom
                                    $fetch[12],
                                    //Age date de naissance
                                    $fetch[13],
                                    //Téléphone
                                    $fetch[14],
                                    //Ecole
                                   // $fetch[1],
                                    //Commune
                                    $fetch[15],
                                    //Quartier
                                    $fetch[16],
                                    //	Avenue
                                    $fetch[17],
                                    //	No Av.
                                    $fetch[18],
                                    // action button 
                                        $update,
                                        $delete

                                     );
                                   $i++;
                                }// while 
                               
                            }// if num_rows
                            $conn->close();

                            echo json_encode($output);
								