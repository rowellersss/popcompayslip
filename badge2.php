<?php
include 'includes/session.php';
include 'includes/dbcon.php';


$id = $_SESSION['INTRA_EMP_ID'];
$result2 = mysql_query("select * from table_empinfo where Approve = 'No'");


$num = mysql_num_rows($result2);

if(mysql_num_rows($result2) == 0){
    echo '';
}  else {
echo $num;    
}
