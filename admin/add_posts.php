<?php
include 'connection.php';
include 'home.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD POSTS | MSU</title>
    <LINK rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <LINK rel="stylesheet" type="text/css" href="css/upload_notifications.css">
</head>
<body>
<h4 style="margin-left: 300px; margin-top: 20px; font-weight: bold;border-bottom: 2px solid black;display: inline-block;">Main Posts To Students</h4>
<div class="grid_10">
    <div class="box round first">
        <h4 id="nit" style="font-weight: bold;">Add Posts  </td></h4>
        <div class="block">
            <form action="upload_notification.php" method="POST" enctype="multipart/form-data">
                <table >
                    <tr>
                        <td id="la">Post Subject</td>
                        <td><input type="text" name="sub" style="color: #007bff; width: 1185px;border: 1px solid #007bff;"></td>
                    </tr>
                    <tr>
                        <td id="la">Full Post</td>
                        <td><textarea cols="140" rows="5" name="msg"></textarea></td>
                    </tr>
                    <td id="la">Program</td>
                    <td>
                       <input type="file" name="file" style="color: #007bff;">
                    </td>
                    <tr>
                        <center>
                            <td colspan="2" align="center"><input type="submit" name="submit" value="Upload" class="btn btn-primary" id="upload" style="margin-top: 10px;"></td>
                        </center>
                    </tr>
                </table>


<!--                php code for upload was sucessfull or not-->

                <a href="view_notices.php"><b>View Notices</b></a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
