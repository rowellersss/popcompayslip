<?php

session_start();
//Include database configuration file
include '../includes/dbcon.php';


$id = $_SESSION['INTRA_EMP_ID'];
$up = mysql_query("Update table_empinfo set Status = '0' where Employee_Id = '$id'");

    unset($_SESSION['INTRA_ID']);
    unset($_SESSION['INTRA_EMP_ID']);
    unset($_SESSION['INTRA_PASSWORD']);
    unset($_SESSION['INTRA_PDS_ID']);
    unset($_SESSION['INTRA_CID']);
    unset($_SESSION['INTRA_ACCESS']);
    unset($_SESSION['INTRA_ACCESS2']);
    
    echo json_encode($up);

