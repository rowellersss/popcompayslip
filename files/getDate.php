<?php
include '../includes/dbcon.php';

// print_r($_POST);exit;
if(isset($_POST['selectDate']))
{
	$date = $_POST['date'];
	$_SESSION['INTRA_DATE'] = $date;
	print_r($date);
}

if(isset($_POST['viewPayroll']))
{
	// print_r($_POST);exit;
	$payroll = $_POST['payroll'];
	$date = $_POST['date'];

	if($payroll == 'salary'){
		$code = 'GUpGz2C*b+yt';
		echo $code;
	}elseif($payroll == 'benefits'){
		$code = 'XYNLDLNd7ts;';
		echo $code;
	}elseif($payroll == 'special'){
		$code = 'SAF+]>3M57{;';
		echo $code;
	}
}
?>