<?php
  session_start();
  $_SESSION['checkoutprocess'] = "SET";
  if(!isset($_SESSION['checkoutprocess'])){
    header('Location: index.php');
  }
  if(@ $_SERVER['HTTPS'] == 'on'){
    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit;
  }
  require_once('view-comp/header.php');
  require_once('process/functions.php');
  require_once('process/process-add-to-cart.php');

  //sign up function
  if(isset($_POST['name']) && isset($_POST['qty']) && isset($_POST['price'])){
    //call log-in function
    $prodName = $_POST['name'];
    $prodPrice = $_POST['price'];
    $prodQty = $_POST['qty'];
    addToCart($prodQty, $prodPrice, $prodName);

  }
?>

<div class="container">
  <div class="checkout-cart">
    <div class="checkout-card">
      <br>
      <div class="card-header text-center" style="background-color:white;">
        <h2 class="text-uppercase font-weight-bold">Checkout Form</h2>
      </div>

      <div class="border card-body" style="background-color:black;">
        <div class="col-sm-9 col-md-6 col-lg-12">

          <form class="border" action="process/process-checkout-form.php" method="post">

              <div class="col-6 form-check text-white text-center">
                <br>
                <h4>Payment Method</h4>
                <br>
                <div class="modeofpayment">
                  <select class="custom-select" id="modeofpayment" name="modeofpayment" onchange="showDiv()" required>
                    <option value="cod">Cash on Delivery</option>
                    <option value="cc">Credit Card</option>
                  </select>

                </div>
              </div><br>

              <div id="creditCardInfo" class="text-center form-group col-12  py-3" style="display:none;" >
                <div class="container-fluid text-white">
                  <h4>Credit Card Details</h4>
                  <br>
                  <div class="row d-flex justify-content-center">
                    <label class="p-2 col-4 text-right float-left" for="cardNo">Credit Card Number</label>
                    <input type="text" class="form-control col-4 float-left mr-auto"
                    id="cardNo" name="cardNo" pattern="\d{4}-?\d{4}-?\d{4}-?\d{4}" title="Invalid Credit Card Number" placeholder="xxxx-xxxx-xxxx-xxxx">
                  </div>

                  <div class="row">
                    <label class="p-2 col-4 text-right float-left" for="exp">Expiry Date</label>
                    <input type="text" class="form-control col-4 float-left mr-auto"
                    id="expdate" name="expdate" title="Invalid Expiry Date" pattern="^((0[1-9])|(1[0-2]))-?([0-9][0-9])$" placeholder="MM-YY">
                  </div>

                  <div class="row">
                    <label class="p-2 col-4 text-right float-left" for="cvv">CVV</label>
                    <input pattern="\d{3}" type="text" class="form-control col-4 float-left mr-auto"
                    id="cvv" name="cvv" title="Invalid CVV" placeholder="Card Verification Value">
                  </div>
                </div>
              </div>
              <br>


              <div class="container-fluid col-12 text-white">
                <br>
                <h4>Shipping Address</h4>
                <br>
                <div class="row">
                  <label class="p-2 col-2 text-center mx-auto" for="houseNo">House Number</label>
                  <label class="p-2 col-3 text-center mx-auto" for="streetName">Street Name</label>
                  <label class="p-2 col-4 text-center mx-auto" for="barangay">Barangay</label>
                  <label class="p-2 col-2 text-center mx-auto" for="city">City</label>
                </div>

                <?php autoFillAddressInfo(); ?>

              </div>

            <div class="form-group mt-2" style="display:inline-block; width:100%;">
              <a class="btn btn-warning text-uppercase" href="index.php">Cancel</a>
              <input class="btn btn-warning text-uppercase" type="submit" value="Submit" style="margin-left:5%;">
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<?php require_once('view-comp/footer.php');?>
