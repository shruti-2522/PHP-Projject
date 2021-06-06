
<?php include('config.php');?>
<?php
//Include database configuration file

if(isset($_GET['sid'])){
    //Get all state data
	$sid= $_GET['sid'];

    //echo $did;
    $query = "SELECT * FROM tblntype WHERE sid = '1' ";
	$run_query = mysqli_query($db, $query);
    
    //Count total number of rows
    $count1 = mysqli_num_rows($run_query);
    
    //Display states list
    if($count1 > 0){
        
        echo '<option value="">Select Class</option>';
        while($row = mysqli_fetch_array($run_query)){
		$nid=$row['nid'];
		$name_of_sprayer=$row['name_of_sprayer'];
        echo "<option value='$nid'>$name_of_sprayer</option>";
        }
    }
    else
    {
        echo '<option value="">class not available</option>';
    }
}


?>