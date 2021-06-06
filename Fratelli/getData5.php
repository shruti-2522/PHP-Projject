 <?php include('config.php');?>
<?php
	$ses_id=$_SESSION['plot_id'];
	$str = $_GET['str'];
		$sql = "SELECT * FROM plot WHERE plot_no = '".$str."'  and ses_id=".$ses_id;
		$result = mysqli_query($db, $sql);
		foreach($result as $val){		
			$data[] = array(
							
							"pname" => $val['pname'],
							"harvesting_days" => $val['harvesting_days'],



							
						);		
		
		// Encoding array in JSON format
		echo json_encode($data);
	}


?>