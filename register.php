<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php include("incs/header.php") ?>
    	<?php if(isset($_SESSION['apex_email'])){?>
    		<script>
    			window.location = 'home';
    		</script>
    	<?php }?>
  	</head>
  	<body>
    	<?php include("incs/nav.php")?>
    	<div class="col-md-12">
    		<div class="login-page">
		        <div class="form">
		            <form class="login-form" id="registerForm">
		                <h4 class="text-center">CREATE YOUR ACCOUNT</h4>
		                <input type="text" name="firstname" id="firstname" required placeholder="Firstname" autocomplete="off" />
		                <input type="text" name="email" id="email" required placeholder="Email" autocomplete="off" />
		                <input type="password" name="password" id="password" required placeholder="Password" autocomplete="off" />
		                <p onclick="show()" id="showimg">SHOW</p>
		                <span id="vaild-pass"></span>
		                <button type="submit" id="submitBtn">SIGN UP</button>
		                <p class="message"><a href="login" title="login">You have an account?</a></p>
		            </form>
		            <div id="popover-password">
                        <p><span id="result"></span></p>
                        <div class="progress">
                            <div id="password-strength" 
                                class="progress-bar" 
                                role="progressbar" 
                                aria-valuenow="40" 
                                aria-valuemin="0" 
                                aria-valuemax="100" 
                                style="width:0%">
                            </div>
                        </div>
                        <ul class="list-unstyled">
                            <li class="">
                                <span class="low-upper-case">
                                    <i class="bi bi-circle" aria-hidden="true"></i>
                                    &nbsp;Lowercase &amp; Uppercase
                                </span>
                            </li>
                            <li class="">
                                <span class="one-number">
                                    <i class="bi bi-circle" aria-hidden="true"></i>
                                    &nbsp;Number (0-9)
                                </span> 
                            </li>
                            <li class="">
                                <span class="one-special-char">
                                    <i class="bi bi-circle" aria-hidden="true"></i>
                                    &nbsp;Special Character (!@#$%^&*)
                                </span>
                            </li>
                            <li class="">
                                <span class="eight-character">
                                    <i class="bi bi-circle" aria-hidden="true"></i>
                                    &nbsp;Atleast 8 Character
                                </span>
                            </li>
                        </ul>
                    </div>
		        </div>
    		</div>
    	</div>
  	</body>
  	<script>
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

		let state = false;
		let password = document.getElementById("password");
		let passwordStrength = document.getElementById("password-strength");
		let lowUpperCase = document.querySelector(".low-upper-case i");
		let number = document.querySelector(".one-number i");
		let specialChar = document.querySelector(".one-special-char i");
		let eightChar = document.querySelector(".eight-character i");

		password.addEventListener("keyup", function(){
		    let pass = document.getElementById("password").value;
		    checkStrength(pass);
		});
function checkStrength(password) {
		    let strength = 0;

		    //If password contains both lower and uppercase characters
		    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
		        strength += 1;
		        lowUpperCase.classList.remove('bi-circle');
		        lowUpperCase.classList.add('bi-check');
		    } else {
		        lowUpperCase.classList.add('bi-circle');
		        lowUpperCase.classList.remove('bi-check');
		    }
		    //If it has numbers and characters
		    if (password.match(/([0-9])/)) {
		        strength += 1;
		        number.classList.remove('bi-circle');
		        number.classList.add('bi-check');
		    } else {
		        number.classList.add('bi-circle');
		        number.classList.remove('bi-check');
		    }
		    //If it has one special character
		    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
		        strength += 1;
		        specialChar.classList.remove('bi-circle');
		        specialChar.classList.add('bi-check');
		    } else {
		        specialChar.classList.add('bi-circle');
		        specialChar.classList.remove('bi-check');
		    }
		    //If password is greater than 7
		    if (password.length > 7) {
		        strength += 1;
		        eightChar.classList.remove('bi-circle');
		        eightChar.classList.add('bi-check');
		    } else {
		        eightChar.classList.add('bi-circle');
		        eightChar.classList.remove('bi-check');   
		    }

		    // If value is less than 2
		    if (strength < 2) {
		        passwordStrength.classList.remove('progress-bar-warning');
		        passwordStrength.classList.remove('progress-bar-success');
		        passwordStrength.classList.add('progress-bar-danger');
		        passwordStrength.style = 'width: 10%';
		    } else if (strength == 3) {
		        passwordStrength.classList.remove('progress-bar-success');
		        passwordStrength.classList.remove('progress-bar-danger');
		        passwordStrength.classList.add('progress-bar-warning');
		        passwordStrength.style = 'width: 60%';
		    } else if (strength == 4) {
		        passwordStrength.classList.remove('progress-bar-warning');
		        passwordStrength.classList.remove('progress-bar-danger');
		        passwordStrength.classList.add('progress-bar-success');
		        passwordStrength.style = 'width: 100%';
		    }
		}

		// signup 

		$(function(){
			$("#registerForm").submit(function(e){
				e.preventDefault();
				var data = $(this).serialize();
				$.ajax({
					url:"parsers/signUp",
					method:"POST",
					data:data,
					beforeSend:function(){
						$("#submitBtn").html("<span class='spinner-grow spinner-grow-sm'></span> Processing...");
					},
					success:function(data){
						errorNow(data)
						$("#registerForm")[0].reset();
						$("#submitBtn").html("Create Account");
					}

				})

			})
		})
  	</script>
</html>