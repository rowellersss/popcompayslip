<?php
//include '../includes/dbcon.php';
//include '../includes/functions.php';
//require_once('../lib/pdf/mpdf.php');
//// style="border: 3px solid black; height: 100%; width: 100%; "
//$html = '<div>';
//
//$html .= '<table class="fpTable" border="1">';
//
//$html .= '<tr>';
//$html .= '<td colspan="3" style="border-bottom: none;">';
//$html .= '<div>';
//$html .= '<p style="font-weight: bold; padding-top: -15px; font-size: 11px; font-family: Arial; font-style: italic;">CS Form No. 212</p>';
//$html .= '<p style="font-weight: bold; padding-top: -11px; font-size: 9px; font-family: Arial; font-style: italic;">Revised 2017</p>';
//$html .= '</div>';
//
//$html .= '<div>';
//$html .= '<p style="font-weight: bold; padding-top: -40px; font-size: 22px; font-family: Arial; margin-left: 100px;">';
//$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERSONAL DATA SHEET';
//$html .= '</p>';
//$html .= '</div>';
//
//$html .= '<div>';
//$html .= '<p style="font-weight: bold; padding-top: -30px; font-size: 9px; font-family: Arial; font-style: italic;">WARNING: Any misrepresentation made in the Personal Data Sheet and Work Experience Sheet shall cause the filling of administrative/criminal case/s against the person concerned.</p>';
//$html .= '<p style="font-weight: bold; padding-top: -8px; font-size: 9px; font-family: Arial; font-style: italic;">READ THE ATTACHED GUIDE TO FILLING THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.</p>';
//$html .= '</div>';
//$html .= '</td>';
//$html .= '</tr>';
//
//
//$html .= '<tr>';
//$html .= '<td style="border-top: none; border-right: 2px solid black;">';
//$html .= '<p style="letter-spacing: -0.2px; padding-top: -20px; font-size: 8.7px; font-family: Arial;">Print legibly. Tick appropriate boxes (B) and use separate sheet if necessary. Indicate N/A if no applicable. DO NOT ABBREVIATE.</p>';
//$html .= '</td>';
//$html .= '<td style="background-color: #969696; width: 7%; border: 2px solid black;">';
//$html .= '<p style="letter-spacing: -0.2px; padding-top: -20px; font-size: 8.7px; font-family: Arial;">1. CS ID No.</p>';
//$html .= '</td>';
//$html .= '<td style="text-align: right; width: 24%; border: 2px solid black; border-right: 3px solid black;">';
//$html .= '<p style="letter-spacing: -0.2px; padding-top: -20px; font-size: 8.7px; font-family: Arial;">(Do not fill up. For CSC use only)</p>';
//$html .= '</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="3" style="border-left: 3px solid black; border-bottom: 1.5px solid black; border-top: 1.5px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">I. PERSONAL INFORMATION</td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; border-bottom: none; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">2.&nbsp;&nbsp;SURNAME</td>';
//$html .= '<td colspan="6" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">LACDAYING</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border:-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
//$html .= '<td colspan="4" style="width: 290px; font-size: 9.5px; font-family: Arial; padding-left: 5px;">RAVEN</td>';
//$html .= '<td colspan="2" style="border-right: 3px solid black; background-color: #eaeaea; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;"><p>NAME EXTENSION (JR., SR)</p><p></p></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; border-top: none; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
//$html .= '<td colspan="6" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">SORIA</td>';
//$html .= '</tr>';
//
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">3.&nbsp;&nbsp;DATE OF BIRTH<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)<br>&nbsp;</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">05/11/1996</td>';
//$html .= '<td colspan="2" style="border-bottom: none; font-size: 10.1px; font-family: Arial; padding-left: 5px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px; vertical-align: top;">16. CITIZENSHIP</td>';
//$html .= '<td colspan="2" style="border-right: 3px solid black; border-bottom: none; font-size: 10.1px; font-family: Arial; padding-left: 25px; width: 240px;">';
//$html .= '<p style="font-family: Arial; font-size: 9px;">Filipino&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dual Citizenship</p><br>';
//$html .= '<p style="font-family: Arial; font-size: 9px;">';
//$html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
//$html .= 'by birth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by naturalization</p>';
//$html .= '</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">4. &nbsp;PLACE OF BIRTH</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">QUEZON CITY</td>';
//$html .= '<td colspan="2" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;">if holder of dual citizenship,</td>';
//$html .= '<td colspan="2" style="border-right: 3px solid black; border-top: none; font-size: 10.1px; font-family: Arial; padding-left: 100px; border-bottom: .5px solid #D2D2D2;">';
//$html .= '<p style="font-family: Arial; font-size: 9.5px;">Pls. indicate country:</p>';
//$html .= '</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">5. &nbsp;&nbsp;SEX</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female</td>';
//$html .= '<td colspan="2" style="border-top: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px; vertical-align: top;">please indicate the details</td>';
//$html .= '<td colspan="2" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; border-top: .5px solid #D2D2D2;">PHILIPPINES</td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//
//$html .= '<table class="fpTable2" border="1">';
//
//$html .= '<tr>';
//$html .= '<td rowspan="2" style="border-top: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px; vertical-align: top;">6.&nbsp;&nbsp;CIVIL STATUS</td>';
//$html .= '<td rowspan="2" colspan="2" style="border-top: none; font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 129px; padding-top: 2px; padding-bottom: 2px;">';
//$html .= '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Single&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Married</p>';
//$html .= '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Widowed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Separated</p>';
//$html .= '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other/s: </p>';
//$html .= '</td>';
//$html .= '<td rowspan="2" colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px; vertical-align: top;">17. RESIDENTIAL ADDRESS</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; border-top: none; font-size: 9.5px; font-family: Arial; padding: 5px 0px 5px 5px; width: 240px;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; border-top: none; font-size: 9.5px; font-family: Arial; padding: 5px 0px 5px 5px;"></td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">7. &nbsp;HEIGHT (m)</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;"></td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">8. &nbsp;&nbsp;WEIGHT (kg)</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">65</td>';
//$html .= '<td colspan="1" style="border-top: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px; text-align: center;">ZIP CODE</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;"></td>';
//$html .= '</tr>';
//
//
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">9. &nbsp;BLOOD TYPE (m)</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">18. PERMANENT ADDRESS</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">10. &nbsp;GSIS ID NO.</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;"></td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">11. &nbsp;PAG-IBIG ID NO.</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="1" style="border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px;"></td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">12. &nbsp;&nbsp;PHILHEALTH NO.</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">65</td>';
//$html .= '<td colspan="1" style="border-top: none; font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 0px 0px 0px 35px; letter-spacing: -.5px; text-align: center;">ZIP CODE</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;"></td>';
//$html .= '</tr>';
//
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">13. &nbsp;SSS NO.</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="1" style="font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">19. TELEPHONE NO.</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">715 396 2619</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">14. &nbsp;TIN NO.</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="1" style="font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">20. MOBILE NO.</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">15. &nbsp;AGENCY EMPLOYEE NO.</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="1" style="font-size: 10.1px; font-family: Arial; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">21. EMAIL ADDRESS (if any)</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="7" style="border-right: 3px solid black; border: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">II. FAMILY BACKGROUND</td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">22. &nbsp;SPOUSE\'S SURNAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 8.7px; font-family: Arial; padding-left: 0px; background-color: #eaeaea; width: 200px; letter-spacing: -.5px;">23. NAME of CHILDREN(Write full name and list all)</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 8.2px; font-family: Arial; padding-left: 0px; background-color: #eaeaea; letter-spacing: -.5px;">DATE OF BIRTH (mm/dd/yyyy)</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 179px;">165</td>';
//$html .= '<td colspan="1" style="background-color: #eaeaea; width: 135px; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;">NAME EXTENSION (JR., SR) </td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OCCUPATION</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.2px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPLOYER/BUSINESS NAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUSINESS ADDRESS</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TELEPHONE NO.</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">24. &nbsp;FATHER\'S SURNAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
//$html .= '<td colspan="2" style="font-size: 9.5px; font-family: Arial; padding-left: 5px; width: 179px;">165</td>';
//$html .= '<td colspan="1" style="background-color: #eaeaea; width: 135px; font-size: 7px; font-family: Arial; vertical-align: top; letter-spacing: -.5px;">NAME EXTENSION (JR., SR) </td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;">25. &nbsp;MOTHER\'S MAIDEN NAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.2px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SURNAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-top: none; border-bottom: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRST NAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">ravenlacdaying@gmail.com</td>';
//$html .= '<td colspan="3" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px;">09568517779</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-top: none; border-left: 3px solid black; width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; padding: 5px 0px 5px 5px; letter-spacing: -.5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIDDLE NAME</td>';
//$html .= '<td colspan="3" style="font-size: 9.5px; font-family: Arial; padding-left: 5px;">165</td>';
//$html .= '<td colspan="6" style="border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="10" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">III. EDUCATIONAL BACKGROUND</td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//
//$html .= '<tr>';
//$html .= '<td rowspan="2" style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">26. &nbsp;LEVEL</td>';
//$html .= '<td rowspan="2" style="width: 180px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">NAME OF SCHOOL<br>(Write in full)</td>';
//$html .= '<td rowspan="2" style="width: 150px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">BASIC EDUCATION/DEGREE/COURSE<br>(Write in full)</td>';
//$html .= '<td colspan="2" style="width: 100px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">PERIOD OF ATTENDACE</td>';
//$html .= '<td rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">HIGHEST LEVEL/<br>UNITS EARNED<br>(if not graduated)</td>';
//$html .= '<td rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">YEAR<br>GRADUATED</td>';
//$html .= '<td rowspan="2" style="width: 70px;font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;">SCHOLARSHIP/<br>ACADEMIC<br>HONORS<br>RECEIVED</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="width: 27px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">From</td>';
//$html .= '<td style="width: 27px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">ELEMENTARY</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td style="border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">SECONDARY</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td style="border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">VOCATIONAL/<br>TRADE COURSE</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td style="border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">COLLEGE</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td style="border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 18%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; padding: 8px 0px 8px 30xp; border-left: 3px solid black;">GRADUATE STUDIES</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td></td>';
//$html .= '<td style="border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="8" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="1" style="border-top: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; border-left: 3px solid black; background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">SIGNATURE</td>';
//$html .= '<td colspan="2" style="border-top: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black; "></td>';
//$html .= '<td colspan="2" style="border-top: 3px solid black; border-right: 3px solid black; border-bottom: 3px solid black;  background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">DATE</td>';
//$html .= '<td colspan="3" style="border-top: 3px solid black; border-bottom: 3px solid black; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<p style="padding-left: 640px; padding-top: -8px; font-family: Arial; font-size: 7.5px; font-style: italic; letter-spacing: -.5px;">CS FORM 212 (Revised 2017), Page 1 of 4</p>';
//
//$html .= '</div>';
//
//$html .= '<pagebreak />';
//
//
//$html .= '<table class="fpTable" border="1">';
//$html .= '<tr>';
//$html .= '<td style="background-color: #969696; padding-top: .5px;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">IV. CIVIL SERVICE ELIGIBILITY</td>';
//$html .= '</tr>';
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td rowspan="2" style="width: 32%; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">27. &nbsp;CAREER SERVICE/RA 1080 (BOARD/ BAR) UNDER <br> SPECIAL LAWS/ CES/ CSEE <br>BARANGAY ELIGIBILITY /DRIVERS LICENSE</td>';
//$html .= '<td rowspan="2" style="width: 70px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">RATING<br>(if Applicable)</td>';
//$html .= '<td rowspan="2" style="width: 70px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">DATE OF<br>EXAMINATION /<br>CONFERMENT</td>';
//$html .= '<td rowspan="2" style="width: 200px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">PLACE OF EXAMINATION/CONFERMENT</td>';
//$html .= '<td colspan="2" style="width: 100px; border-right: 3px solid black; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">LICENSE (if Applicable)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="width: 55px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">NUMBER</td>';
//$html .= '<td style="width: 45px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; border-right: 3px solid black;">Date of<br>Validity</td>';
//$html .= '</tr>';
//
//for ($i = 1; $i <= 7; $i++) {
//    $html .= '<tr>';
//    $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 27px;"></td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
//    $html .= '</tr>';
//}
//
//$html .= '<tr>';
//$html .= '<td colspan="6" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="6" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">V. WORK EXPERIENCE<br><p style="font-size: 10px;">(Including private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experince sheet.</p></td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td colspan="2" style="width: 130px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">28. &nbsp;INCLUSIVE DATES<br>(mm/dd/yyyy)</td>';
//$html .= '<td rowspan="2" style="width: 200px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">POSITION TITLE<br>(Write in full/Do not abbreviate)</td>';
//$html .= '<td rowspan="2" style="width: 195px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">DEPARTMENT / AGENCY / OFFICE / COMPANY<br>(Write in ful/Do not abbreviate)</td>';
//$html .= '<td rowspan="2" style="width: 65px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">MONTHLY<br>SALARY</td>';
//$html .= '<td rowspan="2" style="width: 65px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">SALARY/ JOB/<br>PAY GRADE (if<br>applicable)& STEP<br>(Format "00-0")/<br>INCREMENT</td>';
//$html .= '<td rowspan="2" style="width: 70px; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">STATUS OF APPOINTMENT</td>';
//$html .= '<td rowspan="2" style="width: 60px; border-right: 3px solid black; font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">GOV\'T<br>SERVICE<br>(Y/N)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; border-left: 3px solid black;">From</td>';
//$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
//$html .= '</tr>';
//
//for ($i = 1; $i <= 28; $i++) {
//    $html .= '<tr>';
//    $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 27px;">&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
//    $html .= '</tr>';
//}
//$html .= '<tr>';
//$html .= '<td colspan="8" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td style="width: 128px; border-right: 3px solid black; border-bottom: 3px solid black; border-left: 3px solid black; background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">SIGNATURE</td>';
//$html .= '<td style="width: 280px; border-right: 3px solid black; border-bottom: 3px solid black; "></td>';
//$html .= '<td style="width: 102px; border-right: 3px solid black; border-bottom: 3px solid black;  background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">DATE</td>';
//$html .= '<td style="border-bottom: 3px solid black; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
//$html .= '<p style="padding-left: 640px; padding-top: -8px; font-family: Arial; font-size: 7.5px; font-style: italic; letter-spacing: -.5px;">CS FORM 212 (Revised 2017), Page 1 of 4</p>';
//$html .= '</table>';
//
//
//$html .= '<pagebreak />';
//
//
//$html .= '<table class="fpTable" border="1">';
//$html .= '<tr>';
//$html .= '<td style="background-color: #969696; padding-top: .5px;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVI / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</td>';
//$html .= '</tr>';
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td rowspan="2" style="width: 330px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">29. &nbsp;NAME & ADDRESS OF ORGANIZATION<br>(Write in full)</td>';
//$html .= '<td colspan="2" style="width: 120px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">INCLUSIVE DATES<br>(mm/dd/yyyy)</td>';
//$html .= '<td rowspan="2" style="width: 70px; font-size: 7.5px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">NUMBER OF HOURS</td>';
//$html .= '<td colspan="2" rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;">POSITION / NATURE OF WORK</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">From</td>';
//$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
//$html .= '</tr>';
//
//for ($i = 1; $i <= 7; $i++) {
//    $html .= '<tr>';
//    $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 25px;">&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td colspan="2" style="border-right: 3px solid black;">&nbsp;</td>';
//    $html .= '</tr>';
//}
//$html .= '<tr>';
//$html .= '<td colspan="6" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="6" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED<br><p style="font-size: 8px;">(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)</p></td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td rowspan="2" style="width: 330px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">29. &nbsp;TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br>(Write in full)</td>';
//$html .= '<td colspan="2" style="width: 120px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">INCLUSIVE DATES OF<br>ATTENDANCE<br>(mm/dd/yyyy)</td>';
//$html .= '<td rowspan="2" style="width: 70px; font-size: 7.2px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">NUMBER OF HOURS</td>';
//$html .= '<td rowspan="2" style="width: 65px; font-size: 7.5px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">Type of LD<br>(Managerial/<br>Supervisory<br>Technical/etc)</td>';
//$html .= '<td rowspan="2" style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;"> CONDUCTED/ SPONSORED BY<br>(Write in full)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">From</td>';
//$html .= '<td style="width: 65px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center;">To</td>';
//$html .= '</tr>';
//
//for ($i = 1; $i <= 21; $i++) {
//    $html .= '<tr>';
//    $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 25px;">&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
//    $html .= '</tr>';
//}
//$html .= '<tr>';
//$html .= '<td colspan="6" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td colspan="6" style="border-left: 3px solid black; border-right: 3px solid black; border-top: 2px solid black; border-bottom: 2px solid black; font-size: 11px; font-weight: bold; font-style: italic; font-family: Arial; color: white; background-color: #969696;">VIII. OTHER INFORMATION<br><p style="font-size: 8px;"></p></td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td style="width: 210px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">31. &nbsp;SPECIAL SKILLS and HOBBIES </td>';
//$html .= '<td style="width: 367px;font-size: 7.5px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px;">32. &nbsp;NON-ACADEMIC DISTINCTIONS / RECOGNITION<br>(Write in full)</td>';
//$html .= '<td style="font-size: 8px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-right: 3px solid black;">33. &nbsp;MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br>(Write in full)</td>';
//$html .= '</tr>';
//
//for ($i = 1; $i <= 7; $i++) {
//    $html .= '<tr>';
//    $html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 25px;">&nbsp;</td>';
//    $html .= '<td>&nbsp;</td>';
//    $html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
//    $html .= '</tr>';
//}
//$html .= '<tr>';
//$html .= '<td colspan="3" style="border-top: 3px solid black; border-left: 3px solid black; border-right: 3px solid black; font-size: 9.5px; font-family: Arial; padding-left: 5px; background-color: #eaeaea; text-align: center; color: red; font-style: italic;">(Continue on sparate sheet if necessary)</td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td style="width: 210px; border-right: 3px solid black; border-bottom: 3px solid black; border-left: 3px solid black; background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">SIGNATURE</td>';
//$html .= '<td style="width: 268px; border-right: 3px solid black; border-bottom: 3px solid black; "></td>';
//$html .= '<td style="width: 102px; border-right: 3px solid black; border-bottom: 3px solid black;  background-color: #eaeaea; font-size: 11px; font-style: italic; font-family: Arial; text-align: center; font-weight: bold; padding: 10px 0px 10px 0px;">DATE</td>';
//$html .= '<td style="border-bottom: 3px solid black; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
//$html .= '<p style="padding-left: 640px; padding-top: -8px; font-family: Arial; font-size: 7.5px; font-style: italic; letter-spacing: -.5px;">CS FORM 212 (Revised 2017), Page 1 of 4</p>';
//$html .= '</table>';
//
//$html .= '<pagebreak />';
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td colspan="2" style="background-color: #969696; padding-top: .5px; border: 3px solid black;"></td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black;">34. &nbsp;Are you related by consanguinity or affinity to the appointing or recommending authority, or to the<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;chief of bureau or office or to the person who has immediate supervision over you in the Office, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bureau or Department where you will be apppointed, </td>';
//$html .= '<td style="padding-top: .5px; border-bottom: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. within the third degree?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. within the fourth degree (for Local Government Unit - Career Employees)?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-bottom: 2px solid black; border-right: 3px solid black;"><div style="width: 150px;">Adawdnwd awd</div></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
////------------------------35-----------------------------
//
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">35. &nbsp;a.  Have you ever been found guilty of any administrative offense?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-bottom: 2px solid black; border-right: 3px solid black;"><div style="width: 150px;">Adawdnwd awd</div></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Have you been criminally charged before any court?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;"><div style="width: 150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Filed: &nbsp;&nbsp;&nbsp;__________________________</div></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-right: 3px solid black;"><div style="width: 150px;">&nbsp;&nbsp;Status of Case/s: &nbsp;&nbsp;&nbsp;__________________________</div></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
////------------------------------36----------------------------
//
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">36. &nbsp;Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by any court or tribunal?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-bottom: 2px solid black; border-right: 3px solid black;"><div style="width: 150px;">Adawdnwd awd</div></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
////------------------------------37----------------------------
//
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">37. &nbsp;Have you ever been separated from the service in any of the following modes: resignation,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;out (abolition) in the public or private sector?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details:<br><div style="width: 150px;">Adawdnwd awd</div></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
////------------------------------38----------------------------
//
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">38. &nbsp;a. Have you ever been a candidate in a national or local election held within the last year (except<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Barangay election)?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details: _______________________</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Have you resigned from the government service during the three (3)-month period before the last<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;election to promote/actively campaign for a national or local candidate?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details: _______________________</td>';
//$html .= '</tr>';
//
////------------------------------39----------------------------
//
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">39. &nbsp;Have you acquired the status of an immigrant or permanent resident of another country?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If YES, give details (country):</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 11px; border-top: none; border-bottom: none; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; height: 20px; border-bottom: 2px solid black; border-right: 3px solid black;"><div style="width: 150px;">Adawdnwd awd</div></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
////------------------------------40----------------------------
//
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">40. &nbsp;Pursuant to: (a) Indigenous People\'s Act (RA 8371); (b) Magna Carta for Disabled Persons (RA<br>7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-bottom: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none;border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">a. Are you a member of any indigenous group?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none;border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;If YES, pease specify: _________________________</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">b. Are you a person with disability?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;If YES, pease specify ID No.: ____________________</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; border-top: none; border-bottom: none; font-size: 10.1px; font-family: Arial; background-color: #eaeaea; line-height: 14px; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;">c. Are you a solo parent?</td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-bottom: none; border-right: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO<br>&nbsp;&nbsp;If YES, pease specify ID No.: ____________________</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 480px; font-size: 10.1px; border-top: none; font-family: Arial; background-color: #eaeaea; text-align: left; padding-top: 2px; padding-bottom: 2px; border-left: 3px solid black;"></td>';
//$html .= '<td style="padding-top: .5px; font-family: Arial; font-size: 11px; border-top: none; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
//$html .= '<table class="fpTable2" border="1">';
//$html .= '<tr>';
//$html .= '<td colspan="4" style="width: 330px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: left; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black; border-right: 3px solid black; padding-left: 4px;">41. &nbsp;REFERENCE <i style="color: red;">(Person not related by consanguinity or affinity to applicant /appointee)</i></td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="width: 290px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 4px;">NAME</td>';
//$html .= '<td style="width: 190px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 4px;">ADDRESS</td>';
//$html .= '<td style="width: 100px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 4px;">TEL. NO.</td>';
//$html .= '<td style="font-size: 8.7px; font-family: Arial; letter-spacing: -.5px; text-align: center; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black; padding-left: 4px; border-right: 3px solid black;"></td>';
//$html .= '</tr>';
//
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 25px;">&nbsp;</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 25px;">&nbsp;</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td style="border-left: 3px solid black; padding: 2px 2px 2px 2px; height: 25px;">&nbsp;</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td>&nbsp;</td>';
//$html .= '<td style="border-right: 3px solid black;">&nbsp;</td>';
//$html .= '</tr>';
//$html .= '<tr>';
//$html .= '<td colspan="4" style="width: 330px; font-size: 8.7px; font-family: Arial; background-color: #eaeaea; letter-spacing: -.5px; text-align: left; padding-top: 5px; padding-bottom: 5px; border-left: 3px solid black; border-right: 3px solid black; padding-left: 4px;">'
//        . '42. &nbsp;I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and<br>'
//        . 'complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the<br>'
//        . 'Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein.<br>'
//        . 'I agree that any misrepresentation made in this document and its attachments shall cause the filing of<br>'
//        . 'administrative/criminal case/s against me.'
//        . '</td>';
//$html .= '</tr>';
//
//$html .= '</table>';
//
////table-layout: fixed;
//
//$mpdf = new mPDF('c', array(215.9, 330.2));
//$css = file_get_contents('../css/style14.css');
//$mpdf->SetTitle('Competency Assessment');
//$mpdf->WriteHTML($css, 1);
//$mpdf->writeHTML($html);
//$mpdf->Output('Competency Assessment.pdf', 'I');
?>
<html>
    <head>
        <link href="https://cdn.datatables.net/fixedcolumns/3.2.4/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <style>
            th, td { white-space: nowrap; }
            div.dataTables_wrapper {
                width: 800px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <table id="example" class="stripe row-border order-column" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Extn.</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td>5421</td>
                    <td>t.nixon@datatables.net</td>
                </tr>
                <tr>
                    <td>Garrett</td>
                    <td>Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                    <td>8422</td>
                    <td>g.winters@datatables.net</td>
                </tr>
                <tr>
                    <td>Ashton</td>
                    <td>Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                    <td>1562</td>
                    <td>a.cox@datatables.net</td>
                </tr>
                <tr>
                    <td>Cedric</td>
                    <td>Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                    <td>6224</td>
                    <td>c.kelly@datatables.net</td>
                </tr>
                <tr>
                    <td>Airi</td>
                    <td>Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                    <td>5407</td>
                    <td>a.satou@datatables.net</td>
                </tr>
                <tr>
                    <td>Brielle</td>
                    <td>Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                    <td>4804</td>
                    <td>b.williamson@datatables.net</td>
                </tr>
                <tr>
                    <td>Herrod</td>
                    <td>Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                    <td>2012/08/06</td>
                    <td>$137,500</td>
                    <td>9608</td>
                    <td>h.chandler@datatables.net</td>
                </tr>
                <tr>
                    <td>Rhona</td>
                    <td>Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td>2010/10/14</td>
                    <td>$327,900</td>
                    <td>6200</td>
                    <td>r.davidson@datatables.net</td>
                </tr>
                <tr>
                    <td>Colleen</td>
                    <td>Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009/09/15</td>
                    <td>$205,500</td>
                    <td>2360</td>
                    <td>c.hurst@datatables.net</td>
                </tr>
                <tr>
                    <td>Sonya</td>
                    <td>Frost</td>
                    <td>Software Engineer</td>
                    <td>Edinburgh</td>
                    <td>23</td>
                    <td>2008/12/13</td>
                    <td>$103,600</td>
                    <td>1667</td>
                    <td>s.frost@datatables.net</td>
                </tr>
                <tr>
                    <td>Jena</td>
                    <td>Gaines</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>30</td>
                    <td>2008/12/19</td>
                    <td>$90,560</td>
                    <td>3814</td>
                    <td>j.gaines@datatables.net</td>
                </tr>
                <tr>
                    <td>Quinn</td>
                    <td>Flynn</td>
                    <td>Support Lead</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2013/03/03</td>
                    <td>$342,000</td>
                    <td>9497</td>
                    <td>q.flynn@datatables.net</td>
                </tr>
                <tr>
                    <td>Charde</td>
                    <td>Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>36</td>
                    <td>2008/10/16</td>
                    <td>$470,600</td>
                    <td>6741</td>
                    <td>c.marshall@datatables.net</td>
                </tr>
                <tr>
                    <td>Haley</td>
                    <td>Kennedy</td>
                    <td>Senior Marketing Designer</td>
                    <td>London</td>
                    <td>43</td>
                    <td>2012/12/18</td>
                    <td>$313,500</td>
                    <td>3597</td>
                    <td>h.kennedy@datatables.net</td>
                </tr>
                <tr>
                    <td>Tatyana</td>
                    <td>Fitzpatrick</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>19</td>
                    <td>2010/03/17</td>
                    <td>$385,750</td>
                    <td>1965</td>
                    <td>t.fitzpatrick@datatables.net</td>
                </tr>
                <tr>
                    <td>Michael</td>
                    <td>Silva</td>
                    <td>Marketing Designer</td>
                    <td>London</td>
                    <td>66</td>
                    <td>2012/11/27</td>
                    <td>$198,500</td>
                    <td>1581</td>
                    <td>m.silva@datatables.net</td>
                </tr>
                <tr>
                    <td>Paul</td>
                    <td>Byrd</td>
                    <td>Chief Financial Officer (CFO)</td>
                    <td>New York</td>
                    <td>64</td>
                    <td>2010/06/09</td>
                    <td>$725,000</td>
                    <td>3059</td>
                    <td>p.byrd@datatables.net</td>
                </tr>
                <tr>
                    <td>Gloria</td>
                    <td>Little</td>
                    <td>Systems Administrator</td>
                    <td>New York</td>
                    <td>59</td>
                    <td>2009/04/10</td>
                    <td>$237,500</td>
                    <td>1721</td>
                    <td>g.little@datatables.net</td>
                </tr>
                <tr>
                    <td>Bradley</td>
                    <td>Greer</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>41</td>
                    <td>2012/10/13</td>
                    <td>$132,000</td>
                    <td>2558</td>
                    <td>b.greer@datatables.net</td>
                </tr>
                <tr>
                    <td>Dai</td>
                    <td>Rios</td>
                    <td>Personnel Lead</td>
                    <td>Edinburgh</td>
                    <td>35</td>
                    <td>2012/09/26</td>
                    <td>$217,500</td>
                    <td>2290</td>
                    <td>d.rios@datatables.net</td>
                </tr>
                <tr>
                    <td>Jenette</td>
                    <td>Caldwell</td>
                    <td>Development Lead</td>
                    <td>New York</td>
                    <td>30</td>
                    <td>2011/09/03</td>
                    <td>$345,000</td>
                    <td>1937</td>
                    <td>j.caldwell@datatables.net</td>
                </tr>
                <tr>
                    <td>Yuri</td>
                    <td>Berry</td>
                    <td>Chief Marketing Officer (CMO)</td>
                    <td>New York</td>
                    <td>40</td>
                    <td>2009/06/25</td>
                    <td>$675,000</td>
                    <td>6154</td>
                    <td>y.berry@datatables.net</td>
                </tr>
                <tr>
                    <td>Caesar</td>
                    <td>Vance</td>
                    <td>Pre-Sales Support</td>
                    <td>New York</td>
                    <td>21</td>
                    <td>2011/12/12</td>
                    <td>$106,450</td>
                    <td>8330</td>
                    <td>c.vance@datatables.net</td>
                </tr>
                <tr>
                    <td>Doris</td>
                    <td>Wilder</td>
                    <td>Sales Assistant</td>
                    <td>Sidney</td>
                    <td>23</td>
                    <td>2010/09/20</td>
                    <td>$85,600</td>
                    <td>3023</td>
                    <td>d.wilder@datatables.net</td>
                </tr>
                <tr>
                    <td>Angelica</td>
                    <td>Ramos</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2009/10/09</td>
                    <td>$1,200,000</td>
                    <td>5797</td>
                    <td>a.ramos@datatables.net</td>
                </tr>
                <tr>
                    <td>Gavin</td>
                    <td>Joyce</td>
                    <td>Developer</td>
                    <td>Edinburgh</td>
                    <td>42</td>
                    <td>2010/12/22</td>
                    <td>$92,575</td>
                    <td>8822</td>
                    <td>g.joyce@datatables.net</td>
                </tr>
                <tr>
                    <td>Jennifer</td>
                    <td>Chang</td>
                    <td>Regional Director</td>
                    <td>Singapore</td>
                    <td>28</td>
                    <td>2010/11/14</td>
                    <td>$357,650</td>
                    <td>9239</td>
                    <td>j.chang@datatables.net</td>
                </tr>
                <tr>
                    <td>Brenden</td>
                    <td>Wagner</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>28</td>
                    <td>2011/06/07</td>
                    <td>$206,850</td>
                    <td>1314</td>
                    <td>b.wagner@datatables.net</td>
                </tr>
                <tr>
                    <td>Fiona</td>
                    <td>Green</td>
                    <td>Chief Operating Officer (COO)</td>
                    <td>San Francisco</td>
                    <td>48</td>
                    <td>2010/03/11</td>
                    <td>$850,000</td>
                    <td>2947</td>
                    <td>f.green@datatables.net</td>
                </tr>
                <tr>
                    <td>Shou</td>
                    <td>Itou</td>
                    <td>Regional Marketing</td>
                    <td>Tokyo</td>
                    <td>20</td>
                    <td>2011/08/14</td>
                    <td>$163,000</td>
                    <td>8899</td>
                    <td>s.itou@datatables.net</td>
                </tr>
                <tr>
                    <td>Michelle</td>
                    <td>House</td>
                    <td>Integration Specialist</td>
                    <td>Sidney</td>
                    <td>37</td>
                    <td>2011/06/02</td>
                    <td>$95,400</td>
                    <td>2769</td>
                    <td>m.house@datatables.net</td>
                </tr>
                <tr>
                    <td>Suki</td>
                    <td>Burks</td>
                    <td>Developer</td>
                    <td>London</td>
                    <td>53</td>
                    <td>2009/10/22</td>
                    <td>$114,500</td>
                    <td>6832</td>
                    <td>s.burks@datatables.net</td>
                </tr>
                <tr>
                    <td>Prescott</td>
                    <td>Bartlett</td>
                    <td>Technical Author</td>
                    <td>London</td>
                    <td>27</td>
                    <td>2011/05/07</td>
                    <td>$145,000</td>
                    <td>3606</td>
                    <td>p.bartlett@datatables.net</td>
                </tr>
                <tr>
                    <td>Gavin</td>
                    <td>Cortez</td>
                    <td>Team Leader</td>
                    <td>San Francisco</td>
                    <td>22</td>
                    <td>2008/10/26</td>
                    <td>$235,500</td>
                    <td>2860</td>
                    <td>g.cortez@datatables.net</td>
                </tr>
                <tr>
                    <td>Martena</td>
                    <td>Mccray</td>
                    <td>Post-Sales support</td>
                    <td>Edinburgh</td>
                    <td>46</td>
                    <td>2011/03/09</td>
                    <td>$324,050</td>
                    <td>8240</td>
                    <td>m.mccray@datatables.net</td>
                </tr>
                <tr>
                    <td>Unity</td>
                    <td>Butler</td>
                    <td>Marketing Designer</td>
                    <td>San Francisco</td>
                    <td>47</td>
                    <td>2009/12/09</td>
                    <td>$85,675</td>
                    <td>5384</td>
                    <td>u.butler@datatables.net</td>
                </tr>
                <tr>
                    <td>Howard</td>
                    <td>Hatfield</td>
                    <td>Office Manager</td>
                    <td>San Francisco</td>
                    <td>51</td>
                    <td>2008/12/16</td>
                    <td>$164,500</td>
                    <td>7031</td>
                    <td>h.hatfield@datatables.net</td>
                </tr>
                <tr>
                    <td>Hope</td>
                    <td>Fuentes</td>
                    <td>Secretary</td>
                    <td>San Francisco</td>
                    <td>41</td>
                    <td>2010/02/12</td>
                    <td>$109,850</td>
                    <td>6318</td>
                    <td>h.fuentes@datatables.net</td>
                </tr>
                <tr>
                    <td>Vivian</td>
                    <td>Harrell</td>
                    <td>Financial Controller</td>
                    <td>San Francisco</td>
                    <td>62</td>
                    <td>2009/02/14</td>
                    <td>$452,500</td>
                    <td>9422</td>
                    <td>v.harrell@datatables.net</td>
                </tr>
                <tr>
                    <td>Timothy</td>
                    <td>Mooney</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>37</td>
                    <td>2008/12/11</td>
                    <td>$136,200</td>
                    <td>7580</td>
                    <td>t.mooney@datatables.net</td>
                </tr>
                <tr>
                    <td>Jackson</td>
                    <td>Bradshaw</td>
                    <td>Director</td>
                    <td>New York</td>
                    <td>65</td>
                    <td>2008/09/26</td>
                    <td>$645,750</td>
                    <td>1042</td>
                    <td>j.bradshaw@datatables.net</td>
                </tr>
                <tr>
                    <td>Olivia</td>
                    <td>Liang</td>
                    <td>Support Engineer</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2011/02/03</td>
                    <td>$234,500</td>
                    <td>2120</td>
                    <td>o.liang@datatables.net</td>
                </tr>
                <tr>
                    <td>Bruno</td>
                    <td>Nash</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>38</td>
                    <td>2011/05/03</td>
                    <td>$163,500</td>
                    <td>6222</td>
                    <td>b.nash@datatables.net</td>
                </tr>
                <tr>
                    <td>Sakura</td>
                    <td>Yamamoto</td>
                    <td>Support Engineer</td>
                    <td>Tokyo</td>
                    <td>37</td>
                    <td>2009/08/19</td>
                    <td>$139,575</td>
                    <td>9383</td>
                    <td>s.yamamoto@datatables.net</td>
                </tr>
                <tr>
                    <td>Thor</td>
                    <td>Walton</td>
                    <td>Developer</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2013/08/11</td>
                    <td>$98,540</td>
                    <td>8327</td>
                    <td>t.walton@datatables.net</td>
                </tr>
                <tr>
                    <td>Finn</td>
                    <td>Camacho</td>
                    <td>Support Engineer</td>
                    <td>San Francisco</td>
                    <td>47</td>
                    <td>2009/07/07</td>
                    <td>$87,500</td>
                    <td>2927</td>
                    <td>f.camacho@datatables.net</td>
                </tr>
                <tr>
                    <td>Serge</td>
                    <td>Baldwin</td>
                    <td>Data Coordinator</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2012/04/09</td>
                    <td>$138,575</td>
                    <td>8352</td>
                    <td>s.baldwin@datatables.net</td>
                </tr>
                <tr>
                    <td>Zenaida</td>
                    <td>Frank</td>
                    <td>Software Engineer</td>
                    <td>New York</td>
                    <td>63</td>
                    <td>2010/01/04</td>
                    <td>$125,250</td>
                    <td>7439</td>
                    <td>z.frank@datatables.net</td>
                </tr>
                <tr>
                    <td>Zorita</td>
                    <td>Serrano</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>56</td>
                    <td>2012/06/01</td>
                    <td>$115,000</td>
                    <td>4389</td>
                    <td>z.serrano@datatables.net</td>
                </tr>
                <tr>
                    <td>Jennifer</td>
                    <td>Acosta</td>
                    <td>Junior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>43</td>
                    <td>2013/02/01</td>
                    <td>$75,650</td>
                    <td>3431</td>
                    <td>j.acosta@datatables.net</td>
                </tr>
                <tr>
                    <td>Cara</td>
                    <td>Stevens</td>
                    <td>Sales Assistant</td>
                    <td>New York</td>
                    <td>46</td>
                    <td>2011/12/06</td>
                    <td>$145,600</td>
                    <td>3990</td>
                    <td>c.stevens@datatables.net</td>
                </tr>
                <tr>
                    <td>Hermione</td>
                    <td>Butler</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2011/03/21</td>
                    <td>$356,250</td>
                    <td>1016</td>
                    <td>h.butler@datatables.net</td>
                </tr>
                <tr>
                    <td>Lael</td>
                    <td>Greer</td>
                    <td>Systems Administrator</td>
                    <td>London</td>
                    <td>21</td>
                    <td>2009/02/27</td>
                    <td>$103,500</td>
                    <td>6733</td>
                    <td>l.greer@datatables.net</td>
                </tr>
                <tr>
                    <td>Jonas</td>
                    <td>Alexander</td>
                    <td>Developer</td>
                    <td>San Francisco</td>
                    <td>30</td>
                    <td>2010/07/14</td>
                    <td>$86,500</td>
                    <td>8196</td>
                    <td>j.alexander@datatables.net</td>
                </tr>
                <tr>
                    <td>Shad</td>
                    <td>Decker</td>
                    <td>Regional Director</td>
                    <td>Edinburgh</td>
                    <td>51</td>
                    <td>2008/11/13</td>
                    <td>$183,000</td>
                    <td>6373</td>
                    <td>s.decker@datatables.net</td>
                </tr>
                <tr>
                    <td>Michael</td>
                    <td>Bruce</td>
                    <td>Javascript Developer</td>
                    <td>Singapore</td>
                    <td>29</td>
                    <td>2011/06/27</td>
                    <td>$183,000</td>
                    <td>5384</td>
                    <td>m.bruce@datatables.net</td>
                </tr>
                <tr>
                    <td>Donna</td>
                    <td>Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                    <td>4226</td>
                    <td>d.snider@datatables.net</td>
                </tr>
            </tbody>
        </table>
    </body>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.4/js/dataTables.fixedColumns.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                searching: false,
                "ordering": false,
                fixedColumns: {
                    leftColumns: 2
                }
            });
        });
    </script>
</html>

