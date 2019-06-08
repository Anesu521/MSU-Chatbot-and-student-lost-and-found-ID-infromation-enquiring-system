<!DOCTYPE html>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "msu";

//$conn = new mysqli($servername, $username, $password, $dbname);
$conn=mysqli_connect("localhost","root","") or Die("Database Connection error");
$db=mysqli_select_db($conn,"msu") or Die("Database is not Found");


if(isset($_POST['send']))
{
    // getting loggedin account name
$sname=$_SESSION['username'];
$nam ="SELECT name FROM student_details WHERE reg_num ='".$sname."'";
$num_query = mysqli_query($conn,$nam);
$n = mysqli_fetch_array($num_query);
$mynam = $n['name'];
$g= $mynam;

//admin
    $sub="admin";
    $msg = $_POST['message'];
    
  // insert
  $query="insert into chats (sender_regnum ,name, receiver, message) values('".$sname."','".$g."','".$sub."','".$msg."')";
  mysqli_query($conn,$query);

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DM to Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/msg.css">
    <srcipt src="../js/jquery.min.js"></srcipt>
</head>
<body>
<script>
    $(document).ready(function () {
        setInterval(function () {
            $('#show')
        },2000);
    });
</script>
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="home.php" ><img src="images/msu logo.png" width="30" height="30" class="d-inline-block align-top" alt=""><b>M.S.U</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="lostids.php"><span class="label label-pill label-danger count">Messages</span></a>
                  <ul class="dropdown-menu"></ul>
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
      
      <!-- nav bar for the form -->
    <div id="respond">
            <div class="output" id="show" style="background-color: whitesmoke; height: 500px;width: 1200px; border-radius:10px;overflow-y: auto;margin-left: 170px;">
<!--                displaying messages sent from here -->
                <?php
                $sname=$_SESSION['username'];
                $m="select message,date,sender_regnum,receiver from chats where (receiver or sender_regnum)='".$sname."' ORDER BY id ASC ";
                $rem=mysqli_query($conn,$m);
                while($k=mysqli_fetch_array($rem))
                {
                    ?>
                    <div style="border-radius:5px; margin-left: 10px;margin-bottom: 20px;">
                        <div style="text-transform: uppercase;font-weight: bold;color: #007bff"><?php echo $k['sender_regnum']."<br>"?></div>
                        <?php echo ucfirst($k['message']);?>
                        <h6 style="color: #007bff;font-size: 10px;"><?php echo $k['date']."<br>";?></h6>
                    </div>
                 <?php
                }
                ?>
            </div>
<center>
            <form action="msg.php" method="POST">
                <input class="form-control" name="message" style="width: 1000px !important; margin-top: 20px;margin-right: 170px;" type="text" placeholder="Type to send message">
             <input name="send" type="submit" value="Send message" class="btn btn-primary btn-sm" style="margin-left: 1000px;margin-top: -85px;"/>
            </form>

        </center>


    </div>
</body>
</html>


