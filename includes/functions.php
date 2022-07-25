<?php
	function getUserIpAddr(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	function time_ago_check($time){
		// date_default_timezone_set("Africa/Lusaka");
		$time_ago 	= strtotime($time);
		$current_time = time();
		$time_difference = $current_time - $time_ago;
		$seconds = $time_difference;
		//lets make tround thes into actual time.
		$minutes 	= round($seconds / 60);
		$hours		= round($seconds / 3600);
		$days 		= round($seconds / 86400);
		$weeks   	= round($seconds / 604800); // 7*24*60*60;  
		$months  	= round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
		$years   	= round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if ($seconds <= 60) {
			return "$seconds Seconds Ago";
		}else if ($minutes <= 60) {

			if ($minutes == 1) {
				return "1 minute Ago";
			}else{
				return "$minutes minutes ago";
			}
			
		}else if ($hours <= 24) {
			if ($hours == 1) {
				return "1 hour ago";
			}else{
				return "$hours hrs ago";
			}
		}else if ($days <= 7) {
			if ($days == 1) {
				return "1 day ago";
			}else{
				return "$days days ago";
			}
		}else if ($weeks < 7) {
			if ($weeks == 1) {
			
				return "1 week ago";
			}else{
				return "$weeks Weeks ago";
			}
		}else if ($months <= 12) {
			if ($months == 1) {
				return "1 month ago";
			}else{
				return "$months Months ago";
			}
		}else {
			if ($years == 1) {
				return "One year ago";
			}else{
				return "$years years ago";
			}
		}
	}

	function getUsername($connect, $id){
		$output = "";
		$query = $connect->prepare("SELECT * FROM register WHERE id = ? ");
		$query->execute(array($id));
		$row = $query->fetch();
		if ($row) {
			extract($row);
			$output = $username;
		}
		return $output;
	}

	function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}

	function countWebClick($connect, $user_id, $website_id){
		$output = '';
		$check = $connect->prepare("SELECT * FROM website_clicks WHERE user_id = ? AND website_id = ? ");
        $check->execute([$user_id, $website_id]);
        if ($check->rowCount() > 0) {
        	$row = $check->fetch();
        	if ($row) {
        		$output = $row['clicks'];
        	}
        }else{
        	$output = 0;
        }
        return $output;
	}

	function countAppClicks($connect, $user_id, $application_id){
		$output = '';
		$check = $connect->prepare("SELECT * FROM application_clicks WHERE user_id = ? AND application_id = ? ");
        $check->execute([$user_id, $application_id]);
        if ($check->rowCount() > 0) {
        	$row = $check->fetch();
        	if ($row) {
        		$output = $row['clicks'];
        	}
        }else{
        	$output = 0;
        }
        return $output;
	}

	function countWords($words){
		$pieces = explode(" ", $words);
		$first_part = implode(" ", array_splice($pieces, 0, 8));
		return $first_part;
	}

	function countWordsEmail($words){
		$pieces = explode(" ", $words);
		$first_part = implode(" ", array_splice($pieces, 0, 1));
		return $first_part;
	}

	function url_to_clickable_link($str){
	    $find = array('`((?:https?|ftp)://\S+[[:alnum:]]/?)`si', '`((?<!//)(www\.\S+[[:alnum:]]/?))`si');
	    $replace = array('<a href="$1" target="_blank">$1</a>', '<a href="http://$1" target="_blank">$1</a>');
	    return preg_replace($find,$replace,$str);
	}

	function codeGenerator() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $password = array(); 
	    $alphabet_Length = strlen($alphabet) - 1;
	    for ($i = 0; $i < 9; $i++) {
	        $new = rand(0, $alphabet_Length);
	        $password[] = $alphabet[$new];
	    }
	    return implode($password); //turn the array into a string
	}


	function newRegistration($email, $username){
		$email = 'mutamuls@gmail.com';
		$username = 'Mutale';
		$mail = new PHPMailer();
		$mail->Host = HOST;
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL_USERNAME;
		$mail->Password = EMAIL_PASSWORD;
		$mail->SMTPSecure = "ssl";//TLS
		$mail->Port = 465; //TLS port= 587
		$mail->addAddress($email, $username); //$inst_admin_email;
		$mail-> setFrom(EMAIL_USERNAME, 'New Sign Up');
		$mail-> Subject = "New has signed up";
		$mail->isHTML(TRUE);
		// $mail->SMTPDebug = 2;
		$mail->Body = $message;
		if($mail->send()){
			// echo 'Account created please check your email inbox or spam for a verification link sent to '.$email; 
		}else{
			// echo "Mailer Error: " . $mail->ErrorInfo;
		}
	}
?>