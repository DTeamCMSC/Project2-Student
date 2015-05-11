<?php
        include_once 'init.php';
        include_once 'includes/overallheader.php';
        include 'includes/widgets/logout.php';
if(array_key_exists('studentID', $_SESSION))
    {
        $studentID = $_SESSION['studentID'];
?>
        <h2>Appointment Selection</h2>
        <br><br><br>
        <h1>You do not have an appointment</h1>
        <h1>Please select an appointment below</h1>
      

<?php
            include_once 'includes/selectWeek.php';
            
    
    
    
    
    
    
            include_once 'includes/overallfooter.php';
?>