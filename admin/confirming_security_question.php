<?php
session_start();
include "connection.php";

$zita='';
$zit=$_SESSION['username'];

$nam ="SELECT name FROM admin_login WHERE user_name ='".$zit."'";
$num_query = mysqli_query($conn,$nam);
$n = mysqli_fetch_array($num_query);
$mynam = $n['name'];
$zita= $mynam;

$wron='';
if(isset($_POST['ok']))
{
    $question=$_POST['question'];
    $ans=$_POST['answer'];

    $s="select * from admin_login where security_question='".$question."' and answer='".$ans."' LIMIT 1";
    $r= $conn->query($s);

    if($r->num_rows>0)
    {
        $_SESSION['username']=$email;
        header('location:changing.php');

    }
    else
    {
        $wron= "wrong security question or answer";
    }
}

?>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div style=" padding: 15px;">
                    <center><label class="f" style="border-bottom: 4px solid black; font-weight: bold;font-size: 20px;text-transform: uppercase;">security question</label></center>
                    <div style="background-color: #cccccc; padding: 10px; text-align: center; color: blue;">
                        <h6> Your name is:<?php echo $zita;?></h6>
                        <h6>If not click <a href="index.php" style="text-decoration: none; color: white;">here?</a></h6>
                    </div>
                    <br>
                    <form method="post">
                        <input type="password" id="inputEmaili" class="form-control" placeholder="Enter your security question" name="question" required autofocus>
                        <br>
                        <input type="password" id="inputEmaili" class="form-control" placeholder="Answer" name="answer" required autofocus>
                        <br>
                        <center><h6 style="color: red;" class="animated rubberBand"><?php echo $wron;?></h6></center>
                        <br>
                        <input type="submit" name="ok" class="form-control btn-primary" value="OK" id="check" style="font-weight: bold;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>