<!DOCTYPE html>

<?php
session_start();
include 'includes/dbcon.php';
if (!isset($_SESSION['EMP_ID'])) {
    header("Location: ../index.php");
}
?>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Preloader Css -->
        <link href="../plugins/material-design-preloader/md-preloader.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../css/themes/all-themes.css" rel="stylesheet" />
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
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
        </style>
    </head>

    <body class="theme-red" style="background-color: #74c35a;">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="md-preloader pl-size-md">
                    <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                    </svg>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar" style="background-color: #043d10;">
            <div class="container-fluid">
                <div class="navbar-header">

                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>

                    <span><img src="../images/popcomlogo2.png"></span>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right" style="margin-top: 10px; margin-right: 40px;">
                        <!-- Call Search -->


                        <!-- #END# Call Search -->
                        <!-- Notifications -->
                        <li class="dropdown">

                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                 Hello, 
                                    
                                    <?php
                                    $query = mysql_query("select * from table_empinfo where Id = ". $_SESSION['EMP_ID']);
                                    $row = mysql_fetch_assoc($query);
                                    echo ucfirst($row['Firstname'])." ". ucfirst($row['Lastname']);
                                    
                                    ?>
                                    
                                    
                                    <i class="material-icons col-yellow">keyboard_arrow_down</i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Menu</li>
                                <li class="body">
                                    <ul class="menu">
                                        <li>
                                            <a href="../logout.php">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">exit_to_app</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>Logout</h4>
                                                    <p>
                                                        &nbsp;
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-cyan">
                                                    <i class="material-icons">person</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>Profile</h4>
                                                    <p>
                                                        &nbsp;
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->

                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="index.html">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="AD">
                                <i class="material-icons">computer</i>
                                <span>AD</span>
                            </a>
                        </li>
                        <li>
                            <a href="FMD">
                                <i class="material-icons">attach_money</i>
                                <span>FMD</span>
                            </a>
                        </li>
                        <li>
                            <a href="PMED" >
                                <i class="material-icons">event_note</i>
                                <span>PMED</span>
                            </a>
                        </li>
                        <li>
                            <a href="PADD">
                                <i class="material-icons">gavel</i>
                                <span>PADD</span>
                            </a>
                        </li>
                        <li>
                            <a href="IMCD">
                                <i class="material-icons">contacts</i>
                                <span>IMCD</span>
                            </a>
                        </li>
                        <li>
                            <a href="OED" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>OED</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="OED/ITDMU">ITDMU</a>
                                </li>
                                <li>
                                    <a href="OED/LEGAL">Legal</a>
                                </li>
                                <li>
                                    <a href="OED/IA">Interval Audit</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="R1">
                                <i class="material-icons">language</i>
                                <span>Region 1</span>
                            </a>
                        </li>
                        <li>
                            <a href="R2">
                                <i class="material-icons">language</i>
                                <span>Region 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="R3;">
                                <i class="material-icons">language</i>
                                <span>Region 3</span>
                            </a>
                        </li>
                        <li>
                            <a href="R4A">
                                <i class="material-icons">language</i>
                                <span>Region 4A(CALABARZON)</span>
                            </a>
                        </li>
                        <li>
                            <a href="R4B">
                                <i class="material-icons">language</i>
                                <span>Region 4B(MIMAROPA)</span>
                            </a>
                        </li>
                        <li>
                            <a href="R5">
                                <i class="material-icons">language</i>
                                <span>Region 5</span>
                            </a>
                        </li>
                        <li>
                            <a href="R6">
                                <i class="material-icons">language</i>
                                <span>Region 6</span>
                            </a>
                        </li>
                        <li>
                            <a href="R7">
                                <i class="material-icons">language</i>
                                <span>Region 7</span>
                            </a>
                        </li>
                        <li>
                            <a href="R8">
                                <i class="material-icons">language</i>
                                <span>Region 8</span>
                            </a>
                        </li>
                        <li>
                            <a href="R9">
                                <i class="material-icons">language</i>
                                <span>Region 9</span>
                            </a>
                        </li>
                        <li>
                            <a href="R10">
                                <i class="material-icons">language</i>
                                <span>Region 10</span>
                            </a>
                        </li>
                        <li>
                            <a href="R11;">
                                <i class="material-icons">language</i>
                                <span>Region 11</span>
                            </a>
                        </li>
                        <li>
                            <a href="R12">
                                <i class="material-icons">language</i>
                                <span>Region 12</span>
                            </a>
                        </li>
                        <li>
                            <a href="CARAGA">
                                <i class="material-icons">language</i>
                                <span>CARAGA</span>
                            </a>
                        </li>
                        <li>
                            <a href="CAR">
                                <i class="material-icons">language</i>
                                <span>CAR</span>
                            </a>
                        </li>
                        <li>
                            <a href="NCR">
                                <i class="material-icons">language</i>
                                <span>NCR</span>
                            </a>
                        </li>
                    </ul>
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
            <aside id="rightsidebar" class="right-sidebar">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                    <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                        <ul class="demo-choose-skin">
                            <li data-theme="red" class="active">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings">
                        <div class="demo-settings">
                            <p>GENERAL SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Report Panel Usage</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Email Redirect</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>SYSTEM SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Notifications</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Auto Updates</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>ACCOUNT SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Offline</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Location Permission</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- #END# Right Sidebar -->
        </section>
        <section class="content" style="margin-top: 120px;">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Commission ON Population (INTRANET)</h2>
                                <div class="pull-right">

                                </div>
                            </div>
                            <div class="body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--<footer>Copyright © POPCOM 2016</footer>-->



        <!-- Jquery Core Js -->
        <script src="../plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="../plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="../plugins/node-waves/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="../plugins/raphael/raphael.min.js"></script>
        <script src="../plugins/morrisjs/morris.js"></script>

        <!-- ChartJs -->
        <script src="../plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="../plugins/flot-charts/jquery.flot.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="../plugins/flot-charts/jquery.flot.time.js"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="../js/admin.js"></script>
        <script src="../js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="../js/demo.js"></script>
        <script>
            $('.message a').click(function () {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        </script>

    </body>

</html>