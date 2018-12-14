<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'includes/session.php';
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $dor = $_POST['dor'];
    $reqby = $_POST['reqby'];
    $dur = $_POST['dur'];
    $desc = $_POST['desc'];

    $query = mysql_query("insert into table_servicereq (DateofReq, ReqBy, DivUnitRPO, DescOfReq) value('$dor','$reqby','$dur','$desc')");
}
if (isset($_POST['back'])) {
    header("Location: files/ManageServiceReq.php");
}

if (!isset($_REQUEST['Id']) || !isset($_REQUEST['act'])) {
    header("Location: files/ManageServiceReq.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="images/popcom.png" type="image/x-icon">
        <title>Intranet</title>
        <style>
            @page 
            {
                size: auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
            }
            body {
                background: rgb(204,204,204); 
            }
            page {
                background: white;
                display: block;
                margin: 0 auto;
                margin-bottom: 0.5cm;
                box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            }
            page[size="A4"] {  
                width: 21cm;
                height: 29.7cm; 
            }
            page[size="A4"][layout="portrait"] {
                width: 29.7cm;
                height: 21cm;  
            }
            page[size="A3"] {
                width: 29.7cm;
                height: 42cm;
            }
            page[size="A3"][layout="portrait"] {
                width: 42cm;
                height: 29.7cm;  
            }
            page[size="A5"] {
                width: 14.8cm;
                height: 21cm;
            }
            page[size="A5"][layout="portrait"] {
                width: 21cm;
                height: 14.8cm;  
            }
            @media print {
                body, page {
                    margin: 0;
                    box-shadow: 0;
                }
            }
            p{
            }
            .text1{
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 17px;
                text-align: center;
                margin-top: 60px;
                float: right;
                margin-right: 30px;
            }
            p.small0 {
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                line-height: 2;
            }
            p.small {
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                line-height: 0.7;
            }
            p.small2 {
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                margin-left: 10px;
                margin-top: -7px;
            }
            p.small3 {
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                margin-left: 125px;
                margin-top: -7px;
            }
            p.small4 {
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                margin-top: -7px;
                margin-right: 60px
            }
            .right{
                float: right;
            }
            .right2{
                float: right;
                margin-right: 120px;
            }
            .left{
                float: left;
            }
            hr{
                width: 95%;
                margin: auto;
                border-top: 3px solid #000;
            }
            p.small5 {
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                margin-top: 17px;
                margin-right: 60px;
                text-align: center;
            }
            p.small6 {
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                margin-top: -10px;
                line-height: 3.3;
            }
            p.small7{
                font-family: Arial, "Arial", Helvetica, sans-serif;
                font-size: 14px;
                margin-left: 40px;
                margin-top: 1px;
            }
            .desc{
                max-width: 650px;
                max-height: 80px;
            }
            .max{
                max-width: 446px;
                background-color: red
            }
            @media print
            {    
                .no-print, .no-print *
                {
                    display: none !important;
                    
                }
            }
            
        </style>
    </head>
    <body>
        <form action="RequestForm.php" method="post">
            <input type="submit" name="back" class="btn btn-info no-print" value="back">
        </form>
    <page id="iddsss" size="A4">
        <div style="margin-left: 80px; width: 65%; padding: 0px">
            <div style="margin-top: 30px; float: left;">
                <img src="images/popcom.png" width="120px" alt="">
            </div>
            <div class="text1">
                <b>OFFICE OF THE EXECUTIVE DIRECTOR<br>
                    Information Technology (IT) Unit<br><br>
                    Service Request Form</b>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
        <div style="margin-left: 87px;">

            <?php
            $id = $_REQUEST['Id'];
            $query = mysql_query("select * from table_servicereq where Id = $id");
            $row = mysql_fetch_assoc($query);

            $dor2 = $row['DateofReq'];
            $reqby2 = ucwords($row['ReqBy']);
            $dur2 = $row['DivUnitRPO'];
            $desc2 = $row['DescOfReq'];
            $appby = $row['ApprovedBy'];
            $actby = $row['AcTakenBy'];
            $dafi = $row['DateFinished'];
            $emid = $row['Emp_Id'];
            $date = date('M d, Y', strtotime($dor2));
            $date2 = date('M d, Y', strtotime($row['DateApproved']));
            $date3 = date('M d, Y', strtotime($dafi));
            ?>
            <p class="small">Date of Request:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date; ?></p><div style="margin-left: 130px; margin-top: -27px;">________________________________________</div>
            <p class="small">Requested by:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $reqby2; ?></p><div style="margin-left: 130px; margin-top: -27px;">________________________________________</div>
            <p class="small">Div/Unit/RPO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dur2; ?></p><div style="margin-left: 130px; margin-top: -27px;">________________________________________</div>
            <p class="small">Description of Request: <i>(Please clearly write down the details of the request)</i></p>
            <p class="small0" style="max-width: 90%;"><u><?php echo $desc2; ?></u></p><div style="margin-left: 0px; margin-top: -38px;">___________________________________________________________________________</div><!--<div style="margin-left: 0px; margin-top: 10px;">_____________________________________________________________________________</div>-->
            <div class="left" style="margin-top: 30px;">
                <p class="small2">Approved by:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $appby; ?></p><div style="margin-left: 110px; margin-top: -29px;">_______________________________</div>
                <p class='small3' style="margin-top: 2px; margin-left: 115px;">Name & Signature of Division Chief</p>
            </div>
            <div class="right" style="margin-top: 30px;">
                <p class="small4" style="margin-left: 55px;"><?php if ($row['DateApproved'] != ""){ echo $date2; }else{ echo ''; }  ?></p><div style="margin-left: 10px; margin-top: -29px;">___________________</div>
                <p class='small4' style="margin-top: 2px; margin-left: 67px;">Date</p>
            </div>
        </div>
        <br><br><br>
        <hr>
        <div style="margin-left: 87px;">
            <p class="small5">(For OED-IT Unit Only)</p><br>
            <div style="margin-bottom: 25px;" class="left">
                <p class="small2">Action Taken: </p>
                <p class="small0" style="max-width: 90%;"><u><?php echo $row['ActionTaken']; ?></u></p><div style="margin-left: 0px; margin-top: <?php
                if (empty($row['ActionTaken'])) {
                    echo '-8px';
                } else {
                    echo '-38px';
                }
                ?>">___________________________________________________________________________</div>
            </div>
            <div>
                <div class="left" style="margin-top: 8px;">
                    <p class="small2">Action Taken by:&nbsp;&nbsp;<?php echo $actby; ?></p><div style="margin-left: 120px; margin-top: -29px;">_______________________________</div>
                    <p class='small3' style="margin-top: 2px; margin-left: 123px;">Name & Signature of IT Personnel</p>
                </div>
                <div class="right" style="margin-top: 8px;">
                    <p class="small4" style="margin-left: 55px;"><?php echo $date3; ?></p><div style="margin-left: 10px; margin-top: -29px;">___________________</div>
                    <p class='small4' style="margin-top: 2px; margin-left: 67px;">Date</p>
                </div>
            </div>
        </div>
        <br><br><br>
        <hr>
        <div style="margin-left: 87px;">
            <p class="small5">(Please fill-out after the action was taken)</p>
            <p class="small6">Overall Satisfactory Rating: <?php echo $row['Rating'];?>  </p>
            <div>
                <p class="small2">Comments/Suggestions: </p>
                <p class="small0" style="max-width: 90%;"><u><?php echo $row['Comment']; ?></u></p><div style="margin-left: 0px; margin-top: <?php
                if (empty($row['Comment'])) {
                    echo '-8px';
                } else {
                    echo '-38px';
                }
                ?>">___________________________________________________________________________</div>
            </div><br>
            <div class="left" style="margin-top: 15px;">
                <p class="small2">Acknowledged by: </p><br>
                <p class="small7" style="margin-top: 6px;">Name & Signature of Requesting Staff</p><p class="small7" style="margin-top: -50px;"><?php if(!empty($row['Rating'])){ echo ucwords($row['ReqBy']); } ?></p><div style="margin-left: 40px; margin-top: -30px;">_______________________________</div>
                <?php 
                $sql = mysql_query("select * from table_empinfo where Employee_Id = '$emid'");
                $row2 = mysql_fetch_assoc($sql);
                
                ?>
                <p class="small7" style="margin-top: 60px;">Position</p><p class="small7" style="margin-top: -52px;"><?php if(!empty($row['Rating'])){ echo $row2['Position']; } ?></p><div style="margin-left: 40px; margin-top: -30px;">_______________________________</div>
                <p style="margin-top: 40px;" class="small7">Date: __________________</p>
            </div>
            <div class="right2" style="margin-top: 15px;">
                <p class="small2">Noted by: </p>
                <p class="small7"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOLI M. ARGENTE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
                <p class="small7" style="margin-top: -7px;">Information Systems Analyst III</p>
                <p style="margin-top: 20px;" class="small7">Date: __________________</p>
            </div>
        </div>

    </page>




    <!--
    
    <div id='section-to-print' style=" width: 612px; height: 842px; background-color: #fff;">
        <div id="iddd" style="margin-left: 60px; width: 65%; padding: 10px">
            <div style="margin-top: 30px; float: left;">
                <img src="images/popcom.png" width="120px" alt="">
            </div>
            <div class="text1">
                <b>OFFICE OF THE EXECUTIVE DIRECTOR<br>
                    Information Technology (IT) Unit<br><br>
                    Service Request Form</b>
            </div>
        </div>
    </div>
    
    <a href="../hris/addAccount.php">Add</a> 
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <form action="RequestForm.php" method="post"><br><br>
        Date of Request: <input type="date" name="dor"><br><br>
        Requested by: <input type="text" name="reqby"><br><br>
        Div/Unit/RPO: <input type="text" name="dur"><br><br>
        Description of Request: <i>(Please clearly write down the details of the request)</i><br>
        <textarea name="desc" rows="5" cols="70" placeholder="Description here..."></textarea><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>-->
</body>

</html>
