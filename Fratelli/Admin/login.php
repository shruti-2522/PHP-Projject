<!doctype html>

<html>
<head>
<link rel="stylesheet" href='css/style1.css'>
<?php include('head.php');?>
<?php include('config.php');?>
</head>
<body
    style="background: url('img/background.jpg'); no-repeat; background-size: cover; opacity:;">
 


<?php
include('config.php');

if(isset($_POST["btnlogin"]))
{
  extract($_POST);
  

  $q=mysqli_query($db,"select * from tbladmin where apass='$txtpass' and aemail='$txtemail'");
  if(mysqli_num_rows($q)>0)
  {
    ?>
    <script type="text/javascript">
      alert("Login successful");
    </script>
    <?php
   echo "<script>window.location.href='show_farmer.php';</script>";
   exit;
}
 else
  {
     echo "<script>alert('Invalid Credentials')</script>";
  }
}
?>
     

    <div class="loginBox">

        <img src="img/user.png" class="user">
        <h2>
        
                <font color="pale red">Login</font>
            
        </h2>
        <form method="post">
            <p>Email:</p>
            <input type="text" name="txtemail" placeholder="Enter Email" required>
            <p>Password:</p>
            <input type="password" name="txtpass" placeholder="Enter Password"
                required> 
                <input type="submit" name="btnlogin"
                value="sign In">


        </form>
    </div>

    <?php include('footer.php');?>

</body>
</html>