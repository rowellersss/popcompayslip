<?php
include "../includes/dbcon.php";

$filename1 = $_FILES["file"]["tmp_name"];
if ($_FILES['file']['name'])
{
    $filename = explode(".", $_FILES['file']['name']);
    if (strtoupper($filename[count($filename) - 1]) == 'CSV')
    {
        $lines = file($_FILES['file']['tmp_name']);
        $file = fopen($filename1, "r");
        $id = null;
        $d1 = '';

        // $dcov = $_POST['year'] . '-' . $_POST['month'] . '-01';
        $year_covered = $_POST['year'];
        $month_covered = $_POST['month'];
        $dcov = $year_covered. '-' . $month_covered . '-01';
        $sql = mysql_query("SELECT * FROM table_payslip WHERE year_covered = '$year_covered' AND month_covered = '$month_covered'");
        $result = mysql_fetch_assoc($sql);
        $result_date = $result['year_covered'] . '-' . $result['month_covered'] . '-01';
        
        
        if($dcov != $result_date)
        {
            $date = $_POST['year'] . '-' . $_POST['month'];
            $month = date("F", mktime(null, null, null, $_POST['month']));
            $adj_period1 = $month.' 1-15';
            $adj_period2 = $month.' 16-31';
            $cutoff1 = date('Y-m', strtotime($_POST['indate1']));
            $cutoff2 = date('Y-m', strtotime($_POST['indate2']));
            
            if($date == $cutoff1 AND $date == $cutoff2)
            {
                $day1 = date('d', strtotime($_POST['indate1']));
                $day2 = date('d', strtotime($_POST['indate2']));

                if($day1 <= '15' AND $day2 >= '16')
                {
                    while (($data = fgetcsv($file, 10000, ",")) !== FALSE) 
                    {
                        // $dcov = $_POST['year'] . '-' . $_POST['month'] . '-01';
                        $in1 = date('Y-m-d', strtotime($_POST['indate1']));
                        $in2 = date('Y-m-d', strtotime($_POST['indate2']));

                            if (is_numeric($data[0]))
                            {
                                $id = $data[3];
                                $d1 = $data[7];
                                $d2 = $data[8];

                                $query0 = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = '$id' AND year_covered = '$year_covered' AND month_covered = '$month_covered'");
                                
                                if (mysql_num_rows($query0) <= 0)
                                {
                                    $query = mysql_query("SELECT * from table_empinfo A LEFT JOIN table_position B ON A.Position = B.position_id WHERE Employee_Id = $id");
                                    $row = mysql_fetch_array($query);
                                    
                                    $string = trim($row['Middlename']);
                                    if ($string == '' || ctype_space($string))
                                    {
                                        $name = strtoupper($row['Lastname']) . ', ' . strtoupper($row['Firstname']);
                                    } 
                                    elseif ($string != '' || !ctype_space($string))
                                    {
                                        $words = explode(" ", $string);
                                        $acronym = "";
                                        foreach ($words as $w)
                                        {
                                            $acronym .= $w[0];
                                        }
                                        
                                        $name = strtoupper($row['Lastname']) . ', ' . strtoupper($row['Firstname']) . ' ' . strtoupper($acronym) . '.';
                                    }
                                    $name = strtoupper($row['Lastname']) . ', ' . strtoupper($row['Firstname']) . ' ' . strtoupper($acronym) . '.';
                                    $pos = $row['position_description'];
                                    $date_uploaded = date('Y-m-d h:i:s');
                                    
                                   $result =  mysql_query("INSERT INTO table_payslip() values('', '$year_covered', '$month_covered', '$data[0]', '$name', '$pos', '$id', '$data[4]', '$in1', '$adj_period1', '$data[6]', '$in2', '$adj_period2', '', '', '', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$data[22]', '$data[23]', '$data[24]', '$data[25]', '$data[26]', '$data[27]', '$data[28]', '$data[29]', 'No', '$date_uploaded')") or die(mysql_error());

                                }
                            }
                             
                            if ($data[5] == '16-31' OR $data[5] == '16-30')
                            {

                                $query1 = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = $id AND year_covered = '$year_covered' AND month_covered = '$month_covered'");
                                if (mysql_num_rows($query1) > 0)
                                {
                                    $result = mysql_query("UPDATE table_payslip SET Salaries_wagesreg2 = '$data[6]', Salaries_withtax = '$data[7]', GSIS_rlip = '$data[8]', GSIS_ioliprem = '$data[9]', GSIS_uoliloan = '$data[10]', GSIS_oli = '$data[11]', GSIS_consoloan = '$data[12]', GSIS_emergloan = '$data[13]', GSIS_educassistloan = '$data[14]', GSIS_policyloanreg = '$data[15]', GSIS_policyloanoptional = '$data[16]', PAGIBIG_premium = '$data[17]', PAGIBIG_MP2 = '$data[18]', PAGIBIG_MPL = '$data[19]', PHILH_cont = '$data[20]', PMPC_capital = '$data[21]', PMPC_loan = '$data[22]', COPEA_dues = '$data[23]', COPEA_specialloan = '$data[24]', LBP_mobsalloanser = '$data[25]', PHILH_arrears = '$data[26]', Total_deduction = '$data[27]', Net_amount2 = '$data[29]' WHERE Emp_no = $id");


                                    if (!$result)
                                    {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                                
                            }
                        }
                    echo $dcov;
                }
                else
                {
                    echo 'cutoff not matched';
                }
            }
            else
            {
                echo 'date not matched';
            }
        }
        else
        {
            echo 'uploaded';
        }
    }
    else
    {
        echo 'invalid file';
    }
}
elseif (empty($_FILES['file']['name']))
{
    echo 'empty file';
}
?>