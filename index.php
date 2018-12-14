<!DOCTYPE html>

<?php
include 'includes/session.php';
include 'includes/dbcon.php';
if (isset($_SESSION['INTRA_EMP_ID'])) {
    header("Location: files");
}


if (isset($_POST['register'])) {
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gen = $_POST['gen'];
    $pos = $_POST['pos'];
    //$email = $_POST['email'];
    $pieces = explode(' ', $fname);
    $last_word = array_pop($pieces);

    $str1 = str_replace(" ", "", $lname);

    $user = strtolower(substr($last_word, 0, 1)) . "." . strtolower($str1);
    $pass = md5(12345);

    $genC = $empidC = $fnameC = $lnameC = $posC = $emailC = "";
    $genErr = $empidErr = $fnameErr = $lnameErr = $posErr = $emailErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //employee id
        if (empty($_POST["empid"])) {
            $empidErr = "Employee ID is Required!";
        } else {
            $empidC = $_POST["empid"];

            $sql1 = "SELECT Employee_Id FROM table_empinfo where Employee_Id = '$empid'";
            $res1 = mysql_query($sql1) or die("Wrong table Structure!" . mysql_error());

            if (mysql_num_rows($res1) > 0) {
                $empidErr = "Employee Id already exist!";
            }
        }
        
        //position
        if (empty($_POST["pos"])) {
            $posErr = "Position ID is Required!";
        } else {
            $posC = $_POST["pos"];

            $sql1 = "SELECT Position FROM table_empinfo where Position = '$posC'";
            $res1 = mysql_query($sql1) or die("Wrong table Structure!" . mysql_error());

            if (mysql_num_rows($res1) > 0) {
                $posErr = "Position already exist!";
            }
        }
        
        //firstname
        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is Required!";
        } else {
            $fnameC = $_POST["fname"];
        }
        
        //lastname
        if (empty($_POST["lname"])) {
            $lnameErr = "Last Name is Required!";
        } else {
            $lnameC = $_POST["lname"];
        }
        
        //gender
        if (empty($_POST["gen"])) {
            $genErr = "Gender is Required!";
        } else {
            $genC = $_POST["gen"];
        }


        //if (empty($_POST["email"])) {
        //    $emailErr = "Email is Required!";
        //} else {
        //    $emailC = $_POST["email"];
        //    $sql = "SELECT Email FROM table_empinfo where Email= '$email'";
        //    $res = mysql_query($sql) or die("Wrong table Structure!" . mysql_error());
        //    if (mysql_num_rows($res) > 0) {
        //        $emailErr = "Email already exist!";
        //    }
        //   if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
        //        $emailErr = "Enter a valid Email!";
        //    }
        //}

        if (empty($empidErr) && empty($fnameErr) && empty($lnameErr) && empty($genErr) && empty($empidErr) && empty($posErr)) {

            mysql_query("insert into table_empinfo (Employee_Id, Firstname, Lastname, Position, Sex, DivUnitRPO, Email) values ('$empid','$fname','$lname','$pos','$gen','$dur','$email')");
            mysql_query("insert into table_empacc (Emp_Id, Username, Password, AccessLvl) values ('$empid','$user','$pass','3')");

            echo '<script language="javascript">';
            echo 'alert("Successful!\n\n\nWait for the approval of your account\nWe will send your password in your email \nafter we approve your account.")';
            echo '</script>';

            $genC = $empidC = $fnameC = $lnameC = $posC = $durC = "";
        } elseif (!empty($empidErr) || !empty($fnameErr) || !empty($lnameErr) || !empty($empidErr) || !empty($genErr) || !empty($posErr)) {
            echo '<script language="javascript">';
            echo 'alert("' . $fnameErr . '\n\n' . $lnameErr . '\n\n' . $empidErr . '\n\n' . $empidErr . '\n\n' . $posErr . '\n\n' . $genErr . '")';
            echo '</script>';
        }
    }
}
?>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Intranet</title>
        <!-- Favicon-->
        <link rel="icon" href="images/popcom.png" type="image/x-icon">

        <!-- Google Fonts -->
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
        
        <!-- Select -->
        <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />

        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);
            .beauty:hover {
                cursor: pointer;
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
                border-top: dotted #f0f0f0;
                border-bottom: none;
                border-left: none;
                border-right: none;
                margin-left: 20px;
                margin-right: 20px
            }
            .login-page {
                width: 360px;
                padding: 8% 0 0;
                margin: auto;
            }
            .form {
                z-index: 1;
                background: #FFFFFF;
                width: 360px;
                margin:0 auto;
                margin-top: 150px;
                padding: 45px;
                text-align: center;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

                /*
                position: fixed;
                z-index: 1;
                background: #FFFFFF;
                max-width: 360px;
                margin: 0 auto 100px;
                padding: 45px;
                margin-top: 300px;
                margin-left: 1400px;
                text-align: center;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
                */
            }
            .form input {
                font-family: "Roboto", sans-serif;
                outline: 0;
                background: #f2f2f2;
                width: 100%;
                border: 0;
                margin: 0 0 15px;
                padding: 15px;
                box-sizing: border-box;
                font-size: 14px;
            }
            .form .button {
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                background: #4CAF50;
                width: 100%;
                border: 0;
                padding: 15px;
                color: #FFFFFF;
                font-size: 14px;
                -webkit-transition: all 0.3 ease;
                transition: all 0.3 ease;
                cursor: pointer;
            }
            .form .button:hover,.form button:active,.form button:focus {
                background: #43A047;
            }
            .form .message {
                margin: 15px 0 0;
                color: #b3b3b3;
                font-size: 12px;
            }
            .form .message a {
                color: #4CAF50;
                text-decoration: none;
            }
            .form .register-form {
                display: none;
            }
            .container {
                position: relative;
                z-index: 1;
                max-width: 300px;
                margin: 0 auto;
            }
            .container:before, .container:after {
                content: "";
                display: block;
                clear: both;
            }
            .container .info {
                margin: 50px auto;
                text-align: center;
            }
            .container .info h1 {
                margin: 0 0 15px;
                padding: 0;
                font-size: 36px;
                font-weight: 300;
                color: #1a1a1a;
            }
            .container .info span {
                color: #4d4d4d;
                font-size: 12px;
            }
            .container .info span a {
                color: #000000;
                text-decoration: none;
            }
            .container .info span .fa {
                color: #EF3B3A;
            }
            body {
                background: #76b852; /* fallback for old browsers */
                background: -webkit-linear-gradient(right, #76b852, #8DC26F);
                background: -moz-linear-gradient(right, #76b852, #8DC26F);
                background: -o-linear-gradient(right, #76b852, #8DC26F);
                background: linear-gradient(to left, #76b852, #8DC26F);
                font-family: "Roboto", sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;      
            }
            .select{
                background-color: #f2f2f2;
                border-style: none;
                border-radius: 0px;
                margin-bottom: 13px;
                height: 53px;
                width: 100%;
                padding-left: 10px;
            }
            .select.active {
                background-image: none;
                outline: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
            }
        </style>
        <script type="text/javascript">
            function date_time(id)
            {
                date = new Date;
                year = date.getFullYear();
                month = date.getMonth();
                months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                d = date.getDate();
                day = date.getDay();
                days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                h = date.getHours();
                if (h < 10)
                {
                    h = "0" + h;
                }
                m = date.getMinutes();
                if (m < 10)
                {
                    m = "0" + m;
                }
                s = date.getSeconds();
                if (s < 10)
                {
                    s = "0" + s;
                }
                result = '' + days[day] + ' ' + months[month] + ' ' + d + ', ' + year + ' <b>' + h + ':' + m + ':' + s + '</b>';
                document.getElementById(id).innerHTML = result;
                setTimeout('date_time("' + id + '");', '1000');
                return true;
            }
        </script>
    </head>

    <body class="theme-red zoom90" style="background-color: #74c35a;">
        <!-- Page Loader 
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="md-preloader pl-size-md">
                    <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                    </svg>
                </div>
                <p>Please wait...</p>
            </div>
        </div>-->
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
                    <span><img src="images/popcomlogo2.png"></span>
                </div>


            </div>
        </nav>
        <!-- #Top Bar -->
        <div class="form beauty">
            <form method="post" action="index.php" class="register-form">

                <input type="text" name="fname" placeholder="Firstname"/>
                <input type="text" name="mname" placeholder="Middlename"/>
                <input type="text" name="lname" placeholder="Lastname"/>
                <input type="text" name="empid" placeholder="Employee ID"/>
                <select data-live-search="true" class="selectpicker" name="pos">
                    <option value="">Position</option>
                    <?php
                    $sel = mysql_query("select * from table_position");
                    while ($row0 = mysql_fetch_array($sel)) {
                        echo '<option value="'.$row0['position_id'].'">'. $row0['position_itemno'] . ' - ' . $row0['position_description'].'</option>';
                    }
                    ?>
                </select><br><br>
                <select class="select" name="gen">
                    <option value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
<!--                <select class="select" name="dur">
                    <option value="">Div/Unit/RPO</option>
                    <option value="AD">AD</option>
                    <option value="FMD">FMD</option>
                    <option value="IMCD">IMCD</option>
                    <option value="OED">OED</option>
                    <option value="OED-IAU">OED-IAU</option>
                    <option value="OED-LU">OED-LU</option>
                    <option value="OED-MU">OED-MU</option>
                    <option value="ITDMU">ITDMU</option>
                    <option value="PADD">PADD</option>
                    <option value="PMED">PMED</option>
                    <option value="NCR">NCR</option>
                    <option value="Mimaropa">Mimaropa</option>
                    <option value="Caraga">Caraga</option>
                    <option value="CAR">CAR</option>
                    <option value="Calabarzon">Calabarzon</option>
                    <option value="Region 1">Region 1</option>
                    <option value="Region 2">Region 2</option>
                    <option value="Region 3">Region 3</option>
                    <option value="Region 5">Region 5</option>
                    <option value="Region 6">Region 6</option>
                    <option value="Region 7">Region 7</option>
                    <option value="Region 8">Region 8</option>
                    <option value="Region 9">Region 9</option>
                    <option value="Region 10">Region 10</option>
                    <option value="Region 11">Region 11</option>
                    <option value="Region 12">Region 12</option>
                </select>-->
                <input type="text" name="email" placeholder="Email"/>
                <input type="submit" name="register" class="button" value="register">
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form method="post" action="loginCheck.php" class="login-form">
                <?php
                ?>
                <p style="font-size: 20px;">Login</p>
                <input type="text" name="user" placeholder="username"/>
                <input type="password" name="pass" placeholder="password"/>
                <?php
                if (isset($_REQUEST['msg'])) {
                    $msg = $_REQUEST['msg'];
                    if ($msg == 1) {
                        echo '<font color="#F44336">' . 'Invalid username or password' . '</font><br><br>';
                    }
                    if ($msg == 2) {
                        echo '<font color="#F44336">' . 'Input both username and password' . '</font><br><br>';
                    }
                    if ($msg == 3) {
                        echo '<font color="#F44336">' . 'Invalid password' . '</font><br><br>';
                    }
                    if ($msg == 4) {
                        echo '<font color="#F44336">' . "Your account has not yet been approved" . '</font><br><br>';
                    }
                }
                ?>
                <input type="submit" class="button" name="login" value="LOGIN">
                <p class="message">Not registered? <a href="#">Create an account</a></p><br>
                <span style="margin-top: 100px; color: #043d10;" id="date_time"></span>
                <script type="text/javascript">window.onload = date_time('date_time');</script>
            </form>
        </div>

        <footer>Copyright © POPCOM 2016</footer>


        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
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
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script>
                    $('.message a').click(function () {
                        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                    });

                    $(function () {
                        $(".beauty").draggable();
                    });
        </script>

    </body>

</html>