<?php
include '../includes/dbcon.php';
$id = $_REQUEST['id'];
?>
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link id=Main-File rel=Main-File
href="../PERSONAL%20DATA%20SHEET%20(Revised%202005).php">
<link rel=File-List href=filelist.xml>
<title>PDS</title>
<link rel=Stylesheet href=stylesheet.css>
<style>
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{margin:.24in 0in 0in 0in;
	mso-header-margin:0in;
	mso-footer-margin:0in;
	mso-horizontal-page-align:center;}
-->
</style>
<![if !supportTabStrip]><script language="JavaScript">
<!--
function fnUpdateTabs()
 {
  if (parent.window.g_iIEVer>=4) {
   if (parent.document.readyState=="complete"
    && parent.frames['frTabs'].document.readyState=="complete")
   parent.fnSetActiveSheet(1);
  else
   window.setTimeout("fnUpdateTabs();",150);
 }
}

if (window.name!="frSheet")
 window.location.replace("../PERSONAL%20DATA%20SHEET%20(Revised%202005).php");
else
 fnUpdateTabs();
//-->
</script>
<![endif]>
</head>

<body link=blue vlink=purple>

<table border=0 cellpadding=0 cellspacing=0 width=727 style='border-collapse:
 collapse;table-layout:fixed;width:546pt'>
 <col width=23 style='mso-width-source:userset;mso-width-alt:841;width:17pt'>
 <col width=44 style='mso-width-source:userset;mso-width-alt:1609;width:33pt'>
 <col width=68 style='mso-width-source:userset;mso-width-alt:2486;width:51pt'>
 <col width=74 style='mso-width-source:userset;mso-width-alt:2706;width:56pt'>
 <col width=16 style='mso-width-source:userset;mso-width-alt:585;width:12pt'>
 <col width=69 style='mso-width-source:userset;mso-width-alt:2523;width:52pt'>
 <col width=48 style='mso-width-source:userset;mso-width-alt:1755;width:36pt'>
 <col width=26 style='mso-width-source:userset;mso-width-alt:950;width:20pt'>
 <col width=123 style='mso-width-source:userset;mso-width-alt:4498;width:92pt'>
 <col width=59 style='mso-width-source:userset;mso-width-alt:2157;width:44pt'>
 <col width=56 style='mso-width-source:userset;mso-width-alt:2048;width:42pt'>
 <col width=65 style='mso-width-source:userset;mso-width-alt:2377;width:49pt'>
 <col width=56 style='mso-width-source:userset;mso-width-alt:2048;width:42pt'>
 <tr height=4 style='mso-height-source:userset;height:3.0pt'>
  <td colspan=13 height=4 class=xl436 width=727 style='border-right:1.0pt solid black;
  height:3.0pt;width:546pt'>&nbsp;</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td colspan=13 height=24 class=xl423 style='border-right:1.0pt solid black;
  height:18.0pt'>IV.<span style='mso-spacerun:yes'>&nbsp;</span>CIVIL SERVICE
  ELIGIBILITY</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl144 style='height:15.0pt;border-top:none'>29.</td>
  <td colspan=4 rowspan=2 class=xl427 width=202 style='border-right:.5pt solid black;border-bottom:.5pt solid black;width:152pt'>CAREER SERVICE/ RA 1080 (BOARD/BAR) UNDER<br>SPECIAL LAWS/ CES/ CSEE</td>
  <td rowspan=2 class=xl441 style='border-top:none'>RATING</td>
  <td colspan=2 rowspan=2 class=xl426 width=74 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:56pt'>DATE OF EXAMINATION / CONFERMENT</td>
  <td colspan=3 rowspan=2 class=xl426 width=238 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:178pt'>PLACE OF EXAMINATION / CONFERMENT</td>
  <td colspan=2 class=xl439 style='border-right:1.0pt solid black;border-left:
  none'>LICENSE (if applicable)</td>
 </tr>
 <tr height=34 style='mso-height-source:userset;height:25.5pt'>
  <td height=34 class=xl147 style='height:25.5pt'>&nbsp;</td>
  <td class=xl102 style='border-top:none;border-left:none'>NUMBER</td>
  <td class=xl208 width=56 style='border-top:none;border-left:none;width:42pt'>DATE
  OF RELEASE</td>
 </tr>
     <?php
 $query  = mysql_query("Select * from table_empinfocs where Pds_Id = '$id' order by Id asc LIMIT 7");
 $num1 = mysql_num_rows($query);
 
 while ($row = mysql_fetch_array($query)) {
     
     $exam = date("m/d/Y", strtotime($row['Date_ofexam']));
     $rele = date("m/d/Y", strtotime($row['Date_ofrelease']));
     ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
     <td colspan=5 height=37 class=xl80 style='height:27.75pt; padding: 2px;'><?php echo $row['Career_service'];?></td>
  <td class=xl80 style='border-left:none'><?php echo $row['Rating'];?></td>
  <td colspan=2 class=xl401 style='border-left:none'><?php echo $exam;?></td>
  <td colspan=3 class=xl80 style='border-left:none; padding: 2px;'><?php echo $row['Place_ofexam'];?></td>
  <td class=xl83 style='border-left:none'><?php echo $row['Number'];?></td>
  <td class=xl83 style='border-left:none'><?php echo $exam;?></td>
 </tr>
 <?php
 }
 $c2 = 7 - $num1;
     for($c=1; $c <= $c2; $c++){
         ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=5 height=37 class=xl83 style='height:27.75pt'>&nbsp;</td>
  <td class=xl83 style='border-left:none'>&nbsp;</td>
  <td colspan=2 class=xl401 style='border-left:none'>&nbsp;</td>
  <td colspan=3 class=xl401 style='border-left:none'>&nbsp;</td>
  <td class=xl83 style='border-left:none'>&nbsp;</td>
  <td class=xl83 style='border-left:none'>&nbsp;</td>
 </tr>
 <?php  
     }
 ?>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=13 height=16 class=xl288 style='border-right:1.0pt solid black;
  height:12.0pt'>(Continue on separate sheet if necessary)</td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td colspan=13 height=25 class=xl423 style='border-right:1.0pt solid black;
  height:18.75pt'>V.<span style='mso-spacerun:yes'>&nbsp;</span>WORK EXPERIENCE
  (Include private employment.<span style='mso-spacerun:yes'>&nbsp;</span>Start
  from your current work)</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl144 style='height:18.0pt;border-top:none'>30.</td>
  <td colspan=2 rowspan=2 class=xl427 width=112 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:84pt'>INCLUSIVE DATES (mm/dd/yyyy)</td>
  <td colspan=3 rowspan=3 class=xl426 width=159 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:120pt'>POSITION TITLE<span
  style='mso-spacerun:yes'>
  </span>(Write in full)</td>
  <td colspan=3 rowspan=3 class=xl426 width=197 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:148pt'>DEPARTMENT / AGENCY / OFFICE /
  COMPANY<span
  style='mso-spacerun:yes'>
  </span>(Write in full)</td>
  <td rowspan=3 class=xl420 width=59 style='border-bottom:.5pt solid black;
  border-top:none;width:44pt'>MONTHLY SALARY</td>
  <td rowspan=3 class=xl410 width=56 style='border-bottom:.5pt solid black;
  border-top:none;width:42pt'>SALARY GRADE &amp; STEP INCREMENT (Format
  &quot;00-0&quot;)</td>
  <td rowspan=3 class=xl404 width=65 style='border-bottom:.5pt solid black;
  border-top:none;width:49pt'>STATUS OF APPOINTMENT</td>
  <td rowspan=3 class=xl407 width=56 style='border-bottom:.5pt solid black;
  border-top:none;width:42pt'>GOV'T SERVICE<span
  style='mso-spacerun:yes'>
  </span>(Yes / No)</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl145 style='height:15.0pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl435 style='border-right:.5pt solid black;
  height:15.0pt'>From</td>
  <td class=xl101 style='border-top:none;border-left:none'>To</td>
 </tr>
 <?php
 $query2  = mysql_query("Select * from table_empinfowe where Pds_Id = '$id' AND Gov_service != '' order by DATE_FORMAT(Inclusive_from,'%m-%d-%Y'), DATE_FORMAT(Inclusive_to,'%m-%d-%Y') desc LIMIT 20");
 $num = mysql_num_rows($query2);
 
 $nufo = '';
 while ($row2 = mysql_fetch_array($query2)) {
     
     $infrom = date("m/d/Y", strtotime($row2['Inclusive_from']));
     if ($row2['Inclusive_to'] == 'Present' || $row2['Inclusive_to'] == 'present') {
        $into = 'Present';
    } elseif ($row2['Inclusive_to'] != 'Present' || $row2['Inclusive_to'] == 'present') {
        $into = date('m/d/Y', strtotime($row2['Inclusive_to']));
    }
    if(is_numeric($row2['Monthly_salary'])){
        $nufo = number_format($row2['Monthly_salary'],2);
    }else{
        $nufo = $row2['Monthly_salary'];
    }
     ?>
     <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=2 height=37 class=xl399 width=67 style='border-right:.5pt solid black;height:27.75pt;width:50pt'>
    <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $infrom;?></span>
  </td>
  <td class=xl230 style='border-top:none;border-left:none'>
    <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $into;?></span>
  </td>
  <td colspan=3 class=xl110 width=159 style='border-right:.5pt solid black;
      border-left:none;width:120pt'><?php echo $row2['Position'];?></td>
  <td colspan=3 class=xl110 width=197 style='border-right:.5pt solid black;
  border-left:none;width:148pt'><?php echo $row2['Department_agencyoffice'];?></td>
  <td class=xl110 width=59 style='border-left:none;width:44pt'><?php echo $nufo . "<br>";?></td>
  <td class=xl110 width=56 style='border-left:none;width:42pt'><?php echo $row2['Salary_grade'];?></td>
  <td class=xl110 width=65 style='border-left:none;width:49pt'><?php echo $row2['Status_ofappointment'];?></td>
  <td class=xl146 width=56 style='border-left:none;width:42pt'><?php echo $row2['Gov_service'];?></td>
 </tr>
     <?php
 }
    $i2 = 20 - $num;
     for($i=1; $i <= $i2; $i++){
         ?>
     <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=2 height=37 class=xl399 width=67 style='border-right:.5pt solid black;height:27.75pt;width:50pt'>
    <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/
  </td>
  <td class=xl230 style='border-top:none;border-left:none'>
    <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/
  </td>
  <td colspan=3 class=xl107 width=159 style='border-right:.5pt solid black;
      border-left:none;width:120pt'><?php echo $row2['Position'];?></td>
  <td colspan=3 class=xl107 width=197 style='border-right:.5pt solid black;
  border-left:none;width:148pt'>&nbsp;</td>
  <td class=xl110 width=59 style='border-left:none;width:44pt'>&nbsp;</td>
  <td class=xl110 width=56 style='border-left:none;width:42pt'>&nbsp;</td>
  <td class=xl110 width=65 style='border-left:none;width:49pt'>&nbsp;</td>
  <td class=xl146 width=56 style='border-left:none;width:42pt'>&nbsp;</td>
 </tr>
     <?php
     }
 ?>
 
 <tr height=18 style='height:13.5pt'>
  <td colspan=13 height=18 class=xl288 style='border-right:1.0pt solid black;
  height:13.5pt'>(Continue on separate sheet if necessary)</td>
 </tr>
 <tr height=18 style='height:13.5pt'>
  <td height=18 class=xl234 style='height:13.5pt'>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl131 style="color: black;font-style: normal;">CS FORM 212 (Revised 2005), Page 2 of 4</td>
  <td class=xl131>&nbsp;</td>
  <td class=xl143>&nbsp;</td>
 </tr>
 <tr height=3 style='mso-height-source:userset;height:2.25pt'>
  <td colspan=13 height=3 class=xl418 style='height:2.25pt'>&nbsp;</td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=23 style='width:17pt'></td>
  <td width=44 style='width:33pt'></td>
  <td width=68 style='width:51pt'></td>
  <td width=74 style='width:56pt'></td>
  <td width=16 style='width:12pt'></td>
  <td width=69 style='width:52pt'></td>
  <td width=48 style='width:36pt'></td>
  <td width=26 style='width:20pt'></td>
  <td width=123 style='width:92pt'></td>
  <td width=59 style='width:44pt'></td>
  <td width=56 style='width:42pt'></td>
  <td width=65 style='width:49pt'></td>
  <td width=56 style='width:42pt'></td>
 </tr>
 <![endif]>
</table>

</body>

</html>
