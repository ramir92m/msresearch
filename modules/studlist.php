<?php 
include('class/Database.php');
 $db = new Database();
 


 


?>

<table>
    <tr>
        <td class="span2">
            <b>Student ID</b>
        </td>
        <td class="span3">
           <b>Full Name</b>
        </td>
        <td class="span2">
            <b>Course</b>
        </td>
    </tr>
    <?php 
        
        $query = $db->selectData('*', "stud_info");
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
    </tr>';
        }
        
        
    ?>