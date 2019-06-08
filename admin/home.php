<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/adminhome.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <!-- this is the navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="nav">
<a class="navbar-brand" href="#">
    <img src="../images/msu logo.png" width="30" height="30">
  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php"><b>HOME</b><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                    <li>
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span><img src="../images/msg.png" alt=""></a>
                        <ul class="dropdown-menu"></ul>

                    </li>
                </ul>
                <a href="../viewpage.php"><h4 class="view" style="margin-left: 100px;">View site</h4></a>
                <h5 class="welcome" ><b>Welcome</b>-Admin</h5>
                <a href="index.php"><button type="button" class="btn btn-primary btn-sm"style="margin-left: 100px;"><b>Logout</b></button></a>
            </div>
</nav>

       <!-- this is the sidebar -->

    <div id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
        </div>
      <ul>
          <a href="home.php"><li style="color: #000; font-weight: bold;font-size: 20px;">Dashboard</li></a>
          <img src="images/msubg.jpg" height="130" width="200">
         <a href="mesages.php"><li><img src="../images/msg.png" width="25" height="25"> Messages</li></a>
         <a href="add_posts.php"><li><img src="images/icons/add1.png" height="25" width="25"> Add Posts</li></a>
         <a href="upload_notification.php"><li><img src="images/icons/add.png" width="25" height="25"> Add Notification</li></a>
         <a href="view_visitors.php"><li><img src="images/icons/bar-chart.png" height="25" width="25"> View Reports</li></a>
          <a href=""><li><img src="images/icons/settings.png" height="25" width="25"> Settings</li></a>
      </ul>
    </div>
        <div style="border: 1px solid #007bff;margin-left: 300px;padding: 15px;margin-right: 9px;background-color: transparent;background-color: ghostwhite">
            <?php
            include 'connection.php';

            $re= mysqli_query($conn,"SELECT SUM(count) AS totalsum FROM login");

            $row = mysqli_fetch_assoc($re);

            $sum = $row['totalsum'];
            ?>

            <center><h4 style="font-size: 18px;border-bottom: 4px solid #007bff;display: inline-block;margin-bottom: 10px;"><b>The Number Of Site Visits</b></h4></center>
            <center><h3 style="border: 1px solid;display: inline-block;padding: 8px;border-radius:50px;background-color: #007bff;color: white;font-weight: bold;">
                    <?php echo $sum;?></h3></center>
            <center><a href="view_visitors.php"><h5 style="font-size: 16px;"><img src="images/icons/vi.png" height="30" width="30">View visitors</h5></a></center>
        </div>
        <script src="js/sidebar.js"></script>


    </body>
</html>

