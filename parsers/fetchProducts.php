<?php 
	include '../includes/db.php';
	if(isset($_POST['action'])){
		$user_id = $_POST['user_id'];
?>
		<div class="postedProducts">
			<h4 class="mb-5">My products</h4>
			<div class="table table-responsive">
				<table class="table table-bordered" id="ProductTables">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Product Link</th>
							<th>Date Posted</th>
							<th>Product Views</th>
							<th>Product Status </th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $connect->prepare("SELECT * FROM products WHERE user_id = ? AND user_delete = '0' ");
					        $query->execute(array($user_id));
					        if ($query->rowCount() > 0) {
					            foreach($query->fetchAll() as $row){
					                extract($row);
					                if ($posted == 0) {
					                	
					                	$post_status = '<span class="text-primary"><i class="bi bi-clipboard"></i> inReview </span>';
					                }else{
					                	$post_status = '<span class="text-success"><i class="bi bi-clipboard-check"></i> Posted</span>';
					                }

					                
						?>
							<tr>
								<td>
									<a href="products/<?php echo preg_replace("#[^a-zA-Z_&()0-9-]#", "-", strtolower($productname)) ?>" class="websiteData" id="<?php echo $id?>"> <?php echo $productname?></a>
								</td>
								<td><?php echo url_to_clickable_link($website_url);?></td>
								<td><?php echo date("d F, Y", strtotime($date_posted));?></td>
								<td><?php echo countWebClick($connect, $user_id, $id)?></td>
								<td>
									<?php echo $post_status?>
								</td>
								<td>
									<div class="btn-group">
										<a href="edit-product?productID=<?php echo base64_encode($id)?>" class=" btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
										<a href="<?php echo base64_encode($id)?>" class="removeProduct btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
										<?php if ($position == '0') {?>
										<a href="<?php echo $id?>" title="put on hold" data-action='1' class="sellProduct btn btn-info btn-sm"><i class="bi bi-play"></i> </a>
										<?php }else{ ?>
												<a href="<?php echo $id?>" title="put on hold" data-action='0' class="sellProduct btn btn-info btn-sm"><i class="bi bi-pause"></i> </a>
										<?php } ?>
									</div>
								</td>
							</tr>
						<?php 
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<script>
			$("#ProductTables").DataTable();
		</script>
<?php
	}
?>