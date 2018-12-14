<?php

$Server="localhost";
$unameDB ="root";
$passDB  ="";
$dbName="Intranet";

$sqlCon = mysql_connect($Server, $unameDB, $passDB) or die (mysql_error(). "Not connected");

mysql_select_db($dbName, $sqlCon);

?>