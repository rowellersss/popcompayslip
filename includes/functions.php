<?php

function accelvl0() {
        $empidac0 = $_SESSION['INTRA_EMP_ID'];
        $sqlac0 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac0'");
        $rowac0 = mysql_fetch_assoc($sqlac0);
        $posac0 = $rowac0['Position'];
        $sqlac0b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac0'");
        $numrowac0 = mysql_fetch_assoc($sqlac0b);
        return $numrowac0;
}

function accelvl1() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac1 = $_REQUEST['emp_id'];
        $sqlac1 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac1'");
        $rowac1 = mysql_fetch_assoc($sqlac1);
        $posac1 = $rowac1['Position'];
        $sqlac1b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac1' AND accesslvl_id = 1");
        $numrowac1 = mysql_num_rows($sqlac1b);
        return $numrowac1;
    }
    else
    {
        $empidac1 = $_SESSION['INTRA_EMP_ID'];
        $sqlac1 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac1'");
        $rowac1 = mysql_fetch_assoc($sqlac1);
        $posac1 = $rowac1['Position'];
        $sqlac1b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac1' AND accesslvl_id = 1");
        $numrowac1 = mysql_num_rows($sqlac1b);
        return $numrowac1;
    }
}

function accelvl2() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac2 = $_REQUEST['emp_id'];
        $sqlac2 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac2'");
        $rowac2 = mysql_fetch_assoc($sqlac2);
        $posac2 = $rowac2['Position'];
        $sqlac2b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac2' AND accesslvl_id = 2");
        $numrowac2 = mysql_num_rows($sqlac2b);
        return $numrowac2;    
    }
    else
    {
        $empidac2 = $_SESSION['INTRA_EMP_ID'];
        $sqlac2 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac2'");
        $rowac2 = mysql_fetch_assoc($sqlac2);
        $posac2 = $rowac2['Position'];
        $sqlac2b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac2' AND accesslvl_id = 2");
        $numrowac2 = mysql_num_rows($sqlac2b);
        return $numrowac2;     
    }
}

function accelvl3() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac3 = $_REQUEST['emp_id'];
        $sqlac3 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac3'");
        $rowac3 = mysql_fetch_assoc($sqlac3);
        $posac3 = $rowac3['Position'];
        $sqlac3b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac3' AND accesslvl_id = 3");
        $numrowac3 = mysql_num_rows($sqlac3b);
        return $numrowac3;
    }
    else
    {
        $empidac3 = $_SESSION['INTRA_EMP_ID'];
        $sqlac3 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac3'");
        $rowac3 = mysql_fetch_assoc($sqlac3);
        $posac3 = $rowac3['Position'];
        $sqlac3b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac3' AND accesslvl_id = 3");
        $numrowac3 = mysql_num_rows($sqlac3b);
        return $numrowac3;
    }
}

function accelvl4() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac4 = $_REQUEST['emp_id'];
        $sqlac4 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac4'");
        $rowac4 = mysql_fetch_assoc($sqlac4);
        $posac4 = $rowac4['Position'];
        $sqlac4b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac4' AND accesslvl_id = 4");
        $numrowac4 = mysql_num_rows($sqlac4b);
        return $numrowac4;
    }
    else
    {
        $empidac4 = $_SESSION['INTRA_EMP_ID'];
        $sqlac4 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac4'");
        $rowac4 = mysql_fetch_assoc($sqlac4);
        $posac4 = $rowac4['Position'];
        $sqlac4b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac4' AND accesslvl_id = 4");
        $numrowac4 = mysql_num_rows($sqlac4b);
        return $numrowac4;
    }
}

function accelvl5() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac5 = $_REQUEST['emp_id'];
        $sqlac5 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac5'");
        $rowac5 = mysql_fetch_assoc($sqlac5);
        $posac5 = $rowac5['Position'];
        $sqlac5b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac5' AND accesslvl_id = 5");
        $numrowac5 = mysql_num_rows($sqlac5b);
        return $numrowac5;
    }
    else
    {
        $empidac5 = $_SESSION['INTRA_EMP_ID'];
        $sqlac5 = mysql_query("SELECT * FROM table_empinfo WHERE Employee_Id = '$empidac5'");
        $rowac5 = mysql_fetch_assoc($sqlac5);
        $posac5 = $rowac5['Position'];
        $sqlac5b = mysql_query("SELECT * FROM table_posaccesslvl WHERE position = '$posac5' AND accesslvl_id = 5");
        $numrowac5 = mysql_num_rows($sqlac5b);
        return $numrowac5;
    }
}

function accelvl6() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac6 = $_REQUEST['emp_id'];
        $sqlac6 = mysql_query("SELECT * FROM table_psb WHERE Emp_no = '$empidac6'");
        $numrowac6 = mysql_num_rows($sqlac6);
        return $numrowac6;
    }
    else
    {
        $empidac6 = $_SESSION['INTRA_EMP_ID'];
        $sqlac6 = mysql_query("SELECT * FROM table_psb WHERE Emp_no = '$empidac6'");
        $numrowac6 = mysql_num_rows($sqlac6);
        return $numrowac6;
    }
}

function accelvl7() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac7 = $_REQUEST['emp_id'];
        $sqlac7 = mysql_query("SELECT * FROM table_supervisors WHERE Emp_no = '$empidac7'");
        $numrowac7 = mysql_num_rows($sqlac7);
        return $numrowac7;
    }
    else
    {
        $empidac7 = $_SESSION['INTRA_EMP_ID'];
        $sqlac7 = mysql_query("SELECT * FROM table_supervisors WHERE Emp_no = '$empidac7'");
        $numrowac7 = mysql_num_rows($sqlac7);
        return $numrowac7;
    }
}

function accelvl8() {
    if(!empty($_REQUEST) && $_SESSION == '')
    {
        $empidac8 = $_REQUEST['emp_id'];
        if ($empidac8 == 72) {
            $check8 = 'true';
        } else {
            $check8 = 'false';
        }
        return $check8;    
    }
    else
    {
        $empidac8 = $_SESSION['INTRA_EMP_ID'];
        if ($empidac8 == 72) {
            $check8 = 'true';
        } else {
            $check8 = 'false';
        }
        return $check8;
    }
}

function session_empId() {
    
}