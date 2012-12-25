<?php
session_start();
require '../class/Database.php';

$db = new Database();

$data = array(
                
                "acct_ID"=>$_SESSION['acct_ID'],
                "sender"=>$_SESSION['fname']." ".$_SESSION['lname'],
                "msg"=>$_POST['msg'],
                "dept"=>$_SESSION['course'],
                "dateMsg"=>"June 12 2012"
    
);

$db->insertData($data, "bulletin");
header("Location: admin.php");


?>
