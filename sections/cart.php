<?php
require_once '../ajax/db_controller.php';
session_start();
$db = new db_Controller;
$conn = $db->getConnection();
$total = null;
echo '
<div class="container">
<div class="row d-flex justify-content-center">
	<div class="col-xs-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">
					<div class="row justify-content-between">
						<div class="col-12">
							<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
						</div>
						
					</div>
				</div>
			</div>
			<div class="panel-body">
		<br>
	';
foreach ($_POST['cart'] as $item) {
	$sql  = "SELECT * FROM `tabproduct` where P_ID = " . $item;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$total += $row['P_Price'];
	echo '
	<div class="row">
				<div class="col">
					<img class="img-responsive mw-85 mh-85" 
					src="./../images/'.$row['P_Image'].'.jpg">
				</div>
				<div class="col">
					<h4 class="product-name"><strong>' . $row['P_Name'] . '</strong></h4>
					<h4 class="mt-4">
					<small>' . $row['P_Description'] . '</small>
					</h4>
						<div class="row">
							<div class="col">
								<h6 class="mt-4"><strong>$' . $row['P_Price'] . '.00<span class="text-muted"> AUD</span></strong></h6>
							</div>
							<div class="row">
								<div class="col">
									<p class="mt-4">Quantity</p>
								</div>
								<div class="col">
									<input  type="text" class="form-control input-sm mt-3" value="1">
								</div>
							</div>
						</div>
						<button type="button" class="btn btn-primary btn-link btn-xs mt-4 right">
							<span class="glyphicon glyphicon-trash text-white">Delete Product</span>
						</button>
				</div>
	</div>
	<br>
		';
}

echo '
<div class="row">
	<div class="text-center">
			<div class="col">
				<h6 class="text-right">Added items?</h6>
			</div>
			<div class="col">
				<button type="button" class="btn btn-default btn-sm btn-block">
					Update cart
				</button>
			</div>
		</div>
	</div>
	</div>
	<div class="panel-footer">
		<div class="row text-center">
						<div class="col">
							<h4 class="text-right">Total <strong>'.$total.'</strong></h4>
						</div>
						<div class="col">
							<button type="button" class="btn btn-success btn-block">
								Checkout
							</button>
							<button type="button" class="btn btn-primary btn-sm btn-block">
								<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
							</button>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
';

