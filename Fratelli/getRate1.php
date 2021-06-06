<?php include('config.php');?>

<?php
$ses_id=$_SESSION['plot_id'];
	
	$str = $_GET['str'];
	//echo 'hello';
	$sql = "SELECT * FROM tblp1 WHERE item_name = '".$str."' and ses_id='".$ses_id."' and status=0";
		$result = mysqli_query($db, $sql);
		foreach($result as $val){		
			$data[] = array(
							
						"purchase_rate" => $val['purchase_rate'],
						     "act_unit" => $val['act_unit'],
						     "batch_no"=>$val['batch_no'],
						     "PHI"=>$val['PHI'],
						     "exp_date"=>$val['exp_date'],
						     "disease"=>$val['disease'],
                             "item_type"=>$val['item_type'],
                              

							
						);		
		}
		// Encoding array in JSON format
		echo json_encode($data);



?>