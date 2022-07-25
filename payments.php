<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php 
    		
    		use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;
			require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';
			include 'parsers/conf.php';
			include("incs/header.php");
    	?>
    	<style>
    		/*============== PAYMENTS PAGE ============*/
			.receipt {
				margin: 2em auto;
				width:50%;
				background:aliceblue;
				padding:1.5em;
				font-family:sans-serif;
			}
			.receipt h1 {
			  	text-align:center;
			  	color:#d1d1d1;
			  	font:uppercase;
			}
			.details {
			  	border-top:3px solid tomato;
			  	background:#fff;
			  	padding: 1.5em;
			}
			.details p {
			  	color: ;
			}
			.details h2, .details h3, .details h4, .details p {
			  	text-align:center;
			}
			.details table {
			  	width:100%;
			  	margin:2em 0;
			}
			.details table td {
			  	padding:.5em;
			}
			.receipt_print {
			  	margin-top:3em;
			}

			/*======== END OF PAYMENTS PAGE ========= */
    	</style>
  	</head>
  	<body>
    	<?php include("incs/nav.php")?>
    	<section class="sectionOne">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12 text-center">
    				<?php
    					if (isset($_GET['status']) && isset($_GET['amount']) && isset($_GET['customer_email']) && isset($_GET['product_id']) && isset($_GET['tx_ref'])) {
			    			$product_id = $_GET['product_id'];
			    			$customer_email = $_GET['customer_email'];
			    			$totalAmount = $_GET['amount'];
			    			$transaction_status = $_GET['status'];
			    			$tx_ref = $_GET['tx_ref'];
			    			$transaction_id = $_GET['transaction_id'];
			    			$customer_name = $_GET['customer_name'];
			    			$currency = $_GET['currency'];
			    			$consumer_id = $_GET['consumer_id'];

			    			if ($transaction_status == 'successful') {
			    				// update the database on the payment
			    				$posted = 1;
			    				$query = $connect->prepare("SELECT * FROM product_sells WHERE product_id = ? AND transaction_id = ? AND tx_ref = ?");
			    				$query->execute([$product_id, $transaction_id, $tx_ref]);
			    				if ($query->rowCount() > 0) {
			    					// header("location:home");
			    				?>

			    					<div class="receipt" id="printDiv">
									  	<h2 class="text-center">Apex Software Deals</h2>
									  	<div class="details">
										    <h3>Receipt From Apex Software Deals</h3>
										    <h2>USD <?php echo $totalAmount?></h2>
										    <hr>
										    <h4>Payment Details</h4>
										    <table>
										      	<tr>
											        <td>Amount Paid</td>
											        <td>USD <?php echo $totalAmount ?></td>
										      	</tr>
											    <tr>
											        <td>Payment Method</td>
											        <td>Card</td>
											    </tr>
											    <tr>
											        <td>Applicable fees </td>
											        <td>USD 0.00</td>
											    </tr>
											    <tr>
											        <td>Reference Number</td>
											        <td> <?php echo $transaction_id ?></td>
											    </tr>
										    </table>
									    	<p><?php echo date("d F, Y")?></p>
									    	<hr>
									    	<p> If you have any issues with the payment, contact Apex Software Deals at info@apexsoftwaredeals.com</p>
										    <div class="receipt_print">
										      	<p>Copy of receipt has been maild to your email: <?php echo $customer_email ?></p>
										    </div>
									  	</div>
									</div>
									<button id="print" class="btn btn-outline-primary" onclick="printContent('printDiv');" ><i class="bi bi-printer"></i> Print</button>
								<?php
			    				}else{
			    					$sql = $connect->prepare("INSERT INTO `product_sells`(`product_id`, `consumer_id`, `customer_email`, `customer_name`, `transaction_id`, `currency`, `totalAmount`, `transaction_status`, `tx_ref`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			    					$ex = $sql->execute([$product_id, $consumer_id, $customer_email, $customer_name, $transaction_id, $currency, $totalAmount, $transaction_status, $tx_ref]);
				    				if ($ex) {
				    							    			
					    		?>
			    					<div class="receipt" id="printDiv">
									  	<h2 class="text-center">Apex Software Deals</h2>
									  	<div class="details">
										    <h3>Receipt From Apex Software Deals</h3>
										    <h2>USD <?php echo $totalAmount?></h2>
										    <hr>
										    <h4>Payment Details</h4>
										    <table>
										      	<tr>
											        <td>Amount Paid</td>
											        <td>USD <?php echo $totalAmount ?></td>
										      	</tr>
											    <tr>
											        <td>Payment Method</td>
											        <td>Card</td>
											    </tr>
											    <tr>
											        <td>Applicable fees </td>
											        <td>USD 0.00</td>
											    </tr>
											    <tr>
											        <td>Reference Number</td>
											        <td> <?php echo $transaction_id ?></td>
											    </tr>
										    </table>
									    	<p><?php echo date("d F, Y")?></p>
									    	<hr>
									    	<p> If you have any issues with the payment, contact Apex Software Deals at info@apexsoftwaredeals.com</p>
										    <div class="receipt_print">
										      	<p>Copy of receipt has been maild to your email: <?php echo $customer_email ?></p>
										      	
										    </div>
									  	</div>
									</div>
									<button id="print" class="btn btn-outline-primary" onclick="printContent('printDiv');" ><i class="bi bi-printer"></i> Print</button>
								<?php 
								}
							}
						}
					}
					?>
    				</div>
    			</div>
    		</div>
    	</section>
    	<script>
    		function printContent(el){
				// $("#print").css("display", "none");
				var restorepage = $('body').html();
				var printcontent = $('#' + el).clone();
				$('body').empty().html(printcontent);
				window.print();
				$('body').html(restorepage);

			}
		</script>
    </body>
</html>