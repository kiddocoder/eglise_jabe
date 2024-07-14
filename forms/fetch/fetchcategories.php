<?php

include ("../../db_connection/mysqli/conn.php");
$selectedcategories = explode(',',$_GET['categorie']);
$wherelcause = '';
$output = [];
foreach($selectedcategories as $categories){
$agerange= explode('-',$categories);
$minage = $agerange[0];
$maxage = isset($agerange[1]) ? $agerange[1] : 800;
 if($maxage){
    $wherelcause.="OR (DATEDIFF(NOW(),date_naissance)/365) BETWEEN $minage AND $maxage " ;

 }else{
    $wherelcause.="OR (DATEDIFF(NOW(),date_naissance)/365)>= $minage ";
 }
}
$wherelcause='WHERE'.ltrim($wherelcause,'OR');
$query = "SELECT * FROM students $wherelcause";
$req = $conn->query($query);
$output = array('data' => array());
$i=1;

if($req->num_rows > 0) { 
    while ($fetch = $req->fetch_array()){
        $increment= $i ;
        $studentID= $fetch[0];
        $active='';
        
        $update = '<button style="border: none ;" onclick="updatestudent('.$studentID.')" ><img src="./images/images/edit.png" alt="edit"></button>' ;
        $delete= '<button style="border: none ;" class="deletebtn" onclick="deletestudent('.$studentID.')"  data-schoolid="'.$studentID.'"><img src="./images/images/delete.png" alt="delete"></button>';
         $output['data'][] = array(
           
            $increment,
        //Nom
        $fetch[2],
        //Prénom
        $fetch[3],
        //Age date de naissance
        $fetch[4],
        //Téléphone
        $fetch[5],
        //Ecole
       // $fetch[1],
        //Commune
        $fetch[6],
        //Quartier
        $fetch[7],
        //	Avenue
        $fetch[8],
        //	No Av.
        $fetch[9],
        // action button 
            $update,
            $delete

         );
       $i++;
    }// while 
   
}// if num_rows
header('Content-Type:application/json');
$conn->close();

echo json_encode($output);

?>