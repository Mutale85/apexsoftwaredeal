<?php 
	include "../includes/db.php";
	if(isset($_POST['product_id'])) {
		$query = $connect->prepare("SELECT * FROM products WHERE id = ?");
		$query->execute([$_POST['product_id']]);
		$row = $query->fetch();
		if ($row) {
			$data = json_encode($row);
		}
		echo $data;
	}

	if(isset($_POST['productID'])) {
		$action = $_POST['action'];

		$query = $connect->prepare("UPDATE products SET position = ? WHERE id = ?");
		$query->execute([$action, $_POST['productID']]);
		if ($action == "1") {
			echo "Product paused";
		}else{
			echo "Product listed for discounted sale";
		}
	}


	if(isset($_POST['productID_remove'])) {
		
		$query = $connect->prepare("UPDATE products SET user_delete = '1' WHERE id = ?");
		$query->execute([base64_decode($_POST['productID_remove'])]);
		echo "Product removed";
		
	}

	
?>