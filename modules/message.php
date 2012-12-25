<?php
session_start();
require '../class/Database.php';
//
$db = new Database();

$dept = $_SESSION['course'];



$mysql = $db->selectData("*", "bulletin", "dept = '$dept'");

while($row = mysql_fetch_assoc($mysql))
{
    echo "<div class='well media' style='margin:0 10px;'><div class='media-body'><h5 class='media-header'>".$row['sender']."</h5><p>".$row['msg']."</p> <i style='font-size:8pt;'>Post on Jun 12 2012</i></div></div><br/>";
}




?>
