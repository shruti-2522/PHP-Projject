<?php include('config.php');?>

<?php
	$str = $_GET['str'];
	$ses_id=$_SESSION['plot_id'];
	//echo 'hello';
	//$con = mysqli_connect('localhost', 'root', '');
	
		$sql = "SELECT * FROM tblp1 WHERE item_name = '".$str."' and ses_id='".$ses_id."' and status=0";
		$result = mysqli_query($db, $sql);
		foreach($result as $val){		
			$data[] = array(
							
							"purchase_rate" => $val['purchase_rate'],
						  
						     "batch_no"=>$val['batch_no'],
						     "PHI"=>$val['PHI'],
						     "exp_date"=>$val['exp_date'],
						     "disease"=>$val['disease'],
                             "item_type"=>$val['item_type'],
                                "act_unit" => $val['act_unit'],
                                "reduce_qty" =>$val['reduce_qty'],
                                "dose"=> $val['dose'],
                             
                              

							
						);		
		}
		// Encoding array in JSON format
		echo json_encode($data);
	


?>