<?php
  require_once("../../root.php");
  include(Root_path."db_connection/mysqli/conn.php");
  $studentID = $_POST['id'];

  $query = "SELECT st.*,s.school_name as school_name FROM students st JOIN schools s ON s.schoolID = st.schoolID WHERE st.studentID=$studentID";
  $result = $conn->query($query);
 
      if($result->num_rows>0){
        $row=$result->fetch_array();
       
      
      }  // if num rows  
      
      $conn->close();
      header('Content-Type: application/json');
   echo json_encode($row);
                        
    ?>