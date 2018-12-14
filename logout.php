<?php
include 'includes/session.php';
include 'includes/dbcon.php';
$id = $_SESSION['INTRA_EMP_ID'];
mysql_query("Update table_empinfo set Status = '0' where Employee_Id = '$id'");

unset($_SESSION['INTRA_ID']);
unset($_SESSION['INTRA_EMP_ID']);
unset($_SESSION['INTRA_ACCESSLVL']);

header("Location: ../../portal");

