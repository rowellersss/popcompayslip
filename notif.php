<body>
    <style>
        .body2{
            list-style-type: none;
            background-color: #f5f5f5;
            border-radius: 4px;
            margin-bottom: 1px;
        }
        .body2:hover{
            background-color: #e5e5e5;
            border-radius: 4px;
        }
        .a{
            color: #005302;
        }
        .a:hover{
            color: #009d04;
        }

        .ellipsis {
            text-overflow: ellipsis;

            /* Required for text-overflow to do anything */
            white-space: nowrap;
            overflow: hidden;
        }
        
        .overflow {
            width: 15em;

            /**
             * Required properties to achieve text-overflow
             */
            white-space: nowrap;
            overflow: hidden;
        }

    </style>
    <?php
    include 'includes/session.php';
    include 'includes/dbcon.php';


    if (isset($_REQUEST['id1']) && $_REQUEST['act'] == "set") {
        $_SESSION['INTRA_CID'] = $_REQUEST['id1'];
        $id2 = $_SESSION['INTRA_PDS_ID'];
        $id3 = $_REQUEST['id1'];
        mysql_query("DELETE FROM table_messnotif WHERE Id2 = '$id2' AND Id1 = '$id3'");
        header("Location: files/chat.php");
    }
//$id = $_SESSION['INTRA_EMP_ID'];
    $id = $_SESSION['INTRA_PDS_ID'];
    
    $result2 = mysql_query("SELECT * FROM table_messnotif WHERE Id2 = '$id' AND Id1 != '$id' ORDER BY Id DESC LIMIT 10");

    while ($extract2 = mysql_fetch_array($result2)) {

        echo '<li class="body">
            <ul class="menu tasks body2">
                                        <li>
                                            <a class="a" href="../notif.php?id1=' . $extract2['Id1'] . '&act=set" onclick="return popitup(\'../notif.php?id1=' . $extract2['Id1'] . '&act=set\')">
                                                <h4>
                                                    ' . $extract2['Firstname'] . " " . $extract2['Lastname'] . '
                                                    <small>' . $extract2['Date'] . " " . $extract2['Time'] .'</small>
                                                </h4>
                                                <div class="overflow ellipsis">
                                                    ' . $extract2['Message'] . '
                                                </div>
                                            </a>
                                        </li>
            </ul>
          </li>';
    }
    if (mysql_affected_rows() == 0) {
        echo 'You have no message.';
    }
    ?>

</body>
<script type="text/javascript">
    function popitup(url) {
        newwindow = window.open(url, 'name', 'height=850, width=500');
        if (window.focus) {
            newwindow.focus();

        }
        return false;
    }
</script>