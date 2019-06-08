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
    <title>Document</title>
</head>
<body>
<style>
    th
    {
        padding: 15px;
    }
</style>
<h4 style="margin-left: 300px;margin-top: 20px;font-weight: bold;border-bottom: 2px solid #007bff;">View Student Statistics </h4>
<!--table showing number of logins to the system-->
<h5 STYLE="margin-left: 300px;color: #007bff;">LAST SEEN AND NUMBER OF LOGINS</h5>
    <table border="1" style="border: 1px solid #007bff;margin-left: 300px;margin-top: 20px;text-align: center;">
        <tr>
            <th>Reg Number</th>
            <th>Name</th>
            <th>Number Of Logins</th>
            <th>Time & Date of Last Login</th>
        </tr>
        <?php
        $s="select reg_num,count,date_time_login from login";
        $re=$conn->query($s);

        if($re->num_rows>0)
        {
//            getting name of student
            while ($row=$re->fetch_assoc())
            {
                $name=$row['reg_num'];
                $n="select name from student_details where reg_num='".$name."'";
                $run=$conn->query($n);
                while ($c=$run->fetch_assoc())
                {
                    $n=$c['name'];
                }
//                end of getting name of student

//                echoing things things in table
                echo "<tr><td style='text-transform: uppercase;'>".$row['reg_num']."</td><td style='text-transform: uppercase;padding: 4px;'>".$n."</td><td>".$row['count']."</td><td>".$row['date_time_login']."</td></tr>";
            }
        }
        ?>
    </table>
</table>

</body>
</html>
