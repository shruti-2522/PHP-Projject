

<?php
include('config.php');
	
	$str = $_GET['str'];
	$ses_id=$_SESSION['plot_id'];
	//echo $str;
	//$con = mysqli_connect('localhost', 'root', '');
	
		$sql = "SELECT * FROM tblitem WHERE item_name = '".$str."' and ses_id=".$ses_id;
		$result = mysqli_query($db, $sql);
		foreach($result as $val){		
			$data[] = array(
							"item_name" => $val['item_name'],
							

							"GST"   => $val['GST'],
							"PHI"   => $val['PHI'],
							"pest"   => $val['pest'],
							"item_type" => $val['item_type'],
							"dose" => $val['dose'],
						);		
		}
		// Encoding array in JSON format
		echo json_encode($data);
	


?>