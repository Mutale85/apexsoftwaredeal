<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php include("incs/header.php") ?>
    	<?php 
    		if(isset($_SESSION['apex_email'])){
    			header("location:home");
    		}
    	?>
  	</head>
  	<body>
    	<?php include("incs/nav.php")?>
    	<div class="col-md-12">
    		<div class="login-page">
		        <div class="form">
		            <form class="login-form" id="LoginFormNow">
		                <h4 class="text-center">SIGN IN TO YOUR ACCOUNT</h4>
		                <input type="text" name="email" id="email" required placeholder="Email" autocomplete="off" />
		                <input type="password" name="password" id="password" required placeholder="Password" autocomplete="off" />
		                <p onclick="show()" id="showimg">SHOW</p>
		                <span id="vaild-pass"></span>
		                <button type="submit" id="loginBtn">SIGN IN</button>
		                <p class="message"><a href="#">Forgot your password?</a></p>
		            </form>
		        </div>
    		</div>
    	</div>
  	</body>
  	<script>
  			//TODO : Its a Completed Code
			
		function show() {
		  	var x = document.getElementById("password");
		  	if (x.type === "password") {
		    	x.type = "text";
		    	document.getElementById("showimg").innerText = "HIDE";
		  	} else {
		    	x.type = "password";
		    	document.getElementById("showimg").innerText = "SHOW";
		    }
		}

		var sign_in = document.getElementById('loginBtn');
		var LoginFormNow = document.getElementById('LoginFormNow');
		var email = document.getElementById('email');
		var password = document.getElementById('password');
		
		var url = 'parsers/signIn';
		var xhr = new XMLHttpRequest();
		
		LoginFormNow.addEventListener('submit', (event) => {
			event.preventDefault();
			if(email.value == ""){
				alert("email is required");
				email.focus();
				return false;
			}
			if(password.value == ""){
				alert("password is required");
				password.focus();
				return false;
			}
			
			var data = new FormData(LoginFormNow);
			xhr.open('POST', url, true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200) {
					r = xhr.responseText;
					if(r === 'Redirecting you in 1 Second'){
						loginsuccessNow("Redirecting you in 1 Second");
						setTimeout(function(){
							window.location = 'home';
						}, 1000);
					
					}else if (r === 'incorrect_password') {
						loginsuccessNow('Invalid login in credentials');
						sign_in.innerHTML = 'Sign In';
						// $('#LoginFormNow')[0].reset();
						return;
					}else if(r === 'activate'){
                    	
                    }else{
                    	loginsuccessNow(r);
                    	setTimeout(function(){
							window.location = 'login';
						}, 1500);

                    }
					sign_in.innerHTML = 'Sign In';
				}else{

				}
			}
			sign_in.innerHTML = '<div class="spinner-grow spinner-grow-sm"> </div> Processing...';
			xhr.send(data);
		})

		function loginsuccessNow(msg){
	        toastr.warning(msg);
	        toastr.options.progressBar = false;
	        toastr.options.positionClass = "toast-top-right";
	    }
  	</script>
</html>