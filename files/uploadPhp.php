<?php
if (isset($_POST["submit"])) {
    $filename1 = $_FILES["file"]["tmp_name"];
    if ($_FILES['file']['name']) {
        $filename = explode(".", $_FILES['file']['name']);
        if (strtoupper($filename[count($filename) - 1]) == 'CSV') {
            $lines = file($_FILES['file']['tmp_name']);
            $file = fopen($filename1, "r");
            $id = null;
            $d1 = '';
            while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
                //echo '<table border="1">';
                //foreach ($lines as $line) {
                //$data = explode(";", $line);
                $dcov = $_POST['year'] . '-' . $_POST['month'] . '-01';
                $in1 = date('Y-m-d', strtotime($_POST['indate1']));
                $in2 = date('Y-m-d', strtotime($_POST['indate2']));
                //echo '<tr>';
                
                if (is_numeric($data[0])) {
                    
                    $id = $data[3];
                    $d1 = $data[7];
                    $d2 = $data[8];
                    
                    $query0 = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = '$id' AND Date_covered = '$dcov'");
                    if (mysql_num_rows($query0) <= 0) {
                        
                        $query = mysql_query("SELECT * from table_empinfo A LEFT JOIN table_position B ON A.Position = B.position_id WHERE Employee_Id = $id");
                        $row = mysql_fetch_array($query);
                        
                        $string = trim($row['Middlename']);
                        if ($string == '' || ctype_space($string)) {
                            $name = strtoupper($row['Lastname']) . ', ' . strtoupper($row['Firstname']);
                        } elseif ($string != '' || !ctype_space($string)) {
                            $words = explode(" ", $string);
                            $acronym = "";
                            foreach ($words as $w) {
                                $acronym .= $w[0];
                            }
                            
                            $name = strtoupper($row['Lastname']) . ', ' . strtoupper($row['Firstname']) . ' ' . strtoupper($acronym) . '.';
                        }
                        $name = strtoupper($row['Lastname']) . ', ' . strtoupper($row['Firstname']) . ' ' . strtoupper($acronym) . '.';
                        $pos = $row['position_description'];
                        
                        mysql_query("INSERT INTO table_payslip() values('', '$dcov', '$data[0]', '$name', '$pos', '$data[3]', '$data[6]', '$in1', '$data[7]', '$data[8]', '$in2', '', '', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$data[22]', '$data[23]', '$data[24]', '$data[25]', '$data[26]', '$data[27]', '$data[28]', '$data[29]', '$data[30]', '$data[31]', '$data[32]', '$data[33]', '')") or die(mysql_error());
                        //echo '1';
                        //echo '<td></td><td></td><td></td><td>' . $data[3] . '</td><td>' . $data[6] . '</td><td>' . $data[7] . '</td><td>' . $data[8] . '</td><td>' . $data[9] . '</td><td>' . $data[10] . '</td><td>' . $data[11] . '</td><td>' . $data[12] . '</td><td>' . $data[13] . '</td><td>' . $data[14] . '</td><td>' . $data[15] . '</td><td>' . $data[16] . '</td><td>' . $data[17] . '</td><td>' . $data[18] . '</td><td>' . $data[19] . '</td><td>' . $data[20] . '</td><td>' . $data[21] . '</td><td>' . $data[22] . '</td><td>' . $data[23] . '</td><td>' . $data[24] . '</td><td>' . $data[25] . '</td><td>' . $data[26] . '</td><td>' . $data[27] . '</td><td>' . $data[28] . '</td><td>' . $data[29] . '</td><td>' . $data[30] . '</td><td>' . $data[31] . '</td><td>' . $data[32] . '</td><td>' . $data[33] . '</td>';
                        header("Location: uploadPayroll.php");
                    }
                }
                $dex2 = '';
//                 if (date('M-Y', strtotime($data[7])) != "Jan-1970") {
//                     $dex = explode(" ", $data[7]);
//                     if  (isset($dex[2])) {
//                         $dex2 = $dex[0] . ' ' . $dex[2];
//                     } else {
//                         $dex2 = $dex[0];
//                     }

//                     header("Location: uploadPayroll.php");
// //                    echo $data[1] . ' - ' . $dex2 . ' and ' . $dcov . '<br>';
// //                    echo $data[1] . ' - ' . date('M-Y', strtotime($dex2)) . " and " . date('M-Y', strtotime($dcov)) . "<br>";
//                 }
                
                if (date('M-Y', strtotime($dex2)) != "Jan-1970" && date('M-Y', strtotime($dex2)) == date('M-Y', strtotime($dcov))) {
                    //echo $data[0] . " - " . $data[1] . " - " . $data[3] . " - " . $data[7] . " - " . $data[8] . "<br>";
                    $query1 = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = $id AND Date_covered = '$dcov'");
                    if (mysql_num_rows($query1) > 0) {
                        $result = mysql_query("UPDATE table_payslip SET In_date = '$in1', In_date2 = '$in2', Adj_periodcovered2 = '$data[7]', Salaries_wagesreg2 = '$data[8]', Salaries_withtax = '$data[9]', GSIS_rlip = '$data[10]', GSIS_ioliprem = '$data[11]', GSIS_uoliloan = '$data[12]', GSIS_oli = '$data[13]', GSIS_consoloan = '$data[14]', GSIS_emergloan = '$data[15]', GSIS_policyloanreg = '$data[16]', GSIS_optional = '$data[17]', GSIS_educassistloan = '$data[18]', GSIS_umidca = '$data[19]', PAGIBIG_premium = '$data[20]', PAGIBIG_MP2 = '$data[21]', PAGIBIG_MPL = '$data[22]', PAGIBIG_calamityloan = '$data[23]', PHILH_cont = '$data[24]', PHILH_arrears = '$data[25]', PMPC_capital = '$data[26]', PMPC_loan = '$data[27]', COPEA_dues = '$data[28]', LBP_salaryloanreg = '$data[29]', LBP_mobsalloanser = '$data[30]', Total_deduction = '$data[31]', Net_amount2 = '$data[33]' WHERE Emp_no = $id AND Adj_periodcovered = '$d1'");

                        header("Location: uploadPayroll.php");
                        //echo '2';
                        if (!$result) {
                            die('Invalid query: ' . mysql_error());
                        }
                        //echo '<td></td><td></td><td></td><td>' . $id . '</td><td>' . $d1 . '</td><td>' . $data[7] . '</td><td>' . $data[8] . '</td><td>' . $data[9] . '</td><td>' . $data[10] . '</td><td>' . $data[11] . '</td><td>' . $data[12] . '</td><td>' . $data[13] . '</td><td>' . $data[14] . '</td><td>' . $data[15] . '</td><td>' . $data[16] . '</td><td>' . $data[17] . '</td><td>' . $data[18] . '</td><td>' . $data[19] . '</td><td>' . $data[20] . '</td><td>' . $data[21] . '</td><td>' . $data[22] . '</td><td>' . $data[23] . '</td><td>' . $data[24] . '</td><td>' . $data[25] . '</td><td>' . $data[26] . '</td><td>' . $data[27] . '</td><td>' . $data[28] . '</td><td>' . $data[29] . '</td><td>' . $data[30] . '</td><td>' . $data[31] . '</td><td>' . $data[32] . '</td><td>' . $data[33] . '</td>';
                        header("Location: uploadPayroll.php");
                    } elseif (mysql_num_rows($query1) == 0) {
                        $result = mysql_query("UPDATE table_payslip SET In_date = '$in1', In_date2 = '$in2', Adj_periodcovered2 = '$data[7]', Salaries_wagesreg2 = '$data[8]', Salaries_withtax = '$data[9]', GSIS_rlip = '$data[10]', GSIS_ioliprem = '$data[11]', GSIS_uoliloan = '$data[12]', GSIS_oli = '$data[13]', GSIS_consoloan = '$data[14]', GSIS_emergloan = '$data[15]', GSIS_policyloanreg = '$data[16]', GSIS_optional = '$data[17]', GSIS_educassistloan = '$data[18]', GSIS_umidca = '$data[19]', PAGIBIG_premium = '$data[20]', PAGIBIG_MP2 = '$data[21]', PAGIBIG_MPL = '$data[22]', PAGIBIG_calamityloan = '$data[23]', PHILH_cont = '$data[24]', PHILH_arrears = '$data[25]', PMPC_capital = '$data[26]', PMPC_loan = '$data[27]', COPEA_dues = '$data[28]', LBP_salaryloanreg = '$data[29]', LBP_mobsalloanser = '$data[30]', Total_deduction = '$data[31]', Net_amount2 = '$data[33]' WHERE Emp_no = $id AND Adj_periodcovered2 = '$d3'");

                        header("Location: uploadPayroll.php");
                        //echo '3';
                        if (!$result) {
                            die('Invalid query: ' . mysql_query());
                            header("Location: uploadPayroll.php");
                        }
                         //echo '<td></td><td></td><td></td><td></td><td></td><td>' . $data[7] . '</td><td>' . $data[8] . '</td><td>' . $data[9] . '</td><td>' . $data[10] . '</td><td>' . $data[11] . '</td><td>' . $data[12] . '</td><td>' . $data[13] . '</td><td>' . $data[14] . '</td><td>' . $data[15] . '</td><td>' . $data[16] . '</td><td>' . $data[17] . '</td><td>' . $data[18] . '</td><td>' . $data[19] . '</td><td>' . $data[20] . '</td><td>' . $data[21] . '</td><td>' . $data[22] . '</td><td>' . $data[23] . '</td><td>' . $data[24] . '</td><td>' . $data[25] . '</td><td>' . $data[26] . '</td><td>' . $data[27] . '</td><td>' . $data[28] . '</td><td>' . $data[29] . '</td><td>' . $data[30] . '</td><td>' . $data[31] . '</td><td>' . $data[32] . '</td><td>' . $data[33] . '</td>';
                    }
                }
                //echo '</tr>';
            }
            
            //echo '</table>';
            $_SESSION['HRIS_INDICATOR'] = "TRUE";
            header("Location: uploadPayroll.php");
        } else {
            $_SESSION['HRIS_INDICATOR'] = "FALSE";
            header("Location: uploadPayroll.php");
        }
    } elseif (empty($_FILES['file']['name'])) {
        $_SESSION['HRIS_INDICATOR'] = "FALSE2";
        header("Location: uploadPayroll.php");
    }
    
    
}
?>

<?php
    if (isset($_SESSION['HRIS_INDICATOR']) && $_SESSION['HRIS_INDICATOR'] == 'TRUE') {
        ?>
        <script>
            $(document).ready(function () {
                swal("Successful!", "Payroll successfully uploaded!", "success");
            })
        </script>
        <?php
    } elseif (isset($_SESSION['HRIS_INDICATOR']) && $_SESSION['HRIS_INDICATOR'] == 'FALSE') {
        ?>
        <script>
            $(document).ready(function () {
                sweetAlert("Oops...", "Please upload csv file!", "error");
            })
        </script>
        <?php
    } elseif (isset($_SESSION['HRIS_INDICATOR']) && $_SESSION['HRIS_INDICATOR'] == 'FALSE2') {
        ?>
        <script>
            $(document).ready(function () {
                sweetAlert("Oops...", "Please choose a file!", "error");
            })
        </script>
        <?php
    }
?>