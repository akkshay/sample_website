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
<title>Tropical Rain Forest</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body id="tropicalrainforest">
<h1>Tropical Rain Forest</h1>
| <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php" id="tropicalrainforestLink">Tropical Rain Forest</a> | <a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> | <a href="survey_form.php">Survey Form </a>| <a href="survey_results.php">Survey Results </a>| <a href="logins.php">Logins</a> | <a href="<?php echo $logoutAction ?>">Log out</a> |

<table width="1019" height="648" border="1" cellpadding="5" cellspacing="1">
  <tr>
<td width="418"> <img src="images/tropicalrainforestbiome.jpg" height="200" /></td>
<td width="286">The tropical rainforest is earth's most complex biome in terms of both structure and species diversity. It occurs under optimal growing conditions: abundant precipitation and year round warmth. There is no annual rhythm to the forest; rather each species has evolved its own flowering and fruiting seasons. Sunlight is a major limiting factor. A variety of strategies have been successful in the struggle to reach light or to adapt to the low intensity of light beneath the canopy.  </td>
</tr>
<tr>
<td height="282"><img src="untitled.jpg" alt="" height="200" /></td>
<td> A vertical stratification of three layer of trees is apparent.. These layers have been identified as A, B, and C layers:

    A layer: the emergents. Widely spaced trees 100 to 120 feet tall and with umbrella-shaped canopies extend above the general canopy of the forest. Since they must contend with drying winds, they tend to have small leaves and some species are deci duous during the brief dry season.
    B layer: a closed canopy of 80 foot trees. Light is readily available at the top of this layer, but greatly reduced below it.
    C layer: a closed canopy of 60 foot trees. There is little air movement in this zone and consequently humidity is constantly high.
    Shrub/sapling layer: Less than 3 percent of the light intercepted at the top of the forest canopy passes to this layer. Arrested growth is characteristic of young trees capable of a rapid surge of growth when a gap in canopy above them opens.
    Ground layer: sparse plant growth. Less than 1 percent of the light that strikes the top of the forest penetrates to the forest floor. In such darkness few green plants grow. Moisture is also reduced by the canopy above: one third of the precipitation is intercepted before it reaches the ground.</td>
</tr>
</table>
<p><br />
  <br />
  <br />
  <br />
  | <a href="index.php">Home</a> | <a href="desert.php">Desert</a> | <a href="tropicalrainforest.php" id="tropicalrainforestLink2">Tropical Rain Forest</a> |<a href="deciduousforest.php">Deciduous Forest </a>| <a href="taiga.php">Taiga</a> | <a href="grassland.php">Grassland</a> | <a href="marine.php">Marine</a> | <a href="tundra.php">Tundra</a> |
  <a href="survey_form.php">Survey Form </a>|
  <a href="survey_results.php">Survey Results </a>|</p>
<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<div class="footer">&copy; International School of Kenya 2011, Akkshay Khoslaa</div>
<!-- #EndLibraryItem -->
<p>&nbsp;</p>
</body>
</html>
