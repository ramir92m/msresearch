<?php 

/*
var  date= $('#date').val();
                                    var  gender= $('#gender').val();
                                    var  studName= $('#studName').val();
                                    var  cn1= $('#cn1').val();
                                    var  contactPersonOne = $('#contactPerson1').val();
									var  positionOne = $('#position1').val();
                                    var  companyNameOne = $('#companyName1').val();
									var  companyAddressOne = $('#companyAddress1').val();*/
									

$date = $_POST['date'];
$gender = $_POST['gender'];
$studName = $_POST['studName'];
$cn1 = $_POST['cn1'];
$contactPerson1 = $_POST['contactPerson1'];
$position1 = $_POST['position1'];
$companyName1 = $_POST['companyName1'];
$companyAddress1 = $_POST['companyAddress1'];
$cn2 = $_POST['cn2'];
$contactPerson2 = $_POST['contactPerson2'];
$position2 = $_POST['position2'];
$companyName2 = $_POST['companyName2'];
$companyAddress2 = $_POST['companyAddress2'];

mysql_connect('localhost','root','');
mysql_select_db('srpdb');
mysql_query("INSERT INTO recoletter(date,gender,studName,cn1,contactPerson1,position1,companyName1,companyAddress1,cn2,contactPerson2,position2,companyName2,companyAddress2) VALUES('$date','$gender','$studName','$cn1','$contactPerson1','$position1','$companyName1','$companyAddress1','$cn2','$contactPerson2','$position2','$companyName2','$companyAddress2')");
header('Location: ../recoletter.php');




?>