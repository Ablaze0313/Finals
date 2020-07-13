<?php
    session_start();
    if(isset($_SESSION['checkoutprocess'])){
      unset($_SESSION['checkoutprocess']);
    }
    if(@ $_SERVER['HTTPS'] != 'on'){
      header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
      exit;
    }

  require_once('view-comp/header.php');
  require_once('process/functions.php');
  require_once('process/process-search.php');

  if(!isset($_SESSION['username'])){
    getUser();
  }
 ?>

  <div class="container container-fluid" style="background-color: black;">

    <div class="fetch-Items">

      <?php
      
          if(isset($_GET['search'])){
            getSearchProduct($_GET['search']);
          } else{
            getProducts();
          }

      ?>

    </div>

  </div>


 <?php
  require_once('view-comp/footer.php');

  if(isset($_SESSION['login-error'])){ // wrong username or wrong password
    //echo '<script> alert("'.$_SESSION['login-error'].'");</script>';
?>
  <script> $('#loginModal').modal('show');</script>
<?php
    unset($_SESSION['login-error']);
    }
    if(isset($_SESSION['login-first'])){ // click yung cart while not logged in
?>
    <script> $('#loginModal').modal('show');</script>
<?php
    unset($_SESSION['login-first']);
    }
    if(isset($_SESSION['signup-error'])){ // username is not unique
?>
    <script> $('#signupModal').modal('show');</script>
<?php
    unset($_SESSION['signup-error']);
    }
?>
