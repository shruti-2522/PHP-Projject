

<?php
	
	$str = $_GET['str'];
	//echo $str;
	$con = mysqli_connect('localhost', 'root', '');
	if($con){
		mysqli_select_db($con, "dbfarm");
		$sql = "SELECT * FROM tblp1 WHERE item_name = '".$str."' ";
		$result = mysqli_query($con, $sql);
		foreach($result as $val){		
			$data[] = array(
							
							"batch_no" => $val['batch_no'],
							"exp_date" => $val['exp_date'],
							// "no_of_drip" => $val['no_of_drip'],
							
							
							

							
						);		
		}
		// Encoding array in JSON format
		echo json_encode($data);
	}else
		echo"connection not establish";


?>