<?php 
  session_start();
  require_once("./root.php");
  include(Root_path."include/header_admin.php");
  include(Root_path."include/side_bar_admin.php"); 
  include(Root_path."db_connection/mysqli/conn.php");
  $query = "SELECT * FROM report";
  $result = mysqli_query($conn, $query);
  $i = 1;
  $tr = '';
  $base_url = base_url ;
  ?>
<?php 
  if (isset($_SESSION['emailAd'])) {
  ?>
<div class="box-container">
</div>
<div class="report-container">
<div class="report-header">
  <button class="view" onclick="window.location='<?php echo base_url;?>imprimer.php'"><img src="../images/images/add.png" alt=""> Imprimer</button>
</div>
<!-- Datatable -->
<div class="datatable" style="overflow-x: auto; width: 100%; margin-top: 5px;">
<center>
<table id="myTable" border="2" cellspacing="0" cellpadding="0"  class="table table-striped" id="data_tables">
  <thead>
    <tr>
      <th></th>
      <th>Rapport</th>
      <th>Status</th>
      <th>Imprimer</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while( $row = mysqli_fetch_assoc($result)){
        $tr =<<<HTML
             <tr>
                  <td>{$i}</td>
                  <td>{$row['report_date']}</td>
                  <td>{$row['status']}</td>
                  <td><a href="{$base_url}imprimer.php?date={$row['report_date']}">Imprimer</a></td>
                  <td><button style="border: none;" class="deletebtn" onclick="return confirm('Are you sure to delete it !')"><img src="./images/images/delete.png" alt="delete"></button>
                 </td>
            <tr>
        HTML;
        echo $tr ;
        $i++;
      }
    ?>
    <tr>
    </tr>
  </tbody>
</table>
<?php
  } 
  else {
  ?>
<script>
  alert("You are not Admin!");
  window.location='./index.php';
</script>
<?php
  } 
  ?>
</body>
</html>