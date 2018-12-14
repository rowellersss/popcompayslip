<?php
include 'includes/session.php';
include 'includes/dbcon.php';

if (isset($_REQUEST['id']) && $_REQUEST['act'] == "set") {

    //$cid = $_REQUEST['id'];
    //$id = $_SESSION['INTRA_EMP_ID'];
    //$result1 = mysql_query("select * from table_logs where (Id1='$id' OR Id1='$cid') AND (Id2='$id' OR Id2='$cid') order by Id desc");

    //while ($extract = mysql_fetch_array($result1)) {
    //    echo $extract['Name'] . ": " . $extract['Message'] . "<br>";
    //}

    $_SESSION['INTRA_CID'] = $_REQUEST['id'];
    header("Location: chat.php");
}

$id = $_SESSION['INTRA_EMP_ID'];
$result2 = mysql_query("select * from table_empacc where Status='1' AND Emp_Id != '$id' order by Id asc");

echo '<ul class="list"><li class="header">Online</li>';

while ($extract2 = mysql_fetch_array($result2)) {

    echo '<li><a href="online2.php?id=' . $extract2['Emp_Id'] . '&act=set"><img style="width:30px;height:30px;" src="images/user.png"><span style="color:#676767;">' . ucfirst($extract2['Firstname']) . " " . ucfirst($extract2['Lastname']) . '</span></a></li>';
}
echo '</ul>';
?>








<style>
    hov{
        background-color: red;
    }
    hov:hover{
        background-color: red;
    }
</style>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Preloader Css -->
<link href="plugins/material-design-preloader/md-preloader.css" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="plugins/morrisjs/morris.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />

<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="plugins/flot-charts/jquery.flot.js"></script>
<script src="plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/index.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
<script>
    $('.message a').click(function () {
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
</script>