<!DOCTYPE html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "msu";

// emptying the variables
$worked='';
$ddnt='';
$ec ='';
$o='';
$ur_reg_num='';
$gotit='';
$c='';
$fo='';
$aad='';
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn=mysqli_connect("localhost","root","") or Die("Database Connection error");
$db=mysqli_select_db($conn,"msu") or Die("Database is not Found");

// searching for for lost id
if(isset($_POST['search']))
{
  $reg_num = $_POST['regnum'];

  $sql = "SELECT * FROM student_details WHERE reg_num='$reg_num' LIMIT 1";
  $result=mysqli_query($conn,$sql);
  
  if(mysqli_num_rows($result)>0)
  {
    // getting reg_num
    $re ="SELECT reg_num FROM lost_ids WHERE reg_num ='$reg_num'";
    $num_query = mysqli_query($conn,$re);
    $r = mysqli_fetch_array($num_query);
    $ur = $r['reg_num'];
    $ur_reg_num= $ur;
    $fo="Search found...";

    // getting foni number
        $getphonenumber ="SELECT phone_to_call FROM lost_ids WHERE reg_num ='$reg_num'";
        $num_query = mysqli_query($conn,$getphonenumber);
        $phone = mysqli_fetch_array($num_query);
        $foni_to_call = $phone['phone_to_call'];
        $worked= $foni_to_call;
        $o=0;

        // getting name
        $nam ="SELECT name FROM lost_ids WHERE reg_num ='$reg_num'";
        $num_query = mysqli_query($conn,$nam);
        $n = mysqli_fetch_array($num_query);
        $myname = $n['name'];
        $gotit= $myname;

        // getting date
        $date ="SELECT date FROM lost_ids WHERE reg_num ='$reg_num'";
        $num_query = mysqli_query($conn,$date);
        $d = mysqli_fetch_array($num_query);
        $adt = $d['date'];
        $aad= $adt;

$c="Call the above phone number for verification";
  }
  else if("" == trim($_POST['regnum']))
  {
   $ec="You have not entered your reg number: Please fill in your reg number";
  }
  else
 {
  $ddnt = "your id card is not found";
 }
 
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>found student ids</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/lostidsearch.css">
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
  
  <center><h3 class="head">MSU SEARCH LOST STUDENT ID</h3></center>
  <h3 class="stan">Standard way to find student id</h3>

 <center><img src="images/msu logo.png" alt="" height="40" width="40"></center>
  <!-- form to search-->
  <div class="formdetails">
      <form action="lostidsearch.php" method="post">
        <center>
          <h4 class="h1head">TO SEARCH FOR YOUR STUDENT ID <br> PLEASE FILL IN THE DETAILS BELOW</h4>
          <input type="text" placeholder="Reg number" class="reg" name="regnum"><span class="ex">eg R1710019Q</span><br>
          
          <button type="submit" class="btn btn-primary btn-sm" id="sub" name="search">Search</button>
        </center>  
      </form>
      <!-- results found -->
      <center><h6 id="fo" class="animated heartBeat"><?php echo $fo;?></h6></center>
      <!-- for errors & no results returned -->
<center><h6 id="ddnt" class="animated shake"><?php echo $ddnt;?></h6></center>
<center><h6 id="empty" class="animated heartBeat"><?php echo $ec;?></h6></center>
  </div>

  <!-- to be thankfull for submitting -->
<center><h3 class="thankyou">ID SEARCH ...</h3></center>


<!-- way of listing the lost id using table like -->
<!-- and for results -->
<center>
<div class="table">
  <ul>
    <b>
        <li>Your regnumber<br><h6 id="worked" class="animated fadeIn"><?php echo $ur_reg_num;?></h6></li>
        <li>Name<br><h6 id="worked" class="animated fadeIn"><?php echo $gotit;?></h6></li>
        <li>Phone number to call <br><h6 id="worked" class="animated fadeIn"><?php echo $o.$worked;?></h6></li>
        <li>Date posted<br><h6 id="worked" class="animated fadeIn"><?php echo $aad; ?></h6></li>
    </b>
  </ul>
  <center><h5 class="c"><?php echo $c;?></h5></center>

</div>
</center>

 <!-- footer -->
  <footer class="footer">
          <center><h1>MIDLANDS STATE UNIVERSITY</h1></center>
          <center><img src="images/msu logo.png" class="footerlogo" width="70" height="70"></center> 
          <center><h4>MSU@2019</h4></center>
        </footer>
</body>
</html>