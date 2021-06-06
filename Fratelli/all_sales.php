<!DOCTYPE html>
<html>
<head>
<?php include('config.php'); ?>
<?php include('head.php');?>

    <title>PHP mysql confirmation box before delete record using jquery ajax</title>
   

</head>
<body class="sb-nav-fixed">
<?php include('header.php');?>
        <h2 class="container"><font color="black"><b>ALL SALES VOUCHERS</b></font></b></h2>
        <br>

<table class="table" align="center" border="1" style="width:70%;margin-top:%">

        <tr >
            <th><b><center>Party Account Name</center></b></th>
          
           <th><center><b>Item Name</b></center></th>
           <th><center><b>Variety</b></center></th>
           <th><center><b>Date</b></center></th>
           <th><center><b>Delete</b></center></th>
        </tr>

        <?php

        $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblsales where ses_id='".$ses_id."'");
while ($r=mysqli_fetch_array($q)) {


        ?>

            <tr id="<?php echo $r['sid'] ?>">
                <td><font color="blue"><a href="sales.php?id=<?php echo $r['sid'];?>"> <?php echo $r["paccount_name"];?></a></font></td>
               
                <td><?php echo $r['item_name'] ?></td>
                <td><?php echo $r['variety'] ?></td>
                <td><center><?php echo $r['date'] ?></center></td>
                <td><center><button class="btn btn-danger btn-sm remove" ><i class="fa fa-trash"></i></button></center></td>
            </tr>


        <?php } ?>


    </table>
    <br><br>
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
      

        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete_sales.php',
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
</html>
<script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>   

<?php //include('footer.php'); ?>