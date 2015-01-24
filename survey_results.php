<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php require_once('Connections/biomes.php'); ?>f
<?php
//delete survey entry using ID nuber in query string
if (isset ($_GET['delete'])) {
		if (isset($_GET['ID'])) {
			$ID = $_GET ['ID'];
			$strSQL = "DELETE FROM Survey WHERE SurveyID = " . $ID;
			echo $strSQL . "<BR>";
			mysql_query($strSQL, $biomes) or die(mysql_error());
			//header(sprintf("location: %s", "survey_results.php"));
		}
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
if (isset($_GET['sort']))
	$sort = $_GET['sort'];
else
	$sort="lastName";
mysql_select_db($database_biomes, $biomes);
$query_rs = "SELECT * FROM Survey ORDER BY " . $sort;
$rs = mysql_query($query_rs, $biomes) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>

			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Survey Results</title>
<script language="JavaScript" src="ahahLib.js" type="text/JavaScript"></script>
<script>
function deleteRecord(surveyid,firstname,lastname) {
	var response = confirm("Do you want to delete the record for " + firstname + " " + lastname + "?");
	if (response) {
		window.location.href = "survey_results.php?sort=<?php echo $sort;?>&delete=y&ID=" + surveyid;
	} else {
		return false;
	}
}
function showhideComments() {
	if (document.getElementById('showhide_comments').checked) {
		document.getElementById('comments').setAttribute('class','hide');
		var tds = document.getElementsByName('comments');
			for (var i=0; i<tds.length;i++)
				tds[i].setAttribute('class','hide');
	} else {
		document.getElementById('comments').setAttribute('class','show');
		var tds = document.getElementsByName('comments');
			for (var i=0; i<tds.length;i++)
				tds[i].setAttribute('class','show');
	}
}
function showhideAge() {
	if (document.getElementById('showhide_age').checked) {
		document.getElementById('age').setAttribute('class','hide');
		var tds = document.getElementsByName('age');
			for (var i=0; i<tds.length;i++)
				tds[i].setAttribute('class','hide');
	} else {
		document.getElementById('age').setAttribute('class','show');
		var tds = document.getElementsByName('age');
			for (var i=0; i<tds.length;i++)
				tds[i].setAttribute('class','show');
	}
}
function showhideBottomNavBar() {
	if (document.getElementById('showhide_BottomNavBar').checked) {
		document.getElementById('bottom_nav_bar').setAttribute('class','hide');
		var tds = document.getElementsByName('bottom_nav_bar');
			for (var i=0; i<tds.length;i++)
				tds[i].setAttribute('class','hide');
	} else {
		document.getElementById('bottom_nav_bar').setAttribute('class','show');
		var tds = document.getElementsByName('bottom_nav_bar');
			for (var i=0; i<tds.length;i++)
				tds[i].setAttribute('class','show');
	}
}
function changeBanner() {
	if (document.getElementById('change_banner').checked) {
		document.getElementById('banner')
	.innerHTML = "Survey Results-<i>Akkshay Khoslaa</i>"
	} else {
		document.getElementById('banner')
		.innerHTML = "Survey Results"
	}
}
function updateComments(newvalue, surveyid) { 
var randNum = parseInt(Math.random()*334456);
var url = 'update_comments.php?surveyid=' + surveyid + '&newvalue=' + newvalue + '&rand=' +randNum;
callAHAH(url, 'updateComments', 'Please wait. Updating comments', 'Error: updating comments...');
}
</script> 
<link href="main.css" rel="stylesheet" type="text/css" />
</head>


<body id="survey_results">
<h1 class="show" id="banner">Survey Results </h1>
<p>| <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> | <a href="survey_form.php">Survey Form </a>| <a href="survey_results.php" id="survey_resultsLink">Survey Results </a>| <a href="logins.php">Logins</a> | <a href="<?php echo $logoutAction ?>">Log out</a> |</p>
<table width="600" border="0" cellspacing="1" cellpadding="5">
  <tr>
    <th colspan="9"><label>
      <input type="checkbox" name="showhide_comments" id="showhide_comments" onClick="showhideComments();" />
      Hide Comments </label>
      <label><input type="checkbox" name="showhide_age" id="showhide_age" onClick="showhideAge();"/>
      Hide Age</label> 
      <label>
        <input type="checkbox" name="showhide_BottomNavBar" id="showhide_BottomNavBar" onClick="showhideBottomNavBar();"/>
      Hide Bottom Nav Bar</label> <label>
        <input type="checkbox" name="change_banner" id="change_banner" onClick="changeBanner();" />
        Change Page Banner</label>
      <br />
    </th>
    <th colspan="4" class="reditalic"><div id="updateComments"></div></th>
  </tr>
  <tr>
    <th><a href="?sort=surveyid">ID</a></th>
    <th><a href="?sort=firstname">First Name</a></th>
    <th><a href="survey_results.php?sort=lastname">Last Name</a></th>
    <th class="show" id="age"><a href="?sort=age">Age</a></th>
    <th><a href="?sort=gender">Gender</a></th>
    <th><a href="?sort=city">City</a></th>
    <th><a href="?sort=country">Country</a></th>
    <th><a href="?sort=emailaddress">Email Address</a></th>
    <th class="show" id="comments"><a href="?sort=comments">Comments</a></th>
    <th><a href="?sort=dateadded">Date Added</a></th>
    <th>&nbsp;</td>
    <th>&nbsp;</td>
  </tr>
  <?php
  	$i = 0;
  	do {
	  if ($i % 2 == 0) $even = "class='even'"; else $even = ""; 
	?>
    <tr <?php echo $even ; ?>>
      <td><?php echo $row_rs['SurveyID']; ?></td>
      <td><?php echo $row_rs['FirstName']; ?></td>
      <td><?php echo $row_rs['LastName']; ?></td>
      <td class="show" name="age"><?php echo $row_rs['Age']; ?></td>
      <td><?php echo $row_rs['Gender']; ?></td>
      <td><?php echo $row_rs['City']; ?></td>
      <td><?php echo $row_rs['Country']; ?></td>
      <td><?php echo $row_rs['EmailAddress']; ?></td>
      <td class="show" name="comments"><textarea name="txtComments" id="txtComments" cols="20" rows="1" onChange="updateComments(this.value, <?php echo $row_rs['SurveyID']; ?>);"><?php echo $row_rs['Comments'];?></textarea></td>
      <td><?php echo $row_rs['DateAdded']; ?></td>
      <td>&nbsp;</td>
      <td><a href="#" onclick="deleteRecord( <?php echo $row_rs['SurveyID']; ?>,'<?php echo $row_rs['FirstName']; ?>', '<?php echo $row_rs['LastName']; ?>')">Delete</a></td>
    </tr>
<?php 
	$i = $i + 1;
	} while ($row_rs = mysql_fetch_assoc($rs)); ?>
</table>
<p>&nbsp;</p>
<p class="show" id="bottom_nav_bar">| <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> | <a href="survey_form.php">Survey Form </a>| <a href="survey_results.php" id="survey_resultsLink2">Survey Results </a>|</p>
<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<div class="footer">&copy; International School of Kenya 2011, Akkshay Khoslaa</div>
<!-- #EndLibraryItem -->
<p>&nbsp;</p>
<p class="total"><?php echo "total rows: " . $totalRows_rs; ?></p> 
</body>
</html>
<?php
mysql_free_result($rs);
?>
