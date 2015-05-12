<?php
include_once 'init.php';
include_once 'includes/overallheader.php';
include 'includes/widgets/logout.php';
if(array_key_exists('studentID', $_SESSION))
{
  $advisorID = $_SESSION['studentID'];
?>
<h2>Search Available Appointments</h2>
<form id="weekForm" action="searchAppts.php" method="post">
<?php include 'includes/selectWeek.php'; ?>
</form>
<script language="JavaScript">
function toggle(source, name) {
  checkboxes = document.getElementsByName(name);
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<?php
  if(count($_POST) > 1){
      
      //form to select day(s) of week
    echo "<form action=\"selectAppt.php\" method=\"post\">";
    echo "<br><div id=\"selectTitle\">Select days:</div>";
    $week = $CALENDAR->weeks[(int)$_POST['week']];
    echo "<div id=\"selectGroup\"><table id=\"transparentTable\">";
    for($i = 0; $i < 5; $i++){
      $date = $week->dates[$i];
      echo "<tr><td><input type=\"checkbox\" name=\"date[]\" value=\"".$date."\">";
      echo date_to_string($date)."</td>";
      echo "</tr>";
    }
      echo "<tr><td><input type=\"checkbox\" onClick=\"toggle(this, 'date[]')\"/>Select All</td></tr></table></div>";

//laaaaaaaaaaaaaaaaaa still editing
      //select advisors
      $advisorArr = advisor_array();
    echo "<br><div id=\"selectTitle\">Select days:</div>";
    echo "<div id=\"selectGroup\"><table id=\"transparentTable\">";
    for(  ){
      echo "<tr><td><input type=\"checkbox\" name=\"date[]\" value=\""."\">";
      echo "</td>";
      echo "</tr>";
    }
      echo "<tr><td><input type=\"checkbox\" onClick=\"toggle(this, 'date[]')\"/>Select All</td></tr></table></div>";
      
      //submit
    echo "<div id=\"submit\"><input type=\"submit\" name=\"selectDay\">";
    echo "</div></form>";
  }
}
else {
    echo "<div id=\"error\"><img src=\"includes/error.png\" id=\"errorImg\">";
    echo "You are not logged in.</div>";
}

include_once 'includes/overallfooter.php';
?>