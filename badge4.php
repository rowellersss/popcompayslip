<?php
include 'includes/session.php';
include 'includes/dbcon.php';


$id = $_SESSION['INTRA_EMP_ID'];
$query3 = mysql_query("select * from table_empinfo"
        . "             left join table_position"
        . "                 on table_position.position_id = table_empinfo.Position"
        . "             left join table_division"
        . "                 on table_division.division_id = table_position.division_id where table_empinfo.Employee_Id = '$id'");
$row3 = mysql_fetch_assoc($query3);
$dur = $row3['division_description'];

$result2 = mysql_query("select * from table_servicereq where Ind = '1' AND Status = 'Approval' AND DivUnitRPO = '$dur'");

$num = mysql_num_rows($result2);

if (mysql_num_rows($result2) == 0) {
    echo '';
} else {
    echo $num;
}
