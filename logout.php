<?php
		include("includes/db.php");
		unset($_SESSION['user_id']);
		unset($_SESSION['apex_email']);
		unset($_SESSION['parent_id']);
		unset($_SESSION['username']);
		setcookie("userApexLogin", "", time() - 3600, '/');
		if(session_destroy()) {
        	header("location:./");
        }

	?>