<?php

include 'includes/dbcon.php';
$query = mysql_query("SELECT * FROM table_position A"
        . " LEFT JOIN table_empinfo B"
        . "     ON A.position_id = B.Position WHERE A.division_id BETWEEN 1 AND 7 ORDER BY A.actual_division_id, A.position_id");
echo '<table border="1">';
while ($row = mysql_fetch_array($query)) {
    
    if (empty($row['Firstname'])) {
        echo '<tr style="background-color: red; color: white;">';
        echo '<td>' . $row['Firstname'] . ' ' . $row['Lastname'] . '</td>';
        echo '<td>' . $row['position_description'] . '</td>';
        echo '</tr>';
    } else {
        echo '<tr>';
        echo '<td>' . $row['Firstname'] . ' ' . $row['Lastname'] . '</td>';
        echo '<td>' . $row['position_description'] . '</td>';
        echo '</tr>';
    }
}
echo '</table>';