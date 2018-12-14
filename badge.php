<?php
include 'includes/session.php';
include 'includes/dbcon.php';


$id = $_SESSION['INTRA_PDS_ID'];
$result2 = mysql_query("SELECT * FROM table_messnotif WHERE Id2 = '$id' AND Id1 != '$id' ORDER BY Id DESC");


$num = mysql_num_rows($result2);

if(mysql_num_rows($result2) == 0){
    echo '';
}  else {
echo $num;    
}
