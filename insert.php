
<style>

    .chatmess{
        font-size: 13px;
        background-color: #c5eaff;
        padding: 5px;
        width: max-content;
        max-width: 70%;
        border-radius: 7px;
        border-style: solid;
        border-width: 2px;
        border-color: #707070;
        margin-top: 7px;
        float: right;
        clear: both;
        position: relative;
        border: 4px solid #c2e1f5;
        font-family: "Arial", Georgia, Serif;
    }


    .chatmess:after, .chatmess:before {
        
        left: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .chatmess:after {
        
        border-color: rgba(136, 183, 213, 0);
        border-left-color: #c5eaff;
        border-width: 10px;
        margin-top: -10px;
    }
    .chatmess:before {
        
        border-color: rgba(194, 225, 245, 0);
        border-left-color: #c2e1f5;
        border-width: 16px;
        margin-top: -16px;
    }
    
    
    
    
    
    .chatmess2{
        font-size: 13px;
        margin-top: 7px;
        float: left;
        clear: both;
        background-color: #f8f8f8;
        padding: 10px;
        width: max-content;
        max-width: 70%;
        border-radius: 7px;
        border-style: solid;
        border-width: 2px;
        border-color: #707070;
        position: relative;
        border: 4px solid #c2e1f5;
    }
    .chatmess2:after, .chatmess2:before {
        right: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .chatmess2:after {
        border-color: rgba(136, 183, 213, 0);
        border-right-color: #f8f8f8;
        border-width: 10px;
        margin-top: -10px;
    }
    .chatmess2:before {
        border-color: rgba(194, 225, 245, 0);
        border-right-color: #c2e1f5;
        border-width: 16px;
        margin-top: -16px;
    }


    
    .datetime{
        font-size: 8px;
        text-align: right;
    }
    .datetime2{
        font-size: 8px;
        text-align: left;
    }

</style>

<?php
include 'includes/session.php';
include 'includes/dbcon.php';

$msg = mysql_real_escape_string($_REQUEST['msg']);

$cid = $_SESSION['INTRA_CID'];
$id = $_SESSION['INTRA_PDS_ID'];
date_default_timezone_set('Asia/Manila');
$date = date('d-m-Y');
$time = date('H:i:s', time());


$query1 = mysql_query("SELECT * FROM table_empinfo WHERE Id = '$id'");
$row = mysql_fetch_assoc($query1);
$fname = mysql_real_escape_string($row['Firstname']);
$lname = mysql_real_escape_string($row['Lastname']);

//insert into table message logs
mysql_query("INSERT INTO table_logs (Firstname, Lastname, Message, Date, Time, Id1, Id2) VALUE ('$fname','$lname','$msg','$date','$time','$id','$cid')");


//insert into table message notification
$query = mysql_query("SELECT * FROM table_messnotif WHERE Id1 = '$id' AND Id2 = '$cid'");

if (mysql_num_rows($query) == 0) {
    mysql_query("INSERT INTO table_messnotif (Firstname, Lastname, Message, Date, Time, Id1, Id2) VALUE ('$fname','$lname','$msg','$date','$time','$id','$cid')");
    
}elseif (mysql_num_rows($query) != 0){
    mysql_query("UPDATE table_messnotif SET Message = '$msg', Date = '$date', Time = '$time' where Id1 = '$id' AND Id2 = '$cid'");
}  

//displaying the message logs
$result1 = mysql_query("SELECT * FROM table_logs WHERE (Id1='$id' OR Id1='$cid') AND (Id2='$id' OR Id2='$cid') ORDER BY Id DESC");

while ($extract = mysql_fetch_array($result1)) {
    if ($extract['Id1'] == $id && $extract['Id2'] == $cid) {
        echo "<div class='chatmess'>" . $extract['Message'] . "<br><p class='datetime'>" . $extract['Date'] . " " . $extract['Time'] . "</p></div>";
    } elseif ($extract['Id1'] == $cid && $extract['Id2'] == $id) {
        echo "<div class='chatmess2'>" . $extract['Message'] . "<br><p class='datetime2'>" . $extract['Date'] . " " . $extract['Time'] . "</p></div>";
    }
}
