<?php
$id = $_POST['id'];
$username = 'root';
$password = '';
$dbname='eglise_db';
$servername='localhost';

$conn = new mysqli($servername, $username, $password, $dbname);
$valid['success'] = array('success' => false, 'messages' => array());

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($id){
 $query= "DELETE FROM schools WHERE schoolID= {$id}";
 $query2= "DELETE FROM students WHERE schoolID= {$id}";
 $conn->query($query2);
if($conn->query($query) === TRUE) {
      $valid['success'] = true;
      $valid['messages'] = "Successfully Deleted";	
  } else {
      $valid['success'] = false;
      $valid['messages'] = "Error while deleting  a school";
  }
  
      // Close the connection
      $conn->close();
  
      echo json_encode($valid);
}

?>