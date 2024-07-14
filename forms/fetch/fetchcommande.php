
<?php
                         require_once("../../root.php");
                        include(Root_path."db_connection/mysqli/conn.php");
						 $i=1;
						    $req = $conn->query('SELECT * from commandes c INNER JOIN schools s ON s.schoolID= c.schoolID');
                            $output = array('data' => array());
                            $i=1;
                            if($req->num_rows > 0) { 
                                while ($fetch = $req->fetch_array()){
                                    $increment= $i ;
                                    //$schoolID= $fetch[1];
                                    $cmdID= $fetch[0];
                                   $pt = $fetch[2]*$fetch[3];
                                       $rembours=$fetch[7];
                                       $dette = $pt-$fetch[4]-$rembours;
                                       
                                    $payer = '<button style="border: none ;" onclick="updateschool('.$cmdID.')" ><img src="./images/images/edit.png" alt="edit"></button>' ;
                                    $delete= '<button style="border: none ;" class="deletebtn" onclick="deletecmd('.$cmdID.')"  data-schoolid="'.$cmdID.'"><img src="./images/images/delete.png" alt="delete"></button>';
                                    $addremb='<button style="border: none ;" class="deletebtn" onclick="addremb('.$cmdID.')"  data-schoolid="'.$cmdID.'"><img src="./images/images/edit.png" alt="delete"></button>';
                                     $output['data'][] = array(
                                       
                                        $increment,
                                       //school_name
                                       $fetch[9],
                                       //Nbre_libre
                                       $fetch[2],
                                        //pu
                                      $fetch[3].'.00FBU',
                                        //PT
                                         $pt.'.00FBU',
                                        //payer
                                          $fetch[4].'.00FBU',
                                        //date de paiment
                                          $fetch[5],
                                        //dette
                                         $dette.'.00FBU',
                                        
                                        //rembours
                                          $rembours.'.00FBU',
                                        //date de rembours
                                        $fetch[6],
                                        $delete,
                                        $addremb
                                     );
                                   $i++;
                                }// while 
                               
                            }// if num_rows
                            $conn->close();
                            header('Content-Type:application/json');
                            echo json_encode($output);
								