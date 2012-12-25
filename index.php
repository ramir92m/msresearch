<?php 

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Research And Development Department - Letran Calamba </title>
		<meta charset="utf-8" />
		
		<link rel="stylesheet" type="text/css" href="css/main.css" />
                <link rel="icon" href="img/favicon.png" />
	</head>
	
	<body>
 
                
<!--                <script type="text/javascript">
                    $(document).ready(function(){
                        
                        jQuery("#login-modal").hide();
                        jQuery("#register-modal").hide();
                        
                        jQuery("#reg").click(function(){
                           
                           jQuery("#register-modal").dialog({
                                modal: true,
                                resizable: false,
                                position: 'center',
                                show: 'blind',
                                hide: 'fade'
                           });
                        
                           
                           
                        });
                        
                        
                        
                        
                        jQuery("#login").click(function(){
 
                            $("[name='user']").val(null);
                            $("[name='pass']").val(null);
                            
                            jQuery("#login-modal").dialog({
                                
                                modal: true,
                                resizable: false,
                                position: 'center',
                                show: 'blind',
                                hide: 'fade'
                            });
                            
                        });
                        
                        
                            
                            
                    });
                    
                </script>
            Modal for navigation                                       
                <div id="login-modal" title="Student Login">
                    
                        <div id="login-form">
                            <form method="post" action="transaction.php?trans=login" id="form">
                            <fieldset>
                                Username: <input type="text" name="user" /><br/>
                                Password: <input type="password" name="pass" /><br/>
                            </fieldset>
                            
    
                            <center>
                                
                                <input type="submit" value="Submit" class="small button" />
                                
                            </center>
                            </form>    
                            
                        </div>
                </div>
 
 
                <div id="register-modal" title="Register Account">
                    
                        <div id="register-form">
                            <form method="post" action="transaction.php?trans=reg" id="reg-form">
                                
                                <div>
                                    <input type="text" name="stud_ID" placeholder="Student ID" />
                                    <input type="password" name="pass" placeholder="Password" />
                                    <div>
                                        <input type="text" name="fname" placeholder="First Name" />
                                        <input type="text" name="lname" placeholder="Surname" />
                                    </div>
                                    
                                    <div>
                                        Course:
                                        <select name="course">
                                            <option value="BSCS">Computer Science</option>
                                            <option value="BSIT">Information Technology</option>
                                            <option value="BSHRM">Hotel and Restaurant Management</option>
                                            <option value="BSTM">Tourism and Management</option>
                                            <option value="BSP">Bachelor of Science in Psychology</option>
                                            <option value="ABCOMM">Bachelor of Arts in Communication</option>
                                        </select>
                                    </div>
                                    <br />
                                    <input type="text" name="address" placeholder="Address" />
                                    <input type="text" name="email" placeholder="Email Address" />
                                    <input type="text" name="contact" placeholder="Contact Number" />
                                </div>
                            <center>
                                <br />
                                <input type="submit" value="Submit" name="regsubmit" class="small button" />
                            </center>
                            </form>    
                            
                        </div>
                </div>
           end of navigation modal                           -->
               
	</body>
</html>