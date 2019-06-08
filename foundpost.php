<!DOCTYPE html>

<?php
//error_reporting(0);
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "msu";

//$conn = new mysqli($servername, $username, $password, $dbname);
$conn=mysqli_connect("localhost","root","") or Die("Database Connection error");
$db=mysqli_select_db($conn,"msu") or Die("Database is not Found");

// variables that will be echoed in html
$echo ='';
$in = '';
$e='';
$ec='';
$g='';
$cnt='';

// changing session variable to a real php variable
$sname=$_SESSION['username'];

   // getting poster of id name
   $nam ="SELECT name FROM student_details WHERE reg_num ='".$sname."'";
   $num_query = mysqli_query($conn,$nam);
   $n = mysqli_fetch_array($num_query);
   $mynam = $n['name'];
   $g= $mynam;


// if regnum is set what will then happen to the rest eg sending auto email address
if(isset($_POST['insert']))
{
    $reg_num = $_POST['regnum'];
    $name = $_POST['name'];

     // validating on posting your own id card
  if($name==$g)
  {
  $cnt= "You can not post your own lost id";
  }
else
{
  $sql = "SELECT * FROM student_details WHERE reg_num='$reg_num' AND name='$name' LIMIT 1";
  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0)
  {
    // query for updating
  $upd ="SELECT * FROM lost_ids WHERE reg_num='$reg_num' AND name='$name' LIMIT 1";
  $result1=mysqli_query($conn,$upd);

      //  for updating
      if(mysqli_num_rows($result1)>0)
      {
          $dat="UPDATE lost_ids SET reg_num='$reg_num', name='$name' WHERE reg_num='$reg_num'";
          mysqli_query($conn,$dat);
      }
      
      //
       else
       {
           $query="insert into lost_ids (reg_num, name) values('$reg_num','$name')";
           mysqli_query($conn,$query);
       }
//selecting email address from student details
      $getemail = "SELECT email_address FROM student_details WHERE reg_num = '$reg_num'";
      $check=mysqli_query($conn,$getemail);
      $email = mysqli_fetch_array($check);
      $send_email_to = $email['email_address'];
      $echo = "Thank you for conducting the owner of the ID<br> We have sent a email ";

//getting fone number of the founder of the id card
      $getphonenumber ="SELECT phone_number FROM student_details WHERE reg_num ='$reg_num'";
      $num_query = mysqli_query($conn,$getphonenumber);
      $phone = mysqli_fetch_array($num_query);
      $foni_to_call = $phone['phone_number'];
      $call= $foni_to_call;
      // inserting phone number of the picker of id card
      $query="UPDATE lost_ids SET phone_to_call='$call' WHERE reg_num='$reg_num'";;
      mysqli_query($conn,$query);

//sending email to the selected email address from database
$subject ="We have found your student ID card.";
$message_sent=
"Hello ".$name ."\nMSU's most convinent way of finding you lost student ID". "\r\n We have found your student id card. You can call one of our student" .$g." on +263".$call." to verify for your id card.\n \r\nmsu@2019";


//sending email now using sendgrid
require 'vendor/autoload.php';
$api_key = "enter sendgrid key";

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("sehphirry@gmail.com", "MSU founder of your ID");
$email->setSubject($subject);
$email->addTo($send_email_to);
$email->addContent("text/plain",$message_sent);
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );
$sendgrid = new \SendGrid($api_key);
$sendgrid->send($email);

// try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// }
//the else parts if the reg_num is not found
  }
  else if("" == trim($_POST['regnum']))
  {
    $e = "You have not entered the regnumber: Please fill in the reg number field.";
  }     
   else if("" == trim($_POST['name']))
  {
   $ec="You have not entered the name ot the student: Please fill in the student name field";
  }
   else
  {
   $in= "The information you have provided is incorrect";
  }
}
}
   
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>found student ids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/foundpost.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">

    <script src="js/pace.js"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/pace/like_elearning.css">
</head>
<body>
    <!-- nav starts here -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="home.php" ><img src="images/msu logo.png" width="30" height="30" class="d-inline-block align-top" alt=""><b>M.S.U</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="lostids.php">Messages</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="msu bot/index.html">Instant Chat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">My map</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About</a>
                </li>
              </ul>
            </div>
      <a href="index.php"><button type="button" class="btn btn-primary btn-sm" href="login.php">Logout</button></a>
      </nav>

  <!------end of our nav----->
  
  <center><h3 class="head">MSU POST LOST STUDENT ID</h3></center>
  <h3 class="stan">Standard way to find student id</h3>

  <div class="card2msu">
  <img src="images/msu logo.png" class="toplogo" width="40" height="40">
  <img src="images/id.png" class="toplogo-id" width="40" height="40">
  </div>

  <!-- form to submit details-->
  <div class="formdetails">
      <form action="foundpost.php" method="POST">
        <center>
          <h4 class="h1head">PLEASE INSERT THE STUDENT ID DETAILS BELOW</h4>
          <input type="text" placeholder="Reg number" class="reg" name="regnum"><span class="ex">eg R1710019Q</span><br>
          <input type="text" placeholder="Name of student" class="name" name="name"><span class="ex">eg Anesu Phiri</span><br>
<!--          <input type="text" placeholder="Program" class="prog"><span class="ex" name="degree">eg Information systems</span><br>-->
          <button type="submit" class="btn btn-primary btn-sm" id="sub" name="insert">Submit</button>
        </center>  
      </form>
      <br>
 <!-- php code for result -->
<center><div id="err" class="animated flash"><?php echo $echo; ?></div></center>
<center><div id="in" class="animated flash"><?php echo $cnt; ?></div></center>
<center><div id="in" class="animated shake"><?php echo $in; ?></div></center>
<center><div id="in" class="animated shake"><?php echo $e; ?></div></center>
<center><div id="in" class="animated shake"><?php echo $ec; ?></div></center>

  </div>

  
  <!-- footer -->
  <footer class="footer">
          <center><h1>MIDLANDS STATE UNIVERSITY</h1></center>
          <center><img src="images/msu logo.png" class="footerlogo" width="70" height="70"></center> 
          <center><h4>MSU@2019</h4></center>
        </footer>
</body>
</html>
