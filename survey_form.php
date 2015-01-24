<?php require_once('Connections/biomes.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frmSurvey")) {
  $insertSQL = sprintf("INSERT INTO Survey (FirstName, LastName, Age, Gender, City, Country, EmailAddress, Comments) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtFirstName'], "text"),
                       GetSQLValueString($_POST['txtLastName'], "text"),
                       GetSQLValueString($_POST['txtAge'], "int"),
                       GetSQLValueString($_POST['optGender'], "text"),
                       GetSQLValueString($_POST['txtCity'], "text"),
                       GetSQLValueString($_POST['lstCountry'], "text"),
                       GetSQLValueString($_POST['txtEmailAddress'], "text"),
                       GetSQLValueString($_POST['txtComment'], "text"));

  mysql_select_db($database_biomes, $biomes);
  $Result1 = mysql_query($insertSQL, $biomes) or die(mysql_error());

  $insertGoTo = "survey_form.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_biomes, $biomes);
$query_rs = "SELECT * FROM countries";
$rs = mysql_query($query_rs, $biomes) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Survey Form</title>
<script type="text/javascript">
function saveForm() {
	var msg = "";
	var lastname = document.getElementById('txtLastName').value;
	var firstname = document.getElementById('txtFirstName').value;
	var age = document.getElementById('txtAge').value;
	var country = document.getElementById('lstCountry').options[document.getElementById('lstCountry').selectedIndex].text;
	var emailaddress = document.getElementById('txtEmailAddress').value;
	var comment = document.getElementById('txtComment').value;
	if (lastname == "")
		msg = " - a last name<BR>";
		
	if (firstname == "")	
		msg = msg + " - a first name<BR>";
		
	if (age != "") 
		if (isNaN(parseInt(age)))
			msg = msg + "- your age in numbers<BR>";
		else if (age < 1 || age > 120)
			msg = msg + " - an age between 1 and 120<BR>";
		
	if (country == "Select:")
		msg = msg + " - your country<BR>";
		
	if (emailaddress != "") {
		var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i		
		if (!regex.test(emailaddress))
			msg = msg + " - a valid email address<BR>";	
	}
	if (comment.length > 250)
		msg = msg + " - Comment length is limited to 250 characters.<BR>";
	
	if (msg.length > 0) {
		msg = "Please enter:<BR>" + msg;
		document.getElementById('msg').innerHTML = "<font color='red'>" + msg + "</font>";	
		return false;
	} else {
		document.forms["frmSurvey"].submit();
	}
		
}

</script>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body id="survey_form">
<h1>Survey Form </h1>
<p>| <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> |  <a href="survey_form.php" id="survey_formLink">Survey Form </a>| <a href="survey_results.php">Survey Results </a>| <a href="logins.php">Logins</a> | <a href="<?php echo $logoutAction ?>">Log out</a> |</p>
<form action="<?php echo $editFormAction; ?>" id="frmSurvey" name="frmSurvey" method="POST">
  <table width="600" border="0" cellspacing="1" cellpadding="5">
    <tr>
      <td colspan="2">Please let me know what you think about my website by completing the following form.</td>
    </tr>
    <tr>
      <td width="140">Your First Name*</td>
      <td width="437" id="textfield"><label for="textfield"></label>
        <label for="txtFirstName"></label>
      <input name="txtFirstName" type="text" id="txtFirstName" size="30" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Your Last Name *</td>
      <td id="txtName2"><label for="txtLastName"></label>
      <input name="txtLastName" type="text" id="txtLastName" size="30" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Your Age</td>
      <td><label for="txtAge"></label>
      <input name="txtAge" type="text" id="txtAge" size="5" maxlength="5" value="" /></td>
    </tr>
    <tr>
      <td>Your Gender</td>
      <td><input type="radio" name="optGender" id="Female" value="Female" />
      <label for="Female">Female</label>        <label for="radio">
        <input type="radio" name="optGender" id="Male" value="Male" />
      Male</label></td>
    </tr>
    <tr>
      <td>Your City</td>
      <td><label for="txtCity"></label>
      <input name="txtCity" type="text" id="txtCity" size="30" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Your Country*</td>
      <td><label for="txtCity"></label>
        <select name="lstCountry" id="lstCountry">
          <option value="""">Select:</option>
          <?php
		  do {
		  ?>
          <option value="<?php echo $row_rs['Country']?>"><?php echo $row_rs['Country']?></option>
          <?php
		  } while($row_rs = mysql_fetch_assoc($rs)); 
		  ?>
      </select></td>
    </tr>
    <tr>
      <td>Your Email Address</td>
      <td><label for="txtEmailAddress"></label>
      <input name="txtEmailAddress" type="text" id="txtEmailAddress" size="30" maxlength="30" /></td>
    </tr>
    <tr>
      <td>Your Comments</td>
      <td id="txtComments"><label for="txtComment"></label>
      <textarea name="txtComment" cols="50" rows="6" id="txtComment"></textarea></td>
    </tr>
    <tr>
      <td>*required</td>
      <td><input type="button" name="cmdSave" id="cmdSave" value="Save" onclick="saveForm();"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div id="msg"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p id="frmSurvey">&nbsp;</p>
  <input type="hidden" name="MM_insert" value="frmSurvey" />
</form>
<p><br />
  <br />
  | <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> | 
  
  
<a href="survey_form.php" id="survey_formLink2">Survey Form </a>| <a href="survey_results.php">Survey Results </a>|</p>
<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<div class="footer">&copy; International School of Kenya 2011, Akkshay Khoslaa</div>
<!-- #EndLibraryItem -->
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs);
?>
