<?php

include '../includes/session.php';
include '../includes/dbcon.php';
require_once('../lib/pdf/mpdf.php');
include '../includes/functions.php';

if (isset($_SESSION['INTRA_ACCESS'])) {
    if ($_SESSION['INTRA_ACCESS'] != 'TRUE') {
        header("Location: PayslipList.php");
    }
}
if (isset($_SESSION['INTRA_ACCESS2'])) {
    if ($_SESSION['INTRA_ACCESS2'] != 'TRUE') {
        header("Location: ViewEmployeePayslip.php");
    }
}

if (!isset($_REQUEST['empid'])) {

    if (isset($_REQUEST['id'])) {
        $empid = mysql_real_escape_string($_REQUEST['id']);
    } else {
        $empid = mysql_real_escape_string($_SESSION['INTRA_EMP_ID']);
    }

    if (isset($_REQUEST['Mdate'])) {
        $date = explode('-', $_REQUEST['Mdate']);
        $year = $date[0];
        $month = $date[1];
        $date_covered = $year.'-'.$month;
        $sql = mysql_query("SELECT * FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$year' AND month_covered = '$month' AND verified = 'Yes'");
        $sql2 = mysql_query("SELECT * FROM table_otherbenefits WHERE Emp_no = '$empid' AND Longevity_date LIKE '$date_covered%' OR Hazard_date LIKE '$date_covered%' OR Sublau_date LIKE '$date_covered%'");    
        $sql5 = mysql_query("SELECT * FROM table_otherbenefits WHERE Emp_no = '$empid'");
        include_once 'queries-extension/for_month_queries.php';
        $bonuses = mysql_query("SELECT * FROM table_otherbonuses WHERE emp_no = '$empid' AND bonus_status = 1 AND date_covered LIKE '$date_covered%'");

        $numrowsLngvty = mysql_num_rows($longevity);
        $numrowsHzrd = mysql_num_rows($hazard);
        $numrowsSl = mysql_num_rows($subslaund);
        $bonus = mysql_fetch_assoc($bonuses);
        $bonusrow = mysql_num_rows($bonuses);

    } elseif (isset($_REQUEST['Adate'])) {
        $year = explode('-',$_REQUEST['Adate']);
        $year = $year[0];
        $sql = mysql_query("SELECT *, FORMAT(SUM(REPLACE(Salaries_withtax, ',','')), 2) as Salaries_withtax, FORMAT(SUM(REPLACE(GSIS_rlip, ',','')), 2) as GSIS_rlip, FORMAT(SUM(REPLACE(GSIS_ioliprem, ',','')), 2) as GSIS_ioliprem"
                . ", FORMAT(SUM(REPLACE(GSIS_uoliloan, ',','')), 2) as GSIS_uoliloan, FORMAT(SUM(REPLACE(GSIS_oli, ',','')), 2) as GSIS_oli, FORMAT(SUM(REPLACE(GSIS_consoloan, ',','')), 2) as GSIS_consoloan"
                . ", FORMAT(SUM(REPLACE(GSIS_emergloan, ',','')), 2) as GSIS_emergloan, FORMAT(SUM(REPLACE(GSIS_policyloanreg, ',','')), 2) as GSIS_policyloanreg, FORMAT(SUM(REPLACE(GSIS_policyloanoptional, ',','')), 2) as GSIS_policyloanoptional"
                . ", FORMAT(SUM(REPLACE(GSIS_educassistloan, ',','')), 2) as GSIS_educassistloan, FORMAT(SUM(REPLACE(GSIS_umidca, ',','')), 2) as GSIS_umidca, FORMAT(SUM(REPLACE(PAGIBIG_premium, ',','')), 2) as PAGIBIG_premium"
                . ", FORMAT(SUM(REPLACE(PAGIBIG_MP2, ',','')), 2) as PAGIBIG_MP2, FORMAT(SUM(REPLACE(PAGIBIG_MPL, ',','')), 2) as PAGIBIG_MPL, FORMAT(SUM(REPLACE(PAGIBIG_calamityloan, ',','')), 2) as PAGIBIG_calamityloan"
                . ", FORMAT(SUM(REPLACE(PHILH_cont, ',','')), 2) as PHILH_cont, FORMAT(SUM(REPLACE(PHILH_arrears, ',','')), 2) as PHILH_arrears, FORMAT(SUM(REPLACE(PMPC_capital, ',','')), 2) as PMPC_capital"
                . ", FORMAT(SUM(REPLACE(PMPC_loan, ',','')), 2) as PMPC_loan, FORMAT(SUM(REPLACE(COPEA_dues, ',','')), 2) as COPEA_dues, FORMAT(SUM(REPLACE(LBP_mobsalloanser, ',','')), 2) as LBP_mobsalloanser, FORMAT(SUM(REPLACE(Total_deduction, ',','')), 2) as Total_deduction, FORMAT(SUM(REPLACE(Net_amount, ',','')), 2) as Net_amount"
                . ", FORMAT(SUM(REPLACE(Net_amount2, ',','')), 2) as Net_amount2 FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$year' AND verified = 'Yes'");

        $sql2 = mysql_query("SELECT Date_covered, Pera_date, Longevity_date, Longevity_Status, Hazard_date, Hazard_Status,
                            Sublau_date, Sublau_Status,
                            FORMAT(SUM(REPLACE(Pera, ',','')), 2) AS Pera,
                            FORMAT(SUM(REPLACE(Pera_withtax, ',','')), 2) AS Pera_withtax,
                            FORMAT(SUM(REPLACE(Longevity_pay, ',','')), 2)AS Longevity_pay,
                            FORMAT(SUM(REPLACE(Longevity_pmpc, ',','')), 2) AS Longevity_pmpc,
                            FORMAT(SUM(REPLACE(Longevity_withtax, ',','')), 2) AS Longevity_withtax,
                            FORMAT(SUM(REPLACE(Hazard_pay, ',','')), 2) AS Hazard_pay,
                            FORMAT(SUM(REPLACE(Hazard_pmpc, ',','')), 2) AS Hazard_pmpc,
                            FORMAT(SUM(REPLACE(Hazard_copea, ',','')), 2) AS Hazard_copea,
                            FORMAT(SUM(REPLACE(Hazard_withtax, ',','')), 2) AS Hazard_withtax,
                            FORMAT(SUM(REPLACE(Subsistence_allowance, ',','')), 2) AS Subsistence_allowance,
                            FORMAT(SUM(REPLACE(Laundry_allowance, ',','')), 2) AS Laundry_allowance,
                            FORMAT(SUM(REPLACE(Sublau_pmpc, ',','')), 2) AS Sublau_pmpc,
                            FORMAT(SUM(REPLACE(Sublau_withtax, ',','')), 2) AS Sublau_withtax
                            FROM table_otherbenefits
                            WHERE Emp_no = '$empid'
                            AND Pera_date LIKE '$year%'
                            OR Longevity_date LIKE '$year%'
                            OR Hazard_date LIKE '$year%'
                            OR Sublau_date LIKE '$year%'");
        // echo $sql2;exit;

        $bonuses = mysql_query("SELECT * FROM table_otherbonuses WHERE emp_no = '$empid' AND bonus_status = 1 AND date_covered LIKE '$year%'");
        $bonus = mysql_fetch_assoc($bonuses);
        $bonusrow = mysql_num_rows($bonuses);

    } elseif (isset($_REQUEST['Ydate'])) {
        $date = explode('-', $_REQUEST['Ydate']);
        $date2 = explode('-', $_REQUEST['Ydate2']);
        $year = $date2[0];
        $month = $date2[1];
        $datee1 = $_REQUEST['Ydate'];
        $datee2 = $_REQUEST['Ydate2'];
        $sql = mysql_query("SELECT *, FORMAT(SUM(REPLACE(Salaries_withtax, ',','')), 2) as Salaries_withtax, FORMAT(SUM(REPLACE(GSIS_rlip, ',','')), 2) as GSIS_rlip, FORMAT(SUM(REPLACE(GSIS_ioliprem, ',','')), 2) as GSIS_ioliprem"
                . ", FORMAT(SUM(REPLACE(GSIS_uoliloan, ',','')), 2) as GSIS_uoliloan, FORMAT(SUM(REPLACE(GSIS_oli, ',','')), 2) as GSIS_oli, FORMAT(SUM(REPLACE(GSIS_consoloan, ',','')), 2) as GSIS_consoloan"
                . ", FORMAT(SUM(REPLACE(GSIS_emergloan, ',','')), 2) as GSIS_emergloan, FORMAT(SUM(REPLACE(GSIS_policyloanreg, ',','')), 2) as GSIS_policyloanreg, FORMAT(SUM(REPLACE(GSIS_policyloanoptional, ',','')), 2) as GSIS_policyloanoptional"
                . ", FORMAT(SUM(REPLACE(GSIS_educassistloan, ',','')), 2) as GSIS_educassistloan, FORMAT(SUM(REPLACE(GSIS_umidca, ',','')), 2) as GSIS_umidca, FORMAT(SUM(REPLACE(PAGIBIG_premium, ',','')), 2) as PAGIBIG_premium"
                . ", FORMAT(SUM(REPLACE(PAGIBIG_MP2, ',','')), 2) as PAGIBIG_MP2, FORMAT(SUM(REPLACE(PAGIBIG_MPL, ',','')), 2) as PAGIBIG_MPL, FORMAT(SUM(REPLACE(PAGIBIG_calamityloan, ',','')), 2) as PAGIBIG_calamityloan"
                . ", FORMAT(SUM(REPLACE(PHILH_cont, ',','')), 2) as PHILH_cont, FORMAT(SUM(REPLACE(PHILH_arrears, ',','')), 2) as PHILH_arrears, FORMAT(SUM(REPLACE(PMPC_capital, ',','')), 2) as PMPC_capital"
                . ", FORMAT(SUM(REPLACE(PMPC_loan, ',','')), 2) as  PMPC_loan, FORMAT(SUM(REPLACE(COPEA_dues, ',','')), 2) as COPEA_dues, FORMAT(SUM(REPLACE(LBP_salaryloanreg, ',','')), 2) as LBP_salaryloanreg"
                . ", FORMAT(SUM(REPLACE(LBP_mobsalloanser, ',','')), 2) as LBP_mobsalloanser, FORMAT(SUM(REPLACE(Total_deduction, ',','')), 2) as Total_deduction, FORMAT(SUM(REPLACE(Net_amount, ',','')), 2) as Net_amount"
                . ", FORMAT(SUM(REPLACE(Net_amount2, ',','')), 2) as Net_amount2 FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$year' AND month_covered BETWEEN '01' AND '$month'");
        // print_r($date2);
        // exit;

        $sql2 = mysql_query("SELECT *, FORMAT(SUM(REPLACE(Longevity_pay, ',','')), 2) as Longevity_pay, FORMAT(SUM(REPLACE(Longevity_withtax, ',','')), 2) as Longevity_withtax"
                . ", FORMAT(SUM(REPLACE(Hazard_pay, ',','')), 2) as Hazard_pay, FORMAT(SUM(REPLACE(Hazard_withtax, ',','')), 2) as Hazard_withtax"
                . ", FORMAT(SUM(REPLACE(Subsistence_allowance, ',','')), 2) as Subsistence_allowance, FORMAT(SUM(REPLACE(Laundry_allowance, ',','')), 2) as Laundry_allowance"
                . ", FORMAT(SUM(REPLACE(Sublau_withtax, ',','')), 2) as Sublau_withtax FROM table_otherbenefits WHERE Emp_no = '$empid' AND Date_covered BETWEEN '$datee1' AND '$datee2'");
    } elseif (isset($_REQUEST['Rdate'])) {
        
        $date = explode('-', $_REQUEST['Rdate']);
        $year = $date[0];
        $month1 = $date[1];
        $date2 = explode('-', $_REQUEST['Rdate2']);
        $month2 = $date2[1];
        $datee1 = $_REQUEST['Rdate'];
        $datee2 = $_REQUEST['Rdate2'];
        $sql = mysql_query("SELECT *, FORMAT(SUM(REPLACE(Salaries_withtax, ',','')), 2) as Salaries_withtax, FORMAT(SUM(REPLACE(GSIS_rlip, ',','')), 2) as GSIS_rlip, FORMAT(SUM(REPLACE(GSIS_ioliprem, ',','')), 2) as GSIS_ioliprem"
                . ", FORMAT(SUM(REPLACE(GSIS_uoliloan, ',','')), 2) as GSIS_uoliloan, FORMAT(SUM(REPLACE(GSIS_oli, ',','')), 2) as GSIS_oli, FORMAT(SUM(REPLACE(GSIS_consoloan, ',','')), 2) as GSIS_consoloan"
                . ", FORMAT(SUM(REPLACE(GSIS_emergloan, ',','')), 2) as GSIS_emergloan, FORMAT(SUM(REPLACE(GSIS_policyloanreg, ',','')), 2) as GSIS_policyloanreg, FORMAT(SUM(REPLACE(GSIS_policyloanoptional, ',','')), 2) as GSIS_policyloanoptional"
                . ", FORMAT(SUM(REPLACE(GSIS_educassistloan, ',','')), 2) as GSIS_educassistloan, FORMAT(SUM(REPLACE(GSIS_umidca, ',','')), 2) as GSIS_umidca, FORMAT(SUM(REPLACE(PAGIBIG_premium, ',','')), 2) as PAGIBIG_premium"
                . ", FORMAT(SUM(REPLACE(PAGIBIG_MP2, ',','')), 2) as PAGIBIG_MP2, FORMAT(SUM(REPLACE(PAGIBIG_MPL, ',','')), 2) as PAGIBIG_MPL, FORMAT(SUM(REPLACE(PAGIBIG_calamityloan, ',','')), 2) as PAGIBIG_calamityloan"
                . ", FORMAT(SUM(REPLACE(PHILH_cont, ',','')), 2) as PHILH_cont, FORMAT(SUM(REPLACE(PHILH_arrears, ',','')), 2) as PHILH_arrears, FORMAT(SUM(REPLACE(PMPC_capital, ',','')), 2) as PMPC_capital"
                . ", FORMAT(SUM(REPLACE(PMPC_loan, ',','')), 2) as  PMPC_loan, FORMAT(SUM(REPLACE(COPEA_dues, ',','')), 2) as COPEA_dues, FORMAT(SUM(REPLACE(LBP_salaryloanreg, ',','')), 2) as LBP_salaryloanreg"
                . ", FORMAT(SUM(REPLACE(LBP_mobsalloanser, ',','')), 2) as LBP_mobsalloanser, FORMAT(SUM(REPLACE(Total_deduction, ',','')), 2) as Total_deduction, FORMAT(SUM(REPLACE(Net_amount, ',','')), 2) as Net_amount"
                . ", FORMAT(SUM(REPLACE(Net_amount2, ',','')), 2) as Net_amount2 FROM table_payslip WHERE Emp_no = '$empid' AND year_covered = '$year' AND month_covered BETWEEN '$month1' AND '$month2'");
        // print_r($sql);
        // exit;

        $sql2 = mysql_query("SELECT *, FORMAT(SUM(REPLACE(Longevity_pay, ',','')), 2) as Longevity_pay, FORMAT(SUM(REPLACE(Longevity_withtax, ',','')), 2) as Longevity_withtax"
                . ", FORMAT(SUM(REPLACE(Hazard_pay, ',','')), 2) as Hazard_pay, FORMAT(SUM(REPLACE(Hazard_withtax, ',','')), 2) as Hazard_withtax"
                . ", FORMAT(SUM(REPLACE(Subsistence_allowance, ',','')), 2) as Subsistence_allowance, FORMAT(SUM(REPLACE(Laundry_allowance, ',','')), 2) as Laundry_allowance"
                . ", FORMAT(SUM(REPLACE(Sublau_withtax, ',','')), 2) as Sublau_withtax FROM table_otherbenefits WHERE Emp_no = '$empid' AND Date_covered BETWEEN '$datee1' AND '$datee2'");
    }


    $num = mysql_num_rows($sql2);
    $sql0 = mysql_query("select * from table_empinfo where Employee_Id = '$empid'");
    $row0 = mysql_fetch_assoc($sql0);



//    $date = mysql_real_escape_string($_REQUEST['date']);
//    $sql = mysql_query("select * from table_payslip where Emp_no = '$empid' AND Adj_periodcovered = '$date'");
//    $sql3 = mysql_query("select * from table_empinfo where Employee_Id = '$empid'");
} elseif (isset($_REQUEST['empid'])) {
    $empid = mysql_real_escape_string($_REQUEST['empid']);
    $date = mysql_real_escape_string($_REQUEST['date']);
    $sql = mysql_query("select * from table_payslip where MD5(Emp_no) = '$empid' AND Adj_periodcovered = '$date'");
    $sql0 = mysql_query("select * from table_empinfo where MD5(Employee_Id) = '$empid'");
    $row0 = mysql_fetch_assoc($sql0);
}

$row = mysql_fetch_assoc($sql);
// print_r($sql2);
// exit;

$dc = explode(" ", $row['Adj_periodcovered']);
$mon = date("F", strtotime($dc[0]));
$yearr = $dc[2];
$dc2 = explode(" ", $row['Adj_periodcovered2']);
$mon2 = date("F", strtotime($dc2[0]));



$row2 = mysql_fetch_assoc($sql2);
$row5 = mysql_fetch_assoc($sql5);


$pos = $row0['Position'];
$sql3 = mysql_query("Select * from table_position where position_id = '$pos'");
$row3 = mysql_fetch_assoc($sql3);
$div = $row3['division_id'];
$sql4 = mysql_query("Select * from table_division where division_id = '$div'");
$row4 = mysql_fetch_assoc($sql4);
$emp_div = $row4['division_description'];

$na1 = str_replace(',', '', $row['Net_amount']);
$na2 = str_replace(',', '', $row['Net_amount2']);
$naT = $na1 + $na2;

//----Benefits---//
$lon = ($row2['Longevity_Status'] != 0 ? (!empty($row2['Longevity_pay']) ? str_replace(',', '', $row2['Longevity_pay']) : 0.00) : "");
$lonTax = ($row2['Longevity_Status'] != 0 ? (!empty($row2['Longevity_pay']) ? str_replace(',', '', $row2['Longevity_pay']) : 0.00) : "");
$haz = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_pay']) ? str_replace(',', '', $row2['Hazard_pay']) : 0.00) : "");
$hazTax = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_pay']) ? str_replace(',', '', $row2['Hazard_pay']) : 0.00) : "");
$sub = ($row2['Sublau_Status'] != 0 ? (!empty($row2['Subsistence_allowance']) ? str_replace(',', '', $row2['Subsistence_allowance']) : 0) : "");
$lau = ($row2['Sublau_Status'] != 0 ? (!empty($row2['Laundry_allowance']) ? str_replace(',', '', $row2['Laundry_allowance']) : 0.00) : "");
$subLauTax = ($row2['Sublau_Status'] != 0 ? (!empty($row2['Subsistence_allowance']) && !empty($row2['Laundry_allowance']) ? str_replace(',', '', $row2['Sublau_withtax']) : 0.00) : "");

//----New Computations for Benefits---//
if($numrowsLngvty > 1){
    while($dataLngvty = mysql_fetch_assoc($longevity)){
        $lonPay1 += str_replace(',','',$dataLngvty['Longevity_pay']);
        $lonPmpc1 += ($dataLngvty['Longevity_Status'] != 0 ? (!empty($dataLngvty['Longevity_pmpc']) ? str_replace(',', '', $dataLngvty['Longevity_pmpc']) : 0.00) : "");
        $lonWTax1 += ($dataLngvty['Longevity_Status'] != 0 ? (!empty($dataLngvty['Longevity_withtax']) ? str_replace(',', '', $dataLngvty['Longevity_withtax']) : 0.00) : "");
    }
}else{
    $lonPay1 = str_replace(',','',$row2['Longevity_pay']);
    $lonPmpc1 = ($row2['Longevity_Status'] != 0 ? (!empty($row2['Longevity_pmpc']) ? str_replace(',', '', $row2['Longevity_pmpc']) : 0.00) : "");
    $lonWTax1 = ($row2['Longevity_Status'] != 0 ? (!empty($row2['Longevity_withtax']) ? str_replace(',', '', $row2['Longevity_withtax']) : 0.00) : "");
}
if($numrowsHzrd > 1){
    while($dataHzrd = mysql_fetch_assoc($hazard)){
        $hazPay1 += str_replace(',','',$dataHzrd['Hazard_pay']);
        $hazPmpc1 += ($dataHzrd['Hazard_Status'] != 0 ? (!empty($dataHzrd['Hazard_pmpc']) ? str_replace(',', '', $dataHzrd['Hazard_pmpc']) : 0.00) : "");
        $hazCopea1 += ($dataHzrd['Hazard_Status'] != 0 ? (!empty($dataHzrd['Hazard_copea']) ? str_replace(',', '', $dataHzrd['Hazard_copea']) : 0.00) : "");
        $hazWTax1 += ($dataHzrd['Hazard_Status'] != 0 ? (!empty($dataHzrd['Hazard_withtax']) ? str_replace(',', '', $dataHzrd['Hazard_withtax']) : 0.00) : "");
    }
}else{
    $hazPay1 = str_replace(',','',$row2['Hazard_pay']);
    $hazPmpc1 = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_pmpc']) ? str_replace(',', '', $row2['Hazard_pmpc']) : 0.00) : "");
    $hazCopea1 = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_copea']) ? str_replace(',', '', $row2['Hazard_copea']) : 0.00) : "");
    $hazWTax1 = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_withtax']) ? str_replace(',', '', $row2['Hazard_withtax']) : 0.00) : "");
}
if($numrowsSl > 1){
    $sublau = $sub + $lau;
    while($dataSl = mysql_fetch_assoc($subslaund)){
        $subs += str_replace(',','',$dataSl['Subsistence_allowance']);
        $launds += str_replace(',','',$dataSl['Laundry_allowance']);
        $sLpay1 = $subs + $launds;
        $sublauPmpc1 += ($dataSl['Sublau_Status'] != 0 ? (!empty($dataSl['Sublau_pmpc']) ? str_replace(',', '', $dataSl['Sublau_pmpc']) : 0.00) : "");
        $sublauWTax1 += ($dataSl['Sublau_Status'] != 0 ? (!empty($dataSl['Sublau_withtax']) ? str_replace(',', '', $dataSl['Sublau_withtax']) : 0.00) : "");
    }
}else{
    $subs = str_replace(',','',$row2['Subsistence_allowance']);
    $launds = str_replace(',','',$row2['Laundry_allowance']);
    $sLpay1 = $subs + $launds;
    $sublauPmpc1 = ($row2['Sublau_Status'] != 0 ? (!empty($row2['Sublau_pmpc']) ? str_replace(',', '', $row2['Sublau_pmpc']) : 0.00) : "");
    $sublauWTax1 = ($row2['Sublau_Status'] != 0 ? (!empty($row2['Sublau_withtax']) ? str_replace(',', '', $row2['Sublau_withtax']) : 0.00) : "");
}
//----Bonuses---//
$pbb = ($bonus['bonus_status'] != 0 ? (!empty($bonus['pbb']) ? str_replace(',', '', $bonus['pbb']) : 0.00) : "");
$thirteenthmonth = ($bonus['bonus_status'] != 0 ? (!empty($bonus['13thmonth']) ? str_replace(',', '', $bonus['13thmonth']) : 0.00) : "");
$fourteenthmonth = ($bonus['bonus_status'] != 0 ? (!empty($bonus['14thmonth']) ? str_replace(',', '', $bonus['14thmonth']) : 0.00) : "");
$cna = ($bonus['bonus_status'] != 0 ? (!empty($bonus['cna']) ? str_replace(',', '', $bonus['cna']) : 0.00) : "");
$pei = ($bonus['bonus_status'] != 0 ? (!empty($bonus['pei']) ? str_replace(',', '', $bonus['pei']) : 0.00) : "");
$cash_gift = ($bonus['bonus_status'] != 0 ? (!empty($bonus['cash_gift']) ? str_replace(',', '', $bonus['cash_gift']) : 0.00) : "");
$loyalty = ($bonus['bonus_status'] != 0 ? (!empty($bonus['loyalty']) ? str_replace(',', '', $bonus['loyalty']) : 0.00) : "");
$clothing_allowance = ($bonus['bonus_status'] != 0 ? (!empty($bonus['clothing_allowance']) ? str_replace(',', '', $bonus['clothing_allowance']) : 0.00) : "");
$anniv_bonus = ($bonus['bonus_status'] != 0 ? (!empty($bonus['anniv_bonus']) ? str_replace(',', '', $bonus['anniv_bonus']) : 0.00) : "");
$others_bonuses = ($bonus['bonus_status'] != 0 ? (!empty($bonus['others_bonuses']) ? str_replace(',', '', $bonus['others_bonuses']) : 0.00) : "");

$bonusesTotal = $pbb + $thirteenthmonth + $fourteenthmonth + $cna + $pei + $cash_gift + $loyalty + $clothing_allowance + $anniv_bonus + $others_bonuses;

$lonNet = $lon - $lonTax;
$hazNet = $haz - $hazTax;
$sublau = $sub + $lau;
$sublauNet = $sublau - $subLauTax;


$pera = 2000;
$grTotal = $lonPay1 + $hazPay1 + $sLpay1 + $pera + $bonusesTotal;
$wtTotal = $lonTax + $hazTax + $subLauTax;
$obTotal = $lonNet + $hazNet + $sublauNet + $pera;

$tnthp = $naT + $obTotal;

//-------------------------------------- OFFICIAL PAYSLIP ----------------------------------//
 
if (isset($_REQUEST['id'])) {

//---------------------- FIRST COPY --------------------------//

    $html .= '<div class="mleftcol">';
    $html .= '<div>';
    $html .= '<table>';
    $html .= '<tr>';
    $html .= '<td rowspan="2"><img src="../images/logo.png"></td>';
    $html .= '<td colspan="3" style="font-weight: bold; font-size: 14px; text-align: center;">PAYSLIP</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="text-align: center; width: 33%; font-size: 11.5px;">Form No.PYS-AD-FM19</td>';
    $html .= '<td style="text-align: center; width: 33%; font-size: 11.5px;">Version No. 01</td>';
    $html .= '<td style="text-align: center; width: 33%; font-size: 11.5px;">Effective: March 1, 2018</td>';
    $html .= '</tr>';
    $html .= '</table>';
    $html .= '</div><br>';
    $html .= '<table style="border: none;">';
    $html .= '<tr>';
    if($_REQUEST['cat'] == 'Summary' OR $_REQUEST['cat'] == 'Payslip'){
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Name : ' . $row['Name'] . '</td>';
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Division/Unit : ' . $emp_div . '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Employee No. : ' . $row['Emp_no'] . '</td>';
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Position : ' . $row['Position'] . '</td>';
    }elseif($_REQUEST['cat'] == 'Benefits'){
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Name : ' . $row5['Name'] . '</td>';
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Division/Unit : ' . $emp_div . '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Employee No. : ' . $row5['Emp_no'] . '</td>';
        $html .= '<td class="tdfont" style="border: none;">&nbsp;Position : ' . $row5['Position'] . '</td>';
    }
    $html .= '</tr>';
    $html .= '</table>';
    $html .= '<hr style="width: 100%;"><div style="display: block; margin-top: 0px; margin-left: 0px; margin-right: 0px; height: 62%;">';
    if(isset($_REQUEST['Mdate'])){
        if($_REQUEST['Summary'] OR $_REQUEST['Payslip']){
            $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">Period Covered : ' . $mon . ' ' . $row['year_covered'] . '</p>';
        }else{
            $d = explode('-', $_REQUEST['Mdate']);
            $mon_benefits = date('F', mktime(null, null, null, $d[1], 1));
            $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">Period Covered : ' . $mon_benefits . ' ' . $d[0] . '</p>';
        }
    }else if(isset($_REQUEST['Adate'])){
        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;"> Year Covered : ' . $_REQUEST['Adate'] .'</p>';
    }else if(isset($_REQUEST['Ydate'])){
        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;"> Period Covered : ' . $mon . ' ' . $row['year_covered'] .'</p>';
    }elseif (isset($_REQUEST['Rdate'])){
        $date = explode('-', $_REQUEST['Rdate']);
        $year = $date[0];
        $month1 = $date[1];
        $month1 = date('F', mktime(null, null, null, $month1, 1));
        $date2 = explode('-', $_REQUEST['Rdate2']);
        $month2 = $date2[1];
        $month2 = date('F', mktime(null, null, null, $month2, 1));

        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;"> Period Covered : ' . $month1 . ' - ' . $month2 . ' ' . $year . '</p>';
    }

    
    if (isset($_REQUEST['cat']) && $_REQUEST['cat'] == 'Benefits') {
        
        $html .= '<table style="border: 1px solid #303030; margin: auto; width: 80%;">';
        $html .= '<tr>';
        $html .= '<td colspan="1" class="tdfontt" style="width: 180px; border-right: none; text-align: center;"><b>Other Benefits</b></td><td colspan="1" class="tdfontt" style="width: 100px; border-right: none;"><b>Month Covered</b></td><td colspan="1"></td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="1" class="tdfontt">P.E.R.A:</td><td class="tdfontt"></td><td class="tdfontt" style="text-align: right;">' . number_format(str_replace(' ', '', $pera), 2) . '</td>';
        $html .= '</tr><tr>';
        if(isset($_REQUEST['Mdate']))
        {
            if($numrowsLngvty >  1){
                while($lngvty = mysql_fetch_assoc($longevity1A)){
                    $html .= '<tr><td colspan="1" class="tdfontt">Longevity Pay</td><td class="tdfontt">' . date('M. Y', strtotime($lngvty['Date_covered'])). '</td><td class="tdfontt" style="text-align: right;">' . ($lngvty['Longevity_pay']) . '</td></tr>';
                    $lonPay += str_replace(',', '', $lngvty['Longevity_pay']);
                }
            }else{
                $html .= '<tr><td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? ($row2['Longevity_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Longevity_date']))) : "") . '</td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
                    $lonPay = str_replace(',', '', $row2['Longevity_pay']);
            }

            if($numrowsHzrd > 1){
                while($hzrd = mysql_fetch_assoc($hazard1A)){
                    $html .= '<tr><td colspan="1" class="tdfont">Hazard Pay</td><td class="tdfontt">' . date('M. Y', strtotime($hzrd['Date_covered'])). '</td><td class="tdfont" style="text-align: right;">' . ($hzrd['Hazard_pay']) . '</td></tr>';
                    $hazPay += str_replace(',', '', $hzrd['Hazard_pay']);
                }
            }else{
                $html .= '<tr><td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? ($row2['Longevity_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Longevity_date']))) : "") . '</td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
                    $lonPay = str_replace(',', '', $row2['Longevity_pay']);
            }

            if($numrowsSl > 1){
                while($sL = mysql_fetch_assoc($subslaund1A)){
                    $s = str_replace(',', '', $sL['Subsistence_allowance']);
                    $l = str_replace(',', '', $sL['Laundry_allowance']);
                    $sl = $s + $l;
                    $html .= '<tr><td colspan="1" class="tdfont">Subs. & Laund.</td><td class="tdfontt">'.date('M. Y', strtotime($sL['Date_covered'])).'</td><td class="tdfont" style="text-align: right;">' . ($sL['Sublau_Status'] != 0 ? number_format(str_replace(' ','', $sl), 2) : "") . '</td></tr>';
                    $sLpay += $sl;
                }
            }


        }
            // $html .= '<tr><td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? ($row2['Hazard_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Hazard_date']))) : "") . '</td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            // $html .= '</tr><tr>';
            // $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? ($row2['Sublau_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Sublau_date']))) : "") . '</td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        // }
        // elseif(isset($_REQUEST['Ydate']))
        // {
        //     $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? ($row2['Longevity_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Longevity_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
        //     $html .= '</tr><tr>';
        //     $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? ($row2['Hazard_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Hazard_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
        //     $html .= '</tr><tr>';
        //     $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? ($row2['Sublau_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Sublau_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        // }
        // elseif(isset($_REQUEST['Adate']))
        // {
        //     $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? $_REQUEST['Adate'] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
        //     $html .= '</tr><tr>';
        //     $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? $_REQUEST['Adate'] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
        //     $html .= '</tr><tr>';
        //     $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? $_REQUEST['Adate'] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        // }
        // elseif(isset($_REQUEST['Rdate']))
        // {
        //     $date = explode('-', $_REQUEST['Rdate']);
        //     $year = $date[0];
        //     $month1 = $date[1];
        //     $date2 = explode('-', $_REQUEST['Rdate2']);
        //     $month2 = $date2[1];
            
        //     $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
        //     $html .= '</tr><tr>';
        //     $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
        //     $html .= '</tr><tr>';
        //     $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        // }
        
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfontt">Others</td><td class="tdfontt"></td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfontt" style="border-right: none;">Benefits Sub-Total: </td><td class="tdfontt" style="text-align: right;">' . number_format(str_replace(' ', '', $grTotal), 2) . '</td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="3" class="tdfontt"><b>Less Deductions:</b></td>';
        $html .= '</tr><tr>';

        $lonsumD = ($row2['Longevity_Status'] == 1 ? $lonsum : 0);
        $hazsumD = ($row2['Hazard_Status'] == 1 ? $hazsum : 0);
        $sublausumD = ($row2['Sublau_Status'] == 1 ? $sublausum : 0);
        $deductionTotal = $lonsumD + $hazsumD + $sublausumD;
        $nobOfficial = $grTotal - $deductionTotal;

        $html .= '<tr>';
        $html .= '<td colspan="2" class="tdfontt">Deductions Sub-Total: </td><td class="tdfontt" style="text-align: right;">' . number_format($deductionTotal, 2) . '</td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfontt" style="border-right: none;">Net Other Benefits</td><td class="tdfontt" style="border-left: none; text-align: right; padding-right: 0px;">' . number_format(str_replace(' ', '', $nobOfficial), 2) . '</td>';
        $html .= '</tr>';
        $html .= '</table>';

        $html .= '<div style="margin-top: 25px;">';
        $html .= '<div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
        $html .= 'Certified Correct:';
        $html .= '</div>';
        $html .= '<div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">';
        $html .= 'Federico O. Boncato<br>Administrative Officer V';
        $html .= '</div>';
        $html .= '</div>';
    } else {
        $html .= ($_REQUEST['cat'] == 'Summary' ? '<div class="leftcol">' : '<div style="margin: auto; width: 70%;">'); //$num != 0 && 
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td class="tdfont">Gross Basic Monthly Salary</td>';
        $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Adj_basicmonsal']) . '</td>';
        $html .= '</tr>';

        $html .= '<tr><td class="tdfont" colspan="2" ><b>Less Deductions: </b></td></tr>';

        if ($row['Salaries_withtax'] != "" && $row['Salaries_withtax'] != 0) {
            $html .= '<tr><td class="tdfont">Withholding Tax</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['Salaries_withtax']))), 2) . '</td></tr>';
        }
        if (($row['GSIS_rlip'] != "" && $row['GSIS_rlip'] != 0) || ($row['GSIS_ioliprem'] != "" && $row['GSIS_ioliprem'] != 0) || ($row['GSIS_uoliloan'] != "" && $row['GSIS_uoliloan'] != 0) || ($row['GSIS_oli'] != "" && $row['GSIS_oli'] != 0) || ($row['GSIS_consoloan'] != "" && $row['GSIS_consoloan'] != 0) || ($row['GSIS_emergloan'] != "" && $row['GSIS_emergloan'] != 0) || ($row['GSIS_policyloanreg'] != "" && $row['GSIS_policyloanreg'] != 0) || ($row['GSIS_policyloanoptional'] != "" && $row['GSIS_policyloanoptional'] != 0) || ($row['GSIS_educassistloan'] != "" && $row['GSIS_educassistloan'] != 0) || ($row['GSIS_umidca'] != "" && $row['GSIS_umidca'] != 0)) {
            // $html .= '<tr><td class="tdfont">GSIS</td><td></td></tr>';
        }
        if ($row['GSIS_rlip'] != "" && $row['GSIS_rlip'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - RLIP</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_rlip']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_ioliprem'] != "" && $row['GSIS_ioliprem'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - UOLI Premium</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_ioliprem']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_uoliloan'] != "" && $row['GSIS_uoliloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - UOLI Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_uoliloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_oli'] != "" && $row['GSIS_oli'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - OLI</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_oli']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_consoloan'] != "" && $row['GSIS_consoloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Conso Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_consoloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_emergloan'] != "" && $row['GSIS_emergloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Emergency Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_emergloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_policyloanreg'] != "" && $row['GSIS_policyloanreg'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Policy Loan Regular</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_policyloanreg']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_policyloanoptional'] != "" && $row['GSIS_policyloanoptional'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Policy Loan Optional</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_policyloanoptional']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_educassistloan'] != "" && $row['GSIS_educassistloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Educational Assist. Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_educassistloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_umidca'] != "" && $row['GSIS_umidca'] != 0) {
            $html .= '<tr><td>GSIS - UMID CA</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_umidca']))), 2) . '</td></tr>';
        }
        if (($row['PAGIBIG_premium'] != "" && $row['PAGIBIG_premium'] != 0) || ($row['PAGIBIG_MP2'] != "" && $row['PAGIBIG_MP2'] != 0) || ($row['PAGIBIG_MPL'] != "" && $row['PAGIBIG_MPL'] != 0) || ($row['PAGIBIG_calamityloan'] != "" && $row['PAGIBIG_calamityloan'] != 0)) {
        }
        if ($row['PAGIBIG_premium'] != "" && $row['PAGIBIG_premium'] != 0) {
            $html .= '<tr><td class="tdfont">PAG-IBIG - Premium</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_premium']))), 2) . '</td></tr>';
        }
        if ($row['PAGIBIG_MP2'] != "" && $row['PAGIBIG_MP2'] != 0) {
            $html .= '<tr><td class="tdfont">PAG-IBIG - MP2</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_MP2']))), 2) . '</td></tr>';
        }
        if ($row['PAGIBIG_MPL'] != "" && $row['PAGIBIG_MPL'] != 0) {
            $html .= '<tr><td class="tdfont">PAG-IBIG - MPL</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_MPL']))), 2) . '</td></tr>';
        }
        if ($row['PAGIBIG_calamityloan'] != "" && $row['PAGIBIG_calamityloan'] != 0) {
            $html .= '<tr><td class="tdfont">PAG-IBIG - Calamity Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_calamityloan']))), 2) . '</td></tr>';
        }
        if (($row['PHILH_cont'] != "" && $row['PHILH_cont'] != 0) || ($row['PHILH_arrears'] != "" && $row['PHILH_arrears'] != 0)) {
        }
        if ($row['PHILH_cont'] != "" && $row['PHILH_cont'] != 0) {
            $html .= '<tr><td class="tdfont">Philhealth - Contribution</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PHILH_cont']))), 2) . '</td></tr>';
        }
        if ($row['PHILH_arrears'] != "" && $row['PHILH_arrears'] != 0) {
            $html .= '<tr><td class="tdfont">Philhealth - A/R(Arrears Nov./Dec.2016)</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PHILH_arrears']))), 2) . '</td></tr>';
        }
        if (($row['PMPC_capital'] != "" && $row['PMPC_capital'] != 0) || ($row['PMPC_loan'] != "" && $row['PMPC_loan'] != 0)) {
        }
        if ($row['PMPC_capital'] != "" && $row['PMPC_capital'] != 0) {
            $html .= '<tr><td class="tdfont">PMPC - Capital</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PMPC_capital']))), 2) . '</td></tr>';
        }
        if ($row['PMPC_loan'] != "" && $row['PMPC_loan'] != 0) {
            $html .= '<tr><td class="tdfont">PMPC - Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PMPC_loan']))), 2) . '</td></tr>';
        }
        if ($row['COPEA_dues'] != "" && $row['COPEA_dues'] != 0) {
            $html .= '<tr><td class="tdfont">COPEA Dues</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['COPEA_dues']))), 2) . '</td></tr>';
        }
        if (($row['LBP_salaryloanreg'] != "" && $row['LBP_salaryloanreg'] != 0) || ($row['LBP_mobsalloanser'] != "" && $row['LBP_mobsalloanser'] != 0)) {
        }
        if ($row['LBP_salaryloanreg'] != "" && $row['LBP_salaryloanreg'] != 0) {
            $html .= '<tr><td class="tdfont">LBP - Salary Loan Regular</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['LBP_salaryloanreg']))), 2) . '</td></tr>';
        }
        if ($row['LBP_mobsalloanser'] != "" && $row['LBP_mobsalloanser'] != 0) {
            $html .= '<tr><td class="tdfont">LBP - Mobile Salary Loan Saver</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['LBP_mobsalloanser']))), 2) . '</td></tr>';
        }
        if ($row['Total_deduction'] != "" && $row['Total_deduction'] != 0) {
        $html .= '<tr><td class="tdfont"><b>Total Deductions<b> </td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['Total_deduction']))), 2) . '</td></tr>';
        }

//$html .= '<tr><td style="border-top: 2px solid black;"><b>Net Amount Due</b></td><td style="border-top: 2px solid black;"><b>' . number_format(str_replace(' ', '', $row['Net_amount']), 2) . '</b></td></tr>';

        // $html .= '<tr>';
        // $html .= '</tr>';
        $html .= '<tr>';
        if(isset($_REQUEST['Adate'])){
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;1-15 of every month</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;16-31 of every month</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
        }else if(isset($_REQUEST['Rdate'])){
            $date = explode('-', $_REQUEST['Rdate']);
            $year = $date[0];
            $month1 = $date[1];
            $month1 = date('F', mktime(null, null, null, $month1, 1));
            $date2 = explode('-', $_REQUEST['Rdate2']);
            $month2 = $date2[1];
            $month2 = date('F', mktime(null, null, null, $month2, 1));

            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $month1 . ' - ' . $month2 . ' '. str_replace(',', '', $dc[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $month1 . ' - ' . $month2 . ' ' . str_replace(',', '', $dc2[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
        }else{
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $mon . ' ' . str_replace(',', '', $dc[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $mon2 . ' ' . str_replace(',', '', $dc2[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
        }
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td class="tdfont"><b>Net Salaries</b></td><td class="tdfont" style="text-align: right;">' . number_format($naT, 2) . '</td>';
        $html .= '</tr>';
        $html .= '</table>';

        // $html .= '';
        // $lonPmpc1 = ($row2['Longevity_Status'] != 0 ? (!empty($row2['Longevity_pmpc']) ? str_replace(',', '', $row2['Longevity_pmpc']) : 0.00) : "");
        // $lonWTax1 = ($row2['Longevity_Status'] != 0 ? (!empty($row2['Longevity_withtax']) ? str_replace(',', '', $row2['Longevity_withtax']) : 0.00) : "");
        // $hazPmpc1 = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_pmpc']) ? str_replace(',', '', $row2['Hazard_pmpc']) : 0.00) : "");
        // $hazCopea1 = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_copea']) ? str_replace(',', '', $row2['Hazard_copea']) : 0.00) : "");
        // $hazWTax1 = ($row2['Hazard_Status'] != 0 ? (!empty($row2['Hazard_withtax']) ? str_replace(',', '', $row2['Hazard_withtax']) : 0.00) : "");
        // $sublauPmpc1 = ($row2['Sublau_Status'] != 0 ? (!empty($row2['Sublau_pmpc']) ? str_replace(',', '', $row2['Sublau_pmpc']) : 0.00) : "");
        // $sublauWTax1 = ($row2['Sublau_Status'] != 0 ? (!empty($row2['Sublau_withtax']) ? str_replace(',', '', $row2['Sublau_withtax']) : 0.00) : "");

        $deductionSubTotal1 = $lonPmpc1 + $lonWTax1 + $hazPmpc1 + $hazCopea1 + $hazWTax1 + $sublauPmpc1 + $sublauWTax1;
        $netOtherBenefitsTotal1 = $grTotal - $deductionSubTotal1;
        $takeHomePay = $naT + $netOtherBenefitsTotal1;

        if($_REQUEST['Mdate']){
            $html .= '<table style="border: 2.5px solid #303030; margin-top: 10px; margin-bottom: 30px;">';
            $html .= '<tr>';
            $html .= '<td class="tdfont" colspan="2" style="padding: 1.7px 0px 1.7px 10px;"><b>Summary (NET)</b></td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Salaries</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format($naT, 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Other Benefits</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format(str_replace(' ', '', $netOtherBenefitsTotal1), 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px; font-style: 10.5px;"><b>NET TAKE HOME PAY</b></td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px; font-size: 10.5px;"><b>' . number_format($takeHomePay, 2) . '&nbsp;</b></td>';
            $html .= '</tr>';
            $html .= '</table>';
        }elseif($_REQUEST['Adate']){
            $html .= '<table style="border: 2.5px solid #303030; margin-top: 10px; margin-bottom: 30px;">';
            $html .= '<tr>';
            $html .= '<td class="tdfont" colspan="2" style="padding: 1.7px 0px 1.7px 10px;"><b>Summary (NET)</b></td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Salaries</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format($naT, 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Other Benefits</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format(str_replace(' ', '', $netOtherBenefitsTotal1), 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px; font-style: 10.5px;"><b>ANNUAL NET SALARY</b></td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px; font-size: 10.5px;"><b>' . number_format($takeHomePay, 2) . '&nbsp;</b></td>';
            $html .= '</tr>';
            $html .= '</table>';
        }

        if($_REQUEST['cat'] == 'Summary')
        {
            $html .= '<div style="margin-top: 7px;">';
            $html .= '  <div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            $html .= '      Certified Correct:';
            $html .= '  </div>';
            $html .= '  <div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            $html .= '      Federico O. Boncato<br>Administrative Officer V';
            $html .= '  </div>';
            $html .= '</div>';
        }

        $html .= '</div>';

        if ($_REQUEST['cat'] == 'Summary') {
        //$num != 0 && 
        } else {
            $html .= '<div style="margin-top: 30px;">';
            $html .= '  <div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            $html .= '      Certified Correct:';
            $html .= '  </div>';
            $html .= '  <div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            $html .= '      Federico O. Boncato<br>Administrative Officer V';
            $html .= '  </div>';
            $html .= '</div>';
        }
        //---------------------- SUMMARY -----------------------//

        if ($_REQUEST['cat'] == 'Summary') { //$num != 0 &&
            $html .= '<div class="rightcol">';
            $html .= '<table style="border: 1px solid #303030;">';
            $html .= '<tr><td colspan="4" class="tdfont" style="width: 100px; border-right: none;"><b>Other Benefits:</b></td></tr>';
            $html .= '<tr><td colspan="2" class="tdfont">P.E.R.A</td><td colspan="2" class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', $pera), 2) . '</td></tr>';
            if($numrowsLngvty >  1){
                while($lngvty = mysql_fetch_assoc($longevity1A)){
                    $html .= '<tr><td colspan="2" class="tdfont">Longevity Pay - ' . date('M. Y', strtotime($lngvty['Date_covered'])). '</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($lngvty['Longevity_pay']) . '</td></tr>';
                    $lonPay += str_replace(',', '', $lngvty['Longevity_pay']);
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Longevity_pay'] != '' ? '<tr><td colspan="2" class="tdfont">Longevity Pay - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") : ""). '</td></tr>';
                    $lonPay = str_replace(',', '', $row2['Longevity_pay']);
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Longevity_pay'] != '' ? '<tr><td colspan="2" class="tdfont">Longevity Pay</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") : ''). '</td></tr>';
                }
            }
            if($numrowsHzrd > 1){
                while($hzrd = mysql_fetch_assoc($hazard1A)){
                    $html .= '<tr><td colspan="2" class="tdfont">Hazard Pay - ' . date('M. Y', strtotime($hzrd['Date_covered'])). '</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($hzrd['Hazard_pay']) . '</td></tr>';
                    $hazPay += str_replace(',', '', $hzrd['Hazard_pay']);
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Hazard_pay'] ? '<tr><td colspan="2" class="tdfont">Hazard Pay - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") : '') . '</td></tr>';
                    $hazPay = str_replace(',', '', $row2['Hazard_pay']);    
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Hazard_pay'] ? '<tr><td colspan="2" class="tdfont">Hazard Pay</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") : '') . '</td></tr>';
                }
            }
            if($numrowsSl > 1){
                while($sL = mysql_fetch_assoc($subslaund1A)){
                    $s = str_replace(',', '', $sL['Subsistence_allowance']);
                    $l = str_replace(',', '', $sL['Laundry_allowance']);
                    $sl = $s + $l;
                    $html .= '<tr><td colspan="2" class="tdfont">Subs. & Laund. - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($sL['Sublau_Status'] != 0 ? number_format(str_replace(' ','', $sl), 2) : "") . '</td></tr>';
                    $sLpay += $sl;
                }
            }else{
                $s = str_replace(',', '', $row2['Subsistence_allowance']);
                $l = str_replace(',', '', $row2['Laundry_allowance']);
                $sl = $s + $l;
                if($_REQUEST['Mdate']){
                    $html .= ($sl != '' ? '<tr><td colspan="2" class="tdfont">Subs. & Laund. - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sl), 2) : "") : '') . '</td></tr>';
                    $sLpay = $sl;
                }elseif($_REQUEST['Adate']){
                    $html .= ($sl != '' ? '<tr><td colspan="2" class="tdfont">Subsistence/Laundry Allowance</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") : '') . '</td></tr>';
                }
            }
            $grTotal = $lonPay1 + $hazPay1 + $sLpay1 + $pera + $bonusesTotal;
            // print_r($grTotal);exit;
            //-----------------Other Bonuses/Benefits----------------//
            if($_REQUEST['Mdate'] OR $_REQUEST['Adate']){
                $html .= '</tr><tr>';
                $html .= ($bonusrow != 0 ? '<td colspan="4" class="tdfont">Others:</td>' : '');
                $html .= '</tr><tr>';
                $html .= '</tr>';
                $html .= ($bonus['bonus_status'] != 0 && $bonus['pbb'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;PBB</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['pbb'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['13thmonth'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;13th Month Pay</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['13thmonth'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['14thmonth'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;14th Month Pay</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['14thmonth'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['cna'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;CNA</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['cna'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['pei'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;PEI</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['pei'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['cash_gift'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Cash Gift</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['cash_gift'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['loyalty'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Loyalty</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['loyalty'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['clothing_allowance'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Clothing Allowance</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['clothing_allowance'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['anniv_bonus'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Anniv. Bonus</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['anniv_bonus'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['others_bonuses'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Other Bonuses</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['others_bonuses'].'</td></tr>' : '');
                
            }
                $html .= '<tr>';
                $html .= '<td colspan="2" class="tdfont" style="border-right: none;"><b>Benefits Sub-Total </b></td><td colspan="2" class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', $grTotal), 2) . '</td>';
                $html .= '</tr><tr>';
                $html .= '<td colspan="4" class="tdfont"><b>Less Deductions:</b></td>';
                $html .= '</tr><tr>';
            
                $deductionSubTotal = $lonPmpc1 + $lonWTax1 + $hazPmpc1 + $hazCopea1 + $hazWTax1 + $sublauPmpc1 + $sublauWTax1;
                $netOtherBenefitsTotal = $grTotal - $deductionSubTotal;
                $takeHomePay = $naT + $netOtherBenefitsTotal1;
                if($numrowsLngvty > 1){
                    while($lngvty = mysql_fetch_assoc($longevity1B_a)){
                        $html .= ($lngvty['Longevity_Status'] != 0 && $lngvty['Longevity_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity PMPC - '.date('M. Y', strtotime($lngvty['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $lngvty['Longevity_pmpc'] . '</td>' : '');
                    }
                    while($lngvty = mysql_fetch_assoc($longevity1B_b)){   
                        $html .= ($lngvty['Longevity_Status'] != 0 && $lngvty['Longevity_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity W/Tax - '.date('M. Y', strtotime($lngvty['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $lngvty['Longevity_withtax'] . '</td>' : '');
                    }
                }else{
                    if($_REQUEST['Mdate']){
                        $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_pmpc'] . '</td>' : '');
                        $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).' </td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_withtax'] . '</td>' : '');
                    }elseif($_REQUEST['Adate']){
                        $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity PMPC</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_pmpc'] . '</td>' : '');
                        $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity W/Tax</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_withtax'] . '</td>' : '');
                    }
                }
                if($numrowsHzrd > 1){
                    while($hzrd = mysql_fetch_assoc($hazard1B_a)){
                        $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard PMPC - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_pmpc'] . '</td></tr>' : '');
                    }
                    while($hzrd = mysql_fetch_assoc($hazard1B_b)){
                        $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_copea'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard COPEA - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_copea'] . '</td></tr>' : '');
                    }
                    while($hzrd = mysql_fetch_assoc($hazard1B_c)){
                        $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard W/Tax - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_withtax'] . '</td></tr>' : '');
                    }
                }else{
                    if($_REQUEST['Mdate']){
                        $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_pmpc'] . '</td></tr>' : '');
                        $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_copea'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard COPEA - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_copea'] . '</td></tr>' : '');
                        $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_withtax'] . '</td></tr>' : '');
                    }elseif($_REQUEST['Adate']){
                        $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard PMPC</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_pmpc'] . '</td></tr>' : '');
                        $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_copea'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard COPEA</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_copea'] . '</td></tr>' : '');
                        $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard W/Tax</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_withtax'] . '</td></tr>' : '');
                    }
                }
                if($numrowsSl > 1){
                    while($sL = mysql_fetch_assoc($subslaund1B_a)){
                        $html .= ($sL['Sublau_Status'] != 0 && $sL['Sublau_pmpc'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. PMPC - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $sL['Sublau_pmpc'] . '</td></tr>' : '');
                    }
                    while($sL = mysql_fetch_assoc($subslaund1B_b)){
                        $html .= ($sL['Sublau_Status'] != 0 && $sL['Sublau_withtax'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. W/Tax - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $sL['Sublau_withtax'] . '</td></tr>' : '');
                    }
                }else{
                    if($_REQUEST['Mdate']){
                        $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_pmpc'] . '</td></tr>' : '');
                        $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_withtax'] . '</td></tr>' : '');
                    }elseif($_REQUEST['Adate']){
                        $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. PMPC</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_pmpc'] . '</td></tr>' : '');
                        $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. W/Tax</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_withtax'] . '</td></tr>' : '');
                    }
                }
            

            $html .= '<tr>';
            $html .= '<td colspan="2" class="tdfont"><b>Deductions Sub-Total </b></td><td colspan="2" class="tdfont" style="text-align: right;">' . number_format($deductionSubTotal, 2) . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="3" class="tdfont" style="border-right: none;"><b>Net Other Benefits</b></td><td class="tdfont" style="border-left: none; text-align: right;">' . number_format(str_replace(' ', '', $netOtherBenefitsTotal), 2) . '</td>';
            $html .= '</tr>';
            $html .= '</table>';

            // $html .= '<div style="margin-top: 10px;">';
            // $html .= '<div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            // $html .= 'Certified Correct:';
            // $html .= '</div>';
            // $html .= '<div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            // $html .= 'Federico O. Boncato<br>Administrative Officer V';
            // $html .= '</div>';
            // $html .= '</div>';
            $html .= '</div>';
        }
    }

    $html .= '</div>';

    // $html .= '<hr style="width: 100%; margin-top: 10px;">';

    $html .= '</div>';

    $html .= '<div class="vr">&nbsp;</div>';

//------------------------SECOND COPY---------------------------//

    $html .= '<div class="mrightcol">';
    $html .= '<div>';
    $html .= '<table>';
    $html .= '<tr>';
    $html .= '<td rowspan="2"><img src="../images/logo.png"></td>';
    $html .= '<td colspan="3" style="font-weight: bold; font-size: 14px; text-align: center;">PAYSLIP</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="text-align: center; width: 33%; font-size: 11.5px;">Form No.PYS-AD-FM19</td>';
    $html .= '<td style="text-align: center; width: 33%; font-size: 11.5px;">Version No. 01</td>';
    $html .= '<td style="text-align: center; width: 33%; font-size: 11.5px;">Effective: March 1, 2018</td>';
    $html .= '</tr>';
    $html .= '</table>';
    $html .= '</div><br>';
    $html .= '<table style="border: none;">';
    $html .= '<tr>';
    $html .= '<td class="tdfont" style="border: none;">&nbsp;Name : ' . $row['Name'] . '</td>';
    $html .= '<td class="tdfont" style="border: none;">&nbsp;Division/Unit : ' . $emp_div . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td class="tdfont" style="border: none;">&nbsp;Employee No. : ' . $row['Emp_no'] . '</td>';
    $html .= '<td class="tdfont" style="border: none;">&nbsp;Position : ' . $row['Position'] . '</td>';
    $html .= '</tr>';
    $html .= '</table>';

    $html .= '<hr style="width: 100%;"><div style="display: block; margin-top: 0px; margin-left: 0px; margin-right: 0px; height: 62%;">';

    if(isset($_REQUEST['Mdate'])){
        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">Period Covered : ' . $mon . ' ' . $row['year_covered'] . '</p>';
    }else if(isset($_REQUEST['Adate'])){
        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;"> Year Covered : ' . $_REQUEST['Adate'] .'</p>';
    }else if(isset($_REQUEST['Ydate'])){
        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;"> Period Covered : ' . $mon . ' ' . $row['year_covered'] .'</p>';
    }elseif (isset($_REQUEST['Rdate'])){
        $date = explode('-', $_REQUEST['Rdate']);
        $year = $date[0];
        $month1 = $date[1];
        $month1 = date('F', mktime(null, null, null, $month1, 1));
        $date2 = explode('-', $_REQUEST['Rdate2']);
        $month2 = $date2[1];
        $month2 = date('F', mktime(null, null, null, $month2, 1));

        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;"> Period Covered : ' . $month1 . ' - ' . $month2 . ' ' . $year . '</p>';
    }

    if (isset($_REQUEST['cat']) && $_REQUEST['cat'] == 'Benefits') {

        $html .= '<table style="border: 1px solid #303030; margin: auto; width: 80%;">';
        $html .= '<tr>';
        $html .= '<td colspan="1" class="tdfontt" style="width: 180px; border-right: none; text-align: center;"><b>Other Benefits</b></td><td colspan="1" class="tdfontt" style="width: 100px; border-right: none;"><b>As Of</b></td><td colspan="2"></td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="1" class="tdfontt">P.E.R.A:</td><td class="tdfontt"><td></td></td><td class="tdfontt" style="text-align: right;">' . number_format(str_replace(' ', '', $pera), 2) . '</td>';
        $html .= '</tr><tr>';
        if(isset($_REQUEST['Mdate']))
        {
            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? ($row2['Longevity_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Longevity_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? ($row2['Hazard_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Hazard_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? ($row2['Sublau_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Sublau_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        elseif(isset($_REQUEST['Ydate']))
        {
            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? ($row2['Longevity_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Longevity_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? ($row2['Hazard_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Hazard_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? ($row2['Sublau_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Sublau_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        elseif(isset($_REQUEST['Adate']))
        {
            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? $_REQUEST['Adate'] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? $_REQUEST['Adate'] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? $_REQUEST['Adate'] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        elseif(isset($_REQUEST['Rdate']))
        {
            $date = explode('-', $_REQUEST['Rdate']);
            $year = $date[0];
            $month1 = $date[1];
            $date2 = explode('-', $_REQUEST['Rdate2']);
            $month2 = $date2[1];
            
            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfontt">Others</td><td class="tdfontt"></td><td></td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfontt" style="border-right: none;">Benefits Sub-Total: </td><td class="tdfontt" style="text-align: right;"></td><td class="tdfontt" style="text-align: right;">' . number_format(str_replace(' ', '', $grTotal), 2) . '</td>';
        $html .= '</tr><tr>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="4" class="tdfontt"><b>Less Deductions:</b></td>';
        $html .= '</tr><tr>';

        //-----------------Longevity-----------------//
        // $londeduExp = explode('+', $row2['Longevity_withtax']);
        // $londeduCount = count($londeduExp);
        // $lonTax = 0;
        // for ($i = 0; $i < $londeduCount; $i++) {
        //     $londed1 = explode('~', $londeduExp[$i]);
        //     if (ctype_space($londed1[0]) || empty($londed1[0])) {
        //         $lonotherDeduc = "";
        //     } else {
        //         $lonotherDeduc = number_format(str_replace(',', '', trim($londed1[0])), 2);
        //     }
        //     if (!empty($row2['Longevity_withtax'])) {
        //         $html .= (stripos(trim($londed1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfontt">Longevity Withholding Tax:</td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? $lonotherDeduc : "") . '</td><td></td>' : '');
        //     } else {
        //         $html .= '<td colspan="2" class="tdfontt">Longevity Withholding Tax:</td><td class="tdfontt" style="text-align: right;"></td><td></td>';
        //     }
        // }
        // $html .= '</tr><tr>';
        // //------------------Hazard-------------------//
        // $hazdeduExp = explode('+', $row2['Hazard_withtax']);
        // $hazdeduCount = count($hazdeduExp);
        // $hazTax = 0;
        // for ($i = 0; $i < $hazdeduCount; $i++) {
        //     $hazded1 = explode('~', $hazdeduExp[$i]);
        //     if (ctype_space($hazded1[0]) || empty($hazded1[0])) {
        //         $hazotherDeduc = "";
        //     } else {
        //         $hazotherDeduc = number_format(str_replace(',', '', trim($hazded1[0])), 2);
        //     }
        //     if (!empty($row2['Hazard_withtax'])) {
        //         $html .= (stripos(trim($hazded1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfontt">Hazard Withholding Tax:</td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? $hazotherDeduc : "") . '</td><td></td>' : '');
        //     } else {
        //         $html .= '<td colspan="2" class="tdfontt">Hazard Withholding Tax:</td><td class="tdfontt" style="text-align: right;"></td><td></td>';
        //     }
        // }
        // $html .= '</tr><tr>';
        // //------------------Subsistence and Laundry-------------------//
        // $sublaudeduExp = explode('+', $row2['Sublau_withtax']);
        // $sublaudeduCount = count($sublaudeduExp);
        // $sublauTax = 0;
        // for ($i = 0; $i < $sublaudeduCount; $i++) {
        //     $sublauded1 = explode('~', $sublaudeduExp[$i]);
        //     if (ctype_space($sublauded1[0]) || empty($sublauded1[0])) {
        //         $sublauotherDeduc = "";
        //     } else {
        //         $sublauotherDeduc = number_format(str_replace(',', '', trim($sublauded1[0])), 2);
        //     }
        //     if (!empty($row2['Sublau_withtax'])) {
        //         $html .= (stripos(trim($sublauded1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfontt">Subsistence and Laundry Withholding Tax:</td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? $sublauotherDeduc : "") . '</td><td></td>' : '');
        //     } else {
        //         $html .= '<td colspan="2" class="tdfontt">Subsistence and Laundry Withholding Tax:</td><td class="tdfontt" style="text-align: right;"></td><td></td>';
        //     }
        // }
        // $html .= '</tr><tr>';
        // $html .= '<td colspan="2" class="tdfontt">Others</td><td class="tdfontt"></td><td></td>';
        // $html .= '</tr>';
        // //----------------Longevity----------------//
        // $lonsum = 0;
        // for ($i = 0; $i < $londeduCount; $i++) {
        //     $londed1 = explode('~', $londeduExp[$i]);
        //     if (ctype_space($londed1[0]) || empty($londed1[0])) {
        //         $lonplainOD = 0;
        //         $lonotherDeduc = "";
        //     } else {
        //         $lonplainOD = str_replace(',', '', trim($londed1[0]));
        //         $lonotherDeduc = number_format(str_replace(',', '', trim($londed1[0])), 2);
        //     }
        //     $html .= ($row2['Longevity_Status'] != 0 && $lonplainOD != 0 ? (stripos(trim($londed1[1]), 'Tax') !== false ? "" : '<tr><td colspan="2" class="tdfontt">' . trim($londed1[1]) . ' (Longevity)</td><td></td><td class="tdfontt" style="text-align: right;">' . $lonotherDeduc . '</td></tr>') : "");
        //     $lonsum = $lonsum + $lonplainOD;
        // }
        // //----------------Hazard-------------------//
        // $hazsum = 0;
        // for ($i = 0; $i < $hazdeduCount; $i++) {
        //     $hazded1 = explode('~', $hazdeduExp[$i]);
        //     if (ctype_space($hazded1[0]) || empty($hazded1[0])) {
        //         $hazplainOD = 0;
        //         $hazotherDeduc = "";
        //     } else {
        //         $hazplainOD = str_replace(',', '', trim($hazded1[0]));
        //         $hazotherDeduc = number_format(str_replace(',', '', trim($hazded1[0])), 2);
        //     }
        //     $html .= ($row2['Hazard_Status'] != 0 && $hazplainOD != 0 ? (stripos(trim($hazded1[1]), 'Tax') !== false ? "" : '<tr><td colspan="2" class="tdfontt">' . trim($hazded1[1]) . ' (Hazard)</td><td></td><td class="tdfontt" style="text-align: right;">' . $hazotherDeduc . '</td></tr>') : "");
        //     $hazsum = $hazsum + $hazplainOD;
        // }
        // //----------------Subsistence & Laundry-------------------//
        // $sublausum = 0;
        // for ($i = 0; $i < $sublaudeduCount; $i++) {
        //     $sublauded1 = explode('~', $sublaudeduExp[$i]);
        //     if (ctype_space($sublauded1[0]) || empty($sublauded1[0])) {
        //         $sublauplainOD = 0;
        //         $sublauotherDeduc = "";
        //     } else {
        //         $sublauplainOD = str_replace(',', '', trim($sublauded1[0]));
        //         $sublauotherDeduc = number_format(str_replace(',', '', trim($sublauded1[0])), 2);
        //     }
        //     $html .= ($row2['Sublau_Status'] != 0 && $sublauplainOD != 0 ? (stripos(trim($sublauded1[1]), 'Tax') !== false || stripos(trim($sublauded1[1]), 'deduction') !== false ? "" : '<tr><td colspan="2" class="tdfontt">' . trim($sublauded1[1]) . ' (Subsistence & Laundry)</td><td></td><td class="tdfontt" style="text-align: right;">' . $sublauotherDeduc . '</td></tr>') : "");
        //     $sublausum = $sublausum + $sublauplainOD;
        // }

        $lonsumD = ($row2['Longevity_Status'] == 1 ? $lonsum : 0);
        $hazsumD = ($row2['Hazard_Status'] == 1 ? $hazsum : 0);
        $sublausumD = ($row2['Sublau_Status'] == 1 ? $sublausum : 0);
        $deductionTotal = $lonsumD + $hazsumD + $sublausumD;
        $nobOfficial = $grTotal - $deductionTotal;

        $html .= '<tr>';
        $html .= '<td colspan="2" class="tdfontt">Deductions Sub-Total: </td><td class="tdfontt" style="text-align: right;"></td><td class="tdfontt" style="text-align: right;">' . number_format($deductionTotal, 2) . '</td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="3" class="tdfontt" style="border-right: none;">Net Other Benefits</td><td class="tdfontt" style="border-left: none; text-align: right; padding-right: 0px;">' . number_format(str_replace(' ', '', $nobOfficial), 2) . '</td>';
        $html .= '</tr>';
        $html .= '</table>';

        $html .= '<div style="margin-top: 25px;">';
        $html .= '<div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
        $html .= 'Certified Correct:';
        $html .= '</div>';
        $html .= '<div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">';
        $html .= 'Federico O. Boncato<br>Administrative Officer V';
        $html .= '</div>';
        $html .= '</div>';
        
    } else {

        $html .= ($_REQUEST['cat'] == 'Summary' ? '<div class="leftcol">' : '<div style="margin: auto; width: 70%;">'); //$num != 0 && 
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td class="tdfont">Gross Basic Monthly Salary</td>';
        $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Adj_basicmonsal']) . '</td>';
        $html .= '</tr>';

        $html .= '<tr>
                    <td class="tdfont" colspan="2" ><b>Less Deductions: </b></td>
                  </tr>';
        
        if ($row['Salaries_withtax'] != "" && $row['Salaries_withtax'] != 0) {
            $html .= '<tr><td class="tdfont">Withholding Tax</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['Salaries_withtax']))), 2) . '</td></tr>';
        }
        if (($row['GSIS_rlip'] != "" && $row['GSIS_rlip'] != 0) || ($row['GSIS_ioliprem'] != "" && $row['GSIS_ioliprem'] != 0) || ($row['GSIS_uoliloan'] != "" && $row['GSIS_uoliloan'] != 0) || ($row['GSIS_oli'] != "" && $row['GSIS_oli'] != 0) || ($row['GSIS_consoloan'] != "" && $row['GSIS_consoloan'] != 0) || ($row['GSIS_emergloan'] != "" && $row['GSIS_emergloan'] != 0) || ($row['GSIS_policyloanreg'] != "" && $row['GSIS_policyloanreg'] != 0) || ($row['GSIS_policyloanoptional'] != "" && $row['GSIS_policyloanoptional'] != 0) || ($row['GSIS_educassistloan'] != "" && $row['GSIS_educassistloan'] != 0) || ($row['GSIS_umidca'] != "" && $row['GSIS_umidca'] != 0)) {
            // $html .= '<tr><td class="tdfont">GSIS</td><td></td></tr>';
        }
        if ($row['GSIS_rlip'] != "" && $row['GSIS_rlip'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - RLIP</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_rlip']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_ioliprem'] != "" && $row['GSIS_ioliprem'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - UOLI Premium</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_ioliprem']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_uoliloan'] != "" && $row['GSIS_uoliloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - UOLI Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_uoliloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_oli'] != "" && $row['GSIS_oli'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - OLI</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_oli']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_consoloan'] != "" && $row['GSIS_consoloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Conso Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_consoloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_emergloan'] != "" && $row['GSIS_emergloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Emergency Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_emergloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_policyloanreg'] != "" && $row['GSIS_policyloanreg'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Policy Loan Regular</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_policyloanreg']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_policyloanoptional'] != "" && $row['GSIS_policyloanoptional'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Policy Loan Optional</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_policyloanoptional']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_educassistloan'] != "" && $row['GSIS_educassistloan'] != 0) {
            $html .= '<tr><td class="tdfont">GSIS - Educational Assist. Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_educassistloan']))), 2) . '</td></tr>';
        }
        if ($row['GSIS_umidca'] != "" && $row['GSIS_umidca'] != 0) {
            $html .= '<tr><td>GSIS - UMID CA</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_umidca']))), 2) . '</td></tr>';
        }
        if (($row['PAGIBIG_premium'] != "" && $row['PAGIBIG_premium'] != 0) || ($row['PAGIBIG_MP2'] != "" && $row['PAGIBIG_MP2'] != 0) || ($row['PAGIBIG_MPL'] != "" && $row['PAGIBIG_MPL'] != 0) || ($row['PAGIBIG_calamityloan'] != "" && $row['PAGIBIG_calamityloan'] != 0)) {
            // $html .= '<tr><td class="tdfont">PAG-IBIG</td><td></td></tr>';
        }
        if ($row['PAGIBIG_premium'] != "" && $row['PAGIBIG_premium'] != 0) {
            $html .= '<tr><td class="tdfont">PAGIBIG - Premium</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_premium']))), 2) . '</td></tr>';
        }
        if ($row['PAGIBIG_MP2'] != "" && $row['PAGIBIG_MP2'] != 0) {
            $html .= '<tr><td class="tdfont">PAGIBIG - MP2</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_MP2']))), 2) . '</td></tr>';
        }
        if ($row['PAGIBIG_MPL'] != "" && $row['PAGIBIG_MPL'] != 0) {
            $html .= '<tr><td class="tdfont">PAGIBIG - MPL</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_MPL']))), 2) . '</td></tr>';
        }
        if ($row['PAGIBIG_calamityloan'] != "" && $row['PAGIBIG_calamityloan'] != 0) {
            $html .= '<tr><td class="tdfont">PAGIBIG - Calamity Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_calamityloan']))), 2) . '</td></tr>';
        }
        if (($row['PHILH_cont'] != "" && $row['PHILH_cont'] != 0) || ($row['PHILH_arrears'] != "" && $row['PHILH_arrears'] != 0)) {
            // $html .= '<tr><td class="tdfont">Philhealth</td><td></td></tr>';
        }
        if ($row['PHILH_cont'] != "" && $row['PHILH_cont'] != 0) {
            $html .= '<tr><td class="tdfont">Philhealth Contribution</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PHILH_cont']))), 2) . '</td></tr>';
        }
        if ($row['PHILH_arrears'] != "" && $row['PHILH_arrears'] != 0) {
            $html .= '<tr><td class="tdfont">Philhealth - A/R(Arrears Nov./Dec.2016)</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PHILH_arrears']))), 2) . '</td></tr>';
        }
        if (($row['PMPC_capital'] != "" && $row['PMPC_capital'] != 0) || ($row['PMPC_loan'] != "" && $row['PMPC_loan'] != 0)) {
            // $html .= '<tr><td class="tdfont">PMPC</td><td></td></tr>';
        }
        if ($row['PMPC_capital'] != "" && $row['PMPC_capital'] != 0) {
            $html .= '<tr><td class="tdfont">PMPC - Capital</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PMPC_capital']))), 2) . '</td></tr>';
        }
        if ($row['PMPC_loan'] != "" && $row['PMPC_loan'] != 0) {
            $html .= '<tr><td class="tdfont">PMPC - Loan</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PMPC_loan']))), 2) . '</td></tr>';
        }
        if ($row['COPEA_dues'] != "" && $row['COPEA_dues'] != 0) {
            $html .= '<tr><td class="tdfont">COPEA Dues</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['COPEA_dues']))), 2) . '</td></tr>';
        }
        if (($row['LBP_salaryloanreg'] != "" && $row['LBP_salaryloanreg'] != 0) || ($row['LBP_mobsalloanser'] != "" && $row['LBP_mobsalloanser'] != 0)) {
            // $html .= '<tr><td class="tdfont">LBP</td><td></td></tr>';
        }
        if ($row['LBP_salaryloanreg'] != "" && $row['LBP_salaryloanreg'] != 0) {
            $html .= '<tr><td class="tdfont">LBP - Salary Loan Regular</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['LBP_salaryloanreg']))), 2) . '</td></tr>';
        }
        if ($row['LBP_mobsalloanser'] != "" && $row['LBP_mobsalloanser'] != 0) {
            $html .= '<tr><td class="tdfont">LBP - Mobile Salary Loan Saver</td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['LBP_mobsalloanser']))), 2) . '</td></tr>';
        }
        if ($row['Total_deduction'] != "" && $row['Total_deduction'] != 0) {
        $html .= '<tr><td class="tdfont"><b>Total Deductions</b></td><td class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['Total_deduction']))), 2) . '</td></tr>';
        }
//$html .= '<tr><td style="border-top: 2px solid black;"><b>Net Amount Due</b></td><td style="border-top: 2px solid black;"><b>' . number_format(str_replace(' ', '', $row['Net_amount']), 2) . '</b></td></tr>';

        
        
        $html .= '<tr>';
        if(isset($_REQUEST['Adate'])){
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;1-15 of every month</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;16-31 of every month</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
        }else if(isset($_REQUEST['Rdate'])){
            $date = explode('-', $_REQUEST['Rdate']);
            $year = $date[0];
            $month1 = $date[1];
            $month1 = date('F', mktime(null, null, null, $month1, 1));
            $date2 = explode('-', $_REQUEST['Rdate2']);
            $month2 = $date2[1];
            $month2 = date('F', mktime(null, null, null, $month2, 1));

            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $month1 . ' - ' . $month2 . ' '. str_replace(',', '', $dc[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $month1 . ' - ' . $month2 . ' ' . str_replace(',', '', $dc2[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
        }else{
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $mon . ' ' . str_replace(',', '', $dc[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $mon2 . ' ' . str_replace(',', '', $dc2[1]) . '</td>';
            $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
        }
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td class="tdfont"><b>Net Salaries</b></td><td class="tdfont" style="text-align: right;">' . number_format($naT, 2) . '</td>';
        $html .= '</tr>';
        $html .= '</table>';

        //---- SUMMARY NET----//
        $deductionSubTotal1 = $lonPmpc1 + $lonWTax1 + $hazPmpc1 + $hazCopea1 + $hazWTax1 + $sublauPmpc1 + $sublauWTax1;
        $netOtherBenefitsTotal1 = $grTotal - $deductionSubTotal1;
        $takeHomePay = $naT + $netOtherBenefitsTotal1;

        if($_REQUEST['Mdate']){
            $html .= '<table style="border: 2.5px solid #303030; margin-top: 10px; margin-bottom: 30px;">';
            $html .= '<tr>';
            $html .= '<td class="tdfont" colspan="2" style="padding: 1.7px 0px 1.7px 10px;"><b>Summary (NET)</b></td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Salaries</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format($naT, 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Other Benefits</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format(str_replace(' ', '', $netOtherBenefitsTotal1), 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px; font-style: 10.5px;"><b>NET TAKE HOME PAY</b></td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px; font-size: 10.5px;"><b>' . number_format($takeHomePay, 2) . '&nbsp;</b></td>';
            $html .= '</tr>';
            $html .= '</table>';
        }elseif($_REQUEST['Adate']){
            $html .= '<table style="border: 2.5px solid #303030; margin-top: 10px; margin-bottom: 30px;">';
            $html .= '<tr>';
            $html .= '<td class="tdfont" colspan="2" style="padding: 1.7px 0px 1.7px 10px;"><b>Summary (NET)</b></td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Salaries</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format($naT, 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px;">Other Benefits</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px;">' . number_format(str_replace(' ', '', $netOtherBenefitsTotal1), 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px; font-style: 10.5px;"><b>ANNUAL NET SALARY</b></td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px; font-size: 10.5px;"><b>' . number_format($takeHomePay, 2) . '&nbsp;</b></td>';
            $html .= '</tr>';
            $html .= '</table>';
        }

        if($_REQUEST['cat'] == 'Summary')
        {
             $html .= '<div style="margin-top: 30px;"><div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            $html .= 'Certified Correct:';
            $html .= '</div>';
            $html .= '<div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">Federico O. Boncato<br>Administrative Officer V</div></div>';
        }
        $html .= '</div>';
        if ($_REQUEST['cat'] == 'Summary') { //$num != 0 && 
        } else {
            $html .= '<div style="margin-top: 30px;"><div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            $html .= 'Certified Correct:';
            $html .= '</div>';
            $html .= '<div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">Federico O. Boncato<br>Administrative Officer V</div></div>';
        }
        
        //-----------------SUMMARY------------------

        if ($_REQUEST['cat'] == 'Summary') { //$num != 0 &&
            
            $html .= '<div class="rightcol">';
            $html .= '<table style="border: 1px solid #303030;">';
            $html .= '<tr><td colspan="4" class="tdfont" style="width: 100px; border-right: none;"><b>Other Benefits:</b></td></tr>';
            $html .= '<tr><td colspan="2" class="tdfont">P.E.R.A</td><td colspan="2" class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', $pera), 2) . '</td></tr>';
            if($numrowsLngvty >  1){
                while($lngvty = mysql_fetch_assoc($longevity2A)){
                    $html .= '<tr><td colspan="2" class="tdfont">Longevity Pay - ' . date('M. Y', strtotime($lngvty['Date_covered'])). '</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($lngvty['Longevity_pay']) . '</td></tr>';
                    $lonPay += str_replace(',', '', $lngvty['Longevity_pay']);
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Longevity_pay'] != '' ? '<tr><td colspan="2" class="tdfont">Longevity Pay - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") : '') . '</td></tr>';
                    $lonPay = str_replace(',', '', $row2['Longevity_pay']);
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Longevity_pay'] != '' ? '<tr><td colspan="2" class="tdfont">Longevity Pay</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") : '') . '</td></tr>';
                }
            }
            if($numrowsHzrd > 1){
                while($hzrd = mysql_fetch_assoc($hazard2A)){
                    $html .= '<tr><td colspan="2" class="tdfont">Hazard Pay - ' . date('M. Y', strtotime($hzrd['Date_covered'])). '</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($hzrd['Hazard_pay']) . '</td></tr>';
                    $hazPay += str_replace(',', '', $hzrd['Hazard_pay']);
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Hazard_pay'] != '' ? '<tr><td colspan="2" class="tdfont">Hazard Pay - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") : ''). '</td></tr>';
                    $hazPay = str_replace(',', '', $row2['Hazard_pay']);    
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Hazard_pay'] != '' ? '<tr><td colspan="2" class="tdfont">Hazard Pay</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") : '') . '</td></tr>';
                }    
            }
            if($numrowsSl > 1){
                while($sL = mysql_fetch_assoc($subslaund2A)){
                    $s = str_replace(',', '', $sL['Subsistence_allowance']);
                    $l = str_replace(',', '', $sL['Laundry_allowance']);
                    $sl = $s + $l;
                    $html .= '<tr><td colspan="2" class="tdfont">Subs. & Laund. - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($sL['Sublau_Status'] != 0 ? number_format(str_replace(' ','', $sl), 2) : "") . '</td></tr>';
                    $sLpay += $sl;
                }
            }else{
                $s = str_replace(',', '', $row2['Subsistence_allowance']);
                $l = str_replace(',', '', $row2['Laundry_allowance']);
                $sl = $s + $l;
                if($_REQUEST['Mdate']){
                    $html .= ($sl != '' ? '<tr><td colspan="2" class="tdfont">Subs. & Laund. - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sl), 2) : "") : ''). '</td></tr>';
                    $sLpay = $sl;
                }elseif($_REQUEST['Adate']){
                    $html .= ($sl != '' ? '<tr><td colspan="2" class="tdfont">Subsistence/Laundry Allowance</td><td colspan="2" class="tdfont" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") : '') . '</td></tr>';
                }
            }
            $grTotal = $lonPay1 + $hazPay1 + $sLpay1 + $pera + $bonusesTotal;
            //-----------------Other Bonuses/Benefits----------------//
            if($_REQUEST['Mdate'] OR $_REQUEST['Adate']){
                $html .= '</tr><tr>';
                $html .= ($bonusrow != 0 ? '<td colspan="4" class="tdfont">Others:</td>' : '');
                $html .= '</tr><tr>';
                $html .= '</tr>';
                $html .= ($bonus['bonus_status'] != 0 && $bonus['pbb'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;PBB</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['pbb'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['13thmonth'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;13th Month Pay</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['13thmonth'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['14thmonth'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;14th Month Pay</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['14thmonth'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['cna'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;CNA</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['cna'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['pei'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;PEI</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['pei'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['cash_gift'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Cash Gift</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['cash_gift'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['loyalty'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Loyalty</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['loyalty'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['clothing_allowance'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Clothing Allowance</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['clothing_allowance'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['anniv_bonus'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Anniv. Bonus</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['anniv_bonus'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['others_bonuses'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">&nbsp;&nbsp;&nbsp;&nbsp;Other Bonuses</td><td colspan="2" class="tdfont" style="text-align: right;">'.$bonus['others_bonuses'].'</td></tr>' : '');
            }

            $html .= '<tr>';
            $html .= '<td colspan="2" class="tdfont" style="border-right: none;"><b>Benefits Sub-Total </b></td><td colspan="2" class="tdfont" style="text-align: right;">' . number_format(str_replace(' ', '', $grTotal), 2) . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="4" class="tdfont"><b>Less Deductions:</b></td>';
            $html .= '</tr><tr>';
            //-----------------Longevity-----------------//
//             $londeduExp = explode('+', $row2['Longevity_withtax']);
//             $londeduCount = count($londeduExp);
//             $lonTax = 0;
//             for ($i = 0; $i < $londeduCount; $i++) {
//                 $londed1 = explode('~', $londeduExp[$i]);
//                 if (ctype_space($londed1[0]) || empty($londed1[0])) {
//                     $lonotherDeduc = "";
//                 } else {
//                     $lonotherDeduc = number_format(str_replace(',', '', trim($londed1[0])), 2);
//                 }
//                 if (!empty($row2['Longevity_withtax'])) {
// //                    $html .= (stripos(trim($londed1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfontt">Longevity Withholding Tax:</td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? $lonotherDeduc : "") . '</td><td></td>' : '');
//                 } else {
// //                    $html .= '<td colspan="2" class="tdfontt">Longevity Withholding Tax:</td><td class="tdfontt" style="text-align: right;"></td><td></td>';
//                 }
//             }
// //            $html .= '</tr><tr>';

//             //------------------Hazard-------------------//
//             $hazdeduExp = explode('+', $row2['Hazard_withtax']);
//             $hazdeduCount = count($hazdeduExp);
//             $hazTax = 0;
//             for ($i = 0; $i < $hazdeduCount; $i++) {
//                 $hazded1 = explode('~', $hazdeduExp[$i]);
//                 if (ctype_space($hazded1[0]) || empty($hazded1[0])) {
//                     $hazotherDeduc = "";
//                 } else {
//                     $hazotherDeduc = number_format(str_replace(',', '', trim($hazded1[0])), 2);
//                 }
//                 if (!empty($row2['Hazard_withtax'])) {
// //                    $html .= (stripos(trim($hazded1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfontt">Hazard Withholding Tax:</td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? $hazotherDeduc : "") . '</td><td></td>' : '');
//                 } else {
// //                    $html .= '<td colspan="2" class="tdfontt">Hazard Withholding Tax:</td><td class="tdfontt" style="text-align: right;"></td><td></td>';
//                 }
//             }
// //            $html .= '</tr><tr>';
//             //------------------Subsistence and Laundry-------------------//
//             $sublaudeduExp = explode('+', $row2['Sublau_withtax']);
            
//             $sublaudeduCount = count($sublaudeduExp);
//             $sublauTax = 0;
//             for ($i = 0; $i < $sublaudeduCount; $i++) {
//                 $sublauded1 = explode('~', $sublaudeduExp[$i]);
//                 if (ctype_space($sublauded1[0]) || empty($sublauded1[0])) {
//                     $sublauotherDeduc = "";
//                 } else {
//                     $sublauotherDeduc = number_format(str_replace(',', '', trim($sublauded1[0])), 2);
//                 }
//                 if (!empty($row2['Sublau_withtax'])) {
// //                    $html .= (stripos(trim($sublauded1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfontt" style="font-size: 7px;">Subsistence and Laundry Withholding Tax:</td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? $sublauotherDeduc : "") . '</td><td></td>' : '');
//                 } else {
// //                    $html .= '<td colspan="2" class="tdfontt" style="font-size: 8px;">Subsistence/Laundry Withholding Tax:</td><td class="tdfontt" style="text-align: right;"></td><td></td>';
//                 }
//             }

// //            $html .= '</tr><tr>';
//             $html .= '<td colspan="2" class="tdfont">Withholding Tax & Others</td><td class="tdfont"></td><td></td>';
//             $html .= '</tr>';
//             //----------------Longevity----------------//
//             $lonsum = 0;
//             for ($i = 0; $i < $londeduCount; $i++) {
//                 $londed1 = explode('~', $londeduExp[$i]);
//                 if (ctype_space($londed1[0]) || empty($londed1[0])) {
//                     $lonplainOD = 0;
//                     $lonotherDeduc = "";
//                 } else {
//                     $lonplainOD = str_replace(',', '', trim($londed1[0]));
//                     $lonotherDeduc = number_format(str_replace(',', '', trim($londed1[0])), 2);
//                 }
// //            $html .= ($row2['Longevity_Status'] != 0 && $lonplainOD != 0 ? (stripos(trim($londed1[1]), 'Tax') !== false ? "" : '<tr><td colspan="2" class="tdfontt">' . trim($londed1[1]) . ' (Longevity)</td><td class="tdfontt" style="text-align: right;">' . $lonotherDeduc . '</td><td></td></tr>') : "");
//                 $lonsum = $lonsum + $lonplainOD;
//             }
//             //----------------Hazard-------------------//
//             $hazsum = 0;
//             for ($i = 0; $i < $hazdeduCount; $i++) {
//                 $hazded1 = explode('~', $hazdeduExp[$i]);
//                 if (ctype_space($hazded1[0]) || empty($hazded1[0])) {
//                     $hazplainOD = 0;
//                     $hazotherDeduc = "";
//                 } else {
//                     $hazplainOD = str_replace(',', '', trim($hazded1[0]));
//                     $hazotherDeduc = number_format(str_replace(',', '', trim($hazded1[0])), 2);
//                 }
//                 $hazsum = $hazsum + $hazplainOD;
//             }
//             //----------------Subsistence & Laundry-------------------//
//             $sublausum = 0;
//             for ($i = 0; $i < $sublaudeduCount; $i++) {
//                 $sublauded1 = explode('~', $sublaudeduExp[$i]);
//                 if (ctype_space($sublauded1[0]) || empty($sublauded1[0])) {
//                     $sublauplainOD = 0;
//                     $sublauotherDeduc = "";
//                 } else {
//                     $sublauplainOD = str_replace(',', '', trim($sublauded1[0]));
//                     $sublauotherDeduc = number_format(str_replace(',', '', trim($sublauded1[0])), 2);
//                 }
// //            $html .= ($row2['Sublau_Status'] != 0 && $sublauplainOD != 0 ? (stripos(trim($sublauded1[1]), 'Tax') !== false || stripos(trim($sublauded1[1]), 'deduction') !== false ? "" : '<tr><td colspan="2" class="tdfontt">' . trim($sublauded1[1]) . ' (Subsistence & Laundry)</td><td class="tdfontt" style="text-align: right;">' . $sublauotherDeduc . '</td><td></td></tr>') : "");
//                 $sublausum = $sublausum + $sublauplainOD;
//             }
            // $lonsumD = ($row2['Longevity_Status'] == 1 ? $lonsum : 0);
            // $hazsumD = ($row2['Hazard_Status'] == 1 ? $hazsum : 0);
            // $sublausumD = ($row2['Sublau_Status'] == 1 ? $sublausum : 0);
            
            // $deductionTotal = $lonsumD + $hazsumD + $sublausumD;
            // $nobOfficial = $grTotal - $deductionTotal;
            // $nthpOfficial = $naT + $nobOfficial;

            $deductionSubTotal = $lonPmpc1 + $lonWTax1 + $hazPmpc1 + $hazCopea1 + $hazWTax1 + $sublauPmpc1 + $sublauWTax1;
            $netOtherBenefitsTotal = $grTotal - $deductionSubTotal;
            $takeHomePay = $naT + $netOtherBenefitsTotal1;
        if($numrowsLngvty > 1){
            while($lngvty = mysql_fetch_assoc($longevity2B_a)){
                $html .= ($lngvty['Longevity_Status'] != 0 && $lngvty['Longevity_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity PMPC - '.date('M. Y', strtotime($lngvty['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $lngvty['Longevity_pmpc'] . '</td>' : '');
            }
            while($lngvty = mysql_fetch_assoc($longevity2B_b)){
                $html .= ($lngvty['Longevity_Status'] != 0 && $lngvty['Longevity_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity W/Tax - '.date('M. Y', strtotime($lngvty['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $lngvty['Longevity_withtax'] . '</td>' : '');
            }
        }else{
            if($_REQUEST['Mdate']){
                $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_pmpc'] . '</td>' : '');
                $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).' </td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_withtax'] . '</td>' : '');
            }elseif($_REQUEST['Adate']){
                $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity PMPC</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_pmpc'] . '</td>' : '');
                $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Longevity W/Tax</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_withtax'] . '</td>' : '');
            }
        }
        if($numrowsHzrd > 1){
            while($hzrd = mysql_fetch_assoc($hazard2B_a)){
                $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard PMPC - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_pmpc'] . '</td></tr>' : '');
            }
            while($hzrd = mysql_fetch_assoc($hazard2B_b)){
                $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_copea'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard COPEA - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_copea'] . '</td></tr>' : '');
            }
            while($hzrd = mysql_fetch_assoc($hazard2B_c)){
                $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard W/Tax - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_withtax'] . '</td></tr>' : '');
            }
        }else{
            if($_REQUEST['Mdate']){
                $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_pmpc'] . '</td></tr>' : '');
                $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_copea'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard COPEA - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_copea'] . '</td></tr>' : '');
                $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_withtax'] . '</td></tr>' : '');
            }elseif($_REQUEST['Adate']){
                $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_pmpc'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard PMPC</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_pmpc'] . '</td></tr>' : '');
                $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_copea'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard COPEA</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_copea'] . '</td></tr>' : '');
                $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_withtax'] != '' ? '<tr><td colspan="2" class="tdfont" style="font-size: 9px;">Hazard W/Tax</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_withtax'] . '</td></tr>' : '');
            }
        }
        if($numrowsSl > 1){
            while($sL = mysql_fetch_assoc($subslaund2B_a)){
                $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. PMPC - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_pmpc'] . '</td></tr>' : '');
            }
            while($sL = mysql_fetch_assoc($subslaund2B_b)){
                $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. W/Tax - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_withtax'] . '</td></tr>' : '');
            }
        }else{
            if($_REQUEST['Mdate']){
                $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_pmpc'] . '</td></tr>' : '');
                $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_withtax'] . '</td></tr>' : '');
            }elseif($_REQUEST['Adate']){
                $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. PMPC</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_pmpc'] . '</td></tr>' : '');
                $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != '' ? '<tr><td colspan="2" class="tdfontt" style="font-size: 9px;">Subs. & Laund. W/Tax</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_withtax'] . '</td></tr>' : '');
            }
        }
            

            $html .= '<tr>';
            $html .= '<td colspan="2" class="tdfont"><b>Deductions Sub-Total </b></td><td colspan="2" class="tdfont" style="text-align: right;">' . number_format($deductionSubTotal, 2) . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="3" class="tdfont" style="border-right: none;"><b>Net Other Benefits</b></td><td class="tdfont" style="border-left: none; text-align: right;">' . number_format(str_replace(' ', '', $netOtherBenefitsTotal), 2) . '</td>';
            $html .= '</tr>';
            $html .= '</table>';

            // $html .= '<div style="margin-top: 10px;">';
            // $html .= '<div style="font-size: 10px; padding-left: 285px; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            // $html .= 'Certified Correct:';
            // $html .= '</div>';
            // $html .= '<div style="margin-right: 15px; float: right; font-size: 10px; border-top: 1px solid black; width: 150px; text-align: center; font-family: Arial, "Arial", Helvetica, sans-serif;">';
            // $html .= 'Federico O. Boncato<br>Administrative Officer V';
            // $html .= '</div>';
            // $html .= '</div>';
            $html .= '</div>';
        }
    }
    
    $html .= '</div>';
    
    // $html .= '<hr style="width: 100%; margin-top: 10px;">';
    $html .= '</div>';
    $html .= '</div>';
}
//------------------------------------- UNOFFICIAL PAYSLIP -------------------------------------//
else {
    $html .= '<title>Payslip</title>';
    $html .= '<style>';
    $html .= 'html, body {'
            . 'background-color: lightgray;'
            . '}';
    $html .= '</style>';
    
    $html .= '<div class="image" style="postion: absolute; background-color: #fff; margin: 30px 450px 10px 350px; padding: 5px 20px 5px 20px; min-height: 200vh; box-shadow: 2px 2px 8px #888888;">';

    $html .= '<br><br>';

    if($row['verified'] != 'Yes')
    {
        $html .= '<p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">No Payslip Found.</p>';
    }
    else
    {
        $html .= '<h1 style="text-align: center; font-family: Arial; font-size: 25px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">U N O F F I C I A L&nbsp;&nbsp;&nbsp;P A Y S L I P</h1>';
        $html .= '<br>';
        if(isset($_REQUEST['Mdate']))
        {
            $html .= '<u><p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">Period Covered : ' . $mon . ' ' . $row['year_covered'] . '</p></u>';
        }
        else if(isset($_REQUEST['Adate']))
        {
            $year = explode('-', $_REQUEST['Adate']);

            $html .= '<u><p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">Period Covered : ' . $year[0] . '</p></u>';
        }
        else if(isset($_REQUEST['Ydate']))
        {
             $html .= '<u><p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">Period Covered : ' . $mon . ' ' . $row['year_covered'] . '</p></u>';
        }
        else if(isset($_REQUEST['Rdate']))
        {
            $date = explode('-', $_REQUEST['Rdate']);
            $year = $date[0];
            $month1 = $date[1];
            $date2 = explode('-', $_REQUEST['Rdate2']);
            $month2 = $date2[1];

            $html .= '<u><p style="text-align: center; font-family: Arial; font-size: 13px; font-weight: bold; margin-top: -7px; margin-bottom: 4px;">Period Covered : ' . date('F',mktime(null,null,null,$month1,1)) . ' - ' . date('F',mktime(null,null,null,$month2,1)) . ' ' . $year . '</p></u>';
        }
    }

    // $html .= '<div style="display: block; margin-top: 0px; margin-left: 0px; margin-right: 0px; height: 62%; width:50%">';

    if (isset($_REQUEST['cat']) && $_REQUEST['cat'] == 'Benefits') {
        $html .= '<table style="border: 1px solid #303030; margin: auto; width: 80%;">';
        $html .= '<tr>';
        $html .= '<td colspan="1" class="tdfont4" style="width: 180px; border-right: none; text-align: center;"><b>Other Benefits</b></td><td colspan="1" class="tdfont4" style="width: 100px; border-right: none;"><b>As Of</b></td><td colspan="2" class="tdfont4"></td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="1" class="tdfont4">P.E.R.A:</td><td></td><td class="tdfont4"></td><td class="tdfont4" style="text-align: right;">' . number_format(str_replace(' ', '', $pera), 2) . '</td>';
        $html .= '</tr><tr>';
        if(isset($_REQUEST['Mdate']))
        {
            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? ($row2['Longevity_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Longevity_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? ($row2['Hazard_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Hazard_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? ($row2['Sublau_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Sublau_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        elseif(isset($_REQUEST['Ydate']))
        {
            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? ($row2['Longevity_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Longevity_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? ($row2['Hazard_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Hazard_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? ($row2['Sublau_date'] == '0000-00-00' ? "" : date('M d, Y', strtotime($row2['Sublau_date']))) : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        elseif(isset($_REQUEST['Adate']))
        {
            $year = explode('-', $_REQUEST['Adate']);

            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? $year[0] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? $year[0] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? $year[0] : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        elseif(isset($_REQUEST['Rdate']))
        {
            $date = explode('-', $_REQUEST['Rdate']);
            $year = $date[0];
            $month1 = $date[1];
            $date2 = explode('-', $_REQUEST['Rdate2']);
            $month2 = $date2[1];
            
            $html .= '<td colspan="1" class="tdfontt">Longevity Pay:</td><td class="tdfontt">' . ($row2['Longevity_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt">Hazard Pay:</td><td class="tdfontt">' . ($row2['Hazard_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td>';
            $html .= '</tr><tr>';
            $html .= '<td colspan="1" class="tdfontt" style="border-right: none;">Subsistence/Laundry: </td><td class="tdfontt">' . ($row2['Sublau_Status'] != 0 ? date('M', mktime(null, null, null, $month1, 1)).' - '. date('M', mktime(null, null, null, $month2, 1)).' '.$year : "") . '</td><td></td><td class="tdfontt" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") . '</td>';
        }
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfont4">Others</td><td class="tdfont4"></td><td class="tdfont4"></td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfont4" style="border-right: none;">Benefits Sub-Total: </td><td class="tdfont4" style="text-align: right;"></td><td class="tdfont4" style="text-align: right;">' . number_format(str_replace(' ', '', $grTotal), 2) . '</td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="4" class="tdfont4" style="font-size: 13.5px;"><b>Less Deductions:</b></td>';
        $html .= '</tr><tr>';
        //-----------------Longevity-----------------//
        $londeduExp = explode('+', $row2['Longevity_withtax']);
        $londeduCount = count($londeduExp);
        $lonTax = 0;
        for ($i = 0; $i < $londeduCount; $i++) {
            $londed1 = explode('~', $londeduExp[$i]);
            if (ctype_space($londed1[0]) || empty($londed1[0])) {
                $lonotherDeduc = "";
            } else {
                $lonotherDeduc = number_format(str_replace(',', '', trim($londed1[0])), 2);
            }
            if (!empty($row2['Longevity_withtax'])) {
                $html .= (stripos(trim($londed1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfont4">Longevity Withholding Tax:</td><td class="tdfont4" style="text-align: right;">' . ($row2['Longevity_Status'] != 0 ? $lonotherDeduc : "") . '</td><td class="tdfont4"></td>' : '');
            } else {
                $html .= '<td colspan="2" class="tdfont4">Longevity Withholding Tax:</td><td class="tdfont4" style="text-align: right;"></td><td class="tdfont4"></td>';
            }
        }
        $html .= '</tr><tr>';
        //------------------Hazard-------------------//
        $hazdeduExp = explode('+', $row2['Hazard_withtax']);
        $hazdeduCount = count($hazdeduExp);
        $hazTax = 0;
        for ($i = 0; $i < $hazdeduCount; $i++) {
            $hazded1 = explode('~', $hazdeduExp[$i]);
            if (ctype_space($hazded1[0]) || empty($hazded1[0])) {
                $hazotherDeduc = "";
            } else {
                $hazotherDeduc = number_format(str_replace(',', '', trim($hazded1[0])), 2);
            }
            if (!empty($row2['Hazard_withtax'])) {
                $html .= (stripos(trim($hazded1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfont4">Hazard Withholding Tax:</td><td class="tdfont4" style="text-align: right;">' . ($row2['Hazard_Status'] != 0 ? $hazotherDeduc : "") . '</td><td class="tdfont4"></td>' : '');
            } else {
                $html .= '<td colspan="2" class="tdfont4">Hazard Withholding Tax:</td><td class="tdfont4" style="text-align: right;"></td><td class="tdfont4"></td>';
            }
        }
        $html .= '</tr><tr>';
        //------------------Subsistence and Laundry-------------------//
        $sublaudeduExp = explode('+', $row2['Sublau_withtax']);
        $sublaudeduCount = count($sublaudeduExp);
        $sublauTax = 0;
        for ($i = 0; $i < $sublaudeduCount; $i++) {
            $sublauded1 = explode('~', $sublaudeduExp[$i]);
            if (ctype_space($sublauded1[0]) || empty($sublauded1[0])) {
                $sublauotherDeduc = "";
            } else {
                $sublauotherDeduc = number_format(str_replace(',', '', trim($sublauded1[0])), 2);
            }
            if (!empty($row2['Sublau_withtax'])) {
                $html .= (stripos(trim($sublauded1[1]), 'Tax') !== false ? '<td colspan="2" class="tdfont4">Subsistence and Laundry Withholding Tax:</td><td class="tdfont4" style="text-align: right;">' . ($row2['Sublau_Status'] != 0 ? $sublauotherDeduc : "") . '</td><td class="tdfont4"></td>' : '');
            } else {
                $html .= '<td colspan="2" class="tdfont4">Subsistence and Laundry Withholding Tax:</td><td class="tdfont4" style="text-align: right;"></td><td class="tdfont4"></td>';
            }
        }
        $html .= '</tr><tr>';
        $html .= '<td colspan="2" class="tdfont4">Others</td><td class="tdfont4"></td><td class="tdfont4"></td>';
        $html .= '</tr>';
        
        //----------------Longevity----------------//
        
        $lonsum = 0;
        for ($i = 0; $i < $londeduCount; $i++) {
            $londed1 = explode('~', $londeduExp[$i]);
            if (ctype_space($londed1[0]) || empty($londed1[0])) {
                $lonplainOD = 0;
                $lonotherDeduc = "";
            } else {
                $lonplainOD = str_replace(',', '', trim($londed1[0]));
                $lonotherDeduc = number_format(str_replace(',', '', trim($londed1[0])), 2);
            }
            $html .= ($row2['Longevity_Status'] != 0 && $lonplainOD != 0 ? (stripos(trim($londed1[1]), 'Tax') !== false ? "" : '<tr><td colspan="2" class="tdfont4">' . trim($londed1[1]) . ' (Longevity)</td><td class="tdfont4" style="text-align: right;">' . $lonotherDeduc . '</td><td class="tdfont4"></td></tr>') : "");
            $lonsum = $lonsum + $lonplainOD;
        }
        //----------------Hazard-------------------//
        $hazsum = 0;
        for ($i = 0; $i < $hazdeduCount; $i++) {
            $hazded1 = explode('~', $hazdeduExp[$i]);
            if (ctype_space($hazded1[0]) || empty($hazded1[0])) {
                $hazplainOD = 0;
                $hazotherDeduc = "";
            } else {
                $hazplainOD = str_replace(',', '', trim($hazded1[0]));
                $hazotherDeduc = number_format(str_replace(',', '', trim($hazded1[0])), 2);
            }
            $html .= ($row2['Hazard_Status'] != 0 && $hazplainOD != 0 ? (stripos(trim($hazded1[1]), 'Tax') !== false ? "" : '<tr><td colspan="2" class="tdfont4">' . trim($hazded1[1]) . ' (Hazard)</td><td></td><td class="tdfont4" style="text-align: right;">' . $hazotherDeduc . '</td><td class="tdfont4"></td></tr>') : "");
            $hazsum = $hazsum + $hazplainOD;
        }
        //----------------Subsistence & Laundry-------------------//
        $sublausum = 0;
        for ($i = 0; $i < $sublaudeduCount; $i++) {
            $sublauded1 = explode('~', $sublaudeduExp[$i]);
            if (ctype_space($sublauded1[0]) || empty($sublauded1[0])) {
                $sublauplainOD = 0;
                $sublauotherDeduc = "";
            } else {
                $sublauplainOD = str_replace(',', '', trim($sublauded1[0]));
                $sublauotherDeduc = number_format(str_replace(',', '', trim($sublauded1[0])), 2);
            }
            $html .= ($row2['Sublau_Status'] != 0 && $sublauplainOD != 0 ? (stripos(trim($sublauded1[1]), 'Tax') !== false || stripos(trim($sublauded1[1]), 'deduction') !== false ? "" : '<tr><td colspan="2" class="tdfont4">' . trim($sublauded1[1]) . ' (Subsistence & Laundry)</td><td class="tdfont4" style="text-align: right;">' . $sublauotherDeduc . '</td><td class="tdfont4"></td></tr>') : "");
            $sublausum = $sublausum + $sublauplainOD;
        }

        $lonsumD = ($row2['Longevity_Status'] == 1 ? $lonsum : 0);
        $hazsumD = ($row2['Hazard_Status'] == 1 ? $hazsum : 0);
        $sublausumD = ($row2['Sublau_Status'] == 1 ? $sublausum : 0);
        $deductionTotal = $lonsumD + $hazsumD + $sublausumD;
        $nobOfficial = $grTotal - $deductionTotal;

        $html .= '<tr>';
        $html .= '<td colspan="2" class="tdfont4">Deductions Sub-Total: </td><td class="tdfont4" style="text-align: right;"></td><td class="tdfont4" style="text-align: right;">' . number_format($deductionTotal, 2) . '</td>';
        $html .= '</tr><tr>';
        $html .= '<td colspan="3" class="tdfont4" style="border-right: none;">Net Other Benefits</td><td class="tdfont4" style="border-left: none; text-align: right; padding-right: 0px;">' . number_format(str_replace(' ', '', $nobOfficial), 2) . '</td>';
        $html .= '</tr>';
        $html .= '</table>';
    } else {
        // $html .= '<div class="leftcol">';
        if($row['verified'] != 'Yes')
        {
             
        }
        else
        {
            $html .= ($_REQUEST['cat'] == 'Summary' ? '<div style="margin-top: 40px; width: 100%;">' : '<div style="margin: auto; width: 100%;">'); //$num != 0 &&  '<div class="leftcol2">'
            // $html .= '<div style="float: right;">';
            $html .= '<table style="border-collapse: collapse; width: 100%;">';
            $html .= '<tr style="border: 2px solid;">';
            $html .= '<td class="tdfont" colspan="2" style="border: 2px solid;">Gross Basic Monthly Salary</td>';
            $html .= '<td class="tdfont" colspan="2" style="text-align: right;">' . str_replace(' ', '', $row['Adj_basicmonsal']) . '</td>';
            $html .= '</tr>';

            $html .= '<tr style="border: 2px solid;">';
            $html .= '<td class="tdfont" colspan="4"><b>Less Deductions: </b></td>';
            $html .= '</tr>';
            
            if ($row['Salaries_withtax'] != "" && $row['Salaries_withtax'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">Withholding Tax</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['Salaries_withtax']))), 2) . '</td></tr>';
            }
            if (($row['GSIS_rlip'] != "" && $row['GSIS_rlip'] != 0) || ($row['GSIS_ioliprem'] != "" && $row['GSIS_ioliprem'] != 0) || ($row['GSIS_uoliloan'] != "" && $row['GSIS_uoliloan'] != 0) || ($row['GSIS_oli'] != "" && $row['GSIS_oli'] != 0) || ($row['GSIS_consoloan'] != "" && $row['GSIS_consoloan'] != 0) || ($row['GSIS_emergloan'] != "" && $row['GSIS_emergloan'] != 0) || ($row['GSIS_policyloanreg'] != "" && $row['GSIS_policyloanreg'] != 0) || ($row['GSIS_policyloanoptional'] != "" && $row['GSIS_policyloanoptional'] != 0) || ($row['GSIS_educassistloan'] != "" && $row['GSIS_educassistloan'] != 0) || ($row['GSIS_umidca'] != "" && $row['GSIS_umidca'] != 0)) {
                // $html .= '<tr style="border: 2px solid;"><td class="tdfont">GSIS</td><td></td></tr>';
            }
            if ($row['GSIS_rlip'] != "" && $row['GSIS_rlip'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - RLIP</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_rlip']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_ioliprem'] != "" && $row['GSIS_ioliprem'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - UOLI Premium</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_ioliprem']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_uoliloan'] != "" && $row['GSIS_uoliloan'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - UOLI Loan</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_uoliloan']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_oli'] != "" && $row['GSIS_oli'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - OLI</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_oli']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_consoloan'] != "" && $row['GSIS_consoloan'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - Conso Loan</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_consoloan']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_emergloan'] != "" && $row['GSIS_emergloan'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - Emergency Loan</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_emergloan']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_policyloanreg'] != "" && $row['GSIS_policyloanreg'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - Policy Loan Regular</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_policyloanreg']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_policyloanoptional'] != "" && $row['GSIS_policyloanoptional'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - Policy Loan Optional</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_policyloanoptional']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_educassistloan'] != "" && $row['GSIS_educassistloan'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - Educational Assist. Loan</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_educassistloan']))), 2) . '</td></tr>';
            }
            if ($row['GSIS_umidca'] != "" && $row['GSIS_umidca'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">GSIS - UMID CA</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['GSIS_umidca']))), 2) . '</td></tr>';
            }
            if (($row['PAGIBIG_premium'] != "" && $row['PAGIBIG_premium'] != 0) || ($row['PAGIBIG_MP2'] != "" && $row['PAGIBIG_MP2'] != 0) || ($row['PAGIBIG_MPL'] != "" && $row['PAGIBIG_MPL'] != 0) || ($row['PAGIBIG_calamityloan'] != "" && $row['PAGIBIG_calamityloan'] != 0)) {
                // $html .= '<tr style="border: 2px solid;"><td class="tdfont">PAG-IBIG</td><td></td></tr>';
            }
            if ($row['PAGIBIG_premium'] != "" && $row['PAGIBIG_premium'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">PAGIBIG - Premium</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_premium']))), 2) . '</td></tr>';
            }
            if ($row['PAGIBIG_MP2'] != "" && $row['PAGIBIG_MP2'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">PAGIBIG - MP2</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_MP2']))), 2) . '</td></tr>';
            }
            if ($row['PAGIBIG_MPL'] != "" && $row['PAGIBIG_MPL'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">PAGIBIG - MPL</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_MPL']))), 2) . '</td></tr>';
            }
            if ($row['PAGIBIG_calamityloan'] != "" && $row['PAGIBIG_calamityloan'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">PAGIBIG - Calamity Loan</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PAGIBIG_calamityloan']))), 2) . '</td></tr>';
            }
            if (($row['PHILH_cont'] != "" && $row['PHILH_cont'] != 0) || ($row['PHILH_arrears'] != "" && $row['PHILH_arrears'] != 0)) {
                // $html .= '<tr style="border: 2px solid;"><td class="tdfont">Philhealth</td><td></td></tr>';
            }
            if ($row['PHILH_cont'] != "" && $row['PHILH_cont'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">Philhealth Contribution</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PHILH_cont']))), 2) . '</td></tr>';
            }
            if ($row['PHILH_arrears'] != "" && $row['PHILH_arrears'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">Philhealth - A/R(Arrears Nov./Dec.2016)</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PHILH_arrears']))), 2) . '</td></tr>';
            }
            if (($row['PMPC_capital'] != "" && $row['PMPC_capital'] != 0) || ($row['PMPC_loan'] != "" && $row['PMPC_loan'] != 0)) {
                // $html .= '<tr style="border: 2px solid;"><td class="tdfont">PMPC</td><td></td></tr>';
            }
            if ($row['PMPC_capital'] != "" && $row['PMPC_capital'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">PMPC - Capital</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PMPC_capital']))), 2) . '</td></tr>';
            }
            if ($row['PMPC_loan'] != "" && $row['PMPC_loan'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">PMPC - Loan</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['PMPC_loan']))), 2) . '</td></tr>';
            }
            if ($row['COPEA_dues'] != "" && $row['COPEA_dues'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">COPEA Dues</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['COPEA_dues']))), 2) . '</td></tr>';
            }
            if (($row['LBP_salaryloanreg'] != "" && $row['LBP_salaryloanreg'] != 0) || ($row['LBP_mobsalloanser'] != "" && $row['LBP_mobsalloanser'] != 0)) {
                // $html .= '<tr style="border: 2px solid;"><td class="tdfont">LBP</td><td></td></tr>';
            }
            if ($row['LBP_salaryloanreg'] != "" && $row['LBP_salaryloanreg'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">LBP - Salary Loan Regular</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['LBP_salaryloanreg']))), 2) . '</td></tr>';
            }
            if ($row['LBP_mobsalloanser'] != "" && $row['LBP_mobsalloanser'] != 0) {
                $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2">LBP - Mobile Salary Loan Saver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['LBP_mobsalloanser']))), 2) . '</td></tr>';
            }
            if ($row['Total_deduction'] != "" && $row['Total_deduction'] != 0) {
            $html .= '<tr style="border: 2px solid;"><td class="tdfont" colspan="2"><b>Total Deductions</b></td><td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', (str_replace(',', '', $row['Total_deduction']))), 2) . '</td></tr>';
            }
        //$html .= '<tr><td style="border-top: 2px solid black;"><b>Net Amount Due</b></td><td style="border-top: 2px solid black;"><b>' . number_format(str_replace(' ', '', $row['Net_amount']), 2) . '</b></td></tr>';

            
            
            $html .= '<tr style="border: 2px solid;">';
            if(isset($_REQUEST['Adate'])){
                $html .= '<td class="tdfont" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;1-15 of every month</td>';
                $html .= '<td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
                $html .= '</tr>';
                $html .= '<tr style="border: 2px solid;">';
                $html .= '<td class="tdfont" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;16-31 of every month</td>';
                $html .= '<td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
            }else if(isset($_REQUEST['Rdate'])){
                $date = explode('-', $_REQUEST['Rdate']);
                $year = $date[0];
                $month1 = $date[1];
                $month1 = date('F', mktime(null, null, null, $month1, 1));
                $date2 = explode('-', $_REQUEST['Rdate2']);
                $month2 = $date2[1];
                $month2 = date('F', mktime(null, null, null, $month2, 1));

                $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $month1 . ' - ' . $month2 . ' '. str_replace(',', '', $dc[1]) . '</td>';
                $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
                $html .= '</tr>';
                $html .= '<tr style="border: 2px solid;">';
                $html .= '<td class="tdfont">&nbsp;&nbsp;&nbsp;&nbsp;' . $month1 . ' - ' . $month2 . ' ' . str_replace(',', '', $dc2[1]) . '</td>';
                $html .= '<td class="tdfont" style="text-align: right;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
            }else{
                $html .= '<td class="tdfont" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;' . $mon . ' ' . str_replace(',', '', $dc[1]) . '</td>';
                $html .= '<td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . str_replace(' ', '', $row['Net_amount']) . '</td>';
                $html .= '</tr>';
                $html .= '<tr style="border: 2px solid;">';
                $html .= '<td class="tdfont" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;' . $mon2 . ' ' . str_replace(',', '', $dc2[1]) . '</td>';
                $html .= '<td class="tdfont" colspan="2" style="text-align: right; border: 2px solid;">' . str_replace(' ', '', $row['Net_amount2']) . '</td>';
            }
            $html .= '</tr>';
            $html .= '<tr style="border: 2px solid;">';
            $html .= '<td colspan="3" class="tdfont" style="border-right: none;"><b>Net Salaries</b></td><td class="tdfont" style="border-left: none; text-align: right;"><b>' . number_format($naT, 2) . '</b></td>';
            $html .= '</tr>';
            
            $html .= '</table>';
            $html .= '<br>';
            $html .= '<table style="border-collapse: collapse; width: 100%;">';
            $html .= '<tr style="border: 2px solid;"><td colspan="4" class="tdfont" style="width: 100px; border-right: none; text-align:center; font-size: 15px;"><b>OTHER BENEFITS</b></td></tr>';
            $html .= '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">P.E.R.A</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', $pera), 2) . '</td></tr>';
            if($numrowsLngvty >  1){
                while($lngvty = mysql_fetch_assoc($longevity2A)){
                    $html .= '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Longevity Pay - ' . date('M. Y', strtotime($lngvty['Date_covered'])). '</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($lngvty['Longevity_pay']) . '</td></tr>';
                    $lonPay += str_replace(',', '', $lngvty['Longevity_pay']);
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Longevity_pay'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Longevity Pay - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") : ''). '</td></tr>';
                    $lonPay = str_replace(',', '', $row2['Longevity_pay']);
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Longevity_pay'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Longevity Pay</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($row2['Longevity_Status'] != 0 ? number_format(str_replace(' ', '', $lon), 2) : "") : '') . '</td></tr>';
                }
            }
            if($numrowsHzrd > 1){
                while($hzrd = mysql_fetch_assoc($hazard2A)){
                    $html .= '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Hazard Pay - ' . date('M. Y', strtotime($hzrd['Date_covered'])). '</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($hzrd['Hazard_pay']) . '</td></tr>';
                    $hazPay += str_replace(',', '', $hzrd['Hazard_pay']);
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Hazard_pay'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Hazard Pay - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") : ''). '</td></tr>';
                    $hazPay = str_replace(',', '', $row2['Hazard_pay']);    
                }elseif($_REQUEST['Adate']){
                    $html .= '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Hazard Pay</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($row2['Hazard_Status'] != 0 ? number_format(str_replace(' ', '', $haz), 2) : "") . '</td></tr>';
                }    
            }
            if($numrowsSl > 1){
                while($sL = mysql_fetch_assoc($subslaund2A)){
                    $s = str_replace(',', '', $sL['Subsistence_allowance']);
                    $l = str_replace(',', '', $sL['Laundry_allowance']);
                    $sl = $s + $l;
                    $html .= '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Subsistence & Laundry Allowance - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($sL['Sublau_Status'] != 0 ? number_format(str_replace(' ','', $sl), 2) : "") . '</td></tr>';
                    $sLpay += $sl;
                }
            }else{
                $s = str_replace(',', '', $row2['Subsistence_allowance']);
                $l = str_replace(',', '', $row2['Laundry_allowance']);
                $sl = $s + $l;
                if($_REQUEST['Mdate']){
                    $html .= ($sl != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Subsistence & Laundry Allowance. - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sl), 2) : "") : '') . '</td></tr>';
                    $sLpay = $sl;
                }elseif($_REQUEST['Adate']){
                    $html .= ($sl != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont">Subsistence & Laundry Allowance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . ($row2['Sublau_Status'] != 0 ? number_format(str_replace(' ', '', $sublau), 2) : "") : ''). '</td></tr>';
                }
            }
            $grTotal = $lonPay1 + $hazPay1 + $sLpay1 + $pera + $bonusesTotal;
            //-----------------Other Bonuses/Benefits----------------//
            if($_REQUEST['Mdate'] OR $_REQUEST['Adate']){
                $html .= '</tr><tr style="border: 2px solid;">';
                $html .= ($bonusrow != 0 ? '<td colspan="4" class="tdfont">Others:</td>' : '');
                $html .= '</tr><tr style="border: 2px solid;">';
                $html .= '</tr>';
                $html .= ($bonus['bonus_status'] != 0 && $bonus['pbb'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;PBB</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['pbb'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['13thmonth'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;13th Month Pay</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['13thmonth'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['14thmonth'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;14th Month Pay</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['14thmonth'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['cna'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;CNA</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['cna'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['pei'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;PEI</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['pei'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['cash_gift'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;Cash Gift</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['cash_gift'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['loyalty'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;Loyalty</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['loyalty'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['clothing_allowance'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;Clothing Allowance</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['clothing_allowance'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['anniv_bonus'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;Anniv. Bonus</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['anniv_bonus'].'</td></tr>' : '');
                $html .= ($bonus['bonus_status'] != 0 && $bonus['others_bonuses'] != '' ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;Other Bonuses</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">'.$bonus['others_bonuses'].'</td></tr>' : '');
            }

            $html .= '<tr style="border: 2px solid;">';
            $html .= '<td colspan="2" class="tdfont" style="border-right: none;"><b>Benefits Sub-Total </b></td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . number_format(str_replace(' ', '', $grTotal), 2) . '</td>';
            $html .= '</tr><tr style="border: 2px solid;">';
            $html .= '<td colspan="4" class="tdfont"><b>Less Deductions:</b></td>';
            $html .= '</tr>';

            $deductionSubTotal = $lonPmpc1 + $lonWTax1 + $hazPmpc1 + $hazCopea1 + $hazWTax1 + $sublauPmpc1 + $sublauWTax1;
            $netOtherBenefitsTotal = $grTotal - $deductionSubTotal;
            $takeHomePay = $naT + $netOtherBenefitsTotal1;
            if($numrowsLngvty > 1){
                while($lngvty = mysql_fetch_assoc($longevity2B_a)){
                    $html .= ($lngvty['Longevity_Status'] != 0 && $lngvty['Longevity_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Longevity PMPC - '.date('M. Y', strtotime($lngvty['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . $lngvty['Longevity_pmpc'] . '</td>' : '');
                }
                while($lngvty = mysql_fetch_assoc($longevity2B_b)){
                    $html .= ($lngvty['Longevity_Status'] != 0 && $lngvty['Longevity_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Longevity W/Tax - '.date('M. Y', strtotime($lngvty['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $lngvty['Longevity_withtax'] . '</td>' : '');
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Longevity PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_pmpc'] . '</td>' : '');
                    $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Longevity W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).' </td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_withtax'] . '</td>' : '');
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Longevity PMPC</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_pmpc'] . '</td>' : '');
                    $html .= ($row2['Longevity_Status'] != 0 && $row2['Longevity_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Longevity W/Tax</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Longevity_withtax'] . '</td>' : '');
                }
            }
            if($numrowsHzrd > 1){
                while($hzrd = mysql_fetch_assoc($hazard2B_a)){
                    $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard PMPC - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_pmpc'] . '</td></tr>' : '');
                }
                while($hzrd = mysql_fetch_assoc($hazard2B_b)){
                    $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_copea'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard COPEA - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_copea'] . '</td></tr>' : '');
                }
                while($hzrd = mysql_fetch_assoc($hazard2B_c)){
                    $html .= ($hzrd['Hazard_Status'] != 0 && $hzrd['Hazard_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard W/Tax - '.date('M. Y', strtotime($hzrd['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $hzrd['Hazard_withtax'] . '</td></tr>' : '');
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_pmpc'] . '</td></tr>' : '');
                    $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_copea'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard COPEA - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_copea'] . '</td></tr>' : '');
                    $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_withtax'] . '</td></tr>' : '');
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard PMPC</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_pmpc'] . '</td></tr>' : '');
                    $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_copea'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard COPEA</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_copea'] . '</td></tr>' : '');
                    $html .= ($row2['Hazard_Status'] != 0 && $row2['Hazard_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfont" style="border: 2px solid;">Hazard W/Tax</td><td colspan="2" class="tdfont" style="text-align: right;">' . $row2['Hazard_withtax'] . '</td></tr>' : '');
                }
            }
            if($numrowsSl > 1){
                while($sL = mysql_fetch_assoc($subslaund2B_a)){
                    $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfontt" style="border: 2px solid;">Subsistence & Laundry PMPC - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $sL['Sublau_pmpc'] . '</td></tr>' : '');
                }
                while($sL = mysql_fetch_assoc($subslaund2B_b)){
                    $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfontt" style="border: 2px solid;">Subsistence & Laundry W/Tax - '.date('M. Y', strtotime($sL['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $sL['Sublau_withtax'] . '</td></tr>' : '');
                }
            }else{
                if($_REQUEST['Mdate']){
                    $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfontt" style="border: 2px solid;">Subsistence & Laundry PMPC - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_pmpc'] . '</td></tr>' : '');
                    $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfontt" style="border: 2px solid;">Subsistence & Laundry W/Tax - '.date('M. Y', strtotime($row2['Date_covered'])).'</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_withtax'] . '</td></tr>' : '');
                }elseif($_REQUEST['Adate']){
                    $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_pmpc'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfontt" style="border: 2px solid;">Subsistence & Laundry PMPC</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_pmpc'] . '</td></tr>' : '');
                    $html .= ($row2['Sublau_Status'] != 0 && $row2['Sublau_withtax'] != 0.00 ? '<tr style="border: 2px solid;"><td colspan="2" class="tdfontt" style="border: 2px solid;">Subsistence & Laundry W/Tax</td><td colspan="2" class="tdfontt" style="text-align: right;">' . $row2['Sublau_withtax'] . '</td></tr>' : '');
                }
            }
            

            $html .= '<tr style="border: 2px solid;">';
            $html .= '<td colspan="2" class="tdfont"><b>Deductions Sub-Total </b></td><td colspan="2" class="tdfont" style="text-align: right; border: 2px solid;">' . number_format($deductionSubTotal, 2) . '</td>';
            $html .= '</tr><tr style="border: 2px solid;">';
            $html .= '<td colspan="3" class="tdfont" style="border-right: none;"><b>Net Other Benefits</b></td><td class="tdfont" style="border-left: none; text-align: right;"><b>' . number_format(str_replace(' ', '', $netOtherBenefitsTotal), 2) . '</b></td>';
            $html .= '</tr>';
            $html .= '</table>';

            $deductionSubTotal1 = $lonPmpc1 + $lonWTax1 + $hazPmpc1 + $hazCopea1 + $hazWTax1 + $sublauPmpc1 + $sublauWTax1;
            $netOtherBenefitsTotal1 = $grTotal - $deductionSubTotal1;
            $takeHomePay = $naT + $netOtherBenefitsTotal1;
            $html .= '<table style="border: 2.5px solid #303030; margin-top: 10px; margin-bottom: 30px; width: 100%; background-color: #A8A8A8;">';
            $html .= '<tr>';
            $html .= '<td class="tdfont" colspan="2" style="padding: 1.7px 0px 1.7px 10px; text-align: center; font-size: 18px;"><b>Summary (NET)</b></td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px; font-size: 16px;">Salaries</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px; font-size: 16px;">' . number_format($naT, 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px; font-size: 16px;">Other Benefits</td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px; font-size: 16px;">' . number_format(str_replace(' ', '', $netOtherBenefitsTotal1), 2) . '&nbsp;</td>';
            $html .= '</tr><tr>';
            $html .= '<td class="tdfont" style="padding: 1.7px 0px 1.7px 10px; font-style: 18px;"><b>NET TAKE HOME PAY</b></td><td class="tdfont" style="text-align: right; padding: 1.7px 0px 1.7px 10px; font-size: 18px;"><b>' . number_format($takeHomePay, 2) . '&nbsp;</b></td>';
            $html .= '</tr>';
            $html .= '</table>';
            
        }

    
            
    }       
}

// $html .= '</div>';

if (isset($_REQUEST['id'])) {
    if (isset($_REQUEST['id']) || isset($_REQUEST['print'])) {
        $mpdf = new mPDF('c', 'A4-L');
    } else {
        $mpdf = new mPDF('c', 'A4-L');
        $mpdf->SetWatermarkImage('../images/watermark.png');
        $mpdf->showWatermarkImage = true;
    }
    $css = file_get_contents('../css/style11.css');
    $mpdf->setAutoTopMargin = 'pad';
    $mpdf->setAutoBottomMargin = 'pad';
    $mpdf->SetTitle('Payslip');

    $mpdf->WriteHTML($css, 1);
    $mpdf->writeHTML($html);
    $mpdf->Output('Payslip.pdf', 'I');
} else {
    echo $html;
}
?>