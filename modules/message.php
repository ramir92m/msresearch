<?php
session_start();
require '../class/Database.php';
//
$db = new Database();

if(isset($_GET['type']))
{
    $type = $_GET['type'];
    
    if($type == "announce")
    {
            $occupation = $_SESSION['occupation'];

            if($occupation == "Student")
            {
                $dept = $_SESSION['course'];



                $mysql = $db->selectData("*", "bulletin", "dept = '$dept'");

                while($row = mysql_fetch_assoc($mysql))
                {
                    echo "<div class='well media' style='margin:0 10px;'><div class='media-body'><h5 class='media-header'>".$row['sender']."</h5><p>".$row['msg']."</p> <i style='font-size:8pt;'>Post on Jun 12 2012</i></div></div><br/>";
                }
            }

            if($occupation == "Moderator")
            {
                $dept = $_SESSION['coursehandle'];



                $mysql = $db->selectData("*", "bulletin", "dept = '$dept'");

                while($row = mysql_fetch_assoc($mysql))
                {
                    echo "<div class='well media' style='margin:0 10px;'><div class='media-body'><h5 class='media-header'>".$row['sender']."</h5><p>".$row['msg']."</p> <i style='font-size:8pt;'>Post on Jun 12 2012</i></div></div><br/>";
                }
            }
            if($occupation == "R&DD Personnel")
            {
                $dept = $_SESSION['coursehandle'];



                $mysql = $db->selectData("*", "bulletin");

                while($row = mysql_fetch_assoc($mysql))
                {
                    echo "<div class='well media' style='margin:0 10px;'><div class='media-body'><h5 class='media-header'>".$row['sender']."</h5><p>".$row['msg']."</p> <i style='font-size:8pt;'>Post on Jun 12 2012</i></div></div><br/>";
                }
            }
    }
    
    if($type == "message")
    {
        
    }
}
?>
