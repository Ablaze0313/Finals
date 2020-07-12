<?php
	class Product{
		private $productID;
		private $productImgUrl;
	  private $productName;
	  private $productPrice;
	  private $productCategory;

	  public function __construct() {
	  	$this->productID = "";
			$this->productImgUrl = "";
	    $this->productName = "";
	    $this->productPrice = 0;
	    $this->productCategory = "";
	  }
	  public function __get($fieldName) {
	    return $this->$fieldName;
	  }
	  public function setProduct($id, $name, $img_url, $price, $category) {
	    $this->productID = $id;
	    $this->productName = $name;
			$this->productImgUrl = $img_url;
	    $this->productPrice = $price;
	    $this->productCategory = $category;
	  }
	}


	// function getItemDetails($itemName){
	//
	// 	try{
	// 		@ $db = new mysqli('127.0.0.1:3306','FrancisParrenas', 'cutesieya1010', 'webprog_finals');
	// 		$dbError = mysqli_connect_errno();
	// 		if($dbError){
	// 				throw new Exception("DB CONNECTION ERROR");
	// 		}else{
	// 			$selectQuery =
	// 			'SELECT
	// 				products.id as prod_id, img_dir, name, prices.price, categories.category, stock
	// 			FROM products
	// 				INNER JOIN prices
	// 					ON prices.id = products.price_id
	// 				INNER JOIN categories
	// 					ON categories.id = products.category_id
	// 						WHERE name = "'.$itemName.'"';
	//
	// 			$resultLogo = $db->query($selectQuery);
	// 			$dir = $resultLogo->fetch_assoc();
	//
	//
	// 			$product = new Product();
	//
	// 			$product->setProduct($dir['prod_id'], $dir['name'], $dir['img_dir'], $dir['price'], $dir['category']);
	//
	// 			$itemPrice = $product->__get('productPrice');
	//
	// 			?>
	// 				<!-- <script>
	// 					sessionStorage.setItem("price", <?php echo $itemPrice; ?>);
	// 				</script> -->
	// 			<?php
	//
	// 			echo '<div class="view-item">';
	// 				echo '<div class="products">';
	// 					echo '<div class="row">';
	// 						echo '<img class="left" src="'.$product->__get('productImgUrl').'">';
	//
	// 						echo
	// 						'<form class="right" action="add-to-cart.php" method="POST">
	// 							<h7>Name</h7>
	// 							<input class="uneditable" name="name" size="49" type="text" value="'.$product->__get('productName').'" readonly><br>
	// 							<h7>Color</h7>
	// 							<input class="uneditable" name="color" size="49" type="text" value="'.$product->__get('productColor').'" readonly><br>
	// 							<h7>Quantity</h7>
	// 							<input onchange="computePrice()" id="qty" class="uneditable" name="qty" type="number" value="1" min=1 max='.$dir['stock'].' style="width:100%;"><br>
	// 							<h7>Price</h7>
	// 							<input id="price" class="uneditable" name="price" size="49" type="text" value="'.$itemPrice.'" readonly><br>
	// 							<h8>Stock: '.$dir['stock'].'</h8>';
	//
	// 							echo '<div class="form-group">';
	// 								if(!isset($_SESSION['username']) || $dir['stock'] <= 0)	{
	// 									echo '<center><input type="submit" class="add-to-cart" value="Purchase" disabled></center>';
	// 								} else {
	// 									echo '<center><input type="submit" class="add-to-cart" value="Purchase"></center>';
	// 								}
	// 								if ($dir['stock'] <= 0) {
	// 										echo '<div class="outofstock alert alert-danger" role="alert"><center>OUT OF STOCK</center></div>';
	// 								}
	// 							echo '</div>';
	//
	// 						echo '</form >';
	// 					echo '</div>';
	// 				echo '</div>';
	// 			echo '</div>';
	// 		}
	// 		$db->close();
	// 	}catch(Exception $e){
	// 		echo $e->getMessage();
	// 	}
	// }
?>
