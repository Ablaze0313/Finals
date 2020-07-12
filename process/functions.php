<?php

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
              echo '<h3 class="category" style="margin-left:20px; margin-top: 0px; color: white; text-align: center;">'.$category['category'].'</h3><br>';


              $selectProducts =
              'SELECT img_dir, name, prices.price as prodPrice from products
                INNER JOIN prices
                  ON prices.id = products.price_id
                WHERE category_id ='.$category['id'].';';
              $resultProducts = $db->query($selectProducts);
              $resultProductsCount = $resultProducts->num_rows;


              for($ctr2 = 0; $ctr2 < $resultProductsCount; $ctr2++){
                $product = $resultProducts->fetch_assoc();
                $productNameLink = strtolower(str_replace(' ', '-', $product['name']));
                $productName = $product['name'];

          
                echo '<div class="row display-item"
                      style="display: inline-block;
                            	margin-left:40px;
                            	margin-bottom: 30px;
                            	padding: 15px;
                            	background-color: orange;
                            	border-radius: 20px;
                            	width: 19%;
                            	height: 40%;">';
                  echo '<center><h6 style="color:black; word-wrap: break-word; margin-top:0px;">'.$productName.'</h6></center>';
                  echo '<a href="products/'.$productNameLink.'.php"> ';
                    echo '<img class="item" src="'.$product['img_dir'].'" style="height: 150px; width: 180px;"><br>';
                  echo '</a>';
                  echo '<center><h5 style="color:black; margin-top:10px; margin-bottom:0px;">Price:</h5>
                        <h6 style="color:black; margin-top:10px; margin-bottom:0px;"> PhP '.$product['prodPrice'].'.00 </h6></center>';
                echo '</div>';
              }
            }
          }

          $db->close();
      } catch (Exception $e){
        echo $e->getMessage();
      }
    }


 ?>
