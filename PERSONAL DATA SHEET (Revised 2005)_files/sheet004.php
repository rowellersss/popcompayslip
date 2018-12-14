<?php
include '../includes/dbcon.php';
?>
<?php
    $id = $_REQUEST['id'];
    $query = mysql_query("Select * from table_empinfooi where Pds_Id = '$id'");
    $row = mysql_fetch_assoc($query);
    if(mysql_num_rows($query) == 0){
        
    $row['Name'] = 'N/A';
    $row['Address'] = 'N/A';
    $row['Telephone'] = 'N/A';
    $row['Name2'] = 'N/A';
    $row['Address2'] = 'N/A';
    $row['Telephone2'] = 'N/A';
    $row['Name3'] = 'N/A';
    $row['Address3'] = 'N/A';
    $row['Telephone3'] = 'N/A';
    
    
    }
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
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<title>PDS</title>
<link rel=Stylesheet href=stylesheet.css>
<style>
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{margin:.2in .25in 0in .25in;
	mso-header-margin:.17in;
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
   parent.fnSetActiveSheet(3);
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

<table border=0 cellpadding=0 cellspacing=0 width=783 style='border-collapse:
 collapse;table-layout:fixed;width:589pt'>
 <col width=20 style='mso-width-source:userset;mso-width-alt:731;width:15pt'>
 <col width=237 style='mso-width-source:userset;mso-width-alt:8667;width:178pt'>
 <col width=9 style='mso-width-source:userset;mso-width-alt:329;width:7pt'>
 <col width=206 style='mso-width-source:userset;mso-width-alt:7533;width:155pt'>
 <col width=26 style='mso-width-source:userset;mso-width-alt:950;width:20pt'>
 <col width=61 style='mso-width-source:userset;mso-width-alt:2230;width:46pt'>
 <col width=5 style='mso-width-source:userset;mso-width-alt:182;width:4pt'>
 <col width=144 style='mso-width-source:userset;mso-width-alt:5266;width:108pt'>
 <col width=11 style='mso-width-source:userset;mso-width-alt:402;width:8pt'>
 <col width=64 style='width:48pt'>
 <tr height=4 style='mso-height-source:userset;height:3.0pt'>
  <td colspan=9 height=4 class=xl449 width=719 style='border-right:1.0pt solid black;
  height:3.0pt;width:541pt'>&nbsp;</td>
  <td width=64 style='width:48pt'></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 class=xl170 style='height:13.5pt;border-top:none'>36.</td>
  <td colspan=3 rowspan=2 class=xl508 width=452 style='border-right:.5pt solid black;
  width:340pt'>Are you related by consanguinity or affinity to any of the
  following :<span style='mso-spacerun:yes'>&nbsp;</span></td>
  <td class=xl186 style='border-top:none'>&nbsp;</td>
  <td colspan=2 class=xl538>&nbsp;</td>
  <td class=xl187 width=144 style='border-top:none;width:108pt'>&nbsp;</td>
  <td class=xl188 width=11 style='border-top:none;width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl189 style='height:12.0pt'>&nbsp;</td>
  <td class=xl72></td>
  <td class=xl67></td>
  <td class=xl72></td>
  <td class=xl70 width=144 style='width:108pt'></td>
  <td class=xl190 width=11 style='width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.75pt'>
  <td height=17 class=xl189 style='height:12.75pt'>a.</td>
  <td colspan=3 rowspan=4 class=xl518 width=452 style='border-right:.5pt solid black;
  width:340pt'>Within the third degree (for National Government
  Employees):<span
  style='mso-spacerun:yes'>
  </span><br>appointing authority, recommending authority, chief of
  office/bureau/department or person who has immediate supervision over you in
  the Office, Bureau or Department where you will be appointed?</td>
  <td align=left valign=top><!--[if gte vml 1]><v:shapetype id="_x0000_t75"
   coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe"
   filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="Picture_x0020_91" o:spid="_x0000_s9338" type="#_x0000_t75"
   style='position:absolute;margin-left:10.5pt;margin-top:2.25pt;width:65.25pt;
   height:13.5pt;z-index:2;visibility:visible' o:gfxdata="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
MS5lbWZQSwUGAAAAAAYABgCEAQAAawsAAAAA
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:2;margin-left:14px;margin-top:3px;width:87px;
      height:18px'>
      <?php
      if($row['Que36_a'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que36_a'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
      </span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=17 class=xl72 width=26 style='height:12.75pt;width:20pt'></td>
   </tr>
  </table>
  </span></td>
  <td colspan=2 class=xl67></td>
  <td class=xl78 width=144 style='width:108pt'></td>
  <td class=xl190 width=11 style='width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl189 style='height:12.0pt'>&nbsp;</td>
  <td colspan=5 rowspan=3 class=xl513 width=247 style='border-right:1.0pt solid black;
  width:186pt'>If YES, give details:
      <br><div style="position: absolute; overflow-wrap: break-word;width: max-content; max-width: 11.5%;"> <?php echo $row['Details1'];?></div>
      <div style="position: relative;">_____________________________________<br>_____________________________________<br>_____________________________________</div>
  <td></td>
 </tr>
 <tr height=34 style='mso-height-source:userset;height:25.5pt'>
  <td height=34 class=xl189 style='height:25.5pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=35 style='mso-height-source:userset;height:26.25pt'>
  <td height=35 class=xl189 style='height:26.25pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl189 style='height:14.25pt'>b.</td>
  <td colspan=3 rowspan=4 class=xl518 width=452 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:340pt'>Within the fourth degree (for
  Local Government Employees):<span
  style='mso-spacerun:yes'>
  </span><br>appointing authority or recommending authority where you will be
  appointed?</td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="Picture_x0020_90"
   o:spid="_x0000_s9337" type="#_x0000_t75" style='position:absolute;
   margin-left:9.75pt;margin-top:1.5pt;width:65.25pt;height:13.5pt;z-index:1;
   visibility:visible' o:gfxdata="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
AAAAAAYABgCEAQAAYgsAAAAA
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:13px;margin-top:2px;width:87px;
  height:18px'>
      <?php
      if($row['Que36_b'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que36_b'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
      </span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=19 width=26 style='height:14.25pt;width:20pt'></td>
   </tr>
  </table>
  </span></td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl204 width=11 style='width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.75pt'>
  <td height=17 class=xl189 style='height:12.75pt'>&nbsp;</td>
  <td colspan=5 rowspan=3 class=xl512 width=247 style='border-right:1.0pt solid black; border-bottom:.5pt solid black;width:186pt'>If YES, give details:<span style='mso-spacerun:yes'>&nbsp;&nbsp;</span>
      <div style="position: absolute; overflow-wrap: break-word;width: max-content; max-width: 11.5%;"> <?php echo $row['Details2'];?></div>
      <br>_____________________________________<br>_____________________________________<br>_____________________________________           
  </td>
  <td></td>
 </tr>
 <tr height=15 style='mso-height-source:userset;height:11.25pt'>
  <td height=15 class=xl189 style='height:11.25pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=38 style='mso-height-source:userset;height:28.5pt'>
  <td height=38 class=xl229 style='height:28.5pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl191 style='height:18.0pt;border-top:none'>37</td>
  <td colspan=3 rowspan=2 class=xl541 width=452 style='border-right:.5pt solid black;
  width:340pt'>a. Have you ever been formally charged?</td>
  <td colspan=4 height=24 class=xl71 width=236 style='mso-ignore:colspan-rowspan;
  height:18.0pt;border-top:none;width:178pt'><!--[if gte vml 1]><v:shape id="Picture_x0020_104"
   o:spid="_x0000_s9347" type="#_x0000_t75" style='position:absolute;
   margin-left:9.75pt;margin-top:4.5pt;width:65.25pt;height:13.5pt;z-index:11;
   visibility:visible' o:gfxdata="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
AAYABgCEAQAAXwsAAAAA
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td width=13 height=6></td>
   </tr>
   <tr>
    <td></td>
    <td>
    <?php
      if($row['Que37_a'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que37_a'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
    </td>
    <td width=136></td>
   </tr>
   <tr>
    <td height=0></td>
   </tr>
  </table>
  </span><![endif]><!--[if !mso & vml]><span style='width:177.0pt;height:18.0pt'></span><![endif]--></td>
  <td class=xl192 style='border-top:none'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=57 style='mso-height-source:userset;height:42.75pt'>
  <td height=57 class=xl193 style='height:42.75pt'>&nbsp;</td>
  <td colspan=5 class=xl546 width=247 style='border-right:1.0pt solid black;border-left:none;width:186pt'>If YES, give details:
  <div style="position: absolute; overflow-wrap: break-word;width: max-content; max-width: 11.5%;"> <?php echo $row['Details3'];?></div>
  ________________________________<span style='mso-spacerun:yes'>&nbsp;</span><br>________________________________
  </td>
  <td></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td rowspan=3 height=72 class=xl193 style='border-bottom:.5pt solid black;
  height:54.0pt'>&nbsp;</td>
  <td colspan=3 rowspan=3 class=xl544 width=452 style='border-bottom:.5pt solid black;
  width:340pt'>b. Have you ever been guilty of any administrative offense?</td>
  <td width=26 style='width:20pt' align=left valign=top><!--[if gte vml 1]><v:shape
   id="Picture_x0020_92" o:spid="_x0000_s9339" type="#_x0000_t75" style='position:absolute;
   margin-left:9pt;margin-top:.75pt;width:65.25pt;height:13.5pt;z-index:3;
   visibility:visible' o:gfxdata="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
AAYAhAEAAF0LAAAAAA==
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:3;margin-left:12px;margin-top:1px;width:87px;
  height:18px'>
      <?php
      if($row['Que37_b'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que37_b'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
      </span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=18 class=xl217 width=26 style='height:13.5pt;width:20pt'></td>
   </tr>
  </table>
  </span></td>
  <td class=xl217 width=61 style='width:46pt'></td>
  <td class=xl217 width=5 style='width:4pt'></td>
  <td class=xl217 width=144 style='width:108pt'></td>
  <td class=xl218 width=11 style='width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.75pt'>
  <td colspan=5 rowspan=2 height=54 class=xl546 width=247 style='border-right:1.0pt solid black; border-bottom:.5pt solid black;height:40.5pt;width:186pt'>If YES, give details:
  <div style="position: absolute; overflow-wrap: break-word;width: max-content; max-width: 11.5%;"> <?php echo $row['Details4'];?></div>
  ________________________________<span style='mso-spacerun:yes'>&nbsp;</span><br>________________________________
  </td>
  <td></td>
 </tr>
     
 <tr height=37 style='mso-height-source:userset;height:27.75pt'>
  <td height=37 style='height:27.75pt'></td>
 </tr>
 <tr height=0 style='display:none;mso-height-source:userset;mso-height-alt:
  195'>
  <td class=xl194>&nbsp;</td>
  <td class=xl205>&nbsp;</td>
  <td class=xl69>&nbsp;</td>
  <td class=xl219 width=206 style='width:155pt'>&nbsp;</td>
  <td class=xl219 width=26 style='width:20pt'>&nbsp;</td>
  <td class=xl219 width=61 style='width:46pt'>&nbsp;</td>
  <td class=xl219 width=5 style='width:4pt'>&nbsp;</td>
  <td class=xl219 width=144 style='width:108pt'>&nbsp;</td>
  <td class=xl220 width=11 style='width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl191 style='height:15.0pt'>38.</td>
  <td colspan=3 rowspan=4 class=xl549 width=452 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:340pt'>Have you ever been convicted of
  any crime or violation of any law, decree, ordinance or regulation by any
  court or tribunal?</td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="Picture_x0020_93"
   o:spid="_x0000_s9340" type="#_x0000_t75" style='position:absolute;
   margin-left:11.25pt;margin-top:3.75pt;width:65.25pt;height:13.5pt;z-index:4;
   visibility:visible' o:gfxdata="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
UEsFBgAAAAAGAAYAhAEAAGYLAAAAAA==
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:4;margin-left:15px;margin-top:5px;width:87px;
  height:18px;'>
      <?php
      if($row['Que38'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que38'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
      </span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=20 class=xl228 width=26 style='height:15.0pt;border-top:none;
    border-left:none;width:20pt'>&nbsp;</td>
   </tr>
  </table>
  </span></td>
  <td class=xl71 style='border-top:none'>&nbsp;</td>
  <td class=xl71 style='border-top:none'>&nbsp;</td>
  <td class=xl71 style='border-top:none'>&nbsp;</td>
  <td class=xl192 style='border-top:none'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
     
  <td height=22 class=xl193 style='height:16.5pt'>&nbsp;</td>
  <td colspan=5 rowspan=3 class=xl546 width=247 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;width:186pt'>If YES, give details:
      <div style="position: absolute; overflow-wrap: break-word;width: max-content; max-width: 11.5%;"> <?php echo $row['Details5'];?></div>
      <div style="position:relative;">________________________________<span style='mso-spacerun:yes'>&nbsp;</span><br>________________________________<div>
  </td>
  <td></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 class=xl193 style='height:13.5pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=15 style='mso-height-source:userset;height:11.25pt'>
  <td height=15 class=xl195 style='height:11.25pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl191 style='height:14.25pt;border-top:none'>39.</td>
  <td colspan=3 rowspan=4 class=xl549 width=452 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:340pt'>Have you ever been separated from
  the service in any of the following modes: resignation, retirement, dropped
  from the rolls, dismissal, termination, end of term, finished contract, AWOL
  or phased out, in the public or private sector?</td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="Picture_x0020_94"
   o:spid="_x0000_s9341" type="#_x0000_t75" style='position:absolute;
   margin-left:10.5pt;margin-top:3pt;width:65.25pt;height:13.5pt;z-index:5;
   visibility:visible' o:gfxdata="UEsDBBQABgAIAAAAIQD2GxjBDgEAABoCAAATAAAAW0NvbnRlbnRfVHlwZXNdLnhtbJSRy07DMBBF
90j8g+UtShxYIITidEFgCRUqH2DZk8QifsjjhvTvsZtWgooidWnPnHuPk3o1m5FMEFA7y+ltWVEC
Vjqlbc/px+aleKAEo7BKjM4CpztAumqur+rNzgOSRFvkdIjRPzKGcgAjsHQebJp0LhgR0zH0zAv5
KXpgd1V1z6SzEWwsYs6gTd1CJ7ZjJM9zul5MwHSUPC17uYpTbTI/F3nC/mQCjHgCCe9HLUVMr2OT
VSdmxcGqTOR+Bwft8Sapn2nIk99WPwsO3Fv6nEErIGsR4qswyZ2pgMxrGbcB0lb5f04WNVi4rtMS
yjbgeiGPYucKlPuyAaZL09uEvcN0TGf7P9t8AwAA//8DAFBLAwQUAAYACAAAACEACMMYpNQAAACT
AQAACwAAAF9yZWxzLy5yZWxzpJDBasMwDIbvg76D0X1x2sMYo05vg15LC7saW0nMYstIbtq+/UzZ
YBm97ahf6PvEv91d46RmZAmUDKybFhQmRz6kwcDp+P78CkqKTd5OlNDADQV23eppe8DJlnokY8ii
KiWJgbGU/Ka1uBGjlYYyprrpiaMtdeRBZ+s+7YB607Yvmn8zoFsw1d4b4L3fgDrecjX/YcfgmIT6
0jiKmvo+uEdU7emSDjhXiuUBiwHPcg8Z56Y+B/qxd/1Pbw6unBk/qmGh/s6r+ceuF1V2XwAAAP//
AwBQSwMEFAAGAAgAAAAhAExiESHqAgAAhAcAABIAAABkcnMvcGljdHVyZXhtbC54bWysVduOmzAQ
fa/Uf0B+Z8GEhIuWrFJIqkq9rKr2AxwwwSpgZDuXVdV/79iGZKOt1GrTvMQZj+cczznj3D+cutY5
UCEZ7zOE73zk0L7kFet3Gfr+bePGyJGK9BVpeU8z9EQleli+fXN/qkRK+rLhwoESvUwhkKFGqSH1
PFk2tCPyjg+0h92ai44o+Cl2XiXIEYp3rRf4/sKTg6Ckkg2lqrA7aGlqqyPPaduuLAStmFrJDAEH
HR1zasE7m13ydhnee5qUXpoKsPhS10s8m83m/nlPh8y24MdlgG1cr6egTpjF2B+PwJY5YmpfABU/
gyyjc/FzTB+J51EwP29d4wZ/xg3gzHjkCndCG1hpIfrDIysfxYj3+fAoHFZlKJlhELAnHSgFCWov
qJOEyLvk2VMkhUofeflDjuKRV0jXEdYDGM8b0u/oSg60VGChZyEBl2i0vDoMJKw+wNayMD+vbrJt
2bBhLQhIUr2+mZ215j8Zk9c1K2nBy31He2XdKWhLFEyGbNggkSNS2m0p9Fl8qDB4kKT0pD5KNa6c
vWAZ+hnEK99PgnduPvdzN/SjtbtKwsiN/HUU+mGMc5z/0qdxmO4lBRlIWwxsuisOX2jRsVJwyWt1
V/LOs0SnQQKi2PesFgfSZsg3nTbUoOMXirDULdVcpSi/glgT4gu8v4+twQNFoZYSVJXNrbV0qRqU
17y0U86FR9dcnKFnXA5g+O3xE6/A6GSvuBHjVIvuf/CABjunDIWLIMFzmKcnWM8S7Adz3VrTUaeE
hDiIF9EcOSUk4AiHkGupayI6cRBSvaf8ZlKOLgSug96Yi5IDmM5CTRAarud6dm7twHRFgLi11NQs
OxeJn6zjdRy6YbBYw1wUhbva5KG72OBoXsyKPC/wNBcNqyraP7/O68dCs5C8ZdX0skix2+atcMy4
bMxnFO5ZmqfH80JjGqXp20y9ecC0F0eTwqM6vrQtgzekIIpolbRjr/7Oxpj9+1z+BgAA//8DAFBL
AwQUAAYACAAAACEAjiIJQroAAAAhAQAAHQAAAGRycy9fcmVscy9waWN0dXJleG1sLnhtbC5yZWxz
hI/LCsIwEEX3gv8QZm/TuhCRpt2I0K3UDxiSaRtsHiRR7N8bcGNBcDn3cs9h6vZlZvakELWzAqqi
BEZWOqXtKODWX3ZHYDGhVTg7SwIWitA22019pRlTHsVJ+8gyxUYBU0r+xHmUExmMhfNkczO4YDDl
M4zco7zjSHxflgcevhnQrJisUwJCpypg/eKz+T/bDYOWdHbyYcimHwquTXZnIIaRkgBDSuMnrAoy
A/Cm5qvHmjcAAAD//wMAUEsDBBQABgAIAAAAIQBHJP1nFgEAAIsBAAAPAAAAZHJzL2Rvd25yZXYu
eG1sVJBNSwMxEIbvgv8hjODNZj+6tl2bllIoiIdCq4jHsJn9wE2yJGm7+uud1Urpcd7J8+ZJ5ste
t+yIzjfWCIhHETA0hVWNqQS8vW4epsB8kEbJ1hoU8IUelovbm7nMlT2ZHR73oWJUYnwuBdQhdDnn
vqhRSz+yHRraldZpGWh0FVdOnqhctzyJokeuZWPohlp2uK6x+NwfNGls1t02m5XZxyHw981ezcYv
qIS4v+tXT8AC9uFy+Ew/KwGzNCZ/eg1VwIIU+3Zlito6Vu7QN9/k/5eXzmrm7ElAEgMrbCtgDEOw
LUuPQUA6jSOqos1/EqdpmkXAh9pgz3ByhidXcDLNJtkVTEGSDSy/OP0Olz9c/AAAAP//AwBQSwME
FAAGAAgAAAAhACyHRjqmAwAA7AsAABQAAABkcnMvbWVkaWEvaW1hZ2UxLmVtZtSWPWtUURCGZ8/u
JkYlLmsQhRCvi4po1BW0svAGoyL4scSIUQQTSJRg1DUBP5stlLT5AQFbLQT9B5Z2NnaCaKWFhaB9
fN7dO+v1somxkgy8d+bMmY8zZyYnmzOzGeDUG8zqvoD/XGf2IWcWnTh70ixn3zaYDaEvpGwk7tzM
Z5vZO9gm7NN0em/eLlYKRgAbBBEg3L5cnLN+5BIIpTcfYDZGfkG2V0ENyLYSF2wjsmgg7mnLO4nh
+mocmrFaZ2sc2xF3t/cKsbXlLcSQz1awHpSAUw9CCQxwhrvwXUC2vWaNciKrvBFQR5C8uLS0BGvT
gpRQd2zlUZu2WzZlcxbZOfh9+IjdQTdht1tm//07Zz1VHUL3tlh/Xn2VrKVL06ktqiyErnyxUAz5
wvwjiuFeGJEmLbErStdsHWqW2YK95uue8jJ7/7Zs4UWois/8eF79Bp+81zLyPshXfUt6HkaRBadB
hDqQXfHgfGwNAF0B0p0BrflAgLzPNeQI7AeavT2gH5waPn2cUWiT7OvJaiW7PMnurmDHyDRpCptb
Kbs+ZN2K8ubhO5L1AFx1O11HmAGdZlLnXWYmQ3ds4RIzedtu2GTC5zzoGuRHuxZywYrZk5dSiobk
dM1G7V6z99b7gWkke63FVzOTipGdwzF0NwFj8MccXk502Tn0ftbYn/1uJrtdYCNQDI8vvUhzk42v
vdXEj7DTnFeA4qvWTrN8jT3NYHaW/zaj4/gUBA5eh4+AOrJivUzuFbFJCyoOYi4rQzbLRE4w13or
J1jN8lLebxmsse/QblUWNhS7Qgj5UJj3QUvqeJbwdM3WoWb1RoR5JJdEtuGPrbdSXG/lVXj2rdR9
l4HPkM+T9HpLpIeab+g4gqC+fQGTQK3xN3QcWX2U7xkgu/GEe59HWV+2E3YBrvk6kHDPq3iyEb4C
xdBsTcPTubSnXNItl6vGXgSUowJUi+6m0xxHCgT5Wy+5k90j7FTf9vDn292Hbh1Y7k1+jJ9qkV8d
XgY6j9J67YqbvfMxdO77CePJxMfvXHsj6Ajbvge391w19s7ZeTsEPwI8n3KPJvjMQufrJVD2rrWn
HLL3u+6UI2J/NXe9nUDqwxP4v/xf8x49xW+GXGWQvUPdQ/YOVaP7PsA3+yZqL/smur3nqhFjpTf3
ITFEqikbX3uriR/hn31zvVe9Zg3N42GwB+j37t6Y39TIqpftY/q08FuWTz8oAfmEuP03rd+r1gdE
JSD5FwAAAP//AwBQSwECLQAUAAYACAAAACEA9hsYwQ4BAAAaAgAAEwAAAAAAAAAAAAAAAAAAAAAA
W0NvbnRlbnRfVHlwZXNdLnhtbFBLAQItABQABgAIAAAAIQAIwxik1AAAAJMBAAALAAAAAAAAAAAA
AAAAAD8BAABfcmVscy8ucmVsc1BLAQItABQABgAIAAAAIQBMYhEh6gIAAIQHAAASAAAAAAAAAAAA
AAAAADwCAABkcnMvcGljdHVyZXhtbC54bWxQSwECLQAUAAYACAAAACEAjiIJQroAAAAhAQAAHQAA
AAAAAAAAAAAAAABWBQAAZHJzL19yZWxzL3BpY3R1cmV4bWwueG1sLnJlbHNQSwECLQAUAAYACAAA
ACEARyT9ZxYBAACLAQAADwAAAAAAAAAAAAAAAABLBgAAZHJzL2Rvd25yZXYueG1sUEsBAi0AFAAG
AAgAAAAhACyHRjqmAwAA7AsAABQAAAAAAAAAAAAAAAAAjgcAAGRycy9tZWRpYS9pbWFnZTEuZW1m
UEsFBgAAAAAGAAYAhAEAAGYLAAAAAA==
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:5;margin-left:14px;margin-top:4px;width:87px;
  height:18px'>
      <?php
      if($row['Que39'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que39'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
      </span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=19 class=xl71 width=26 style='height:14.25pt;border-top:none;
    width:20pt'>&nbsp;</td>
   </tr>
  </table>
  </span></td>
  <td class=xl71 style='border-top:none'>&nbsp;</td>
  <td class=xl71 style='border-top:none'>&nbsp;</td>
  <td class=xl71 style='border-top:none'>&nbsp;</td>
  <td class=xl192 style='border-top:none'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl193 style='height:12.0pt'>&nbsp;</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl226>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=15 style='mso-height-source:userset;height:11.25pt'>
  <td height=15 class=xl193 style='height:11.25pt'>&nbsp;</td>
  <td colspan=5 rowspan=2 class=xl547 width=247 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;width:186pt'>If YES, give details:
  <div style="position: absolute; overflow-wrap: break-word;width: max-content; max-width: 11.5%;"> <?php echo $row['Details6'];?></div>
  <div>________________________________<span style='mso-spacerun:yes'>&nbsp;<br></span>________________________________</div>
  </td>
  <td></td>
 </tr>
 <tr height=51 style='mso-height-source:userset;height:38.25pt'>
  <td height=51 class=xl193 style='height:38.25pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl191 style='height:18.0pt'>40.</td>
  <td colspan=3 rowspan=4 class=xl541 width=452 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black;width:340pt'>Have you ever been a candidate in
  a national or local election (except Barangay election)?</td>
  <td colspan=4 height=24 class=xl71 width=236 style='mso-ignore:colspan-rowspan;
  height:18.0pt;border-top:none;width:178pt'><!--[if gte vml 1]><v:shape id="Picture_x0020_95"
   o:spid="_x0000_s9342" type="#_x0000_t75" style='position:absolute;
   margin-left:11.25pt;margin-top:3.75pt;width:65.25pt;height:13.5pt;z-index:6;
   visibility:visible' o:gfxdata="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
AAAABgAGAIQBAABhCwAAAAA=
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td width=15 height=5></td>
   </tr>
   <tr>
    <td></td>
    <td>
    <?php
      if($row['Que40'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que40'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
    </td>
    <td width=134></td>
   </tr>
   <tr>
    <td height=1></td>
   </tr>
  </table>
  </span><![endif]><!--[if !mso & vml]><span style='width:177.0pt;height:18.0pt'></span><![endif]--></td>
  <td class=xl192 style='border-top:none'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=16 style='mso-height-source:userset;height:12.0pt'>
  <td height=16 class=xl193 style='height:12.0pt'>&nbsp;</td>
  <td colspan=5 rowspan=3 class=xl547 width=247 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;width:186pt'>If YES, give details:
  <div style="position: absolute; overflow-wrap: break-word;width: max-content; max-width: 11.5%;"> <?php echo $row['Details7'];?></div>
  <div style="position: relative;">________________________________<span style='mso-spacerun:yes'>&nbsp;<br></span>________________________________</div>
  </td>
  <td></td>
 </tr>
 <tr height=15 style='mso-height-source:userset;height:11.25pt'>
  <td height=15 class=xl193 style='height:11.25pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=23 style='mso-height-source:userset;height:17.25pt'>
  <td height=23 class=xl195 style='height:17.25pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=38 style='mso-height-source:userset;height:28.5pt'>
  <td height=38 class=xl221 width=20 style='height:28.5pt;width:15pt'>41.</td>
  <td colspan=3 rowspan=2 class=xl504 width=452 style='border-right:.5pt solid black;
  width:340pt'>Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna
  Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of
  2000 (RA 8972)<font class="font7">, please answer the following items:</font></td>
  <td class=xl71 style='border-top:none'>&nbsp;</td>
  <td class=xl68 style='border-top:none'>&nbsp;</td>
  <td class=xl68 style='border-top:none'>&nbsp;</td>
  <td class=xl79 width=144 style='border-top:none;width:108pt'>&nbsp;</td>
  <td class=xl196 width=11 style='border-top:none;width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=17 style='mso-height-source:userset;height:12.75pt'>
  <td height=17 class=xl221 width=20 style='height:12.75pt;width:15pt'>&nbsp;</td>
  <td class=xl206></td>
  <td class=xl206></td>
  <td class=xl206></td>
  <td class=xl206></td>
  <td class=xl207>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 class=xl221 width=20 style='height:13.5pt;width:15pt'>a.<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
  <td colspan=3 rowspan=2 class=xl504 width=452 style='border-right:.5pt solid black;
  width:340pt'>Are you a member of any indigenous group?</td>
  <td colspan=4 height=18 width=236 style='mso-ignore:colspan-rowspan;
  height:13.5pt;width:178pt'><!--[if gte vml 1]><v:shape id="Picture_x0020_96"
   o:spid="_x0000_s9343" type="#_x0000_t75" style='position:absolute;
   margin-left:9pt;margin-top:0;width:65.25pt;height:13.5pt;z-index:7;
   visibility:visible' o:gfxdata="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
AABYCwAAAAA=
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td width=12 height=0></td>
   </tr>
   <tr>
    <td></td>
    <td><?php
      if($row['Que41_a'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que41_a'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?></td>
    <td width=137></td>
   </tr>
   <tr>
    <td height=0></td>
   </tr>
  </table>
  </span><![endif]><!--[if !mso & vml]><span style='width:177.0pt;height:13.5pt'></span><![endif]--></td>
  <td class=xl226>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl221 width=20 style='height:15.0pt;width:15pt'>&nbsp;</td>
  <td colspan=5 class=xl506 style='border-right:1.0pt solid black'>
      <div style="position: absolute; overflow-wrap: break-word;width: max-content; margin-left: 110px; max-width: 5%;"> <?php echo $row['Details8'];?></div>
      <div style="position: relative;">If YES, please specify:____________________</div>
  </td>
  <td class=xl227></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 class=xl221 width=20 style='height:13.5pt;width:15pt'>b.<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
  <td colspan=3 rowspan=2 class=xl505 width=452 style='width:340pt'>Are you
  differently abled?</td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="Picture_x0020_97"
   o:spid="_x0000_s9344" type="#_x0000_t75" style='position:absolute;
   margin-left:9pt;margin-top:3pt;width:65.25pt;height:13.5pt;z-index:8;
   visibility:visible' o:gfxdata="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
AAYAhAEAAF0LAAAAAA==
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:8;margin-left:12px;margin-top:4px;width:87px;
  height:18px'>
      <?php
      if($row['Que41_b'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que41_b'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
      </span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=18 width=26 style='height:13.5pt;width:20pt'></td>
   </tr>
  </table>
  </span></td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl226>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl221 width=20 style='height:15.0pt;width:15pt'>&nbsp;</td>
  <td colspan=5 class=xl506 style='border-right:1.0pt solid black'>
      <div style="position: absolute; overflow-wrap: break-word;width: max-content; margin-left: 110px;max-width: 11.5%;"> <?php echo $row['Details9'];?></div>
      <div style="position: relative;">If YES, please specify:____________________</div>
  </td>
  <td class=xl227></td>
 </tr>
 <tr height=18 style='mso-height-source:userset;height:13.5pt'>
  <td height=18 class=xl221 width=20 style='height:13.5pt;width:15pt'>c.<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
  <td colspan=3 rowspan=2 class=xl505 width=452 style='width:340pt'>Are you a
  solo parent?</td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="Picture_x0020_98"
   o:spid="_x0000_s9345" type="#_x0000_t75" style='position:absolute;
   margin-left:8.25pt;margin-top:.75pt;width:65.25pt;height:13.5pt;z-index:9;
   visibility:visible' o:gfxdata="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
AFcLAAAAAA==
">
   <v:imagedata src="image015.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:9;margin-left:11px;margin-top:1px;width:87px;
  height:18px'>
      <?php
      if($row['Que41_c'] == 'Yes'){
          echo '<img width=87 height=18 src=yes.png v:shapes="Picture_x0020_91">';
      }  elseif($row['Que41_c'] == 'No') {
          echo '<img width=87 height=18 src=no.png v:shapes="Picture_x0020_91">';
      }
      ?>
      </span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=18 width=26 style='height:13.5pt;width:20pt'></td>
   </tr>
  </table>
  </span></td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl226>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl221 width=20 style='height:14.25pt;width:15pt'>&nbsp;</td>
  <td colspan=5 class=xl506 style='border-right:1.0pt solid black'>
      <div style="position: absolute; overflow-wrap: break-word;width: max-content; margin-left: 110px;max-width: 5%;"> <?php echo $row['Details9'];?></div>
      <div style="position: relative;">If YES, please specify:____________________</div>
  </td>
  <td class=xl227></td>
 </tr>
 <tr height=5 style='mso-height-source:userset;height:3.75pt'>
  <td height=5 class=xl222 width=20 style='height:3.75pt;width:15pt'>&nbsp;</td>
  <td colspan=3 class=xl558 width=452 style='border-right:.5pt solid black;
  width:340pt'>&nbsp;</td>
  <td colspan=4 class=xl565>&nbsp;</td>
  <td class=xl197 width=11 style='width:8pt'>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=25 style='mso-height-source:userset;height:18.75pt'>
  <td height=25 class=xl195 style='height:18.75pt'>42.</td>
  <td colspan=8 class=xl567>REFERENCES <font class="font21">(Person not related
  by consanguinity or affinity to applicant / appointee)</font></td>
  <td></td>
 </tr>
 <tr height=24 style='mso-height-source:userset;height:18.0pt'>
  <td height=24 class=xl180 style='height:18.0pt;border-top:none'>&nbsp;</td>
  <td class=xl98>NAME</td>
  <td class=xl99>&nbsp;</td>
  <td class=xl113 style='border-left:none'>ADDRESS</td>
  <td colspan=2 class=xl563 width=87 style='border-right:1.0pt solid black;
  width:66pt'>TEL. NO.</td>
  <td class=xl162 style='border-left:none'>&nbsp;</td>
  <td align=left valign=top><!--[if gte vml 1]><v:shape id="Text_x0020_Box_x0020_100"
   o:spid="_x0000_s9346" type="#_x0000_t75" style='position:absolute;
   margin-left:7.5pt;margin-top:4.5pt;width:98.25pt;height:135pt;z-index:10;
   visibility:visible' o:gfxdata="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
AAAAAA==
">
   <v:imagedata src="image017.png" o:title=""/>
   <o:lock v:ext="edit" aspectratio="f"/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:10;margin-left:10px;margin-top:6px;width:131px;
  height:180px'><img width=131 height=180 src=../<?php echo $row['Photo'];?> v:shapes="Text_x0020_Box_x0020_100"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=24 class=xl163 width=144 style='height:18.0pt;width:108pt'>&nbsp;</td>
   </tr>
  </table>
  </span></td>
  <td class=xl164>&nbsp;</td>
  <td></td>
 </tr>
     
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td height=26 class=xl181 style='height:19.5pt;border-top:none;'>&nbsp;<?php echo $row['Name'];?></td>
  <td class=xl114 style='border-top:none'>&nbsp;</td>
  <td class=xl115 style='border-top:none'>&nbsp;</td>
  <td class=xl80 style='border-top:none;border-left:none'>&nbsp;<?php echo $row['Address'];?></td>
  <td colspan=2 class=xl556 style='border-right:1.0pt solid black'>&nbsp;<?php echo $row['Telephone'];?></td>
  <td class=xl165 style='border-left:none'>&nbsp;</td>
  <td class=xl166></td>
  <td class=xl167>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=27 style='mso-height-source:userset;height:20.25pt'>
  <td height=27 class=xl181 style='height:20.25pt;border-top:none'>&nbsp;<?php echo $row['Name2'];?></td>
  <td class=xl114 style='border-top:none'>&nbsp;</td>
  <td class=xl115 style='border-top:none'>&nbsp;</td>
  <td class=xl80 style='border-top:none;border-left:none'>&nbsp;<?php echo $row['Address2'];?></td>
  <td colspan=2 class=xl556 style='border-right:1.0pt solid black'>&nbsp;<?php echo $row['Telephone2'];?></td>
  <td class=xl165 style='border-left:none'>&nbsp;</td>
  <td class=xl166></td>
  <td class=xl167>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=29 style='mso-height-source:userset;height:21.75pt'>
  <td height=29 class=xl182 style='height:21.75pt;border-top:none'>&nbsp;<?php echo $row['Name3'];?></td>
  <td class=xl183 style='border-top:none'>&nbsp;</td>
  <td class=xl184 style='border-top:none'>&nbsp;</td>
  <td class=xl80 style='border-top:none;border-left:none'>&nbsp;<?php echo $row['Address3'];?></td>
  <td colspan=2 class=xl561 style='border-right:1.0pt solid black'>&nbsp;<?php echo $row['Telephone3'];?></td>
  <td class=xl165 style='border-left:none'>&nbsp;</td>
  <td class=xl166></td>
  <td class=xl167>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=51 style='mso-height-source:userset;height:38.25pt'>
  <td rowspan=2 height=61 class=xl170 style='height:45.75pt;border-top:none'>43.</td>
  <td colspan=5 class=xl536 width=539 style='border-right:1.0pt solid black;
  width:406pt'>I declare under oath that this Personal Data Sheet has been
  accomplished by me, and is a true, correct and complete statement pursuant to
  the provisions of pertinent laws, rules and regulations of the Republic of
  the Philippines.</td>
  <td class=xl165 style='border-left:none'>&nbsp;</td>
  <td class=xl166></td>
  <td class=xl167>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl100 width=237 style='height:7.5pt;width:178pt'>&nbsp;</td>
  <td class=xl100 width=9 style='width:7pt'>&nbsp;</td>
  <td class=xl100 width=206 style='width:155pt'>&nbsp;</td>
  <td class=xl100 width=26 style='width:20pt'>&nbsp;</td>
  <td class=xl171 width=61 style='width:46pt'>&nbsp;</td>
  <td class=xl165 style='border-left:none'>&nbsp;</td>
  <td class=xl86></td>
  <td class=xl167>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=35 style='mso-height-source:userset;height:26.25pt'>
  <td height=35 class=xl172 style='height:26.25pt'>&nbsp;</td>
  <td colspan=5 class=xl534 width=539 style='border-right:1.0pt solid black;
  width:406pt'>I also authorize the agency head / authorized representative to
  verify / validate the contents stated herein.<span style='mso-spacerun:yes'>&nbsp;
  </span>I trust that<span style='mso-spacerun:yes'>&nbsp;</span>this information
  shall remain confidential.</td>
  <td class=xl169 style='border-left:none'>&nbsp;</td>
  <td class=xl216>PHOTO</td>
  <td class=xl167>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=9 style='mso-height-source:userset;height:6.75pt'>
  <td height=9 class=xl168 style='height:6.75pt'>&nbsp;</td>
  <td class=xl65></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl154 style='border-top:none'>&nbsp;</td>
  <td class=xl154>&nbsp;</td>
  <td class=xl155>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl156 style='height:16.5pt'>&nbsp;</td>
  <td class=xl85 style="font-style: normal;">&nbsp;<?php echo $row['Community_tax'];?></td>
  <td></td>
  <td colspan=3 rowspan=4 class=xl215>&nbsp;</td>
  <td></td>
  <td rowspan=7 class=xl531 style='border-bottom:.5pt solid black'>&nbsp;</td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl156 style='height:15.75pt'>&nbsp;</td>
  <td class=xl101 style='border-top:none'>COMMUNITY TAX CERTIFICATE NO.</td>
  <td></td>
  <td></td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=8 style='mso-height-source:userset;height:6.0pt'>
  <td height=8 class=xl156 style='height:6.0pt'>&nbsp;</td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl156 style='height:16.5pt'>&nbsp;</td>
  <td class=xl85 style="font-style: normal;">&nbsp;<?php echo $row['Issued_at'];?></td>
  <td></td>
  <td></td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl156 style='height:14.25pt'>&nbsp;</td>
  <td class=xl101 style='border-top:none'>ISSUED AT</td>
  <td></td>
  <td colspan=3 class=xl101>SIGNATURE<font class="font5"> </font><font
  class="font27">(Sign inside the box)</font></td>
  <td class=xl65></td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=6 style='mso-height-source:userset;height:4.5pt'>
  <td height=6 class=xl156 style='height:4.5pt'>&nbsp;</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class=xl65></td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=22 style='mso-height-source:userset;height:16.5pt'>
  <td height=22 class=xl156 style='height:16.5pt'>&nbsp;</td>
  <td class=xl106><span style='mso-spacerun:yes'>&nbsp;<?php echo date("m/d/Y", strtotime($row['Issued_on']));?></td>
  <!--</span>/<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>/-->
  <td></td>
  <td colspan=3 class=xl530 style="text-align: center;font-style: normal;">&nbsp;<?php echo date("m/d/Y", strtotime($row['Date_acc']));?></td>
  <td class=xl66></td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=19 style='mso-height-source:userset;height:14.25pt'>
  <td height=19 class=xl156 style='height:14.25pt'>&nbsp;</td>
  <td class=xl101 style='border-top:none'>ISSUED ON (mm/dd/yyyy)</td>
  <td></td>
  <td colspan=3 class=xl101>DATE ACCOMPLISHED</td>
  <td class=xl66></td>
  <td class=xl166>RIGHT THUMBMARK</td>
  <td class=xl157>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl158 style='height:7.5pt'>&nbsp;</td>
  <td class=xl159>&nbsp;</td>
  <td class=xl159>&nbsp;</td>
  <td class=xl159>&nbsp;</td>
  <td class=xl160>&nbsp;</td>
  <td class=xl160>&nbsp;</td>
  <td class=xl160>&nbsp;</td>
  <td class=xl142>&nbsp;</td>
  <td class=xl161>&nbsp;</td>
  <td></td>
 </tr>
 <tr height=5 style='mso-height-source:userset;height:3.75pt'>
  <td height=5 class=xl173 style='height:3.75pt;border-top:none'>&nbsp;</td>
  <td class=xl174 style='border-top:none'>&nbsp;</td>
  <td class=xl174 style='border-top:none'>&nbsp;</td>
  <td class=xl174 style='border-top:none'>&nbsp;</td>
  <td class=xl175 style='border-top:none'>&nbsp;</td>
  <td class=xl175 style='border-top:none'>&nbsp;</td>
  <td class=xl175 style='border-top:none'>&nbsp;</td>
  <td class=xl154 style='border-top:none'>&nbsp;</td>
  <td class=xl176 style='border-top:none'>&nbsp;</td>
  <td></td>
 </tr>
 <tr class=xl73 height=12 style='page-break-before:always;height:9.0pt'>
  <td height=12 class=xl177 style='height:9.0pt'>&nbsp;</td>
  <td class=xl178>&nbsp;</td>
  <td class=xl178>&nbsp;</td>
  <td class=xl178>&nbsp;</td>
  <td class=xl178>&nbsp;</td>
  <td class=xl178>&nbsp;</td>
  <td class=xl178>&nbsp;</td>
  <td class=xl178>&nbsp;</td>
  <td class=xl179>&nbsp;</td>
  <td class=xl73></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=9 height=20 class=xl527 style='border-right:.5pt solid black;height:15.0pt'>CS FORM 212 (Revised 2005),<span style='mso-spacerun:yes'>&nbsp;
  </span>Page 4 of 4</td>
  <td></td>
 </tr>
 <tr height=3 style='mso-height-source:userset;height:2.25pt'>
  <td colspan=9 height=3 class=xl522 style='border-right:.5pt solid black;
  height:2.25pt'>&nbsp;</td>
  <td></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=20 style='width:15pt'></td>
  <td width=237 style='width:178pt'></td>
  <td width=9 style='width:7pt'></td>
  <td width=206 style='width:155pt'></td>
  <td width=26 style='width:20pt'></td>
  <td width=61 style='width:46pt'></td>
  <td width=5 style='width:4pt'></td>
  <td width=144 style='width:108pt'></td>
  <td width=11 style='width:8pt'></td>
  <td width=64 style='width:48pt'></td>
 </tr>
 <![endif]>
</table>

</body>

</html>
