<?php
require_once '../ajax/db_controller.php';
session_start();
$db = new db_Controller;
$conn = $db->getConnection();
$total = null;

echo '
	<div class="container mt-5" id="result" >
	<div class="row d-flex justify-content-center" >
		<div class="col-xs-8">
			<div class="panel panel-info mx-5 mt-5">
				<div class="panel-body mx-5">
		';
if(isset($_POST['cart'])){
	foreach ($_POST['cart'] as $item) {
		$sql  = "SELECT * FROM `tabproduct` where P_ID = " . $item;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$total += $row['P_Price'];
		echo '
			<div class="row mt-5" id="Product_' . $row['P_ID'] . '">
						<div class="col">
							<img class="img-responsive mw-85 mh-85" 
							src="./../images/' . $row['P_Image'] . '.jpg">
						</div>
	
						<div class="col">
							<h4 class="product-name mt-5"><strong>' . $row['P_Name'] . '</strong></h4>
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
								<div class="d-flex align-items-end flex-column">
									<button type="button" class="btn btn-primary btn-link btn-xs mt-4 right" id="cart-delete-btn" value="' . $row['P_ID'] . '">
										<span class="glyphicon glyphicon-trash text-white">Remove</span>
									</button>
								</div>
						</div>
			</div>
			';
	}
}else{
	
echo '
<div class="container d-flex justify-content-center text-center mt-5" >
	<div class="row" id="friendly-message" style="display:none;">
		<div class="col mt-5">
				<h1>Cart is empty<br></h1>
				<h2 class="mt-5">You need to buy more :)<br></h2>
				<i class="w3-xxxlarge material-icons w3-spin mt-5" 
				style="color:black;">refresh</i>
		</div>
	</div>
</div>

<div class="container" id="cart-footer">
				<div class="row" >
					<div class="col d-flex align-items-end flex-column">
						<h4 class="text-right mx-4" id="total"><strong>Total: </strong>' . $total . ' AUD</h4>
						<button id="check-out-btn"type="button" class="btn btn-success btn-md btn-block w-50 mb-2">
							Checkout
						</button>
						<button id="continue-shopping-btn" type="button" class="btn btn-primary btn-md btn-block w-50 mb-2">
							Continue shopping
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>	
';

}
