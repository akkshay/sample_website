<?php require_once('Connections/biomes.php'); ?>
<?php
//start a session, so we can create a session variable in line 27
if (!isset($_SESSION)) {
  session_start();
}
$msg = ""; //we need to initialize these two variables which we use in the HTML so we don't create error messages in the php log file
$username = "";

//get user input from the form's fields
//this code below runs only if the user clicks the Login button
if (isset($_POST['cmdLogin'])) {
  $username=$_POST['txtUserName'];
  $password=$_POST['txtPassword'];
  $redirectLoginSuccess = "index.php";

//connect to the biomes database  
  mysql_select_db($database_biomes, $biomes);
//create the SQL string, using the user input for username and password to check for a matching record in the database
  $strSQL="SELECT UserID, UserName, Password FROM users WHERE UserName='$username' AND Password='$password'";
//ask the MySQL database to run the query
  $rs = mysql_query($strSQL, $biomes) or die(mysql_error());
  $row_rs = mysql_fetch_assoc($rs);
  $found = mysql_num_rows($rs);
//if there is a match in the users table $found will be 1, if not it will be 0 -- the equivalent of false
  if ($found) {
//create a session variable to retain the username
    $_SESSION['MM_Username'] = $username;
	$_SESSION['MM_UserGroup'] = "";
	
//insert record in logins table
$strSQL = "INSERT INTO logins (UserID, UserName) VALUES (" . $row_rs['UserID'] . ",'" . $row_rs['UserName'] . "')";
mysql_query($strSQL, $biomes) or die (mysql_error()); 	
	
//redirect the user to the index page 
  	header(sprintf("Location: %s", $redirectLoginSuccess));
  }
//if there isn't a match in the users table give the user an error message
  else {
	$msg = "Invalid login information";
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p class="large">Login</p>
<form id="frmLogin" name="frmLogin" method="post" action="">
  <table width="300" border="0" cellspacing="0" cellpadding="5" class="login">
    <tr>
      <td>&nbsp;</td>
      <td><div class="reditalic"><?php echo $msg; ?></div></td>
    </tr>
    <tr>
      <td class="blue label">User Name:</td>
      <td><input name="txtUserName" type="text" id="txtUserName" size="25" maxlength="35" value="<?php echo $username; ?> " /></td>
    </tr>
    <tr>
      <td class="blue label">Password:</td>
      <td><input name="txtPassword" type="password" id="txtPassword" size="25" maxlength="35" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="cmdLogin" id="cmdLogin" value="Login" /></td>
    </tr>
  </table>
</form>
</body>
</html>