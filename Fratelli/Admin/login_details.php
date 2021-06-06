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
        <h2 class="w3-container" style="margin-left: 5%"><font color="black"><b>LOGIN DETAILS</b></font></b></h2>

<div class="container">
  <br><br>
    
    <table id="myTable" border="1" align="center" class="table" style="width:50%">
        <tr >
            <th><center><font color="black"><b>EMAIL</b></font></center></th>
            <th width="-50px"><center><font color="black"><b>MACHINE CODE</b></font></center></th>
         
        </tr>


        <?php

        $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tblpolt where plot_id=".$_GET['id']);
while ($r=mysqli_fetch_array($q)) {


        ?>


            <tr id="<?php echo $r['plot_id'] ?>">
                <td>
               
                <center><font color="black"><?php echo $r["email"];?></font></center>
               
            </td>

<td>  <center><font color="black"><?php echo $r["machine_code"];?></font></center>
         </td>
              
            </tr>


        <?php } ?>


    </table>
</div> <!-- container / end -->


</body>


<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        //alert(id);


        if(confirm('Are you sure to approved to that user ?'))
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
                    alert("approve");  
               }
            });
        }
    });


</script>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<?php //include('footer.php'); ?>