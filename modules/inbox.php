

<?php
session_start();
include("../class/Database.php");
$acctID = $_SESSION['acct_ID'];
$user = array();
$msg = array();
$db = new Database();
$i = 0;
$query = $db->selectData("sender_ID,msg,sname", "message","receiver_id = $acctID ");

                                                 
                                                while($row = mysql_fetch_array($query))
                                                {
                                                    $user[$row['sname']] = $row['msg'];
                                                    
                                                }
                                                
                                                foreach($user as $column =>$value)
                                                {
                                                    
                                                
                                                
                                                    echo' <a href="#">
                                                        <div class="msg-content">
                                                            <div class="span2" style="display: box;">
                                                                <span>'.$column.'</span>
                                                            </div>
                                                            <div class="span9">
                                                                <b><p>'.$value.'</p></b>
                                                            </div>
                                                        </div>
                                                    </a>';
                                                  }  
                                                   
                                                    
                                                
                                                

                                                    
                                                
                                                    
                                                    
                                               
                                  
                                  
                                  
                                                

?>
