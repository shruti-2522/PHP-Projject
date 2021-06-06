<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
    <?php  include('head.php');?>
     <?php  include('config.php');?>
</head>

<body style="background-image: url('img/a2.jpg');">
<?php
if(isset($_POST["btnlogin"]))
{
  extract($_POST);
  mysqli_set_charset($db,'utf8');
  $q=mysqli_query($db,"Select * from tblpolt where machine_code='$txtkey' and email='$txtemail'");
  $r=mysqli_fetch_array($q);
  if(mysqli_num_rows($q)>0)
  {
        if($r['status']==0)
        {
            session_start();
            $_SESSION["email"]=$txtemail;
    
            $q1=mysqli_query($db,"select * from tblpolt where email='".$_SESSION["email"]."'");
            $r1=mysqli_fetch_array($q1);
            $_SESSION["owner_name"]=$r1["owner_name"];
            $_SESSION["plot_id"]=$r1["plot_id"];
            echo "<script>window.location.href='home.php';</script>";
            exit;
        }
        else
        {
                echo "<script>alert('Inactive User')</script>";
        } 
  }
 else
  {
    echo "<script>alert('Invalid Credentials')</script>";
  }
}
?>
<br><br>
 <form method="post" enctype="multipart/form-data">
       
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-10 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/a3.jpg"  class="img-fluid"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>LOGIN</b></h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..."
                                                 name="txtemail"
                                                >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Machine code" name="txtkey">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" >
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button name="btnlogin" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>

                                        <hr>
                                       
                                  
                                    <hr>
                                  
                            </div>
                        </div>
                    </div>
                </div>

    </div>
</div>

</body>

</html>