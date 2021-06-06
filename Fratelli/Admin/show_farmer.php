<!DOCTYPE html>
<html>
<head>
<?php include('../config.php'); ?>
<?php include('head.php');?>

    <title>PHP mysql confirmation box before delete record using jquery ajax</title>
    <!-- Latest compiled and minified CSS -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 -->    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>



<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <br><br>
        <h2 class="w3-container" style="margin-left: 5%"><font color="black"><b>ALL FARMERS</b></font></b></h2>

<div class="container">
  <br><br>
    
    <table id="myTable" border="1" align="center" class="table" style="width:60%">
        <tr >
            <th><center><font color="black"><h5><b>FARMER NAME</b></h5></font></center></th>
            <th width="-50px"><h5><center><font color="black"><b>PERMISSION</b></font></center></h5></th>
             <th width="-50px"><h5><center><font color="black"><b>LOGIN DEATILS</b></font></center></h5></th>
        </tr>


        <?php

        $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where status=1");
while ($r=mysqli_fetch_array($q)) {


        ?>


            <tr id="<?php echo $r['plot_id'] ?>">
                <td>
               
                <center><font color="blue"> <a href="view_farmers.php?id=<?php echo $r['plot_id'];?>"> <?php echo $r["farm_name"];?></a></font></center>
         
            </td>

               <td><center><button class="btn-danger btn-sm remove" >APPROVE</button></center></td>
                  <td><center> <a href="login_details.php?id=<?php echo $r['plot_id'];?>"> <button class="btn-success btn-sm">LOGIN DETAILS</button></center></td>
            </tr>


        <?php } ?>


    </table>
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        //alert(id);


        if(confirm('Do You Really Want To Approve This User ?'))
        {
            $.ajax({
               url: 'approved.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {

                    $("#"+id).remove();
                    alert("Approved");  
               }
            });
        }
    });


</script>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<?php //include('footer.php'); ?>