<?php include('config.php');?>

<?php
	
	
	$ses_id=$_SESSION['plot_id'];
	$str = $_GET['str'];
	//echo $str;
	//$con = mysqli_connect('localhost', 'root', '');
	
		$sql = "SELECT * FROM plot WHERE plot_no = '".$str."' and ses_id=".$ses_id;
		$result = mysqli_query($db, $sql);
		foreach($result as $val){		
			$data[] = array(
							
							"fruit_name" => $val['fruit_name'],
							"variety"=>$val['variety']
							

							
						);		
		}
		// Encoding array in JSON format
		echo json_encode($data);
	


?>