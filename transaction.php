

<?php
session_start();

include 'class/Database.php';
include 'class/Account.php';
$type = $_GET['trans'];
$acct = new Database();
$stud = new Account();


//Registration Form
if($type == 'reg')
{
    $postdata = array(
                'stud_ID' => $_POST['stud_ID'],
                'password' =>  crypt($_POST['pass'], CRYPT_MD5),
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'course'=> $_POST['course'],
                'address' => $_POST['address'],
                'phone' => $_POST['contact'],
                'email' => $_POST['email'],
                'occupation' => $_POST['occupation']
                
    );
    
    $acct->insertData($postdata, 'stud_info');
}
//Login Form
elseif($type == 'login')
{
    $id = $_POST['stud_ID'];
    $pass = $_POST['password'];
    $occupation = $_POST['occupation'];
    
    if($occupation == 'Student')
    {
        if($id != '')
        {
            $result = $acct->selectData('*', 'stud_info',"stud_ID = $id " );
        }
        else
        {
             header("Location: login.php?error=err01");
        }
        
        
        if($result)
        {
       
        $stud->fetchData($result);
        
            if($stud->data['occupation'] == $occupation)
            {
                if($stud->data['stud_ID'] == $id && $stud->data['password'] == $pass)
                {
                header("Location: main.php");
                }
                else
                {
                header("Location: login.php?error=err03");
                }
            
            }
            else
            {
                header("Location: login.php?error=err02");
            }
        
        }
        else {
            header("Location: login.php?error=err01");
            
        }
        
    }
    elseif($occupation == 'Moderator' || $occupation == 'R&DD Personnel')
    {
        
        if($id != '')
        {
            $result = $acct->selectData('*', 'admin_info',"acct_ID = $id " );
        }
        else
        {
             header("Location: login.php?error=err01");
        }
        
        
        if($result)
        {
       
        $stud->fetchData($result);
        
            if($stud->data['occupation'] == $occupation)
            {
                if($stud->data['acct_ID'] == $id && $stud->data['password'] == $pass)
                {
                    header("Location: admin.php");
                }
                else
                {
                    header("Location: login.php?error=err03");
                }
            
            }
            else
            {
                header("Location: login.php?error=err02");
            }
        
        }
        else {
            header("Location: login.php?error=err01");
            
        }
    }
    else
    {
        header("Location: login.php?error=err04");
    }
    
    
//    $stud->fetchData($result);
//    
//    if($stud->data['stud_ID'] == $id && $stud->data['password'] == $pass)
//    {
////        header("Location: main.php");
//        echo $stud->data['occupation'];
//    }
//    else
//    {
//        
//    }
    
}
elseif($type == 'logout')
{
    session_destroy();
    header("Location: index.php");
}

elseif($type == 'monitorgrade')
{
    $strat = $_POST['monitorgrd'];
    $id = $_POST['stud_ID'];
    mysql_connect('localhost','root','');
    mysql_select_db('msresearch');
    $row = mysql_query("SELECT * FROM ojt_status WHERE stud_ID = $id LIMIT 1");
    $num = mysql_num_rows($row);
    if($num == 0)
    {
        mysql_query("INSERT INTO ojt_status(stud_ID,monitoringGrade) VALUES('$id','$strat')");
    }
    else
    {
        mysql_query("UPDATE ojt_status SET monitoringGrade = '$strat' WHERE stud_ID = $id");
    }
    
    mysql_close();
    header("http://localhost/msresearch/admin.php?type=ojtgrade&id=$id");
    
}

elseif($type == 'ojtstatus')
{
    
    $studID = $_GET['id'];
    $course = $_GET['course'];
    $performanceEval = $_POST['performanceEval'];
    $nominationform = $_POST['ojtnomination'];
    $certificate = $_POST['certificate'];
    $dtr = $_POST['dtr'];
    $narrative = $_POST['narrative'];
    $ojteval = $_POST['ojteval'];
    $companyprof = $_POST['comprofile'];
    $journal = $_POST['journal'];
    
    
    if(isset($_POST['casestudy']))
    {
        $caseStudy = $_POST['casestudy'];
    }
    
    
    
    $acct->connect();
    $row = mysql_query("SELECT stud_ID FROM ojt_req WHERE stud_ID = $studID LIMIT 1 ");
    $num = mysql_num_rows($row);
    
    if($num > 0)
    {
        
        if($course == 'BSPsy')
        {
            mysql_query("UPDATE ojt_req SET performanceEval = '$performanceEval' , nominationForm = '$nominationform',dtrForm = '$dtr',journalForm = '$journal',ojtEvalForm = '$ojteval',caseStudy = '$caseStudy',companyProfile = '$companyprof',certificate = '$certificate' WHERE stud_ID = $studID ");
        }
        else
        {
             mysql_query("UPDATE ojt_req SET performanceEval = '$performanceEval' , nominationForm = '$nominationform',dtrForm = '$dtr',journalForm = '$journal',ojtEvalForm = '$ojteval',companyProfile = '$companyprof',certificate = '$certificate' WHERE stud_ID = $studID ");
        
        }
        
    }
    else
    {
        if($course == 'BSPsy')
        {
            mysql_query("INSERT INTO ojt_req(stud_ID,performanceEval,nominationForm,dtrForm,journalForm,ojtEvalForm,caseStudy,companyProfile,certificate) VALUES('$studID','$performanceEval','$nominationform','$dtr','$journal','$ojteval','$caseStudy','$companyprof','$certificate')");
        }
        else
        {
            mysql_query("INSERT INTO ojt_req(stud_ID,performanceEval,nominationForm,dtrForm,journalForm,ojtEvalForm,ojtEvalForm,companyProfile,certificate) VALUES('$studID','$performanceEval','$nominationform','$dtr','$journal','$ojteval','$companyprof','$certificate')");
        }
    }
    
    mysql_close();
   
    
    
    
}












?>


