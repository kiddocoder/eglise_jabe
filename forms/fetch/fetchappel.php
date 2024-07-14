<?php
  require_once("../../root.php");
  include(Root_path."db_connection/mysqli/conn.php");
$schoolID=$_POST['id'];
//$valid['success'] = array('success' => false, 'messages' => array());


 //$output = array( array());
 $output = [];

 if($_POST){

    $query="SELECT * FROM students  
    where schoolID=$schoolID order by  name , surname  desc ";
   
    $req = $conn->query($query);
 
if($req->num_rows>0){
$i=1;
while ($fetch = $req->fetch_array()){

$schoolID=$fetch[1];
$studentID=$fetch[0];
$name= $fetch[2];
$surname= $fetch[3];
$appel ='<select class="students" name="presence[]">
<option value="pr">present</option>
<option value="ab">abscent</option>
</select>';
$inputhidden ='<input type="hidden" name="studentID[]" value="'.$studentID.'"">';
$inputhidden2 ='<input type="hidden" name="schoolID" value="'.$schoolID.'"">';
$output[]= array(
  'schoolID'=>$inputhidden2,
    'studentID'=>$inputhidden,
    'numero' => $i,
    "nom" => $name,
   "prenom"=> $surname,
    "Appel"=>$appel
);

$i++;
}
$conn->close();
echo json_encode($output);   
 //echo json_encode($valid);

    }
}//if post


 
?>