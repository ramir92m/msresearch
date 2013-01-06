

<?php
session_start();
include("../class/Database.php");
$acctID = $_SESSION['acct_ID'];
$user = array();
$msg = array();
$db = new Database();
$i = 0;
$query = $db->selectData("sender_ID,msg,sname", "message","receiver_id = $acctID ");
//while($row = mysql_fetch_array($query))
//{
//    $msg[] = $row['sname'];
//    $user[$row['sname']] = $row['sender_ID'];
//}

//                                                $c = array_unique($user);                                                 
//                                                //$count = array_count_values($user);
//                                                print_r($c);
                                                    

//                                            echo '<div class="tabbable">  
//                                            <ul class="nav nav-tabs">
//                                                <li class="active"><a href="#tab1" data-toggle="tab">Message</a></li>
//                                                <li><a href="#tab2" data-toggle="tab">Compose New Message</a></li>
//                                            </ul>
//                                            <div class="tab-content">
//                                                
//                                                <div class="tab-pane active" id="tab1">
//                                                    <div class="msg-header">
//                                                        <div class="span2">
//                                                            <b>From</b>
//                                                        </div>
//                                                    <div class="span9">
//                                                        <b>Messages</b>
//                                                    </div>       
//                                                </div>';
                                                 
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
                                                   
                                                    
                                                
                                                
//                                                $c = array_unique($user); 
//                                                $count = array_count_values($user);
//                                                 foreach($c as $value)
//                                                 {
//                                                     echo "From ".$value." Message ".$count[$value]." " ;
//                                                 }
 
                                                    
                                                
                                                    
                                                    
                                               
                                  
                                  
                                  
                                                

?>
