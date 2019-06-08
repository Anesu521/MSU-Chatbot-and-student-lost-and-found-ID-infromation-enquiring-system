<?php
session_start();
$sname=$_SESSION['username'];

// emptying variable
$gotit='';

// connecting to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "msu";

$conn=mysqli_connect("localhost","root","") or Die("Database Connection error");
$db=mysqli_select_db($conn,"msu") or Die("Database is not Found");

// selecting student name from database using regnumber
$nam ="SELECT name FROM student_details WHERE reg_num ='".$sname."'";
$num_query = mysqli_query($conn,$nam);
$n = mysqli_fetch_array($num_query);
$myname = $n['name'];
$gotit= $myname;


?>
<html>
<head>
    <title>home</title>
    <meta name="viewpoint" content="width=divice-width , initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css"
    <link rel="shortcut icon" href="images/icons/icon.ico">
    <link rel="stylesheet" type="text/css" href="css/home.css">

    <script src="js/pace.js"></script>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/pace/center_radar.css">
</head>
<body data-spy="scroll">

<div class="border1">

    <!------ navigation bar ----->
    <div class="sidenav">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
            <a class="navbar-brand" href="home.php" ><img src="images/msu logo.png" width="30" height="30" class="d-inline-block align-top" alt=""><b>M.S.U</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="msg.php">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notifications.php">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="msu bot/index.html">Instant Chat <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lost.php">Lost IDs</a>
                    </li>

                </ul>
            </div>
            <div><h5 class="animated SlideInLeft" id="welcome"><span class="wel">Welcome - </span><?php echo $gotit."-".$sname;?> </h5></div>
<!--            submit button -->
            <form method="post">
            <a href="index.php"><input type="submit" value="Logout" name="logout" class="btn btn-primary btn-sm" ></a>
            </form>

        </nav>
    </div>

    <!---image TOP  ---->
    <div class=pasi>
        <img src="images/msu front.jpg" id="frontimg" class="animated flipinx">
        <div>
            <center><h5 class="animated SlideInDown" id="online">ONLINE ENQUIRIES</h5></center></br>
            <a href="msu bot/index.html" class="btn btn-full" id="lets">Lets Chat</a>
            <a href="lost.php" class="btn btn-full" id="my">LostID</a>
        </div>
    </div>

    <!--    inportant information to students-->
    <center>
        <div class="top_m"><h2>IMPORTANT INFORMATION</h2></div>
        <span class="top_n">for fast movement of information</span>
    </center>

    <!--    part of icons-->
    <div class="icons">

    </div>

    <!-- for posting to homeno.php page -->
    <div id="wrapper">
        <!--other information-->
        <div class="infor">
            <h5 id="n"><img src="images/icons/info.png" height="30" width="30">Information <span id="i">|</span><span id="pow"> powered by MSU</span></h5>
            <div class="info">
                <h6><img src="images/msubg.jpg">New main admin is now located at Main Campus gate.</h6>
            </div>
        </div>
        <!--        notification side-->
        <div class="right_eN">
            <!--        login to elearning-->
            <div class="elearing">
                <h5><img src="images/icons/icon.ico" height="30" width="30">For logging in to e-learning services <br><center>Click <a href="https://elearning.msu.ac.zw/home">Here</a></center></h5>
            </div>
            <!--            -->
            <div class="notices">
                <h5 id="not"><img src="images/icons/notification.png" height="30" width="30">Notice</h5>
                <div id="comes">
                    <?php
                    $get_prog="select program from student_details where reg_num='".$sname."'";
                    $num_que = mysqli_query($conn,$get_prog);
                    $nv = mysqli_fetch_array($num_que);
                    $prog = $nv['program'];
                    $pro= $prog;


                    $res=mysqli_query($conn,"select * from admin_posts where program='".$pro."' ORDER BY id DESC");
                    if($res->num_rows>0)
                    {
                        ?>
                        <div style="font-weight: bold;"><?php echo strtoupper($pro)." "."Notices"."<br>"."<br>";?></div>
                    <?php
                        while ($row = mysqli_fetch_array($res)) {
                            ?>

                    <div class="sub">
                        <?php echo $row ['subject'] . " "; ?>
                    </div>
                    <?php
                    echo $row ['date'] . "<br>";
                    ?>
                    <div class="un">
                        <?php echo $row ['message'] . "<br>" . "<br>"; ?>
                    </div>
                    <?php
                    }
                    }
                    else
                    {
                        echo strtoupper("the are no notifications for your program".":".$pro);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- bottom services -->
    <div class="animated SlideInDown">
        <div class="services">
            <center><img src="images/msu logo.png" width="70" height="70" class="bottomlogo"></center>
            <h1>Online Services</h1>
            <div class="cen">
                <div class="service">
                    <img src="images/icons/computer.png" width="40" height="40" class="boxlogo">
                    <h2 class="headtext">Online enquiries</h2>
                    <p class="bottom-p"> A foundation examine has occurred, which have purchased the me to compose a proposition to build up a MSU Student Information Enquiring System. The fundamental goal of this framework is to give a framework to understudies that empowers them to make enquiries without making a trip to the grounds workplaces.</p>
                </div>
                <div class="service">
                    <img src="images/icons/id.png" width="40" height="40" class="boxlogo">
                    <h2 class="headtext"> lost Id cards</h2>
                    <p class="bottom-p"> A foundation examine has occurred, which have purchased the me to compose a proposition to build up a MSU Student Information Enquiring System. The fundamental goal of this framework is to give a framework to understudies that empowers them to make enquiries without making a trip to the grounds workplaces.</p>
                </div>
                <div class="service">
                    <img src="images/icons/location.png" width="40" height="40" class="boxlogo">
                    <h2 class="headtext">get directions</h2>
                    <p class="bottom-p"> A foundation examine has occurred, which have purchased the me to compose a proposition to build up a MSU Student Information Enquiring System. The fundamental goal of this framework is to give a framework to understudies that empowers them to make enquiries without making a trip to the grounds workplaces.</p>
                </div>
                <div class="service">
                    <img src="images/icons/group.png" width="40" height="40" class="boxlogo">
                    <h2 class="headtext">group chat</h2>
                    <p class="bottom-p"> A foundation examine has occurred, which have purchased the me to compose a proposition to build up a MSU Student Information Enquiring System. The fundamental goal of this framework is to give a framework to understudies that empowers them to make enquiries without making a trip to the grounds workplaces.</p>
                </div>
                <div class="service">
                    <img src="images/msu logo.png" width="30" height="30" class="boxlogo">
                    <h2 class="headtext">Service Name</h2>
                    <p class="bottom-p"> A foundation examine has occurred, which have purchased the me to compose a proposition to build up a MSU Student Information Enquiring System. The fundamental goal of this framework is to give a framework to understudies that empowers them to make enquiries without making a trip to the grounds workplaces.</p>
                </div>
                <div class="service">
                    <img src="images/msu logo.png" width="30" height="30" class="boxlogo">
                    <h2 class="headtext">about</h2>
                    <p class="bottom-p"> A foundation examine has occurred, which have purchased the me to compose a proposition to build up a MSU Student Information Enquiring System. The fundamental goal of this framework is to give a framework to understudies that empowers them to make enquiries without making a trip to the grounds workplaces.</p>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="before">
    <center>
        <h3>WELCOME TO</h3>
        <h4>MSU ONLINE ENQUIRIES</h4>
    </center>
</div>

<footer class="footer">
    <center><h1>MIDLANDS STATE UNIVERSITY</h1></center>
    <center><img src="images/msu logo.png" class="footerlogo" width="70" height="70"></center>
    <center><h4>MSU@2019</h4></center>
</footer>

</div>

<script>
    //  sidenav
    const sideNav = document.querySelector('.sidenav.');
    M.sidenav.init(sideNav{});

</script>
</body>
</html>
