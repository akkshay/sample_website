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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Taiga</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body id="taiga">
<h1>Taiga</h1>
| <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> | <a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.html" id="taigaLink">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.html">Tundra</a> | <a href="survey_form.php">Survey Form </a>| <a href="survey_results.php">Survey Results </a>| <a href="logins.php">Logins</a> | <a href="<?php echo $logoutAction ?>">Log out</a> |

<table cellspacing="1" cellpadding="5" border="1" width="700">
  <tr>
<td>Taiga is the Russian word for forest and is the largest biome in the world. It stretches over Eurasia and North America. The taiga is located near the top of the world, just below the tundra biome. The winters in the taiga are very cold with only snowfall. The summers are warm, rainy, and humid.</td>
<td>There are not a lot of species of plants in the taiga because of the harsh conditions. Not many plants can survive the extreme cold of the taiga winter. There are some lichens and mosses, but most plants are coniferous trees like pine, white spruce, hemlock and douglas fir.  </td>
</tr>
<tr>
<td><img src="untitled2.jpg" alt="" height="200" /></td>
<td><img src="images/tiaga.jpg" height="200" /> </td>
</tr>
</table>
<p><br />
  <br />
  <br />
  <br />
  | <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.html" id="taigaLink2">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.html">Tundra</a> |
  <a href="survey_form.php">Survey Form </a>|
<a href="survey_results.php">Survey Results </a>|</p>
<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<div class="footer">&copy; International School of Kenya 2011, Akkshay Khoslaa</div>
<!-- #EndLibraryItem -->
<p>&nbsp;</p>
</body>
</html>
