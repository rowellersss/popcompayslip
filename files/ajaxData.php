
<?php

include '../includes/session.php';
//Include database configuration file
include '../includes/dbcon.php';
//------------------------------Radio Button------------------------------------
//if (isset($_POST['register'])) {
$empid = $_POST['empid'];
$fname = ucwords(strtolower($_POST['fname']));
$mname = ucwords(strtolower($_POST['mname']));
$lname = ucwords(strtolower($_POST['lname']));
$gen = $_POST['gen'];
$email = $_POST['email'];
$pieces = explode(' ', $fname);
$last_word = array_pop($pieces);

$str1 = str_replace(" ", "", $lname);

function genpass() {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';

    $string = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < 6; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }
    return $string;
}

$user = strtolower(substr($last_word, 0, 1)) . "." . strtolower($str1);
$pass = md5(genpass());

$genC = $empidC = $fnameC = $lnameC = $emailC = "";
$genErr = $empidErr = $fnameErr = $lnameErr = $emailErr = "";

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


    if (empty($_POST["email"])) {
        $emailErr = "Email is Required!";
    } else {
        $emailC = $_POST["email"];
        $sql = "SELECT Email FROM table_empinfo where Email= '$email'";
        $res = mysql_query($sql) or die("Wrong table Structure!" . mysql_error());
        if (mysql_num_rows($res) > 0) {
            $emailErr = "Email already exist!";
        }
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $emailErr = "Enter a valid Email!";
        }
    }

    if (empty($empidErr) && empty($fnameErr) && empty($lnameErr) && empty($genErr) && empty($empidErr) && empty($emailErr)) {
//        $sel = mysql_query("select * from table_empinfo where Employee_Id = '$empid'");
//        $num = mysql_num_rows($sel);
//        if ($num == 0) {
//            
//        }elseif ($num > 0){
//            
//        }
        mysql_query("insert into table_empinfo (Employee_Id, Firstname, Middlename, Lastname, Sex, Email, Approve) values ('$empid','$fname','$mname','$lname','$gen','$email', 'Yes')");
        mysql_query("insert into table_empacc (Emp_Id, Username, Password, AccessLvl) values ('$empid','$user','$pass','3')");


        $array = array(
            "error" => 0,
            "message" => 'Successful! New account has been created for ' . $fname . ' ' . $lname . 'Password: ' . genpass()
        );
        echo json_encode($array);
        ;
        $genC = $empidC = $fnameC = $lnameC = $posC = $durC = "";
    } elseif (!empty($empidErr) || !empty($fnameErr) || !empty($lnameErr) || !empty($empidErr) || !empty($genErr) || !empty($emailErr)) {

        $array = array(
            "error" => 1,
            "message" => $fnameErr . '<br>' . $lnameErr . '<br>' . $empidErr . '<br>' . $empidErr . '<br>' . $genErr . '<br>' . $emailErr
        );
        echo json_encode($array);
    }
}
//}

if (isset($_POST['gender'])) {
    if ($_POST['gender'] == 'pd') {
        echo '<select name="div" style="padding: 5px; border: 2px solid gray; border-radius: 4px;">
            <option value="">Select Division</option>
            <option value="1">Office of the Executive Director</option>
            <option value="2">Internal Audit Unit</option>
            <option value="3">Administrative Division</option>
            <option value="4">Financial & Management Division</option>
            <option value="5">Planning, Monitoring & Evaluation Division</option>
            <option value="6">Policy Analysis & Dev\'t. Division</option>
            <option value="7">Information Mgt. & Communications Division</option>
            <option value="8">NCR</option>
            <option value="9">RPO 1</option>
            <option value="10">RPO 2</option>
            <option value="11">RPO 3</option>
            <option value="12">RPO 4</option>
            <option value="13">RPO 5</option>
            <option value="14">RPO 6</option>
            <option value="15">RPO 7</option>
            <option value="16">RPO 8</option>
            <option value="17">RPO 9</option>
            <option value="18">RPO 10</option>
            <option value="19">RPO 11</option>
            <option value="20">RPO 12</option>
            <option value="21">CAR</option>
            <option value="22">CARAGA</option>
          </select><br><br>';
    }
}

//------------------------------Residential Address-----------------------------

if (isset($_POST["country_id"]) && !empty($_POST["country_id"])) {
    //Get all state data
    $query = mysql_query("SELECT * FROM table_province WHERE region_id = " . $_POST['country_id'] . " ORDER BY province ASC");

    //Count total number of rows
    $rowCount = mysql_num_rows($query);

    //Display states list
    if ($rowCount > 0) {
        echo '<option value="">Select province</option>';
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $row['province_id'] . '">' . strtoupper($row['province']) . '</option>';
        }
    } else {
        echo '<option value="">Province not available</option>';
    }
}

if (isset($_POST["state_id"]) && !empty($_POST["state_id"])) {
    //Get all city data
    $query = mysql_query("SELECT * FROM table_city WHERE province_id = " . $_POST['state_id'] . " ORDER BY city ASC");

    //Count total number of rows
    $rowCount = mysql_num_rows($query);

    //Display cities list
    if ($rowCount > 0) {
        echo '<option value="">Select city</option>';
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $row['city_id'] . '">' . strtoupper($row['city']) . '</option>';
        }
    } else {
        echo '<option value="">City not available</option>';
    }
}


if (isset($_POST["city_id"]) && !empty($_POST["city_id"])) {
    //Get all city data
    $query = mysql_query("SELECT * FROM table_barangay WHERE city_id = " . $_POST['city_id'] . " ORDER BY barangay ASC");

    //Count total number of rows
    $rowCount = mysql_num_rows($query);

    //Display cities list
    if ($rowCount > 0) {
        echo '<option value="">Select barangay</option>';
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $row['barangay_id'] . '">' . strtoupper($row['barangay']) . '</option>';
        }
    } else {
        echo '<option value="">barangay not available</option>';
    }
}


//--------------------Permanent Address----------------------------

if (isset($_POST["country_id2"]) && !empty($_POST["country_id2"])) {
    //Get all state data
    $query = mysql_query("SELECT * FROM table_province WHERE region_id = " . $_POST['country_id2'] . " ORDER BY province ASC");

    //Count total number of rows
    $rowCount = mysql_num_rows($query);

    //Display states list
    if ($rowCount > 0) {
        echo '<option value="">Select province</option>';
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $row['province_id'] . '">' . strtoupper($row['province']) . '</option>';
        }
    } else {
        echo '<option value="">Province not available</option>';
    }
}

if (isset($_POST["state_id2"]) && !empty($_POST["state_id2"])) {
    //Get all city data
    $query = mysql_query("SELECT * FROM table_city WHERE province_id = " . $_POST['state_id2'] . " ORDER BY city ASC");

    //Count total number of rows
    $rowCount = mysql_num_rows($query);

    //Display cities list
    if ($rowCount > 0) {
        echo '<option value="">Select city</option>';
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $row['city_id'] . '">' . strtoupper($row['city']) . '</option>';
        }
    } else {
        echo '<option value="">City not available</option>';
    }
}


if (isset($_POST["city_id2"]) && !empty($_POST["city_id2"])) {
    //Get all city data
    $query = mysql_query("SELECT * FROM table_barangay WHERE city_id = " . $_POST['city_id2'] . " ORDER BY barangay ASC");

    //Count total number of rows
    $rowCount = mysql_num_rows($query);

    //Display cities list
    if ($rowCount > 0) {
        echo '<option value="">Select barangay</option>';
        while ($row = mysql_fetch_assoc($query)) {
            echo '<option value="' . $row['barangay_id'] . '">' . strtoupper($row['barangay']) . '</option>';
        }
    } else {
        echo '<option value="">barangay not available</option>';
    }
}