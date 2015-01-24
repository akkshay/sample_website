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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tundra</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body id="tundra">
<h1>Tundra</h1>
| <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> | <a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php" id="tundraLink">Tundra</a> | <a href="survey_form.php">Survey Form </a>| <a href="survey_results.php">Survey Results </a>| <a href="logins.php">Logins</a> | <a href="<?php echo $logoutAction ?>">Log out</a>
|
<table cellspacing="1" cellpadding="5" border="1" width="700">
  <tr>
<td>Tundra is the coldest of all the biomes. Tundra comes from the Finnish word tunturi, meaning treeless plain. It is noted for its frost-molded landscapes, extremely low temperatures, little precipitation, poor nutrients, and short growing seasons. Dead organic material functions as a nutrient pool. The two major nutrients are nitrogen and phosphorus. Nitrogen is created by biological fixation, and phosphorus is created by precipitation.</td>
<td> Arctic tundra is located in the northern hemisphere, encircling the north pole and extending south to the coniferous forests of the taiga. The arctic is known for its cold, desert-like conditions. The growing season ranges from 50 to 60 days. The average winter temperature is -34° C (-30° F), but the average summer temperature is 3-12° C (37-54° F) which enables this biome to sustain life. Rainfall may vary in different regions of the arctic. Yearly precipitation, including melting snow, is 15 to 25 cm (6 to 10 inches). Soil is formed slowly. A layer of permanently frozen subsoil called permafrost exists, consisting mostly of gravel and finer material. When water saturates the upper surface, bogs and ponds may form, providing moisture for plants. There are no deep root systems in the vegetation of the arctic tundra, however, there are still a wide variety of plants that are able to resist the cold climate. There are about 1,700 kinds of plants in the arctic and subarctic, and these include:</td>
</tr>
<tr>
<td><img src=taiga2.jpg"></td>
<td> <img src="images/tundra.jpg" height="200" /></td>
</tr>
</table>
<a href="<?php echo $logoutAction ?>"></a>
<p><br />
  <br />
  <br />
  <br />
  | <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php" id="tundraLink2">Tundra</a> |
  <a href="survey_form.php">Survey Form </a>|
<a href="survey_results.php">Survey Results </a>|</p>
<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<div class="footer">&copy; International School of Kenya 2011, Akkshay Khoslaa</div>
<!-- #EndLibraryItem -->
<p>&nbsp;</p>
</body>
</html>
