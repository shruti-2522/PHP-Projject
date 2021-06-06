

<?php
// SELECT A.dtotal,B.ftotal,C.gtotal,D.totalwadges,E.stotal,A.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id=9) A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfert WHERE ses_id=9) B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowth WHERE ses_id=9) C JOIN (SELECT x.totw+y.toto as totalwadges from (SELECT sum(tot_wages) as totw from tblprunning WHERE ses_id=9) as x JOIN (SELECT sum(tot_wages) as toto from tblother WHERE ses_id=9) as y ) D JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id=9) E

SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id=9 GROUP by plot_no
SELECT SUM(total) AS ftotal,plot_no FROM tblfert WHERE ses_id=9 GROUP by plot_no
SELECT SUM(total) AS gtotal,plot_no FROM tblgrowth WHERE ses_id=9 GROUP by plot_no
SELECT sum(tot_wages) as totw,plot_no from tblprunning WHERE ses_id=9 group by plot_no
SELECT sum(tot_wages) as toto,plot_no from tblother WHERE ses_id=9 GROUP by plot_no
SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id=9 GROUP by plot_no

SELECT A.dtotal,B.ftotal,C.gtotal,D.totalwadges,E.stotal,A.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id=9 GROUP by plot_no) A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfert WHERE ses_id=9 GROUP by plot_no
) B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowth WHERE ses_id=9 GROUP by plot_no) C JOIN (SELECT x.totw+y.toto as totalwadges from (SELECT sum(tot_wages) as totw,plot_no from tblprunning WHERE ses_id=9 group by plot_no) as x JOIN (SELECT sum(tot_wages) as toto,plot_no from tblother WHERE ses_id=9 GROUP by plot_no) as y ) D JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id=9 GROUP by plot_no) E

select plot_no,sum(tot_wages) total from ( select plot_no,tot_wages from tblother union all select plot_no,tot_wages from tblprunning ) t group by plot_no

//Working query=>   SELECT A.dtotal,B.ftotal,C.gtotal,E.stotal,E.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id=9 GROUP by plot_no) A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfert WHERE ses_id=9 GROUP by plot_no ) B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowth WHERE ses_id=9 GROUP by plot_no) C JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id=9 GROUP by plot_no) E group by E.plot_no

//SELECT A.dtotal,B.ftotal,C.gtotal,x.totw,y.toto,E.stotal,E.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id=9 GROUP by plot_no) A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfert WHERE ses_id=9 GROUP by plot_no ) B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowth WHERE ses_id=9 GROUP by plot_no) C JOIN (SELECT sum(tot_wages) as totw,plot_no from tblprunning WHERE ses_id=9 GROUP by plot_no) x JOIN (SELECT sum(tot_wages) as toto,plot_no from tblother WHERE ses_id=9 GROUP by plot_no)y JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id=9 GROUP by plot_no) E group by E.plot_no

$dataPoints1 = array(
	array("label"=> "2010", "y"=> 36.12),
	array("label"=> "2011", "y"=> 34.87),
	array("label"=> "2012", "y"=> 40.30),
	array("label"=> "2013", "y"=> 35.30),
	array("label"=> "2014", "y"=> 39.50),
	array("label"=> "2015", "y"=> 50.82),
	array("label"=> "2016", "y"=> 74.70)
);
$dataPoints2 = array(
	array("label"=> "2010", "y"=> 64.61),
	array("label"=> "2011", "y"=> 70.55),
	array("label"=> "2012", "y"=> 72.50),
	array("label"=> "2013", "y"=> 81.30),
	array("label"=> "2014", "y"=> 63.60),
	array("label"=> "2015", "y"=> 69.38),
	array("label"=> "2016", "y"=> 98.70)
);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
	<?php include('head.php');?>
	<?php include('config.php');?>
	

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Real Trees",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Artificial Trees",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
	<?php include('header.php');?>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                              