<?php
include 'includes/session.php';
include 'includes/dbcon.php';
include 'includes/functions.php';


$id = $_SESSION['INTRA_EMP_ID'];

$result2 = mysql_query("select * from table_messnotif where Id2 = '$id' AND Id1 != '$id' order by Id desc");
$num2 = mysql_num_rows($result2);

$result3 = mysql_query("select * from table_empinfo where Approve = 'No'");
$num3 = mysql_num_rows($result3);

$result4 = mysql_query("select * from table_servicereq where Ind = '1' AND Status != 'Finished'");
$num4 = mysql_num_rows($result4);


$query5 = mysql_query("select * from table_empinfo"
        . "             left join table_position"
        . "                 on table_position.position_id = table_empinfo.Position"
        . "             left join table_division"
        . "                 on table_division.division_id = table_position.division_id where table_empinfo.Employee_Id = '$id'");
$row5 = mysql_fetch_assoc($query5);
$dur5 = $row5['division_description'];
$result5 = mysql_query("select * from table_servicereq where Ind = '1' AND Status = 'Approval' AND DivUnitRPO = '$dur5'");
$num5 = mysql_num_rows($result5);

$query6 = mysql_query("select * from table_empinfo where Employee_Id = '$id'");
$row6 = mysql_fetch_assoc($query6);
$pdsid6 = $row6['Id'];
$result6 = mysql_query("select * from table_servicereq where Emp_Id = '$pdsid6' AND Status='Appl'");
$num6 = mysql_num_rows($result6);


$sum = $num2 + $num3 + $num4 + $num6;
$sum2 = $num2 + $num5 + $num6;
$sum3 = $num2 + $num6;

if (accelvl4() != 0) {
    if ($sum != 0) {
        echo 'Intranet (' . $sum . ')';
    } elseif ($sum == 0) {
        echo 'Intranet';
    }
} elseif (accelvl5() <= 0 && accelvl4() <= 0) {
    if ($sum3 != 0) {
        echo 'Intranet (' . $sum3 . ')';
    } elseif ($sum3 == 0) {
        echo 'Intranet';
    }
} elseif (accelvl5() != 0) {
    if ($sum2 != 0) {
        echo 'Intranet (' . $sum2 . ')';
    } elseif ($sum2 == 0) {
        echo 'Intranet';
    }
}