
<?php include('config.php');?>
<?php
	$ses_id=$_SESSION['plot_id'];
	$str = $_GET['pno'];
	 $q1=mysqli_query($db,"select max(prunning_id) as maxid from tblprunning where plot_no='".$str."' and ses_id='".$ses_id."' and status=0");
     $r1=mysqli_fetch_array($q1);
     $p=$r1['maxid'];
	//echo $str;
	//$con = mysqli_connect('localhost', 'root', '');
           
		$sql = "SELECT * FROM tblprunning WHERE prunning_id = '".$p."' and ses_id=".$ses_id;
		$result = mysqli_query($db, $sql);
		foreach($result as $val){		
			$data[] = array(
							
							"date" => $val['date'],
							
							
							

							
						);		
		}
		// Encoding array in JSON format
		echo json_encode($data);


?>