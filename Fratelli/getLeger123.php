<!DOCTYPE html>
<html>
<head>
  <?php include('head.php');?>
<?php include ("config.php");?>
</head>
<body class="sb-nav-fixed">
  <br><br>
  
<?php
$ses_id=$_SESSION['plot_id'];
$q = strval($_GET['q']);
 $q11=mysqli_query($db,"select count(*) as cnt from tblmultitem where supplier = '".$q."' and supplier!='cash' and ses_id='".$ses_id."'" );
 $r11=mysqli_fetch_array($q11);
 
$sql="SELECT * from tblledger WHERE name = '".$q."' and  ses_id='".$ses_id."' ";
$ex=$r["name"];
 $q1=mysqli_query($db,"select * from tblled_bank,tblledger where tblledger.name = '".$q."' and tblled_bank.email=tblledger.email" );
 $r1=mysqli_fetch_array($q1);    
$result = mysqli_query($db,$sql);
while($r=mysqli_fetch_array($result)) {
  ?>
  
<table  align="center" class="table table-borderless" style="width:80%; margin-left:-1%">

 <tr><?php
 if($r["under"]=="Bank Accounts")
  {
    
  ?>
<tr>
      <td><font color="Black"><b>
      Name :</b></font>
    </td>
     <td>
      <font color="Black"><?php echo $r["name"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Under :</b></td></font>
     <td>
      <font color="Black"><?php echo $r["under"];?></font>
    </td>
  </tr>

  <tr>
   <td>  <font color="Black"><b>Bank Holder Name :</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["holder"];?></font>
    </td>
  </tr>


   <tr>
   <td><font color="Black"><b>Account No :</b></td></font>
     <td>

      <font color="Black"><?php echo $r1["acc_no"];?></font>
    </td>
  </tr>

<tr>
    <td>  <font color="Black"><b>Branch :</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["branch"];?></font>
    </td>
  </tr>

<tr>
    <td>  <font color="Black"><b>IFSC :</b></td></font>
     <td>
      <font color="Black"><?php echo $r1["IFSC_CODE"];?></font>
    </td>
  </tr>


   <tr>
   <td><font color="Black"><b>Name:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mail_name"];?></font>
    </td>
  </tr>
  
   <tr>
   <td><font color="Black"><b>Email:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["email"];?></font>
    </td>
  </tr>
  
     <tr>
    <td> <font color="Black"><b>Address :</b></font></td>
     <td>
      <font color="Black"><?php echo $r["address"];?></font>
    </td>
  </tr>
   <tr>
   <td><font color="Black"><b>Mobile No.:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mno"];?></font>
    </td>
  </tr>

      
<?php
}

else
if($r["under"]=="Duties and Taxes")
{
  ?>
      <tr>
      <td><font color="Black"><b>
      Name :</b></font>
    </td>
     <td>
      <font color="Black"><?php echo $r["name"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Under :</b></td></font>
     <td>
      <font color="Black"><?php echo $r["under"];?></font>
    </td>
  </tr>

<tr>
    <td>  <font color="Black"><b>percentage of caculations:</b></td></font>
     <td>
      <font color="Black"><?php echo $r["perc_calc"];?></font>
    </td>
  </tr>

 
  
   <tr>
   <td><font color="Black"><b>Name:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mail_name"];?></font>
    </td>
  </tr>
  
   <tr>
   <td><font color="Black"><b>Email:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["email"];?></font>
    </td>
  </tr>
  
     <tr>
    <td> <font color="Black"><b>Address :</b></font></td>
     <td>
      <font color="Black"><?php echo $r["address"];?></font>
    </td>
  </tr>
   <tr>
   <td><font color="Black"><b>Mobile No.:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mno"];?></font>
    </td>
  </tr>
  
<?php
}
else
{
?>
    <tr>
      <td><font color="Black"><b>
      Name :</b></font>
    </td>
     <td>
      <font color="Black"><?php echo $r["name"];?></font>
    </td>
  </tr>

  <tr>
   <td><font color="Black"><b>Under :</b></td></font>
     <td>
      <font color="Black"><?php echo $r["under"];?></font>
    </td>
  </tr>

   <tr>
   <td><font color="Black"><b>Name:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mail_name"];?></font>
    </td>
  </tr>
  
   <tr>
   <td><font color="Black"><b>Email:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["email"];?></font>
    </td>
  </tr>
  
     <tr>
    <td> <font color="Black"><b>Address :</b></font></td>
     <td>
      <font color="Black"><?php echo $r["address"];?></font>
    </td>
  </tr>
   <tr>
   <td><font color="Black"><b>Mobile No.:</b></td></font>
     <td>
      <font color="Black">  <?php echo $r["mno"];?></font>
    </td>
  </tr>
  
    <?php
}
}
?>
   
</div>
</table>
<br>

</html>


