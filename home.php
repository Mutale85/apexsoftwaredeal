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
</style>

</head>
<body>
	<?php include 'incs/nav.php';?>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Welcome <?php echo $_SESSION['username']?></h2>
				</div>
				<div class="col-md-12 mt-5 mb-5">
					<div id="fetchProducts"></div>
				</div>
			</div>
		</div>
	</div>

	<script>

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

		function fetchProducts(){
			
			var user_id = '<?php echo $user_id?>';
			var action = "fetchProducts";
			$.ajax({
				url:"parsers/fetchProducts",
				method:"post",
				data:{action:action, user_id:user_id},
				success:function(data){
					$("#fetchProducts").html(data);
				}
			})
			
		}
		fetchProducts();
	</script>
</body>
</html>

</html>