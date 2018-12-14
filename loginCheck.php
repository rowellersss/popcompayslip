<?php
include 'includes/session.php';
include 'includes/dbcon.php';

if (isset($_POST['login'])) {
    $email = $_POST['user'];
    $pass = md5($_POST['pass']);

    
    if (!$email || !$pass) {
        header("Location: index.php?msg=2");
    } else {
        $login = mysql_query("SELECT * FROM table_empacc WHERE Username='$email' AND Password='$pass'");
        //$login = mysql_query("Select table_empacc.Username, table_empacc.Password, table_empinfo.Approve from table_empacc INNER JOIN table_empinfo ON table_empacc.Emp_Id = table_empinfo.Employee_Id where table_empacc.Username='$email' AND table_empacc.Password='$pass' AND table_empinfo.Approve='Yes' ");
        if (mysql_num_rows($login) == 0) {
            header("Location: index.php?msg=1");
        } else {
            while ($row = mysql_fetch_assoc($login)) {
                $d1 = $row['Id'];
                $d2 = $row['Emp_Id'];
                $d3 = $row['Password'];
                $query = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$d2' AND Approve = 'Yes'");
                if (mysql_num_rows($query) == 0) {
                    header("Location: index.php?msg=4");
                } else {
                    if ($pass != $d3) {
                        header("Location: index.php?msg=3");
                    } else {
                        $row2 = mysql_fetch_assoc($query);
                        $_SESSION['INTRA_PDS_ID'] = $row2['Id'];
                        $_SESSION['INTRA_ID'] = $d1;
                        $_SESSION['INTRA_EMP_ID'] = $d2;
                        $_SESSION['INTRA_PASSWORD'] = $d3;
                        date_default_timezone_set('Asia/Manila');
                        $date = date('Y-m-d');
                        $time = date('H:i:s', time());
                        $online = $date . " " . $time;

                        mysql_query("UPDATE table_empacc SET LastOnline = '$online' WHERE Emp_Id = '$d2'");
                        mysql_query("UPDATE table_empinfo SET Status = '1' WHERE Employee_Id = '$d2'");

                        header("Location: files");
                    }
                }
            }
        }
    }
}
?>