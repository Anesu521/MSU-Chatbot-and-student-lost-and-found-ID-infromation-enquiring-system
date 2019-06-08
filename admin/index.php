<!DOCTYPE html>

<?php
// error_reporting(0);
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "msu";

$wrong='';
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn ->connect_error)
{
    die("connection failed".$conn->connect_error);
}
if(isset($_POST['username']))
{
    $email = $_POST['username'];
    $pass= $_POST['password'];
    
    $sql = "SELECT * FROM admin_login WHERE user_name='".$email."' AND password='".$pass."' LIMIT 1";
    $results = $conn->query($sql);
    if($results->num_rows>0)
    {
        $_SESSION['username']=$email;
        header('location:home.php');
        
    }
    else 
    {
        $wrong= "wrong username or password";
    }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
</head>
<body>
    <!-- start of login form -->
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
              <img src="../images/msu logo.png" class="logo" width="40" height="40">
            <h5 class="card-title text-center" id="top">Admin LoGin</h5>
            <form class="form-signin" action="index.php" method="POST">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Password</label>
              </div>
              <!-- fro wrong pass with redd color -->
              <center>
                 <h5 class="animated shake" id="wrong"><?php echo $wrong; ?></h5>
              </center>
                <br>
              <div class="forgot">
                <a href="forgot_pass.php">Forgotten account?</a>
              </div>
              <br>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign in</button>
              <hr class="my-4">
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of login form -->
</body>
</html>