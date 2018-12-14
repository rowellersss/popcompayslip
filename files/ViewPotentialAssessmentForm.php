<?php
include '../includes/session.php';
include '../includes/dbcon.php';
include '../includes/functions.php';
require_once('../lib/pdf/mpdf.php');

$id = $_REQUEST['id'];
$intid = $_SESSION['INTRA_PDS_ID'];

//$query = mysql_query("SELECT A.*, B.*, C.*, C.Position as qual_pos FROM table_potential A"
//        . "           LEFT JOIN table_empinfo B"
//        . "              ON A.Pds_Id = B.Id"
//        . "           LEFT JOIN table_qualification C"
//        . "              ON A.Pds_Id = C.Pds_Id WHERE A.Pds_Id = '$id'");

$query = mysql_query("SELECT A.*, B.*, C.*, C.Position as qual_pos FROM table_empinfo A"
        . "           LEFT JOIN table_potential B"
        . "              ON A.Id = B.Pds_Id"
        . "           LEFT JOIN table_qualification C"
        . "              ON A.Id = C.Pds_Id WHERE A.Id = '$id' AND B.Supervisor_Id = '$intid'");

$row = mysql_fetch_array($query);
$string = trim($row['Middlename']);
if ($string == '' || ctype_space($string)) {
    $name = ucwords($row['Lastname']) . ', ' . ucwords($row['Firstname']);
} elseif ($string != '' || !ctype_space($string)) {
    $words = explode(" ", $string);
    $acronym = "";
    foreach ($words as $w) {
        $acronym .= $w[0];
    }
    $name = ucwords($row['Firstname']) . ' ' . ucwords($acronym) . '. ' . ucwords($row['Lastname']) . '';
}

//date in mm/dd/yyyy format; or it can be in other formats as well
$birthDay = date('m/d/Y', strtotime($row['DateOfBirth']));
//explode the date to get month, day and year
$birthDate = explode("/", $birthDay);
//get age from date or birthdate
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));

if ($row['Division'] == 'Office of the Executive Director') {
    $div = 'OED';
} elseif ($row['Division'] == 'Internal Audit Unit') {
    $div = 'OED-IAU';
} elseif ($row['Division'] == 'Administrative Division') {
    $div = 'Admin';
} elseif ($row['Division'] == 'Financial & Management Division') {
    $div = 'FMD';
} elseif ($row['Division'] == 'Planning, Monitoring & Evaluation Division') {
    $div = 'PMED';
} elseif ($row['Division'] == 'Policy Analysis & Development Division') {
    $div = 'PADD';
} elseif ($row['Division'] == 'Information Management & Communications Division') {
    $div = 'IMCD';
}

$total1 = $row['Potential1'] + $row['Potential2'] + $row['Potential3'] + $row['Potential4'] + $row['Potential5']; 
$total2 = $row['Potential6'] + $row['Potential7'] + $row['Potential8'] + $row['Potential9'] + $row['Potential10'];
$total3 = $row['Potential11'] + $row['Potential12'] + $row['Potential13'] + $row['Potential14'] + $row['Potential15'];
$total4 = $row['Potential16'] + $row['Potential17'] + $row['Potential18'] + $row['Potential19'] + $row['Potential20'];

$gtotal = $total1 + $total2 + $total3 + $total4;


$html = '<p class="header1" style="padding-top: 15px;">COMMISSION ON POPULATION</p>';
$html .= '<p class="header2">Welfareville Compound, Mandaluyong City</p>';


$html .= '<table>';
$html .= '<tr>';
$html .= '<td style="font-size: 13px;">Name</td>';
$html .= '<td style="font-size: 13px; padding-left: 15px; width: 350px; border-bottom: 1px solid black;">&nbsp;' . $name . '</td>';
$html .= '<td style="font-size: 13px; text-align: right; width: 85px;">Age</td>';
$html .= '<td style="font-size: 13px; width: 155px; border-bottom: 1px solid black;">&nbsp;' . $age . '</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<td style="font-size: 13px;">Present Position</td>';
$html .= '<td style="font-size: 13px; padding-left: 15px; width: 297px; border-bottom: 1px solid black;">&nbsp;</td>';
$html .= '<td style="font-size: 13px; text-align: right; width: 96px;">Salary</td>';
$html .= '<td style="font-size: 13px; width: 144px; border-bottom: 1px solid black;">&nbsp;</td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<table>';
$html .= '<tr>';
$html .= '<td style="font-size: 13px;">Considered to the position of</td>';
$html .= '<td style="font-size: 13px; padding-left: 7px; width: 230px; border-bottom: 1px solid black;">&nbsp;' . $row['qual_pos'] . '</td>';
$html .= '<td style="font-size: 13px; text-align: right; width: 108px;">Division</td>';
$html .= '<td style="font-size: 13px; width: 133px; border-bottom: 1px solid black;">&nbsp;' . $div . '</td>';
$html .= '</tr>';
$html .= '</table>';



$html .= '<div>';
$html .= '<p class="Sheader1">POTENTIAL ASSESSMENT FORM</p>';
$html .= '<p class="Sheader2">(To be accomplished by the Supervisor)</p>';
$html .= '</div>';

$html .= '<div class="instDiv" style="margin-top: -10px;">';
$html .= '<p class="instHead2">INSTRUCTIONS: </p>';
$html .= '<p class="instCont2">'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;As the immediate supervisor of the candidate, you are to rate him on certain factors human relations, leadership and personal '
        . 'attribute which would indicate the potential of an individual to perform not only the duties of the position to be filled but also those of higher and '
        . 'more responsible positions. Base on your rating on the following levels of standards with their corresponding point score.<br>';
$html .= '<table style="width: 100%; padding-top: -12px;">';
$html .= '<tr>';
$html .= '<th style="width: 20%;"></th>';
$html .= '<th style="width: 5%;"></th>';
$html .= '<th style="width: 55%; font-size:  9.5px; font-family: Arial;">LEVEL</th>';
$html .= '<th style="width: 20%;font-size:  9.5px; font-family: Arial;">POINT SCORE</th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td class="instP">EXCELLENT</td>';
$html .= '<td class="instP" style="font-size: 7px;">&Omicron;</td>';
$html .= '<td style="text-align: left; font-size: 9.5px; font-family: Arial;">a standard of performance which could not be improved by any circumstances or conditions</td>';
$html .= '<td style="font-size: 9.5px; font-family: Arial; vertical-align: top;">1</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td class="instP">GOOD</td>';
$html .= '<td class="instP" style="font-size: 7px;">&Omicron;</td>';
$html .= '<td style="text-align: left; font-size: 9.5px; font-family: Arial;">a standard of performance above the average and meets all the normal requirements of the position</td>';
$html .= '<td style="font-size: 9.5px; font-family: Arial; vertical-align: top;">2</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td class="instP">AVERAGE</td>';
$html .= '<td class="instP" style="font-size: 7px;">&Omicron;</td>';
$html .= '<td style="text-align: left; font-size: 9.5px; font-family: Arial;">a standard of performance that meets the normal requirements of the position</td>';
$html .= '<td style="font-size: 9.5px; font-family: Arial; vertical-align: top;">3</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td class="instP">FAIR</td>';
$html .= '<td class="instP" style="font-size: 7px;">&Omicron;</td>';
$html .= '<td style="text-align: left; font-size: 9.5px; font-family: Arial;">a standard of performance which is below the normal requirements of the position, but one that maybe regarded as marginally or temporarily acceptable</td>';
$html .= '<td style="font-size: 9.5px; font-family: Arial; vertical-align: top;">4</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td class="instP">POOR</td>';
$html .= '<td class="instP" style="font-size: 7px;">&Omicron;</td>';
$html .= '<td style="text-align: left; font-size: 9.5px; font-family: Arial;">a standard of performance regarded unacceptable for the position</td>';
$html .= '<td style="font-size: 9.5px; font-family: Arial; vertical-align: top;">5</td>';
$html .= '</tr>';

//$html .= '<tr>';
//$html .= '<td style="width: 25%;">';
//$html .= '<p class="instP">EXCELLENT</p>';
//$html .= '<p class="instP">GOOD</p>';
//$html .= '<p class="instP">AVERAGE</p>';
//$html .= '<p class="instP">FAIR</p>';
//$html .= '<p class="instP">POOR</p>';
//$html .= '</td>';
//$html .= '<td style="width: 55%; background-color: green;">';
//$html .= '<ul style="list-style-type: square;">';
//$html .= '<li class="instLi">a standard of performance which could not be improved by any circumstances or conditions</li>';
//$html .= '<li class="instLi">a standard of performance above the average and meets all the normal requirements of the position</li>';
//$html .= '<li class="instLi">a standard of performance that meets the normal requirements of the position</li>';
//$html .= '<li class="instLi">a standard of performance which is below the normal requirements of the position, but one that maybe regarded unacceptable for the position</li>';
//$html .= '<li class="instLi">a standard of performance regarded unacceptable for the position</li>';
//$html .= '</ul>';
//$html .= '</td>';
//$html .= '<td style="width: 25%; background-color: yellow;">';
//$html .= '<p class="instP">1</p>';
//$html .= '<p class="instP">2</p>';
//$html .= '<p class="instP">3</p>';
//$html .= '<p class="instP">4</p>';
//$html .= '<p class="instP">5</p>';
//$html .= '</td>';
//$html .= '</tr>';
$html .= '</table>';
$html .= '<p class="instCont2" style="padding-bottom: -10px;">Be sure to record your rating of the candidate on each of the factors. Do not omit any item. After rating the candidate, add the point score. </p>';
$html .= '</div>';


//----------------------------------- BODY TABLE ----------------------------------------------


$html .= '<div>';
$html .= '<table class="PtableBody" style="font-size: 11px;">';

//----------------------------------- I. HUMAN RELATIONS ----------------------------------------------

$html .= '<tr>';
$html .= '<th>I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HUMAN RELATIONS</th>';
$html .= '<th>POINT SCORE</th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px; font-weight: bold;">1.&nbsp;&nbsp;&nbsp;&nbsp;Ability to adopt/adjust to the Organization</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">1.1&nbsp;&nbsp;&nbsp;Is he/she able to adjust to the variety of personalities, rank and informal groups<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;present in the organization?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential2'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">1.2&nbsp;&nbsp;&nbsp;Does he/she internalize/work changes with ease and vigor?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential2'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px; font-weight: bold;">2.&nbsp;&nbsp;&nbsp;&nbsp;Ability to Relate to Superiors</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">2.1&nbsp;&nbsp;&nbsp;How well does he/she respond to your request, demand and expectation?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential3'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">2.2&nbsp;&nbsp;&nbsp;Does he/she appraise you of the significant problems in his/her work, their causes<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and appropriate steps to be taken to correct them?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential4'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">2.3&nbsp;&nbsp;&nbsp;In the face of differences in bahavior between him/her and you, ca he/she<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;maintain his individual point of view?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential5'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px; font-weight: bold;">3.&nbsp;&nbsp;&nbsp;&nbsp;Ability to interface with Peers</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">3.1&nbsp;&nbsp;&nbsp;Does he/she always have the respect and acceptance of his peers?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential6'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">3.2&nbsp;&nbsp;&nbsp;Does he/she try to help his/her peers in clarifying points they are trying to solve?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential7'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px; font-weight: bold;">4.&nbsp;&nbsp;&nbsp;&nbsp;Ability to deal with clientele/public</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">4.1&nbsp;&nbsp;&nbsp;Is he/she always cordial and respectful in dealin with transacting public?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential8'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">4.2&nbsp;&nbsp;&nbsp;Does he/she show enthusiasm in providing the clients the necessary advice and<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;assistance they sought for?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential9'] . '</td>';
$html .= '</tr>';


//----------------------------------- II. LEADERSHIP ----------------------------------------------


$html .= '<tr>';
$html .= '<th>II.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEADERSHIP</th>';
$html .= '<th></th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px;">1.&nbsp;&nbsp;&nbsp;&nbsp;Is he/she able to encourage his/her peers and subordinates to contribute and participate<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;in problem solving and decision-making?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential10'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 7px;">2.&nbsp;&nbsp;&nbsp;&nbsp;Can he/she influence your thinking attitude and behavior and that of his/her peers?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential11'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 7px;">3.&nbsp;&nbsp;&nbsp;&nbsp;When assigned with ad hoc external groups, does he/she lead the members to do<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;willingly the assigned tasks/projects?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential12'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 7px;">4.&nbsp;&nbsp;&nbsp;&nbsp;When assigned to be a leader/chairperson of the working group, does he/she assume<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;responsibility for the work of the other members?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential13'] . '</td>';
$html .= '</tr>';


//----------------------------------- III. PERSONAL QUALIFICATIONS AND ATTRIBUTES ----------------------------------------------


$html .= '<tr>';
$html .= '<th>III.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERSONAL QUALIFICATIONS AND ATTRIBUTES</th>';
$html .= '<th></th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px; font-weight: bold;">1.&nbsp;&nbsp;&nbsp;&nbsp;Ingenuity and Innovations</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">1.1&nbsp;&nbsp;&nbsp;Is he/she intellectually critical of existing standards, systems and policies?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential14'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">1.2&nbsp;&nbsp;&nbsp;Does he/she take the initiative to organize or develop programs, system and<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;procedures and standards that will benefit the organication?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential15'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px; font-weight: bold;">2.&nbsp;&nbsp;&nbsp;&nbsp;Stress Tolerance</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">2.1&nbsp;&nbsp;&nbsp;Does he/she have a high degree of tolerance for tension resulting from increasing<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;volume of work, organization change, environmental conflict, etc.?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential16'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">2.2&nbsp;&nbsp;&nbsp;Is he/she able to control and handle his/her anger and negative emotions?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential17'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">2.3&nbsp;&nbsp;&nbsp;Does he/she accept criticism objectively whether from his/her subordinates,<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;peers or supervisors?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential18'] . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td style="padding-left: 7px; font-weight: bold;">3.&nbsp;&nbsp;&nbsp;&nbsp;Decisiveness</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">3.1&nbsp;&nbsp;&nbsp;When you seek help from him/her in solving problems, does he/she submit<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;considered analysis or alternatives and recommend suggestions for solutions?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential19'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px;">3.2&nbsp;&nbsp;&nbsp;When he/she need to make a decision immediately, is he/she able to act quickly<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and make the best decision possible?</td>';
$html .= '<td style="text-align: center; vertical-align: bottom; border-bottom: 1px solid black;">' . $row['Potential20'] . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>&nbsp;</td>';
$html .= '<td></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 28px; padding-right: 30px; text-align: right; font-weight: bold; padding: 10px;">TOTAL POINT SCORE &rarr;</td>';
$html .= '<td style="text-align: center; font-size: 17px; border: 1px solid black; font-family: Arial;">' . $gtotal . '</td>';
$html .= '</tr>';


// &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

$html .= '</table>';
$html .= '</div>';




$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('../css/style19.css');
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';
$mpdf->SetTitle('Interview Assessment Form');
$mpdf->WriteHTML($css, 1);
$mpdf->writeHTML($html);
$mpdf->Output('InterviewAssessmentForm.pdf', 'I');

