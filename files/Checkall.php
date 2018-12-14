<?php
	include '../includes/session.php';
	include '../includes/dbcon.php';

	if($_REQUEST['type'] == 'not_special')
	{
		$year = $_REQUEST['year'];
	    $month = $_REQUEST['month'];
	  	
	  	mysql_query("UPDATE table_payslip SET verified = 'Yes' WHERE year_covered = '$year' AND month_covered LIKE '%$month%'");
	}
	elseif($_REQUEST['type'] == 'special')
	{
		$year = $_REQUEST['year'];
	    $month = $_REQUEST['month'];
	  	
	  	mysql_query("UPDATE table_specialpayroll SET verified = 'Yes' WHERE year_covered = '$year' AND month_covered LIKE '%$month%'");
	}

?>