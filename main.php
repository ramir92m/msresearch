<?php

session_start();
if(!isset($_SESSION['stud_ID']))
{
    header("Location: index.php");
}

    
?>

<!DOCTYPE html>

<html>
	<head>
		<title> MS-Research: Managament System for SRP Program </title>
		
                <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="css/profile.css" />
                <link rel="icon" href="img/favicon.png" />
	</head>
            
        <body>
  
            <script src="js/jquery-1.8.3.js"></script>
           <script src="js/bootstrap.min.js"></script>
           
           <div class="navbar navbar-inverse navbar-fixed-top" id="header">
               <div class="navbar-inner">
                   <div class="container">
                       
                       <a class="brand" href="#"><img src="img/title3.png" /></a>
                       <div class="nav-collapse ">
                           <ul class="nav pull-right">
                               <li>
                                   <form class="navbar-search" action="#" method="post">
                                          <br />
                                          <input type="text" placeholder="Search Host Company" />
<!--                                          <select class="span1">
                                              <option>BSIT</option>
                                              <option>BSCS</option>
                                          </select>-->
                                          
                                       
                                   </form>
                               </li>
                               <li class="dropdown">
                                   <br />
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                       <span><i class="icon-user"></i><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?> <span class="caret"></span> </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                       <li><a href="#"><i class="icon-headphones"></i>&nbsp;Profile</a></li>
                                       <li><a href="transaction.php?trans=logout"><i class="icon-off"></i>&nbsp;Logout</a></li>
                                   </ul>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div> 
           
           <!-- End of header -->
           
           
           <div id="content">
               <div class="container-fluid">
                   <div class="row-fluid">
                       <div class="span2 offset1">
                           <div id="sidenav">
                               <b>Student Menu</b>
                               
                               <div>
                                   <ul class="nav nav-pills nav-stacked">
                                       <li><a href="main.php"><i class="icon-home"></i> Home</a></li>
                                       <li><a href="main.php?type=profile"><i class="icon-pencil"></i> Profile</a></li>
                                       <li><a href="main.php?type=ojtforms"><i class="icon-file"></i>OJT Forms</a></li>
                                       <li><a href="#"><i class="icon-wrench"></i>OJT Status</a></li>
                                       <li><a href="main.php?type=evalform"><i class="icon-edit"></i>OJT Host Evaluation</a></li>
                                       <li><a href="main.php?type=recoletter"><i class="icon-file"></i>Recomendation Letter</a></li>
                                       <li><a href="#"><i class="icon-calendar"></i> Schedule of Activities</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       
                       <div class="span8" id="content-body">
                               <ul class="breadcrumb">
                                  <?php 
                                    
                                  if(isset($_GET['type']))
                                  {
                                      if($_GET['type'] == "evalform")
                                      {
                                          echo '<li><a href="main.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="main.php?type=evalform">OJT Evaluation Form</a> <span class="divider">/</span></li>';
                                      }
                                      elseif($_GET['type'] == "recoletter")
                                      {
                                          echo '<li><a href="main.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="main.php?type=recoletter">Recommendation Letter</a> <span class="divider">/</span></li>';
                                      }
                                      elseif($_GET['type'] == "profile")
                                      {
                                          echo '<li><a href="main.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="main.php?type=profile">Profile</a> <span class="divider">/</span></li>';
                                      }
                                      elseif($_GET['type'] == "ojtforms")
                                      {
                                          echo '<li><a href="main.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="main.php?type=ojtforms">OJT Forms</a> <span class="divider">/</span></li>';
                                      }
                                  }
                                  else
                                  {
                                      echo '<li><a href="main.php">Announcement</a> <span class="divider">/</span></li>
                                        ';
                                  }
                                  ?>
                                
                              </ul>                              
                              <hr/>
                              
                              <?php 
                              if(isset($_GET['type']))
                              {
                                   $getType = $_GET['type'];
                              
                             
                              
                              if($getType == 'evalform')
                              {
                                  echo '<fieldset id="fieldset">
									
                                    <legend>OJT Host Company Evaluation</legend>
									
									<form action="modules/addeval.php" method="POST">
									
									<table>
									
									<tr>
										<td> Name of Student: &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="studName" class="span4"/> </td>
										<td> Date: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label> <input type="text" name="date" class="span3"/> </td>
									</tr>
									
									<tr>
										<td> Course: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
										<select name="course" class="span5">
											<option>Accountancy</option>
											<option>Communication</option>
											<option>Computer Engineering</option>
											<option>Computer Science</option>
											<option>Education</option>
											<option>Electrical Engineering</option>
											<option>Electronics and Communications Engineering</option>
											<option>Hotel and Restaurant Management</option>
											<option>Human Resource Development Management</option>
											<option>Industrial Engineering</option>
											<option>Information Technology</option>
											<option>Management</option>
											<option>Marketing Management</option>
											<option>Mechanical Engineering</option>
											<option>Nursing</option>
											<option>Psychology</option>
											<option>Tourism Management</option>
										</select>
										</td>
										
										</td> 	
										<td> Moderator:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="moderator" class="span6"/> </td>
									</tr>
									
									<tr>
										<td> School Year:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="schoolYear" class="span4"/> </td> 		
										<td> Semester/Term: &nbsp; &nbsp; <input type="text" name="semester" class="span3"/> </td>
									</tr>
									
									<tr>
										<td> OJT Supervisor: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="supervisor" class="span4"/> </td> 		
										<td> Position:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="position" class="span3"/> </td> 
									</tr>
									
									<tr>
										<td colspan="2">OJT Host-Company: &nbsp; &nbsp; <input type="text" name="hostCompany" class="span9"/></td> 	
									</tr>
									
									<tr>
										<td colspan="2">Company Address: &nbsp; &nbsp; &nbsp; <input type="text" name="companyAddress" class="span9"/> </td> 									
									</tr>
									
									</table>
								
									
									
									<table colspan="2">
									
									<tr align="justify">
									<td  class = "istyle"><i>Students are required to evaluate their OJT host-companies in order to help gauge the success of 
									their training, determine the appropriateness of the company to the program of the student, and to 
									obtain qualitative data. Rest assured that any information written in this evaluation form will be 
									treated with utmost confidentiality. Accordingly, please rate your OJT host-company using the following 
									scale:
									</i></td >
									</tr>
									
									<tr>
									<td align="center"><b>
									&nbsp; &nbsp; &nbsp;5=Excellent&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4=Very Good&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3=Good&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2=Fair&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1=Poor
									</b></td>
									</tr>
									
									</table>
									
									
									<table>
									
									<tr>
										<td align="center">CRITERIA</td >
										<td align="center">RATING</td >
										<td align="center">COMMENTS/SUGGESTIONS</td >
									</tr>
									
									
									<tr>
										<td>1.	Training given by the company was course-related</td>
										<td align="center">
										<select name="oneRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="oneComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>2.	OJT Supervisors were able to impart additional knowledge and skills related to the course of the student</td>
										<td align="center">
										<select name="twoRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="twoComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>3.	The working environment was conducive to training and learning</td>
										<td align="center">
										<select name="threeRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="threeComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>4.	The OJT host-company provided complete facilities needed for the training of students <br />
										(i.e. For CSIT, availability of computers or software; for ME, IE and EE, availability of machines 
										and tools,<br /> among others)</td>
										<td align="center">
										<select name="fourRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="fourComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>5.	Training areas/activities specified in the R&DD Training Plan were successfully carried out</td>
										<td align="center">
										<select name="fiveRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="fiveComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>6.	Interpersonal working relationship with employees of the company was positively maintained</td>
										<td align="center">
										<select name="sixRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="sixComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>7.	Safety of the trainees in the work place was ensured by the company</td>
										<td align="center">
										<select name="sevenRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="sevenComment" rows="3" class="span4"></textarea></td>
									</tr>
								
									</table>
									
									
									<table>
									<tr>
										<td align="justify"><b>Please list new training activities (related to your course) you have experienced that were not 
										specified in the R&DD training plan: <b> 
										</td >
									</tr>
									
									<tr>
										<td><textarea name="new" rows="3" class="span11"></textarea></td>
									</tr>
									</table>
									
									<table>
									<tr>
										<td align="justify"><b>Did the company provide you with the following benefits? 
										(Please check appropriate space whenever necessary or appropriate.)</b> 
										</td >
									</tr>
									</table>
									
									<table>
									<tr>
										<td><input type="checkbox" name="monetary"/>&nbsp; &nbsp; Monetary Allowance</td >
										<td>How much? &nbsp; &nbsp; <input type="text" name="muchM" class="span2"/></td >
										
										<td><label class="inline">Per:</label>
										<label class="checkbox inline">
											<input type="checkbox" id="hourM" value="option1"> Hour
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="dayM" value="option2"> Day
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="weekM" value="option3"> Week
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="monthM" value="option4"> Month
										</label>
										</td>
									</tr>
									
									
									<tr>
										<td><input type="checkbox" name="transpo"/>&nbsp; &nbsp; Transportation Allowance</td >
										<td>How much? &nbsp; &nbsp; <input type="text" name="muchT" class="span2"/></td >
										
										<td><label class="inline">Per:</label>
										<label class="checkbox inline">
											<input type="checkbox" id="dayT" value="option1"> Day
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="weekT" value="option2"> Week
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="monthT" value="option3"> Month
										</label>
										</td>
										
									</tr>
			
									
									<tr>
										<td><input type="checkbox" name="food"/>&nbsp; &nbsp; Food Allowance</td >
										<td>How much? &nbsp; &nbsp; <input type="text" name="muchF" class="span2"/></td >
										
										<td><label class="inline">Per:</label>
										<label class="checkbox inline">
											<input type="checkbox" id="dayF" value="option1"> Day
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="weekF" value="option2"> Week
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="monthF" value="option3"> Month
										</label>
										</td>
										
									</tr>

									
									<tr>
										<td><input type="checkbox" name="other"/>&nbsp; &nbsp; Others, please specify</td >
									</tr>
									
									<tr>
										<td>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<input type="text" name="otherText" /></td>
										<td>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; How much? &nbsp; &nbsp; <input type="text" name="muchO" class="span2"/></td >
										
										<td>
										Per:
										<label class="checkbox inline">
											<input type="checkbox" id="dayO" value="option1"> Day
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="weekO" value="option2"> Week
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="monthO" value="option3"> Month
										</label>
										</td>
										
									</tr>
									
									</table>
									
									
									<table>
									<tr>
										<td align="justify"><b>Do you recommend your OJT host company to future OJT students?
										&nbsp; </b> 
										<label class="checkbox inline">
											<input type="checkbox" id="yes" value="option2"> Yes
										</label>
										<label class="checkbox inline">
											<input type="checkbox" id="no" value="option3"> No
										</label>
										
									</td>
									</tr>
									
									<tr>
										<td align="justify"><b>Why?</b></td>
									</tr>
									
									<tr>
										<td><textarea name="why" rows="3" class="span11"></textarea></td>
									</tr>
									</table>
									
									
									<table>
									<tr>
										<td align="justify"><b>What specific courses of students do you think best fit in the training being
										provided by your host company? </b> 
										</td >
									</tr>
									
									<tr>
										<td><textarea name="specCourse" rows="3" class="span11"></textarea></td>
									</tr>
									</table>
									
									<table colspan="2">
									
									<tr align="justify">
										<td><i>Directions: 	Based on your experience, please rate the On the Job Training Program using the following scale:
										</i></td >
									</tr>
									
									
									
									<tr>
										<td align="center"><b>
										&nbsp; &nbsp; &nbsp;5=Excellent&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;4=Very Good&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3=Good&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2=Fair&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1=Poor
										</b></td>
									</tr>
									
									</table>
									
									
									<table>
									
									<tr>
										<td align="center">CRITERIA</td >
										<td align="center">RATING</td >
										<td align="center">COMMENTS/SUGGESTIONS</td >
									</tr>

									<tr>
										<td><b><i>I. OJT Program Objectives</i></b></td >
									</tr>
									
									
									<tr>
										<td>1. Objectives well understood</td>
										<td align="center">
										<select name="OoneRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="OoneComment" rows="3" class="span4"></textarea></td>
									</tr>

									<tr>
										<td><b><i><br />II. Program Guidelines/Policies</i></b></td >
									</tr>
									
									<tr>
										<td>1.	Clarity of guidelines and policies</td>
										<td align="center">
										<select name="PoneRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="PoneComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>2.	Effective implementation of the guidelines and policies</td>
										<td align="center">
										<select name="PtwoRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="PtwoComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>3. Relevance or importance of guidelines and policies to the students</td>
										<td align="center">
										<select name="PthreeRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="PthreeComment" rows="3" class="span4"></textarea></td>
									</tr>

									<tr align="justify">
										<td><b><i><br />III. OJT Activities</i></b></td >
									</tr>
									
									<tr>
										<td>1. Schedule of Activities (Orientation and Seminars)</td>
										<td align="center">
										<select name="SoneRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="SoneComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>2. Venue of OJT Activities </td>
										<td align="center">
										<select name="StwoRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="StwoComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>3. Adequacy of time allotted to meet the deadline</td>
										<td align="center">
										<select name="SthreeRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="SthreeComment" rows="3" class="span4"></textarea></td>
									</tr>

									<tr align="justify">
										<td><b><i><br />IV. Program Implementors </i></b></td>
									</tr>
									
									<tr align="center">
										<td><b><i>A. OJT MODERATOR </i></b></td>
									</tr>
									
									<tr>
										<td>1. Availability for consultation and inquiries </td>
										<td align="center">
										<select name="ModoneRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="ModoneComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>2. Assistance in locating appropriate OJT Host Company</td>
										<td align="center">
										<select name="ModtwoRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="ModtwoComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>3. Scheduling of OJT Classes</td>
										<td align="center">
										<select name="ModthreeRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="ModthreeComment" rows="3" class="span4"></textarea></td>
									</tr>
		
									<tr>
										<td>4. Professional dealing with the students </td>
										<td align="center">
										<select name="ModfourRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="ModfourComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>5. Attendance and punctuality during OJT Classes </td>
										<td align="center">
										<select name="ModfiveRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="ModfiveComment" rows="3" class="span4"></textarea></td>
									</tr>
										
									<tr>
										<td>6. Regularly conducts phone-checking and company visits </td>
										<td align="center">
										<select name="ModsixRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="ModsixComment" rows="3" class="span4"></textarea></td>
									</tr>
									</table>
									
									
									
									<table>
									<tr>
										<td><b>Other comments and suggestions: </b></td >
									</tr>
									
									<tr>
										<td><textarea name="comment1" rows="3" class="span11"></textarea></td>
									</tr>
									</table>
									
									<table>									
									<tr align="center">
										<td><b><i>B. R&DD STAFF </i></b></td>
									</tr>
									
									<tr>
										<td>1.  Availability for consultation and inquiries</td>
										<td align="center">
										<select name="StaoneRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="StaoneComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>2.  Assistance in locating appropriate OJT Host Company</td>
										<td align="center">
										<select name="StatwoRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="StatwoComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									<tr>
										<td>3.  Professional dealing with the students</td>
										<td align="center">
										<select name="StathreeRating" class="span1">
											<option>5</option>
											<option>4</option>
											<option>3</option>
											<option>2</option>
											<option>1</option>
										</select>
										</td>
										<td><textarea name="StathreeComment" rows="3" class="span4"></textarea></td>
									</tr>
									
									</table>
								
									<table>
									<tr>
										<td align="justify"><b>Other comments and suggestions: </b></td >
									</tr>
									
									<tr>
										<td><textarea name="comment2" rows="3" class="span11"></textarea></td>
									</tr>
									</table>
									
									
									<table>
									<tr align="center">
										<td colspan="2"><button type="submit" class=" btn btn-primary">Submit</button></td>
									<tr> 
									</table>
									
									
									</form>
									 
                                </p>
                              </fieldset>';
                              }
                              if($getType == "recoletter")
                              {
                                  echo '<fieldset id="fieldset">
                                    <legend>Recommendation Letter </legend>
									
									<table>
									<form action="transaction.php" method="POST">
									
									<tr>
										<td>Date: &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="date"  class="span4"/></td>
									</tr>
									
									<tr>
										<td>Gender: &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; 
											<select name="gender" class="span4">
											<option>Male</option>
											<option>Female</option></td>
											</select>
									</tr>
									
									<tr>
										<td>Name of Student: &nbsp; &nbsp;  &nbsp; <input type="text" name="studName" class="span4"/>
										</td> 									
									</tr>
									
									<tr>
										<td> Course: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
										<select name="course" class="span4">
											<option>Accountancy</option>
											<option>Communication</option>
											<option>Computer Engineering</option>
											<option>Computer Science</option>
											<option>Education</option>
											<option>Electrical Engineering</option>
											<option>Electronics and Communications Engineering</option>
											<option>Hotel and Restaurant Management</option>
											<option>Human Resource Development Management</option>
											<option>Industrial Engineering</option>
											<option>Information Technology</option>
											<option>Management</option>
											<option>Marketing Management</option>
											<option>Mechanical Engineering</option>
											<option>Nursing</option>
											<option>Psychology</option>
											<option>Tourism Management</option>

										</select>
										</td>
									</tr>
									
									</table>
									
									
									
									<table>
									<tr>
										<td><label><h4> Request 1 </h4></label></td>
										<td><label><h4> Request 2 <h4></label></td>
									</tr>
									
									
									
									<tr>
										<td>Contact Person: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="contactPerson1" class="span5"/></td>
										<td>Contact Person: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="contactPerson2" class="span5"/></td>
									</tr>
									
									<tr>
										<td>Position: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="position1" class="span5"/></td>
										<td>Position: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="position2" class="span5"/></td>
									</tr>
									
									<tr>
										<td>Name of Company: &nbsp;&nbsp; <input type="text" name="companyName1" class="span5"/></td> 
										<td>Name of Company: &nbsp;&nbsp; <input type="text" name="companyName2" class="span5"/></td> 
									</tr>
									
									<tr>
										<td>Complete Address:  &nbsp; &nbsp;  <textarea name="companyAddress1" style="resize:none;" class="span6"></textarea></td>
										<td>Complete Address:  &nbsp; &nbsp;  <textarea name="companyAddress2" style="resize:none;"  class="span6"></textarea></td> 
									</tr>
									
									</table>
									
									<br />
									
									
									<center>
                                                                            <input type="submit" value="Submit" class=" btn btn-primary" />
									</center>
									</form>
							
									
                                                                        </p>
                                                                        </fieldset>';
                              }
                               if($getType == "profile")
                               {
                                   echo "<fieldset>
                                        <legend>Student Profile</legend>

                                        <table>
                                            <tr>
                                                <td class='span2'><strong>Name</strong></td>
                                                <td class='span4'>".$_SESSION['fname']." ".$_SESSION['lname']."</td>
                                                <td class='span2'><strong>Student ID</strong></td>
                                                <td class='span4'>".$_SESSION['stud_ID']."</td>
                                            </tr>
                                            <tr>

                                                <td class='span2'><strong>Course</strong></td>
                                                <td class='span4'>".$_SESSION['course']."</td>
                                                    <td class='span2'><strong>Address</strong></td>
                                                <td class='span4'>".$_SESSION['address']."</td>
                                            </tr>
                                            <tr>
                                                <td class='span2'><strong>Phone Number</strong></td>
                                                <td class='span4'>".$_SESSION['phone']."</td>
                                            </tr>
                                            <tr>
                                                <td class='span2'><strong>Email</strong></td>
                                                <td class='span4'>".$_SESSION['email']."</td>
                                            </tr>
                                        </table>
                                        <br/>
                                    </fieldset>";
                               }
                               
                               if($getType == "ojtforms")
                               {
                                   echo '<fieldset>
                                            <legend>OJT Forms</legend>
                                            <h5>School of Computer Studies And Technology</h5>
                                            <table class="span12">
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">Acceptance Form</td>
                                                    <td><a href="forms/_ojt/_it/ACCEPTANCE FORM 2012-2013.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">SCST MOA</td>
                                                    <td><a href="forms/_ojt/_it/SCST MOA.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">SCST training liability waiver</td>
                                                    <td><a href="forms/_ojt/_it/SCST MOA.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">TP SCST Information Technology</td>
                                                    <td><a href="forms/_ojt/_it/TP SCST Information Technology.doc">Download</a></td>
                                                </tr>
                                            </table>
                                            <br/>
                                            <h5>School of Computer Studies And Technology</h5>
                                            <table class="span12">
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">Acceptance Form</td>
                                                    <td><a href="forms/_ojt/_it/ACCEPTANCE FORM 2012-2013.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">SCST MOA</td>
                                                    <td><a href="forms/_ojt/_it/SCST MOA.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">SCST training liability waiver</td>
                                                    <td><a href="forms/_ojt/_it/SCST MOA.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">TP SCST Information Technology</td>
                                                    <td><a href="forms/_ojt/_it/TP SCST Information Technology.doc">Download</a></td>
                                                </tr>
                                            </table>
                                            <br/>
                                            
                                        </fieldset>';
                               }
                              
                              
                              
                              
                              }
                              else
                              {
                                  echo "<script type='text/javascript'>
                                  $(document).ready(function(){
                                      setInterval(function(){
                                          $.ajax({url:'modules/message.php',cache:false,success: function(data){
                                                    $('#msg').html(data)
                                            }});
                                      },2000);
                                  });
                              </script>
                              
                               <div id='msg'></div>
                                

                                ";
                                      
                                            
                                    
                              }
                              
                              ?>
                              
                              
                              
                             
                       </div>
                   </div>
               </div>
           </div>
           
           <!-- End of content -->
           
           <div class="container-fluid" style="background-color: black;">
               <div class="row-fluid">
                   <div class="span12" >
                       <center>
                         MS-Research: Student Research Program Management System  
                       </center>
                   </div>
               </div>
           </div>
	</body>

	

</html>