<!--SPRAYER CODE-->
<script src="jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

 <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>


    


        	<!--FOR RIGHT SIDEBAR-->
 
<!-- FOR SEARCHINMG CODE -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

 
 <!--DURATION CODE-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!--SUGGESTION CODE-->

   <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    