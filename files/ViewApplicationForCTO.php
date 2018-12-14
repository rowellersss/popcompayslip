<?php

include '../includes/session.php';
include '../includes/dbcon.php';
include '../includes/functions.php';
require_once('../lib/pdf/mpdf.php');

$id = $_SESSION['INTRA_PDS_ID'];
$sql = mysql_query("SELECT * FROM table_empinfo A"
        . "             LEFT JOIN table_position B"
        . "                 ON A.Position = B.position_id"
        . "             left join table_division C"
        . "                 ON B.division_id = C. division_id WHERE A.Id = '$id'");
$row = mysql_fetch_array($sql);

$string = trim($row['Middlename']);
if ($string == '' || ctype_space($string)) {
    $name = ucwords($row['Firstname']) . ' ' . ucwords($row['Lastname']);
} elseif ($string != '' || !ctype_space($string)) {
    $words = explode(" ", $string);
    $acronym = "";
    foreach ($words as $w) {
        $acronym .= $w[0];
    }
    $name = ucwords($row['Firstname']) . ' ' . ucwords($acronym) . '. ' . ucwords($row['Lastname']);
}

$div = $row['division_short_description'];

if ($row['Position'] == 58 || $row['Position'] == 61 || $row['Position'] == 62 || $row['Position'] == 66 || $row['Position'] == 67) {
    $div = 'OED-ITDMU';
} elseif ($row['Position'] == 36 || $row['Position'] == 39 || $row['Position'] == 42) {
    $div = 'OED-MU';
} elseif ( $row['Position'] == 6 || $row['Position'] == 7 || $row['Position'] = 8) {
    $div = 'OED-IAU';
}

$tracno = $_REQUEST['trac_no'];
$sql2 = mysql_query("SELECT * FROM table_ctoapplication where md5(Transaction_no) = '$tracno'");
$row2 = mysql_fetch_array($sql2);


$html = '<p class="trans">Doc no. ' . $row2['Transaction_no'] . '</p>';
$html .= '<p class="header1">COMMISSION ON POPULATION</p>';
$html .= '<p class="header2">Welfareville Compound, Mandaluyong City</p>';
$html .= '<p class="header3">APPLICATION FOR COMPENSATORY TIME-OFF</p>';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td style="border-bottom: none; padding-left: 5px; width: 49%">NAME: </td>';
$html .= '<td style="border-bottom: none; text-align: center; width: 26%;">POSITION</td>';
$html .= '<td style="border-bottom: none; text-align: center; width: 25%;">DIVISION</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-top: none; padding-left: 50px; text-align: center; font-weight: 100;">&nbsp;' . $name .'</td>';
$html .= '<td style="border-top: none; font-size:9; text-align: center; font-weight: 100;">&nbsp;' . $row['position_description'] . '</td>';
$html .= '<td style="border-top: none; text-align: center; font-weight: 100;">&nbsp;' . $div . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="border-bottom: none; border-top: none; padding-left: 5px;">2. DATE OF FILING</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" style="border-top: none; text-align: center; font-weight: 100;">&nbsp;' . date('F d, Y', strtotime($row2['Date_offiling'])) . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 5px; border-right: none;">';
$html .= '3. NUMBER OF OVERTIME HOURS<br><br>';
$html .= '&nbsp;&nbsp;&nbsp; ON THE FOLLOWING DATE/S<br><br>';
$html .= '&nbsp;&nbsp;&nbsp; AS PER PHOTOCOPY OF DTR ATTACHED<br>&nbsp;';
$html .= '</td>';
$html .= '<td colspan="2" style="border-left: none; text-align: center; font-weight: 100;">&nbsp;' . $row2['Number_ofovertime'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 5px; padding-bottom: 6px; border-right: none;">';
$html .= '4. TOTAL NUMBER OF OVERTIME HOURS<br>';
$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(must be divisible by 4)';
$html .= '</td>';
$html .= '<td colspan="2" style="border-left: none; text-align: center; font-weight: 100;">&nbsp;' . $row2['Total_number'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="border-bottom: none; border-top: none; padding-left: 5px;">5. TIME-OFF APPLIED ON THE FOLLOWING DATE/S</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" style="border-top: none; text-align: center; font-weight: 100;">&nbsp;' . $row2['Time-off_applied'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" style="border-bottom: none; border-top: none; padding-left: 5px; padding-bottom: 6px;">&nbsp;</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" style="border-top: none; text-align: right; padding-right: 10px;"><span>&nbsp;SIGNATURE OF APPLICANT&nbsp;</span></td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="padding-left: 5px; border-bottom: none;">';
$html .= '6. RECOMMENDING FOR<br><br>';
$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="span2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;APPROVAL<br><br>';
$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="span2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;DISAPPROVAL DUE TO';
$html .= '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="padding-left: 5px; border-top: none; border-bottom: none;"><br><br><br><br></td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="padding-right: 70px; border-top: none; text-align: right; font-weight: 100; font-size: 12px;">Administrative Officer V<br>&nbsp;</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="padding-left: 5px; border-bottom: none;">';
$html .= '7.<br>';
$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="span2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Approved<br><br>';
$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="span2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Disapproved';
$html .= '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="padding-left: 5px; border-top: none; border-bottom: none;"><br><br><br><br></td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td colspan="3" style="padding-right: 40px; border-top: none; text-align: right; font-weight: 100; font-size: 12px;">Chief Administrative Officer - AD<br><br>&nbsp;</td>';
$html .= '</tr>';

$html .= '</table>';

$html .= '<p class="footer">';
$html .= '* To be a accomplished in 2 copies<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$html .= 'original - Filed w/ Personal Unit<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$html .= 'duplicate - Personal File';
$html .= '</p>';

$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('../css/style20.css');
$mpdf->SetTitle('Application for CTO');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('ApplicationForCTO.pdf', 'I');
