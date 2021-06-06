<?php include('config.php'); ?>
<?php
if(!empty($_POST))
{
  extract($_POST);
 $output = '';

 $ses_id=$_SESSION['plot_id'];
  
 mysqli_query($db,"insert into tblslury(content,unit,ses_id)values('$txtcontent','$txtunit1','$ses_id')");


  
  
  
}
?>
<select name="txtcontent" id="txtcontent" class="form-control" onchange="myfunc(this.value);">
        <option value="">Select Slury</option>
              
                <?php
                    $q=mysqli_query($db,"select content from tblslury where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtcontent){
                ?>
                        <option value="<?php echo $txtcontent['content'];?>"><?php echo $txtcontent['content'];?></option>
                <?php
                    }
                ?>
                  <option value="addnew" style="background-color: lightgreen"><b>Slury not found</b>  </option>  
        </select>