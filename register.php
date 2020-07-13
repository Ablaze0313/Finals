<?php
  session_start();
  ob_start();
  require_once('process/process-signup.php');
  //sign up function
  if(!empty($_POST['mname'])){
    if(!empty($_POST['suffix'])){
       signup();
       echo "parehas";
    } else {
      signupMname();
      echo "mname";
    }
  } else {
    if(!empty($_POST['suffix'])){
       signupSuffix();
       echo "suffix";
    } else {
      signupNone();
      echo "none";
    }
  }
  header("Location: index.php");
  ob_end_flush();
?>
