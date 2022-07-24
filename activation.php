<base href="http://localhost/apexsoftwaredeals.com/">
<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php include("incs/header.php") ?>
 	</head>
  	<body>
    	<?php include("incs/nav.php")?>
		<section>
			<div class="container-fluid mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<?php 
								if (isset($_GET['userid']) AND isset($_GET['email']) AND isset($_GET['pass'])) {
									$pass = filter_input(INPUT_GET, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
									$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
									$id = filter_input(INPUT_GET, 'userid', FILTER_SANITIZE_SPECIAL_CHARS);
									// check db for code, id, and email
									$query = $connect->prepare("SELECT * FROM `register` WHERE `id`= ? AND `email` = ? AND `password` = ? ");
									$query->execute([$id, $email, $pass ]);
									if ($query->rowCount() > 0) {
										$row = $query->fetch();
										$username = $row['username'];
										$verified = '1';
										$sql = $connect->prepare("UPDATE `register` SET `verified` = ? WHERE `id` = ? AND `email` = ? AND `password` = ? ");
										$ex = $sql->execute([$verified, $id, $email, $pass]);
										if ($ex) {?>

											<div class="card text-center">
												<div class="card-header">
													<h4>Hello <?php echo $username ?></h4>
												</div>
												<div class="card-body">
													
													<p>Your account has been activated, you can now post or buy discounted software and e-books</p>
												</div>
												<div class="card-footer">
													<a href='login' class='btn btn-outline-secondary '>Login</a>
												</div>
											</div>
											
							<?php
										}
										
									}else{
										echo '<h4>Your are missing something!</h4>';
										exit();
									}
								}else{
									header("location:./");
								}
							?>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
		</section>
  	</body>
</html>