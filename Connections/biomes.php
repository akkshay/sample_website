<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_biomes = "localhost";
$database_biomes = "biomes";
$username_biomes = "root";
$password_biomes = "root";
$biomes = mysql_pconnect($hostname_biomes, $username_biomes, $password_biomes) or trigger_error(mysql_error(),E_USER_ERROR); 
?>