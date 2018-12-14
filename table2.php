
<?php
include 'includes/session.php';
include 'includes/dbcon.php';

$query2 = mysql_query("select * from table_servicereq where Status = 'Approved' order by Id desc");
while ($row = mysql_fetch_array($query2)) {
    $date = date('M d, Y', strtotime($row['DateofReq']));
    echo '<tr><td>' . $date . '</td><td>' . ucwords($row['ReqBy']) . '</td><td>' . $row['DivUnitRPO'] . '</td>'
    . '<td>' . $row['DescOfReq'] . '</td>'
    . '<td><a href="../RequestForm.php?Id=' . $row['Id'] . '&act=set"><i class="material-icons">visibility</i></a></td></tr>';
}

?>
