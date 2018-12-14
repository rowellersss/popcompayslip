<?php
include '../includes/dbcon.php';

$filename1 = $_FILES["file"]["tmp_name"];
if ($_FILES['file']['name'])
{
    $filename = explode(".", $_FILES['file']['name']);
    if ($filename[1] == 'csv')
    {
        $lines = file($_FILES['file']['tmp_name']);
        $file = fopen($filename1, "r");

        $id = null;
        $d1 = '';

        $ex = implode('', $lines);
        if (strpos($ex, 'LONGEVITY') !== false || strpos($ex, 'longevity') !== false || strpos($ex, 'Longevity') !== false) {
            $tf = 'lon';
        } elseif (strpos($ex, 'HAZARD') !== false || strpos($ex, 'hazard') !== false || strpos($ex, 'Hazard') !== false) {
            $tf = 'haz';
        } elseif (strpos($ex, 'SUBSISTENCE') !== false || strpos($ex, 'subsistence') !== false || strpos($ex, 'Subsistence') !== false) {
            $tf = 'sublau';
        } else {
            $tf = 'pera';
        }

        if($_POST['bene'] == $tf)
        {
            while (($data = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                if (is_numeric($data[0]))
                {
                    $date = $_POST['year'] . '-' . $_POST['month'] . '-01';
                    $bdate = date('Y-m-d', strtotime($_POST['bdate']));

                    if ($_POST['bene'] == 'sublau')
                    {
                        if ($data[3] != "")
                        {
                            $sql = mysql_query("SELECT * FROM table_otherbenefits WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                            $num = mysql_num_rows($sql);

                            $query = mysql_query("SELECT * from table_empinfo A LEFT JOIN table_position B ON A.Position = B.position_id WHERE Employee_Id = '$data[3]'");
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

                            if (!empty($data[4])) {
                                $d1 = number_format(str_replace(' ', '', (str_replace(',', '', $data[4]))), 2);
                            } else {
                                $d1 = '';
                            }
                            if (!empty($data[5])) {
                                $d2 = number_format(str_replace(' ', '', (str_replace(',', '', $data[5]))), 2);
                            } else {
                                $d2 = '';
                            }
                            if (!empty($data[7])) {
                                $d3 = number_format(str_replace(' ', '', (str_replace(',', '', $data[7]))), 2);
                            } else {
                                $d3 = '';
                            }
                            if (!empty($data[11])) {
                                $d4 = number_format(str_replace(' ', '', (str_replace(',', '', $data[7]))), 2);
                            } else {
                                $d4 = '';
                            }

                            if ($tf == 'sublau')
                            {
                                if ($num == 0) {
                                    $result = mysql_query("INSERT INTO table_otherbenefits() VALUES (NULL,'$date','$data[3]','$name','$pos','','','','','','','',1,'','','','','',1,'$bdate','$d1','$d2','','$d3',1)");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                } elseif ($num > 0) {
                                    $result = mysql_query("UPDATE table_otherbenefits SET Sublau_date = '$bdate', Subsistence_allowance = '$d1', Laundry_allowance = '$d2', Sublau_withtax = '$d3', Sublau_pmpc = '', Sublau_Status = 1 WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                            }
                        }
                    } 
                    elseif ($_POST['bene'] == 'lon')
                    {
                        if ($data[3] != '') {
                            $sql = mysql_query("SELECT * FROM table_otherbenefits WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                            $num = mysql_num_rows($sql);

                            $query = mysql_query("SELECT * from table_empinfo A LEFT JOIN table_position B ON A.Position = B.position_id WHERE Employee_Id = '$data[3]'");
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

                            if (!empty($data[4])) {
                                $d1 = number_format(str_replace(' ', '', (str_replace(',', '', $data[4]))), 2);
                            } else {
                                $d1 = '';
                            }
                            if (!empty($data[7])) {
                                $d2 = number_format(str_replace(' ', '', (str_replace(',', '', $data[7]))), 2);
                            } else {
                                $d2 = '';
                            }
                            if (!empty($data[8])) {
                                $d3 = number_format(str_replace(' ', '', (str_replace(',', '', $data[8]))), 2);
                            } else {
                                $d3 = '';
                            }

                            if ($tf == 'lon') {
                                if ($num == 0) {
                                    $result = mysql_query("INSERT INTO table_otherbenefits() VALUES (NULL,'$date','$data[3]','$name','$pos','','','','$bdate','$d1','$d2','$d3',1,'','','','','',1,'','','','','',1)");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                } elseif ($num > 0) {
                                    $result = mysql_query("UPDATE table_otherbenefits SET Longevity_date = '$bdate', Longevity_pay = '$d1', Longevity_pmpc = '$d2', Longevity_withtax = '$d3', Longevity_Status = 1 WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                            }
                        }
                    }
                    elseif ($_POST['bene'] == 'haz')
                    {

                        if ($data[3] != '') {
                            $sql = mysql_query("SELECT * FROM table_otherbenefits WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                            $num = mysql_num_rows($sql);

                            $query = mysql_query("SELECT * from table_empinfo A LEFT JOIN table_position B ON A.Position = B.position_id WHERE Employee_Id = '$data[3]'");
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

                            if (!empty($data[4])) {
                                $d1 = number_format(str_replace(' ', '', (str_replace(',', '', $data[4]))), 2);
                            } else {
                                $d1 = '';
                            }
                            if (!empty($data[7])) {
                                $d2 = number_format(str_replace(' ', '', (str_replace(',', '', $data[7]))), 2);
                            } else {
                                $d2 = '';
                            }
                            if (!empty($data[8])) {
                                $d3 = number_format(str_replace(' ', '', (str_replace(',', '', $data[8]))), 2);
                            } else {
                                $d3 = '';
                            }
                            if (!empty($data[9])) {
                                $d4 = number_format(str_replace(' ', '', (str_replace(',', '', $data[9]))), 2);
                            } else {
                                $d4 = '';
                            }

                            if ($tf == 'haz') {
                                if ($num == 0) {
                                    $result = mysql_query("INSERT INTO table_otherbenefits() VALUES (NULL,'$date','$data[3]','$name','$pos','','','','','','','',1,'$bdate','$d1','$d2','$d3','$d4',1,'','','','','',1)");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                } elseif ($num > 0) {
                                    $result = mysql_query("UPDATE table_otherbenefits SET Hazard_date = '$bdate', Hazard_pay = '$d1', Hazard_pmpc = '$d2', Hazard_copea = '$d3', Hazard_withtax = '$d4', Hazard_Status = 1 WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                            }
                        }
                    }
                    else if($_POST['bene'] == 'pera')
                    {
                        if ($data[3] != '') {
                            $sql = mysql_query("SELECT * FROM table_otherbenefits WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                            $num = mysql_num_rows($sql);

                            $query = mysql_query("SELECT * from table_empinfo A LEFT JOIN table_position B ON A.Position = B.position_id WHERE Employee_Id = '$data[3]'");
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

                            if (!empty($data[4])) {
                                $d1 = number_format(str_replace(' ', '', (str_replace(',', '', $data[4]))), 2);
                            } else {
                                $d1 = '';
                            }
                            if (!empty($data[5])) {
                                $d2 = number_format(str_replace(' ', '', (str_replace(',', '', $data[5]))), 2);
                            } else {
                                $d2 = '';
                            }

                            if ($tf == 'pera') {
                                if ($num == 0) {
                                    $result = mysql_query("INSERT INTO table_otherbenefits() VALUES (NULL,'$date','$data[3]','$name','$pos','$bdate','$data[4]','$data[5]','','','','',1,'','','','','',1,'','','','','',1)");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                } elseif ($num > 0) {
                                    $result = mysql_query("UPDATE table_otherbenefits SET Pera_date = '$bdate', Pera = '$d1', Pera_withtax = '$d2' WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                            }
                        }

                    }
                }
            }
            echo $tf;
        }
        else
        {
            echo 'wrong file';
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