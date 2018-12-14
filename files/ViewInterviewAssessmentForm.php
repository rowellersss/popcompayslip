<?php
include '../includes/session.php';
include '../includes/dbcon.php';
include '../includes/functions.php';
require_once('../lib/pdf/mpdf.php');

$id = $_REQUEST['id'];
$intid = $_SESSION['INTRA_PDS_ID'];

$query = mysql_query("SELECT A.*, B.*, C.*, C.Position as qual_pos FROM table_empinfo A"
        . "           LEFT JOIN table_interview B"
        . "              ON A.Id = B.Pds_Id"
        . "           LEFT JOIN table_qualification C"
        . "              ON A.Id = C.Pds_Id WHERE A.Id = '$id' AND B.Interviewer_Id = '$intid'");
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

$query2 = mysql_query("SELECT * FROM table_empinfo WHERE Id = " . $row['Interviewer_Id']);
$row2 = mysql_fetch_array($query2);

$string2 = trim($row2['Middlename']);
if ($string2 == '' || ctype_space($string2)) {
    $name2 = ucwords($row2['Lastname']) . ', ' . ucwords($row2['Firstname']);
} elseif ($string2 != '' || !ctype_space($string2)) {
    $words2 = explode(" ", $string2);
    $acronym2 = "";
    foreach ($words2 as $w2) {
        $acronym2 .= $w2[0];
    }
    $name2 = ucwords($row2['Firstname']) . ' ' . ucwords($acronym2) . '. ' . ucwords($row2['Lastname']) . '';
}

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



$html = '<p class="header1">COMMISSION ON POPULATION</p>';
$html .= '<p class="header2">Welfareville Compound, Mandaluyong City</p>';
$html .= '<div>';


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
$html .= '<td style="font-size: 13px; padding-left: 15px; width: 230px; border-bottom: 1px solid black;">&nbsp;' . $row['qual_pos'] . '</td>';
$html .= '<td style="font-size: 13px; text-align: right; width: 108px;">Division</td>';
$html .= '<td style="font-size: 13px; width: 133px; border-bottom: 1px solid black;">&nbsp;' . $div . '</td>';
$html .= '</tr>';
$html .= '</table>';


//$html .= '<div class="infoDiv">';
//$html .= '<p class="info" style="width: 385px; border-bottom: 1px solid black;">Name</p>';
//$html .= '<p class="info">Present Position ______________________________________________</p>';
//$html .= '<p class="info">Consideted to the position of ____________________________________</p>';
//$html .= '</div>';
//
//$html .= '<div class="infoDiv2">';
//$html .= '<p class="info">Age ________________</p>';
//$html .= '<p class="info">Salary ______________</p>';
//$html .= '<p class="info">Division ____________</p>';
//$html .= '</div>';
//$html .= '</div>';

$html .= '<div>';
$html .= '<p class="Sheader1">INTERVIEW ASSESSMENT FORM</p>';
$html .= '<p class="Sheader2">(To be accomplished by the Personnel Selection Board)</p>';
$html .= '</div>';

$html .= '<div class="instDivO">';
$html .= '<p class="instHead">INSTRUCTIONS: </p>';
$html .= '<p class="instCont">'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are to rate the candidate on certain characteristics and traits which can be observed when you talk with him/her face to face. Consider '
        . 'Whether his/her personal characteristics, as manifested during the interview, will be an asset or liability to the position being considered. Make your '
        . 'rating of the candidate/s characteristics solely on the evidence observed during the interview by putting a check mark (&#10004;) on the proper scale. (Each '
        . 'part of the scale has an equivalent point score).<br>'
        . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Be sure to record your rating of the candidate on each of the trait. Do no omit any item. After rating the candidate, accomplish the '
        . 'summary rating form of the bottom of the page, by indicating the point score obtained in each characteristic. Add the Total point scores. '
        . '</p>';
$html .= '</div>';

$html .= '<div>';
$html .= '<table border="1" class="tableBody">';
$html .= '<tr>';
$html .= '  <td style="text-align: center;">TRAITS</td>';
$html .= '  <td style="vertical-align: bottom;">1</td>';
$html .= '  <td style="vertical-align: bottom;">2</td>';
$html .= '  <td style="vertical-align: bottom;">POINTS <br> 3</td>';
$html .= '  <td style="vertical-align: bottom;">4</td>';
$html .= '  <td style="vertical-align: bottom;">5</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '  <td>1.&nbsp;&nbsp;&nbsp;Voice and Speech. Is his/her voice inviting &nbsp;&nbsp;&nbsp;&nbsp;or pleasant? Can you easily hear what &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;he/she says? Is his voice resonant and well &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; modulated?</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Irritating or Indistinct</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Understandable but rather unpleasant</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Neither conspicuously pleasant or unpleasant</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Definitely pleasant and distinct</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Exceptionally clear and pleasing</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '  <td>2.&nbsp;&nbsp;&nbsp;Appearance. Does he/she look like a well &nbsp;&nbsp;&nbsp;&nbsp;set-up, healthy, energetic person? Has &nbsp;&nbsp;&nbsp;&nbsp;his/her bodily or facial characteristics &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;which might seriously hamper him/her? Is &nbsp;&nbsp;&nbsp;&nbsp;he/she well groomed or unattractive in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;appearance?</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Unprepossessing or unsuitable</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Create rather unfavorable impression</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Suitable acceptable</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Create distinctly favorable impression</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Impressive commands admiration</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '  <td>3.&nbsp;&nbsp;&nbsp;Alertness. Does he/she readily grasp the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;meaning of a question? Is he/she slow to &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;apprehend even the more obvious point? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Or does he/she understand quickly, even &nbsp;&nbsp;&nbsp;&nbsp;through the idea is new, involved or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;difficult?</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Slow in grasping obvious question; often misunderstands meaning of questions</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Slow to understand subtle points; require explanation</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Nearly grasp intent of interviewer\'s questions</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Rather quick to grasping question and new ideas</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Exceptionally keen and quick to understand</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '  <td>4.&nbsp;&nbsp;&nbsp;&nbsp;Ability to present ideas. Does he/she speak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;logically and convincingly or does he/she &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tend to be vague, confused or illogical?</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Confused and illogical</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Tends to stutter or to become involved</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Usually gets his ideas across circumstances</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Shows superior ability to express himself</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Usually logical clear and convincing</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '  <td>5.&nbsp;&nbsp;&nbsp;Judgment. Does he/she impress you as a &nbsp;&nbsp;&nbsp;person whose judgment would be &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dependable even under stress? Or is he/she &nbsp;&nbsp;&nbsp;&nbsp;hasty, erratic, biased, and swayed by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;his/her feelings?</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Notably lacking in balance & restraint</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Show some tendency to react impulsively & without restrain</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Acts judiciously on ordinary circumstances</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Gives reassuring evidence of considered judgment</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Inspires unusual confidence in probable soundness of judgment</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '  <td>6.&nbsp;&nbsp;&nbsp;Emotional Stability. Is he/she  emotionally &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mature? Is he/she touchy to criticism, easily &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;upset? Is he/she initiated or impatient when &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;things go wrong? Or does he/she keep an &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;even keel? </td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Over sensitive easily disconcerned</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Occasionally impatient or irritated</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Well poised most of the time</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Superior self-command</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Exceptional poise, calmness and good humor under stress</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '  <td>7.&nbsp;&nbsp;&nbsp;Self-Confidence. Does he/she seem to be &nbsp;&nbsp;&nbsp;&nbsp;uncertain of himself/herself, hesitant, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lacking in assurance, easily buffed? Or is &nbsp;&nbsp;&nbsp;&nbsp;he/she wholesomely self-confident and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;assured?</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Timid, hesitant, easily influenced</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Appears to be ever self-conscious</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Moderately confident of himself/herself</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Wholesomely self-confident</td>';
$html .= '  <td style="font-size: 11.5px; text-align: center; vertical-align: middle;">Shows super self-assurance</td>';
$html .= '</tr>';

$html .= '</table>';
$html .= '</div>';


$html .= '<div class="footLeft">';
$html .= '<table border="1" class="tableFooter">';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-right: none; border-top: none; padding-top: 25px; font-size: 13px;">&nbsp;' . $name2 . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-right: none; border-bottom: none; font-size: 13px;">Intervewer</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-right: none; border-top: none; padding-top: 25px; font-size: 13px;">&nbsp;' . date('F d, Y', strtotime($row['Interview_date'])) . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="border-left: none; border-right: none; border-bottom: none; font-size: 13px;">Date</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</div>';

$html .= '<div class="footerRight">';

$total = $row['Interview1'] + $row['Interview2'] + $row['Interview3'] + $row['Interview4'] + $row['Interview5'] + $row['Interview6'] + $row['Interview7'];

$html .= '<table border="1" class="tableFooter2">';
$html .= '<tr>';
$html .= '<td colspan="3" style="border-bottom: none; font-weight: bold;">SUMMARY RATING</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: -70px; width: 70%; border-top: none; border-bottom: none; border-right: none;">TRAITS</td>';
$html .= '<td style="width: 29%; border-top: none; border-bottom: none; border-left: none; border-right: none;">POINTS</td>';
$html .= '<td style="width: 1%; border-top: none; border-bottom: none; border-left: none;">&nbsp;</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 5px; text-align: left; border-top: none; border-bottom: none; border-right: none;">1. Voice and Speech ..........................</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;">' . $row['Interview1'] . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 5px; text-align: left; border-top: none; border-bottom: none; border-right: none;">2. Appearance ....................................</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;">' . $row['Interview2'] . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 5px; text-align: left; border-top: none; border-bottom: none; border-right: none;">3. Alertness ........................................</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;">' . $row['Interview3'] . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 5px; text-align: left; border-top: none; border-bottom: none; border-right: none;">4. Ability to Present Ideas .................</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;">' . $row['Interview4'] . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 5px; text-align: left; border-top: none; border-bottom: none; border-right: none;">5. Judgment........................................</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;">' . $row['Interview5'] . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 5px; text-align: left; border-top: none; border-bottom: none; border-right: none;">6. Emotional Stability........................</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;">' . $row['Interview6'] . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-left: 5px; text-align: left; border-top: none; border-bottom: none; border-right: none;">7. Self-Confidence.............................</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;">' . $row['Interview7'] . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="padding-right: 15px; padding-top:10px; text-align: right; font-weight: bold; border-top: none; border-right: none; border-bottom: none;">TOTAL POINT SCORE</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none; font-weight: bold; font-size: 15px;">' . $total . '</td>';
$html .= '<td style="border-left: none; border-top: none; border-bottom: none;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="text-align: right; font-weight: bold; border-top: none; border-right: none;">&nbsp;</td>';
$html .= '<td style="border-top: none; border-left: none; border-right: none;"></td>';
$html .= '<td style="border-left: none; border-top: none;"></td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '</div>';




$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('../css/style19.css');
$mpdf->SetTitle('Interview Assessment Form');
$mpdf->WriteHTML($css, 1);
$mpdf->writeHTML($html);
$mpdf->Output('InterviewAssessmentForm.pdf', 'I');
