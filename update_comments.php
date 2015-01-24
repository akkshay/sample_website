<?php require_once('Connections/biomes.php'); ?>
<?php
	if (!isset($_SESSION)) {
	  session_start();
	}
	
	$newvalue = "";
	$surveyid = 0;
	
	
	if (isset($_GET['newvalue'])) 
		$newvalue = $_GET['newvalue'];
	else
		$newvalue = "";
		
	if (isset($_GET['surveyid'])) 
		$surveyid = $_GET['surveyid'];
	else
		$surveyid = 0;
		

		mysql_select_db($database_biomes, $biomes);
		
		$updateSQL = "UPDATE Survey SET Comments =  '$newvalue' WHERE SurveyID = " . $surveyid;
//echo $updateSQL . "<BR>";
		
		$Result1 = mysql_query($updateSQL, $biomes) or die(mysql_error());
	
		$msg = "Comment updated successfully.";
	
	
echo $msg;
?>
