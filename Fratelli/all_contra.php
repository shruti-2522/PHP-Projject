<!DOCTYPE html>
<html>
<head>
<?php include('config.php'); ?>
<?php include('head.php');?>

    <title>PHP mysql confirmation box before delete record using jquery ajax</title>
 

</head>



<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>ALL CONTRA VOUCHERS</b></font></b></h2>
        <br><br>


  <table class="table" align="center" border="1" style="width:50%">

        <tr >
            <th><b><center>Account</center></b></th>
           <th><center><b>Particulars</b></center></th>
           <th><center><b>Date</b></center></th>
           <th><center><b>Delete</b></center></th>
        </tr>


        <?php

        $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblcontra where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {


        ?>
            <tr id="<?php echo $r['cid'] ?>">
                <td><center><font color="blue"><a href="contra.php?id=<?php echo $r['cid'];?>"> <?php echo $r["account"];?></a></font></center></td>
                <td><?php echo $r['particuler'] ?></td>
                <td><center><?php echo $r['date'] ?></center></td>
                <td><center><button class="btn btn-danger btn-sm remove" ><i class="fa fa-trash"></i></button></center></td>
            </tr>


        <?php } ?>


    </table>


</body>


<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
     


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete_contra.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {

                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });


</script>

<script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>   
<?php //include('footer.php'); ?>
</html>