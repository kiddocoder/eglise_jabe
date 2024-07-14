
<?php
include("../../db_connection/mysqli/conn.php");
$valid['success'] = array('success' => false, 'messages' => array());
 if(isset($_POST['selectedata'])){
 $appel=$_POST['selectedata'];
 // Get form data
 $visitor = isset($_POST['visitor']) ? $_POST['visitor'] : 0;
 $total_prayer = isset($_POST['total_prayer']) ? $_POST['total_prayer'] : 0;
 $visitor_seek = isset($_POST['visitor_seek']) ? $_POST['visitor_seek'] : 0;
 $visitor_prison = isset($_POST['visitor_prison']) ? $_POST['visitor_prison'] : 0;
 $student_week = isset($_POST['student_week']) ? $_POST['student_week'] : 0;
 $family_prayer = isset($_POST['family_prayer']) ? $_POST['family_prayer'] : 0;
 $commende = isset($_POST['commende']) ? $_POST['commende'] : 0;
 $total_gift = isset($_POST['total_gift']) ? $_POST['total_gift'] : 0;
   ;
    // Insert a new class record
  Foreach($appel as $value){
    if(isset($appel)){
    $query = "INSERT INTO calls (callID, schoolID ,gift,  parole , visitor_seek , visitor_prison ,visitor,week_study , commende ,familly_prayer)
    values(null,'$value','$total_gift',' $total_prayer','$visitor_seek','$visitor_prison','$visitor','$student_week','$commende','$family_prayer')";
     
    }
    if($conn->query($query) === TRUE) {
      $valid['success'] = true;
      $valid['messages'] = "Successfully Called";	
  } else {
      $valid['success'] = false;
      $valid['messages'] = "Error while Updating school";
  }
    
  }
}else{
  $valid['success'] = false;
  $valid['messages'] = "Please fill out school records"; 
}
    // Close the connection
    $conn->close();
    echo json_encode($valid); 
?>