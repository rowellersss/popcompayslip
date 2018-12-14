<!DOCTYPE html>
<?php
include 'includes/session.php';
include 'includes/dbcon.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $extname = $_POST['extname'];
    $empId = $_POST['empId'];
    $bdate = $_POST['bdate'];
    $pdate = $_POST['pdate'];
    $gender = $_POST['gender'];
    $cs = $_POST['cs'];
    $citizen = $_POST['citizen'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bloodt = $_POST['bloodt'];
    $gsis = $_POST['gsis'];
    $pagibig = $_POST['pagibig'];
    $philh = $_POST['philh'];
    $sss = $_POST['sss'];
    $resadd = $_POST['resadd'];
    $zipcode = $_POST['zipcode'];
    $tellno = $_POST['tellno'];
    $peradd = $_POST['peradd'];
    $pzipcode = $_POST['pzipcode'];
    $ptellno = $_POST['ptellno'];
    $email = $_POST['email'];
    $cellno = $_POST['cellno'];
    $aemployee = $_POST['aemployee'];
    $tin = $_POST['tin'];

    $user = strtolower(substr($fname, 0, 1)) . "." . $lname;
    $pass = md5(12345);

    mysql_query("insert into table_empinfo (Employee_Id, Firstname, Middlename, Lastname, NameExt DateOfBirth, PlaceOfBirth, Sex, CivilStatus, Citizenship, Height, Weight, BloodType, GSIS, PAGIBIG, PHILHEALTH, SSS, ResidentialAdd, RZipCode, RTelephoneNo, PermanentAdd, PZipCode, PTelephoneNo, Email, CellphoneNo, AgencyEmpNo, TIN)"
            . " values ('$empId','$fname','$mname','$lname','$extname','$bdate','$pdate','$gender','$cs','$citizen','$height','$weight','$bloodt','$gsis','$pagibig','$philh','$sss','$resadd','$zipcode','$tellno','$peradd','$pzipcode','$ptellno','$email','$cellno','$aemployee','$tin')");
    mysql_query("insert into table_empacc (Emp_Id, Username, Password) values ('$empId','$user','$pass')");
    echo '<p style="color: green;">Successful</p>';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css1/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body style="background-color: white;">
        <div class="container">
            <form method="post" action="addAccount.php">
                <table class="table-bordered">
                    <tr>
                        <th>I. Personal Information</th>
                    </tr>
                    <tr>
                Employee ID: <input type="text" name="empId"><br><br>
                First Name: <input type="text" name="fname"><br><br>
                Middle Name: <input type="text" name="mname"><br><br>
                Last Name: <input type="text" name="lname"><br><br>
                Name Ext. (e.g. Jr., Sr.): <input type="text" name="extname"><br><br>
                Date of Birth (mm/dd/yyyy): <input type="date" name="bdate"><br><br>
                Place of Birth: <input type="text" name="pdate"><br><br>
                <label>Sex: </label>
                Male   <input type="radio" name="gender" value="M">
                Female <input type="radio" name="gender" value="F"><br><br>
                <label>Civil Status: </label>
                Single   <input type="radio" name="cs" value="s">
                Married <input type="radio" name="cs" value="M">
                Annulled   <input type="radio" name="cs" value="A">
                Widowed <input type="radio" name="cs" value="W">    
                Separated   <input type="radio" name="cs" value="S">
                Others, specify <input type="radio" name="cs" value="O">
                <input type="text" name="specify"><br><br>
                Citizenship: <input type="text" name="citizen"><br><br>
                Height: <input type="text" name="height"><br><br>
                Weight: <input type="text" name="weight"><br><br>
                Blood Type: <input type="text" name="bloodt"><br><br>
                GSIS ID NO.: <input type="text" name="gsis"><br><br>
                PAG-IBIG ID NO.: <input type="text" name="pagibig"><br><br>
                PHILHEALTH NO.: <input type="text" name="philh"><br><br>
                SSS ID NO.: <input type="text" name="sss"><br><br>
                Residential Address: <input type="text" name="resadd"><br><br>
                Zip Code: <input type="text" name="zipcode"><br><br>
                Tellephone no.: <input type="text" name="tellno"><br><br>
                Permanent Address: <input type="text" name="peradd"><br><br>
                Zip Code: <input type="text" name="pzipcode"><br><br>
                Tellephone no.: <input type="text" name="ptellno"><br><br>
                E-mail Address: <input type="text" name="email"><br><br>
                Cellphone no.: <input type="text" name="cellno"><br><br>
                Agency Employee no.: <input type="text" name="aemployee"><br><br>
                TIN: <input type="text" name="tin"><br><br>

                <input type="submit" name="submit" value="Submit">
                </tr>
                </table>
            </form>
        </div>

    </body>


    <!-- Jquery Core Js -->
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
    <script src=plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="pugins/flot-charts/jquery.flot.pie.js"></script>
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
</html>
