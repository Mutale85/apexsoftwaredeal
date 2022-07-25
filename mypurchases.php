<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	include("incs/header.php");
	if(empty($_SESSION['apex_email'])){
		header("location:./");
	}
	$userEmail =  $_SESSION['apex_email'];
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
?>
<style>
	.btn-outline-secondary {
		border-radius: 23px;
	}
	.openLink:hover {
		cursor: pointer;
		background: aliceblue;
	}
</style>

</head>
<body>
	<?php include 'incs/nav.php';?>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center mb-5">
					<h2>Welcome <?php echo $_SESSION['username']?></h2>
				</div>
				<div class="col-md-4">
					<div class="card text-center openLink"  data-link="myproducts">
						<div class="card-body">
							<h4>My Products</h4>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-center openLink" data-link="mypurchases">
						<div class="card-body">
							<h4>My Purchases</h4>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-center openLink" data-link="myanalytics">
						<div class="card-body">
							<h4>Analytics</h4>
						</div>
					</div>
				</div>
				<div class="col-md-12 mt-5 mb-5">
					<div id="fetchPurchasedProducts"></div>
				</div>
			</div>
		</div>
	</div>

	<script>
		
		$(document).on("click", ".openLink", function(){
			var url = $(this).data("link");
			window.location = url;
			// var win = window.open(url);
			// win.focus();
		})
		
		$(function(){
			$("#ProductTables").DataTable();
			$(document).on("click", ".learn-more, .productID", function(e){
				e.preventDefault();
				var siteID = $(this).attr("id");
				setCookie('productCookied', siteID, 30);
				window.location = $(this).attr("href");
			})

		})
		function setCookie(cName, cValue, expDays) {
		    let date = new Date();
		    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
		    const expires = "expires=" + date.toUTCString();
		    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
		}

		$(document).on("click", ".sellProduct", function(e){
			e.preventDefault();
			if(confirm("You wish to remove the product from listing")){
				var productID = $(this).attr("href");
				var action = $(this).data('action');
				$.ajax({
					url:"parsers/editData",
					method:"post",
					data:{action:action, productID:productID}, 
					success:function(data){
						successNow(data);
						fetchProducts();
					}
				})
			}else{
				return false;
			}
		})

		$(document).on("click", ".removeProduct", function(e){
			e.preventDefault();
			var productID_remove = $(this).attr("href");
			if(confirm("You wish to remove the product from listing")){
				$.ajax({
					url:"parsers/editData",
					method:"post",
					data:{productID_remove:productID_remove}, 
					success:function(data){
						successNow(data);
						fetchProducts();
					}
				})
			}else{
				return false;
			}
		})

		function fetchPurchasedProducts(){
			
			var customer_email = '<?php echo $_SESSION['apex_email']?>';
			var action = "fetchPurchasedProducts";
			$.ajax({
				url:"parsers/fetchPurchasedProducts",
				method:"post",
				data:{action:action, customer_email:customer_email},
				success:function(data){
					$("#fetchPurchasedProducts").html(data);
				}
			})
			
		}
		fetchPurchasedProducts();
	</script>
</body>
</html>
