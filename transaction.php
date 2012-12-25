

<?php
session_start();

include 'class/Database.php';
include 'class/Account.php';
$type = $_GET['trans'];
$acct = new Database();
$stud = new Account();

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
    elseif($occupation == 'Moderator')
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
        echo "can you login with a \'login as\' option? fucktard";
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












?>


