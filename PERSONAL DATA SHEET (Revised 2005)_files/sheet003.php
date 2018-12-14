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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
	{margin:.26in 0in 0in 0in;
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
   parent.fnSetActiveSheet(2);
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

<table border=0 cellpadding=0 cellspacing=0 width=723 style='border-collapse:
 collapse;table-layout:fixed;width:544pt'>
 <col width=26 style='mso-width-source:userset;mso-width-alt:950;width:20pt'>
 <col width=219 style='mso-width-source:userset;mso-width-alt:8009;width:164pt'>
 <col width=26 style='mso-width-source:userset;mso-width-alt:950;width:20pt'>
 <col width=46 style='mso-width-source:userset;mso-width-alt:1682;width:35pt'>
 <col width=82 style='mso-width-source:userset;mso-width-alt:2998;width:62pt'>
 <col width=79 style='mso-width-source:userset;mso-width-alt:2889;width:59pt'>
 <col width=63 style='mso-width-source:userset;mso-width-alt:2304;width:47pt'>
 <col width=21 style='mso-width-source:userset;mso-width-alt:768;width:16pt'>
 <col width=19 style='mso-width-source:userset;mso-width-alt:694;width:14pt'>
 <col width=142 style='mso-width-source:userset;mso-width-alt:5193;width:107pt'>
 <col width=26 style='mso-width-source:userset;mso-width-alt:950;width:20pt'>
 <col width=33 style='mso-width-source:userset;mso-width-alt:1206;width:25pt'>
 <tr height=4 style='mso-height-source:userset;height:3.0pt'>
  <td colspan=10 height=4 class=xl449 width=723 style='border-right:1.0pt solid black;
  height:3.0pt;width:544pt'>&nbsp;</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td colspan=10 height=24 class=xl446 style='border-right:1.0pt solid black;
  height:18.0pt'>VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT /
  PEOPLE / VOLUNTARY ORGANIZATION/S</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td rowspan=2 height=40 class=xl493 style='height:30.0pt;border-top:none'>31.</td>
  <td colspan=3 rowspan=2 class=xl495 width=291 style='border-right:.5pt solid black;
  width:219pt'>NAME &amp; ADDRESS OF ORGANIZATION<span
  style='mso-spacerun:yes'>
  </span><br>(Write in full)</td>
  <td colspan=2 rowspan=2 class=xl427 width=161 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:121pt'>INCLUSIVE DATES<span
  style='mso-spacerun:yes'>
  </span><br>(mm/dd/yyyy)</td>
  <td rowspan=3 class=xl480 width=63 style='border-bottom:.5pt solid black;
  border-top:none;width:47pt'>NUMBER OF HOURS</td>
  <td colspan=3 rowspan=3 class=xl426 width=182 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;width:137pt'>POSITION / NATURE OF WORK</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 class=xl152 style='height:13.5pt'>&nbsp;</td>
  <td colspan=3 class=xl499 width=291 style='border-right:.5pt solid black;
  width:219pt'>&nbsp;</td>
  <td class=xl99 style='border-top:none'>From</td>
  <td class=xl101 style='border-top:none;border-left:none'>To</td>
 </tr>
     
     <?php
 $query  = mysql_query("Select * from table_empinfovw where Pds_Id = '$id' order by Id asc LIMIT 5");
 $num = mysql_num_rows($query);
 
 while ($row = mysql_fetch_array($query)) {
     
     $vwfrom = date("m/d/Y", strtotime($row['Inclusive_from']));
     $vwto = date("m/d/Y", strtotime($row['Inclusive_to']));
     ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=4 height=37 class=xl80 style='vertical-align: middle;border-right:.5pt solid black;
      height:27.75pt'><?php echo $row['Nameadd'];?></td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'><?php echo $vwfrom;?></td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'><?php echo $vwto;?></td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'><?php echo $row['Number_ofhours'];?></td>
  <td colspan=3 class=xl80 width=182 style='border-right:1.0pt solid black;vertical-align: middle;border-left:none;width:137pt'><?php echo $row['Position'];?></td>
 </tr>
 <?php
 }
 $c = 5 - $num;
     for($i=1; $i <= $c; $i++){
         ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=4 height=37 class=xl81 style='vertical-align: middle;border-right:.5pt solid black;
  height:27.75pt'>&nbsp;</td>
  <td class=xl230 style='border-top:none;border-left:none;vertical-align: middle;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/</td>
  <td class=xl230 style='border-top:none;border-left:none;vertical-align: middle;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/</td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'>&nbsp;</td>
  <td colspan=3 class=xl81 width=182 style='border-right:1.0pt solid black;vertical-align: middle;border-left:none;width:137pt'>&nbsp;</td>
 </tr>
 <?php  
     }
 ?>
     
 
 
 <tr height=18 style='height:13.5pt'>
  <td colspan=10 height=18 class=xl288 style='border-right:1.0pt solid black;
  height:13.5pt'>(Continue on separate sheet if necessary)</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td colspan=10 height=24 class=xl423 style='border-right:1.0pt solid black;
  height:18.0pt'>VII.<span style='mso-spacerun:yes'>&nbsp;</span>TRAINING PROGRAMS
  (Start from the most recent training.)</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td rowspan=2 height=44 class=xl493 style='height:33.0pt;border-top:none'>32.</td>
  <td colspan=3 rowspan=3 class=xl427 width=291 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:219pt'>TITLE OF
  SEMINAR/CONFERENCE/WORKSHOP/SHORT COURSES (Write in full)</td>
  <td colspan=2 rowspan=2 class=xl427 width=161 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:121pt'>INCLUSIVE DATES OF
  ATTENDANCE<span
  style='mso-spacerun:yes'>
  </span>(mm/dd/yyyy)</td>
  <td rowspan=3 class=xl480 width=63 style='border-bottom:.5pt solid black;
  border-top:none;width:47pt'>NUMBER OF HOURS</td>
  <td colspan=3 rowspan=3 class=xl426 width=182 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;width:137pt'><span
  style='mso-spacerun:yes'></span>CONDUCTED/ SPONSORED BY<span
  style='mso-spacerun:yes'></span><br>(Write in full)</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 class=xl152 style='height:13.5pt'>&nbsp;</td>
  <td class=xl99 style='border-top:none'>From</td>
  <td class=xl101 style='border-top:none;border-left:none'>To</td>
 </tr>
     
     
     <?php
 $query2  = mysql_query("Select * from table_empinfotp where Pds_Id = '$id' order by Id asc LIMIT 15");
 $num2 = mysql_num_rows($query2);
 
 while ($row = mysql_fetch_array($query2)) {
     
     $tpfrom = date("m/d/Y", strtotime($row['Inclusive_from']));
     $tpto = date("m/d/Y", strtotime($row['Inclusive_to']));
     ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
     <td colspan=4 height=37 class=xl80 style='padding: 2px; border-right:.5pt solid black;vertical-align: middle;height:27.75pt;'><?php echo $row['Title_ofseminar'];?></td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'><?php echo $tpfrom;?></td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'><?php echo $tpto;?></td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'><?php echo $row['Number_ofhours'];?></td>
  <td colspan=3 class=xl80 width=182 style='border-right:1.0pt solid black;vertical-align: middle;
  border-left:none;width:137pt'><?php echo $row['Sponsored_by'];?></td>
 </tr>
 <?php
 }
 $c2 = 15 - $num2;
     for($i2=1; $i2 <= $c2; $i2++){
         ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=4 height=37 class=xl81 style='border-right:.5pt solid black;vertical-align: middle;
  height:27.75pt'>&nbsp;</td>
  <td class=xl230 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/</td>
  <td class=xl230 style='border-top:none;border-left:none'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/</td>
  <td class=xl81 style='border-top:none;border-left:none;vertical-align: middle;'>&nbsp;</td>
  <td colspan=3 class=xl81 width=182 style='border-right:1.0pt solid black;vertical-align: middle;
  border-left:none;width:137pt'>&nbsp;</td>
 </tr>
 <?php  
     }
 ?>
     
     
 
 
 <tr height=18 style='height:13.5pt'>
  <td colspan=10 height=18 class=xl288 style='border-right:1.0pt solid black;
  height:13.5pt'>(Continue on separate sheet if necessary)</td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td colspan=10 height=24 class=xl487 width=723 style='border-right:1.0pt solid black;
  height:18.0pt;width:544pt'>VIII.<span style='mso-spacerun:yes'>&nbsp;</span>OTHER
  INFORMATION</td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl231 style='height:30.0pt;border-top:none'>33.</td>
  <td class=xl233 width=219 style='border-top:none;width:164pt'>SPECIAL SKILLS
  / HOBBIES:</td>
  <td class=xl232 width=26 style='border-top:none;width:20pt'>34.</td>
  <td colspan=4 class=xl233 width=270 style='border-right:.5pt solid black;
  width:203pt'>NON-ACADEMIC DISTINCTIONS / RECOGNITION:<span
  style='mso-spacerun:yes'>
  </span><br>(Write in full)</td>
  <td class=xl232 width=21 style='border-top:none;border-left:none;width:16pt'>35.</td>
  <td colspan=2 class=xl233 width=161 style='border-right:1.0pt solid black;
  width:121pt'>MEMBERSHIP IN ASSOCIATION/ORGANIZATION<span
  style='mso-spacerun:yes'>
  </span><br>(Write in full)</td>
 </tr>
     
     
      <?php
 $query3  = mysql_query("Select * from table_empinfooiskills where Pds_Id = '$id' order by Id asc LIMIT 5");
 $num3 = mysql_num_rows($query3);
 
 while ($row3 = mysql_fetch_array($query3)) {
     
     ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=2 height=37 class=xl80 width=245 style='vertical-align: middle;border-right:.5pt solid black;height:27.75pt;width:184pt'>
      <?php echo $row3['Special_skills'];?>
  </td>
  <td colspan=5 class=xl80 style='vertical-align: middle;border-right:.5pt solid black;border-left:none'>
      <?php echo $row3['Recognition'];?>
  </td>
  <td colspan=3 class=xl80 width=182 style='vertical-align: middle;border-right:1.0pt solid black;border-left:none;width:137pt'>
      <?php echo $row3['Organization'];?>
  </td>
 </tr>
 <?php
 }
 $c3 = 5 - $num3;
     for($i3=1; $i3 <= $c3; $i3++){
         ?>
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td colspan=2 height=37 class=xl465 width=245 style='padding: 5px;vertical-align: middle;border-right:.5pt solid black;height:27.75pt;width:184pt'>
      &nbsp;
  </td>
  <td colspan=5 class=xl465 style='padding: 5px;vertical-align: middle;border-right:.5pt solid black;border-left:none'>
      &nbsp;
  </td>
  <td colspan=3 class=xl465 width=182 style='padding: 5px;vertical-align: middle;border-right:1.0pt solid black;border-left:none;width:137pt'>
      &nbsp;
  </td>
 </tr>
 <?php  
     }
 ?>
     
 
 
 <tr height=18 style='page-break-before:always;height:13.5pt'>
  <td colspan=10 height=18 class=xl288 style='border-right:1.0pt solid black;
  height:13.5pt'>(Continue on separate sheet if necessary)</td>
 </tr>
 <tr height=18 style='height:13.5pt'>
  <td colspan=10 height=18 class=xl443 style='border-right:1.0pt solid black;
  height:13.5pt'><span style='mso-spacerun:yes'>&nbsp;</span>CS FORM 212 (Revised
  2005), Page 3 of 4</td>
 </tr>
 <tr height=3 style='mso-height-source:userset;height:2.25pt'>
  <td colspan=10 height=3 class=xl471 style='border-right:1.0pt solid black;
  height:2.25pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 colspan=10 style='height:15.0pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 colspan=10 style='height:12.0pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=4 style='mso-height-source:userset;height:3.0pt'>
  <td height=4 colspan=10 style='height:3.0pt;mso-ignore:colspan'></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=26 style='width:20pt'></td>
  <td width=219 style='width:164pt'></td>
  <td width=26 style='width:20pt'></td>
  <td width=46 style='width:35pt'></td>
  <td width=82 style='width:62pt'></td>
  <td width=79 style='width:59pt'></td>
  <td width=63 style='width:47pt'></td>
  <td width=21 style='width:16pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=142 style='width:107pt'></td>
 </tr>
 <![endif]>
</table>

</body>

</html>
