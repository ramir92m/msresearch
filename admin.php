<?php
include('class/Database.php');
session_start();
if(!isset($_SESSION['acct_ID']))
{
    header("Location: index.php");
}
$db = new Database();


    
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
           
           <!-- All Client-Side transaction will be all here -->
           
           <script type="text/javascript">
               $(document).ready(function(){
                   $('[type="text"]').val(null);
                   
                   
                   
                   //quiz function
                   $('#quiz1,#quiz2,#quiz3,#quiz4,#quiz5,#quiz6,#quiz7').keyup(function(){
                       
                       var quiz = "quiz";
                       var gradeQuiz = 0;
                       var total = 0;
                       
                       for(var i=1; i<=7;i++)
                           {
                                   if($('#'+quiz+i+'').val() == '')
                                   {
                                       continue;
                                   }
                                   else
                                       {
                                           gradeQuiz += parseInt($('#'+quiz+i+'').val());
                                           total++;
                                       }
                           }
                           
                           $('#avequiz').html(gradeQuiz/total);
                       
                       
                   });
                   
               $('#companyVisit, #classAtt').keyup(function(){
                   var company = parseInt($('#companyVisit').val());
                   var classAtt = parseInt($('#classAtt').val());
                   
                   if(company == '0' || company == null || company == '' )
                       {
                           company = parseInt($('#companyVisit').val('0'));
                       }
                   if(classAtt == '0' || classAtt == null || classAtt == '')
                   {
                       classAtt = parseInt($('#classAtt').val('0'));
                   }
                   
                    $('#monitorgrd').val((company+classAtt)/2);
                   
               });
               
               
                   
                   
                   
               });
           </script>
           
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
                                   <ul class="nav nav-pills nav-stacked" style="height: 20%;">
                                       <li><a href="admin.php"><i class="icon-home"></i> Home</a></li>
                                       
                                       <li><a href="admin.php?type=message"><i class="icon-file"></i> Message</a></li>
                                       <li><a href="admin.php?type=studentlist"><i class="icon-wrench"></i> Student List</a></li>
<!--                                       <li><a href="#"><i class="icon-wrench"></i>Search By Place</a></li>
                                       <li><a href="#"><i class="icon-edit"></i>Search Grade</a></li>
                                       <li><a href="#"><i class="icon-file"></i> Recomendation Letter</a></li>
                                       <li><a href="#"><i class="icon-calendar"></i> Schedule of Activities</a></li>-->
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
                                          echo '<li><a href="admin.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="admin.php?type=message">Message</a> <span class="divider">/</span></li>';
                                      }
                                      elseif($_GET['type'] == "studentlist")
                                      {
                                          echo '<li><a href="admin.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="admin.php?type=studentlist">Official Student List</a> <span class="divider">/</span></li>';
                                      }
                                      elseif($_GET['type'] == "profile")
                                      {
                                          echo '<li><a href="admin.php">Home</a> <span class="divider">/</span></li>';
                                          echo '<li><a href="admin.php?type=profile">Profile</a> <span class="divider">/</span></li>';
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
                                 echo '<div class="tabbable">  
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab1" data-toggle="tab">Message</a></li>
                                                <li><a href="#tab2" data-toggle="tab">Compose New Message</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                
                                                <div class="tab-pane active" id="tab1">
                                                    <div class="msg-header">
                                                        <div class="span2">
                                                            <b>From</b>
                                                        </div>
                                                    <div class="span9">
                                                        <b>Messages</b>
                                                    </div>       
                                                </div>';
                                                
                                  echo "<script type='text/javascript'>
                                  $(document).ready(function(){
                                      setInterval(function(){
                                          $.ajax({url:'modules/inbox.php',cache:false,success: function(data){
                                                    $('#msg').html(data)
                                            }});
                                      },2000);
                                  });
                              </script>
                              
                               <div id='msg'></div>
                                

                                ";
                                  
                                  echo '
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <fieldset>
                                                    <legend>Inbox</legend>

                                                    <div id="msgbody" placeholder="Employee ID"></div>
                                                    <hr/>
                                                    <input type="text" class="span5" /><br/>
                                                    <textarea placeholder="Search Message" class="span5" style="resize: none;"></textarea><br/>
                                                    <button type="button" class="btn btn-primary">Send</button>
                                                    <select>
                                                        <option>Announcement</option>
                                                        <option>Message</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                </div>';
                                    
                              }
                              if($getType == 'studentlist')
                              {
                                echo' 
                                    <fieldset>
                                    <legend>Official List</legend>
                                    <table>
                                    <tr>
                                        <td class="span3">
                                            <b>Student ID</b>
                                            <br/>
                                        </td>
                                        <td class="span3">
                                           <b>Full Name</b>
                                           <br/>
                                        </td>
                                        <td class="span2">
                                            <b>Course</b>
                                            <br/>
                                        </td>
                                    </tr>';

                                        $occupation = $_SESSION['occupation'];
                                        if($occupation == 'Moderator')
                                        {
                                            $query = $db->selectData("*", 'stud_info', "course = '".$_SESSION['coursehandle']."'");
                                        }
                                        
                                        if($occupation == 'R&DD Personnel')
                                        {
                                            $query = $db->selectData("*", 'stud_info ORDER BY course ASC');
                                       
                                        }
                                        
                                        
                                        while($row = mysql_fetch_array($query))
                                        {
                                            echo '<tr>
                                        <td>
                                            <iclass="span1">'.$row['stud_ID'].'</i>
                                        </td>
                                        <td >
                                            <iclass="span1">'.$row['fname'].' '.$row['lname'].'</i>
                                        </td>
                                        <td >
                                            <iclass="span1">'.$row['course'].'</i>
                                        </td>
                                        <td >
                                            <a href="admin.php?type=studview&id='.$row['stud_ID'].'"><span>View Profile</span></a>&nbsp;&nbsp;&nbsp;&nbsp;                                            
                                            <a href="admin.php?type=ojtgrade&id='.$row['stud_ID'].'"><span>Compute Grade</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                               '; 
                                            
                                            if($occupation == 'R&DD Personnel')
                                            {
                                                echo '<a href="admin.php?type=editstatus&id='.$row['stud_ID'].'"><span>Edit Status</span></a>&nbsp;&nbsp;&nbsp;&nbsp;';
                                            }
                                            
                                            echo '
                                        </td>
                                    </tr>';
                                        }
                                        
                                        echo '</table></fieldset>';
        
        
    
                              }
                              
                              if($getType == "editstatus")
                              {
                                    $occupation = $_SESSION['occupation'];
                                    $studID = $_GET['id'];
                                    $studcourse;
                                    $query = $db->selectData("course", 'stud_info', "stud_ID = $studID ");
                                    
                                    if($occupation == 'Moderator')
                                    {
                                        while($row = mysql_fetch_assoc($query))
                                        {
                                          $studcourse =  $row['course'];
                                        }
                                      
                                      if($studcourse == 'BSIT')
                                      {
                                          echo "
                                              <fieldset>
                                                <legend>OJT Status - Moderator</legend>
                                                <b>Student ID:  </b><span>$studID</span>
                                                    
                                                    
                                                    <hr/>
                                                    <h5>OJT Requirements</h5>
                                                    <form action='#' method='POST'>
                                                         <div class='row-fluid'>
                                                            <div class='span9'>
                                                                <b>Attendance Sheet</b>
                                                            </div>
                                                         </div>
                                                    </form>
                                              </fieldset>
                                              ";
                                      }
                                      
                                      
                                    }
                              }
                              
                              
                              
                              if($getType == "ojtgrade")
                              {
                                $occupation = $_SESSION['occupation'];
                                $studID = $_GET['id'];
                                $studcourse;
                                $query = $db->selectData("course", 'stud_info', "stud_ID = $studID ");
                              
                                  if($occupation == 'Moderator')
                                  {
                                      while($row = mysql_fetch_assoc($query))
                                      {
                                          $studcourse =  $row['course'];
                                      }
                                      
                                      if($studcourse == "BSIT")
                                      {
                                          echo "
                                              <fieldset>
                                                <legend>OJT Grade - Moderator</legend>
                                                <b>Student ID:  </b><span>$studID</span>
                                                    
                                                    
                                                    <hr/>
                                                    <h5>Company Monitoring Grade</h5>
                                                    <form action='transaction.php?trans=monitorgrade' method='POST'>
                                                    
                                                        <div class='row-fluid'>

                                                            <div class='span4 '>
                                                                Phone Checking & Company Visit
                                                            </div>
                                                            <div class='span5'>
                                                                <input type='text' id='companyVisit' class='span2' />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class='row-fluid'>

                                                            
                                                            <div class='span4'>
                                                                Regular Class Attendance & Promptness
                                                            </div>
                                                            <div class='span5'>
                                                                <input type='text' id='classAtt' class='span2' />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class='row-fluid'>
                                                            <div class='span4'>
                                                                <b>Grade</b>
                                                            </div>
                                                            <div class='span3'>
                                                                <input type='text' id='monitorgrd' name='monitorgrd' class='span3' />
                                                                <input type='hidden' value='$studID' name='stud_ID' />
                                                            </div>
                                                        </div>
                                                    
                                                    <br/>
                                                    <div class='row-fluid'>
                                                        <div class='span5 offset5'>
                                                            <input type='submit' value='Submit Grade' id='submitgrade' class='btn btn-primary' />
                                                        </div>
                                                    </div>
                                                    </form>
                                              </fieldset>
                                              
                                               
                                              
                                              ";
                                      }
                                      
                                  }
                                  
                                  
                                  
                                  
                                  
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
                               
                               if($getType == "studview")
                               {
                                   
                                   $query = $db->selectData('*', 'stud_info',"stud_ID ='".$_GET['id']."'");
                                   while ($row = mysql_fetch_array($query))
                                   {
                                       echo "<fieldset>
                                        <legend>Student Profile</legend>

                                        <table>
                                            <tr>
                                                <td class='span2'><strong>Name</strong></td>
                                                <td class='span4'>".$row['fname']." ".$row['lname']."</td>
                                                <td class='span2'><strong>Student ID</strong></td>
                                                <td class='span4'>".$row['stud_ID']."</td>
                                            </tr>
                                            <tr>

                                                <td class='span2'><strong>Course</strong></td>
                                                <td class='span4'>".$row['course']."</td>
                                                    <td class='span2'><strong>Address</strong></td>
                                                <td class='span4'>".$row['address']."</td>
                                            </tr>
                                            <tr>
                                                <td class='span2'><strong>Phone Number</strong></td>
                                                <td class='span4'>".$row['phone']."</td>
                                            </tr>
                                            <tr>
                                                <td class='span2'><strong>Email</strong></td>
                                                <td class='span4'>".$row['email']."</td>
                                            </tr>
                                        </table>
                                        <br/>
                                    </fieldset>";
                                   }
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
                                <div style='height:100px;'></div>

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