<?php
include 'includes/session.php';
include 'includes/dbcon.php';

$query2 = mysql_query("select * from table_empinfo order by Id desc");
while ($row = mysql_fetch_array($query2)) {
    echo '<tr><td>' . $row['Employee_Id'] . '</td><td>' . $row['Firstname'] . '</td><td>' . $row['Lastname'] . '</td>'
    . '<td>' . $row['Position'] . '</td><td>' . $row['DivUnitRPO'] . '</td><td>' . $row['Email'] . '</td>'
    . '<td>' . $row['Approve'] . '</td>'
    . '<td><a href="ManageAccounts.php?id=' . $row['Employee_Id'] . '&act=app"><i class="material-icons">thumb_up</i></a></td></tr>';
}