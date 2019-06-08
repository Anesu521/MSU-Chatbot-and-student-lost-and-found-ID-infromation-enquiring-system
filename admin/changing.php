<?php
session_start();
include "connection.php";

$d='';
$s='';

$d='';
if(isset($_POST['check']))
{
    $btn=$_POST['con'];
    $pas=$_POST['pas'];
    $pass=$_POST['pass'];
    if($pas==$pass)
    {
        $da="UPDATE admin_login SET password='$pass' WHERE user_name='$zit'";
        mysqli_query($conn,$da);

     header('location:index.php');
    }

    else
    {
        $d="Passwords do not match";
    }
}
?>

<html>
<head>
    <title>Changing Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
</head>
<body>
<!--changing password-->

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div style=" padding: 15px;">
                    <center><label class="f" style="border-bottom: 4px solid black; font-weight: bold;">CHANGE PASSWORD</label></center>
                    <br>
                    <form method="post">
                        <input type="password" id="inputEmaili" class="form-control" placeholder="Password" name="question" required autofocus>
                        <br>
                        <input type="password" id="inputEmaili" class="form-control" placeholder="Confirm" name="answer" required autofocus>
                        <br>
                        <center><h6 style="color: red;" class="animated rubberBand"><?php echo $d;?></h6></center>
                        <br>
                        <input type="submit" name="ok" class="form-control btn-primary" value="OK" id="check" style="font-weight: bold;">
                        <br>
                        <div style="background-color: #cccccc; padding: 10px; text-align: center; color: blue;">
                            <h6>Return to login page ? click <a href="index.php" style="text-decoration: none; color: white;">here.</a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
