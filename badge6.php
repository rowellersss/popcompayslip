<?php
include 'includes/session.php';
include 'includes/dbcon.php';

$id = $_SESSION['INTRA_EMP_ID'];

$query = mysql_query("select * from table_empinfo where Employee_Id = '$id'");
$row = mysql_fetch_assoc($query);
$pdsid = $row['Id'];

$query2 = mysql_query("select * from table_servicereq where Emp_Id = '$pdsid' AND Status='Appl'");

$num = mysql_num_rows($query2);

if (mysql_num_rows($query2) > 0) {
    ?>
<!--
-->    <script type="text/javascript">

        if (Notification.permission !== "granted")
            Notification.requestPermission();
        var notify = [];

        for (var i = 0; i < 1; i++) {
            var notification = new Notification("Personal Data Sheet", {
                icon: "http://4.bp.blogspot.com/-VRJ94pdLRC4/UspocNKfGEI/AAAAAAABTYM/bNzKd868t8o/s320/popcom-717760.png",
                body: "Your Personal Data Sheet has been Modified.",
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
            window.open("../notif6.php?id=<?php echo $pdsid ?>&act=app");
        };
    </script>

    <?php
}


if ($num == 0) {
    echo '';
} else {
    echo $num;
}
