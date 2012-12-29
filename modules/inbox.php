

<?php
session_start();
include("../class/Database.php");

$db = new Database();


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
                                                
                                                    
                                                
                                                    echo' <a href="#">
                                                        <div class="msg-content">
                                                            <div class="span2" style="display: box;">
                                                                <span>Shit</span>
                                                            </div>
                                                            <div class="span9">
                                                                <b><p>5 Message</p></b>
                                                            </div>
                                                        </div>
                                                    </a>';
                                                    $i++;
                                               
                                  
                                  
                                  
                                                echo '
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <fieldset>
                                                    <legend>Inbox</legend>

                                                    <div id="msgbody" class="span12" placeholder="Employee ID"></div>
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

?>
