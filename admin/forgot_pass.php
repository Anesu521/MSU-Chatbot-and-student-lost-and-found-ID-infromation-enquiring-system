<!DOCTYPE html>
<?php
session_start();
include "connection.php";

$wr='';

if(isset($_POST['check']))
    {
        $email=$_POST['username'];
        $sql = "SELECT * FROM admin_login WHERE user_name='".$email."' ";
        $results = $conn->query($sql);
        if($results->num_rows>0)
        {
            $_SESSION['username']=$email;
            header('location:confirming_security_question.php');
        }
        else
        {
            $wr= "wrong username or password";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="nav">
    <a class="navbar-brand" href="index.php">
        <img src="../images/msu logo.png" width="30" height="30">
    </a>
</nav>
<!--css style of the website-->
<style>
    .for
    {
    background-color: white;
        padding: 10px;
    }
    #search
    {
        margin-top: 10px;
    }
    .f
    {
        color: black;
        font-weight:bold;
        font-size: 20px;
        display: inline-block;
        text-transform: uppercase;
    }
    input
    {
        width: 400px;
        height: 40px;
        border: 1px solid #cccccc;
        border-radius:10px;
    }
    #check
    {
        margin-top: 10px;
        margin-bottom: 15px;
    }
    #inputEmaili
    {
        margin-top: 20px;
        width: 400px;
    }

</style>

<!--html-->
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="for">
                    <center>
                        <form method="post">
                            <card card sign
                            <label class="f">Forgot Password</label>
                            <br>
                            <input type="text" id="inputEmaili" class="form-control" placeholder="Enter Username" name="username" required autofocus>
                            <br>
                            <h6 class="animated rubberBand" style="color: red;"><?php echo $wr;?></h6>
                            <input type="submit" name="check" class="form-control btn-primary" value="Check" id="check" style="font-weight: bold; text-transform: uppercase">
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>