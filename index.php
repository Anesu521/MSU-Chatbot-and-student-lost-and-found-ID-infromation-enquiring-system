<!DOCTYPE html>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "change_password";
$dbname = "msu";

$conn = new mysqli($servername, $username, $password, $dbname);

$echo ='';

if($conn ->connect_error)
{
    die("connection failed".$conn->connect_error);
}
if(isset($_POST['regnum']))
{
    $reg_num=$_POST['regnum'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM login WHERE reg_num='".$reg_num."' AND password='".$pass."' LIMIT 1";
    $results = $conn->query($sql);
    if($results->num_rows>0)
    {
        $_SESSION['username']=$reg_num;

//        updating count
        $da="UPDATE login SET count=count + 1 WHERE reg_num='$reg_num'";
          mysqli_query($conn,$da);

//          updating login time
        $dta="UPDATE login SET date_time_login=current_timestamp WHERE reg_num='$reg_num'";
        mysqli_query($conn,$dta);

        header('location:homeno.php');
    }
    else
    {
        $echo = "Username or Password is incorrect.\n Try again.";
    }
}
?>

<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="images/icons/logi.png">

    <script src="js/pace.js"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/pace/like_elearning.css">
</head>
<div class="loginborder">



                    <div class="login">
                        <CENTER><img src="images/msu logo.png"class="center-logo" width=30" height="30" >MIDLANDS STATE UNIVERSITY</CENTER>
                        <center><h6 class="infor">Information Enquiring System</h6></center>
                    <CENTER><h4 class="student">STUDENT</h4></CENTER>
                        <h1 align="center" class="log" "><b>Login</b></h1>
                    <!------form starts here-------->
                        <form action="index.php" method="POST" style="text-align: center">
                            <div class="input">
                                <input type="text" class="form-control mb-2" name="regnum" placeholder="Reg Number" required></br>
                                <input type="password" class="form-control mb-2" name="pass" placeholder="Password" required></br>
                            </div>

                                <!----------login changing---------->
                                <input type="submit"  class="btn btn-primary" id="btn" value="Login" name="submit" >
                        </form>
                        <!-- php echo wen error occurs -->
                        <div id="failed" class="animated shake"><center><?php echo $echo; ?></center></div>

                                <!----forgot password and elearnig registration---->
                                <center><a href="http://web.msu.ac.zw/elearning/?link=createaccount.student&1553708947">Create E-Learning Account</a></br></center>
                                <center><a href="http://web.msu.ac.zw/elearning/?link=resetpasswd">Forget your password?</a></center>

                    </div>
                    <CENTER ><img src="images/msu logo.png"class="center-logo" width=100" height="100"></CENTER>

                    <div class="light bg-light">
            </br>
                <marquee><h2><b>Welcome Home</b></h2></marquee>
                <center><h5>ONLINE ENQUIRIES</h5></center></br>


                    </div>
            </div>
            <center><h6 class="mus">msu @2019</h6></center>
</div>
</body>
</html>


