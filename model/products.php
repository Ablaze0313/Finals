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
