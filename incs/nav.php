<?php 
	if(!isset($_SESSION['apex_email'])):
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="./"><img src="images/logo.png" alt="logo" width="40"></a>
		<div class="navbar-toggler three cols" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <div class="hamburger" id="hamburger-3">
		      	<span class="line"></span>
		      	<span class="line"></span>
		      	<span class="line"></span>
		    </div>
		</div>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
			      	<a class="nav-link warning" href="explore-deals" title="contact">Explore Deals</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link dark ml-5" aria-current="page" href="login" title="login">Login</a>
			    </li>
	    		<li class="nav-item">
	      			<a class="nav-link info ml-5" href="login" title="login">Submit Product</a>
	    		</li>
	  		</ul>
		</div>
	</div>
</nav>

<?php else:?>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="./"><img src="images/logo.png" alt="logo" width="40"></a>
		<div class="navbar-toggler three cols" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <div class="hamburger" id="hamburger-3">
		      	<span class="line"></span>
		      	<span class="line"></span>
		      	<span class="line"></span>
		    </div>
		</div>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
			      	<a class="nav-link warning" href="explore-deals" title="contact">Explore Deals</a>
			    </li>
	    		<li class="nav-item">
	      			<a class="nav-link info ml-5" href="submit-product" title="submit-product">Submit Product</a>
	    		</li>
	  		
		  		<li class="nav-item">
			      	<a class="nav-link dark ml-5" href="logout" title="logout">Sign Out</a>
			    </li>
			</ul>
		</div>
	</div>
</nav>
<?php endif;?>
<div class="container-fluid mb-5"></div>
<br><br><br><br>