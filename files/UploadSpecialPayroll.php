
<?php include "../includes/session.php" ;?>
<?php include "../includes/dbcon.php" ;?>
<?php include "../includes/functions.php" ;?>

<?php
if (isset($_POST["btnSubmit"])) {

    echo '<table border="1">';

//    if ($_POST['been'] == "") {
//        $_SESSION['HRIS_INDICATOR'] = "FALSE";
//    }
    $filename1 = $_FILES["file"]["tmp_name"];
    if ($_FILES['file']['name']) {
        $filename = explode(".", $_FILES['file']['name']);
        if (strtoupper($filename[count($filename) - 1]) == 'CSV') {
            $lines = file($_FILES['file']['tmp_name']);
            $file = fopen($filename1, "r");                 

            $id = null;
            $d1 = '';
            
            $ex = implode('', $lines);
            if (strpos($ex, 'LONGEVITY') !== false || strpos($ex, 'longevity') !== false || strpos($ex, 'Longevity') !== false) {
                $tf = 'longevity';
            } elseif (strpos($ex, 'HAZARD') !== false || strpos($ex, 'hazard') !== false || strpos($ex, 'Hazard') !== false) {
                $tf = 'hazard';
            } elseif (strpos($ex, 'SUBSISTENCE') !== false || strpos($ex, 'subsistence') !== false || strpos($ex, 'Subsistence') !== false) {
                $tf = 'sublau';
            } else {
                $tf = 'not';
            }
            //echo $tf; 
            $tmp = array();
            while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
                $tmp[] = $data;
                //$data = explode(";", $line);
                if (is_numeric($data[0])) {
                    
                    $date = $_POST['year'] . '-' . $_POST['month'] . '-01';
                    $bdate = date("Y-m-d", strtotime($_POST['bdate']));
                    
                    if ($_POST['bene'] == 'sublau') {
                        if ($data[3] != "") {
                            $sql = mysql_query("SELECT * FROM table_otherbenefits WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                            $num = mysql_num_rows($sql);

                            $emp_no = str_replace(' ', '', $data[3]);

                            if (!empty($data[4])) {
                                $d1 = number_format(str_replace(' ', '', (str_replace(',', '', $data[4]))), 2);
                            } else {
                                $d1 = '';
                            }
                            if (!empty($data[5])) {
                                $d2 = number_format(str_replace(' ', '', (str_replace(',', '', $data[5]))), 2);
                            } else {
                                $d2 = '';
                            }
                            if (!empty($data[7])) {
                                $d3 = number_format(str_replace(' ', '', (str_replace(',', '', $data[7]))), 2);
                            } else {
                                $d3 = '';
                            }
                            $idd = "tax";
                            $ar = searchForId($idd, $tmp[7]) + 1;
                            $arra = array();
                            for ($i = 6; $i < $ar; $i++) {
//                                echo $data[$i] . ' - ' . $tmp[8][$i] . '<br>';
                                if(stripos($tmp[7][$i], 'total') !== false) {
                                    
                                } else {
                                    array_push($arra, $data[$i] . ' ~ ' . $tmp[7][$i]);
                                }
                                
                            }
                            $arrayCount = count($arra);
                            $deduc = '';
                            for ($i = 0; $i < $arrayCount; $i++) {
                                if ($i == $arrayCount - 1){
                                    $deduc .= $arra[$i];
                                } else {
                                    $deduc .= $arra[$i] . ' + ';
                                }
                            }
                            
                            if ($tf == 'sublau') {
                                if ($num == 0) {
                                    //echo '<tr><td>' . $data[3] . '</td><td>' . $d1 . '</td><td>' . $d2 . '</td><td>' . $d3 . '</td><td>' . $data[9] . '</td></tr>';
                                    $result = mysql_query("INSERT INTO table_otherbenefits() VALUES (NULL,'$date','$emp_no','','','','','','','','','$bdate','$d1','$d2','$deduc','')");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                } elseif ($num > 0) {
                                    //echo '<tr><td>' . $data[3] . '</td><td>' . $d1 . '</td><td>' . $d2 . '</td><td>' . $d3 . '</td><td>' . $data[9] . '</td></tr>';
                                    $result = mysql_query("UPDATE table_otherbenefits SET Sublau_date = '$bdate', Subsistence_allowance = '$d1', Laundry_allowance = '$d2', Sublau_withtax = '$deduc' WHERE Date_covered = '$date' AND Emp_no = '$emp_no'");
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                            }
                        }
                    } elseif ($_POST['bene'] == 'lon') {
                        if ($data[3] != '') {
                            $sql = mysql_query("SELECT * FROM table_otherbenefits WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                            $num = mysql_num_rows($sql);

                            $emp_no = str_replace(' ', '', $data[3]);
                            
                            if (!empty($data[4])) {
                                $d1 = number_format(str_replace(' ', '', (str_replace(',', '', $data[4]))), 2);
                            } else {
                                $d1 = '';
                            }
                            if (!empty($data[5])) {
                                $d2 = number_format(str_replace(' ', '', (str_replace(',', '', $data[5]))), 2);
                            } else {
                                $d2 = '';
                            }
                            
                            $idd = "tax";
                            $ar = searchForId($idd, $tmp[8]) + 1;
                            $arra = array();
                            for ($i = 5; $i < $ar; $i++) {
//                                echo $data[$i] . ' - ' . $tmp[8][$i] . '<br>';
                                array_push($arra, $data[$i] . ' ~ ' . $tmp[8][$i]);
                            }
                            $arrayCount = count($arra);
                            $deduc = '';
                            for ($i = 0; $i < $arrayCount; $i++) {
                                if ($i == $arrayCount - 1){
                                    $deduc .= $arra[$i];
                                } else {
                                    $deduc .= $arra[$i] . ' + ';
                                }
                            }
                            
                            
                            if ($tf == 'longevity') {
                                if ($num == 0) {
                                    //echo '<tr><td>' . $data[3] . '</td><td>' . $data[4] . '</td><td>' . $data[5] . '</td></tr>';
                                    $result = mysql_query("INSERT INTO table_otherbenefits() VALUES (NULL,'$date','$emp_no','$bdate','$d1','$deduc','','','','','','','','','','')") or die(mysql_error());
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                } elseif ($num > 0) {
                                    //echo '<tr><td>' . $data[3] . '</td><td>' . $data[4] . '</td><td>' . $data[5] . '</td></tr>';
                                    $result = mysql_query("UPDATE table_otherbenefits SET Longevity_date = '$bdate', Longevity_pay = '$d1', Longevity_withtax = '$deduc' WHERE Date_covered = '$date' AND Emp_no = '$emp_no'") or die(mysql_error());
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                            }
                        }
                    } elseif ($_POST['bene'] == 'haz') {
                        if ($data[3] != '') {
                            $sql = mysql_query("SELECT * FROM table_otherbenefits WHERE Date_covered = '$date' AND Emp_no = '$data[3]'");
                            $num = mysql_num_rows($sql);
                            
                            $emp_no = str_replace(' ', '', $data[3]);
                            
                            if (!empty($data[4])) {
                                $d1 = number_format(str_replace(' ', '', (str_replace(',', '', $data[4]))), 2);
                            } else {
                                $d1 = '';
                            }
                            if (!empty($data[8])) {
                                $d2 = number_format(str_replace(' ', '', (str_replace(',', '', $data[8]))), 2);
                            } else {
                                $d2 = '';
                            }

                            $idd = "tax";
                            $ar = searchForId($idd, $tmp[8]) + 1;
                            $arra = array();
                            for ($i = 5; $i < $ar; $i++) {
//                                echo $data[$i] . ' - ' . $tmp[8][$i] . '<br>';
                                array_push($arra, $data[$i] . ' ~ ' . $tmp[8][$i]);
                            }
                            $arrayCount = count($arra);
                            $deduc = '';
                            for ($i = 0; $i < $arrayCount; $i++) {
                                if ($i == $arrayCount - 1){
                                    $deduc .= $arra[$i];
                                } else {
                                    $deduc .= $arra[$i] . ' + ';
                                }
                            }
                            
                            if ($tf == 'hazard') {
                                if ($num == 0) {
                                    //echo '<tr><td>' . $data[3] . '</td><td>' . $data[4] . '</td><td>' . $data[8] . '</td></tr>';
                                    $result = mysql_query("INSERT INTO table_otherbenefits() VALUES (NULL,'$date','$emp_no','','','','','$bdate','$d1','$deduc','','','','','','')")or die(mysql_error());
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                } elseif ($num > 0) {
                                    //echo '<tr><td>' . $data[3] . '</td><td>' . $data[4] . '</td><td>' . $data[8] . '</td></tr>';
                                    $result = mysql_query("UPDATE table_otherbenefits SET Hazard_date = '$bdate', Hazard_pay = '$d1', Hazard_withtax = '$deduc' WHERE Date_covered = '$date' AND Emp_no = '$emp_no'")or die(mysql_error());
                                    if (!$result) {
                                        die('Invalid query: ' . mysql_error());
                                    }
                                }
                            }
                        }
                    }
                }
                //echo '</tr>';
            }
//            echo '<pre>';
//            print_r($tmp);
//            echo '</pre>';


            if ($_POST['bene'] == 'sublau') {
                if ($tf == 'sublau') {
                    $_SESSION['HRIS_INDICATOR'] = "TRUE";
                } elseif ($tf != 'sublau') {
                    $_SESSION['HRIS_INDICATOR'] = "FALSE3";
                }
            } elseif ($_POST['bene'] == 'lon') {
                if ($tf == 'longevity') {
                    $_SESSION['HRIS_INDICATOR'] = "TRUE";
                } elseif ($tf != 'longevity') {
                    $_SESSION['HRIS_INDICATOR'] = "FALSE4";
                }
            } elseif ($_POST['bene'] == 'haz') {
                if ($tf == 'hazard') {
                    $_SESSION['HRIS_INDICATOR'] = "TRUE";
                } elseif ($tf != 'HAZARD') {
                    $_SESSION['HRIS_INDICATOR'] = "FALSE5";
                }
            }
        } else {
            $_SESSION['HRIS_INDICATOR'] = "FALSE";
        }
    } elseif (empty($_FILES['file']['name'])) {
        $_SESSION['HRIS_INDICATOR'] = "FALSE2";
    }
    echo '</table>';
}
//echo number_format(str_replace(',', '', ''), 2);
?>

<head>
        <meta charset="<?php echo $charset; ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Intranet</title>
        <link rel="icon" href="../images/popcom.png" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script src="../js1/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap Core Css -->
        <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- Waves Effect Css -->
        <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Dropzone Css -->
        <link href="../plugins/dropzone/dropzone.css" rel="stylesheet">

        <!-- Animation Css -->
        <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Multi Select Css -->
        <link href="../plugins/multi-select/css/multi-select.css" rel="stylesheet">

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href="../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

        <!-- Preloader Css -->
        <link href="../plugins/material-design-preloader/md-preloader.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../css/themes/all-themes.css" rel="stylesheet" />

		<!-- Sweetalert Css -->
        <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <style>
            //@import url(https://fonts.googleapis.com/css?family=Roboto:300);
            .rlink{
                text-decoration: none;
                color: #74c35a;
            }

            body {
                font: 13px verdana;
                font-weight: normal;
            }

            footer {
                padding-top: 5px;
                padding-left: 10px;
                position:fixed;
                left:0px;
                bottom:0px;
                height:30px;
                width:98%;
                background:#74c35a;
                font-family: "Roboto", sans-serif;
                border-style: solid;
                border-top: dotted #d8d8d8;
                border-bottom: none;
                border-left: none;
                border-right: none;
                margin-left: 20px;
                margin-right: 20px
            }
            /* Sortable tables */
            table.sortable th{
                background-color:#eee;
                color:#666666;
                font-weight: bold;
                cursor: default;
            }

            .filee {
                width: 500px;
                background: #FAFAFA;
                color: #373737;
                font-size: 17px;
                border-radius: 3px;
                font-family: Arial, "Arial", Helvetica, sans-serif;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.16), 0 2px 10px rgba(0, 0, 0, 0.12);
            }
            .filee::-webkit-file-upload-button {
                color: white;
                border: 1px solid green;
                background: #1DABB8;
                border-radius: 3px;
                padding: 10px;
                border: 1px solid #CBCBCB;
            }
            .filee2::-webkit-file-upload-button {
                color: white;
                border: 1px solid green;
                background: #1DABB8;
                border-radius: 3px;
                padding: 10px;
                border: 1px solid #CBCBCB;
            }
            
        </style>
        <script src="../plugins/sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/upload-payroll.js"></script>
        <script type="text/javascript">
            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#online').load('../online.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#notif').load('../notif.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#badge').load('../badge.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#badge2').load('../badge2.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#notif2').load('../notif2.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#badge3').load('../badge3.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#notif3').load('../notif3.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#notif4').load('../notif4.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#notif6').load('../notif6.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#badge4').load('../badge4.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#badge5').load('../badge5.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#badge6').load('../badge6.php');
                    // removeAllNotifys();
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#offline').load('../offline.php');
                }, 1000);
            });

        </script>

        <?php
        $id = $_REQUEST['emp_id'];
        $query = mysql_query("select * from table_empinfo where Employee_Id = '$id'");
        $row = mysql_fetch_assoc($query);
        $pdsid = $row['Id'];

        $query2 = mysql_query("select * from table_servicereq where Emp_Id = '$pdsid' AND Status='Appl'");

// if ($_SESSION['INTRA_NOTIF'] > 0) {
        ?>

</head>
<nav class="navbar" style="background-color: #0d501b;">
    <div class="container-fluid">
        <div class="navbar-header">

            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>

            <span><img src="../images/popcomlogo2.png"></span>
        </div>
        <?php include '../includes/nav.php'; ?>

    </div>
</nav>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->

        <!-- #User Info -->
        <!-- Menu -->
        <br><br>
        <div class="menu">
            <div id="online">
                <img src="../images/1-0.gif">
            </div>
            <div id="offline">

            </div>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 <a href="javascript:void(0);" style="color: #002451;">POPCOM</a>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <br>
        </div>
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UPLOAD SPECIAL PAYROLL
                            <small>UPLOAD CSV FILE</small>
                        </h2>
                        <div class="body" style="min-height: 77vh;">

                            <form method="POST" enctype="multipart/form-data" id="upload-special" style="margin-top: 50px;">
                                <label for="year">Year: </label>
                                <select name="year" id="year" required>
                                    <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="month">Month: </label>
                                <select name="month" id="month" required>
                                    <?php $month = date('m');?>
                                    <option value="<?php echo $month;?>"><?php echo date('F', mktime(null,null,null,$month,1));?></option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select><br><br><br><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div style="width: 200px;" class="form-group">
                                            <div class="form-line">
                                                <label for="indate1">From: </label>
                                                <input type="text" name="indate1" id="indate1" class="datepicker form-control" placeholder="Please choose a date..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div style="width: 200px;" class="form-group">
                                            <div class="form-line">
                                                <label for="indate2">To: </label>
                                                <input type="text" name="indate2" id="indate2" class="datepicker form-control" placeholder="Please choose a date..." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div align="center">
                                    <div id="fade"></div>
                                    <h4>UPLOAD SALARY </h4><br>
                                    <input type="file" name="file" class="filee" required><br>
                                    <input type="submit" name="submit" class="btn bg-blue-grey waves-effect" value="Import">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    if (isset($_SESSION['HRIS_INDICATOR']) && $_SESSION['HRIS_INDICATOR'] == 'TRUE') {
        ?>
        <script>
            $(document).ready(function () {
                swal("Successful!", "Payroll successfully uploaded!", "success");
            })
        </script>
        <?php
    } elseif (isset($_SESSION['HRIS_INDICATOR']) && $_SESSION['HRIS_INDICATOR'] == 'FALSE') {
        ?>
        <script>
            $(document).ready(function () {
                sweetAlert("Oops...", "Please upload csv file!", "error");
            })
        </script>
        <?php
    } elseif (isset($_SESSION['HRIS_INDICATOR']) && $_SESSION['HRIS_INDICATOR'] == 'FALSE2') {
        ?>
        <script>
            $(document).ready(function () {
                sweetAlert("Oops...", "Please choose a file!", "error");
            })
        </script>
        <?php
    }
?>

<script src="../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../plugins/node-waves/waves.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="../plugins/sweetalert/sweetalert.min.js"></script>

<!-- Dropzone Plugin Js -->
<script src="../plugins/dropzone/dropzone.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Moment Plugin Js -->
<script src="../plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Custom Js -->
<script src="../js/admin.js"></script>
<script src="../js/pages/tables/jquery-datatable.js"></script>
<script src="../js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="../js/demo.js"></script>
<script>
        $('.datepicker').bootstrapMaterialDatePicker({
            time: false,
            format: 'MMMM D, YYYY',
            observer: true,
            min: [1396, 2, 10],
            max: [1396, 2, 20],
            clearButton: true
        });
</script>

