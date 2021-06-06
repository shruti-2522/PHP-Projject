<?php  

//index.php

$connect = new PDO("mysql:host=localhost;dbname=dbfarm", "root", "");

$query = "SELECT plot_no FROM tblfertilizer GROUP BY plot_no DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$query1 = "select distinct fertilizer_name from tblfertilizer";

$statement1 = $connect->prepare($query1);

$statement1->execute();

$result1 = $statement1->fetchAll();

?>  
<!DOCTYPE html>  
<html>  
    <head>  
         <?php include ('head.php');?> 
          <?php include ('config.php');?> 
        <title>Create Dynamic Column Chart using PHP Ajax with Google Charts</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    </head> 
    <?php include ('header.php');?> 

    <body class="sb-nav-fixed"> 

        <br /><br />
        
        <div class="container">  
            <h3 align="center"><b>FERTIGATION</b></h3>  
            <br />  
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="panel-title">Month Wise Profit Data</h3>
                        </div>
                        <div class="col-md-3">
                            <select name="plot_no" class="form-control" id="plot_no">
                                <option value="">Select Plot No.</option>
                            <?php
                            foreach($result as $row)
                            {
                                echo '<option value="'.$row["plot_no"].'">'.$row["plot_no"].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="date" name="fromdate" id="fromdate">
                        <input type="date" name="todate" id="todate">
                        <?php
                            foreach($result1 as $row)
                            {
                        ?>
                        <div class="col-sm-2">
                        <font color="black"><b><?php echo $row['fertilizer_name'];?></b></font>
                        <input type='checkbox'   style="margin-right:10px;" id="favorite" name='favorite[]' value="<?php echo $row['fertilizer_name']; ?>">
                        </div>

                        <?php
                        }
                        ?>

                        <button type="submit" name="btnget" id="btnget"><b>Get Chart</b></button>
                <div class="panel-body">
                    <div id="chart_area" style="width: 1000px; height: 620px;"></div>
                </div>
            </div>
        </div>  

    </body>  
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback();

function load_monthwise_data(plot_no,from_date,to_date,favorite,title)
{ 


    var temp_title = title + ' '+plot_no+'';

    $.ajax({

        url:"fetch12.php",
        method:"POST",

        data:{plot_no:plot_no,from_date:from_date,to_date:to_date,favorite:favorite},
        dataType:"JSON",
        success:function(data)
        {

            drawMonthwiseChart(data, temp_title);
        }
    });
}

function drawMonthwiseChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Month');
    data.addColumn('number', 'Qty_app');
    $.each(jsonData, function(i, jsonData){
        var month = jsonData.month;
        var qty_app = parseFloat($.trim(jsonData.qty_app));
        data.addRows([[month, qty_app]]);
    });
    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Months"
        },
        vAxis: {
            title: 'Qty_app'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_area'));
    chart.draw(data, options);
}

</script>

<script>
    
$(document).ready(function(){

    $('#btnget').click(function(){
        var plot_no = $('#plot_no').val();
        var from_date = $('#fromdate').val();
        var to_date = $('#todate').val();
        // var checkname = $('#checkname').val();
        var favorite = [];
            $.each($("input[name='favorite']:checked"), function(){            
                favorite.push($(this).val());
            });
           //alert(favorite);
        if(plot_no != '')
        {
            //alert(favorite);
            load_monthwise_data(plot_no,from_date,to_date,favorite, 'Month Wise Profit Data For');
        }
    });

});

</script>
