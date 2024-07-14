<?php
  require_once("../../root.php");
  include(Root_path."db_connection/mysqli/conn.php");



 $output = [];

 

    $query="SELECT * FROM schools order by  school_name desc ";
   
    $req = $conn->query($query);
 
if($req->num_rows>0){
$i=1;
while ($fetch = $req->fetch_array()){
   
$schoolID=$fetch[0];
$name= $fetch[1];
$visitor='<input type="number" name="visitor">';
$total_prayer='<input type="number" name="total_prayer">';
$visitor_seek='<input type="number" name="visitor_seek">';
$visitor_prison='<input type="number" name="visitor_prison">';
$total_gift='<input type="number" name="total_gift">';
$student_week='<input type="number" name="student_week">';
$family_prayer='<input type="number" name="family_prayer">';
$commende='<input type="number" name="commende">';
$checkbox ='<input type="checkbox" name="selectedata[]" value="'.$schoolID.'">';

$output[]= array(
    'numero' => $i,
    "nom" => $name,
    "visitor"=>$visitor,
    "total_prayer"=>$total_prayer,
    "visitor_seek"=>$visitor_seek,
    "visitor_prison"=>$visitor_prison,
    "total_gift"=>$total_gift,
    "student_week"=>$student_week,
    "family_prayer"=>$family_prayer,
    "commende"=>$commende,
    "checkbox"=>$checkbox

);

$i++;
}
$conn->close();
echo json_encode($output);   


    }



 
?>