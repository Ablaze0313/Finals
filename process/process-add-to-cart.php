<?php
  function addToCart($qty,$price, $productName){
    try {
      @ $db = new mysqli('127.0.0.1:3306','FrancisParrenas', 'cutesieya1010', 'webprog_finals');
	   		$dbError = mysqli_connect_errno();
		    if($dbError){
		      	throw new Exception("DB CONNECTION ERROR");
		    }else{
          $selectProdID = 'SELECT products.id as prodID FROM products WHERE name = "'.$productName.'"';
          $resultProdID = $db->query($selectProdID);
          $prodID = $resultProdID->fetch_assoc();
          if($prodID){
            $selectUserID = 'SELECT users.id as userID FROM users WHERE username = "'.$_SESSION['username'].'"';
            $resultUserID = $db->query($selectUserID);
            $userID = $resultUserID->fetch_assoc();
            if($userID){
             $selectProdID;
             $cart_item = 'SELECT * from cart WHERE product_id = '.$prodID['prodID'].'';
             $resultCartItems = $db->query($cart_item);
             $count = $resultCartItems->num_rows;
             if ($count>0) {
                
             }else {
                $insertToCart = 'INSERT INTO cart (qty, price, product_id, user_id) VALUES (?,?,?,?)';
                $stmt = $db->prepare($insertToCart);
                $stmt->bind_param('iiii', $qty, $price, $prodID['prodID'], $userID['userID']);
                $stmt->execute();
                if(!$stmt){
                  throw new Exception("EXCEPTION INSERT");
                } else {

                  $stmt->close();

                }
            }
          } else {
            throw new Exception("EXCEPTION USERID");
          }
        } else {
          throw new Exception("EXCEPTION PRODID");
        }
      }
      $db->close();
    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }
?>
