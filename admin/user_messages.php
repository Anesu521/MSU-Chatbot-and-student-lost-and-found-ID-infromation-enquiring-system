<?php
session_start();
include "connection.php";
include "home.php";
$gname=$_SESSION['gname'];

//        getting sender message name
$j="select name from student_details where reg_num='".$gname."'";
$ge=mysqli_query($conn,$j);

while ($o = mysqli_fetch_array($ge))
{
    $mne=$o['name'];
}
?>
<html>
<head>
    <title></title>
    <srcipt src="../js/jquery.min.js"></srcipt>
</head>
    <body>
<!--    script for no freshing the page-->
    <script>
        $(document).ready(function () {
            setInterval(function () {
                $('#show')
            },2000);
        });
    </script>

<!--//end of script without refreshing the page-->

    <div style="padding: 5px;margin-left: 320px;color: #007bff;font-weight: bold;">
        <h6 style="color: #000;"><?php echo "You are chatting with"."-"?></h6><?php echo strtoupper($mne);?>
    </div>
        <form method="post">
            <div id="show" style="background-color: whitesmoke;margin-left: 300px; height: 380px;width: 1310px; margin-top: 0px;overflow-y: auto;">

                <?php
                $ad="admin";
                $m="select message,date,sender_regnum,receiver from chats where (receiver || sender_regnum)='".$ad."' ORDER BY id ASC ";
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
            <input class="form-control" name="move_msg" style="width: 1000px !important; margin-top: 20px;margin-left: 300px;" type="text" placeholder="Type to send message">
            <input type="submit" class="btn btn-primary" value="SEND MESSAGE" name="move" style="margin-top: -64px; margin-left: 1400px;">
        </form>

<!--    sennding messages to db-->
        <?php

        if(isset($_POST['move']))
        {
            $message_ = $_POST['move_msg'];
            $fro = "admin";
            $in = "insert into chats (sender_regnum,name, message,receiver) value ('" . $fro . "','".$mne."','" .$message_ ."','".$gname."')";
            mysqli_query($conn, $in);
        }
        ?>
    </body>
</html>
