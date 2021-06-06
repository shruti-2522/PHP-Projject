<?php include('config.php');?>

<?php
	$ses_id=$_SESSION['plot_id'];
	$str = $_GET['str'];
	
		$sql = "select discnopls,corenopls,nozzle_type from tblsprayer where sprayer_name IN (select nid from tblntype where name_of_sprayer='".$str."') and ses_id=".$ses_id;
		$result = mysqli_query($db, $sql);
		foreach($result as $val){		
			$data[] = array(
							
							"corenopls" => $val['corenopls'],
							"discnopls" => $val['discnopls'],
							"nozzle_type" => $val['nozzle_type'],
							// "no_of_drip" => $val['no_of_drip'],
							
							
							

							
						);		
		}
		// Encoding array in JSON format
		echo json_encode($data);
	


?>