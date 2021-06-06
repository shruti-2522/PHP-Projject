<!doctype html>
<html>
<head>
<?php include ("head.php");?>
<?php include ("config.php");?>
<?php //include ("header1.php");?>

</head>
<body class="sb-nav-fixed">
  <?php  include('header.php');?>
    <h2 class="container"><b>ADD ITEM-PURCHASE</b></h2>
<br><br>

<?php
mysqli_query($db,"update tblp1 set record_status=1");

  $ses_id=$_SESSION['plot_id'];
if(isset($_POST["btndraft"]))
{
  extract($_POST);
  $status=1;
  $_SESSION['bill_no']=$txtbno;
  $_SESSION['date']=$txtdate;
  $_SESSION['supplier']=$txtpname;  
  $_SESSION['payment_mode']=$txtpm;  
 
  //echo $txtqty;  
  mysqli_query($db,"insert into tblmultitem(bill_no,date,supplier ,payment_mode,ses_id,status)values('$txtbno','$txtdate','$txtpname','$txtpm','$ses_id','$status')");

echo "<script>window.location.href='purchase.php';</script>";
   exit;
  
  
 
}

if(isset($_POST["btnadd"]))
{
  extract($_POST);
  $_SESSION['bill_no']=$txtbno;
  $_SESSION['date']=$txtdate;
  $_SESSION['supplier']=$txtpname;  
  $_SESSION['payment_mode']=$txtpm;  
 


  
  //echo $txtqty;  
  mysqli_query($db,"insert into tblmultitem(bill_no,date,supplier ,payment_mode,ses_id,status)values('$txtbno','$txtdate','$txtpname','$txtpm','$ses_id','$status')");
  
 $q=mysqli_query($db,"select max(multi_id) as maxid from tblmultitem"); 
    $r=mysqli_fetch_array($q);
    $id=0;
    $id=$id+$r['maxid'];

    echo "<script>window.location.href='multiple_purchase.php?id=$id';</script>";
  exit;
  
 
}?>

<form method="post" id="myform">
   <div class="container">

  <div class="row">
    <div class="col-sm-1"></div>
 <div class="col-sm-7">

  
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Bill No:</b></font></label>
                 <input type="text" class="form-control" name="txtbno" id="txtbno" placeholder="Enter Bill-no" required>
             
              </div>
              <div class="col-sm-6 form-group">
                <label><font color="black"><b>Enter Date:</b></font></label>
              <input type="date" class="form-control" name="txtdate" id="txtdate" placeholder="Enter Date" required>
              </div>
            </div> 


    
    <div class="row">
   <div class="col-sm-6" form-group>
                <label  class="control-label"><font color="black"><b>Supplier:</b></font></label>
              
         <!--  <input type='text' class="form-control" name="txtpname" id='autocomplete' autocomplete="off" placeholder="Enter Supplier"> -->

            <select name="txtpname" id="txtpname" class="form-control" required>
               <option value="">Select Supplier</option>
              
                <?php


                    $q=mysqli_query($db,"select distinct(name) from tblledger where ses_id=".$ses_id);
                  
                  
                    foreach ($q as $txtpname){
                ?>
                        <option value="<?php echo $txtpname['name'];?>"><?php echo $txtpname['name'];?></option>
                <?php
                    }
                ?>
              </select>
     </div>
       
<div class="col-sm-6 form-group">
          <label><font color="black"><b>Payment  Type:</b></font></label>
          <select name="txtpm" id="txtpm" class="form-control" required>
        <Option value="">Select Payment Mode</option>
        <Option value="cash">cash</option>
        <Option value="credit">credit</option>
           
        </select>
      </div></div>
       


          <div class="form-group">
              <div align="center">
            <button type="submit"  name="btnadd"  class="btn btn-success"><b>NEXT</button>
              <button type="submit"  name="btndraft"  class="btn btn-success" formnovalidate><b>SAVE AS DRAFT</button>
            </div>
        </div>
          </b></button></form>

  



    </div>
</div>
</div>
<script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>     
</body>
</html>
