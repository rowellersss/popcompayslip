<?php
include '../includes/dbcon.php';
require_once('../lib/pdf/mpdf.php');

function genpass() {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';

    $string = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < 6; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }
    return $string;
}
$html = '<h3 >Intranet Accounts</h3>';
$html .= '<table border=1 align=center style="width: 80%; border-collapse: collapse;">';
$html .= '<tr><td style="font-weight: bold;">Employee No.</td>'
       . '<td style="font-weight: bold;">Username</td>'
       . '<td style="font-weight: bold;">Password</td>'
       . '<td style="font-weight: bold;">Hash Password</td></tr>';
$sql = mysql_query("select * from table_empacc");
while ($row = mysql_fetch_array($sql)) {
    $genpass = genpass();
    $id = $row['Emp_Id'];
    mysql_query("update table_empacc set Password = md5('$genpass') where Emp_Id = '$id'");
    $html .= '<tr><td style="padding: 5px;">'.$row['Emp_Id'] . '</td><td style="padding: 5px;">' . $row['Username'] . '</td><td style="padding: 5px;">' . $genpass. '</td><td style="padding: 5px;">' . md5($genpass) .'</tr>';
}
$html .= '</table>';

$mpdf = new mPDF('c', 'A4');
$mpdf->SetTitle('Account Password');
$mpdf->WriteHTML($css, 1);
$mpdf->writeHTML($html);
$mpdf->Output('AccPass.pdf', 'I');