<?php
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

    function getProducts(){
      try{
        @ $db = new mysqli('127.0.0.1:3306','FrancisParrenas', 'cutesieya1010', 'webprog_finals');
          $dbError = mysqli_connect_errno();
          if($dbError){
            throw new Exception("DB CONNECTION ERROR");
          } else {
            $selectCategories = 'SELECT * from categories';
            $resultCategories = $db->query($selectCategories);

            $resultCategoriesCount = $resultCategories->num_rows;

            for($ctr = 0; $ctr < $resultCategoriesCount; $ctr++){
              $category = $resultCategories->fetch_assoc();
              echo '<br>';
              echo '<h2 class="category" style="margin-left:20px; margin-top: 0px; color: white; text-align: center;">'.$category['category'].'</h2><br>';


              $selectProducts =
              'SELECT img_dir, name, prices.price as productPrice from products
                INNER JOIN prices
                  ON prices.id = products.price_id
                WHERE category_id ='.$category['id'].';';
              $result = $db->query($selectProducts);
              $resultProductsCount = $result->num_rows;


              for($ctr2 = 0; $ctr2 < $resultProductsCount; $ctr2++){
                $product = $result->fetch_assoc();
                $productLink = strtolower(str_replace(' ', '-', $product['name']));
                $productName = $product['name'];


                echo '<div class="row display-item"
                      style="display: inline-block;
                            	margin-left:40px;
                            	margin-bottom: 30px;
                            	padding: 15px;
                            	background-color: orange;
                            	border-radius: 5px;
                            	width: 19%;
                            	height: 40%;">';
                  echo '<center><h6 style="color:black; word-wrap: break-word; margin-top:0px;">'.$productName.'</h6></center>';
                  echo '<a href="products/'.$productLink.'.php"> ';
                    echo '<img class="item" src="'.$product['img_dir'].'" style="height: 150px; width: 180px;"><br>';
                  echo '</a>';
                  echo '<center><h5 style="color:black; margin-top:10px; margin-bottom:0px;">Price:</h5>
                        <h6 style="color:black; margin-top:10px; margin-bottom:0px;"> PhP '.$product['productPrice'].'.00 </h6></center>';
                echo '</div>';
              }
            }
          }

          $db->close();
      } catch (Exception $e){
        echo $e->getMessage();
      }
    }


    function getUsernameAndButton(){
      try{
        @ $db = new mysqli('127.0.0.1:3306','FrancisParrenas', 'cutesieya1010', 'webprog_finals');
          $dbError = mysqli_connect_errno();
          if($dbError){
              throw new Exception("DB CONNECTION ERROR");
          }else{

            if(!isset($_SESSION['username'])){
              echo '<h7 class="username">Welcome, Guest!&nbsp;</h7>';
              echo '<button class="log btn btn-outline-dark" data-toggle="modal" data-target="#loginModal"><strong>LOG IN</strong></button>';
            } else {
              echo '<h7 class="username">Welcome, @'.$_SESSION['username'].'!&nbsp;</h7>';
              echo '<a href="logout.php">
                      <input class="log btn btn-outline-dark" type="submit" value="LOG OUT">
                    </a>';
            }
          }
          $db->close();
        }catch (Exception $e){
          echo $e->getMessage();
        }
    }

    function getUser(){
      try {
        @ $db = new mysqli('127.0.0.1:3306','FrancisParrenas', 'cutesieya1010', 'webprog_finals');
          $dbError = mysqli_connect_errno();
          if($dbError){
              throw new Exception("DB CONNECTION ERROR");
          }else{
            $selectCurrentUser = 'SELECT * FROM currentuser';
            $resultCurrent = $db->query($selectCurrentUser);
            $resultCurrentCnt = $resultCurrent->num_rows;
            if($resultCurrentCnt >=1){
              $currentUserID = $resultCurrent->fetch_assoc();
              $selectCurrentUserID = 'SELECT username FROM users where users.id = "'.$currentUserID['id'].'"';
              $result = $db->query($selectCurrentUserID);
              $resultCnt = $result->num_rows;

              if($resultCnt >= 1){
                $currentUsername = $result->fetch_assoc();
                @ $_SESSION['username'] = $currentUsername['id'];
              } else {
                throw new Exception('ERROR GETTING USERNAME');
              }

            }
          }
          $db->close();
      } catch (Exception $e) {
        echo $e->getMessage();
      }

    }

    function getName(){
      try {
        @ $db = new mysqli('127.0.0.1:3306','FrancisParrenas', 'cutesieya1010', 'webprog_finals');
          $dbError = mysqli_connect_errno();
          if($dbError){
              throw new Exception("DB CONNECTION ERROR");
          }else{
            $selectName = 'SELECT * FROM currentuser';
            $resultName= $db->query($selectName);
            $resultNameCount = $resultName->num_rows;
            if($resultNameCount >=1){
              $resultNameID = $resultName->fetch_assoc();
              $selectFullName = 'SELECT firstname, middlename, lastname, suffix FROM users where users.id = "'.$resultNameID['id'].'"';
              $result = $db->query($selectFullName);
              $resultCnt = $result->num_rows;

              if($resultCnt >= 1){
                $currentUsername = $result->fetch_assoc();
                echo $currentUsername['firstname'].' '.$currentUsername['middlename']
                  .' '.$currentUsername['lastname'].' '.$currentUsername['suffix'].'!';

              } else {
                throw new Exception('ERROR GETTING USERNAME');
              }

            }
          }
          $db->close();
      } catch (Exception $e) {
        echo $e->getMessage();
      }

    }


 ?>
