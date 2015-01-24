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
<title>Grassland</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body id="grassland">
<h1>Grassland</h1>
| <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> | <a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php" id="grasslandLink">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> | <a href="survey_form.php">Survey Form </a>| <a href="survey_results.php">Survey Results </a>| <a href="logins.php">Logins</a> | <a href="<?php echo $logoutAction ?>">Log out</a> |

<table cellspacing="1" cellpadding="5" border="1" width="700">
  <tr>
<td>Grassland biomes are large, rolling terrains of grasses, flowers and herbs. Latitude, soil and local climates for the most part determine what kinds of plants grow in a particular grassland. A grassland is a region where the average annual precipitation is great enough to support grasses, and in some areas a few trees. The precipitation is so eratic that drought and fire prevent large forests from growing. Grasses can survive fires because they grow from the bottom instead of the top. Their stems can grow again after being burned off. The soil of most grasslands is also too thin and dry for trees to survive. </td>
<td><img src="untitled5.jpg" alt="" width="259" height="200" /></td>
</tr>
<tr>
<td> There are two different types of grasslands; tall-grass, which are humid and very wet, and short-grass, which are dry, with hotter summers and colder winters than the tall-grass prairie. The settlers found both on their journey west. When they crossed the Mississippi River they came into some very tall grass, some as high as 11 feet. Here it rained quite often and it was very humid. As they traveled further west and approached the Rocky Mountains, the grass became shorter. There was less rain in the summer and the winters got colder. These were the short-grass prairies.</td>
<td> <img src="images/grassland.jpg" height="200" /></td>
</tr>
</table>
<p><br />
  <br />
  <br />
  <br />
  | <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php" id="grasslandLink2">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> |
  <a href="survey_form.php">Survey Form </a>|
<a href="survey_results.php">Survey Results </a>|</p>
<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<div class="footer">&copy; International School of Kenya 2011, Akkshay Khoslaa</div>
<!-- #EndLibraryItem -->
<p>&nbsp;</p>
</body>
</html>
