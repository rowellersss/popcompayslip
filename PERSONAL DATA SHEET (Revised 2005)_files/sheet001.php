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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<link rel=Stylesheet href=stylesheet.css>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{margin:.2in 0in 0in 0in;
	mso-header-margin:0in;
	mso-footer-margin:0in;
	mso-horizontal-page-align:center;}
-->
</style>

<![if !supportTabStrip]>
<script language="JavaScript">
<!--
function fnUpdateTabs()
 {
  if (parent.window.g_iIEVer>=4) {
   if (parent.document.readyState=="complete"
    && parent.frames['frTabs'].document.readyState=="complete")
   parent.fnSetActiveSheet(0);
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
<?php

$query = mysql_query("Select * from table_empinfo where Id = '$id'");
$row = mysql_fetch_assoc($query);
date_default_timezone_set('Asia/Manila');
$dob = date("m/d/Y", strtotime($row['DateOfBirth']))
?>
    <div id="content">
<table border=0 cellpadding=0 cellspacing=0 width=963 style='border-collapse:
 collapse;table-layout:fixed;width:725pt'>
 <col width=17 style='mso-width-source:userset;mso-width-alt:621;width:13pt'>
 <col width=110 style='mso-width-source:userset;mso-width-alt:4022;width:83pt'>
 <col width=13 style='mso-width-source:userset;mso-width-alt:475;width:10pt'>
 <col width=98 style='mso-width-source:userset;mso-width-alt:3584;width:74pt'>
 <col width=106 style='mso-width-source:userset;mso-width-alt:3876;width:80pt'>
 <col width=19 style='mso-width-source:userset;mso-width-alt:694;width:14pt'>
 <col width=79 style='mso-width-source:userset;mso-width-alt:2889;width:59pt'>
 <col width=62 style='mso-width-source:userset;mso-width-alt:2267;width:47pt'>
 <col width=49 style='mso-width-source:userset;mso-width-alt:1792;width:37pt'>
 <col width=24 style='mso-width-source:userset;mso-width-alt:877;width:18pt'>
 <col width=17 style='mso-width-source:userset;mso-width-alt:621;width:13pt'>
 <col width=78 style='mso-width-source:userset;mso-width-alt:2852;width:59pt'>
 <col width=60 style='mso-width-source:userset;mso-width-alt:2194;width:45pt'>
 <col width=103 style='mso-width-source:userset;mso-width-alt:3766;width:77pt'>
 <col width=64 span=2 style='width:48pt'>
 <tr height=3 style='mso-height-source:userset;height:2.25pt'>
  <td colspan=14 height=3 class=xl296 width=835 style='border-right:1.0pt solid black;
  height:2.25pt;width:629pt'><a name="Print_Area">&nbsp;</a></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
 </tr>
 <tr height=13 style='mso-height-source:userset;height:9.95pt'>
  <td colspan=14 height=13 class=xl302 style='border-right:1.0pt solid black;
  height:9.95pt'>CS FORM 212 (Revised 2005)</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=89 style='mso-height-source:userset;height:66.75pt'>
  <td colspan=14 height=89 class=xl299 style='border-right:1.0pt solid black;
  height:66.75pt'>PERSONAL DATA SHEET</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr class=xl82 height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=8 height=20 class=xl310 style='border-right:.5pt solid black;
  height:15.0pt'>Print&nbsp;legibly.<span style='mso-spacerun:yes'>&nbsp;&nbsp;</span>Mark
  appropriate boxes <font class="font31">&#10063;</font><font class="font17"> with
  &quot;</font><font class="font30">&#10004;</font><font class="font17">&quot; and use
  separate sheet if necessary.</font></td>
  <td colspan=2 class=xl305 style='border-right:.5pt solid black;border-left:
  none'>1. CS ID No.</td>
  <td colspan=4 class=xl307 style='border-right:1.0pt solid black;border-left:
  none'>(to be filled up by CSC)</td>
  <td class=xl82></td>
  <td class=xl82></td>
 </tr>
 <tr height=3 style='mso-height-source:userset;height:2.25pt'>
  <td height=3 class=xl138 style='height:2.25pt'>&nbsp;</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl139>&nbsp;</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=14 height=20 class=xl255 width=835 style='border-right:1.0pt solid black;
  height:15.0pt;width:629pt'>I. PERSONAL INFORMATION</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl123 style='height:21.0pt;border-top:none'>2.</td>
  <td class=xl124 style='border-top:none'>SURNAME</td>
  <td colspan=12 class=xl348 style='font-family:"Arial Narrow", sans-serif;border-right:1.0pt solid black'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo implode("<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span>|&nbsp;&nbsp;&nbsp;&nbsp;", str_split(strtoupper($row['Firstname'])));?>
  <?php
  $flen = mb_strlen($row['Firstname']) - 1;
  $count = 32 - $flen;
  for($i = 1; $i < $count; $i++){
     echo "&nbsp;&nbsp;&nbsp;|<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
  }
  
  
  ?>
  
  </td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td height=27 class=xl125 style='height:20.25pt'>&nbsp;</td>
  <td class=xl87>FIRST NAME</td>
  <td colspan=12 class=xl351 style='font-family:"Arial Narrow", sans-serif; border-right:1.0pt solid black;border-left: none'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo implode("<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span>|&nbsp;&nbsp;&nbsp;&nbsp;", str_split(strtoupper($row['Lastname'])));?>
  <?php
  $flen2 = mb_strlen($row['Lastname']) - 1;
  $count2 = 32 - $flen2;
  for($i2 = 1; $i2 < $count2; $i2++){
     echo "&nbsp;&nbsp;&nbsp;|<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
  }
  ?>
  </td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td height=27 class=xl126 style='height:20.25pt'>&nbsp;</td>
  <td class=xl88>MIDDLE NAME</td>
  <td colspan=7 class=xl281 style='border-right:.5pt solid black'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo implode("<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span>|&nbsp;&nbsp;&nbsp;&nbsp;", str_split(strtoupper($row['Middlename'])));?>
  <?php
  $flen3 = mb_strlen($row['Middlename']) - 1;
  $count3 = 19 - $flen3;
  for($i3 = 1; $i3 < $count3; $i3++){
     echo "&nbsp;&nbsp;&nbsp;|<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
  }
  ?>
      
  </td>
  <td colspan=4 class=xl328 style='border-right:.5pt solid black;border-left:
  none'>3. NAME EXTENSION (e.g. Jr., Sr.)</td>
  <td class=xl127 style='border-top:none'>&nbsp;<?php echo ucwords($row['NameExt']);?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl128 style='height:18.95pt;border-top:none'>4.</td>
  <td colspan=3 class=xl89 style='border-right:.5pt solid black'>DATE OF BIRTH
  (mm/dd/yyyy)</td>
  <td colspan=2 class=xl291 style='border-right:.5pt solid black;border-left: none'><span style='mso-spacerun:yes'><?php echo $dob;?></span></td>
  <td colspan=2 rowspan=3 class=xl265 style='border-right:.5pt solid black'>16.
  RESIDENTIAL ADDRESS</td>
  <td colspan=6 rowspan=3 class=xl110 style=' border-right:1.0pt solid black;
  border-bottom:.5pt solid black'>&nbsp;&nbsp;
      <?php 
      $d1 = $row['RA_street'];
      $d2 = $row['RA_barangay'];
      $d3 = $row['RA_city'];
      $d4 = $row['RA_province'];
      $sele = mysql_query("select * from table_barangay where barangay_id = '$d2'");
      $rowc = mysql_fetch_assoc($sele);
      $sele2 = mysql_query("select * from table_city where city_id = '$d3'");
      $rowc2 = mysql_fetch_assoc($sele2);
      $sele3 = mysql_query("select * from table_province where province_id = '$d4'");
      $rowc3 = mysql_fetch_assoc($sele3);
      
      echo ucwords($d1) . " " . ucwords($rowc['barangay']) . " " . ucwords($rowc2['city']) . " " . $rowc3['province'];
      ?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl129 style='height:18.95pt'>5.</td>
  <td class=xl89 style='border-top:none'>PLACE OF BIRTH</td>
  <td colspan=4 class=xl360>&nbsp;&nbsp;<?php echo $row['PlaceOfBirth'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl128 style='height:18.95pt;border-top:none'>6.</td>
  <td align=left valign=top><span style='mso-ignore:vglayout;
  position:absolute;z-index:2;margin-left:108px;margin-top:3px;width:261px;
  height:107px'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td width=0 height=0></td>
    <td width=10></td>
    <td width=116></td>
    <td width=135></td>
   </tr>
   <tr>
    <td height=17></td>
    <td></td>
    <td align=left valign=top>
        <?php
            if($row['Sex'] == 'Male'){
                echo '<img width=116 height=17 src=male.png v:shapes="Picture_x0020_112">';
            }elseif($row['Sex'] == 'Female'){
                echo '<img width=116 height=17 src=female.png v:shapes="Picture_x0020_112">';
            }
        ?>
    </td>
   </tr>
   <tr>
    <td height=4></td>
   </tr>
   <tr>
    <td height=86></td>
    <td colspan=3 align=left valign=top>
        
        <?php
            if($row['CivilStatus'] == 'Single'){
                echo '<img width=261 height=86 src=single.png v:shapes="Group_x0020_115 AutoShape_x0020_116 Rectangle_x0020_117 Rectangle_x0020_118 Rectangle_x0020_119 Rectangle_x0020_120 Rectangle_x0020_122 Rectangle_x0020_123 Rectangle_x0020_124 Rectangle_x0020_125 Rectangle_x0020_126 Rectangle_x0020_127 Rectangle_x0020_128 Rectangle_x0020_129 Rectangle_x0020_130 Rectangle_x0020_131 Rectangle_x0020_132 Rectangle_x0020_133 Rectangle_x0020_135 Rectangle_x0020_136 Rectangle_x0020_137 Rectangle_x0020_138 Rectangle_x0020_139 Rectangle_x0020_140 Rectangle_x0020_141 Rectangle_x0020_142">';
            }elseif($row['CivilStatus'] == 'Married'){
                echo '<img width=261 height=86 src=married.png v:shapes="Group_x0020_115 AutoShape_x0020_116 Rectangle_x0020_117 Rectangle_x0020_118 Rectangle_x0020_119 Rectangle_x0020_120 Rectangle_x0020_122 Rectangle_x0020_123 Rectangle_x0020_124 Rectangle_x0020_125 Rectangle_x0020_126 Rectangle_x0020_127 Rectangle_x0020_128 Rectangle_x0020_129 Rectangle_x0020_130 Rectangle_x0020_131 Rectangle_x0020_132 Rectangle_x0020_133 Rectangle_x0020_135 Rectangle_x0020_136 Rectangle_x0020_137 Rectangle_x0020_138 Rectangle_x0020_139 Rectangle_x0020_140 Rectangle_x0020_141 Rectangle_x0020_142">';
            }elseif($row['CivilStatus'] == 'Annulled'){
                echo '<img width=261 height=86 src=annulled.png v:shapes="Group_x0020_115 AutoShape_x0020_116 Rectangle_x0020_117 Rectangle_x0020_118 Rectangle_x0020_119 Rectangle_x0020_120 Rectangle_x0020_122 Rectangle_x0020_123 Rectangle_x0020_124 Rectangle_x0020_125 Rectangle_x0020_126 Rectangle_x0020_127 Rectangle_x0020_128 Rectangle_x0020_129 Rectangle_x0020_130 Rectangle_x0020_131 Rectangle_x0020_132 Rectangle_x0020_133 Rectangle_x0020_135 Rectangle_x0020_136 Rectangle_x0020_137 Rectangle_x0020_138 Rectangle_x0020_139 Rectangle_x0020_140 Rectangle_x0020_141 Rectangle_x0020_142">';
            }elseif($row['CivilStatus'] == 'Widowed'){
                echo '<img width=261 height=86 src=widowed.png v:shapes="Group_x0020_115 AutoShape_x0020_116 Rectangle_x0020_117 Rectangle_x0020_118 Rectangle_x0020_119 Rectangle_x0020_120 Rectangle_x0020_122 Rectangle_x0020_123 Rectangle_x0020_124 Rectangle_x0020_125 Rectangle_x0020_126 Rectangle_x0020_127 Rectangle_x0020_128 Rectangle_x0020_129 Rectangle_x0020_130 Rectangle_x0020_131 Rectangle_x0020_132 Rectangle_x0020_133 Rectangle_x0020_135 Rectangle_x0020_136 Rectangle_x0020_137 Rectangle_x0020_138 Rectangle_x0020_139 Rectangle_x0020_140 Rectangle_x0020_141 Rectangle_x0020_142">';
            }elseif($row['CivilStatus'] == 'Separated'){
                echo '<img width=261 height=86 src=separated.png v:shapes="Group_x0020_115 AutoShape_x0020_116 Rectangle_x0020_117 Rectangle_x0020_118 Rectangle_x0020_119 Rectangle_x0020_120 Rectangle_x0020_122 Rectangle_x0020_123 Rectangle_x0020_124 Rectangle_x0020_125 Rectangle_x0020_126 Rectangle_x0020_127 Rectangle_x0020_128 Rectangle_x0020_129 Rectangle_x0020_130 Rectangle_x0020_131 Rectangle_x0020_132 Rectangle_x0020_133 Rectangle_x0020_135 Rectangle_x0020_136 Rectangle_x0020_137 Rectangle_x0020_138 Rectangle_x0020_139 Rectangle_x0020_140 Rectangle_x0020_141 Rectangle_x0020_142">';
            }elseif($row['CivilStatus'] != 'Single' && $row['CivilStatus'] != 'Married' && $row['CivilStatus'] != 'Annulled' && $row['CivilStatus'] != 'Widowed' && $row['CivilStatus'] != 'Separated'){
                echo '<img width=261 height=86 src=others.png v:shapes="Group_x0020_115 AutoShape_x0020_116 Rectangle_x0020_117 Rectangle_x0020_118 Rectangle_x0020_119 Rectangle_x0020_120 Rectangle_x0020_122 Rectangle_x0020_123 Rectangle_x0020_124 Rectangle_x0020_125 Rectangle_x0020_126 Rectangle_x0020_127 Rectangle_x0020_128 Rectangle_x0020_129 Rectangle_x0020_130 Rectangle_x0020_131 Rectangle_x0020_132 Rectangle_x0020_133 Rectangle_x0020_135 Rectangle_x0020_136 Rectangle_x0020_137 Rectangle_x0020_138 Rectangle_x0020_139 Rectangle_x0020_140 Rectangle_x0020_141 Rectangle_x0020_142">';
            }
        ?>
        
    </td>
   </tr>
  </table>
  </span><span style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=25 class=xl91 width=110 style='height:18.95pt;border-top:none;
    width:83pt'>SEX</td>
   </tr>
  </table>
  </span></td>
  <td colspan=4 class=xl330 style='border-left:none'>&nbsp;</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td rowspan=3 height=75 class=xl258 style='border-bottom:.5pt solid black;
  height:56.85pt'>7.</td>
  <td rowspan=3 class=xl389 style='border-bottom:.5pt solid black'>CIVIL STATUS</td>
  <td class=xl111 style='border-top:none'>&nbsp;</td>
  <td class=xl111 style='border-top:none'>&nbsp;</td>
  <td class=xl111 style='border-top:none;'>&nbsp;</td>
  <td class=xl111 style='border-top:none'>&nbsp;</td>
  <td colspan=2 class=xl263 style='border-right:.5pt solid black'>ZIP CODE<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black'>&nbsp;&nbsp;<?php echo $row['RZipCode'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl112 style='height:18.95pt'></td>
  <td class=xl112></td>
  <td class=xl112></td>
  <td class=xl112></td>
  <td class=xl96 colspan=2 style='mso-ignore:colspan;border-right:.5pt solid black'>17.
  TELEPHONE NO.</td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black'>&nbsp;&nbsp;<?php echo $row['RTelephoneNo'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl112 style='height:18.95pt'></td>
  <td class=xl112></td>
  <td class=xl112 style="padding-bottom: 8px;padding-left: 62px;font-size: 12px;">
      <?php
        if($row['CivilStatus'] != 'Single' && $row['CivilStatus'] != 'Married' && $row['CivilStatus'] != 'Annulled' && $row['CivilStatus'] != 'Widowed' && $row['CivilStatus'] != 'Separated'){
                echo $row['CivilStatus'];
        }
      ?>
  </td>
  <td class=xl112></td>
  <td colspan=2 rowspan=3 class=xl265 style='border-right:.5pt solid black'>18.
  PERMANENT ADDRESS</td>
  <td colspan=6 rowspan=3 class=xl110 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black'>&nbsp;&nbsp;
  <?php 
      $d11 = $row['PA_street'];
      $d12 = $row['PA_barangay'];
      $d13 = $row['PA_city'];
      $d14 = $row['PA_province'];
      $sele1 = mysql_query("select * from table_barangay where barangay_id = '$d12'");
      $rowc1 = mysql_fetch_assoc($sele1);
      $sele12 = mysql_query("select * from table_city where city_id = '$d13'");
      $rowc12 = mysql_fetch_assoc($sele12);
      $sele13 = mysql_query("select * from table_province where province_id = '$d14'");
      $rowc13 = mysql_fetch_assoc($sele13);
      
      echo ucwords($d1) . " " . ucwords($rowc['barangay']) . " " . ucwords($rowc2['city']) . " " . $rowc3['province'];
      ?>
  </td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl130 style='height:18.95pt'>8.</td>
  <td class=xl117>CITIZENSHIP</td>
  <td colspan=4 class=xl330 style='border-right:.5pt solid black;border-left:
      none'>&nbsp;&nbsp;<?php echo $row['Citizenship'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl129 style='height:18.95pt'>9.</td>
  <td class=xl90>HEIGHT (m)</td>
  <td colspan=4 class=xl334 style='border-left:none'>&nbsp;&nbsp;<?php echo $row['Height'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl130 style='height:18.95pt'>10.</td>
  <td class=xl92>WEIGHT (kg)</td>
  <td colspan=4 class=xl334>&nbsp;&nbsp;<?php echo $row['Weight'];?></td>
  <td colspan=2 class=xl263 style='border-right:.5pt solid black'>ZIP CODE<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black'>&nbsp;&nbsp;<?php echo $row['PZipCode'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl128 style='height:18.95pt'>11.</td>
  <td class=xl91>BLOOD TYPE</td>
  <td colspan=4 class=xl334 style='border-left:none'>&nbsp;&nbsp;<?php echo $row['BloodType'];?></td>
  <td colspan=2 class=xl96 style='border-right:.5pt solid black'>19. TELEPHONE
  NO.</td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black'>&nbsp;&nbsp;<?php echo $row['PTelephoneNo'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl129 style='height:18.95pt'>12<font class="font18">.</font></td>
  <td class=xl93>GSIS ID NO.</td>
  <td colspan=4 class=xl334 style='border-left:none'>&nbsp;&nbsp;<?php echo $row['GSIS'];?></td>
  <td colspan=2 class=xl328 style='border-right:.5pt solid black'>20. E-MAIL
  ADDRESS (if any)</td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row['Email'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl128 style='height:18.95pt;border-top:none'>13.</td>
  <td class=xl95 style='border-top:none'>PAG-IBIG ID NO.</td>
  <td colspan=4 class=xl285 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row['PAGIBIG'];?></td>
  <td colspan=2 class=xl328 style='border-right:.5pt solid black;border-left:
  none'>21. CELLPHONE NO. (if any)</td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row['CellphoneNo'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl129 style='height:18.95pt'>14.</td>
  <td class=xl93>PHILHEALTH NO.</td>
  <td colspan=4 class=xl285 style='border-right:.5pt solid black'>&nbsp;&nbsp;<?php echo $row['PHILHEALTH'];?></td>
  <td colspan=2 class=xl328 style='border-right:.5pt solid black;border-left:
  none'>22. AGENCY EMPLOYEE NO.</td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row['AgencyEmpNo'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl136 style='height:18.95pt'>15.</td>
  <td class=xl137>SSS NO.</td>
  <td colspan=4 class=xl285 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row['SSS'];?></td>
  <td colspan=2 class=xl372 style='border-right:.5pt solid black;border-left:
  none'>23. TIN</td>
  <td colspan=6 class=xl285 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row['TIN'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
     
     <?php
     
$query2 = mysql_query("Select * from table_empinfofb where Pds_Id = '$id'");
$row2 = mysql_fetch_assoc($query2);
if(mysql_num_rows($query2) == 0){
    $row2['Spouse_sname'] = 'N/A';
    $row2['Spouse_fname'] = 'N/A';
    $row2['Spouse_mname'] = 'N/A';
    $row2['Spouse_occupation'] = 'N/A';
    $row2['Spouse_busadd'] = 'N/A';
    $row2['Spouse_empbusname'] = 'N/A';
    $row2['Spouse_telephone'] = 'N/A';
    $row2['Father_sname'] = 'N/A';
    $row2['Father_fname'] = 'N/A';
    $row2['Father_mname'] = 'N/A';
    $row2['Mother_sname'] = 'N/A';
    $row2['Mother_fname'] = 'N/A';
    $row2['Mother_mname'] = 'N/A';
}
?>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td colspan=14 height=24 class=xl269 style='border-right:1.0pt solid black;
  height:18.0pt'>II.<span style='mso-spacerun:yes'>&nbsp;&nbsp;</span>FAMILY BACKGROUND</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl118 style='height:18.95pt'>24.</td>
  <td class=xl119>SPOUSE'S SURNAME</td>
  <td colspan=5 class=xl362 style='border-left:none;'>&nbsp;&nbsp;<?php echo $row2['Spouse_sname'];?></td>
  <td colspan=5 class=xl394 style='border-left:none'>25.<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;</span>NAME OF CHILD (Write full name and list
  all)</td>
  <td colspan=2 class=xl396 style='border-right:1.0pt solid black;border-left:
  none'>DATE OF BIRTH (mm/dd/yyyy)</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
     
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl120 style='height:18.95pt'>&nbsp;</td>
  <td class=xl105><span style='mso-spacerun:yes'>&nbsp;&nbsp;</span>FIRST NAME</td>
  <td colspan=5 class=xl362 style='border-left:none'>&nbsp;&nbsp;<?php echo $row2['Spouse_fname'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query3 = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 1");
     $row3 = mysql_fetch_assoc($query3);
     $cdob3 = date("m / d / Y", strtotime($row3['Date_ofbirth']));
         if(mysql_num_rows($query3) == 0){
         $row3['Name_ofchild'] = " ";
         $cdob3 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row3['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left: none'>
  <span style='mso-spacerun:yes'><?php echo $cdob3; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl121 style='height:18.95pt'>&nbsp;</td>
  <td class=xl103><span style='mso-spacerun:yes'>&nbsp;&nbsp;</span>MIDDLE NAME</td>
  <td colspan=5 class=xl362 style='border-left:none'>&nbsp;&nbsp;<?php echo $row2['Spouse_mname'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query4 = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 1, 1");
     $row4 = mysql_fetch_assoc($query4);
     $cdob4 = date("m / d / Y", strtotime($row4['Date_ofbirth']));
         if(mysql_num_rows($query4) == 0){
         $row4['Name_ofchild'] = " ";
         $cdob4 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row4['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob4; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl121 style='height:18.95pt'>&nbsp;</td>
  <td class=xl94>OCCUPATION</td>
  <td colspan=5 class=xl362 style='border-left:none'>&nbsp;&nbsp;<?php echo $row2['Spouse_occupation'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query5 = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 2, 1");
     $row5 = mysql_fetch_assoc($query5);
     $cdob5 = date("m / d / Y", strtotime($row5['Date_ofbirth']));
         if(mysql_num_rows($query5) == 0){
         $row5['Name_ofchild'] = " ";
         $cdob5 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row5['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob5; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl122 style='height:18.95pt;border-top:none'>&nbsp;</td>
  <td class=xl93 style='border-top:none'>EMPLOYER/BUS. NAME</td>
  <td colspan=5 class=xl362 style='border-left:none'>&nbsp;&nbsp;<?php echo $row2['Spouse_empbusname'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query6 = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 3, 1");
     $row6 = mysql_fetch_assoc($query6);
     $cdob6 = date("m / d / Y", strtotime($row6['Date_ofbirth']));
         if(mysql_num_rows($query6) == 0){
         $row6['Name_ofchild'] = " ";
         $cdob6 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row6['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob6; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl122 style='height:18.95pt;border-top:none'>&nbsp;</td>
  <td class=xl94>BUSINESS ADDRESS</td>
  <td colspan=5 class=xl362 style='border-left:none'>&nbsp;&nbsp;<?php echo $row2['Spouse_busadd'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query7  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 4, 1");
     $row7 = mysql_fetch_assoc($query7);
     $cdob7 = date("m / d / Y", strtotime($row7['Date_ofbirth']));
         if(mysql_num_rows($query7) == 0){
         $row7['Name_ofchild'] = " ";
         $cdob7 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row7['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob7; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl120 style='height:18.95pt'>&nbsp;</td>
  <td class=xl104>TELEPHONE NO.</td>
  <td colspan=5 class=xl362 style='border-left:none'>&nbsp;&nbsp;<?php echo $row2['Spouse_telephone'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query8  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 5, 1");
     $row8 = mysql_fetch_assoc($query8);
     $cdob8 = date("m / d / Y", strtotime($row8['Date_ofbirth']));
         if(mysql_num_rows($query8) == 0){
         $row8['Name_ofchild'] = " ";
         $cdob8 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row8['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob8; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td colspan=7 height=25 class=xl364 style='border-right:.5pt solid black;
  height:18.95pt'>(Continue on separate sheet if necessary)</td>
  <td colspan=5 class=xl321 width=230 style='border-right:.5pt solid black;
  border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query9  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 6, 1");
     $row9 = mysql_fetch_assoc($query9);
     $cdob9 = date("m / d / Y", strtotime($row9['Date_ofbirth']));
         if(mysql_num_rows($query9) == 0){
         $row9['Name_ofchild'] = " ";
         $cdob9 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row9['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob9; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl223 style='height:18.95pt;border-top:none'>26.<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
  <td colspan=2 class=xl343 style='border-right:.5pt solid black'>FATHER'S
  SURNAME</td>
  <td class=xl362 style='border-right:none'>&nbsp;&nbsp;<?php echo $row2['Father_sname'];?></td>
  <td></td>
  <td></td>
  <td></td>
  <td colspan=5 class=xl319 width=230 style='width:174pt'>&nbsp;&nbsp;
  <?php
     $query10  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 7, 1");
     $row10 = mysql_fetch_assoc($query10);
     $cdob10 = date("m / d / Y", strtotime($row10['Date_ofbirth']));
         if(mysql_num_rows($query10) == 0){
         $row10['Name_ofchild'] = " ";
         $cdob10 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row10['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob10; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl141 style='height:18.95pt'>&nbsp;</td>
  <td colspan=2 class=xl343 style='border-right:.5pt solid black'>FIRST NAME</td>
  <td colspan=4 class=xl345 style='border-right:.5pt solid black'>&nbsp;&nbsp;<?php echo $row2['Father_fname'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query11  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 8, 1");
     $row11 = mysql_fetch_assoc($query11);
     $cdob11 = date("m / d / Y", strtotime($row11['Date_ofbirth']));
         if(mysql_num_rows($query11) == 0){
         $row11['Name_ofchild'] = " ";
         $cdob11 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row11['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob11; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl224 style='height:18.95pt'>&nbsp;</td>
  <td colspan=2 class=xl347 style='border-right:.5pt solid black'>MIDDLE NAME</td>
  <td colspan=4 class=xl345 style='border-right:.5pt solid black'>&nbsp;&nbsp;<?php echo $row2['Father_mname'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query12  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 9, 1");
     $row12 = mysql_fetch_assoc($query12);
     $cdob12 = date("m / d / Y", strtotime($row12['Date_ofbirth']));
         if(mysql_num_rows($query12) == 0){
         $row12['Name_ofchild'] = " ";
         $cdob12 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row12['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob12; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl140 style='height:18.95pt;border-top:none'>27.<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
  <td colspan=6 class=xl342 style='border-right:.5pt solid black'>MOTHER'S
  MAIDEN NAME</td>
  <td colspan=5 class=xl321 width=230 style='border-right:.5pt solid black;
  border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query13  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 10, 1");
     $row13 = mysql_fetch_assoc($query13);
     $cdob13 = date("m / d / Y", strtotime($row13['Date_ofbirth']));
         if(mysql_num_rows($query13) == 0){
         $row13['Name_ofchild'] = " ";
         $cdob13 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row13['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob13; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl141 style='height:18.95pt'>&nbsp;</td>
  <td colspan=2 class=xl343 style='border-right:.5pt solid black'>SURNAME</td>
  <td colspan=4 class=xl344 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row2['Mother_sname'];?></td>
  <td colspan=5 class=xl319 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query14  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 11, 1");
     $row14 = mysql_fetch_assoc($query14);
     $cdob14 = date("m / d / Y", strtotime($row14['Date_ofbirth']));
         if(mysql_num_rows($query14) == 0){
         $row14['Name_ofchild'] = " ";
         $cdob14 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row14['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob14; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.95pt'>
  <td height=25 class=xl141 style='height:18.95pt'>&nbsp;</td>
  <td colspan=2 class=xl343 style='border-right:.5pt solid black'>FIRST NAME</td>
  <td colspan=4 class=xl344 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row2['Mother_fname'];?></td>
  <td colspan=5 class=xl320 width=230 style='border-left:none;width:174pt'>&nbsp;&nbsp;
  <?php
     $query15  = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id' ORDER BY Id asc LIMIT 12, 1");
     $row15 = mysql_fetch_assoc($query15);
     $cdob15 = date("m / d / Y", strtotime($row15['Date_ofbirth']));
         if(mysql_num_rows($query15) == 0){
         $row15['Name_ofchild'] = " ";
         $cdob15 = "<span style='mso-spacerun:yes'>&nbsp;</span>/<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/";
         }
         echo $row15['Name_ofchild'];
     
  ?>
  </td>
  <td colspan=2 class=xl291 style='border-right:1.0pt solid black;border-left:
  none'><span style='mso-spacerun:yes'><?php echo $cdob15; ?></span></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=28 style='mso-height-source:userset;height:21.0pt'>
  <td height=28 class=xl225 style='height:21.0pt'>&nbsp;</td>
  <td colspan=2 class=xl385 style='border-right:.5pt solid black'>MIDDLE NAME</td>
  <td colspan=4 class=xl386 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;&nbsp;<?php echo $row2['Mother_mname'];?></td>
  <td colspan=7 class=xl392 style='border-right:1.0pt solid black;border-left:
  none'>(Continue on separate sheet if necessary)</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td colspan=14 height=23 class=xl272 style='border-right:1.0pt solid black;
  height:17.25pt'>III.<span style='mso-spacerun:yes'>&nbsp;&nbsp;</span>EDUCATIONAL
  BACKGROUND</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.75pt'>
  <td rowspan=2 height=35 class=xl279 style='height:26.25pt;border-top:none'>28.</td>
  <td rowspan=3 class=xl377 style='border-bottom:.5pt solid black;border-top:
  none'>LEVEL</td>
  <td colspan=3 rowspan=3 class=xl313 width=217 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:164pt'>NAME OF SCHOOL<span
  style='mso-spacerun:yes'></span>(Write in full)</td>
  <td colspan=2 rowspan=3 class=xl313 width=98 style='border-bottom:.5pt solid black;
  width:73pt'>DEGREE COURSE<span style='mso-spacerun:yes'></span><br>(Write in full)<span
  style='mso-spacerun:yes'></span></td>
  <td rowspan=3 class=xl382 width=62 style='border-bottom:.5pt solid black;
  border-top:none;width:47pt'>YEAR GRADUATED<span
  style='mso-spacerun:yes'></span><font class="font33"><br>(if graduated)</font></td>
  <td colspan=3 rowspan=3 class=xl313 width=90 style='border-bottom:.5pt solid black;
  width:68pt'>HIGHEST GRADE/ <br>LEVEL/<br><span
  style='mso-spacerun:yes'></span>UNITS EARNED<span
  style='mso-spacerun:yes'></span><br>(if not graduated)</td>
  <td colspan=2 rowspan=2 class=xl313 width=138 style='width:104pt'>INCLUSIVE
  DATES OF ATTENDANCE</td>
  <td rowspan=3 class=xl293 width=103 style='border-bottom:.5pt solid black;
  border-top:none;width:77pt'>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 colspan=2 style='height:13.5pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td height=27 class=xl132 style='height:20.25pt'>&nbsp;</td>
  <td class=xl97 width=78 style='width:59pt'>From</td>
  <td class=xl97 width=60 style='border-left:none;width:45pt'>To</td>
  <td class=xl74 width=64 style='width:48pt'></td>
  <td class=xl74 width=64 style='width:48pt'></td>
 </tr>
     <?php
     $query16  = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id' AND Level = 'Elementary' order by Id asc LIMIT 1");
     $row16 = mysql_fetch_assoc($query16);
         if(mysql_num_rows($query16) == 0){
         $row16['Name'] = "N/A";
         $row16['Degree'] = "N/A";
         $row16['Year'] = "N/A";
         $row16['Highest'] = "N/A";
         $row16['Date_from'] = "N/A";
         $row16['Date_to'] = "N/A";
         $row16['Scholar'] = "N/A";
         }
     ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=2 height=40 class=xl238 width=127 style='border-right:.5pt solid black;
  height:30.0pt;width:96pt'>ELEMENTARY</td>
  <td colspan=3 class=xl262 width=217 style='width:164pt; padding: 5px;'><?php echo $row16['Name'];?></td>
  <td class=xl198 width=19 style='border-top:none;border-left:none;width:14pt'></td>
  <td class=xl199 width=79 style='border-top:none;width:59pt'><?php echo $row16['Degree'];?></td>
  <td class=xl80 width=62 style='border-top:none;width:47pt'><?php echo $row16['Year'];?></td>
  <td colspan=3 class=xl80 width=90 style='border-left:none;width:68pt'><?php echo $row16['Highest'];?></td>
  <td class=xl80 width=78 style='border-top:none;border-left:none;width:59pt'><?php echo $row16['Date_from'];?></td>
  <td class=xl80 width=60 style='border-top:none;border-left:none;width:45pt'><?php echo $row16['Date_to'];?></td>
  <td class=xl80 style='border-top:none;border-left:none; padding-right:5px'><?php echo $row16['Scholar'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
     <?php
     $query17  = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id' AND Level = 'Secondary' order by Id asc LIMIT 1");
     $row17 = mysql_fetch_assoc($query17);
         if(mysql_num_rows($query17) == 0){
         $row17['Name'] = "N/A";
         $row17['Degree'] = "N/A";
         $row17['Year'] = "N/A";
         $row17['Highest'] = "N/A";
         $row17['Date_from'] = "N/A";
         $row17['Date_to'] = "N/A";
         $row17['Scholar'] = "N/A";
         }
     ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=2 height=40 class=xl238 width=127 style='border-right:.5pt solid black;
  height:30.0pt;width:96pt'>SECONDARY</td>
  <td colspan=3 class=xl262 width=217 style='width:164pt; padding: 5px;'><?php echo $row17['Name'];?></td>
  <td class=xl198 width=19 style='border-top:none;border-left:none;width:14pt'></td>
  <td class=xl199 width=79 style='border-top:none;width:59pt'><?php echo $row17['Degree'];?></td>
  <td class=xl80 width=62 style='border-top:none;width:47pt'><?php echo $row17['Year'];?></td>
  <td colspan=3 class=xl80 width=90 style='border-left:none;width:68pt'><?php echo $row17['Highest'];?></td>
  <td class=xl80 width=78 style='border-top:none;border-left:none;width:59pt'><?php echo $row17['Date_from'];?></td>
  <td class=xl80 width=60 style='border-top:none;border-left:none;width:45pt'><?php echo $row17['Date_to'];?></td>
  <td class=xl80 style='border-top:none;border-left:none; padding-right:5px'><?php echo $row17['Scholar'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
     <?php
     $query18  = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id' AND Level = 'Vocational/Trade Course' order by Id asc LIMIT 1");
     $row18 = mysql_fetch_assoc($query18);
         if(mysql_num_rows($query18) == 0){
         $row18['Name'] = "N/A";
         $row18['Degree'] = "N/A";
         $row18['Year'] = "N/A";
         $row18['Highest'] = "N/A";
         $row18['Date_from'] = "N/A";
         $row18['Date_to'] = "N/A";
         $row18['Scholar'] = "N/A";
         }
     ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=2 height=40 class=xl240 width=127 style='border-right:.5pt solid black;
  height:30.0pt;width:96pt'>VOCATIONAL /<span
  style='mso-spacerun:yes'></span>TRADE COURSE</td>
  <td colspan=3 class=xl262 width=217 style='width:164pt; padding: 5px;'><?php echo $row18['Name'];?></td>
  <td class=xl198 width=19 style='border-top:none;border-left:none;width:14pt'></td>
  <td class=xl199 width=79 style='border-top:none;width:59pt'><?php echo $row18['Degree'];?></td>
  <td class=xl80 width=62 style='border-top:none;width:47pt'><?php echo $row18['Year'];?></td>
  <td colspan=3 class=xl80 width=90 style='border-left:none;width:68pt'><?php echo $row18['Highest'];?></td>
  <td class=xl80 width=78 style='border-top:none;border-left:none;width:59pt'><?php echo $row18['Date_from'];?></td>
  <td class=xl80 width=60 style='border-top:none;border-left:none;width:45pt'><?php echo $row18['Date_to'];?></td>
  <td class=xl80 style='border-top:none;border-left:none; padding-right:5px'><?php echo $row18['Scholar'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
     <?php
     $query19  = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id' AND Level = 'College' order by Id asc LIMIT 1");
     $row19 = mysql_fetch_assoc($query19);
         if(mysql_num_rows($query19) == 0){
         $row19['Name'] = "N/A";
         $row19['Degree'] = "N/A";
         $row19['Year'] = "N/A";
         $row19['Highest'] = "N/A";
         $row19['Date_from'] = "N/A";
         $row19['Date_to'] = "N/A";
         $row19['Scholar'] = "N/A";
         }
     ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=2 rowspan=2 height=80 class=xl275 width=127 style='border-right:
  .5pt solid black;border-bottom:.5pt solid black;height:60.0pt;width:96pt'>COLLEGE</td>
  <td colspan=3 class=xl262 width=217 style='width:164pt; padding: 5px;'><?php echo $row19['Name'];?></td>
  <td class=xl198 width=19 style='border-top:none;border-left:none;width:14pt'></td>
  <td class=xl199 width=79 style='border-top:none;width:59pt'><?php echo $row19['Degree'];?></td>
  <td class=xl80 width=62 style='border-top:none;width:47pt'><?php echo $row19['Year'];?></td>
  <td colspan=3 class=xl80 width=90 style='border-left:none;width:68pt'><?php echo $row19['Highest'];?></td>
  <td class=xl80 width=78 style='border-top:none;border-left:none;width:59pt'><?php echo $row19['Date_from'];?></td>
  <td class=xl80 width=60 style='border-top:none;border-left:none;width:45pt'><?php echo $row19['Date_to'];?></td>
  <td class=xl80 style='border-top:none;border-left:none; padding-right:5px'><?php echo $row19['Scholar'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
     <?php
     $query20  = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id' AND Level = 'College' order by Id asc LIMIT 1, 1");
     $row20 = mysql_fetch_assoc($query20);
         if(mysql_num_rows($query20) == 0){
         $row20['Name'] = "N/A";
         $row20['Degree'] = "N/A";
         $row20['Year'] = "N/A";
         $row20['Highest'] = "N/A";
         $row20['Date_from'] = "N/A";
         $row20['Date_to'] = "N/A";
         $row20['Scholar'] = "N/A";
         }
     ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=3 class=xl262 width=217 style='width:164pt; padding: 5px;'><?php echo $row20['Name'];?></td>
  <td class=xl198 width=19 style='border-top:none;border-left:none;width:14pt'></td>
  <td class=xl199 width=79 style='border-top:none;width:59pt'><?php echo $row20['Degree'];?></td>
  <td class=xl80 width=62 style='border-top:none;width:47pt'><?php echo $row20['Year'];?></td>
  <td colspan=3 class=xl80 width=90 style='border-left:none;width:68pt'><?php echo $row20['Highest'];?></td>
  <td class=xl80 width=78 style='border-top:none;border-left:none;width:59pt'><?php echo $row20['Date_from'];?></td>
  <td class=xl80 width=60 style='border-top:none;border-left:none;width:45pt'><?php echo $row20['Date_to'];?></td>
  <td class=xl80 style='border-top:none;border-left:none; padding-right:5px'><?php echo $row20['Scholar'];?></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
     <?php
     $query21  = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id' AND Level = 'Graduate Studies' order by Id asc LIMIT 1");
     $row21 = mysql_fetch_assoc($query21);
         if(mysql_num_rows($query21) == 0){
         $row21['Name'] = "N/A";
         $row21['Degree'] = "N/A";
         $row21['Year'] = "N/A";
         $row21['Highest'] = "N/A";
         $row21['Date_from'] = "N/A";
         $row21['Date_to'] = "N/A";
         $row21['Scholar'] = "N/A";
         }
     ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=2 rowspan=2 height=80 class=xl245 style='border-right:.5pt solid black;
  border-bottom:1.0pt solid black;height:60.0pt'>GRADUATE STUDIES<span
  style='mso-spacerun:yes'> </span></td>
  <td colspan=3 class=xl262 width=217 style='width:164pt; padding: 5px;'><?php echo $row21['Name'];?></td>
  <td class=xl198 width=19 style='border-top:none;border-left:none;width:14pt'></td>
  <td class=xl199 width=79 style='border-top:none;width:59pt'><?php echo $row21['Degree'];?></td>
  <td class=xl80 width=62 style='border-top:none;width:47pt'><?php echo $row21['Year'];?></td>
  <td colspan=3 class=xl80 width=90 style='border-left:none;width:68pt'><?php echo $row21['Highest'];?></td>
  <td class=xl80 width=78 style='border-top:none;border-left:none;width:59pt'><?php echo $row21['Date_from'];?></td>
  <td class=xl80 width=60 style='border-top:none;border-left:none;width:45pt'><?php echo $row21['Date_to'];?></td>
  <td class=xl80 style='border-top:none;border-left:none; padding-right:5px'><?php echo $row21['Scholar'];?></td>
 </tr>
     <?php
     $query22  = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id' AND Level = 'Graduate Studies' order by Id asc LIMIT 1, 1");
     $row22 = mysql_fetch_assoc($query22);
         if(mysql_num_rows($query22) == 0){
         $row22['Name'] = "N/A";
         $row22['Degree'] = "N/A";
         $row22['Year'] = "N/A";
         $row22['Highest'] = "N/A";
         $row22['Date_from'] = "N/A";
         $row22['Date_to'] = "N/A";
         $row22['Scholar'] = "N/A";
         }
     ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=3 class=xl262 width=217 style='width:164pt; padding: 5px;'><?php echo $row22['Name'];?></td>
  <td class=xl198 width=19 style='border-top:none;border-left:none;width:14pt'></td>
  <td class=xl199 width=79 style='border-top:none;width:59pt'><?php echo $row22['Degree'];?></td>
  <td class=xl80 width=62 style='border-top:none;width:47pt'><?php echo $row22['Year'];?></td>
  <td colspan=3 class=xl80 width=90 style='border-left:none;width:68pt'><?php echo $row22['Highest'];?></td>
  <td class=xl80 width=78 style='border-top:none;border-left:none;width:59pt'><?php echo $row22['Date_from'];?></td>
  <td class=xl80 width=60 style='border-top:none;border-left:none;width:45pt'><?php echo $row22['Date_to'];?></td>
  <td class=xl80 style='border-top:none;border-left:none; padding-right:5px'><?php echo $row22['Scholar'];?></td>
 </tr>
 <tr height=18 style='page-break-before:always;height:13.5pt'>
  <td colspan=14 height=18 class=xl288 style='border-right:1.0pt solid black;
  height:13.5pt'>(Continue on separate sheet if necessary)</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td colspan=13 height=16 class=xl252 style='height:12.0pt'>&nbsp;</td>
  <td class=xl235 style='border-top:none'>Page 1 of 4</td>
  <td></td>
  <td></td>
 </tr>
 <tr height=3 style='mso-height-source:userset;height:2.25pt'>
  <td colspan=14 height=3 class=xl236 style='height:2.25pt'>&nbsp;</td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 
</table>
</div>
<div id="editor"></div>
<button id="cmd">generate PDF</button>
<script>
            var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };

            $('#cmd').click(function () {
                doc.fromHTML($('#content').html(), 15, 15, {
                    'width': 170,
                    'elementHandlers': specialElementHandlers
                });
                doc.save('sample-file.pdf');
            });
        </script>

</body>

</html>
