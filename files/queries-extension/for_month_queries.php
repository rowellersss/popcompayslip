<?php
include '../includes/session.php';
include '../includes/dbcon.php';

//LONGEVITY PAY//
$longevity = mysql_query("SELECT Date_covered, Emp_no, Longevity_date, Longevity_pay, Longevity_pmpc, Longevity_withtax, Longevity_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%'");
$longevity1A = mysql_query("SELECT Date_covered, Emp_no, Longevity_date, Longevity_pay, Longevity_pmpc, Longevity_withtax, Longevity_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%'");
$longevity1B_a = mysql_query("SELECT Date_covered, Emp_no, Longevity_date, Longevity_pay, Longevity_pmpc, Longevity_withtax, Longevity_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%'");
$longevity1B_b = mysql_query("SELECT Date_covered, Emp_no, Longevity_date, Longevity_pay, Longevity_pmpc, Longevity_withtax, Longevity_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%'");
$longevity2A = mysql_query("SELECT Date_covered, Emp_no, Longevity_date, Longevity_pay, Longevity_pmpc, Longevity_withtax, Longevity_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%'");
$longevity2B_a = mysql_query("SELECT Date_covered, Emp_no, Longevity_date, Longevity_pay, Longevity_pmpc, Longevity_withtax, Longevity_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%'");
$longevity2B_b = mysql_query("SELECT Date_covered, Emp_no, Longevity_date, Longevity_pay, Longevity_pmpc, Longevity_withtax, Longevity_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%'");
//HAZARD PAY//
$hazard = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard1A = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard1B_a = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard1B_b = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard1B_c = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard2A = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard2B_a = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard2B_b = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
$hazard2B_c = mysql_query("SELECT Date_covered, Emp_no, Hazard_date, Hazard_pay, Hazard_pmpc, Hazard_copea, Hazard_withtax, Hazard_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Hazard_date LIKE '$date_covered%'");
//SUBLAU ALLOWANCE//
$subslaund = mysql_query("SELECT Date_covered, Emp_no, Sublau_date, Subsistence_allowance, Laundry_allowance, Sublau_pmpc, Sublau_withtax, Sublau_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Sublau_date LIKE '$date_covered%'");
$subslaund1A = mysql_query("SELECT Date_covered, Emp_no, Sublau_date, Subsistence_allowance, Laundry_allowance, Sublau_pmpc, Sublau_withtax, Sublau_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Sublau_date LIKE '$date_covered%'");
$subslaund1B_a = mysql_query("SELECT Date_covered, Emp_no, Sublau_date, Subsistence_allowance, Laundry_allowance, Sublau_pmpc, Sublau_withtax, Sublau_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Sublau_date LIKE '$date_covered%'");
$subslaund1B_b = mysql_query("SELECT Date_covered, Emp_no, Sublau_date, Subsistence_allowance, Laundry_allowance, Sublau_pmpc, Sublau_withtax, Sublau_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Sublau_date LIKE '$date_covered%'");
$subslaund2A = mysql_query("SELECT Date_covered, Emp_no, Sublau_date, Subsistence_allowance, Laundry_allowance, Sublau_pmpc, Sublau_withtax, Sublau_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Sublau_date LIKE '$date_covered%'");
$subslaund2B_a = mysql_query("SELECT Date_covered, Emp_no, Sublau_date, Subsistence_allowance, Laundry_allowance, Sublau_pmpc, Sublau_withtax, Sublau_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Sublau_date LIKE '$date_covered%'");
$subslaund2B_b = mysql_query("SELECT Date_covered, Emp_no, Sublau_date, Subsistence_allowance, Laundry_allowance, Sublau_pmpc, Sublau_withtax, Sublau_Status FROM table_otherbenefits WHERE Emp_no = '$empid' AND Sublau_date LIKE '$date_covered%'");

?>