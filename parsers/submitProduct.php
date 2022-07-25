<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	include '../includes/db.php';
	include 'conf.php';
	if(!empty($_POST['product_id'])){
		#'update'
		$product_id = $_POST['product_id'];
		
		extract($_POST);
		$sql = $connect->prepare(" UPDATE `products` SET `productname`= ?, `category`= ?,`website_url`= ?,`description`= ?, `monthly_currency`= ?,`amount`= ?,`selling_currency`= ?,`selling_price`= ?, `discount_code` =?, `discount_link`= ?, `price_period`= ?, `cover_image`= ? WHERE id = ? ");
		$sql->execute([ $productname,  $category, $website_url, $description, $current_plan_currency, $amount, $selling_currency, $selling_price, $discount_code, $discount_link, $price_period, $cover_image, $product_id]);

		echo ' Product Updated';

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
		$discount_code = filter_input(INPUT_POST, 'discount_code', FILTER_SANITIZE_SPECIAL_CHARS);
		$discount_link = filter_input(INPUT_POST, 'discount_link', FILTER_SANITIZE_SPECIAL_CHARS);
		$price_period = filter_input(INPUT_POST, 'price_period', FILTER_SANITIZE_SPECIAL_CHARS);
		$cover_image = filter_input(INPUT_POST, 'cover_image', FILTER_SANITIZE_SPECIAL_CHARS);
		
		$query = $connect->prepare("SELECT * FROM `products` WHERE website_url = ? ");
		$query->execute([$website_url]);
		if ($query->rowCount() > 0) {
			echo $website_url . ' has already been listed';
			exit();
		}

		$sql = $connect->prepare("INSERT INTO `products`(`user_id`, `productname`, `category`, `website_url`, `description`, `monthly_currency`, `amount`, `selling_currency`, `selling_price`, `discount_code`, `discount_link`, `price_period`, `cover_image`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$sql->execute([$user_id, $productname, $category, $website_url, $description, $monthly_currency, $amount, $selling_currency, $selling_price, $discount_code, $discount_link, $price_period, $cover_image]);
		$product_id = $connect->lastInsertId();
		
		// echo $website_url."  Listed ";

		$message = '	       

	        	<!doctype html>
					<html lang="en-US">
					<head>
					    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
					    <title>Apexsoftwaredeals.com - Registration Successful</title>
					    <meta name="description" content="Apexsoftwaredeals.com - Registration Successful">
				    <style type="text/css">
				        .mailDiv {
							text-align:center;
							border:1px solid #dddd;
							box-shadow: 0 0 5px;
							padding:2em;
				        }
				      	a:link, a:active {text-decoration: none !important;}
				      
				      	p {
				        	margin:2em auto;
				      	}

						a.mainBtn {
							border:2px solid #6499cd;
							background: #6499cd;
							color:#fff;
							padding:1em .8em;
							border-radius:45px;
							text-shadow:0 0 4px;
						}
				    </style>
				</head>
				<body>
				    <div class="mailDiv">
				      	<p align="center"><img src="https://apexsoftwaredeals.com/images/logo.png" width="80"></p>
				      	<h3>Hello '.getUsername($connect, $user_id).'</h3>
				    	<p>Your Product has been posted and admin will review it before before it goes live.</p>

				    	<p>The review will be within 24 hrs.</p>
				    	<p>We appreciate you.</p>
				    </div>
				</bod>
			</html>
	    	';

			$mail = new PHPMailer();
			$mail->Host = HOST;
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->Username = EMAIL_USERNAME;
			$mail->Password = EMAIL_PASSWORD;
			$mail->SMTPSecure = "ssl";//TLS
			$mail->Port = 465; //TLS port= 587
			$mail->addAddress($email, $username); //$inst_admin_email;
			$mail->setFrom(EMAIL_USERNAME, 'Product listing to apexsoftwaredeals');
			$mail->AddAddress(MYEMAIL, MYUSERNAME);
			$mail->Subject = "Product Received ";
			$mail->isHTML(TRUE);
			// $mail->SMTPDebug = 2;
			$mail->Body = $message;
			if($mail->send()){
				echo 'You product has been received by admin, and it being reviewed'; 
			}else{
				echo "Mailer Error: " . $mail->ErrorInfo;
			}

	}
?>