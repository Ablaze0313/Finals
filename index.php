<?php
  require_once('view-comp/header.php');
  require_once('process/functions.php');
 ?>
<div class="container container-fluid" style="background-color: black;">

  <div class="fetch-Items">

    <?php getProducts(); ?>

  </div>

</div>



 <?php
  require_once('view-comp/footer.php');
  ?>
