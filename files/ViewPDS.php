<?php

include '../includes/session.php';
include '../includes/dbcon.php';
include '../includes/functions.php';
require_once('../lib/pdf/mpdf.php');

//
$pdsid = $_SESSION['INTRA_PDS_ID'];

$query = mysql_query("SELECT * FROM table_empinfo WHERE Id = '$pdsid'");
$row = mysql_fetch_assoc($query);

$fbquery = mysql_query("SELECT * FROM table_empinfofb WHERE Pds_Id = '$pdsid'");
$fbrow = mysql_fetch_assoc($fbquery);

$cquery = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid'");
$ccount = mysql_num_rows($cquery);

$eb1query = mysql_query("SELECT * FROM table_empinfoeb WHERE Level = 'Elementary' AND Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 1");
$eb1row = mysql_fetch_assoc($eb1query);
$eb1count = mysql_num_rows($eb1query);

$eb2query = mysql_query("SELECT * FROM table_empinfoeb WHERE Level = 'Secondary' AND Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 1");
$eb2row = mysql_fetch_assoc($eb2query);
$eb2count = mysql_num_rows($eb2query);

$eb3query = mysql_query("SELECT * FROM table_empinfoeb WHERE Level = 'Vocational/Trade Course' AND Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 1");
$eb3row = mysql_fetch_assoc($eb3query);
$eb3count = mysql_num_rows($eb3query);

$eb4query = mysql_query("SELECT * FROM table_empinfoeb WHERE Level = 'College' AND Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 1");
$eb4row = mysql_fetch_assoc($eb4query);
$eb4count = mysql_num_rows($eb4query);

$eb5query = mysql_query("SELECT * FROM table_empinfoeb WHERE Level = 'Graduate Studies' AND Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 1");
$eb5row = mysql_fetch_assoc($eb5query);
$eb5count = mysql_num_rows($eb5query);

$csquery = mysql_query("SELECT * FROM table_empinfocs WHERE Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 7");

$wequery = mysql_query("SELECT * FROM table_empinfowe WHERE Pds_Id = '$pdsid' ORDER BY Inclusive_to desc, Inclusive_from desc LIMIT 28");

$vwquery = mysql_query("SELECT * FROM table_empinfovw WHERE Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 7");

$tpquery = mysql_query("SELECT * FROM table_empinfotp WHERE Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 21");

$oiquery = mysql_query("SELECT * FROM table_empinfooiskills WHERE Pds_Id = '$pdsid' ORDER BY Id asc LIMIT 7");

$oi2query = mysql_query("SELECT * FROM table_empinfooi WHERE Pds_Id = '$pdsid'");
$oi2row = mysql_fetch_assoc($oi2query);

function customShift($array, $id) {
    foreach ($array as $key => $val) {     // loop all elements
        if ($key == $id) {             // check for id $id
            unset($array[$key]);         // unset the $array with id $id
            array_unshift($array, $val); // unshift the array with $val to push in the beginning of array
            return $array;               // return new $array
        }
    }
}

$html = '<div>';

$html .= '<table class="fpTable" border="1">';

$html .= '<tr>';
$html .= '<td colspan="3" style="border-bottom: none;">';
$html .= '<div>';
$html .= '<p style="font-weight: bold; padding-top: -15px; font-size: 11px; font-family: Arial; font-style: italic;">CS Form No. 212</p>';
$html .= '<p style="font-weight: bold; padding-top: -11px; font-size: 9px; font-family: Arial; font-style: italic;">Revised 2017</p>';
$html .= '</div>';

$html .= '<div>';
$html .= '<p style="font-weight: bold; padding-top: -40px; font-size: 22px; font-family: Arial; margin-left: 100px;">';
$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERSONAL DATA SHEET';
$html .= '</p>';
$html .= '</div>';

$html .= '<div>';
$html .= '<p style="font-weight: bold; padding-top: -30px; font-size: 9px; font-family: Arial; font-style: italic;">WARNING: Any misrepresentation made in the Personal Data Sheet and Work Experience Sheet shall cause the filling of administrative/criminal case/s against the person concerned.</p>';
$html .= '<p style="font-weight: bold; padding-top: -8px; font-size: 9px; font-family: Arial; font-style: italic;">READ THE ATTACHED GUIDE TO FILLING THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.</p>';
$html .= '</div>';
$html .= '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="border-top: none; border-right: 2px solid black;">';
$html .= '<p style="letter-spacing: -0.2px; padding-top: -20px; font-size: 8.7px; font-family: Arial;">Print legibly. Tick appropriate boxes (<font class="font31">&#10063;</font>) and use separate sheet if necessary. Indicate N/A if no applicable. DO NOT ABBREVIATE.</p>';
$html .= '</td>';
$html .= '<td style="background-color: #969696; width: 7%; border: 2px solid black;">';
$html .= '<p style="letter-spacing: -0.2px; padding-top: -20px; font-size: 8.7px; font-family: Arial;">1. CS ID No.</p>';
$html .= '</td>';
$html .= '<td style="text-align: right; width: 24%; border: 2px solid black; border-right: 3px solid black;">';
$html .= '<p style="letter-spacing: -0.2px; padding-top: -20px; font-size: 8.7px; font-family: Arial;">(Do not fill up. For CSC use only)</p>';
$html .= '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="border-left: 3px solid black; border-bottom: 1.5px solid black; border-top: 1.5px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">I. PERSONAL INFORMATION</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';

$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; border-bottom: none; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">2.&nbsp;&nbsp;SURNAME</td>';
$html .= '<td colspan="6" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['Lastname']) . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border:-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
$html .= '<td colspan="4" style="width: 290px; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['Firstname']) . '</td>';
$html .= '<td colspan="2" style="border-right: 3px solid black; background-color: #eaeaea; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;"><p>NAME EXTENSION (JR., SR)</p><p>&nbsp;&nbsp;' . ($row['NameExt'] == '' ? 'N/A' : strtoupper($row['NameExt']) ) . '</p></td>';
$html .= '</tr>';
$html .= 'you are my sunshine my only sunshine';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; border-top: none; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
$html .= '<td colspan="6" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['Middlename']) . '</td>';
$html .= '</tr>';

$citizenship = ($row['Citizenship'] == 'Filipino') ? '<img src="../images/filipino.png" style="padding-left: 5px;">' : (($row['Citizenship'] == 'Dual Citizenship') ? '<img src="../images/dual.png" style="padding-left: 5px;">' : '<img src="../images/citizenshipnone.png" style="padding-left: 5px;">');
$type = ($row['Citizenship_by'] == 'by birth') ? '<img src="../images/birth.png" style="padding-left: 90px;">' : (($row['Citizenship_by'] == 'by naturalization') ? '<img src="../images/naturalization.png" style="padding-left: 90px;">' : '<img src="../images/typenone.png" style="padding-left: 90px;">');

$sex = ($row['Sex'] == 'Female') ? '<img src="../images/female.png" style="padding-left: 10px;">' : (($row['Sex'] == 'Male') ? '<img src="../images/male.png" style="padding-left: 10px;">' : '<img src="../images/sexnone.png" style="padding-left: 10px;">');
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">3.&nbsp;&nbsp;DATE OF BIRTH<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)<br>&nbsp;</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . date('m/d/Y', strtotime($row['DateOfBirth'])) . '</td>';
$html .= '<td colspan="2" style="border-bottom: none; font-size: 10.1px; font-family: Arial; padding-left: 5px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px; vertical-align: top;">16. CITIZENSHIP</td>';
$html .= '<td colspan="2" style="border-right: 3px solid black; border-bottom: none; font-size: 10.1px; font-family: Arial; width: 240px;">';
$html .= $citizenship . '<br>' . $type;
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">4. &nbsp;PLACE OF BIRTH</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['PlaceOfBirth']) . '</td>';
$html .= '<td colspan="2" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;">if holder of dual citizenship,</td>';
$html .= '<td colspan="2" style="border-right: 3px solid black; border-top: none; font-size: 10.1px; font-family: Arial; padding-left: 100px; border-bottom: .5px solid #D2D2D2;">';
$html .= '<p style="font-family: Arial; font-size: 9.5px;">Pls. indicate country:</p>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">5. &nbsp;&nbsp;SEX</td>';
$html .= '<td colspan="2">' . $sex . '</td>';
$html .= '<td colspan="2" style="border-top: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px; vertical-align: top;">please indicate the details</td>';
$html .= '<td colspan="2" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; border-top: .5px solid #D2D2D2;">' . strtoupper($row['Citizenship_country']) . '</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';

if ($row['CivilStatus'] == 'Single') {
    $civilstatus = '<img src="../images/single.png" width="145" height="43" style="padding-left: 10px; position: absolute; z-index: -1;">';
} elseif ($row['CivilStatus'] == 'Married') {
    $civilstatus = '<img src="../images/married.png" width="145" height="43" style="padding-left: 10px; position: absolute; z-index: -1;">';
} elseif ($row['CivilStatus'] == 'Widowed') {
    $civilstatus = '<img src="../images/widowed.png" width="145" height="43" style="padding-left: 10px; position: absolute; z-index: -1;">';
} elseif ($row['CivilStatus'] == 'Separated') {
    $civilstatus = '<img src="../images/separated.png" width="145" height="43" style="padding-left: 10px; position: absolute; z-index: -1;">';
} elseif ($row['CivilStatus'] != 'Single' && $row['CivilStatus'] != 'Married' && $row['CivilStatus'] != 'Annulled' && $row['CivilStatus'] != 'Widowed' && $row['CivilStatus'] != 'Separated' && $row['CivilStatus'] != '' && $row['CivilStatus'] != 'N/A') {
    $civilstatus = '<img src="../images/others.png" width="145" height="43" style="padding-left: 10px; position: absolute; z-index: -1;">';
} else {
    $civilstatus = '<img src="../images/civilnone.png" width="145" height="43" style="padding-left: 10px; position: absolute; z-index: -1;">';
}

$query1 = mysql_query("SELECT * FROM table_barangay WHERE barangay_id = '" . $row['RA_barangay'] . "'");
$row1 = mysql_fetch_assoc($query1);
$res1 = ($row['RA_barangay'] == 0) ? 'N/A' : ucwords($row1['barangay']);
$query2 = mysql_query("SELECT * FROM table_city WHERE city_id = '" . $row['RA_city'] . "'");
$row2 = mysql_fetch_assoc($query2);
$res2 = ($row['RA_city'] == 0) ? 'N/A' : ucwords($row2['city']);
$query3 = mysql_query("SELECT * FROM table_province WHERE province_id = '" . $row['RA_province'] . "'");
$row3 = mysql_fetch_assoc($query3);
$res3 = ($row['RA_province'] == 0) ? 'N/A' : ucwords($row3['province']);

$query4 = mysql_query("SELECT * FROM table_barangay WHERE barangay_id = '" . $row['PA_barangay'] . "'");
$row4 = mysql_fetch_assoc($query4);
$res4 = ($row['RA_barangay'] == 0) ? 'N/A' : ucwords($row4['barangay']);
$query5 = mysql_query("SELECT * FROM table_city WHERE city_id = '" . $row['PA_city'] . "'");
$row5 = mysql_fetch_assoc($query5);
$res5 = ($row['RA_city'] == 0) ? 'N/A' : ucwords($row5['city']);
$query6 = mysql_query("SELECT * FROM table_province WHERE province_id = '" . $row['PA_province'] . "'");
$row6 = mysql_fetch_assoc($query6);
$res6 = ($row['RA_province'] == 0) ? 'N/A' : ucwords($row6['province']);

$html .= '<tr>';
$html .= '<td rowspan="2" style="border-top: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px; vertical-align: top;">6.&nbsp;&nbsp;CIVIL STATUS</td>';
$html .= '<td rowspan="2" colspan="2" style="border-top: none; font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 129px; padding-top: 2px; padding-bottom: 2px;">';
$html .= $civilstatus;
$html .= '</td>';
$html .= '<td rowspan="2" colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px; vertical-align: top; width: 132px;">17. RESIDENTIAL ADDRESS</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; border-top: none; font-size: 9.5px; font-family: Arial; padding: 0px 0px 0px 0px; width: 240px;">';
$html .= '<table style="margin-top: -6px; margin-bottom: -6px; width: 100%; border-collapse: collapse; border: none;">';
$html .= '<tr>';
$html .= '<td style="border: 1px solid black; border-bottom: none; border-right: none; border-left: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 104px;">&nbsp;' . $row['RA_house'] . '</td>';
$html .= '<td style="border: 1px solid black; border-bottom: none;border-left: none; border-right: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 131px;">&nbsp;' . $row['RA_street'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-bottom: none; border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">House/Block/Lot No.</td>';
$html .= '<td style="border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-left: none; border-bottom: none; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Street</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" style="border-right: 3px solid black; border-top: none; font-size: 9.5px; font-family: Arial; padding: 0px 0px 0px 0px;">';
$html .= '<table style="margin-top: -6px; margin-bottom: -6px; width: 100%; border-collapse: collapse; border: none;">';
$html .= '<tr>';
$html .= '<td style="border: 1px solid black; border-bottom: none; border-right: none; border-left: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 120px;">&nbsp;' . $row['RA_subvil'] . '</td>';
$html .= '<td style="border: 1px solid black; border-bottom: none;border-left: none; border-right: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 120px;">&nbsp;' . $res1 . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-bottom: none; border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Subdivision/Village</td>';
$html .= '<td style="border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-left: none; border-bottom: none; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Barangay</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">7. &nbsp;HEIGHT (m)</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['Height']) . '</td>';
$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;"></td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial;">';

$html .= '<table style="margin-top: -6px; margin-bottom: -6px; width: 100%; border-collapse: collapse; border: none;">';
$html .= '<tr>';
$html .= '<td style="border: 1px solid black; border-bottom: none; border-right: none; border-left: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 120px;">&nbsp;' . $res2 . '</td>';
$html .= '<td style="border: 1px solid black; border-bottom: none;border-left: none; border-right: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 120px;">&nbsp;' . $res3 . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-bottom: none; border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">City/Municipality</td>';
$html .= '<td style="border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-left: none; border-bottom: none; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Province</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">8. &nbsp;&nbsp;WEIGHT (kg)</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['Weight']) . '</td>';
$html .= '<td colspan="1" style="border-top: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px; text-align: center;">ZIP CODE</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['RZipCode']) . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">9. &nbsp;BLOOD TYPE (m)</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['BloodType']) . '</td>';
$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px; vertical-align: top; width: 132px;">18. PERMANENT ADDRESS</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial;">';
$html .= '<table style="margin-top: -6px; margin-bottom: -6px; width: 100%; border-collapse: collapse; border: none;">';
$html .= '<tr>';
$html .= '<td style="border: 1px solid black; border-bottom: none; border-right: none; border-left: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 110px;">&nbsp;' . $row['PA_house'] . '</td>';
$html .= '<td style="border: 1px solid black; border-bottom: none;border-left: none; border-right: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 130px;">&nbsp;' . $row['PA_street'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-bottom: none; border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">House/Block/Lot No.</td>';
$html .= '<td style="border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-left: none; border-bottom: none; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Street</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">10. &nbsp;GSIS ID NO.</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['GSIS']) . '</td>';
$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;"></td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial;">';
$html .= '<table style="margin-top: -6px; margin-bottom: -6px; width: 100%; border-collapse: collapse; border: none;">';
$html .= '<tr>';
$html .= '<td style="border: 1px solid black; border-bottom: none; border-right: none; border-left: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 134px;">&nbsp;' . $row['PA_subvil'] . '</td>';
$html .= '<td style="border: 1px solid black; border-bottom: none;border-left: none; border-right: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 106px;">&nbsp;' . $res4 . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-bottom: none; border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Subdivision/Village</td>';
$html .= '<td style="border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-left: none; border-bottom: none; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Barangay</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">11. &nbsp;PAG-IBIG ID NO.</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['PAGIBIG']) . '</td>';
$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;"></td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial;">';
$html .= '<table style="margin-top: -6px; margin-bottom: -6px; width: 100%; border-collapse: collapse; border: none;">';
$html .= '<tr>';
$html .= '<td style="border: 1px solid black; border-bottom: none; border-right: none; border-left: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 116px;">&nbsp;' . $res5 . '</td>';
$html .= '<td style="border: 1px solid black; border-bottom: none;border-left: none; border-right: none; border-top: none; font-size: 8px; font-family: Arial; text-align: center; padding: 2px 0px 0px 0px; width: 124px;">&nbsp;' . $res6 . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-bottom: none; border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">City/Municipality</td>';
$html .= '<td style="border-top: 1px solid gray; font-family: Arial; font-size: 7.8px; font-style: italic; text-align: center; border-left: none; border-bottom: none; border-right: none; padding: 0px 0px 0px 0px; color: #5A5A5A;">Province</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">12. &nbsp;&nbsp;PHILHEALTH NO.</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['PHILHEALTH']) . '</td>';
$html .= '<td colspan="1" style="border-top: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px; text-align: center;">ZIP CODE</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['PZipCode']) . '</td>';
$html .= '</tr>';


$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">13. &nbsp;SSS NO.</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['SSS']) . '</td>';
$html .= '<td colspan="1" style="font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">19. TELEPHONE NO.</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['PTelephoneNo']) . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">14. &nbsp;TIN NO.</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['TIN']) . '</td>';
$html .= '<td colspan="1" style="font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">20. MOBILE NO.</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['CellphoneNo']) . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">15. &nbsp;AGENCY EMPLOYEE NO.</td>';
$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($row['AgencyEmpNo']) . '</td>';
$html .= '<td colspan="1" style="font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">21. EMAIL ADDRESS (if any)</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $row['Email'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';

$html .= '<tr>';
$html .= '<td colspan="7" style="border-right: 3px solid black; border: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">II. FAMILY BACKGROUND</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';

$c1query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1");
$c1row = mysql_fetch_assoc($c1query);
$noc1 = ($c1row['Name_ofchild'] == '') ? '' : strtoupper($c1row['Name_ofchild']);
$dob1 = ($c1row['Date_ofbirth'] == '' || $c1row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c1row['Date_ofbirth']));

$c2query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 1");
$c2row = mysql_fetch_assoc($c2query);
$noc2 = ($c2row['Name_ofchild'] == '') ? '' : strtoupper($c2row['Name_ofchild']);
$dob2 = ($c2row['Date_ofbirth'] == '' || $c2row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c2row['Date_ofbirth']));

$c3query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 2");
$c3row = mysql_fetch_assoc($c3query);
$noc3 = ($c3row['Name_ofchild'] == '') ? '' : strtoupper($c3row['Name_ofchild']);
$dob3 = ($c3row['Date_ofbirth'] == '' || $c3row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c3row['Date_ofbirth']));

$c4query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 3");
$c4row = mysql_fetch_assoc($c4query);
$noc4 = ($c4row['Name_ofchild'] == '') ? '' : strtoupper($c4row['Name_ofchild']);
$dob4 = ($c4row['Date_ofbirth'] == '' || $c4row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c4row['Date_ofbirth']));

$c5query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 4");
$c5row = mysql_fetch_assoc($c5query);
$noc5 = ($c5row['Name_ofchild'] == '') ? '' : strtoupper($c5row['Name_ofchild']);
$dob5 = ($c5row['Date_ofbirth'] == '' || $c5row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c5row['Date_ofbirth']));

$c6query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 5");
$c6row = mysql_fetch_assoc($c5query);
$noc6 = ($c6row['Name_ofchild'] == '') ? '' : strtoupper($c6row['Name_ofchild']);
$dob6 = ($c6row['Date_ofbirth'] == '' || $c6row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c6row['Date_ofbirth']));

$c7query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 6");
$c7row = mysql_fetch_assoc($c5query);
$noc7 = ($c7row['Name_ofchild'] == '') ? '' : strtoupper($c7row['Name_ofchild']);
$dob7 = ($c7row['Date_ofbirth'] == '' || $c7row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c7row['Date_ofbirth']));

$c8query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 7");
$c8row = mysql_fetch_assoc($c5query);
$noc8 = ($c8row['Name_ofchild'] == '') ? '' : strtoupper($c8row['Name_ofchild']);
$dob8 = ($c8row['Date_ofbirth'] == '' || $c8row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c8row['Date_ofbirth']));

$c9query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 8");
$c9row = mysql_fetch_assoc($c5query);
$noc9 = ($c9row['Name_ofchild'] == '') ? '' : strtoupper($c9row['Name_ofchild']);
$dob9 = ($c9row['Date_ofbirth'] == '' || $c9row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c9row['Date_ofbirth']));

$c10query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 9");
$c10row = mysql_fetch_assoc($c10query);
$noc10 = ($c10row['Name_ofchild'] == '') ? '' : strtoupper($c10row['Name_ofchild']);
$dob10 = ($c10row['Date_ofbirth'] == '' || $c10row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c10row['Date_ofbirth']));

$c11query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 10");
$c11row = mysql_fetch_assoc($c11query);
$noc11 = ($c11row['Name_ofchild'] == '') ? '' : strtoupper($c11row['Name_ofchild']);
$dob11 = ($c11row['Date_ofbirth'] == '' || $c11row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c11row['Date_ofbirth']));

$c12query = mysql_query("SELECT * FROM table_empinfofbchild WHERE Pds_Id = '$pdsid' ORDER BY Id ASC LIMIT 1 OFFSET 11");
$c12row = mysql_fetch_assoc($c12query);
$noc12 = ($c12row['Name_ofchild'] == '') ? '' : strtoupper($c12row['Name_ofchild']);
$dob12 = ($c12row['Date_ofbirth'] == '' || $c12row['Date_ofbirth'] == '0000-00-00') ? '' : date("m/d/Y", strtotime($c12row['Date_ofbirth']));

$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">22. &nbsp;SPOUSE\'S SURNAME</td>';
$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_sname']) . '</td>';
$html .= '<td colspan="3" style="font-size: 8.7px; font-family: Arial; padding-left: 0px; background-color: #eaeaea; width: 200px; letter-spacing: -.5px;">23. NAME of CHILDREN(Write full name and list all)</td>';
$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 8.2px; font-family: Arial; padding-left: 0px; background-color: #eaeaea; letter-spacing: -.5px;">DATE OF BIRTH (mm/dd/yyyy)</td>';
$html .= '</tr>';

if ($ccount != 0) {
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
    $html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 179px;">' . strtoupper($fbrow['Spouse_fname']) . '</td>';
    $html .= '<td colspan="1" style="background-color: #eaeaea; width: 135px; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;"><p>NAME EXTENSION (JR., SR)</p><p style="margin-left: 60px;">' . strtoupper($fbrow['Spouse_extname']) . '</p></td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $noc1 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob1 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_mname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc2 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob2 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OCCUPATION</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_occupation']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc3 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob3 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.2px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYER/BUSINESS NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_empbusname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc4 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob4 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUSINESS ADDRESS</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_busadd']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc5 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob5 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEPHONE NO.</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_telephone']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc6 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $dob6 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">24. &nbsp;FATHER\'S SURNAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Father_sname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc7 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob7 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
    $html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 179px;">' . strtoupper($fbrow['Father_fname']) . '</td>';
    $html .= '<td colspan="1" style="background-color: #eaeaea; width: 135px; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;"><p>NAME EXTENSION (JR., SR) </p><p style="margin-left: 20px;">' . strtoupper($fbrow['Father_extname']) . '</p></td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc8 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob8 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Father_mname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc9 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob9 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">25. &nbsp;MOTHER\'S MAIDEN NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_maiden']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc10 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align; center;">' . $dob10 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.2px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SURNAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_sname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc11 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $dob11 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_fname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc12 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center">' . $dob12 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-top: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_sname']) . '</td>';
    $html .= '<td colspan="6" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
    $html .= '</tr>';
} else {
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
    $html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 179px;">' . strtoupper($fbrow['Spouse_fname']) . '</td>';
    $html .= '<td colspan="1" style="background-color: #eaeaea; width: 135px; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;"><p>NAME EXTENSION (JR., SR)</p><p style="margin-left: 60px;">' . strtoupper($fbrow['Spouse_extname']) . '</p></td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">N/A</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">N/A</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_mname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc2 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob2 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OCCUPATION</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_occupation']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc3 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob3 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.2px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYER/BUSINESS NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_empbusname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc4 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob4 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUSINESS ADDRESS</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_busadd']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc5 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob5 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEPHONE NO.</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Spouse_telephone']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc6 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $dob6 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">24. &nbsp;FATHER\'S SURNAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Father_sname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc7 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob7 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
    $html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 179px;">' . strtoupper($fbrow['Father_fname']) . '</td>';
    $html .= '<td colspan="1" style="background-color: #eaeaea; width: 135px; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;"><p>NAME EXTENSION (JR., SR) </p><p style="margin-left: 20px;">' . strtoupper($fbrow['Father_extname']) . '</p></td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc8 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob8 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Father_mname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc9 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center;">' . $dob9 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">25. &nbsp;MOTHER\'S MAIDEN NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_maiden']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc10 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align; center;">' . $dob10 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.2px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SURNAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_sname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc11 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $dob11 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_fname']) . '</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . $noc12 . '</td>';
    $html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; text-align: center">' . $dob12 . '</td>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td style="border-top: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
    $html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">' . strtoupper($fbrow['Mother_sname']) . '</td>';
    $html .= '<td colspan="6" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
    $html .= '</tr>';
}

$html .= '<tr>';
$html .= '<td colspan="10" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">III. EDUCATIONAL BACKGROUND</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';

$html .= '<tr>';
$html .= '<td rowspan="2" style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">26. &nbsp;LEVEL</td>';
$html .= '<td rowspan="2" style="width: 180px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">NAME OF SCHOOL<br>(Write in full)</td>';
$html .= '<td rowspan="2" style="width: 150px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">BASIC EDUCATION/DEGREE/COURSE<br>(Write in full)</td>';
$html .= '<td colspan="2" style="width: 100px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">PERIOD OF ATTENDACE</td>';
$html .= '<td rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">HIGHEST LEVEL/<br>UNITS EARNED<br>(if not graduated)</td>';
$html .= '<td rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">YEAR<br>GRADUATED</td>';
$html .= '<td rowspan="2" style="width: 70px;font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;">SCHOLARSHIP/<br>ACADEMIC<br>HONORS<br>RECEIVED</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="width: 27px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">From</td>';
$html .= '<td style="width: 27px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
$html .= '</tr>';

if ($eb1count != 0) {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">ELEMENTARY</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: left; padding: 0px 3px 0px 3px;">' . strtoupper($eb1row['Name']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb1row['Degree']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb1row['Year']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb1row['Highest']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb1row['Date_from']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb1row['Date_to']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . strtoupper($eb1row['Scholar']) . '</td>';
    $html .= '</tr>';
} else {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">ELEMENTARY</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
    $html .= '</tr>';
}

if ($eb2count != 0) {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">SECONDARY</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: left; padding: 0px 3px 0px 3px;">' . strtoupper($eb2row['Name']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb2row['Degree']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb2row['Year']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb2row['Highest']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb2row['Date_from']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb2row['Date_to']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . strtoupper($eb2row['Scholar']) . '</td>';
    $html .= '</tr>';
} else {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">SECONDARY</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
    $html .= '</tr>';
}

if ($eb3count != 0) {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">VOCATIONAL/<br>TRADE COURSE</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: left; padding: 0px 3px 0px 3px;">' . strtoupper($eb3row['Name']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb3row['Degree']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb3row['Year']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb3row['Highest']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb3row['Date_from']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb3row['Date_to']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . strtoupper($eb3row['Scholar']) . '</td>';
    $html .= '</tr>';
} else {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">VOCATIONAL/<br>TRADE COURSE</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
    $html .= '</tr>';
}

if ($eb4count != 0) {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">COLLEGE</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: left; padding: 0px 3px 0px 3px;">' . strtoupper($eb4row['Name']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb4row['Degree']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb4row['Year']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb4row['Highest']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb4row['Date_from']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb4row['Date_to']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . strtoupper($eb4row['Scholar']) . '</td>';
    $html .= '</tr>';
} else {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">COLLEGE</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
    $html .= '</tr>';
}

if ($eb5count != 0) {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">GRADUATE STUDIES</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: left; padding: 0px 3px 0px 3px;">' . strtoupper($eb5row['Name']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb5row['Degree']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb5row['Year']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb5row['Highest']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb5row['Date_from']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . strtoupper($eb5row['Date_to']) . '</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . strtoupper($eb5row['Scholar']) . '</td>';
    $html .= '</tr>';
} else {
    $html .= '<tr>';
    $html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">GRADUATE STUDIES</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
    $html .= '<td style="height: 40px; font-size: 8.7px; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
    $html .= '</tr>';
}

$html .= '<tr>';
$html .= '<td colspan="8" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="1" style="border-top: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; border-left: 3px solid black; background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">SIGNATURE</td>';
$html .= '<td colspan="2" style="border-top: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; "></td>';
$html .= '<td colspan="2" style="border-top: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black;  background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">DATE</td>';
$html .= '<td colspan="3" style="border-top: 3px solid black; border-bottom: 3px solid black; border-right: 3px solid black;"></td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<p style="padding-left: 640px; padding-top: -8px; font-family: Arial; font-size: 7.5px; font-style: italic; letter-spacing: -.5px;">CS FORM 212 (Revised 2017), Page 1 of 4</p>';

$html .= '</div>';

$html .= '<pagebreak />';


$html .= '<table class="fpTable" border="1">';
$html .= '<tr>';
$html .= '<td style="background-color: #969696; padding-top: .5px;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">IV. CIVIL SERVICE ELIGIBILITY</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td rowspan="2" style="width: 32%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">27. &nbsp;CAREER SERVICE/RA 1080 (BOARD/ BAR) UNDER <br> SPECIAL LAWS/ CES/ CSEE <br>BARANGAY ELIGIBILITY /DRIVERS LICENSE</td>';
$html .= '<td rowspan="2" style="width: 70px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">RATING<br>(if Applicable)</td>';
$html .= '<td rowspan="2" style="width: 70px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">DATE OF<br>EXAMINATION /<br>CONFERMENT</td>';
$html .= '<td rowspan="2" style="width: 200px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">PLACE OF EXAMINATION/CONFERMENT</td>';
$html .= '<td colspan="2" style="width: 100px; border-right: 3px solid black; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">LICENSE (if Applicable)</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="width: 55px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">NUMBER</td>';
$html .= '<td style="width: 45px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; border-right: 3px solid black;">Date of<br>Validity</td>';
$html .= '</tr>';

while ($csrow = mysql_fetch_assoc($csquery)) {
    $expl = explode(' ', $csrow['Date_ofexam']);
    $countExpl = count($expl);
    $dataoe = ($countExpl < 2 ? $csrow['Date_ofexam'] : $expl[0]);
    $cs1 = ($csrow['Career_service'] == '' || $csrow['Career_service'] == 'N/A') ? 'N/A' : strtoupper($csrow['Career_service']);
    $cs2 = ($csrow['Rating'] == '' || $csrow['Rating'] == '0') ? 'N/A' : $csrow['Rating'];
    $cs3 = ($csrow['Date_ofexam'] == '' || $csrow['Date_ofexam'] == 'N/A') ? 'N/A' : $dataoe;
    $cs4 = ($csrow['Place_ofexam'] == '' || $csrow['Place_ofexam'] == 'N/A') ? 'N/A' : strtoupper($csrow['Place_ofexam']);
    $cs5 = ($csrow['Number'] == '' || $csrow['Number'] == 'N/A') ? 'N/A' : strtoupper($csrow['Number']);
    $cs6 = ($csrow['Date_ofrelease'] == '0000-00-00' || $csrow['Date_ofrelease'] == '1970-01-01') ? 'N/A' : date('m/d/Y', strtotime($csrow['Date_ofrelease']));

    $html .= '<tr>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $cs1 . '</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $cs2 . '%</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $cs3 . '</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $cs4 . '</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $cs5 . '</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . $cs6 . '</td>';
    $html .= '</tr>';
}

$csnum = 7 - mysql_num_rows($csquery);

for ($i = 1; $i <= $csnum; $i++) {
    if ($i == 1) {
        $html .= '<tr>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
        $html .= '</tr>';
    } else {
        $html .= '<tr>';
        $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 27px;"></td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
        $html .= '</tr>';
    }
}

$html .= '<tr>';
$html .= '<td colspan="6" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="6" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">V. WORK EXPERIENCE<br><p style="font-size: 10px;">(Including private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experince sheet.</p></td>';
$html .= '</tr>';

$html .= '</table>';


$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td colspan="2" style="width: 130px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">28. &nbsp;INCLUSIVE DATES<br>(mm/dd/yyyy)</td>';
$html .= '<td rowspan="2" style="width: 200px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">POSITION TITLE<br>(Write in full/Do not abbreviate)</td>';
$html .= '<td rowspan="2" style="width: 195px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">DEPARTMENT / AGENCY / OFFICE / COMPANY<br>(Write in ful/Do not abbreviate)</td>';
$html .= '<td rowspan="2" style="width: 65px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">MONTHLY<br>SALARY</td>';
$html .= '<td rowspan="2" style="width: 65px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">SALARY/ JOB/<br>PAY GRADE (if<br>applicable)& STEP<br>(Format "00-0")/<br>INCREMENT</td>';
$html .= '<td rowspan="2" style="width: 70px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">STATUS OF APPOINTMENT</td>';
$html .= '<td rowspan="2" style="width: 60px; border-right: 3px solid black; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">GOV\'T<br>SERVICE<br>(Y/N)</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; border-left: 3px solid black;">From</td>';
$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
$html .= '</tr>';

$array = [];
$key = 0;
$x = 0;
while ($werow = mysql_fetch_array($wequery)) {
    $array[$x] = $werow;
    if ($werow['Inclusive_to'] == '1910-01-01') {
        $key = $x;
    }
    $x++;
}
//($row['DateOfBirth'] == 'N/A' || $row['DateOfBirth'] == '0000-00-00' || $row['DateOfBirth'] == '1970-01-01') ? 'N/A' : $row['DateOfBirth']
$array = customShift($array, $key);
$werow = "";
if (count($array) > 0) {
    foreach ($array as $werow) {
        $we1 = ($werow['Inclusive_from'] == '' || $werow['Inclusive_from'] == '0000-00-00') ? 'N/A' : date('m/d/Y', strtotime($werow['Inclusive_from']));
        $we2 = ($werow['Inclusive_to'] == '' || $werow['Inclusive_to'] == '0000-00-00') ? 'N/A' : (($werow['Inclusive_to']) == '1910-01-01' ? 'Present' : date('m/d/Y', strtotime($werow['Inclusive_to'])));
        $we3 = ($werow['Position'] == '' || $werow['Position'] == 'N/A') ? 'N/A' : strtoupper($werow['Position']);
        $we4 = ($werow['Department_agencyoffice'] == '' || $werow['Department_agencyoffice'] == 'N/A') ? 'N/A' : strtoupper($werow['Department_agencyoffice']);
        $we5 = ($werow['Monthly_salary'] == '' || $werow['Monthly_salary'] == 'N/A') ? 'N/A' : number_format(preg_replace("/[^0-9]/","",$werow['Monthly_salary']), 2);
        $we6 = ($werow['Salary_grade'] == '' || $werow['Salary_grade'] == 'N/A') ? 'N/A' : $werow['Salary_grade'];
        $we7 = ($werow['Status_ofappointment'] == '' || $werow['Status_ofappointment'] == 'N/A') ? 'N/A' : strtoupper($werow['Status_ofappointment']);
        $we8 = ($werow['Gov_service'] == '' || $werow['Gov_service'] == 'N/A') ? 'N/A' : (($werow['Gov_service'] == 'Yes') ? 'Y' : 'N');
        
        $html .= '<tr>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $we1 . '</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $we2 . '</td>';
        $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $we3 . '</td>';
        $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $we4 . '</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $we5 . '</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $we6 . ' </td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $we7 . '</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . $we8 . '</td>';
        $html .= '</tr>';
    }
}
$wenum = 28 - mysql_num_rows($wequery);
for ($i = 1; $i <= $wenum; $i++) {
    if ($i == 1) {
        $html .= '<tr>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
        $html .= '</tr>';
    } else {
        $html .= '<tr>';
        $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 27px;">&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
        $html .= '</tr>';
    }
}
$html .= '<tr>';
$html .= '<td colspan="8" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td style="width: 128px; border-right: 3px solid black; border-bottom: 3px solid black; border-left: 3px solid black; background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">SIGNATURE</td>';
$html .= '<td style="width: 280px; border-right: 3px solid black; border-bottom: 3px solid black; "></td>';
$html .= '<td style="width: 102px; border-right: 3px solid black; border-bottom: 3px solid black;  background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">DATE</td>';
$html .= '<td style="border-bottom: 3px solid black; border-right: 3px solid black;"></td>';
$html .= '</tr>';

$html .= '</table>';
$html .= '<p style="padding-left: 640px; padding-top: -8px; font-family: Arial; font-size: 7.5px; font-style: italic; letter-spacing: -.5px;">CS FORM 212 (Revised 2017), Page 2 of 4</p>';



$html .= '<pagebreak />';


$html .= '<table class="fpTable" border="1">';
$html .= '<tr>';
$html .= '<td style="background-color: #969696; padding-top: .5px;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVI / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td rowspan="2" style="width: 330px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">29. &nbsp;NAME & ADDRESS OF ORGANIZATION<br>(Write in full)</td>';
$html .= '<td colspan="2" style="width: 120px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">INCLUSIVE DATES<br>(mm/dd/yyyy)</td>';
$html .= '<td rowspan="2" style="width: 70px; font-size: 7.5px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">NUMBER OF HOURS</td>';
$html .= '<td colspan="2" rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;">POSITION / NATURE OF WORK</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">From</td>';
$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
$html .= '</tr>';

while ($vwrow = mysql_fetch_array($vwquery)) {
    $vw1 = ($vwrow['Nameadd'] == '' || $vwrow['Nameadd'] == 'N/A') ? 'N/A' : strtoupper($vwrow['Nameadd']);
    $vw2 = ($vwrow['Inclusive_from'] == '' || $vwrow['Inclusive_from'] == 'N/A') ? 'N/A' : strtoupper($vwrow['Inclusive_from']);
    $vw3 = ($vwrow['Inclusive_to'] == '' || $vwrow['Inclusive_to'] == 'N/A') ? 'N/A' : strtoupper($vwrow['Inclusive_to']);
    $vw4 = ($vwrow['Number_ofhours'] == '' || $vwrow['Number_ofhours'] == '0') ? 'N/A' : $vwrow['Number_ofhours'];
    $vw5 = ($vwrow['Position'] == '' || $vwrow['Position'] == 'N/A') ? 'N/A' : strtoupper($vwrow['Position']);

    $html .= '<tr>';
    $html .= '<td style="height: 27px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $vw1 . '</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $vw2 . '</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $vw3 . '</td>';
    $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $vw4 . '</td>';
    $html .= '<td style="height: 27px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;border-right: 3px solid black;" colspan="2">' . $vw5 . '</td>';
    $html .= '</tr>';
}
$vwnum = 7 - mysql_num_rows($vwquery);
for ($i = 1; $i <= $vwnum; $i++) {
    if ($i == 1) {
        $html .= '<tr>';
        $html .= '<td style="height: 27px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 27px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;border-right: 3px solid black;" colspan="2">N/A</td>';
        $html .= '</tr>';
    } else {
        $html .= '<tr>';
        $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 25px;">&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td colspan="2" style="border-right: 3px solid black;">&nbsp;</td>';
        $html .= '</tr>';
    }
}
$html .= '<tr>';
$html .= '<td colspan="6" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="6" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED<br><p style="font-size: 8px;">(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)</p></td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td rowspan="2" style="width: 330px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">29. &nbsp;TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br>(Write in full)</td>';
$html .= '<td colspan="2" style="width: 120px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">INCLUSIVE DATES OF<br>ATTENDANCE<br>(mm/dd/yyyy)</td>';
$html .= '<td rowspan="2" style="width: 70px; font-size: 7.2px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">NUMBER OF HOURS</td>';
$html .= '<td rowspan="2" style="width: 65px; font-size: 7.5px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">Type of LD<br>(Managerial/<br>Supervisory<br>Technical/etc)</td>';
$html .= '<td rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;"> CONDUCTED/ SPONSORED BY<br>(Write in full)</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">From</td>';
$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
$html .= '</tr>';

while ($tprow = mysql_fetch_array($tpquery)) {
    $tp1 = ($tprow['Title_ofseminar'] == 'N/A' || $tprow['Title_ofseminar'] == '') ? 'N/A' : strtoupper($tprow['Title_ofseminar']);
    $tp2 = ($tprow['Inclusive_from'] == '0000-00-00' || $tprow['Inclusive_from'] == '') ? 'N/A' : date('m/d/Y', strtotime($tprow['Inclusive_from']));
    $tp3 = ($tprow['Inclusive_to'] == '0000-00-00' || $tprow['Inclusive_to'] == '') ? 'N/A' : date('m/d/Y', strtotime($tprow['Inclusive_to']));
    $tp4 = ($tprow['Number_ofhours'] == '0' || $tprow['Number_ofhours'] == '') ? 'N/A' : $tprow['Number_ofhours'];
    $tp5 = ($tprow['LD_type'] == '0' || $tprow['LD_type'] == '') ? 'N/A' : $tprow['LD_type'];
    $tp6 = ($tprow['Sponsored_by'] == 'N/A' || $tprow['Sponsored_by'] == '') ? 'N/A' : strtoupper($tprow['Sponsored_by']);

    $html .= '<tr>';
    $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $tp1 . '</td>';
    $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $tp3 . '</td>';
    $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $tp4 . '</td>';
    $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $tp4 . '</td>';
    $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $tp5 . '</td>';
    $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . $tp6 . '</td>';
    $html .= '</tr>';
}
$tpnum = 21 - mysql_num_rows($tpquery);
for ($i = 1; $i <= $tpnum; $i++) {
    if ($i == 1) {
        $html .= '<tr>';
        $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 8.3vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 24px; font-size: 7.5vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
        $html .= '</tr>';
    } else {
        $html .= '<tr>';
        $html .= '<td style="height: 25px; border-left: 3px solid black;"></td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
        $html .= '</tr>';
    }
}
$html .= '<tr>';
$html .= '<td colspan="6" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="6" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">VIII. OTHER INFORMATION<br><p style="font-size: 8px;"></p></td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td style="width: 210px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">31. &nbsp;SPECIAL SKILLS and HOBBIES </td>';
$html .= '<td style="width: 367px;font-size: 7.5px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">32. &nbsp;NON-ACADEMIC DISTINCTIONS / RECOGNITION<br>(Write in full)</td>';
$html .= '<td style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;">33. &nbsp;MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br>(Write in full)</td>';
$html .= '</tr>';

while ($oirow = mysql_fetch_array($oiquery)) {
    $oi1 = ($oirow['Special_skills'] == '' || $oirow['Special_skills'] == 'N/A') ? 'N/A' : strtoupper($oirow['Special_skills']);
    $oi2 = ($oirow['Recognition'] == '' || $oirow['Recognition'] == 'N/A') ? 'N/A' : strtoupper($oirow['Recognition']);
    $oi3 = ($oirow['Organization'] == '' || $oirow['Organization'] == 'N/A') ? 'N/A' : strtoupper($oirow['Organization']);

    $html .= '<tr>';
    $html .= '<td style="height: 25px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $oi1 . '</td>';
    $html .= '<td style="height: 25px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $oi2 . '</td>';
    $html .= '<td style="height: 25px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">' . $oi3 . '</td>';
    $html .= '</tr>';
}
$oinum = 7 - mysql_num_rows($oiquery);
for ($i = 1; $i <= $oinum; $i++) {
    if ($i == 1) {
        $html .= '<tr>';
        $html .= '<td style="height: 25px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">N/A</td>';
        $html .= '<td style="height: 25px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">N/A</td>';
        $html .= '<td style="height: 25px; font-size: 7.8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-right: 3px solid black;">N/A</td>';
        $html .= '</tr>';
    } else {
        $html .= '<tr>';
        $html .= '<td style="border-left: 3px solid black; height: 25px;">&nbsp;</td>';
        $html .= '<td>&nbsp;</td>';
        $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
        $html .= '</tr>';
    }
}
$html .= '<tr>';
$html .= '<td colspan="3" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td style="width: 210px; border-right: 3px solid black; border-bottom: 3px solid black; border-left: 3px solid black; background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">SIGNATURE</td>';
$html .= '<td style="width: 268px; border-right: 3px solid black; border-bottom: 3px solid black; "></td>';
$html .= '<td style="width: 102px; border-right: 3px solid black; border-bottom: 3px solid black;  background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">DATE</td>';
$html .= '<td style="border-bottom: 3px solid black; border-right: 3px solid black;"></td>';
$html .= '</tr>';

$html .= '</table>';
$html .= '<p style="padding-left: 640px; padding-top: -8px; font-family: Arial; font-size: 7.5px; font-style: italic; letter-spacing: -.5px;">CS FORM 212 (Revised 2017), Page 3 of 4</p>';

$html .= '<pagebreak />';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td colspan="2" style="background-color: #969696; padding-top: .5px; border: 3px solid black;"></td>';
$html .= '</tr>';

//($oi2row['Que36_a'] == 'No) ? '<img src="../images/no.png">' : (($oi2row['Que36_a'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">')
//if ($oi2row['Que36_a'] == 'No') {
//    $que36a = '<img src="../images/no.png">';
//} elseif ($oi2row['Que36_a'] == 'Yes') {
//    $que36a = '<img src="../images/yes.png">';
//} elseif ($oi2row['Que36_a'] == 'NA' || $oi2row['Que36'] == '') {
//    $que36a = '<img src="../images/none.png">';
//} 
$que34a = ($oi2row['Que34_a'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que34_a'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que34b = ($oi2row['Que34_b'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que34_b'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que35a = ($oi2row['Que35_a'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que35_a'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que35b = ($oi2row['Que35_b'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que35_b'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que36 = ($oi2row['Que36'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que36'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que37 = ($oi2row['Que37'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que37'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que38a = ($oi2row['Que38_a'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que38_a'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que38b = ($oi2row['Que38_b'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que38_b'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que39 = ($oi2row['Que39'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que39'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que40a = ($oi2row['Que40_a'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que40_a'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que40b = ($oi2row['Que40_b'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que40_b'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');
$que40c = ($oi2row['Que40_c'] == 'No') ? '<img src="../images/no.png">' : (($oi2row['Que40_c'] == 'Yes') ? '<img src="../images/yes.png">' : '<img src="../images/none.png">');

//---------------------------34-----------------------
$html .= '<tr>';
$html .= '<td style="width: 480px; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 5px; border-left: 3px solid black;">34. &nbsp;Are you related by consanguinity or affinity to the appointing or recommending authority, or to the<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;chief of bureau or office or to the person who has immediate supervision over you in the Office, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bureau or Department where you will be apppointed, </td>';
$html .= '<td style="padding-top: .5px; border-bottom: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. within the third degree?</td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black; padding-left: 35px;">' . $que34a . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. within the fourth degree (for Local Government Unit - Career Employees)?</td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black; padding-left: 35px;">' . $que34b . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;">';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 90%;">';
$html .= '<tr>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details1'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black; border-top: none;"></td>';
$html .= '</tr>';

//------------------------35-----------------------------

$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">35. &nbsp;a.  Have you ever been found guilty of any administrative offense?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black; padding-left: 35px;">' . $que35a . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top:1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;">';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 90%;">';
$html .= '<tr>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details2'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Have you been criminally charged before any court?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black; padding-left: 35px;">' . $que35b . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;"><div style="width: 150px;">';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 94%;">';
$html .= '<tr>';
$html .= '<td style="width:95px; font-family: Arial; font-size: 11px; text-align: right; border: none;">Date field: &nbsp;</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details3'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;">';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 94%;">';
$html .= '<tr>';
$html .= '<td style="width:95px; font-family: Arial; font-size: 11px; text-align: right; border: none;">Status of Case/s: &nbsp;</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details4'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';

//------------------------------36----------------------------

$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">36. &nbsp;Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by any court or tribunal?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que36 . '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;">';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 90%;">';
$html .= '<tr>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details5'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';

//------------------------------37----------------------------

$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">37. &nbsp;Have you ever been separated from the service in any of the following modes: resignation,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;out (abolition) in the public or private sector?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que37 . '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:<br><div style="width: 150px;"></div>';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 90%;">';
$html .= '<tr>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details6'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';

//------------------------------38----------------------------

$html .= '<tr>';
$html .= '<td style="width: 480px; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">38. &nbsp;a. Have you ever been a candidate in a national or local election held within the last year (except<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Barangay election)?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que38a . '<br>';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 94%; margin-bottom: 3px;">';
$html .= '<tr>';
$html .= '<td style="width: 105px; font-family: Arial; font-size: 11px; text-align: right; border: none;">If YES, give details: &nbsp;</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details7'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Have you resigned from the government service during the three (3)-month period before the last<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;election to promote/actively campaign for a national or local candidate?</td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que38b . '<br>';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 94%; margin-bottom: 3px;">';
$html .= '<tr>';
$html .= '<td style="width: 105px; font-family: Arial; font-size: 11px; text-align: right; border: none;">If YES, give details: &nbsp;</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details8'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';

//------------------------------39----------------------------

$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">39. &nbsp;Have you acquired the status of an immigrant or permanent resident of another country?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que39 . '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details (country):</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;">';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 90%;">';
$html .= '<tr>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details9'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';

//------------------------------40----------------------------

$html .= '<tr>';
$html .= '<td style="width: 480px; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">40. &nbsp;Pursuant to: (a) Indigenous People\'s Act (RA 8371); (b) Magna Carta for Disabled Persons (RA<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-bottom: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none;border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">a. Are you a member of any indigenous group?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none;border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que40a . '<br>';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 94%; margin-bottom: 3px;">';
$html .= '<tr>';
$html .= '<td style="width: 107px; font-family: Arial; font-size: 11px; text-align: right; border: none; letter-spacing: -.5px;">If YES, please specify: &nbsp;</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details10'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">b. Are you a person with disability?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que40b . '<br>';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 94%; margin-bottom: 3px;">';
$html .= '<tr>';
$html .= '<td style="width: 133px; font-family: Arial; font-size: 11px; text-align: left; border: none; letter-spacing: -.5px;">If YES, please specify ID No.: &nbsp;</td>';
$html .= '<td style=" width: 120px; border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details11'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;">c. Are you a solo parent?</td>';
$html .= '<td style="padding-top: 1px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $que40c . '<br>';
$html .= '<table border="1" align="center" style="border-collapse: collapse; width: 94%; margin-bottom: 3px;">';
$html .= '<tr>';
$html .= '<td style="width: 133px; font-family: Arial; font-size: 11px; text-align: left; border: none; letter-spacing: -.5px;">If YES, please specify ID No.: &nbsp;</td>';
$html .= '<td style="width: 120px; border-top: none; border-left: none; border-right: none; height: 20px; font-size: 11px; font-family: Arial; padding padding: 0px;">&nbsp;' . $oi2row['Details12'] . '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 1px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td colspan="3" style="width: 330px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: left; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black; border-right: 3px solid black; padding-left: 4px;">41. &nbsp;REFERENCE <i style="color: red;">(Person not related by consanguinity or affinity to applicant /appointee)</i></td>';
$html .= '<td colspan="1" rowspan="6" style="border-bottom: none; font-size: 8.7px; font-family: Arial; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black; padding-left: 4px; border-right: 3px solid black;">';
$html .= '<table>';
$html .= '<tr>';

if (empty($oi2row['Photo'])) {
    $html .= '<td style="width: 3.5cm; height: 3.8cm;">';
    $html .= '<p style="font-family: Arial; font-size: 9.5px; text-align: center;">ID picture taken within<br>the last 6 months<br>3.5 cm X 4.5 cm<br>(passport size)<br><br>Write full and handwritten<br>name tag and signature over<br>printed name<br><br>Computer generated<br>or photocopied picture<br>is not acceptable</p>';
    $html .= '</td>';
} else {
    $html .= '<td style="width: 3.5cm; height: 4.5cm;">';
    $html .= '<img width="140" height="170" src="../' . $oi2row['Photo'] . '">';
    $html .= '</td>';
}

$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border: none; font-family: Arial; font-size: 10px; color: gray; padding-top: 10px;">PHOTO</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 290px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 4px; border-left: 3px solid black;">NAME&#x2611;</td>';
$html .= '<td style="width: 190px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 4px;">ADDRESS</td>';
$html .= '<td style="width: 100px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 4px;">TEL. NO.</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="height: 25px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $oi2row['Name'] . '</td>';
$html .= '<td style="height: 25px; font-size: 8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $oi2row['Address'] . '</td>';
$html .= '<td style="height: 25px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $oi2row['Telephone'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="height: 25px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $oi2row['Name2'] . '</td>';
$html .= '<td style="height: 25px; font-size: 8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $oi2row['Address2'] . '</td>';
$html .= '<td style="height: 25px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $oi2row['Telephone2'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="height: 25px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px; border-left: 3px solid black;">' . $oi2row['Name3'] . '</td>';
$html .= '<td style="height: 25px; font-size: 8vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $oi2row['Address3'] . '</td>';
$html .= '<td style="height: 25px; font-size: 8.7vw; font-family: Arial; text-align: center; padding: 0px 3px 0px 3px;">' . $oi2row['Telephone3'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="width: 330px; font-size: 10.8px; font-family: Arial; background-color: #eaeaea; letter-spacing: .1px; text-align: left; line-height: 15px; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black; border-right: 3px solid black; padding-left: 4px;">'
        . '42. &nbsp;I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and<br>'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the<br>'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein.<br>'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I agree that any misrepresentation made in this document and its attachments shall cause the filing of<br>'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;administrative/criminal case/s against me.'
        . '</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<table class="fpTable2" borde="1">';
$html .= '<tr>';
$html .= '<td style="width: 38%;border-left: 3px solid black; border-right: none; border-top: none; padding: 10px 5px 10px 10px;">';

$html .= '<table class="fpTable2" style="width: 100%; height: 100%; border: 3px solid black;">';
$html .= '<tr>';
$html .= '<td style="font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: left; padding: 2px 0px 2px 1px; line-height: 13px;">';
$html .= 'Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver\'s License, etc.)<br><i style="font-size: 10px;">PLEASE INDICATE ID Number and Date of Issuance</i>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; letter-spacing: -.5px; text-align: left; padding: 5px 0px 5px 1px; line-height: 13px;">';
$html .= 'Government issued ID: &nbsp;&nbsp;' . $oi2row['Gov_ID'];
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; letter-spacing: -.5px; text-align: left; padding: 5px 0px 5px 1px; line-height: 13px;">';
$html .= 'GID/License/Passport No.: &nbsp;&nbsp;' . $oi2row['ID_No'];
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; letter-spacing: -.5px; text-align: left; padding: 5px 0px 5px 1px; line-height: 13px;">';
$html .= 'GDate/Place of Issuance: &nbsp;&nbsp;' . $oi2row['Issuance'];
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td style="width: 38%;border-left: none; border-right: none; border-top: none; padding: 10px 0px 10px 5px;">';

$html .= '<table class="fpTable2" style="width: 100%; height: 100%; border: 3px solid black;">';
$html .= '<tr>';
$html .= '<td style="font-size: 9px; font-family: Arial; letter-spacing: -.5px; text-align: left; padding: 5px 0px 5px 1px; line-height: 13px; height: 66px;">';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding: 0px 0px 1px 0px; line-height: 13px;">';
$html .= 'Signature (Sign inside the box)';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; letter-spacing: -.5px; text-align: center; line-height: 13px;">';
$html .= date('F d, Y', strtotime($oi2row['Date_acc']));
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding: 0px 0px 0px 1px; line-height: 13px;">';
$html .= 'Date Accomplished';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '</td>';
$html .= '<td style="width: 24%; border-left: none; border-right: 3px solid black; border-top: none; padding: 0px 10px 10px 10px;">';

$html .= '<table class="fpTable2" style="width: 100%; height: 100%; border: 3px solid black;">';
$html .= '<tr>';
$html .= '<td style="font-size: 9px; font-family: Arial; letter-spacing: -.5px; text-align: left; padding: 5px 0px 5px 1px; line-height: 13px; height: 110px;">';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding: 0px 0px 1px 0px; line-height: 13px;">';
$html .= 'Right Thumbmark';
$html .= '</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<table class="fpTable2" border="1">';
$html .= '<tr>';
$html .= '<td style="border-bottom: none; border-left: 3px solid black; border-right: 3px solid black; font-size: 10; font-family: Arial; text-align: center; padding: 10px 0px 10px 0px;">SUBSCRIBED AND SWORN to before me this ___________________________, affiant exhibiting his/her validly issued government ID as indicated above.</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-top: none; border-left: 3px solid black; border-right: 3px solid black; font-size: 10; font-family: Arial; text-align: center; padding: 0px 240px 10px 240px;">';

$html .= '<table class="fpTable2" style="width: 100%; height: 100%; border: 3px solid black;">';
$html .= '<tr>';
$html .= '<td style="font-size: 9px; font-family: Arial; letter-spacing: -.5px; text-align: left; padding: 5px 0px 5px 1px; line-height: 13px; height: 66px;">';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="font-size: 10px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding: 0px 0px 1px 0px; line-height: 13px;">';
$html .= 'Person Administering Oath';
$html .= '</td>';
$html .= '</tr>';

$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<p style="padding-left: 640px; padding-top: -8px; font-family: Arial; font-size: 7.5px; font-style: italic; letter-spacing: -.5px;">CS FORM 212 (Revised 2017), Page 4 of 4</p>';

//table-layout: fixed;

$mpdf = new mPDF('c', array(215.9, 330.2));
$css = file_get_contents('../css/style14.css');
$mpdf->SetTitle('Personal Data Sheet');
$mpdf->WriteHTML($css, 1);
$mpdf->writeHTML($html);
$mpdf->Output('Personal Data Sheet.pdf', 'I');




//if ($werow['Inclusive_to'] == '' || $werow['Inclusive_to'] == '0000-00-00') {
//    $we2 = 'N/A';
//} elseif ($werow['Inclusive_to'] == '1910-01-01') {
//    $we2 = 'Present';
//} else {
//    $we2 = date('m/d/Y', strtotime($werow['Inclusive_to']));
//}