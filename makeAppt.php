<?php
    include_once 'init.php';
    include_once 'includes/overallheader.php';

if(array_key_exists('studentID', $_SESSION)) 
{
    $studentID = $_SESSION['studentID'];
    
    if(count($_POST) > 1)
    {
        if(array_key_exists('advisorID', $_POST) &&
            array_key_exists('date', $_POST) &&
            array_key_exists('time', $_POST) &&
            array_key_exists('type', $_POST) )
        {
            
            $advID = $_POST['advisorID'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $type = $_POST['type'];
            $time = db_time($time);
       
            if($type = "indiv") 
            {
                 $sql = "UPDATE Individual_Schedule SET `$time` = '$studentID' WHERE `advisorID`='Individual' AND `date`='$date'";
                 $record = $COMMON->executeQuery($sql, $_SERVER["makeAppt.php"]);
                
                $sql2 = "UPDATE Students SET `date`='$date', `time`='$time', `adType`='Individual', `advisor`='$advID'";
                $sql2 .= " WHERE `studentID`='$studentID'";
                $record2 = $COMMON->executeQuery($sql2, $_SERVER["makeAppt.php"]);
            
                if($record == false || $record2 == false)
                {
                    echo "<div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
                    echo "Error adding indvidual appointment</div>";
                }
                else {
                    echo "<div id=\"error\">";
                    echo "Appointment successfully added</div>";
                }
                
            }
            
            if($type = "group") 
            {
        /*        for ($i = 1; $i <= 10; $i++)
                { 
                $sqlG = "SELECT * FROM Group_Schedule WHERE `$time`='$time' AND `date`='$date'";
                $result = $COMMON->executeQuery($sql, $_SERVER["makeAppt.php"]);
                $student = mysql_fetch_row($result);
                    if ($student[$i] == null)
                    {
                $sql = "UPDATE Group_Schedule SET `students'.$i.'` = '$studentID' WHERE `$time`='$time' AND `date`='$date'";
                $record = $COMMON->executeQuery($sql, $_SERVER["makeAppt.php"]);
                
                $sql2 = "UPDATE Students SET `date`='$date', `time`='$time', `adType`='$type', `advisor`='$advID'";
                $sql2 .= " WHERE `studentID`='$studentID'";
                $record2 = $COMMON->executeQuery($sql2, $_SERVER["makeAppt.php"]);
                    } 
                }*/
            
                if($record == false || $record2 == false)
                {
                    echo "<div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
                    echo "Error adding indvidual appointment</div>";
                }
                else 
                {
                    echo "<div id=\"error\">";
                    echo "Appointment successfully added</div>";
                }
                
                
                
                
                
            }
            
        }
        
        
        
    }
    
}
else {
    echo "<br><div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
    echo "You are not logged in.</div>";
}

include_once 'includes/overallfooter.php';
?>