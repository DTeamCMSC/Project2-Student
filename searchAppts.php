<?php
include_once 'init.php';
include_once 'includes/overallheader.php';
include 'includes/widgets/logout.php';
if(array_key_exists('studentID', $_SESSION))
{
  $advisorID = $_SESSION['studentID'];
?>
<h2>Available appointment</h2>
<form id="weekForm" action="index.php" method="post">
<?php include 'includes/selectWeek.php'; ?>
</form>
}
<?php
include_once 'includes/overallfooter.php';
?>