<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	include '../includes/db.php';
	include 'conf.php';
	if (isset($_POST['firstname'])) {
		$username 	= filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
		$email 		= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
		$password 	= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email";
			exit();
		}
		$code = codeGenerator();
		$query = $connect->prepare("SELECT * FROM register WHERE email = ? ");
		$query->execute([$email]);
		$count = $query->rowCount();

		if ($count > 0) {
			echo $email . " is already registered";
			exit();
		}

		$reserve = base64_encode($password);
		$password = password_hash($password, PASSWORD_DEFAULT);
	    
	    $QUERY = $connect->prepare("INSERT INTO `register` (`username`, `email`, `password`, `reserve`) VALUES (?, ?, ?, ?)");
	    $execute = $QUERY->execute([$username, $email, $password, $reserve]);
	    $parent_id = $connect->lastInsertId();
	    if($execute){ 
	        // $update = $connect->prepare("UPDATE register SET parent_id = ? WHERE email = ? ");
	        // $update->execute([$parent_id, $email]);
						
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
				      	<h3>Hello '.$username.'</h3>
				    	<p>Welcome to apexsoftwaredeals, we love to see you grow. </p>
				    	<p>Use the link to verify your email</p><p> https://apexsoftwaredeals.com/activation?userid='.$parent_id.'&email='.$email.'&pass='.$password.'"</p>
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
			$mail-> setFrom(EMAIL_USERNAME, 'Welcome to apexsoftwaredeals');
			$mail-> Subject = "Account Registration Successful";
			$mail->isHTML(TRUE);
			// $mail->SMTPDebug = 2;
			$mail->Body = $message;
			if($mail->send()){
				echo 'Account created please check your email inbox or spam for a verification link sent to '.$email; 
			}else{
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}  
    }
?>