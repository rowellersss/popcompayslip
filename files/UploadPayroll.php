
<?php include "../includes/session.php" ;?>
<?php include "../includes/dbcon.php" ;?>
<?php include "../includes/functions.php" ;?>

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

            #fade {
                display: none;
                position:fixed;
                top: 0%;
                left: 0%;
                width: 100%;
                height: 100%;
                background-color: #ababab;
                background-image:url('../images/loading.gif');
                background-repeat:no-repeat;
                background-position:center;
                z-index: 1001;
                -moz-opacity: 0.8;
                opacity: .70;
                filter: alpha(opacity=80);
            }

            #modal {
                display: none;
                position: relative;
                
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

        <!--            <script>
                        $(document).ready(function () {
                            if (!Notification) {
                                alert('Desktop notifications not available in your browser. Try Chromium.');
                                return;
                            }

                            if (Notification.permission !== "granted")
                                Notification.requestPermission();
                            else {
            //                        var notification = new Notification('Personal Data Sheet', {
            //                            icon: 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTWodhCjAx8ERk4_2pW_0BzC9u9SlO7ll7Iw_w7RXSefIh-hrY6Sw',
            //                            body: "Your Personal Data Sheet has been Modified!",
            //                        });
                                var notify = [];

                                for (var i = 0; i < 1; i++) {
                                    var notification = new Notification('test', {
                                        icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
                                        body: "test" + i
                                    });                                  //create some notifications
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
                                    window.open("../notif6.php?id=<?php //echo $pdsid               ?>&act=app");
                                };

                            }
                        });
                    </script>-->

        <?php
//}
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
                            UPLOAD SALARY
                            <small>UPLOAD CSV FILE</small>
                        </h2>
                        <div class="body" style="min-height: 77vh;">
                            <form method="POST" enctype="multipart/form-data" id="upload-payroll" style="margin-top: 50px;">
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
                                                <label for="indate1">Payroll (1-15): </label>
                                                <input type="text" name="indate1" id="indate1" class="datepicker form-control" placeholder="Please choose a date..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div style="width: 200px;" class="form-group">
                                            <div class="form-line">
                                                <label for="indate2">Payroll (16-31): </label>
                                                <input type="text" name="indate2" id="indate2" class="datepicker form-control" placeholder="Please choose a date..." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div align="center">
                                    <div id="fade"></div>
                                    <h4>UPLOAD SALARY </h4><br>
                                    <input type="file" name="file" class="filee"><br>
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
<!-- <script src="../plugins/sweetalert/sweetalert.min.js"></script> -->

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



