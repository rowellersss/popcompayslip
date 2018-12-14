<?php
include "../includes/dbcon.php";

$filename1 = $_FILES['file']['tmp_name'];
if($_FILES['file']['name'])
{
	$filename = explode('.', $_FILES['file']['name']);
	if(strtoupper($filename[count($filename) - 1]) == 'CSV')
	{
		$lines = file($_FILES['file']['tmp_name']);
		$file = fopen($filename1, "r");
		$id = null;
        $d1 = '';

        $year_covered = $_POST['year'];
        $month_covered = $_POST['month'];
        $dcov = $year_covered.'-'.$month_covered;
        $cutoff1 = date('Y-m', strtotime($_POST['indate1']));
        $cutoff2 = date('Y-m', strtotime($_POST['indate2']));

        if($dcov == $cutoff1 AND $dcov == $cutoff2)
        {
        	while(($data = fgetcsv($file, 1000, ',')) != FALSE)
        	{
        		$in1 = date('F d', strtotime($_POST['indate1']));
        		$in2 = date('d', strtotime($_POST['indate2']));
        		$ct = $in1.'-'.$in2;

        		if(is_numeric($data[0]))
        		{
        			$id = $data[3];

        			$query0 = mysql_query("SELECT * FROM table_specialpayroll WHERE Emp_no = '$id' AND year_covered = '$year_covered' AND month_covered = '$month_covered'");
        			
        			if(mysql_num_rows($query0) <= 0)
        			{
        				$query = mysql_query("SELECT * from table_empinfo A LEFT JOIN table_position B ON A.Position = B.position_id WHERE Employee_Id = $id");
        				$row = mysql_fetch_assoc($query);

        				$string = trim($row['Middlename']);
        				if($string == '' || ctype_space($string))
        				{
        					$name = strtoupper(trim($row['Lastname'])) . ', ' . strtoupper(trim($row['Firstname']));
        				}
        				elseif($string != '' || !ctype_space($string))
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
        				
        				$result = mysql_query("INSERT INTO table_specialpayroll() VALUES('', '$year_covered', '$month_covered', '$data[0]', '$name', '$pos', '$id', '$data[4]', '$ct', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'No', '$date_uploaded')") or die(mysql_error());
        			}
	        		
        		}
        		

    			if(!empty($data[5]) && $data[2] != 'TOTAL' && $data[5] != 'COMPENSATIONS' && $data[5] != 'SALARY')
        		{
        			$query1 = mysql_query("SELECT * FROM table_specialpayroll WHERE Emp_no = $id AND year_covered = '$year_covered' AND month_covered = '$month_covered'");
        			
        			if(mysql_num_rows($query1) > 0)
        			{
        				$row1 = mysql_fetch_assoc($query1);
        				if(empty($row1['Adj_periodcovered']) && empty($row1['Adj_periodcovered2']))
        				{
	        				$result = mysql_query("UPDATE table_specialpayroll SET Adj_periodcovered = '$data[5]', Pera1 = '$data[6]', Salaries_wagesreg = '$data[7]', Total_deduction = '$data[28]', Net_amount = '$data[29]' WHERE Emp_no = '$id'");

	        				if (!$result)
	                        {
	                            die('Invalid query: ' . mysql_error());
	                        }
        				}
        				elseif(!empty($row1['Adj_periodcovered']) && empty($row1['Adj_periodcovered2']))
        				{
        					$result = mysql_query("UPDATE table_specialpayroll SET In_date2 = '$ct', Adj_periodcovered2 = '$data[5]', Pera2 = '$data[6]', Salaries_wagesreg2 = '$data[7]', Lwop = '$data[8]', Salaries_withtax = '$data[9]', GSIS_rlip = '$data[10]', GSIS_ioliprem = '$data[11]', GSIS_uoliloan = '$data[12]', GSIS_consoloan = '$data[13]', GSIS_calamityloan = '$data[14]', GSIS_emergloan = '$data[15]', GSIS_educassistloan = '$data[16]', GSIS_umidca = '$data[17]', PAGIBIG_premium = '$data[18]', PAGIBIG_MPL = '$data[19]', PHILH_cont = '$data[20]', LBP_mobsalloanser = '$data[22]', COPEA_dues = '$data[25]', COPEA_specialloan = '$data[26]', PMPC_capital = '$data[27]', PMPC_loan = '$data[28]', Total_deduction2 = '$data[29]', Net_amount2 = '$data[30]' WHERE Emp_no = '$id'");

        					if (!$result)
	                        {
	                            die('Invalid query: ' . mysql_error());
	                        }
        				}
        				elseif(!empty($row1['Adj_periodcovered']) && !empty($row1['Adj_periodcovered2']))
        				{
        					$result = mysql_query("UPDATE table_specialpayroll SET In_date2 = '$ct', Adj_periodcovered2 = '$data[5]', Pera2 = '$data[6]', Salaries_wagesreg2 = '$data[7]', Lwop = '$data[8]', Salaries_withtax = '$data[9]', GSIS_rlip = '$data[10]', GSIS_ioliprem = '$data[11]', GSIS_uoliloan = '$data[12]', GSIS_consoloan = '$data[13]', GSIS_calamityloan = '$data[14]', GSIS_emergloan = '$data[15]', GSIS_educassistloan = '$data[16]', GSIS_umidca = '$data[17]', PAGIBIG_premium = '$data[18]', PAGIBIG_MPL = '$data[19]', PHILH_cont = '$data[20]', LBP_mobsalloanser = '$data[22]', COPEA_dues = '$data[25]', COPEA_specialloan = '$data[26]', PMPC_capital = '$data[27]', PMPC_loan = '$data[28]', Total_deduction2 = '$data[29]', Net_amount2 = '$data[30]' WHERE Emp_no = '$id'");

        					if (!$result)
	                        {
	                            die('Invalid query: ' . mysql_error());
	                        }
        				}
        			}
        		}
        	}
        	echo $dcov;
        }
        else
        {
        	echo 'date not matched';
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