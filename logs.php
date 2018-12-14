
<style>

    .chatmess{
        font-size: 13px;
        background-color: #c5eaff;
        padding: 5px;
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
        overflow-wrap: break-word;
        width: max-content;
        max-width: 70%;
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
        overflow-wrap: break-word;
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

$cid = $_SESSION['INTRA_CID'];
$id = $_SESSION['INTRA_PDS_ID'];

//display message logs
$result1 = mysql_query("SELECT * FROM table_logs WHERE (Id1='$id' OR Id1='$cid') AND (Id2='$id' OR Id2='$cid') ORDER BY Id desc");

while ($extract = mysql_fetch_array($result1)) {
    if ($extract['Id1'] == $id && $extract['Id2'] == $cid) {
        echo "<div class='chatmess'>" . $extract['Message'] . "<br><p class='datetime'>". $extract['Date']." " . $extract['Time'] ."</p></div>";
    } elseif ($extract['Id1'] == $cid && $extract['Id2'] == $id) {
        echo "<div class='chatmess2'>" . $extract['Message'] . "<br><p class='datetime2'>". $extract['Date']." " . $extract['Time'] ."</p></div>";
    }
}
//ucfirst($extract['Name']) . "<br>" . 