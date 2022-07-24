<?php
	include "../includes/db.php";
	if(!empty($_POST['website_id'])){
		#'update'
		$website_id = $_POST['website_id'];
		$query = $connect->prepare("SELECT * FROM `products` WHERE id = ? ");
		$query->execute([$website_id]);
		$row = $query->fetch();

		if ($_FILES['cover_image']['name'] == "") {
			$cover_image = $row['cover_image'];

		}else{
			$cover_image = $_FILES['cover_image']['name'];
			$filename = $_FILES['cover_image']['tmp_name'];
			$destination = '../uploads/'.basename($cover_image);
			move_uploaded_file($filename, $destination);
		}
		extract($_POST);
		$sql = $connect->prepare(" UPDATE `products` SET `productname`= ?, `category`= ?,`website_url`= ?,`description`= ?, `monthly_currency`= ?,`amount`= ?,`selling_currency`= ?,`selling_price`= ?, `discount_link`= ?, `price_period`= ?, `cover_image`= ? WHERE id = ? ");
		$sql->execute([ $productname,  $category, $website_url, $description,  $current_plan_currency, $amount, $selling_currency, $selling_price, $discount_link, $price_period, $cover_image, $website_id]);

		echo $website_url . ' Updated';

	}else{
	
		$user_id = $_SESSION['user_id'];
		$productname =  filter_input(INPUT_POST, 'productname', FILTER_SANITIZE_SPECIAL_CHARS);
		$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
		$website_url = filter_input(INPUT_POST, 'website_url', FILTER_SANITIZE_SPECIAL_CHARS);
		$description = $_POST['description'];
		$monthly_currency = $_POST['current_plan_currency'];
		$amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_SPECIAL_CHARS);
		$selling_currency = $_POST['selling_currency'];
		$selling_price = filter_input(INPUT_POST, 'selling_price', FILTER_SANITIZE_SPECIAL_CHARS);
		$discount_link = filter_input(INPUT_POST, 'discount_link', FILTER_SANITIZE_SPECIAL_CHARS);
		$price_period = filter_input(INPUT_POST, 'price_period', FILTER_SANITIZE_SPECIAL_CHARS);
		$cover_image = $_FILES['cover_image']['name'];
		$filename = $_FILES['cover_image']['tmp_name'];
		$destination = '../uploads/'.basename($cover_image);
		move_uploaded_file($filename, $destination);
		
		$query = $connect->prepare("SELECT * FROM `products` WHERE website_url = ? ");
		$query->execute([$website_url]);
		if ($query->rowCount() > 0) {
			echo $website_url . ' has already been listed';
			exit();
		}

		$sql = $connect->prepare("INSERT INTO `products`(`user_id`, `productname`, `category`, `website_url`, `description`, `monthly_currency`, `amount`, `selling_currency`, `selling_price`, `discount_link`, `price_period`, `cover_image`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->execute([$user_id, $productname, $category, $website_url, $description, $monthly_currency, $amount, $selling_currency, $selling_price, $discount_link, $price_period, $cover_image]);
		$product_id = $connect->lastInsertId();
		
		echo $website_url."  Listed ";

	}
?>