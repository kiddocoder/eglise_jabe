
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Control Admin Panel</title>
	<link rel="shortcut icon" href="<?php echo base_url;?>images/images/admi.png" type="image/x-icon">
	<!-- css -->
	<link rel="stylesheet" href="<?php echo base_url;?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url;?>assets/css/admin.css">
	<link rel="stylesheet" href="<?php echo base_url;?>assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url;?>assets/bootstrap/css/bootstrap.css">

	<!-- Css Datatable -->
	<link rel="stylesheet" href="<?php echo base_url;?>assets/DataTables/DataTables-1.13.4/css/dataTables.bootstrap5.css">
	<link rel="stylesheet" href="<?php echo base_url;?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url;?>assets/DataTables/DataTables-1.13.4/css/jquery.dataTables.min.css">

    <!-- bootstrap theme-->
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
	<!-- Link js and jquery Datatables-->
    <script src="<?php echo base_url;?>assets/DataTables/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="<?php echo base_url;?>assets/DataTables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>

	<!-- jquery -->
	<script src="assets/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script> 
	<!-- Link js and jquery Datatables-->
    <script src="<?php echo base_url;?>assets/DataTables/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="<?php echo base_url;?>assets/DataTables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script> 
  
</head>

<body>

	<!-- for header part -->
	<header>

		<div class="logosec">
			<div class="logo-admin"><i class="fa-solid fa-dashboard"></i> Dashboard</div>
			<i class="icn menuicn fa-solid fa-bars" id="menuicn"></i>
		</div>
		<div class="message">
			<div class="dp">
			<?php
            if (isset($_SESSION['adminID'])) {
             ?>
             <a style="text-transform: capitalize;" href="<?php echo base_url;?>logout.php">
			<?php echo $_SESSION['nameAd']; ?>
			</a>
            <?php
            }else
             ?>
			</div>
		</div>

	</header>
