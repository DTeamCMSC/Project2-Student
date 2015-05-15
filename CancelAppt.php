<?php
include_once 'init.php';
include_once 'includes/overallheader.php';
if(array_key_exists('studentID', $_SESSION))
{
  $studentID = $_SESSION['studentID'];
?>
<h2>Are you sure you would like to drop your Appointment</h2>
<?php
include_once'accept.php';
$answer = $_POST['cancel'];
    
    if ($answer == Yes)
    {
    $sql = "SELECT * FROM Students WHERE studentID = '".$_SESSION['studentID']."'";
    $result = $COMMON->executeQuery($sql, $_SERVER["cancelAppt.php"]);
    $student = mysql_fetch_row($result);
            if($student[6] == NULL)
        {
                echo"   <a href = 'index.php'>You do not have an appointment</a>";
        }
            else 
                {
        //display current appointment info
            if ($student[8] == "Individual")
                    {
                $time = $student[6];
                $advID = $student[7];
                $date = $student[5];
                $type = $student[8];
                
                
                $sql = "UPDATE Individual_Schedule SET `$time` = 'Open' WHERE `advisorID`='$advID' AND `date`='$date'";
                $record = $COMMON->executeQuery($sql, $_SERVER["cancelAppt.php"]);
                
                $sql2 = "UPDATE Students SET `date`=NULL, `time`=NULL, `adType`=NULL, `advisor`=NULL";
                $sql2 .= " WHERE `studentID`='$studentID'";
                $record2 = $COMMON->executeQuery($sql2, $_SERVER["cancelAppt.php"]);
                    }
                        else if ($student[8] == "Group")
                    {
                $time = $student[6];
                $advID = $student[7];
                $date = $student[5];
                $type = $student[8];
                                
                //$sql = "UPDATE Group_Schedule SET `$time` = '$studentID' WHERE `advisorID`='$advID' AND `date`='$date'";
                //$record = $COMMON->executeQuery($sql, $_SERVER["cancelAppt.php"]);
                
                //$sql2 = "UPDATE Students SET `date`='$date', `time`='$time', `adType`='$type', `advisor`='$advID'";
                //$sql2 .= " WHERE `studentID`='$studentID'";
                //$record2 = $COMMON->executeQuery($sql2, $_SERVER["cancelAppt.php"]);
                    }
                if($record == false || $record2 == false)
                {
                    echo "<div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
                    echo "Error adding indvidual appointment</div>";
                }
                else {
                    echo "<div id=\"error\">";
                    echo "Appointment was successfully dropped</div>";
                     }
                
            }
 //   header ('location: index.php');
                }
            
                else if ($answer == No)
            {
                header ('location: index.php');
            }
}
                else 
        {
                echo "<br><div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
                echo "You are not logged in.</div>";
        }
include_once 'includes/overallfooter.php';
?>
