<?php
function getSearchProduct($searchWord){
  try {
    @ $db = new mysqli('127.0.0.1:3306','FrancisParrenas', 'cutesieya1010', 'webprog_finals');
    $dbError = mysqli_connect_errno();
    if($dbError){
        throw new Exception("DB CONNECTION ERROR");
    }else{
      echo '<br><h5 class="category" style="color:white;"> You searched for: '.$searchWord.'</h5><br>';

      $selectQuery =
      'SELECT img_dir, name, prices.price as prodPrice from products
        INNER JOIN prices
          ON prices.id = products.price_id
        WHERE name LIKE ?';
      $stmt = $db->prepare($selectQuery);
      $searchWord = '%'.$searchWord.'%';
      $stmt->bind_param('s',$searchWord);
      $stmt->execute();
      $stmt->store_result();

      $stmt->bind_result($img_dir, $name, $prodPrice);

      $count = $stmt->num_rows;

      if($count>0){
        for($ite = 0; $ite < $count; $ite++){
          $item = $stmt->fetch();
          $productName = strtolower(str_replace(' ', '-', $name));
          echo '<div class="row display-item"
                style="display: inline-block;
                        margin-left:40px;
                        margin-bottom: 30px;
                        padding: 15px;
                        background-color: orange;
                        border-radius: 5px;
                        width: 19%;
                        height: 40%;">';
            echo '<center><h6 style="color:black; word-wrap: break-word; margin-top:0px;">'.$name.'</h6></center>';
            echo '<a href="'.$productName.'.php"> ';
              echo '<img class="item" src="'.$img_dir.'" style="height: 150px; width: 180px;"><br>';
            echo '</a>';
            echo '<center><h5 style="color:black; margin-top:10px; margin-bottom:0px;">Price:</h5>
                  <h6 style="color:black; margin-top:10px; margin-bottom:0px;"> PhP '.$prodPrice.'.00 </h6></center>';
          echo '</div>';
        }
      } else {
        echo '<br><h5 class="category" style="color:white;">Sorry we couldn\'t find what you\'re looking for.</h5>';
        echo '<h5 class="category" style="color:white;">Try using a different keyword.</h5><br><br>';
      }


    }
  } catch (Exception $e){
    echo $e->getMessage();
  }
}
?>
