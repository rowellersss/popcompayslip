<?php

include '../includes/session.php';
include '../includes/dbcon.php';

if(isset($_SESSION)){
    $empid = $_SESSION['INTRA_EMP_ID'];
}elseif(isset($_POST)){
    $empid = $_POST['id'];
}

$d1 = mysql_real_escape_string($_POST['year']);
$d2 = mysql_real_escape_string($_POST['month']);
$d3 = mysql_real_escape_string($_POST['year2']);
$d5 = mysql_real_escape_string($_POST['year3']);
$d6 = mysql_real_escape_string($_POST['month3']);
$d7 = mysql_real_escape_string($_POST['year4']);
$d8 = mysql_real_escape_string($_POST['month4']);
$d9 = mysql_real_escape_string($_POST['month41']);

$checkGP = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$d1' AND month_covered = '$d2'");
// $checkSP = mysql_query("SELECT * FROM table_specialpayroll WHERE Emp_no = '$empid' AND year_covered = '$d1' AND month_covered = '$d2'");
// }elseif(!empty($_POST['year2'])){
//     $checkGP = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$d3' OR month_covered = '$d2'");
//     $checkSP = mysql_query("SELECT * FROM table_specialpayroll WHERE Emp_no = '$empid' AND year_covered = '$d1' AND month_covered = '$d2'");
// }
$checkRowGP = mysql_num_rows($checkGP);
// $checkRowSP = mysql_num_rows($checkSP);


if (!empty($_POST['year'])) {
    echo 321;exit;
    $date = $d1 . '-' . $d2 . '-01';
    $sql = ("SELECT * FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$d1' AND month_covered = '$d2'");
    $numcount = mysql_num_rows($sql);
} elseif (!empty($_POST['year2'])) {
    echo 123;exit;
    $date = $d3 . '-01-01';
    $date2 = $d3 . '-12-31';
    $sql = ("SELECT * FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$d3'");
    $numcount = mysql_num_rows($sql);
} elseif (!empty($_POST['year3'])) {
    $date = $d5 . '-01-01';
    $date2 = $d5 . '-' . $d6 . '-31';   
    $sql = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$d5' AND month_covered BETWEEN '01' AND '$d6'");
    $numcount = mysql_num_rows($sql);
} elseif (!empty($_POST['year4'])) {
    $date = $d7 . '-' . $d8 . '-01';
    $date2 = $d7 . '-' . $d9 . '-01';
    $sql = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$d7' AND month_covered BETWEEN '$d8' AND '$d9'");
    $numcount = mysql_num_rows($sql);
}

$data = array(
    'numcount' => $numcount
);

echo json_encode($data);
    


//$query = mysql_query("SELECT *, SUM(REPLACE(Adj_basicmonsal, ',','')) as s1 FROM table_payslip WHERE Emp_no = '$empid' AND Date_covered BETWEEN '01-2017' AND '12-2017'");
//while ($row = mysql_fetch_array($query)) {
//    echo $row['Name'] . ' - ' . $row['Position'] . ' - ' . $row['s1'] . '<br>';
//}