<!DOCTYPE html>
<?php
include "home.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "msu";

$echo='';
$failed='';

$conn=mysqli_connect("localhost","root","") or Die("Database Connection error");
$db=mysqli_select_db($conn,"msu") or Die("Database is not Found");

if(isset($_POST['submit']))
{
    $query="insert into  admin_posts (subject, message, program) values ('$_POST[sub]','$_POST[msg]','$_POST[prog]')";

     if(mysqli_query($conn,$query))
     {
         $echo = "Upload was successful";
     }
     else
     {
         $failed = " Failed to Upload the File";
     }
       
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/upload_notifications.css">
</head>
<body>
<h4 style="margin-left: 300px; margin-top: 20px; font-weight: bold;border-bottom: 2px solid black;display: inline-block;">Notifications To Students</h4>
    <div class="grid_10">
        <div class="box round first">
            <h4 id="nit" style="font-weight: bold;">Add notification  </td></h4>
            <div class="block">
                <form action="upload_notification.php" method="POST" enctype="multipart/form-data">
                    <table >
                        <tr>
                            <td id="la">Notification Subject</td>
                            <td><input type="text" name="sub" style="color: #007bff; width: 1185px;border: 1px solid #007bff;"></td>
                        </tr>
                        <tr>
                            <td id="la">Full notification</td>
                            <td><textarea cols="140" rows="5" name="msg"></textarea></td>
                        </tr>
                         <td id="la">Program</td>
                        <td>
                            <select name="prog" style="color: #007bff;border: 1px solid #007bff;width: 1185px;">
                                <option VALUE="information systems">Information systems</option>
                                <option value="marketing">Marketing</option>
                                <option value="business studies">Business STUDIES</option>
                            </select>
                        </td>
                        <tr>
                            <center>
                        <td colspan="2" align="center"><input type="submit" name="submit" value="Upload" class="btn btn-primary" id="upload" style="margin-top: 10px;"></td>
                            </center>
                        </tr>
                    </table>
                    <h3 id="echo"><?php echo $echo;?></h3>
                    <h3 id="failed"><?php echo $failed;?></h3>
                    <a href="view_notices.php"><b>View Notices</b></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>