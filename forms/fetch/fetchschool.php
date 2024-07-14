
						 <?php
                         require_once("../../root.php");
                        include(Root_path."db_connection/mysqli/conn.php");
						 $i=1;
						    $req = $conn->query('SELECT*from schools');
                            $output = array('data' => array());
                            $i=1;
                            if($req->num_rows > 0) { 
                                while ($fetch = $req->fetch_array()){
                                    $increment= $i ;
                                    $schoolID= $fetch[0];
                                    $active='';
                                    $update = '<button style="border: none ;" onclick="updateschool('.$schoolID.')" ><img src="./images/images/edit.png" alt="edit"></button>' ;
                                    $delete= '<button style="border: none ;" class="deletebtn" onclick="deleteschool('.$schoolID.')"  data-schoolid="'.$schoolID.'"><img src="./images/images/delete.png" alt="delete"></button>';
                                     $schoolname= $fetch[1];
                                     $chef= $fetch[2];
                                     $telchef=$fetch[4];
                                     $secret=$fetch[3];
                                     $telsecret=$fetch[5];

                                     $output['data'][] = array(
                                        $active,
                                        $increment,
                                        $schoolname,
                                        $chef,
                                        $telchef,
                                        $secret,
                                        $telsecret,
                                        $update,
                                        $delete

                                     );
                                   $i++;
                                }// while 
                               
                            }// if num_rows
                            $conn->close();

                            echo json_encode($output);
								