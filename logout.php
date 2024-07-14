<?php
  
  session_start();
  unset($_SESSION["emailAd"]);
  unset($_SESSION["adminID"]);
  header("location: ./index.php");

  ?>