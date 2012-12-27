<?php

session_start();
if(!isset($_SESSION['acct_ID']))
{
    header("Location: index.php");
}


    
?>

<!DOCTYPE html>

<html>
	<head>
		<title> MS-Research: Managament System for SRP Program </title>
		<link rel="icon" href="img/favicon.png" />
                
                <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="css/profile.css" />
	</head>
            
        <body>
  
            <script src="js/jquery-1.8.3.js"></script>
           <script src="js/bootstrap.min.js"></script>
           
           <div class="navbar navbar-inverse navbar-fixed-top" id="header">
               <div class="navbar-inner">
                   <div class="container">
                       
                       <a class="brand" href="admin.php"><img src="img/title3.png" /></a>
                       <div class="nav-collapse ">
                           <ul class="nav pull-right">
                               <li>
                                   <form class="navbar-search" action="#" method="post">
                                          <br/>
                                          <input type="text" placeholder="Search Student" />
<!--                                          <select class="span1">
                                              <option>BSIT</option>
                                              <option>BSCS</option>
                                          </select>-->
                                          
                                       
                                   </form>
                               </li>
                               <li class="dropdown">
                                   <br/>
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                       <span><i class="icon-user"></i><?php echo $_SESSION['empFname']." ".$_SESSION['empLname']; ?> <span class="caret"></span> </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                       <li><a href="admin.php?type=profile"><i class="icon-headphones"></i>&nbsp;Profile</a></li>
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
                               
                               
                               <b><?php echo $_SESSION['occupation'] ?> Menu</b>
                               
                               <div>
                                   <ul class="nav nav-pills nav-stacked">
                                       <li><a href="admin.php"><i class="icon-home"></i> Home</a></li>
                                       
                                       <li><a href="admin.php?type=message"><i class="icon-file"></i> Message</a></li>
                                       <li><a href="admin.php?type=status"><i class="icon-wrench"></i> Student Status</a></li>
                                       <li><a href="#"><i class="icon-wrench"></i> OJT Forms</a></li>
                                       <li><a href="#"><i class="icon-edit"></i> OJT Host Evaluation</a></li>
                                       <li><a href="#"><i class="icon-file"></i> Recomendation Letter</a></li>
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
                                      if($_GET['type'] == "message")
                                      {
                                          echo '<li><a href="main.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="main.php?type=evalform">Message</a> <span class="divider">/</span></li>';
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
                              
                             
                              
                              if($getType == 'message')
                              {
                                  
                                  echo '<fieldset>
                                        <legend>Message</legend>';
                                  
                                  echo "<script type='text/javascript'>
                                  $(document).ready(function(){
                                      setInterval(function(){
                                          $.ajax({url:'modules/message.php?type=message',cache:false,success: function(data){
                                                    $('#msg').html(data)
                                            }});
                                      },1000);
                                  });
                              </script>
                              
                               <div id='msg'></div>
                                

                                ";
                                  echo'
                                      
                                     <form action="modules/sendmsg.php" method="post">       
                                    <div id="msgbody" class="span12"></div>
                                    <hr/>
                                    <input type="text" class="span3" placeholder="Employee Name" />&nbsp;<select class="span2">
                                        <option>Announce</option>
                                        <option>Message</option>
                                    </select><br/>
                                    <textarea name="msg" placeholder="Search Message" class="span5" style="resize: none;"></textarea><br/>
                                    <input type="submit" id="sendmsg" class="btn btn-primary" />
                                    </fieldset>
                                    </form>
                                    ';
                                    
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
                                <legend>".$_SESSION['occupation']." Profile</legend>

                                <table>
                                    <tr>
                                        <td class='span2'><strong>Name</strong></td>
                                        <td class='span4'>".$_SESSION['empFname']." ".$_SESSION['empLname']."</td>
                                        <td class='span2'><strong>Employee ID</strong></td>
                                        <td class='span4'>".$_SESSION['acct_ID']."</td>
                                    </tr>
                                    <tr>
                                        <td class='span2'><strong>Occupation</strong></td>
                                        <td class='span4'>".$_SESSION['occupation']."</td>
                                        <td class='span2'><strong>Course Handle</strong></td>
                                        <td class='span4'>".$_SESSION['coursehandle']."</td>
                                    </tr>

                                </table>
                                <br/>
                            </fieldset>";
                               }
                               
                               if($getType == "ojtforms")
                               {
                                   echo '<fieldset>
                                            <legend>OJT Forms</legend>
                                            <h5>Information Technology</h5>
                                            <table class="span12">
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">Acceptance Form</td>
                                                    <td><a href="/forms/_ojt/_it/ACCEPTANCE FORM 2012-2013.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">SCST MOA</td>
                                                    <td><a href="/forms/_ojt/_it/SCST MOA.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">SCST training liability waiver</td>
                                                    <td><a href="/forms/_ojt/_it/SCST MOA.doc">Download</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="span4">TP SCST Information Technology</td>
                                                    <td><a href="/forms/_ojt/_it/TP SCST Information Technology.doc">Download</a></td>
                                                </tr>
                                            </table>
                                        </fieldset>';
                               }
                               
                              
                              
                              
                              
                              }
                              else
                              {
                                  echo "<script type='text/javascript'>
                                  $(document).ready(function(){
                                      setInterval(function(){
                                          $.ajax({url:'modules/message.php?type=announce',cache:false,success: function(data){
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