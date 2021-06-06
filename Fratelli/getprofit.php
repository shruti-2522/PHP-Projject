<br>
<!DOCTYPE html>
<html>
<head>
	<?php include ("config.php");?>
	<title></title>
	
</head>
<body class="sb-nav-fixed">
 
  <table  border="1" class="w3-table w3-bordered" style="width:60%;margin-left: 10%">

<?php
$ses_id=$_SESSION['plot_id'];
$val= $_GET['q'];
if($val!='allplot')
{
	?>
	<tr>
		<td><b>
			Plot Name</b>
		</td>
		<td><b>
			Pesticide Expense</b>
		</td>
		<td><b>
			Fertigation Expense</b>
		</td>
		<td><b>
			PGR Expense</b>
		</td>
		<td><b>
			Labour Expense</b>
		</td>		
		<td><b>
			Other</b>
		</td>
		<td><b>
			Sales</b>
		</td>
		<td><b>
			Total Expense</b>
		</td></div></div>
	</tr>

	<?php
$total=0;
		$q=mysqli_query($db,"select pname from plot where plot_no=".$val);
   		$r=mysqli_fetch_array($q);
 		// $q1=mysqli_query($db,"SELECT A.dtotal,B.ftotal,C.gtotal,D.totalwadges,E.stotal,A.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id='".$ses_id."' and plot_no='".$val."') A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfertilizer WHERE ses_id='".$ses_id."' and plot_no='".$val."') B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgr WHERE ses_id='".$ses_id."' and plot_no='".$val."') C JOIN (SELECT x.totw+y.toto as totalwadges from (SELECT sum(tot_wages) as totw from tblprunning WHERE ses_id='".$ses_id."' and plot_no='".$val."') as x JOIN (SELECT sum(tot_wages) as toto from tblother WHERE ses_id='".$ses_id."' and plot_no='".$val."') as y ) D JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id='".$ses_id."' and plot_no='".$val."') E");

      $q1=mysqli_query($db,"SELECT A.dtotal,B.ftotal,C.gtotal,D.totalwadges,E.stotal,z.ztotal,y.ytotal,A.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id='".$ses_id."' and plot_no='".$val."') A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfert WHERE ses_id='".$ses_id."' and plot_no='".$val."') B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowth WHERE ses_id='".$ses_id."' and plot_no='".$val."') C JOIN (SELECT SUM(total) AS ztotal,plot_name FROM tblpayment WHERE ses_id='".$ses_id."' and plot_name='".$val."') z JOIN (SELECT SUM(total) AS ytotal,plot_name FROM tblpurcahse1 WHERE ses_id='".$ses_id."' and plot_name='".$val."') y JOIN (SELECT x.totw+y.toto as totalwadges from (SELECT sum(tot_wages) as totw from tblprunning WHERE ses_id='".$ses_id."' and plot_no='".$val."') as x JOIN (SELECT sum(tot_wages) as toto from tblother WHERE ses_id='".$ses_id."' and plot_no='".$val."') as y ) D JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id='".$ses_id."' and plot_no='".$val."') E");


   			while($r1=mysqli_fetch_array($q1))
   			{
   				?>
   				<tr>
   					<td>
   						<a href="profitvoucher.php?plot_name=<?php echo $r['pname'];?>"><?php echo $r['pname'];?></a>
   					</td>
   					<td>
   						<?php echo round($r1['dtotal'],2);?>
   					</td>
   					<td>
   						<?php echo round($r1['ftotal'],2); ?>
   					</td>
   					<td>
   						<?php echo round($r1['gtotal'],2); ?>
   					</td>
   					<td>
   						<?php echo $r1['totalwadges']; ?>
   					</td>
   					<td>
                  <?php //echo $r1['ztotal'];
                       // echo $r1['ytotal'];
                        echo $r1['ztotal']+$r1['ytotal'];
                   ?>		
   					</td>
   						<td>
   							<?php echo $r1['stotal']; ?>
   					</td> 
   					<td>
   					<?php $sum=$r1['dtotal']+$r1['ftotal']+$r1['gtotal']+$r1['totalwadges'];
   					echo round($sum,2); ?>
   					</td>
   			</tr>
   			<?php
   			}
} 
else
{
   ?>
   <tr>
      <td><b>
         Plot Name</b>
      </td>
      <td><b>
         Pesticide Expense</b>
      </td>
      <td><b>
         Fertigation Expense</b>
      </td>
      <td><b>
         PGR Expense</b>
      </td>
      <td><b>
         Labour Expense</b>
      </td>    
      <td><b>
         Other</b>
      </td>
      <td><b>
         Sales</b>
      </td>
      <td><b>
         Total Expense</b>
      </td></div></div>
   </tr>

   <?php
 $total=0;
       $ses_id=$_SESSION['plot_id'];
       $q=mysqli_query($db,"select distinct plot_no,pname from plot where ses_id=".$ses_id);
                  
      $arr=array();                  
      $arr1=array();                  
      foreach ($q as $txtpno){

      $q=mysqli_query($db,"select pname from plot where plot_no=".$txtpno['plot_no']);
         $r=mysqli_fetch_array($q);
      $q1=mysqli_query($db,"SELECT A.dtotal,B.ftotal,C.gtotal,D.totalwadges,E.stotal,z.ztotal,y.ytotal,A.plot_no FROM ( SELECT SUM(total) AS dtotal,plot_no FROM tbldis WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') A JOIN (SELECT SUM(total) AS ftotal,plot_no FROM tblfert WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') B JOIN (SELECT SUM(total) AS gtotal,plot_no FROM tblgrowth WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') C JOIN (SELECT SUM(total) AS ztotal,plot_name FROM tblpayment WHERE ses_id='".$ses_id."' and plot_name='".$txtpno['plot_no']."')z JOIN (SELECT SUM(total) AS ytotal,plot_name FROM tblpurcahse1 WHERE ses_id='".$ses_id."' and plot_name='".$txtpno['plot_no']."')y JOIN (SELECT x.totw+y.toto as totalwadges from (SELECT sum(tot_wages) as totw from tblprunning WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') as x JOIN (SELECT sum(tot_wages) as toto from tblother WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') as y ) D JOIN (SELECT SUM(total) AS stotal,plot_no FROM tblsales WHERE ses_id='".$ses_id."' and plot_no='".$txtpno['plot_no']."') E");


            while($r1=mysqli_fetch_array($q1))
            {
               ?>
               <tr>
                  <td>
                     <a href="profitvoucher.php?plot_name=<?php echo $r['pname'];?>"><?php echo $r['pname'];?></a>
                  </td>
                  <td>
                     <?php echo round($r1['dtotal'],2);?>
                  </td>
                  <td>
                     <?php echo round($r1['ftotal'],2); ?>
                  </td>
                  <td>
                     <?php echo round($r1['gtotal'],2); ?>
                  </td>
                  <td>
                     <?php echo $r1['totalwadges']; ?>
                  </td>
                  <td>
                   <?php //echo $r1['ztotal'];
                       // echo $r1['ytotal'];
                        echo $r1['ztotal']+$r1['ytotal']
                   ?>          
                  </td>
                     <td>
                        <?php echo $r1['stotal']; ?>
                  </td> 
                  <td>
                  <?php $sum=$r1['dtotal']+$r1['ftotal']+$r1['gtotal']+$r1['totalwadges'];
                  echo round($sum,2); ?>
                  </td>
            </tr>
            <?php
             $arr[]=['label'=>$r1['plot_no'],'y'=>round($r1['stotal'],2)];
            // $arr[]=['y'=>round($r1['stotal'],2)];
             $arr1[]=['label'=>$r1['plot_no'],'y'=>round($sum,2)];
            // $arr1[]=['y'=>round($sum,2)];
            }
} 

} 
?>
</table>
<?php include('footer.php');?>

</center>
</body>
</html>