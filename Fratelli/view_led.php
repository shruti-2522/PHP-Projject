<!DOCTYPE html>
<html>
<head>
<?php include('config.php'); ?>
<?php include('head.php');?>

    <title>PHP mysql confirmation box before delete record using jquery ajax</title>
    <!-- Latest compiled and minified CSS -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 -->    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>



<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>ALL LEDGERS</b></font></b></h2>

<div class="container">
  <br>
    
    <table id="myTable" border="1" align="center" class="table" style="margin-left:15%;width:60%">
        <tr >
            <th><center><h4><b>LEDGER NAME</b></h4></center></th>
            <th width="-50px"><h4><center><b>DELETE</b></center></h4></th>
        </tr>


        <?php

        $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblledger where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {


        ?>


            <tr id="<?php echo $r['id'] ?>">
                <td>
                <b>
                <center> <a href="view_leddetails.php?id=<?php echo $r['id'];?>"> <?php echo $r["name"];?></a></center>
            </b>
            </td>

               <td><center><button class="btn btn-danger btn-sm remove" ><i class="fa fa-trash"></i></button></center></td>
            </tr>


        <?php } ?>


    </table>
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {

            $.ajax({
               url: 'delete_led.php',
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

<?php //include('footer.php'); ?>
  <script src="js/scripts.js"></script>
<script src="js/reload.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 