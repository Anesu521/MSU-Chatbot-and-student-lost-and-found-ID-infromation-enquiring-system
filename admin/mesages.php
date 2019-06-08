<?php
session_start();
include 'connection.php';
include 'home.php';

?>

<html>
<head>
    <title>Messages | SENT</title>
    <srcipt src="../js/jquery.min.js"></srcipt>
</head>
<body>
<style>
    .received
    {
        overflow-y: auto;
        max-height:500px;
    }
</style>

<h4 style="margin-left: 300px;margin-top: 15px;font-weight: bold; border-bottom: 2px solid #007bff;">Messages Sent By Students</h4>
        <div class="received" style="margin-left: 300px; ">
            <?php
            $ad="admin";
                $res=mysqli_query($conn,"select DISTINCT sender_regnum,message,date, max(id) as max_id from chats where sender_regnum <> '".$ad."' group by sender_regnum ORDER BY id DESC");
               if($res->num_rows>0)
            {
            while ($row = mysqli_fetch_array($res))
            {
            $gname = $row ['sender_regnum'];
            $_SESSION['gname'] =$gname;
            $date = $row['date'];
            $msg = $row['message'];

            //        getting sender message name
            $j="select name from student_details where reg_num='".$gname."'";
            $ge=mysqli_query($conn,$j);

            while ($o = mysqli_fetch_array($ge))
            {
                $mne=$o['name'];
            }
            ?>


            <h4 style="font-size: 12px">Message from</h4>

            <a href="user_messages.php"><h4
                        style="border: 1px solid #007bff;height: 100px; border-radius: 10px;font-size: 18px;padding: 4px;background-color: #3b5998;color: white;text-transform: uppercase;">
                    <img src="images/icons/user.png" width="25" height="25"> <?php echo $gname."-".$mne;


                    ?>
                    <br><span style="margin-left: 30px; color: #000;"><?php echo $msg . "<br>"; ?></span><span style="font-size: 12px; margin-left: 1180px;color: white;">
                                <?php echo $date; ?></span>

                    <?php

                    }
                    }
               else
               {
                   echo "No messages received";
               }
                    ?></h4></a>
        </div>
</body>
</html>

