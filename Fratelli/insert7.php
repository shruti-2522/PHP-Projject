<?php include('config.php'); ?>
<?php
if(!empty($_POST))
{
  extract($_POST);
 $output = '';

 $ses_id=$_SESSION['plot_id'];
  
 
mysqli_query($db,"insert into tblfruit(fruit_name,variety_name,ses_id)values('$txtfruit','$txtvariety','$ses_id')");

  
  
  
}
?>
 <select name="fruit_name" id="fruit_name" class="form-control" onclick="myfunc(this.value);">
               <option value="">Select Fruit</option>
              
                <?php
                $ses_id=$_SESSION['plot_id'];
                    $q=mysqli_query($db,"select distinct(fruit_name) from tblfruit where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $fruit_name){
                ?>
                        <option value="<?php echo $fruit_name['fruit_name'];?>"><?php echo $fruit_name['fruit_name'];?></option>
                <?php
                    }
                ?>
                  <option value="addnew" style="background-color: lightgreen"><b>Fruit not found</b>  </option>  
                </select>