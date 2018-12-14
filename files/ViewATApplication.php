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

$tracno = $_REQUEST['trac_no'];
$sql2 = mysql_query("SELECT * FROM table_atapplication where md5(Transaction_no) = '$tracno'");
$row2 = mysql_fetch_array($sql2);

$html = '<p class="trans">Doc no. 0001</p>';
$html .= '<div style="margin-left: 30px; padding-top: -10px;">';
$html .= '<img src="../images/official2.png" style="width: 465px; height: 122px;" alt="">';
$html .= '</div>';

$html .= '<hr>';

$html .= '<div class="span">&nbsp;' . date('F d, Y', strtotime($row2['Date_offiling'])) . '</div>';
$html .= '<p class="pdate">Date</p>';

$html .= '<div>';
$html .= '<p class="title1">AUTHORIZATION</p>';
$html .= '<p class="title2">FOR OFFICIAL TRAVEL</p>';
$html .= '</div>';

$html .= '<div class="marg">';
$html .= '<p class="body">In the interest of the service, Mr./Ms. <span class="span4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $name . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> of this Office are hereby authorized to travel on official time to: </p>';

$html .= '<div class="span2">&nbsp;' . $row2['Destination'] . '</div>';
$html .= '<p class="des">(DESTINATION)</p>';

$html .= '<div class="span2a">on</div><div class="span2b">&nbsp;' . $row2['On_date'] . '</div>';
$html .= '<br><p class="des" style="margin-top: 0px;">(DATE)</p>';   

$html .= '<div class="span2">&nbsp;' . $row2['Purpose'] . '</div>';
$html .= '<p class="des">(PURPOSE)</p>';

$html .= '<div class="fdiv">';
$html .= '<p class="app">APPROVED BY:</p>';
$html .= '<div class="span3">&nbsp;<br><br><br><br></div>';
$html .= '</div>';

$html .= '<div style="margin-top: 220px;">';
$html .= '<p class="footerA">35 Taong Paglilingkod Tungo sa Matatag na Pamilyang Pilipino</p>';
$html .= '<p class="footerB">Telephone Nos.: 531-7051 * 535-0672 * 531-6805 &nbsp;&nbsp;&nbsp;&nbsp;Telefax No. 533-5122<br>E-mail Address: mainmail@popcom.gov.ph</p>';
$html .= '</div>';

$html .= '</div>';

$mpdf = new mPDF('c', 'A4');
$css = file_get_contents('../css/style21.css');
$mpdf->SetTitle('Application for Authorization to Travel');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('ApplicationForAT.pdf', 'I');
