<?php 

$studName = $_POST['studName'];
$date = $_POST['date'];
$course = $_POST['course'];
$moderator = $_POST['moderator'];
$schoolYear = $_POST['schoolYear'];
$semester = $_POST['semester'];
$supervisor = $_POST['supervisor'];
$position = $_POST['position'];
$hostCompany = $_POST['hostCompany'];
$companyAddress = $_POST['companyAddress'];
$oneRating = $_POST['oneRating'];
$oneComment = $_POST['oneComment'];
$twoRating = $_POST['twoRating'];
$twoComment = $_POST['twoComment'];
$threeRating = $_POST['threeRating'];
$threeComment = $_POST['threeComment'];
$fourRating = $_POST['fourRating'];
$fourComment = $_POST['fourComment'];
$fiveRating = $_POST['fiveRating'];
$fiveComment = $_POST['fiveComment'];
$sixRating = $_POST['sixRating'];
$sixComment = $_POST['sixComment'];
$sevenRating = $_POST['sevenRating'];
$sevenComment = $_POST['sevenComment'];
$new = $_POST['new'];
$monetary = $_POST['monetary'];
$muchM = $_POST['muchM'];
$hourM = $_POST['hourM'];
$dayM = $_POST['dayM'];
$weekM = $_POST['weekM'];
$monthM = $_POST['monthM'];
$transpo = $_POST['transpo'];
$muchT = $_POST['muchT'];
$dayT = $_POST['dayT'];
$weekT = $_POST['weekT'];
$monthT = $_POST['monthT'];
$food = $_POST['food'];
$muchF = $_POST['muchF'];
$dayF = $_POST['dayF'];
$weekF = $_POST['weekF'];
$monthF = $_POST['monthF'];
$other = $_POST['other'];
$otherText = $_POST['otherText'];
$muchO = $_POST['muchO'];
$dayO = $_POST['dayO'];
$weekO = $_POST['weekO'];
$monthO = $_POST['monthO'];
$yes = $_POST['yes'];
$no = $_POST['no'];
$why = $_POST['why'];
$specCourse = $_POST['specCourse'];
$OoneRating = $_POST['OoneRating'];
$OoneComment = $_POST['OoneComment'];
$PoneRating = $_POST['PoneRating'];
$PoneComment = $_POST['PoneComment'];
$PtwoRating = $_POST['PtwoRating'];
$PtwoComment = $_POST['PtwoComment'];
$PthreeRating = $_POST['PthreeRating'];
$PthreeComment = $_POST['PthreeComment'];
$SoneRating = $_POST['SoneRating'];
$SoneComment = $_POST['SoneComment'];
$StwoRating = $_POST['StwoRating'];
$StwoComment = $_POST['StwoComment'];
$SthreeRating = $_POST['SthreeRating'];
$SthreeComment = $_POST['SthreeComment'];
$ModoneRating = $_POST['ModoneRating'];
$ModoneComment = $_POST['ModoneComment'];
$ModtwoRating = $_POST['ModtwoRating'];
$ModtwoComment = $_POST['ModtwoComment'];
$ModthreeRating = $_POST['ModthreeRating'];
$ModthreeComment = $_POST['ModthreeComment'];
$ModfourRating = $_POST['ModfourRating'];
$ModfourComment = $_POST['ModfourComment'];
$ModfiveRating = $_POST['ModfiveRating'];
$ModfiveComment = $_POST['ModfiveComment'];
$ModsixRating = $_POST['ModsixRating'];
$ModsixComment = $_POST['ModsixComment'];
$comment1 = $_POST['comment1'];
$StaoneRating = $_POST['StaoneRating'];
$StaoneComment = $_POST['StaoneComment'];
$StatwoRating = $_POST['StatwoRating'];
$StatwoComment = $_POST['StatwoComment'];
$StathreeRating = $_POST['StathreeRating'];
$StathreeComment = $_POST['StathreeComment'];
$comment2 = $_POST['comment2'];

 
mysql_connect('localhost','root','');
mysql_select_db('srpdb');
mysql_query("INSERT INTO evaluation(studName,date,course,moderator,schoolYear,semester,supervisor,position,hostCompany,companyAddress,oneRating,oneComment,twoRating,twoComment,threeRating,threeComment,fourRating,fourComment,fiveRating,fiveComment,sixRating,sixComment,sevenRating,sevenComment,new,monetary,muchM,hourM, dayM,weekM,monthM,transpo,muchT,dayT,weekT,monthT,food,muchF,dayF,weekF,monthF,other,otherText,muchO,dayO,weekO,monthO,yes,no,why,specCourse,OoneRating,OoneComment,PoneRating,PoneComment,PtwoRating,PtwoComment,PthreeRating,PthreeComment,SoneRating,SoneComment,StwoRating,StwoComment, SthreeRating,SthreeComment,ModoneRating,ModoneComment,ModtwoRating,ModtwoComment,ModthreeRating,ModthreeComment,ModfourRating,ModfourComment,ModfiveRating,ModfiveComment,ModsixRating,ModsixComment,comment1,StaoneRating,StaoneComment,StatwoRating,StatwoComment,StathreeRating,StathreeComment,comment2) VALUES('$studName','$date','$course','$moderator','$schoolYear','$semester','$supervisor','$position','$hostCompany','$companyAddress','$oneRating','$oneComment','$twoRating','$twoComment','$threeRating','$threeComment','$'$fourComment','$fiveRating','$fiveComment','$sixRating','$sixComment','$sevenRating','$sevenComment','$new','$'$muchM','$dayM','$weekM','$monthM','$transpo','$muchT','$dayT','$weekT','$monthT','$food','$muchF','$dayF','$weekF','$monthF','$other','$otherText','$muchO','$dayO','$weekO','$monthO','$yes','$no','$why','$specCourse','$OoneRating','$OoneComment','$PoneRating','$PoneComment','$PtwoRating','$'$PthreeRating','$PthreeComment','$SoneRating','$SoneComment','$StwoRating','$StwoComment','$SthreeRating','$SthreeComment','$ModoneRating','$ModoneComment','$ModtwoRating','$ModtwoComment','$ModthreeRating','$ModthreeComment','$ModfourRating','$ModfourComment','$ModfiveRating','$ModfiveComment','$ModsixRating','$ModsixComment','$comment1','$StaoneRating','$StaoneComment','$StatwoRating','$StatwoComment','$StathreeRating','$StathreeComment','$comment2')");
header('Location: ../eval.php');




?>