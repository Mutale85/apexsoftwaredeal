<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	include "../includes/db.php";
	require_once "conf.php";
	if (isset($_POST['email'])) {
		
		$subscriber_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		if(!filter_var($subscriber_email, FILTER_VALIDATE_EMAIL)){
			echo "invalid email provided";
			exit();
		}
		
		$query = $connect->prepare("SELECT * FROM `subscribers` WHERE `subscriber_email` = ? ");
		$query->execute([$subscriber_email]);
		if ($query->rowCount() > 0) {
			echo $subscriber_email. " is already a registered";
			exit();
		}


		$sql = $connect->prepare("INSERT INTO `subscribers`( `subscriber_email`) VALUES ( ?)");
		$sql->execute([ $subscriber_email]);
		
		$message = '
				
	            <!doctype html>
					<html lang="en-US">

					<head>
					    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
					    <title>Apexsoftwaredeals</title>
					    <meta name="description" content="Apexsoftwaredeals Subscription">
					    <style type="text/css">
					        .mailDiv {
					          text-align:center;
					          border:1px solid #dddd;
					          box-shadow: 0 0 5px;
					          padding:2em;
					          letter-spacing:1.5px;
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
					      	<p align="center"><img src="'.get_gravatar($subscriber_email).'" width="80"></p>
					      	<h3>Thank you for subscribing</h3>
					    	<p>You will get a alert on a thursday of the week</p>
		            		
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
		$mail->addAddress($subscriber_email, $subscriber_email);
		$mail->AddAddress(MYEMAIL, MYUSERNAME);
		$mail-> setFrom(EMAIL_USERNAME, 'Software Deals Alert');
		$mail-> Subject = "Welcome to apex software deals";
		$mail->isHTML(TRUE);
		// $mail->SMTPDebug = 2;
		$mail->Body = $message;
		if($mail->send()){
			echo 'Thank you for subscribing, we will be sending you alerts mostly on a thursday'; 
		}else{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}

		

	}
?>