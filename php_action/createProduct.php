<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if(isset($_POST)) {	

	$productName 		= $_POST['productName'];
  // $productImage 	= $_POST['productImage'];
  $quantity 			= $_POST['quantity'];
  $rate 					= $_POST['rate'];
  $brandName 			= $_POST['brandName'];
  $categoryName 	= $_POST['categoryName'];
  $productStatus 	= $_POST['productStatus'];

	// $type = $_FILES['productImage']['type'];
		
	// $url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	// $allowed_types = array("image/jpeg", "image/png", "image/jpg");
	// $image_base64 = base64_encode(file_get_contents($_FILES["productImage"]["tmp_name"]));
				
				$sql = "INSERT INTO product (product_name,  categories_id, quantity, rate, active, product_status) 
				VALUES ('$productName', '$categoryName', '$quantity', '$rate', '$productStatus', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
					echo json_encode($valid);

				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}


	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST