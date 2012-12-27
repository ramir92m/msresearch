<!DOCTYPE HTML>

<html>
    <head>
        <title>Research And Development Department - Letran Calamba</title>
        <link rel="icon" href="img/favicon.png" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link href="css/bootstrap-responsive.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    
    <body>
        
        <div id="login">
            
            <div class="header">
            <div class="container-fluid">
                
                <div class="row-fluid">
                            <div class="span12">
                                <a href="index.php"><img src="img/title3.png" /></a>
                            </div>
                </div>  
            </div>
            </div>
            
        <div class="form">
            
        <div class="container">
            <div class="span5 offset3">
                <legend>Login</legend>
        <form class="form-horizontal" action="transaction.php?trans=login" method="POST">
            
            <div class="control-group">
                <label class="control-label">Student ID</label>
                <div class="controls">
                    <input type="text" name="stud_ID" placeholder="Student ID" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="Password" />
                </div>
            </div>
           
                
                <div class="offset1">
                    <input type="submit" class="span1 btn" value="Login"/>
                    <select class="span2" name="occupation">
                    <option selected="selected">Login As</option>
                    <option>Student</option>
                    <option>Moderator</option>
                    <option>R&DD Administrator</option>
                    </select>
               </div>
                
                <?php 
                
                    if(isset($_GET['error']))
                    {
                        $err = $_GET['error'];
                        echo "<div><center>";
                        switch($err)
                        {
                            case 'err01': echo "<p>Invalid Username<p>";break;
                            case 'err02': echo "<p>Unknown Account<p>";break;
                            case 'err03': echo "<p>Wrong Password<p>";break;
                            case 'err04': echo "<p>Choose User Type To Login<p>";break;
                        }
                        echo "</center></div>";
                        
                    }
                
                
                ?>
            
            
                 
                    
                
                
            
            
        </form>
               
        </div>        
        </div>
        </div>
        
            
            
        </div>
        
        
        
        
        
        
        <script src="js/jquery-1.8.3.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>