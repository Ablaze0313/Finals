<?php
  session_start();
  ob_start();
  require_once('process/process-login.php');
  //sign up function
  if(isset($_POST['username']) && isset($_POST['password'])){

    //call log-in function
    login();

    header("Location: index.php");
  }
  ob_end_flush();
?>
