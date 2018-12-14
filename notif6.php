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

    </style>
    <?php
    include 'includes/session.php';
    include 'includes/dbcon.php';

    $id = $_SESSION['INTRA_EMP_ID'];

    if (isset($_REQUEST['id']) && $_REQUEST['act'] == "app") {
        $id1 = $_REQUEST['id'];

        mysql_query("Update table_servicereq set Status = 'App' where Emp_Id = '$id1'");
        header("Location: PERSONAL%20DATA%20SHEET%20(Revised%202005).php?id=" . $id);
    }

    $query = mysql_query("select * from table_empinfo where Employee_Id = '$id'");
    $row = mysql_fetch_assoc($query);
    $pdsid = $row['Id'];

    $query2 = mysql_query("select * from table_servicereq where Emp_Id = '$pdsid' AND Status='Appl'");

    if (mysql_num_rows($query2) > 0) {
        ?>
<!--        <script type="text/javascript">

            if (Notification.permission !== "granted")
                Notification.requestPermission();
            var notify = [];

            for (var i = 0; i < 1; i++) {
                var notification = new Notification("Notification title", {
                    icon: "http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png",
                    body: "Hey there! You\'ve been notified!",
                });                                //create some notifications
                notify.push(notification);
            }

            function removeAllNotifys()
            {
                for (var i = 0; i <= notify.length; i++) {
                    notify[i].close();                 //remove them all  
                }
            }

            window.onbeforeunload = removeAllNotifys;

            notification.onclick = function () {
                window.open("../notif6.php?id=12&act=app");
            };
        </script>-->
        <?php
    }
    $num = mysql_num_rows($query2);
    while ($row2 = mysql_fetch_array($query2)) {
        echo '<li class="body">
                <ul class="menu tasks body2">
                  <li>
                    <a class="a" href="../notif6.php?id=' . $row2['Id'] . '&act=app">
                      <h4>Your Personal Data Sheet has been Modified.</h4>
                      <small>' . $row2['DateofReq'] . ' ' . $row2['TimeOfReq'] . '</small>
                      <div></div>
                    </a>
                  </li>
                </ul>
              </li>';
    }
    if (mysql_num_rows($query2) == 0) {
        echo 'You have no notfication.';
    }
    $_SESSION['INTRA_NOTIF'] = $num;
    ?>

</body>
