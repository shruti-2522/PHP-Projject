<!DOCTYPE html>
<html>
<head>
<?php include('config.php'); ?>
<?php include('head.php');?>

    <title>PHP mysql confirmation box before delete record using jquery ajax</title>

</head>



<body class="sb-nav-fixed">

        <?php include('header.php');?>
        <h2 class="w3-container"><font color="black"><b>ALL JOURNAL VOUCHERS</b></font></b></h2>
<br><br>
<table class="table" align="center" border="1" style="width:60%">
    
   <tr >
            <th><b><center>Journal No</center></b></th>
           <th><center><b>Particulars</b></center></th>
           <th><center><b>Date</b></center></th>
           <th><center><b>Delete</b></center></th>
        </tr>


        <?php

        $ses_id=$_SESSION['plot_id'];
$q=mysqli_query($db,"select * from tbljournal where ses_id=".$ses_id);
while ($r=mysqli_fetch_array($q)) {


        ?>

            <tr id="<?php echo $r['jid'] ?>">
              <td><?php echo $r['journal_no'];?></td>
                <td><font color="blue"><a href="journal.php?id=<?php echo $r['jid'];?>"><?php echo $r["particuler"];?></a></font></td>
                  <td><?php echo $r['date'] ?></td>

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
               url: 'delete_journal.php',
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
</html>

