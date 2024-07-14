


<?php

include("../../db_connection/mysqli/conn.php");
$valid['success'] = array('success' => false, 'messages' => array());
if ($_POST) {
    // Get form data
 
        $schoolID =$_POST['schoolID'];
       $presence = $_POST['presence'];
    $studentID= $_POST['studentID'];  
      
     $re="DELETE FROM appels  where schoolID='$schoolID'";
     $conn->query($re);
     
    
        For($i=0;$i<count($studentID);$i++){
             $schoolID =$_POST['schoolID'];
        $db_presence = $presence[$i];
    //$db_appel=$appel[$i];
     //$total= $_GET['total'];
      $db_studentID= $studentID[$i];
        
        $query = "INSERT INTO appels (appelID, studentID ,schoolID,  appel)
        values(null,'$db_studentID','$schoolID',' $db_presence')";

         if($conn->query($query) === TRUE) {
          $valid['success'] = true;
          $valid['messages'] = "Successfully Called";	
      } else {
          $valid['success'] = false;
          $valid['messages'] = "Error while Updating school";
      }
    
        
    
      }
    
    }

  
    //////////////////// 
    //archive here *******
    /////////////////////
// time
date_default_timezone_set("Etc/GMT+8");
$cur_month =  date('m', strtotime('-1 month'));
$nex_month =  date("m");
$newTableName = "archive";
      


// Step 3: Retrieve the data to be archived
$query = mysqli_query($conn, "SELECT * FROM `appels` where schoolID='$schoolID'");
while($fetch = mysqli_fetch_array($query)){
    // Step 4: Create a new table with a name based on the finished month and year
   // $month = date('m');
   // $year = date('Y');
 

    //$createTableQuery = "CREATE TABLE IF NOT EXISTS `$newTableName` ";
    //mysqli_query($conn, $createTableQuery);

    if(10< 12){
        $appelID = mysqli_real_escape_string($conn, $fetch['appelID']);
        $studentID = mysqli_real_escape_string($conn, $fetch['studentID']);
        $schoolID = mysqli_real_escape_string($conn, $fetch['schoolID']);
        $appel = mysqli_real_escape_string($conn, $fetch['appel']);
      
        
        $created_at = mysqli_real_escape_string($conn, $fetch['created_at']);
        $modified_at = mysqli_real_escape_string($conn, $fetch['modified_at']);

        // Set the date_to_play to the last day of the month at 00:00
 

        $insertQuery = "INSERT INTO `$newTableName` VALUES('', '$studentID', '$schoolID', '$appel', '$created_at', '$modified_at')";
        mysqli_query($conn, $insertQuery) or die(mysqli_error($conn));
    } else {
        echo "Not archived";
    }
  }
    // Close the connection
    $conn->close();
    echo json_encode($valid); 
  ?>