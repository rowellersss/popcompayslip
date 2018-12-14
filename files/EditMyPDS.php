<?php
//error_reporting(E_ALL);
//ini_set('display_errors','on');
include '../includes/session.php';
include '../includes/dbcon.php';
require '../email/PHPMailerAutoload.php';
include '../includes/functions.php';

if (!isset($_SESSION['INTRA_EMP_ID'])) {
    header("Location: ../index.php");
}

if (isset($_REQUEST['cid']) && $_REQUEST['act'] == 'del') {
    mysql_query("Delete from table_empinfofbchild where Id = " . $_REQUEST['cid']);
    header("Location: EditMyPDS.php?id=" . $_SESSION['INTRA_PDS_ID']);
} elseif (isset($_REQUEST['eid']) && $_REQUEST['act'] == 'del') {
    mysql_query("Delete from table_empinfoeb where Id = " . $_REQUEST['eid']);
    header("Location: EditMyPDS.php?id=" . $_SESSION['INTRA_PDS_ID']);
} elseif (isset($_REQUEST['csid']) && $_REQUEST['act'] == 'del') {
    mysql_query("Delete from table_empinfocs where Id = " . $_REQUEST['csid']);
    header("Location: EditMyPDS.php?id=" . $_SESSION['INTRA_PDS_ID']);
} elseif (isset($_REQUEST['weid']) && $_REQUEST['act'] == 'del') {
    mysql_query("Delete from table_empinfowe where Id = " . $_REQUEST['weid']);
    header("Location: EditMyPDS.php?id=" . $_SESSION['INTRA_PDS_ID']);
} elseif (isset($_REQUEST['vwid']) && $_REQUEST['act'] == 'del') {
    mysql_query("Delete from table_empinfovw where Id = " . $_REQUEST['vwid']);
    header("Location: EditMyPDS.php?id=" . $_SESSION['INTRA_PDS_ID']);
} elseif (isset($_REQUEST['tpid']) && $_REQUEST['act'] == 'del') {
    mysql_query("Delete from table_empinfotp where Id = " . $_REQUEST['tpid']);
    header("Location: EditMyPDS.php?id=" . $_SESSION['INTRA_PDS_ID']);
} elseif (isset($_REQUEST['oiid']) && $_REQUEST['act'] == 'del') {
    mysql_query("Delete from table_empinfooiskills where Id = " . $_REQUEST['oiid']);
    header("Location: EditMyPDS.php?id=" . $_SESSION['INTRA_PDS_ID']);
}


if (isset($_POST['btnBack'])) {
    header("Location: index.php");
}

if (isset($_POST['OIsubmit'])) {
    //echo $_SERVER['DOCUMENT_ROOT'];
    //echo '<pre>';
    //print_r($_POST);
    //echo '</pre>';
    //Personal Information
    $PId0 = "";
    $PId1 = mysql_real_escape_string($_POST['PIempid']);
    $PId2 = mysql_real_escape_string($_POST['PIsname']);
    $PId3 = mysql_real_escape_string($_POST['PIfname']);
    $PId4 = mysql_real_escape_string($_POST['PImname']);
    $PId5 = mysql_real_escape_string($_POST['PInamex']);
    $PId6 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['PIdob'])));
    $PId7 = mysql_real_escape_string($_POST['PIpob']);

    if (isset($_POST['PIsoa'])) {
        $PId0b = mysql_real_escape_string($_POST['PIsoa']);
    }if (isset($_POST['PIsex'])) {
        $PId8 = mysql_real_escape_string($_POST['PIsex']);
    }if (isset($_POST['PIcs'])) {
        $PId9 = mysql_real_escape_string($_POST['PIcs']);
    }if (isset($_POST['PIcitizen'])) {
        $PId10 = mysql_real_escape_string($_POST['PIcitizen']);
    }if (isset($_POST['PIby'])) {
        $PId10b = mysql_real_escape_string($_POST['PIby']);
    }

    //$PId10c = mysql_real_escape_string($_POST['PIcountxt']);
    $PId10d = mysql_real_escape_string($_POST['PIcounsel']);
    $PId11 = mysql_real_escape_string($_POST['PIheight']);
    $PId12 = mysql_real_escape_string($_POST['PIweight']);
    $PId13 = mysql_real_escape_string($_POST['PIbt']);
    $PId14 = mysql_real_escape_string($_POST['PIgsis']);
    $PId15 = mysql_real_escape_string($_POST['PIpi']);
    $PId16 = mysql_real_escape_string($_POST['PIph']);
    $PId17 = mysql_real_escape_string($_POST['PIsss']);
    $PId19 = mysql_real_escape_string($_POST['PIrzip']);
//    $PId20 = mysql_real_escape_string($_POST['PIrtellno']);
    $PId22 = mysql_real_escape_string($_POST['PIpzip']);
    $PId23 = mysql_real_escape_string($_POST['PIptellno']);
    $PId24 = mysql_real_escape_string($_POST['PIemail']);
    $PId25 = mysql_real_escape_string($_POST['PIcpno']);
    $PId26 = mysql_real_escape_string($_POST['PIaeno']);
    $PId27 = mysql_real_escape_string($_POST['PItin']);
    $PId28 = mysql_real_escape_string($_POST['PIspecify']);
    $PId29 = mysql_real_escape_string($_POST['state']);
    $PId30 = mysql_real_escape_string($_POST['city']);
    $PId31 = mysql_real_escape_string($_POST['barangay']);
    $PId32 = mysql_real_escape_string($_POST['state2']);
    $PId33 = mysql_real_escape_string($_POST['city2']);
    $PId34 = mysql_real_escape_string($_POST['barangay2']);
    $PId35 = mysql_real_escape_string($_POST['street']);
    $PId35b = mysql_real_escape_string($_POST['subvil']);
    $PId35c = mysql_real_escape_string($_POST['house']);
    $PId36 = mysql_real_escape_string($_POST['street2']);
    $PId36b = mysql_real_escape_string($_POST['subvil2']);
    $PId36c = mysql_real_escape_string($_POST['house2']);
//    $PIpos = mysql_real_escape_string($_POST['position']);

    date_default_timezone_set('Asia/Manila');
    $PIdob = date("Y-m-d", strtotime($PId6));
    if (isset($_POST['PIcs'])) {
        if ($PId9 == 'Others') {
            $PId0 = $PId28;
        } elseif ($PId9 != 'Others') {
            $PId0 = $PId9;
        }
    }

    if (!isset($_POST['PIsoa'])) {
        $PId0b = "N/A";
    }if (!isset($_POST['PIsex'])) {
        $PId8 = "N/A";
    }if (!isset($_POST['PIcs'])) {
        $PId0 = "N/A";
    }
//    if (empty($_POST['position'])) {
//        $PIpos = "N/A";
//    }
    if (empty($_POST['PIsname'])) {
        $PId2 = "N/A";
    }if (empty($_POST['PIfname'])) {
        $PId3 = "N/A";
    }if (empty($_POST['PImname'])) {
        $PId4 = "N/A";
    }if (empty($_POST['PInamex'])) {
        $PId5 = "N/A";
    }if (empty($_POST['PIdob'])) {
        $PId6 = "0000-00-00";
    }if (empty($_POST['PIpob'])) {
        $PId7 = "N/A";
    }

    if (!isset($_POST['PIcitizen'])) {
        $PId10 = "N/A";
    }if (!isset($_POST['PIby'])) {
        $PId10b = "N/A";
    }

//    if (empty($_POST['PIcountxt'])) {
//        $PId10c = "N/A";
//    }
    if (empty($_POST['PIcounsel'])) {
        $PId10d = "N/A";
    }if (empty($_POST['PIheight'])) {
        $PId11 = "N/A";
    }if (empty($_POST['PIweight'])) {
        $PId12 = "N/A";
    }if (empty($_POST['PIbt'])) {
        $PId13 = "N/A";
    }if (empty($_POST['PIgsis'])) {
        $PId14 = "N/A";
    }if (empty($_POST['PIpi'])) {
        $PId15 = "N/A";
    }if (empty($_POST['PIph'])) {
        $PId16 = "N/A";
    }if (empty($_POST['PIsss'])) {
        $PId17 = "N/A";
    }if (empty($_POST['PIrzip'])) {
        $PId19 = 0;
    }
//    if (empty($_POST['PIrtellno'])) {
//        $PId20 = "N/A";
//    }
    if (empty($_POST['PIpzip'])) {
        $PId22 = 0;
    }if (empty($_POST['PIptellno'])) {
        $PId23 = "N/A";
    }if (empty($_POST['PIemail'])) {
        $PId24 = "N/A";
    }if (empty($_POST['PIcpno'])) {
        $PId25 = "N/A";
    }if (empty($_POST['PIaeno'])) {
        $PId26 = "N/A";
    }if (empty($_POST['PItin'])) {
        $PId27 = "N/A";
    }if (empty($_POST['PIspecify'])) {
        $PId28 = "N/A";
    }

    if (empty($_POST['state'])) {
        $PId29 = 0;
    }if (empty($_POST['city'])) {
        $PId30 = 0;
    }if (empty($_POST['barangay'])) {
        $PId31 = 0;
    }if (empty($_POST['state2'])) {
        $PId32 = 0;
    }if (empty($_POST['city2'])) {
        $PId33 = 0;
    }if (empty($_POST['barangay2'])) {
        $PId34 = 0;
    }if (empty($_POST['street'])) {
        $PId35 = 'N/A';
    }if (empty($_POST['subvil'])) {
        $PId35b = 'N/A';
    }if (empty($_POST['house'])) {
        $PId35c = 'N/A';
    }
    if (empty($_POST['street2'])) {
        $PId36 = 'N/A';
    }if (empty($_POST['subvil2'])) {
        $PId36b = 'N/A';
    }if (empty($_POST['house2'])) {
        $PId36c = 'N/A';
    }


    $id2 = $_SESSION['INTRA_PDS_ID'];

    $query = mysql_query("Update table_empinfo set Employee_Id = '$PId1', Firstname = '$PId3', Middlename = '$PId4', Lastname = '$PId2', NameExt = '$PId5', DateOfBirth = '$PIdob', PlaceOfBirth = '$PId7', Sex = '$PId8',"
            . "                                    CivilStatus = '$PId0', Citizenship = '$PId10', Citizenship_by = '$PId10b', Citizenship_country = '$PId10d', Height = '$PId11', Weight = '$PId12', BloodType = '$PId13', GSIS = '$PId14', PAGIBIG = '$PId15', PHILHEALTH = '$PId16',"
            . "                                    SSS = '$PId17', RA_province = '$PId29', RA_city = '$PId30', RA_barangay = '$PId31', RA_street = '$PId35', RA_subvil = '$PId35b', RA_house = '$PId35c', RZipCode = '$PId19', PA_province = '$PId32', PA_city = '$PId33', PA_barangay = '$PId34', PA_street = '$PId36', PA_subvil = '$PId36b', PA_house = '$PId36c', PZipCode = '$PId22', PTelephoneNo = '$PId23',"
            . "                                    Email = '$PId24', CellphoneNo = '$PId25', AgencyEmpNo = '$PId26', TIN = '$PId27', Status_ofappointment = '$PId0b' WHERE Id = '$id2'") or die(mysql_error());


    //var_dump($query);
    //Family Background

    $query0 = mysql_query("SELECT Id FROM table_empinfo ORDER BY Id DESC LIMIT 1;") or die(mysql_error());
    $row0 = mysql_fetch_assoc($query0);
    $pdsId = $row0['Id'];

    $FBd1 = mysql_real_escape_string($_POST['FBssname']);
    $FBd2 = mysql_real_escape_string($_POST['FBsfname']);
    $FBd3 = mysql_real_escape_string($_POST['FBsmname']);
    $FBd3b = mysql_real_escape_string($_POST['FBsnameext']);
    $FBd4 = mysql_real_escape_string($_POST['FBocc']);
    $FBd5 = mysql_real_escape_string($_POST['FBebn']);
    $FBd6 = mysql_real_escape_string($_POST['FBbusadd']);
    $FBd7 = mysql_real_escape_string($_POST['FBtellno']);
    $FBd8 = mysql_real_escape_string($_POST['FBfsname']);
    $FBd9 = mysql_real_escape_string($_POST['FBffname']);
    $FBd10 = mysql_real_escape_string($_POST['FBfmname']);
    $FBd10b = mysql_real_escape_string($_POST['FBfnameext']);
    $FBd12 = mysql_real_escape_string($_POST['FBmsname']);
    $FBd13 = mysql_real_escape_string($_POST['FBmfname']);
    $FBd14 = mysql_real_escape_string($_POST['FBmmname']);

    if (empty($_POST['FBssname'])) {
        $FBd1 = "N/A";
    }if (empty($_POST['FBsfname'])) {
        $FBd2 = "N/A";
    }if (empty($_POST['FBsmname'])) {
        $FBd3 = "N/A";
    }if (empty($_POST['FBsnameext'])) {
        $FBd3b = "N/A";
    }if (empty($_POST['FBocc'])) {
        $FBd4 = "N/A";
    }if (empty($_POST['FBebn'])) {
        $FBd5 = "N/A";
    }if (empty($_POST['FBbusadd'])) {
        $FBd6 = "N/A";
    }if (empty($_POST['FBtellno'])) {
        $FBd7 = "N/A";
    }if (empty($_POST['FBfsname'])) {
        $FBd8 = "N/A";
    }if (empty($_POST['FBffname'])) {
        $FBd9 = "N/A";
    }if (empty($_POST['FBfmname'])) {
        $FBd10 = "N/A";
    }if (empty($_POST['FBfnameext'])) {
        $FBd10b = "N/A";
    }if (empty($_POST['FBmsname'])) {
        $FBd12 = "N/A";
    }if (empty($_POST['FBmfname'])) {
        $FBd13 = "N/A";
    }if (empty($_POST['FBmmname'])) {
        $FBd14 = "N/A";
    }


    $query2 = mysql_query("Select * from table_empinfofb where Pds_Id = '$id2'") or die(mysql_error());
    $num = mysql_num_rows($query2);
    if ($num == 0) {
        mysql_query("Insert into table_empinfofb (Pds_Id, Spouse_sname, Spouse_fname, Spouse_mname, Spouse_extname, Spouse_occupation, Spouse_empbusname, Spouse_busadd, Spouse_telephone, Father_sname, Father_fname, Father_mname, Father_extname, Mother_sname, Mother_fname, Mother_mname)"
                        . "                                 values ('$id2','$FBd1','$FBd2','$FBd3','$FBd3b','$FBd4','$FBd5','$FBd6','$FBd7','$FBd8','$FBd9','$FBd10','$FBd10b','$FBd12','$FBd13','$FBd14')") or die(mysql_error());
    } elseif ($num != 0) {
        $query2 = mysql_query("Update table_empinfofb set Spouse_sname = '$FBd1', Spouse_fname = '$FBd2', Spouse_mname = '$FBd3', Spouse_extname = '$FBd3b', Spouse_occupation = '$FBd4', Spouse_empbusname = '$FBd5',"
                . "                                       Spouse_busadd = '$FBd6', Spouse_telephone = '$FBd7', Father_sname = '$FBd8', Father_fname = '$FBd9', Father_mname = '$FBd10', Father_extname = '$FBd10b',"
                . "                                       Mother_sname = '$FBd12', Mother_fname = '$FBd13', Mother_mname = '$FBd14' where Pds_Id = '$id2'") or die(mysql_error());
    }
    
    $iCnt = 20;
    for ($i = 1; $i < $iCnt; $i++) {
        if (isset($_POST['FBname' . $i]) && isset($_POST['FBdob' . $i])) {
            $name = mysql_real_escape_string($_POST['FBname' . $i]);
            $date = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['FBdob' . $i])));

            date_default_timezone_set('Asia/Manila');
            $PIdob = date("Y-m-d", strtotime($date));

            if (empty($_POST['FBname' . $i])) {
                $name = "N/A";
            }if (empty($_POST['FBdob' . $i])) {
                $PIdob = "0000-00-00";
            }

            mysql_query("insert into table_empinfofbchild (Pds_Id, Name_ofchild, Date_ofbirth) values ('$id2','$name','$PIdob')") or die(mysql_error());
        }
    }

//Work Experience
    $iCnt21 = 21;
    for ($i2 = 1; $i2 < $iCnt21; $i2++) {
        if (isset($_POST['WEfrom' . $i2]) && isset($_POST['WEto' . $i2]) && isset($_POST['WEpt' . $i2]) && isset($_POST['WEdaoc' . $i2]) && isset($_POST['WEms' . $i2]) && isset($_POST['WEsg' . $i2]) && isset($_POST['WEsoa' . $i2]) && isset($_POST['WEgs' . $i2])) {

            $WEd1 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['WEfrom' . $i2])));
            $WEd2 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['WEto' . $i2])));
            $WEd3 = mysql_real_escape_string($_POST['WEpt' . $i2]);
            $WEd4 = mysql_real_escape_string($_POST['WEdaoc' . $i2]);
            $WEd5 = mysql_real_escape_string($_POST['WEms' . $i2]);
            $WEd6 = mysql_real_escape_string($_POST['WEsg' . $i2]);
            $WEd7 = mysql_real_escape_string($_POST['WEsoa' . $i2]);
            $WEd8 = mysql_real_escape_string($_POST['WEgs' . $i2]);

            date_default_timezone_set('Asia/Manila');

            if (empty($_POST['WEfrom' . $i2])) {
                $WEd1 = "";
            } else {
                $WEd1 = date('Y-m-d', strtotime($_POST['WEfrom' . $i2]));
            }

            if (!empty($_POST['WEto' . $i2]) && !isset($_POST['WEpre' . $i2])) {
                $WEd2 = date('Y-m-d', strtotime($_POST['WEto' . $i2]));
            } elseif (isset($_POST['WEpre' . $i2])) {
                $WEd2 = '1910-01-01';
            } elseif (empty($_POST['WEto' . $i2]) && !isset($_POST['WEpre' . $i2])) {
                $WEd2 = "";
            } else {
                $WEd2 = date('Y-m-d', strtotime($_POST['WEto' . $i2]));
            }
            
            if (empty($_POST['WEpt' . $i2])) {
                $WEd3 = "N/A";
            }if (empty($_POST['WEdaoc' . $i2])) {
                $WEd4 = "N/A";
            }if (empty($_POST['WEms' . $i2])) {
                $WEd5 = "N/A";
            }if (empty($_POST['WEsg' . $i2])) {
                $WEd6 = "N/A";
            }if (empty($_POST['WEsoa' . $i2])) {
                $WEd7 = "N/A";
            }if (empty($_POST['WEgs' . $i2])) {
                $WEd8 = "N/A";
            }
            
            mysql_query("insert into table_empinfowe (Pds_Id, Inclusive_from, Inclusive_to, Position, Department_agencyoffice, Monthly_salary, Salary_grade, Status_ofappointment, Gov_service) "
                            . "                       values ('$id2','$WEd1','$WEd2','$WEd3','$WEd4','$WEd5','$WEd6','$WEd7','$WEd8')") or die(mysql_error());
        }
    }

//Civil Service
    
    $iCnt4 = 20;
    for ($i4 = 1; $i4 < $iCnt4; $i4++) {
        if (isset($_POST['CScareer' . $i4]) && isset($_POST['CSrating' . $i4]) && isset($_POST['CSdoeTo' . $i4]) && isset($_POST['CSdoeFrom' . $i4]) && isset($_POST['CSpoe' . $i4]) && isset($_POST['CSnumber' . $i4]) && isset($_POST['CSdate' . $i4])) {

            $CSd1 = mysql_real_escape_string($_POST['CScareer' . $i4]);
            $CSd2 = mysql_real_escape_string($_POST['CSrating' . $i4]);
            $CSd3 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['CSdoeTo' . $i4])));
            $CSd3b = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['CSdoeFrom' . $i4])));
            $CSd4 = mysql_real_escape_string($_POST['CSpoe' . $i4]);
            $CSd5 = mysql_real_escape_string($_POST['CSnumber' . $i4]);
            $CSd6 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['CSdate' . $i4])));

            date_default_timezone_set('Asia/Manila');
            $CSdoe = date("Y-m-d", strtotime($CSd3));
            $CSdate = date("Y-m-d", strtotime($CSd6));

            if (empty($_POST['CScareer' . $i4])) {
                $CSd1 = "N/A";
            }if (empty($_POST['CSrating' . $i4])) {
                $CSd2 = 0;
            }if (empty($_POST['CSdoeTo' . $i4])) {
                $CSd3 = "N/A";
            }if (empty($_POST['CSdoeFrom' . $i4])) {
                $CSd3b = "N/A";
            }if (empty($_POST['CSpoe' . $i4])) {
                $CSd4 = "N/A";
            }if (empty($_POST['CSnumber' . $i4])) {
                $CSd5 = "N/A";
            }if (empty($_POST['CSdate' . $i4])) {
                $CSd6 = "0000-00-00";
            }
            
            $CSd3c = $CSd3 . ' ' . $CSd3b;

            if (isset($_FILES['CSupload' . $i4]['name'])) {
                $CSdir = ucwords($PId2) . ucwords($PId3);

                if (!is_dir("upload/" . $CSdir . "/")) {
                    mkdir("upload/" . $CSdir . "/");
                }

                $CStarget_dir = "upload/" . $CSdir . "/";
                $CStarget_file = $CStarget_dir . basename($_FILES["CSupload" . $i4]["name"]);
                $CSuploadOk = 1;
                $CSimageFileType = pathinfo($CStarget_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                $CScheck = getimagesize($_FILES["CSupload" . $i4]["tmp_name"]);
                if ($CScheck !== false) {
                    $CSuploadOk = 1;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("File is not an image.")';
                    echo '</script>';
                    $CSuploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($CStarget_file)) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, file already exists.")';
                    echo '</script>';
                    $CSuploadOk = 0;
                }
                // Check file size
                if ($_FILES["CSupload" . $i4]["size"] > 500000) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, your file is too large.")';
                    echo '</script>';
                    $CSuploadOk = 0;
                }
                // Allow certain file formats
                if ($CSimageFileType != "JPG" && $CSimageFileType != "jpg" && $CSimageFileType != "PNG" && $CSimageFileType != "png" && $CSimageFileType != "JPEG" && $CSimageFileType != "jpeg" && $CSimageFileType != "GIF" && $CSimageFileType != "gif") {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
                    echo '</script>';
                    $CSuploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($CSuploadOk == 0) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, your file was not uploaded.")';
                    echo '</script>';
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["CSupload" . $i4]["tmp_name"], $CStarget_file)) {
                        mysql_query("insert into table_empinfocs (Pds_Id, Career_service, Rating, Date_ofexam, Place_ofexam, Number, Date_ofrelease) "
                                        . "                       values ('$id2','$CSd1','$CSd2','$CSd3c','$CSd4','$CSd5','$CSd6')") or die(mysql_error()) or die(mysql_error());
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Sorry, there was an error uploading your file.")';
                        echo '</script>';
                    }
                }
            } elseif (!isset($_FILES['CSupload' . $i4]['name'])) {

                mysql_query("insert into table_empinfocs (Pds_Id, Career_service, Rating, Date_ofexam, Place_ofexam, Number, Date_ofrelease) "
                                . "                       values ('$id2','$CSd1','$CSd2','$CSd3c','$CSd4','$CSd5','$CSd6')") or die(mysql_error()) or die(mysql_error());
            }
        }
    }

    //Voluntary Work

    $iCnt5 = 20;
    for ($i5 = 1; $i5 < $iCnt5; $i5++) {
        if (isset($_POST['VWnameadd' . $i5]) && isset($_POST['VWfrom' . $i5]) && isset($_POST['VWto' . $i5]) && isset($_POST['VWnof' . $i5]) && isset($_POST['VWpos' . $i5])) {

            $VWd1 = mysql_real_escape_string($_POST['VWnameadd' . $i5]);
            $VWd2 = mysql_real_escape_string($_POST['VWfrom' . $i5]);
            $VWd3 = mysql_real_escape_string($_POST['VWto' . $i5]);
            $VWd4 = mysql_real_escape_string($_POST['VWnof' . $i5]);
            $VWd5 = mysql_real_escape_string($_POST['VWpos' . $i5]);

            date_default_timezone_set('Asia/Manila');
            $VWfrom = date("Y-m-d", strtotime($VWd2));
            $VWto = date("Y-m-d", strtotime($VWd3));

            if (empty($_POST['VWnameadd' . $i5])) {
                $VWd1 = "N/A";
            }if (empty($_POST['VWfrom' . $i5])) {
                $VWd2 = "N/A";
            }if (empty($_POST['VWto' . $i5])) {
                $VWd3 = "N/A";
            }if (empty($_POST['VWnof' . $i5])) {
                $VWd4 = 0;
            }if (empty($_POST['VWpos' . $i5])) {
                $VWd5 = "N/A";
            }

            if (isset($_FILES['VWupload' . $i5]['name'])) {

                $VWdir = ucwords($PId2) . ucwords($PId3);

                if (!is_dir("upload/" . $VWdir . "/")) {
                    mkdir("upload/" . $VWdir . "/");
                }

                $VWtarget_dir = "upload/" . $VWdir . "/";
                $VWtarget_file = $VWtarget_dir . basename($_FILES["VWupload" . $i5]["name"]);
                $VWuploadOk = 1;
                $VWimageFileType = pathinfo($VWtarget_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                $VWcheck = getimagesize($_FILES["VWupload" . $i5]["tmp_name"]);
                if ($VWcheck !== false) {
                    $VWuploadOk = 1;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("File is not an image.")';
                    echo '</script>';
                    $VWuploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($VWtarget_file)) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, file already exists.")';
                    echo '</script>';
                    $VWuploadOk = 0;
                }
                // Check file size
                if ($_FILES["VWupload" . $i5]["size"] > 500000) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, your file is too large.")';
                    echo '</script>';
                    $VWuploadOk = 0;
                }
                // Allow certain file formats
                if ($VWimageFileType != "JPG" && $VWimageFileType != "jpg" && $VWimageFileType != "PNG" && $VWimageFileType != "png" && $VWimageFileType != "JPEG" && $VWimageFileType != "jpeg" && $VWimageFileType != "GIF" && $VWimageFileType != "gif") {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
                    echo '</script>';
                    $VWuploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($VWuploadOk == 0) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, your file was not uploaded.")';
                    echo '</script>';
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["VWupload" . $i5]["tmp_name"], $VWtarget_file)) {
                        mysql_query("insert into table_empinfovw (Pds_Id, Nameadd, Inclusive_from, Inclusive_to, Number_ofhours, Position) "
                                        . "                            values ('$id2','$VWd1','$VWd2','$VWd3','$VWd4','$VWd5')") or die(mysql_error());
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Sorry, there was an error uploading your file.")';
                        echo '</script>';
                    }
                }
            } elseif (!isset($_FILES['VWupload' . $i5]['name'])) {
                mysql_query("insert into table_empinfovw (Pds_Id, Nameadd, Inclusive_from, Inclusive_to, Number_ofhours, Position) "
                                . "                            values ('$id2','$VWd1','$VWd2','$VWd3','$VWd4','$VWd5')") or die(mysql_error());
            }
        }
    }

    //Training Program

    $iCnt2 = 21;
    for ($i6 = 1; $i6 < $iCnt2; $i6++) {
        if (isset($_POST['TPcat' . $i6]) && isset($_POST['TPtos' . $i6]) && isset($_POST['TPfrom' . $i6]) && isset($_POST['TPto' . $i6]) && isset($_POST['TPnoh' . $i6]) && isset($_POST['TPld' . $i6]) && isset($_POST['TPconducted' . $i6])) {

            $TPd0 = mysql_real_escape_string($_POST['TPcat' . $i6]);
            $TPd1 = mysql_real_escape_string($_POST['TPtos' . $i6]);
            $TPd2 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['TPfrom' . $i6])));
            $TPd3 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['TPto' . $i6])));
            $TPd4 = mysql_real_escape_string($_POST['TPnoh' . $i6]);
            $TPd5 = mysql_real_escape_string($_POST['TPconducted' . $i6]);
            $TPd6 = mysql_real_escape_string($_POST['TPld' . $i6]);

            date_default_timezone_set('Asia/Manila');
            $TPfrom = date("Y-m-d", strtotime($TPd2));
            $TPto = date("Y-m-d", strtotime($TPd3));

            if (empty($_POST['TPcat' . $i6])) {
                $TPd0 = "N/A";
            }if (empty($_POST['TPtos' . $i6])) {
                $TPd1 = "N/A";
            }if (empty($_POST['TPfrom' . $i6])) {
                $TPd2 = "0000-00-00";
            }if (empty($_POST['TPto' . $i6])) {
                $TPd3 = "0000-00-00";
            }if (empty($_POST['TPnoh' . $i6])) {
                $TPd4 = 0;
            }if (empty($_POST['TPconducted' . $i6])) {
                $TPd5 = "N/A";
            }if (empty($_POST['TPld' . $i6])) {
                $TPd6 = "N/A";
            }

            if (isset($_FILES['TPupload' . $i6]['name'])) {

                $TPdir = ucwords($PId2) . ucwords($PId3);

                if (!is_dir("upload/" . $TPdir . "/")) {
                    mkdir("upload/" . $TPdir . "/");
                }

                $TPtarget_dir = "upload/" . $TPdir . "/";
                $TPtarget_file = $TPtarget_dir . basename($_FILES["TPupload" . $i6]["name"]);
                $TPuploadOk = 1;
                $TPimageFileType = pathinfo($TPtarget_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                $TPcheck = getimagesize($_FILES["TPupload" . $i6]["tmp_name"]);
                if ($TPcheck !== false) {
                    $TPuploadOk = 1;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("File is not an image.")';
                    echo '</script>';
                    $TPuploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($TPtarget_file)) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, file already exists.")';
                    echo '</script>';
                    $TPuploadOk = 0;
                }
                // Check file size
                if ($_FILES["TPupload" . $i6]["size"] > 500000) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, your file is too large.")';
                    echo '</script>';
                    $TPuploadOk = 0;
                }
                // Allow certain file formats
                if ($TPimageFileType != "JPG" && $TPimageFileType != "jpg" && $TPimageFileType != "PNG" && $TPimageFileType != "png" && $TPimageFileType != "JPEG" && $TPimageFileType != "jpeg" && $TPimageFileType != "GIF" && $TPimageFileType != "gif") {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
                    echo '</script>';
                    $TPuploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($TPuploadOk == 0) {
                    echo '<script language="javascript">';
                    echo 'alert("Sorry, your file was not uploaded.")';
                    echo '</script>';
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["TPupload" . $i6]["tmp_name"], $TPtarget_file)) {
                        mysql_query("insert into table_empinfotp (Pds_Id, Category, Title_ofseminar, Inclusive_from, Inclusive_to, Number_ofhours, LD_type, Sponsored_by) "
                                        . "                            values ('$id2','$TPd0','$TPd1','$TPd2','$TPd3','$TPd4','$TPd6','$TPd5')") or die(mysql_error());
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("Sorry, there was an error uploading your file.")';
                        echo '</script>';
                    }
                }
            } elseif (!isset($_FILES['TPupload' . $i6]['name'])) {
                mysql_query("insert into table_empinfotp (Pds_Id, Category, Title_ofseminar, Inclusive_from, Inclusive_to, Number_ofhours, LD_type, Sponsored_by) "
                                . "                            values ('$id2','$TPd0','$TPd1','$TPd2','$TPd3','$TPd4','$TPd6','$TPd5')") or die(mysql_error());
            }
        }
    }

    //Educational Background
    $iCnt7 = 20;
    for ($i7 = 1; $i7 < $iCnt7; $i7++) {
        if (isset($_POST['EBlevel' . $i7]) && isset($_POST['EBname' . $i7]) && isset($_POST['EBdegree' . $i7]) && isset($_POST['EBzyear' . $i7]) && isset($_POST['EBhighest' . $i7]) && isset($_POST['EBfrom' . $i7]) && isset($_POST['EBto' . $i7]) && isset($_POST['EBscholar' . $i7])) {
            $EBd0 = mysql_real_escape_string($_POST['EBlevel' . $i7]);
            $EBd1 = mysql_real_escape_string($_POST['EBname' . $i7]);
            $EBd2 = mysql_real_escape_string($_POST['EBdegree' . $i7]);
            $EBd3 = mysql_real_escape_string($_POST['EBzyear' . $i7]);
            $EBd4 = mysql_real_escape_string($_POST['EBhighest' . $i7]);
            $EBd5 = mysql_real_escape_string($_POST['EBfrom' . $i7]);
            $EBd6 = mysql_real_escape_string($_POST['EBto' . $i7]);
            $EBd7 = mysql_real_escape_string($_POST['EBscholar' . $i7]);
            
            if (empty($_POST['EBlevel' . $i7])) {
                $EBd0 = "N/A";
            }if (empty($_POST['EBname' . $i7])) {
                $EBd1 = "N/A";
            }if (empty($_POST['EBdegree' . $i7])) {
                $EBd2 = "N/A";
            }if (empty($_POST['EBzyear' . $i7])) {
                $EBd3 = "N/A";
            }if (empty($_POST['EBhighest' . $i7])) {
                $EBd4 = "N/A";
            }if (empty($_POST['EBfrom' . $i7])) {
                $EBd5 = "N/A";
            }if (empty($_POST['EBto' . $i7])) {
                $EBd6 = "N/A";
            }if (empty($_POST['EBscholar' . $i7])) {
                $EBd7 = "N/A";
            }

            $query3 = mysql_query("insert into table_empinfoeb (Pds_Id, Level, Name, Degree, Year, Highest, Date_from, Date_to, Scholar)"
                    . "                                 values ('$id2','$EBd0','$EBd1','$EBd2','$EBd3','$EBd4','$EBd5','$EBd6','$EBd7')") or die(mysql_error());
        }
    }

    //Other Information
    if (isset($_POST['OI1'])) {
        $OId1 = mysql_real_escape_string($_POST['OI1']);
    }if (isset($_POST['OI2'])) {
        $OId2 = mysql_real_escape_string($_POST['OI2']);
    }if (isset($_POST['OI3'])) {
        $OId3 = mysql_real_escape_string($_POST['OI3']);
    }if (isset($_POST['OI4'])) {
        $OId4 = mysql_real_escape_string($_POST['OI4']);
    }if (isset($_POST['OI5'])) {
        $OId5 = mysql_real_escape_string($_POST['OI5']);
    }if (isset($_POST['OI6'])) {
        $OId6 = mysql_real_escape_string($_POST['OI6']);
    }if (isset($_POST['OI7'])) {
        $OId7 = mysql_real_escape_string($_POST['OI7']);
    }if (isset($_POST['OI8'])) {
        $OId8 = mysql_real_escape_string($_POST['OI8']);
    }if (isset($_POST['OI9'])) {
        $OId9 = mysql_real_escape_string($_POST['OI9']);
    }if (isset($_POST['OI10'])) {
        $OId10 = mysql_real_escape_string($_POST['OI10']);
    }if (isset($_POST['OI11'])) {
        $OId10a = mysql_real_escape_string($_POST['OI11']);
    }if (isset($_POST['OI12'])) {
        $OId10b = mysql_real_escape_string($_POST['OI12']);
    }

    $OId11 = mysql_real_escape_string($_POST['OIname']);
    $OId12 = mysql_real_escape_string($_POST['OIaddress']);
    $OId13 = mysql_real_escape_string($_POST['OItellno']);
    $OId14 = mysql_real_escape_string($_POST['OIname2']);
    $OId15 = mysql_real_escape_string($_POST['OIaddress2']);
    $OId16 = mysql_real_escape_string($_POST['OItellno2']);
    $OId17 = mysql_real_escape_string($_POST['OIname3']);
    $OId18 = mysql_real_escape_string($_POST['OIaddress3']);
    $OId19 = mysql_real_escape_string($_POST['OItellno3']);
    //$OId20 = $_POST['OIphoto'];
    $OId21 = mysql_real_escape_string($_POST['OIctc']);
    $OId22 = mysql_real_escape_string($_POST['OIia']);
    $OId23 = mysql_real_escape_string($_POST['OIio']);
    $OId24 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['OIdate'])));
    $OId25 = mysql_real_escape_string($_POST['OI1details']);
    $OId26 = mysql_real_escape_string($_POST['OI2details']);
    $OId27 = mysql_real_escape_string($_POST['OI3details']);
    $OId28 = mysql_real_escape_string($_POST['OI4details']);
    $OId29 = mysql_real_escape_string($_POST['OI5details']);
    $OId30 = mysql_real_escape_string($_POST['OI6details']);
    $OId31 = mysql_real_escape_string($_POST['OI7details']);
    $OId32 = mysql_real_escape_string($_POST['OI8details']);
    $OId33 = mysql_real_escape_string($_POST['OI9details']);
    $OId34 = mysql_real_escape_string($_POST['OI10details']);
    $OId35 = mysql_real_escape_string($_POST['OI11details']);
    $OId36 = mysql_real_escape_string($_POST['OI12details']);

    date_default_timezone_set('Asia/Manila');
    $OIio = date("Y-m-d", strtotime($OId23));
    $OIdate = date("Y-m-d", strtotime($OId24));

    if (!isset($_POST['OI1'])) {
        $OId1 = "N/A";
    }if (!isset($_POST['OI2'])) {
        $OId2 = "N/A";
    }if (!isset($_POST['OI3'])) {
        $OId3 = "N/A";
    }if (!isset($_POST['OI4'])) {
        $OId4 = "N/A";
    }if (!isset($_POST['OI5'])) {
        $OId5 = "N/A";
    }if (!isset($_POST['OI6'])) {
        $OId6 = "N/A";
    }if (!isset($_POST['OI7'])) {
        $OId7 = "N/A";
    }if (!isset($_POST['OI8'])) {
        $OId8 = "N/A";
    }if (!isset($_POST['OI9'])) {
        $OId9 = "N/A";
    }if (!isset($_POST['OI10'])) {
        $OId10 = "N/A";
    }if (!isset($_POST['OI11'])) {
        $OId10a = "N/A";
    }if (!isset($_POST['OI12'])) {
        $OId10b = "N/A";
    }

    if (empty($_POST['OIname'])) {
        $OId11 = "N/A";
    }if (empty($_POST['OIaddress'])) {
        $OId12 = "N/A";
    }if (empty($_POST['OItellno'])) {
        $OId13 = "N/A";
    }if (empty($_POST['OIname2'])) {
        $OId14 = "N/A";
    }if (empty($_POST['OIaddress2'])) {
        $OId15 = "N/A";
    }if (empty($_POST['OItellno2'])) {
        $OId16 = "N/A";
    }if (empty($_POST['OIname3'])) {
        $OId17 = "N/A";
    }if (empty($_POST['OIaddress3'])) {
        $OId18 = "N/A";
    }if (empty($_POST['OItellno3'])) {
        $OId19 = "N/A";
    }if (empty($_POST['OIctc'])) {
        $OId21 = "N/A";
    }if (empty($_POST['OIia'])) {
        $OId22 = "N/A";
    }if (empty($_POST['OIio'])) {
        $OId23 = "N/A";
    }if (empty($_POST['OIdate'])) {
        $OId24 = "0000/00/00";
    }if (empty($_POST['OI1details'])) {
        $OId25 = "N/A";
    }if (empty($_POST['OI2details'])) {
        $OId26 = "N/A";
    }if (empty($_POST['OI3details'])) {
        $OId27 = "N/A";
    }if (empty($_POST['OI4details'])) {
        $OId28 = "N/A";
    }if (empty($_POST['OI5details'])) {
        $OId29 = "N/A";
    }if (empty($_POST['OI6details'])) {
        $OId30 = "N/A";
    }if (empty($_POST['OI7details'])) {
        $OId31 = "N/A";
    }if (empty($_POST['OI8details'])) {
        $OId32 = "N/A";
    }if (empty($_POST['OI9details'])) {
        $OId33 = "N/A";
    }if (empty($_POST['OI10details'])) {
        $OId34 = "N/A";
    }if (empty($_POST['OI11details'])) {
        $OId35 = "N/A";
    }if (empty($_POST['OI12details'])) {
        $OId36 = "N/A";
    }

    if ($_FILES['OIphoto']['name'] != '') {

        $dir = ucwords($PId2) . ucwords($PId3);

        if (!is_dir("../../Emp_Prof_Pic/" . $dir . "/")) {
            mkdir("../../Emp_Prof_Pic/" . $dir . "/");
        }

        $target_dir = "../../Emp_Prof_Pic/" . $dir . "/";
        $target_dir2 = "../Emp_Prof_Pic/" . $dir . "/";
        $base = $_FILES["OIphoto"]["name"];
        $target_file = $target_dir2 . rawurlencode($base);
        $target_file2 = $target_dir . $base;

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file2, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["OIphoto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script language="javascript">';
            echo 'alert("File is not an image.")';
            echo '</script>';
            $uploadOk = 0;
        }

// Check if file already exists
        if (file_exists($target_file2)) {
            echo '<script language="javascript">';
            echo 'alert("Sorry, file already exists.")';
            echo '</script>';
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["OIphoto"]["size"] > 5242880) {
            echo '<script language="javascript">';
            echo 'alert("Sorry, your file is too large.")';
            echo '</script>';
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "png" && $imageFileType != "JPEG" && $imageFileType != "jpeg" && $imageFileType != "GIF" && $imageFileType != "gif") {
            echo '<script language="javascript">';
            echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
            echo '</script>';
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo '<script language="javascript">';
            echo 'alert("Sorry, your file was not uploaded.")';
            echo '</script>';
            $target_dir = "../../Emp_Prof_Pic/" . $dir . "/";
// if everything is ok, try to upload file
        } else {
            $se = mysql_query("select * from table_empinfooi where Pds_Id = '$id2'") or die(mysql_error());
            $rowPic = mysql_fetch_assoc($se);
            if ($rowPic['Photo'] == '') {
                
            } else {
                if (file_exists("../" . rawurldecode($rowPic['Photo']))) {
                    unlink("../" . rawurldecode($rowPic['Photo']));
                }
            }
            if (move_uploaded_file($_FILES["OIphoto"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/Emp_Prof_Pic/' . $dir . "/" . $_FILES['OIphoto']['name'])) {
                $query11 = mysql_query("Select * from table_empinfooi where Pds_Id = '$id2'") or die(mysql_error());
                $num1 = mysql_num_rows($query11);
                if ($num1 != 0) {
                    $q = mysql_query("Update table_empinfooi set Que34_a = '$OId1', Que34_b = '$OId2', Que35_a = '$OId3', Que35_b = '$OId4', Que36 = '$OId5', Que37 = '$OId6', Que38_a = '$OId7', Que38_b = '$OId8', Que39 = '$OId9', Que40_a = '$OId10', Que40_b = '$OId10a', Que40_c = '$OId10b',"
                            . "                                       Details1 = '$OId25', Details2 = '$OId26', Details3 = '$OId27', Details4 = '$OId28', Details5 = '$OId29', Details6 = '$OId30', Details7 = '$OId31', Details8 = '$OId32', Details9 = '$OId33', Details10 = '$OId34', Details11 = '$OId35', Details12 = '$OId36',"
                            . "                                       Name = '$OId11', Address = '$OId12', Telephone = '$OId13', Name2 = '$OId14', Address2 = '$OId15', Telephone2 = '$OId16', Name3 = '$OId17', Address3 = '$OId18', Telephone3 = '$OId19', Photo = '$target_file',"
                            . "                                       Gov_ID = '$OId21', ID_No = '$OId22', Issuance = '$OId23', Date_acc = '$OIdate' where Pds_Id = '$id2'") or die(mysql_error());
                } elseif ($num1 == 0) {
                    $w = mysql_query("insert into table_empinfooi (Pds_Id, Que34_a, Que34_b, Que35_a, Que35_b, Que36, Que37, Que38_a, Que38_b, Que39, Que40_a, Que40_b, Que40_c,"
                            . "                                         Details1, Details2, Details3, Details4, Details5, Details6, Details7, Details8, Details9, Details10, Details11, Details12,"
                            . "                                         Name, Address, Telephone, Name2, Address2, Telephone2, Name3, Address3, Telephone3, Photo, Gov_ID, ID_No, Issuance, Date_acc)"
                            . "                                 values ('$id2','$OId1','$OId2','$OId3','$OId4','$OId5','$OId6','$OId7','$OId8','$OId9','$OId10','$OId10a','$OId10b',"
                            . "                                         '$OId25','$OId26','$OId27','$OId28','$OId29','$OId30','$OId31','$OId32','$OId33','$OId34','$OId35','$OId36',"
                            . "                                         '$OId11','$OId12','$OId13','$OId14','$OId15','$OId16',"
                            . "                                         '$OId17','$OId18','$OId19','$target_file','$OId21','$OId22','$OId23','$OId24')") or die(mysql_error());
                }
            } else {
                echo '<script language="javascript">';
                echo 'alert("Sorry, there was an error uploading your file.")';
                echo '</script>';
            }
        }
    } elseif ($_FILES['OIphoto']['name'] == '') {

        $query12 = mysql_query("Select * from table_empinfooi where Pds_Id = '$id2'") or die(mysql_error());
        $num2 = mysql_num_rows($query12);
        if ($num2 != 0) {
            $query4 = mysql_query("Update table_empinfooi set Que34_a = '$OId1', Que34_b = '$OId2', Que35_a = '$OId3', Que35_b = '$OId4', Que36 = '$OId5', Que37 = '$OId6', Que38_a = '$OId7', Que38_b = '$OId8', Que39 = '$OId9', Que40_a = '$OId10', Que40_b = '$OId10a', Que40_c = '$OId10b',"
                    . "                                       Details1 = '$OId25', Details2 = '$OId26', Details3 = '$OId27', Details4 = '$OId28', Details5 = '$OId29', Details6 = '$OId30', Details7 = '$OId31', Details8 = '$OId32', Details9 = '$OId33', Details10 = '$OId34', Details11 = '$OId35', Details12 = '$OId36',"
                    . "                                       Name = '$OId11', Address = '$OId12', Telephone = '$OId13', Name2 = '$OId14', Address2 = '$OId15', Telephone2 = '$OId16', Name3 = '$OId17', Address3 = '$OId18', Telephone3 = '$OId19',"
                    . "                                       Gov_ID = '$OId21', ID_No = '$OId22', Issuance = '$OId23', Date_acc = '$OIdate' where Pds_Id = '$id2'") or die(mysql_error());
        } elseif ($num2 == 0) {
            mysql_query("insert into table_empinfooi (Pds_Id, Que34_a, Que34_b, Que35_a, Que35_b, Que36, Que37, Que38_a, Que38_b, Que39, Que40_a, Que40_b, Que40_c,"
                            . "                                         Details1, Details2, Details3, Details4, Details5, Details6, Details7, Details8, Details9, Details10, Details11, Details12,"
                            . "                                         Name, Address, Telephone, Name2, Address2, Telephone2, Name3, Address3, Telephone3, Gov_ID, ID_No, Issuance, Date_acc)"
                            . "                                 values ('$id2','$OId1','$OId2','$OId3','$OId4','$OId5','$OId6','$OId7','$OId8','$OId9','$OId10','$OId10a','$OId10b',"
                            . "                                         '$OId25','$OId26','$OId27','$OId28','$OId29','$OId30','$OId31','$OId32','$OId33','$OId34','$OId35','$OId36',"
                            . "                                         '$OId11','$OId12','$OId13','$OId14','$OId15','$OId16',"
                            . "                                         '$OId17','$OId18','$OId19','$OId21','$OId22','$OId23','$OId24')") or die(mysql_error());
        }
    }

    $iCnt3 = 20;
    for ($i3 = 1; $i3 < $iCnt3; $i3++) {
        if (isset($_POST['OIssh' . $i3]) && isset($_POST['OIndr' . $i3]) && isset($_POST['OImao' . $i3])) {
            $OId1 = mysql_real_escape_string($_POST['OIssh' . $i3]);
            $OId2 = mysql_real_escape_string($_POST['OIndr' . $i3]);
            $OId3 = mysql_real_escape_string($_POST['OImao' . $i3]);

            if (empty($_POST['OIssh' . $i3])) {
                $OId1 = "N/A";
            }if (empty($_POST['OIndr' . $i3])) {
                $OId2 = "N/A";
            }if (empty($_POST['OImao' . $i3])) {
                $OId3 = "N/A";
            }

            mysql_query("insert into table_empinfooiskills (Pds_Id, Special_skills, Recognition, Organization) values ('$id2','$OId1','$OId2','$OId3')") or die(mysql_error());
        }
    }
    $ebsql = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id2' order by Id desc limit 1") or die(mysql_error());
    $ebcount = mysql_fetch_assoc($ebsql);

    for ($eb = 1; $eb <= $ebcount['Id']; $eb++) {
        if (isset($_POST['EBuplevel' . $eb]) && $_POST['EBupname' . $eb] && $_POST['EBupdegree' . $eb] && $_POST['EBupyear' . $eb] && $_POST['EBuphighest' . $eb] && $_POST['EBupfrom' . $eb] && $_POST['EBupto' . $eb] && $_POST['EBupscholar' . $eb]) {

            $EBupd1 = mysql_real_escape_string($_POST['EBuplevel' . $eb]);
            $EBupd2 = mysql_real_escape_string($_POST['EBupname' . $eb]);
            //$EBupd3 = mysql_real_escape_string($_POST['EBupba' . $eb]);
            $EBupd4 = mysql_real_escape_string($_POST['EBupdegree' . $eb]);
            $EBupd5 = mysql_real_escape_string($_POST['EBupyear' . $eb]);
            $EBupd6 = mysql_real_escape_string($_POST['EBuphighest' . $eb]);
            $EBupd7 = mysql_real_escape_string($_POST['EBupfrom' . $eb]);
            $EBupd8 = mysql_real_escape_string($_POST['EBupto' . $eb]);
            $EBupd9 = mysql_real_escape_string($_POST['EBupscholar' . $eb]);


            mysql_query("Update table_empinfoeb set Level = '$EBupd1', Name = '$EBupd2', Degree = '$EBupd4', Year = '$EBupd5', Highest = '$EBupd6', Date_from = '$EBupd7', Date_to = '$EBupd8', Scholar = '$EBupd9' where Id = '$eb'") or die(mysql_error());
        }
    }

    $cssql = mysql_query("Select * from table_empinfocs where Pds_Id = '$id2' order by Id desc limit 1") or die(mysql_error());
    $cscount = mysql_fetch_assoc($cssql);

    for ($cs = 1; $cs <= $cscount['Id']; $cs++) {
        if (isset($_POST['CSupcareer' . $cs]) && $_POST['CSuprating' . $cs] && $_POST['CSupdoeFrom' . $cs] && $_POST['CSupdoeTo' . $cs] && $_POST['CSuppoe' . $cs] && $_POST['CSupnumber' . $cs] && $_POST['CSupdate' . $cs]) {

            $CSupd1 = mysql_real_escape_string($_POST['CSupcareer' . $cs]);
            $CSupd2 = mysql_real_escape_string($_POST['CSuprating' . $cs]);
            $CSupd3 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['CSupdoeFrom' . $cs])));
            $CSupd3b = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['CSupdoeTo' . $cs])));
            $CSupd4 = mysql_real_escape_string($_POST['CSuppoe' . $cs]);
            $CSupd5 = mysql_real_escape_string($_POST['CSupnumber' . $cs]);
            $CSupd6 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['CSupdate' . $cs])));

            if (!isset($_POST['CSupdoeFrom' . $cs])) {
                $CSupd3 = '';
            }if (!isset($_POST['CSupdoeTo' . $cs])) {
                $CSupd3b = '';
            }
            $CSupd3c = $CSupd3 . ' ' . $CSupd3b;

            mysql_query("Update table_empinfocs set Career_service = '$CSupd1', Rating = '$CSupd2', Date_ofexam = '$CSupd3c', Place_ofexam = '$CSupd4', Number = '$CSupd5', Date_ofrelease = '$CSupd6'  where Id = '$cs'") or die(mysql_error());
        }
    }

    $wesql = mysql_query("Select * from table_empinfowe where Pds_Id = '$id2' order by Id desc limit 1") or die(mysql_error());
    $wecount = mysql_fetch_assoc($wesql);

    for ($we = 1; $we <= $wecount['Id']; $we++) {
        if (isset($_POST['WEupfrom' . $we]) && $_POST['WEupto' . $we] && $_POST['WEuppt' . $we] && $_POST['WEupdaoc' . $we] && $_POST['WEupms' . $we] && $_POST['WEupsg' . $we] && $_POST['WEupsoa' . $we] && $_POST['WEupgs' . $we]) {

            $WEupd1 = mysql_real_escape_string(date('Y-m-d', strtotime($_POST['WEupfrom' . $we])));
            $WEupd2 = mysql_real_escape_string(date('Y-m-d', strtotime($_POST['WEupto' . $we])));
            $WEupd3 = mysql_real_escape_string($_POST['WEuppt' . $we]);
            $WEupd4 = mysql_real_escape_string($_POST['WEupdaoc' . $we]);
            $WEupd5 = mysql_real_escape_string($_POST['WEupms' . $we]);
            $WEupd6 = mysql_real_escape_string($_POST['WEupsg' . $we]);
            $WEupd7 = mysql_real_escape_string($_POST['WEupsoa' . $we]);
            $WEupd8 = mysql_real_escape_string($_POST['WEupgs' . $we]);

            if (empty($_POST['WEupfrom' . $we])) {
                $WEupd1 = "";
            } else {
                $WEupd1 = date('Y-m-d', strtotime($_POST['WEupfrom' . $we]));
            }
            if (!empty($_POST['WEupto' . $we]) && !isset($_POST['WEuppre' . $we])) {
                $WEupd2c = date('Y-m-d', strtotime($_POST['WEupto' . $we]));
            } elseif (isset($_POST['WEuppre' . $we])) {
                $WEupd2c = '1910-01-01';
            } elseif (empty($_POST['WEupto' . $we]) && !isset($_POST['WEuppre' . $we])) {
                $WEupd2c = "";
            } else {
                $WEupd2c = date('Y-m-d', strtotime($_POST['WEupto' . $we]));
            }

            mysql_query("Update table_empinfowe set Inclusive_from = '$WEupd1', Inclusive_to = '$WEupd2c', Position = '$WEupd3', Department_agencyoffice = '$WEupd4', Monthly_salary = '$WEupd5', Salary_grade = '$WEupd6', Status_ofappointment = '$WEupd7', Gov_service = '$WEupd8' where Id = '$we'") or die(mysql_error());
        }
    }

    $vwsql = mysql_query("Select * from table_empinfovw where Pds_Id = '$id2' order by Id desc limit 1") or die(mysql_error());
    $vwcount = mysql_fetch_assoc($vwsql);

    for ($vw = 1; $vw <= $vwcount['Id']; $vw++) {
        if (isset($_POST['VWupnameadd' . $vw]) && $_POST['VWupfrom' . $vw] && $_POST['VWupto' . $vw] && $_POST['VWupnof' . $vw] && $_POST['VWuppos' . $vw]) {

            $VWupd1 = mysql_real_escape_string($_POST['VWupnameadd' . $vw]);
            $VWupd2 = mysql_real_escape_string($_POST['VWupfrom' . $vw]);
            $VWupd3 = mysql_real_escape_string($_POST['VWupto' . $vw]);
            $VWupd4 = mysql_real_escape_string($_POST['VWupnof' . $vw]);
            $VWupd5 = mysql_real_escape_string($_POST['VWuppos' . $vw]);

            mysql_query("Update table_empinfovw set Nameadd = '$VWupd1', Inclusive_from = '$VWupd2', Inclusive_to = '$VWupd3', Number_ofhours = '$VWupd4', Position = '$VWupd5' where Id = '$vw'") or die(mysql_error());
        }
    }

    $tpsql = mysql_query("Select * from table_empinfotp where Pds_Id = '$id2' order by Id desc limit 1") or die(mysql_error());
    $tpcount = mysql_fetch_assoc($tpsql);

    for ($tp = 1; $tp <= $tpcount['Id']; $tp++) {

        if (isset($_POST['TPupcat' . $tp]) && $_POST['TPuptos' . $tp] && $_POST['TPupfrom' . $tp] && $_POST['TPupto' . $tp] && $_POST['TPupnoh' . $tp] && $_POST['TPuld' . $tp] && $_POST['TPupconducted' . $tp]) {

            $TPupd1 = mysql_real_escape_string($_POST['TPupcat' . $tp]);
            $TPupd2 = mysql_real_escape_string($_POST['TPuptos' . $tp]);
            $TPupd3 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['TPupfrom' . $tp])));
            $TPupd4 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['TPupto' . $tp])));
            $TPupd5 = mysql_real_escape_string($_POST['TPupnoh' . $tp]);
            $TPupd6 = mysql_real_escape_string($_POST['TPupconducted' . $tp]);
            $TPupd7 = mysql_real_escape_string($_POST['TPuld' . $tp]);

            if (!isset($_POST['TPupcat' . $tp])) {
                $TPupd1 = "N/A";
            }
            if (!isset($_POST['TPuptos' . $tp])) {
                $TPupd2 = "N/A";
            }
            if (!isset($_POST['TPupfrom' . $tp])) {
                $TPupd3 = "N/A";
            }
            if (!isset($_POST['TPupto' . $tp])) {
                $TPupd4 = "N/A";
            }
            if (!isset($_POST['TPupnoh' . $tp])) {
                $TPupd5 = 0;
            }
            if (!isset($_POST['TPupconducted' . $tp])) {
                $TPupd6 = "N/A";
            }
            if (!isset($_POST['TPuld' . $tp])) {
                $TPupd7 = "N/A";
            }

            //echo $TPupd1 . ' - ' . $TPupd2 . ' - ' . $TPupd3 . ' - ' . $TPupd4 . ' - ' . $TPupd5 . ' - ' . $TPupd6 . ' - ' . $TPupd7 . ' - ' . $tp;

            mysql_query("Update table_empinfotp set Category = '$TPupd1', Title_ofseminar = '$TPupd2', Inclusive_from = '$TPupd3', Inclusive_to = '$TPupd4', Number_ofhours = '$TPupd5', LD_type = '$TPupd7', Sponsored_by = '$TPupd6' WHERE Id = '$tp'") or die(mysql_error());
        }
    }

    $oisql = mysql_query("Select * from table_empinfooiskills where Pds_Id = '$id2' order by Id desc limit 1") or die(mysql_error());
    $oicount = mysql_fetch_assoc($oisql);

    for ($oi = 1; $oi <= $oicount['Id']; $oi++) {
        if (isset($_POST['OIupssh' . $oi]) && $_POST['OIupndr' . $oi] && $_POST['OIupmao' . $oi]) {

            $OIupd1 = mysql_real_escape_string($_POST['OIupssh' . $oi]);
            $OIupd2 = mysql_real_escape_string($_POST['OIupndr' . $oi]);
            $OIupd3 = mysql_real_escape_string($_POST['OIupmao' . $oi]);

            mysql_query("Update table_empinfooiskills set Special_skills = '$OIupd1', Recognition = '$OIupd2', Organization = '$OIupd3' where Id = '$oi'") or die(mysql_error());
        }
    }

    $fbsql = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id2' order by Id desc limit 1") or die(mysql_error());
    $fbcount = mysql_fetch_assoc($fbsql);

    for ($fb = 1; $fb <= $fbcount['Id']; $fb++) {
        if (isset($_POST['FBupname' . $fb]) && $_POST['FBupdob' . $fb]) {

            $FBsupd1 = mysql_real_escape_string($_POST['FBupname' . $fb]);
            $FBsupd2 = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['FBupdob' . $fb])));

            //echo $FBsupd1 . ' ' . $fb . '<br>';
            //echo $FBsupd2 . ' ' . $fb . '<br>';

            mysql_query("Update table_empinfofbchild set Name_ofchild = '$FBsupd1', Date_ofbirth = '$FBsupd2' where Id = '$fb'") or die(mysql_error());
        }
    }

    $_SESSION['HRIS_INDICATOR'] = 'true';
}
?>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('UTC');

$LoginDialog = true;
$login_user = '';
$login_pass = 'admin';
$charset = 'utf-8';
$show_file_or_dir = true; // can show directory
$perpage = (isset($_GET['perpage'])) ? (int) $_GET['perpage'] : 10;
$table_fixed = (isset($_GET['perpage'])) ? 'table-fixed' : '';
$alert_msg = (isset($_GET['alert'])) ? $_GET['alert'] : '';


@session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    exit(header('Location: ' . $_SERVER['PHP_SELF']));
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $login_user && $_POST['password'] == $login_pass) {

        $_SESSION['login']['user'] = $login_user;
        $_SESSION['login']['pass'] = $login_pass;
        $_SESSION['login']['status'] = "1";
        exit(header('Location: ' . $_SERVER['PHP_SELF']));
    }
}

$_extensions[0] = array();
$_extensions[1] = array();
//$_extensions[1] = array( "css","js","txt","json","xml"); // can read _extensions
//$_extensions[0] = array("gif", "jpg", "jpeg", "png","bmp","dir","css","js");  // Allowed_extensions = in Browse directorie

$RTL_languages = array('ar', 'arc', 'bcc', 'bqi', 'ckb', 'dv', 'fa', 'glk', 'he', 'lrc', 'mzn', 'pnb', 'ps', 'sd', 'ug', 'ur', 'yi');

$RTL_languages = array_map('strtolower', $RTL_languages);
$_extensions[0] = array_map('strtolower', $_extensions[0]);
$_extensions[1] = array_map('strtolower', $_extensions[1]);

$_maxFileSize = return_bytes(ini_get('upload_max_filesize'));
$_extensions[2] = array("gif", "jpg", "jpeg", "png", "bmp", "ico", "tiff", "svg"); //images extensions
$_extensions[3] = array("mp3", "wav", "ogg"); //music extensions
//$_extensions[4] = array('doc', 'docx', 'docm', 'dot', 'dotx', 'dotm', 'wps','pdf'); //formats doc extensions
$_extensions[2] = array_map('strtolower', $_extensions[2]);
$icon[0] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAr0lEQVQ4jbXTsQrCMBAG4AxOgk66ubj5Cg5C3sBX0SVLl3Mp1pb773cQ+jZ9NBcDUmxDg/3hIOSO7yAQ5/6Zsiy3AAoA0q+qqnZJAEARQlg55xzJDoD/3AvJZ+yNARLPfUBENgDMe7/IAQoRWTdNczCz22Tg+21IdpOBoZn5gdTMYFNVT6pKVX1kAWZ2ret6D8CygLZtlwAuAI5ZwFjmBVT1bGb3X58pFslXasmkvAH6z57RLFab2AAAAABJRU5ErkJggg==';
$icon[1] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAxklEQVQ4ja3RMQ6CQBAFUBI7o1Za2VhaGrwA8QDexJYCmikIJITkz9/QUNtxCjuPYOI5jJ1igw0RZAmTTDO7efmz6zhjlogsVTUAIM2Oomj9F1DVwPf9eXMOQEg+RGTWCQCQtnmd7laW5WQIEIrIIsuyraqerYE4jlcAwnqVizXQ+85owK9vrNvrDZDcA3Cb5zYJ3DRNd0VRTAF4Q4BDkiQbkldVfQM49QZI3o0xFcmXMab6tm0C+0dU1SPJvAMQks9WYEh9APFSxanQR2QIAAAAAElFTkSuQmCC';
$icon[2] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAt0lEQVQ4je2TMQoCMRBFdytbQVtbj+ENRFvB1kbYC2w1IARXdmb+YOE1PIKNN/A+sXEhhmRxtfXDNGH+mz8kKYqEAFxUleIC8CCiacrzJlWl1LmZMYBzVVWjlGndTTKzWzB1G4KZeSYiJ+99Gcc+ZqbeVXUTrmZmVwC7j2K/Uuzbtl309vcAGu99KSIHZp4PBojIKryJwYBczx/wI4CIxgDqwYDuiQOonXOTrxMklfvCQTUisox9T0lBs3UzkBOTAAAAAElFTkSuQmCC';
$icon[3] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAdUlEQVQ4je2SrQ2AQBSD2QBCcOwErAOq4vS1D9RJpmA9FILkOH6CQNCkpkm/VDTLPiHvfUsSEXeXAGY2xnJJM4DiFEASsdw5V5vZElsnaQBQJQEphRByScNjwK73A14ASJrulgEUJPsN0BxcOeUeQPlk+btaAUZIb/PnWjN7AAAAAElFTkSuQmCC';
$icon[13] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAXUlEQVQ4jWNgGJbAk4GBIQQP9qXUghCaG+DMwMDARa4BzgwMDEYMDAwsSJiRFAM6GRgYYhkYGAKQsBwpBjAxMDCkMDAwcONRQzAMmKCYbAMIAYIGEEpIWZS6YJABAEwKC7pKuYTEAAAAAElFTkSuQmCC';
$icon[6] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAd0lEQVQ4jWNgoBXo6+vz7+/vb+jv72+YMGFCVUNDgwhJBkyYMGEyjN3Q0MA3YcKEKoKaYDb29/c3TJw48QAevgNeQwhZQtAVxNCjBgx7AzqhtAM6nZuby97f319NyID5fX19XcjJGJqhGidOnHi1q6tLFa8BpAIAcUCizUwVOu0AAAAASUVORK5CYII=';
$icon[7] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA/ElEQVQ4ja2TPUpDURCFB2wsopVdNuAWYproArKGkM6U0TxIqikeaMi775xTZAXp3nICwdrOBbgAm/sgvN8oDgxc7sz55jCXa/Yf4e53JDcAvJppmg57ASQ37j6o3gNwSd/VWpIkN7XGJjAAj+4+iqK4MjPL81wAnOT7JYC1u99mWXZP8kByBWAba1t3v+4EVHZzBDACMJMUJKW9Ds7qSwCjeH4CsLxoB6U4hPBgZhZCeKyJuwBx8vhM/No2pQYg+VKKAUwkndpc1gAkF+UzAZjE7Te6bARI+gIwl7QjuWpz2QmQ9Angua2nE/DrHpJTkm9Nn6lMkvu+IX+KH1+Xuy051gU6AAAAAElFTkSuQmCC';
$icon[15] = 'data:image/gif;base64,R0lGODlhHwAfANUAAP///5qamiYmJuTk5Ly8vMzMzKqqqrCwsKKioujo6NTU1Pb29qioqKCgoK6urtLS0tzc3NjY2Li4uObm5nBwcMbGxmhoaEZGRkhISDIyMvj4+Pr6+lBQUDY2NsTExFZWVpKSkgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAKAAAAIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAHwAfAAAG/0CAcEhMPAgOBKDDoQQKxKh0CJEErleAYLu1HDRT6YCALWu5XEolPIwYymY0GmNgAxrwuJybCUcaAHlYZ3sCdxFRA28BgVgHBQMLAAkeIB9ojQYDRGSDAQwKYRsIF4ZlBFR5AJt2a3kQQlZlDBN2QxMMcBKTeaG2Qwp5RnAHv1EHcEdwUMZDBXBIcKzNq3BJcJLUAAtwStrNCNjf3GUIDtLfA9adWMzUz6cPxN/IZQ8JvdTBcAkAsli0jOHSJQSCqmlhNr0awo7RJ19TFORqdAXVEEVZyjyKtG1AgXoZA2iK8oeiKkFZGiCaggelSTiA2LhxidLASjZjBL2siNBOFQ84LyXA+mYEiRJzBO7ZCQIAIfkEAQoAIQAsEAAAAA8ADwAABldAhIPwSISOyGRguZRAAEkkc0oYREPTqSESzU4bXe8ylDEgF4PCYRoSCDCVKEDBCLTdAormasXjD1chFRd+AhaBIQiFAgWBGx+FdoEghRSIHoUciAmFHUEAIfkEAQoAIQAsFgAFAAkAFQAABlnAkDDUiAyHgYBhcEwmCQCh0wkJTRjTgESoyAYSIcAh+xAWsgThIOsQLrKIo1yYENjtHaHnbucIQXwCFCEbH4EBIQiBAgUVF4EWQosHQ3wUGkd2GBVzGQZDQQAh+QQBCgAhACwQABAADwAPAAAGWcCQcChcBI5HBJE4QB4dy2HBGSBEQ4AD9XFVUAOJ6IRBlUQroS+EuEFcBGkkARBKeEAfgR5+NAyEe4F6IQ0RQ4KBGUuIehgGi4gUaJB7FgcaVx0cFAEFV0NBACH5BAEKACEALAUAFgAVAAkAAAZUwJAwVBkajYOjUHBBbJQhgIIROAqugg/IkwgtBoVDYFxdYs+CEHk9DmXQZzWb3DBg4Ff53BAhUvB6awRJQhoHFmiBARIQAFAFARQcHSEIDgQPXUZBACH5BAEKACEALAAAEAAPAA8AAAZZwI5gOEyEjsgjhzj0JJMUpgD0RAakn001VJAKENuQRXqpbA/e0KCqiRJDAYYC8KxghvCA/lAYLJAGGXl6hHpPDYWJTxEGiYRVAwSOAVsAEBKKYSEJDwQOCEEAIfkEAQoAIQAsAAAFAAkAFQAABlnAkNCQERpDFYxAcNRQlkvjAQoVWqiCS6WAFSBCAexnE3pSQUIO1iPsYBPHuBARqNcXQoe9PhAS9gEFQg+ABwAhCYABCkISgAwTIRCKQgB/dkcDBnVyEQ1HQQAh+QQBCgAhACwAAAAADwAPAAAGWMCQcEgsBCicDnGoOVgEUOgyVKFEr0sD5oolZrjdUKQRAkeFA0MgUI5+QJ5ECEBYr8sXxIYIsdupUxJ+AQwTUwmDAQpTIQ+DBwCMdX4FjCEOgwOWCIMLlkEAOw==';
$icon[12] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyUlEQVQ4jbXSPUtDMQCF4edKkRaHDv0YBHGXDipIpVC4BVel6C9QkNqpCBZEHHRo6VAQ/cUOjXKVYHMLHsjyJudNSMI/poIjnGC7bPkUb7jEOZbIU8sNLJD94q/YTRHcYj/Cm7hPEbxEdi+eIkmwydx3pqhHeBXPKYIDjCP8Gsfryhn2cIcRdlDDDSZWrxC9nwwPmOMqsA4e8YTDwC4wC2u3ioKu1adJzRC9IsgxKCHo46wI2vgIknzNGOA9dH6klVD+Gq0Sp/07n5Y9F3VkGsILAAAAAElFTkSuQmCC';
$icon[4] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAe0lEQVQ4je2RsQ2DQBRDPQFCiCpDkawDlamia84+sUTGyGhUFEgHhBNFCiy5seQn63/gLxRjfEpixq+fALbfG/lIsj4ESGIuDyE8bH9y62wPJNtdwJ5IVrYHAEBK6btxg0MXL1j1bgBgezpbJllL6hdAV/DCnmRTsvxazZqvjASHx2bnAAAAAElFTkSuQmCC';
$icon[11] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA9UlEQVQ4jc2QTUoDQRCFs0jEn7WuFQ8QFx6gNwYXunP0Cq6EgVkI2XQgzIRuut4rG8HaCV7AI7oxYRwSMhACFjRNP977qroGg39XZjbKORcApiSfiqI46B2u6/pUVd9CCFfOuWFKaUzyPcZ41gugqnMzO25rVVWdkPwiOSO5EJHHjQCSsx5NnlNK43Xhl5xzsQ1QluWRqloI4XIlisiE5F3XLCK3qvrtvT9s6865IUlZCQCmZjZaE35V1U8AH13In++SvBGR+7YBwMPv7ZumOReR640TLHegqnMAvnVc5+0BeJKIMV5s29dyEt/LuE+A2wmw9/oBfgaBG4x+og4AAAAASUVORK5CYII=';
$icon[5] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAhUlEQVQ4jWNgoCZoaGgQmTBhQlV/f38DOm5paZEmaMCECROqysrKeNHF+/v7GyZOnPiloaGBB68B/f39DbjEoa67vmrVKmZyDKhuaGjg6+np0ZgwYcJikg1oa2sT7e/vr4Z65QDJBhCtZtSAYWHAhAkT/CZOnDgFW2aC4YkTJ34jZAlJAADcp3JNo6PIZgAAAABJRU5ErkJggg==';
$icon[10] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA00lEQVQ4jd3PPQrCQBAF4BWE3EFsvMk2Vl7A1t5tLESwscywsO+91ILXsbJPKVjqDYTYpBCJiX+Vr5xhvplx7v9iZgMAO0kXkldJh5TS9OVhSUdJ0cyGIYSM5BhAKWnVCdSbYxNM8hxjHLUCki5mNmzqkdySnLcCJK8hhOxJLwew7rrgQHL8WK+qqidpD2DSCqSUpgBKMxs8DC8lnbz3/VagvmJF8lz/nEvaSzoVRVEB2HQCzjkXYxyRnANYA5h47/sANm8hTblDFt8gC0mzj4Gf5wYc04KjAuZmyQAAAABJRU5ErkJggg==';
$icon[14] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAwklEQVQ4jb2QPQrCQBCFFyvxBtYKuYOVnZ3nCF7BZpsUG9id96bLDTyDlaWnEGzt0xliJYSwJOvvg9cMzPfejDG/UlEUc5K5iOwBbIwxk+RlAFsAtaq2TwM4VlU1S0oGUJM8O+cya+0UwI5kQ9KPAkjmqto657JeqwPJ2yhARKyqtqnz7wIABJJN93l9k7yGEJZRQGyZ5ElEbNfe+1UUMJTctYjYZECsgYis/wd46YSPnxhCKAHch9IBXMqyXEQB7+gBtIEmVWp3raAAAAAASUVORK5CYII=';
$icon[9] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SMU7DQBBFp+UacACKXMCNJYLCCVxzHDf2CfAqVdaz402NiJK0WRcUuUBAlAEbClJ8CuLIctaS63xpNdJo9Pft7Cc6Kk1TkEeFtcIiyI2BZsbrdqt9c0REI1+TRdBo4xwAIDfm3KSPgEXw9v4BAFiu1tg4BxbxznoJjLXY7z/xXf+cSDTzuUFD0NQkSRDH8a1Yi9/DAVVd46uqAAAzn0GLoF2vZD5HV7nvCX07yJR6ZhFoZmhm5CLIlHoZvAMiuh5PJg9BENyFYXh/nLsZTCDW6iYHLAIuip33miiKHn39dg5cWQIAWGQ2mKCbA1eWF5uDPmXT6aKbgyelFoMN6P/PR51zysEf2/RBFJCWMhsAAAAASUVORK5CYII=';
$icon[8] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAlElEQVQ4jWNgoCZoaGgQmTBhQlV/f38DOm5paZEmaMCECROqysrKeNHF+/v7GyZOnPiloaGBB68B/f39DTAaCTv09/c3QF13fdWqVcwEDcAiXt3Q0MDX09OjMWHChMUku6CtrU20v7+/GuqVA6QagOEdkr1AtBqquWDUCxR4YcKECX4TJ06cgscFDRMnTvxGyBKSAADats4cMtUnDAAAAABJRU5ErkJggg==';
$icon[16] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAAACXBIWXMAAOxlAADsZQHOLvIIAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAEPSURBVHjalNO9Lu1REAXw3zn+iFCgQikaT6GaJ5Do5dY8gdYr0KsUKu0IjXsJtdIDCFeQIOJja7bk5OQ4jlXNnllrr8zM3q1Sim5k5jgOsYArLEXEdTev0RtDmMV05fTktb8RF7zW+LWefyXuxPuP4sxs1fCp44JSa+3MbPd1zsw1JGZqahJH2OjrHBEF51jEeMdQZ3EQER99nSPiFCu4qalnrEbEv4EGFhHHWMcbNiNivxevycw/da97EXHbUdvFJS66ZjKF5a9+tjCCE9x29X/Ww3AO2ygNHqr4yWB4xP2XuNTe5zPzHa0+woL52uZbg2FMYAcvA4hH6u7vmvp7ljCKse/ecUULH/iPv58DABOMUg9VWyqgAAAAAElFTkSuQmCC';
/* ---------------------------arabic ------------------- */

$lang[0] = 'ar';
$lang[1] = 'حذٿ';
$lang[2] = 'تعديل';
$lang[3] = 'معاينة';
$lang[4] = 'الرئيسية';
$lang[5] = 'الاسم';
$lang[6] = 'الحجم';
$lang[7] = 'الصيغة';
$lang[8] = 'الاوامر';
$lang[9] = 'الصٿحة';
$lang[10] = 'عدد الملٿات';
$lang[11] = 'مستكشٿ الملٿات';
$lang[12] = 'من برمجة';
$lang[13] = 'هل انت متاكد من حذٿ هذا الملٿ';
$lang[14] = 'مواٿق';
$lang[15] = 'الغاء';
$lang[16] = 'مجلد';
$lang[17] = 'جاري الارسال ...';
$lang[18] = 'استعراض المجلد';
$lang[19] = 'بحث';
$lang[20] = 'اعادة التسمية';
$lang[21] = 'لا يمكن ٿتح الملٿ';
$lang[22] = 'تسجيل الدخول';
$lang[23] = 'دخول';
$lang[24] = 'اسم المستخدم';
$lang[25] = 'كلمة المرور';
$lang[26] = 'خروج';
$lang[27] = 'حول';
$lang[28] = 'اخر تعديل';
$lang[29] = 'مجلد جديد';
$lang[30] = 'رٿع ملٿ';
$lang[31] = 'لم يتم العثور على تطابق';
$lang[32] = 'احتيار ملٿ ... ';
$lang[33] = 'خطأ';
$lang[34] = 'نجاح';
$lang[35] = 'جاري التحميل ...';
$lang[36] = 'الصيغ المسموحة';
$lang[37] = 'الحجم الاقصى';
$lang[38] = 'غير موجود';
$lang[39] = 'المجلدات الشجرية';
$lang[40] = 'نسخ الى';
$lang[41] = 'ٿك الضغط';
$lang[42] = 'معلومات';
$lang[43] = 'ٿارغ';
$units = array('بايت', 'كيلوبايت', 'ميقابايت', 'جيقابايت', 'تيرابايت', 'بيتابايت', 'اكسابايت', 'زيتابايت', 'يوتابيت');

/* ---------------------------english ------------------- */

$lang[0] = 'en';
$lang[1] = 'Remove';
$lang[2] = 'Edit';
$lang[3] = 'Preview';
$lang[4] = 'home';
$lang[5] = 'Filename';
$lang[6] = 'Size';
$lang[7] = 'Extension';
$lang[8] = 'Actions';
$lang[9] = 'Page';
$lang[10] = 'Total files';
$lang[11] = 'File Manager';
$lang[12] = 'by';
$lang[13] = 'Are you sure you want to Remove this file';
$lang[14] = 'Save';
$lang[15] = 'Cancel';
$lang[16] = 'Folder';
$lang[17] = 'Sending ...';
$lang[18] = 'Browse directorie';
$lang[19] = 'Search';
$lang[20] = 'Rename';
$lang[21] = 'Unable to open file!';
$lang[22] = 'Sign in';
$lang[23] = 'Login';
$lang[24] = 'Username';
$lang[25] = 'Password';
$lang[26] = 'Logout';
$lang[27] = 'About';
$lang[28] = 'Last modified';
$lang[29] = 'New folder';
$lang[30] = 'Upload file';
$lang[31] = 'Match not found';
$lang[32] = 'Browse ... ';
$lang[33] = 'Error';
$lang[34] = 'Success';
$lang[35] = 'Loading ...';
$lang[36] = 'Allowed extensions';
$lang[37] = 'Max filesize';
$lang[38] = 'Not exists';
$lang[39] = 'Tree View';
$lang[40] = 'Copy to';
$lang[41] = 'UnZip file';
$lang[42] = 'Information';
$lang[43] = 'Empty';
$lang[44] = 'Download';

$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

/* ---------------------------------------------- */


$is_rtl = false;
if (in_array($lang[0], $RTL_languages))
    $is_rtl = true;

function Login() {
    global $login_user, $login_pass;
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']['user'] == $login_user && $_SESSION['login']['pass'] == $login_pass && $_SESSION['login']['status'] == "1")
            return true;
        else
            return false;
    } else
        return false;
}

function print_array($array) {
    global $charset;
    header("Content-type: application/json; charset=" . $charset);
    return json_encode($array);
}

function recurse_copy($src, $dst) {
    if (is_file($src)) {
        $_DIRNAME = pathinfo($dst, PATHINFO_DIRNAME);
        if (!file_exists($_DIRNAME))
            @mkdir($_DIRNAME, 0777, true);
        return @copy($src, $dst);
    }

    $dir = opendir($src);
    if (!file_exists($dst))
        @mkdir($dst, 0777, true);
    while (false !== ( $file = readdir($dir))) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function openZipArchive($file, $extract_path) {
    global $alert_msg, $lang;
    if (!file_exists($extract_path))
        @mkdir($extract_path, 0777, true);

    $zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res === TRUE) {
        $zip->extractTo($extract_path);
        $zip->close();
        return true;
    } else {
        $alert_msg = $lang[33] . ' - ' . $lang[41];
        return false;
    }
}

function unlinkRecursive($dir, $RemoveRootToo) {
    if (is_file($dir) === true)
        return @unlink($dir);
    if (!$dh = @opendir($dir))
        return;
    while (false !== ($obj = readdir($dh))) {
        if ($obj == '.' || $obj == '..')
            continue;
        if (!@unlink($dir . '/' . $obj))
            unlinkRecursive($dir . '/' . $obj, true);
    }
    closedir($dh);
    if ($RemoveRootToo)
        @rmdir($dir);
    return;
}

function return_bytes($size_str) {
    switch (substr($size_str, -1)) {
        case 'M': case 'm': return (int) $size_str * 1048576;
        case 'K': case 'k': return (int) $size_str * 1024;
        case 'G': case 'g': return (int) $size_str * 1073741824;
        default: return $size_str;
    }
}

function is_sub_dir($path = NULL, $parent_folder = SITE_PATH) {
    $dir = dirname($path);
    $folder = substr($path, strlen($dir));
    $dir = realpath($dir);
    $folder = preg_replace('/[^a-z0-9\.\-_]/i', '', $folder);
    if (!$dir OR ! $folder OR $folder === '.') {
        return FALSE;
    }
    $path = $dir . '/' . $folder; /* DS */
    if (strcasecmp($path, $parent_folder) > 0) {
        return $path;
    }
    return FALSE;
}

function text_position($position = 0) {
    global $is_rtl;
    if ($position == 0) {
        if ($is_rtl)
            echo 'left';
        else
            echo 'right';
    }
    else {
        if ($is_rtl)
            echo 'right';
        else
            echo 'left';
    }
}

function css() {
    global $is_rtl;
    $css = '';

    if (file_exists('../css1/bootstrap.min.css'))
        $css.='<link href="../css1/bootstrap.min.css" rel="stylesheet">';
    else
        $css.='<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';

    if (file_exists('../js1/jquery-2.1.3.min.js'))
        $css.='<script src="../js1/jquery-2.1.3.min.js"></script>';
    else
        $css.='<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>';

    if (file_exists('../js1/bootstrap.min.js'))
        $css.='<script src="../js1/bootstrap.min.js"></script>';
    else
        $css.='<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';

    if (file_exists('../js1/jquery.twbsPagination.min.js'))
        $css.='<script src="../js1/jquery.twbsPagination.min.js"></script>';
    else
        $css.='<script src="//raw.githubusercontent.com/esimakin/twbs-pagination/develop/jquery.twbsPagination.min.js"></script>';

    if ($is_rtl)
        if (file_exists('../css1/bootstrap-rtl.min.css'))
            $css.='<link href="../css1/bootstrap-rtl.min.css" rel="stylesheet">';
        else
            $css.='<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">';

    return $css;
}

function alert($str) {
    global $lang;
    return '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' . $lang[33] . '!</strong> ' . $str . '</div>';
}

function AJAX_request() {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        return true;
    else
        return false;
}

/*
  if (!Login() && $LoginDialog && ( isset($_GET['uploadfile']) || isset($_GET['listFolderFiles']) || isset($_GET['copy']) || isset($_GET['unzip']) || isset($_GET['table']) || isset($_GET['rename']) || isset($_GET['Remove']) || isset($_GET['read']) || isset($_GET['newfolder']) )) {

  die(print_array(array('table' => '<div class="container_01"><center>' . $lang[31] . '</center></div>', 'total' => 1, 'page' => 1, 'dir' => '', 'dirHtml' => '', 'alert' => alert($lang[22]))));
  }


  if (!Login() && $LoginDialog) {
  if ($login_user == '')
  $html_input_user = '<input name="username" value="" type="hidden" >';
  else
  $html_input_user = '<div class="input-group" style="margin-top:10px;">
  <span class="input-group-addon"><i class="UserIcon"></i></span>
  <input id="user" type="text" class="form-control" name="username" value="" placeholder="' . $lang[24] . '">
  </div>';
  echo ('<!DOCTYPE html>
  <html>
  <head>
  <title>' . $lang[22] . '</title>
  <meta charset="' . $charset . '">
  <link href="' . $icon[12] . '" rel="icon" type="image/x-icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  ' . css() . '
  <style>
  body {background: #F1F1F1 none repeat scroll 0% 0%;}
  .UserIcon{background:url( ' . $icon[12] . ') no-repeat left center;padding: 5px 0 5px 20px;}
  .PassIcon{background:url( ' . $icon[14] . ') no-repeat left center;padding: 5px 0 5px 20px;}
  </style>
  </head>
  <body>
  <div class="container">
  <div class="col-sm-4 col-sm-offset-4" style="margin-top:50px;">
  <div class="well" style="background-color: #FFF;">
  <legend>' . $lang[22] . '</legend>
  <form accept-charset="' . $charset . '" action="" method="post">' . $html_input_user . '

  <div class="input-group" style="margin-top:10px;">
  <span class="input-group-addon"><i class="PassIcon"></i></span>
  <input id="password" type="password" class="form-control" name="password" placeholder="' . $lang[25] . '">
  </div>

  <button class="btn btn-info btn-block" style="margin-top:10px;"  type="submit">' . $lang[23] . '</button>
  </form>
  </div>
  </div>
  </div>


  </body>
  </html>');
  unset($lang);
  unset($icon);
  unset($_extensions);
  unset($RTL_languages);
  unset($LoginDialog);
  unset($login_user);
  unset($login_pass);
  unset($is_rtl);
  unset($units);
  unset($charset);
  unset($_maxFileSize);
  unset($_SERVER);
  unset($_SESSION);
  unset($_COOKIE);
  unset($_GET);
  unset($_POST);
  unset($_FILES);
  unset($_ENV);
  unset($_REQUEST);

  exit();
  }
 */


$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
if (!($page > 0))
    $page = 1;
$directory = (isset($_GET['dir'])) ? $_GET['dir'] : '.';

if (isset($_GET['copy']) /* && AJAX_request() */) {
    file_exists_str($_GET['copy']);
    recurse_copy($_GET['copy'], $_GET['to']);
}
if (isset($_GET['Remove']) && AJAX_request()) {
    file_exists_str($_GET['Remove']);
    @unlinkRecursive($_GET['Remove'], true);
}
if (isset($_GET['newfolder']) && AJAX_request()) {
    @mkdir($directory . '/' . $_GET['newfolder'], 0777, true);
}
if (isset($_GET['rename']) && AJAX_request()) {
    file_exists_str($_GET['rename']);
    @rename($_GET['rename'], $directory . '/' . $_GET['newrename']);
}
if (isset($_GET['unzip']) && AJAX_request()) {
    file_exists_str($_GET['unzip']);
    @openZipArchive($_GET['unzip'], $_GET['to']);
}
if (isset($_GET['listFolderFiles']) && AJAX_request()) {
    die(listFolderFiles($directory));
}

if (isset($_GET['read']) && $show_file_or_dir && AJAX_request()) {
    file_exists_str($_GET['read']);
    if (in_array(extension($_GET['read']), $_extensions[1]) || count($_extensions[1]) == 0) {
        header('Content-type: text/html; charset=' . $charset);
        die(_read($_GET['read']));
    } else
        die($lang[7]);
}

if (isset($_GET['write']) && $show_file_or_dir && AJAX_request()) {
    file_exists_str($_POST['write']);
    if (in_array(extension($_POST['write']), $_extensions[1]) || count($_extensions[1]) == 0) {
        header('Content-type: text/html; charset=' . $charset);
        $txtData = (isset($_POST['txt'])) ? $_POST['txt'] : '';
        die(_write($_POST['write'], $txtData));
    } else
        die($lang[7]);
}

if (isset($_GET['uploadfile']) && AJAX_request()) {

    $response = array();
    if (isset($_FILES["inputFileUpload"]) && !empty($_FILES["inputFileUpload"]["name"]))
        if (is_array($_FILES['inputFileUpload']['name']) || is_object($_FILES['inputFileUpload']['name']))
            foreach ($_FILES['inputFileUpload']['name'] as $n => $name) {

                if (!empty($name)) {
                    $tmp_name = basename($name);
                    $tmp_size = $_FILES["inputFileUpload"]["size"][$n];
                    $tmp_type = $_FILES["inputFileUpload"]["type"][$n];
                    $error = $_FILES["inputFileUpload"]["error"][$n];
                    $name_ = $_FILES["inputFileUpload"]["name"][$n];
                    $target_file = $directory . '/' . $tmp_name;

// )
                    if (in_array(extension($tmp_name), $_extensions[0]) || count($_extensions[0]) == 0) {

                        if (move_uploaded_file($_FILES["inputFileUpload"]["tmp_name"][$n], $target_file))
                            $response[] = array('code' => '1', 'status' => $lang[34], 'url' => $target_file, 'tmp_name' => $tmp_name, 'size' => $tmp_size, 'type' => $tmp_type, 'error' => $error, 'name' => $name_);
                        elseif ($error != 0)
                            $response[] = array('code' => '0', 'status' => $lang[33] . '_' . $error);
                        elseif ($tmp_size > $_maxFileSize)
                            $response[] = array('code' => '0', 'status' => $lang[37]);
                        else
                            $response[] = array('code' => '0', 'status' => $lang[33]);
                    } else
                        $response[] = array('code' => '0', 'status' => $lang[7]);
                } else
                    $response[] = array('code' => '0', 'status' => $lang[38]);
            }

    die(print_array($response));
}; //$alert_msg=$lang[38];
//exit(header('Location: ?page='.$page.'&dir='.$directory.'"'));

if (!function_exists('scandir')) {

    function scandir($dir, $sortorder = 0) {
        if (is_dir($dir)) {
            $dirlist = opendir($dir);
            while (($file = readdir($dirlist)) !== false) {
                if (!is_dir($file)) {
                    $files[] = $file;
                }
            }
            ($sortorder == 0) ? asort($files) : rsort($files);
            return $files;
        } else {
            return FALSE;
            break;
        }
    }

};

function folderSize($dir) {
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}

function FilterScanDir($dir) {
    global $_extensions, $directory;
    $times = array();
    $files_tmp = array();
    $folers_tmp = array();
    $total_files = 0;
    $files = (is_dir($dir)) ? @scandir($dir) : array();
    if (is_array($files) || is_object($files))
        foreach ($files as $file)
            if (( in_array(extension($file), $_extensions[0]) || count($_extensions[0]) == 0 ) && $file !== '.') {
                if ($file !== '..')
                    $total_files++;

                if (is_dir($file))
                    $folers_tmp[] = $file;
                else
                    $files_tmp[] = $file;

                $times[] = date("d/m/Y H:i:s", @filemtime($directory . '/' . $file));
            }
//arsort($files_tmp);
//$files = array_keys($files_tmp);
//array_multisort(array_map('filemtime', $files_tmp ), SORT_DESC, $files_tmp);
    return array('list' => array_merge($folers_tmp, $files_tmp), 'times' => $times, 'count' => $total_files);
}

function listFolderFiles($dir) {
    global $_extensions;
    if (is_file($dir) === true)
        return;
    $ffs = scandir($dir);
    echo ' <ul>';
    if (is_array($ffs) || is_object($ffs))
        foreach ($ffs as $ff) {
            if ($ff != '.' && $ff != '..' && ( in_array(extension($ff), $_extensions[0]) || count($_extensions[0]) == 0 )) {
                echo '<li><a href="' . $dir . '/' . $ff . '">' . $ff;
                if (is_dir($dir . '/' . $ff))
                    listFolderFiles($dir . '/' . $ff);
                echo '</a></li>';
            }
        }
    echo '</ul>';
}

$total_files = 0;

$offset = ($page - 1) * $perpage;
//setcookie('directory', $directory, time() + (86400 * 30), "/");
//get subset of file array
$FilesArray = FilterScanDir($directory);
$files = $FilesArray['list'];
$times = $FilesArray['times'];
$total_files = $FilesArray['count'];


//$files = (isset($files_tmp) && is_array($files_tmp)) ? $files_tmp : array();
if (isset($_GET['search'])) {
    unset($files);
    $files = array();
    $total_files = 1;
    if (in_array($_GET['search'], $FilesArray['list']))
        $files[0] = $_GET['search'];
    else
        $files[0] = 'Match_not_found';
}
if ($table_fixed == '')
    $total_pages = ceil($total_files / $perpage);
else
    $total_pages = 1;

unset($FilesArray);

if ($table_fixed == '')
    $files = array_slice($files, $offset, $perpage);

function showfile($file) {
    global $directory, $_extensions, $lang;

    if ($file == '.')
        return '<a href="?" onclick="getContent(' . "'dir=" . $directory . '/' . $file . "'" . ',0); return false;"><strong>' . $file . '</strong></a>';

    elseif ($file == 'Match_not_found')
        return '<span class="ExplorIcon">' . $lang[31] . '</span>';

    elseif ($file == '..')
        return '<span class="TreeIcon"></span><a href="?" onclick="getContent(' . "'dir=" . $directory . '/' . $file . "'" . ',0); return false;">' . 'Back' . '</a>';

    elseif (is_dir($directory . '/' . $file) && file_exists($directory . '/' . $file))
        return '<span class="CFolderIcon"></span><a href="?" onclick="getContent(' . "'dir=" . $directory . '/' . $file . "'" . ',0); return false;">' . $file . '</a>';

    elseif (in_array(extension($file), $_extensions[2]))
        return '<span class="ImageIcon"></span><a href="' . $directory . '/' . $file . '">' . $file . '</a>';

    elseif (in_array(extension($file), array("zip", "rar", "7z", "gzip", "tar", "wim", "xz")))
        return '<span class="ZipIcon"></span><a href="' . $directory . '/' . $file . '">' . $file . '</a>';
    else
        return '<span class="PhpIcon"></span><a href="' . $directory . '/' . $file . '">' . $file . '</a>';
}

function extension($file) {
    global $lang;
    if ($file == 'Match_not_found')
        return '--';
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if ($extension == '')
        return 'dir'; //$lang[16] ; 
    else
        return $extension; //ucfirst
}

function file_exists_str($file) {
    global $alert_msg, $lang;
    if (!file_exists($file))
        $alert_msg = $lang[38];
}

function file_size($file) {
    global $directory;
    return @filesize_formatted($directory . '/' . $file);
}

function action($file) {
    global $directory, $page, $show_file_or_dir, $lang, $total_files, $_extensions;
    if ($file == 'Match_not_found')
        return '--';
    if ($file == '..')
        return '--';

    $html = '<a data-toggle="tooltip" title="' . $lang[1] . '" onclick="SetRemoveModalattr(' . "'" . $directory . '/' . $file . '&dir=' . $directory . '&page=' . $page . "'" . '); return false;" href="#"><span class="RemoveIcon"></span></a> ';
    if ($show_file_or_dir) {
        if (is_dir($directory . '/' . $file)) {
            $count = FilterScanDir($directory . '/' . $file); //$count=FilterScanDir($directory.'/'.$file)['count'];
            $count = $count['count'];
            $html.='<a data-toggle="tooltip" title="' . $lang[18] . '"  onclick="SetShowFileModalattr(' . "'" . $directory . '/' . $file . '/&perpage=' . $count . "&#directory'" . '); return false;"  href="#"><span class="OFolderIcon"></span></a> ';
            unset($count);
        } elseif (in_array(extension($file), $_extensions[2]))
            $html.='<a data-toggle="tooltip" title="' . $lang[3] . '" onclick="SetShowFileModalattr(' . "'" . $directory . '/' . $file . "'" . '); return false;" href="#"><span class="ImageIcon"></span></a> ';
        elseif (in_array(extension($file), array("zip", "rar", "7z", "gzip", "tar", "wim", "xz")))
            $html.='<a data-toggle="tooltip" title="' . $lang[41] . '" onclick="SetZipFileModalattr(' . "'" . $directory . '/' . $file . '&dir=' . $directory . '&page=' . $page . "'" . '); return false;" href="#"><span class="ZipIcon"></span></a> ';
        else
            $html.='<a data-toggle="tooltip" title="' . $lang[3] . '" onclick="SetShowFileModalattr(' . "'" . $directory . '/' . $file . "'" . '); return false;" href="#"><span class="ShowIcon"></span></a> ';
    }
    $html.='<a data-toggle="tooltip" title="' . $lang[40] . '" onclick="SetCopyFileModalattr(' . "'" . $directory . '/' . $file . '&dir=' . $directory . '&page=' . $page . "'" . '); return false;" href="#"><span class="CopyIcon"></span></a>';
    $html.='<a data-toggle="tooltip" title="' . $lang[20] . '" onclick="SetRenameModalattr(' . "'" . $directory . '/' . $file . '&dir=' . $directory . '&page=' . $page . "'" . '); return false;" href="#"><span class="RenameIcon"></span></a>';
    $html.='<a data-toggle="tooltip" title="' . $lang[44] . '" id="my_iframe" return false;" href="' . $directory . '/' . $file . '" download ><span class="DownloadIcon"></span></a>';
    return $html;
}

function _read($file, $Modes = "r") {
    global $lang;

    $file_size = filesize($file);
    if (!$file_size || !is_readable($file))
        return $lang[21];

    $myfile = fopen($file, $Modes);
    if (!$myfile)
        return $lang[21]; //w
    return fread($myfile, $file_size);
    fclose($myfile);
}

;

function _write($file, $txt = '', $Modes = "w") {
    global $lang;

    if (file_exists($file) && $txt == '')
        return $lang[43];

    if (file_exists($file) && (!filesize($file) || !is_readable($file) ))
        return $lang[21];

    $myfile = fopen($file, $Modes);
    if (!$myfile)
        return $lang[21]; //w
    if (fwrite($myfile, $txt)) {
        fclose($myfile);
        return $lang[34];
    } else {
        fclose($myfile);
        return $lang[33];
    }
}

;

function GetOldirectory() {
    global $directory, $page, $lang;

    $html = '<li><a href="#" onclick="getContent(' . "'dir=." . "'" . ',0); return false;">' . $lang[4] . '</a></li>';
    $newDir = '.';
    $elements = explode('/', $directory);
    if (is_array($elements) || is_object($elements))
        foreach ($elements as $key_value) {
            if ($key_value != '.') {
                $newDir = $newDir . '/' . $key_value;
                $html.='<li><a href="#" onclick="getContent(' . "'dir=" . $newDir . '&page=' . $page . "'" . ',0); return false;">' . $key_value . '</a></li>';
            }
        }

    return $html;
}

function filesize_formatted($path) {
    global $units;
    if (is_dir($path) || $path == './Match_not_found')
        return '--'; //directory 
    $size = filesize($path);
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

function fileTime($index, $file) {
    global $times;
    if ($file == 'Match_not_found')
        return '--';
    return $times[$index];
}

;

if (isset($_GET['table']) && AJAX_request()) {

    $html = '<div class="table-responsive"><table class="table table-bordered table-striped table-hover js-basic-example dataTable ' . $table_fixed . '"><thead><tr>';
    if ($table_fixed == '')
        $html.='<th class="col-md-4">' . $lang[5] . '</th><th class="hidden-xs col-md-2">' . $lang[6] . '</th><th class="hidden-xs col-md-2">' . $lang[7] . '</th><th class="hidden-xs col-md-2">' . $lang[28] . '</th>';
    else
        $html.='<th class="col-xs-12 col-sm-6">' . $lang[5] . '</th><th class="hidden-xs col-xs-2 col-sm-2 col-md-2">' . $lang[6] . '</th><th class="hidden-xs col-xs-2 col-sm-2 col-md-2">' . $lang[7] . '</th>';

    $html.='<th class="hidden-xs col-md-2">' . $lang[8] . '</th></tr></thead><tbody>';
//output appropriate items
    if (is_array($files) || is_object($files))
        foreach ($files as $index => $file) {
            $html.='<tr>';
            if ($table_fixed == '')
                $html.='<td class="col-md-3">' . showfile($file) . '</td><td class="hidden-xs col-md-2">' . file_size($file) . '</td><td class="hidden-xs col-md-2">' . extension($file) . '</td><td class="hidden-xs col-md-2">' . fileTime($index, $file) . '</td>';
            else
                $html.='<td class="col-xs-12 col-sm-5">' . showfile($file) . '</td><td class="hidden-xs col-xs-2 col-sm-2 col-md-2">' . file_size($file) . '</td><td class="hidden-xs col-xs-2 col-sm-2 col-md-2"><span class="label label-default">' . extension($file) . '</span></td>';

            $html.='<td class="hidden-xs col-xs-3 col-sm-3 col-md-3">' . action($file) . '</td></tr>';
        }


    $html.='<tr>';
    if ($table_fixed == '')
        $html.='<td colspan="5" class="col-xs-12 col-sm-12 col-md-12">';
    else
        $html.='<td colspan="4" class="col-xs-12 col-sm-12 col-md-12">';
    $html.=$lang[9] . ' : <mark>' . $page . '</mark> ' . $lang[10] . ' : <mark>' . $total_files . '</mark></td></tr></tbody></table></div>';
    if ($alert_msg != '')
        $alert_msg = alert($alert_msg);
    $response = array('table' => $html, 'total' => $total_pages, 'page' => $page, 'dir' => $directory, 'dirHtml' => GetOldirectory(), 'alert' => $alert_msg);
    unset($html);
    die(print_array($response));
}

// free memory
unset($files);
unset($times);
//unset($directory);
unset($total_files);
//unset($page);
unset($offset);
//unset($total_pages);
unset($perpage);
unset($table_fixed);
unset($RTL_languages);
unset($show_file_or_dir);
unset($alert_msg);
?>
<!DOCTYPE html>
<html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta charset="<?php echo $charset ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <?php echo css(); ?> 
        <link rel="icon" href="../images/popcom.png" type="image/x-icon">
        <title>Intranet</title>

        <!-- Google Fonts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href="../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

        <!-- Sweetalert Css -->
        <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <!-- Waves Effect Css -->
        <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Preloader Css -->
        <link href="../plugins/material-design-preloader/md-preloader.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../css/themes/all-themes.css" rel="stylesheet" />
        <link href="../theme/css/ui/ui.print.css?version=x.x.x" media="print" rel="stylesheet" type="text/css" >
        
        
        

        <style>
            .ZipIcon {background:url(<?php echo $icon[0]; ?>) no-repeat left center; padding: 5px 0 5px 25px;margin-left: 5px;}
            .ImageIcon {background:url(<?php echo $icon[1]; ?>) no-repeat left center; padding: 5px 0 5px 25px;margin-left: 5px;}
            .CopyIcon {background:url(<?php echo $icon[2]; ?>) no-repeat left center; padding: 5px 0 5px 25px;margin-left: 5px;}		
            .CFolderIcon {background:url(<?php echo $icon[3]; ?>) no-repeat left center; padding: 5px 0 5px 25px;margin-left: 5px;}
            .OFolderIcon {background:url(<?php echo $icon[4]; ?>) no-repeat left center; padding: 5px 0 5px 25px;margin-left: 5px;}
            .PhpIcon{background:url( <?php echo $icon[5]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .RemoveIcon {background:url(<?php echo $icon[6]; ?>) no-repeat left center; padding: 5px 0 5px 25px;margin-left: 5px;}
            .RenameIcon{background:url( <?php echo $icon[7]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .DownloadIcon{background:url( <?php echo $icon[7]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .ShowIcon {background:url(<?php echo $icon[8]; ?>) no-repeat left center; padding: 5px 0 5px 25px;margin-left: 5px;}
            .TreeIcon{background:url( <?php echo $icon[9]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .ExplorIcon{background:url( <?php echo $icon[10]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .UploadIcon{background:url( <?php echo $icon[11]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .UserIcon{background:url( <?php echo $icon[12]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .LogoutIcon{background:url(  <?php echo $icon[13]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}
            .DownloadIcon{background:url(  <?php echo $icon[16]; ?>) no-repeat left center;padding: 5px 0 5px 25px;margin-left: 5px;}

            .table,.breadcrumb,.navbar-default{border: 1px solid #D8D8D8;background: #fff none repeat scroll 0% 0%;}
            .container_01{border: 1px solid #D8D8D8;background: #fff none repeat scroll 0% 0%;padding: 25px;margin-bottom:20px;}
            .Loading{background:url(<?php echo $icon[15]; ?>) no-repeat center center; padding: 25px ;}
            body {background: #F1F1F1 none repeat scroll 0% 0%;margin-bottom:20px;}
            td{font-size: 12px;}
            .pagination { margin:0px;}
            .table-fixed { border-top: 0px ;}
            .table-fixed thead { width: 97%;}
            .table-fixed tbody {height: 300px;overflow-y: auto;width: 100%;}
            .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {display: block;}
            .table-fixed tbody td, .table-fixed thead > tr> th {float: left;border-bottom-width: 1px;}
            .btn-file {position: relative;overflow: hidden;}
            .btn-file input[type=file] {position: absolute;top: 0;right: 0;min-width: 100%;min-height: 100%;font-size: 100px;text-align: right;filter: alpha(opacity=0);opacity: 0;outline: none; background: white;cursor: inherit;display: block;}
            .navbar-brand {font-size: 14px;}

            .treeview, .treeview ul {margin:0;padding:0;list-style:none;color: #D8D8D8;}
            .treeview ul { margin-left:1em;position:relative}
            .treeview ul ul {margin-left:.5em}

            .treeview li {margin:0;padding:0 1em;line-height:2em;position:relative}
            <?php if ($is_rtl) { ?>
                .treeview ul:before {content:"";display:block;width:0;position:absolute;top:0;right:0;border-right:1px solid;bottom:15px;}
                .treeview ul li:before {content:"";display:block;width:10px;height:0;border-top:1px solid;margin-top:-1px;position:absolute;top:1em;right:0}
            <?php } else { ?>
                .treeview ul:before {content:"";display:block;width:0;position:absolute;top:0;left:0;border-left:1px solid;bottom:15px;}
                .treeview ul li:before {content:"";display:block;width:10px;height:0;border-top:1px solid;margin-top:-1px;position:absolute;top:1em;left:0}
            <?php } ?>
        </style>
        <style>
            .chatbody {
                height: 650px;
                right: 0;
                width: auto;
                background-color: #fff;
                // border-style: solid;
                //border-color: #434343;
                //border-bottom: none;
                box-shadow: 2px 5px 10px #888888;
                border-radius: 5px;
                border-bottom-right-radius: 0px;
                border-bottom-left-radius: 0px;
                padding: 40px;
                overflow-y: scroll;
                border-width: 2px;
            }
            .chatboxM {
                float: left;
                resize: none;
                height: 100px;
                right: 0;
                width: calc(100% - 40px * 2);
                box-shadow: 2px 5px 10px #888888;
                border-top-width: 1px;
                border-radius: 5px;
                border-top-right-radius: 0px;
                border-top-left-radius: 0px;
                border-bottom-right-radius: 0px;
                border: none;
                background-color: #e8e8e8;
                padding: 10px;
                //border-style: solid;
                //border-color: #434343;
                //border-width: 2px;
                //border-top-color: #727272;
            }
            .chatbutton {
                margin-top: -40px;
                margin-left: -40px;
                float: right; 
                background-color: #434343; 
                height: 100px; 
                width: 100px; 
                padding: 0; 
                border: 0; 
                border-radius: 2px; 
                font-family: Fontawesome;
                color: skyblue; 
                cursor: pointer;
                box-shadow: 2px 5px 10px #888888;
            }

            /* Let's get this party started */
            .chatbody::-webkit-scrollbar {
                width: 8px;
            }

            /* Track */
            .chatbody::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
                -webkit-border-radius: 2px;
                border-radius: 2px;
            }

            /* Handle */
            .chatbody::-webkit-scrollbar-thumb {
                -webkit-border-radius: 10px;
                border-radius: 2px;
                background: #009d21; 
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
            }
            .chatbody::-webkit-scrollbar-thumb:window-inactive {
                background: rgba(255,0,0,0.4); 
            }
            .dontprint
            { 
                display: none; 
            }
            
        </style>
        <style>
            //@import url(https://fonts.googleapis.com/css?family=Roboto:300);
            .rlink{
                text-decoration: none;
                color: #74c35a;
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
        </style>
        <style type="text/css">
            .select-boxes{width: 280px;text-align: center;}
            select {
                border-color: #dadada;
                border-top: none;
                border-right: none;
                border-left: none;
                color: #969696;
                font-family: Arial;
                font-size: 14px;
                height: 39px;
                padding: 7px 8px;
                width: 250px;
                outline: none;
                margin: 5px 0 10px 0;
            }
            select option{
                font-family: Georgia;
                font-size: 14px;
            }
        </style>
        <script src="jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                //-------------- UPDATE ---------------

                $(this).closest('td').prev().find('input').css('color', 'red');

                $('body').on('change', '#work input[type=checkbox]', function () {
//                        alert($(this).attr('name'))

//                        alert()
                    if ($(this).is(':checked')) {
                        $(this).closest('div').find('#WEupto').hide()
                        $(this).closest('div').find('#WEupTpre').show()
//                            $('#WEupto').hide();
//                            $('#WEupTpre').show();
                    } else {
                        $(this).closest('div').find('#WEupto').show()
                        $(this).closest('div').find('#WEupTpre').hide()
//                            $('#WEupto').show();
//                            $('#WEupTpre').hide();
                    }
                });

//                if ($('#ig_checkbox').is(':checked')) {
//                    $('#WEupto').hide();
//                    $('#WEupTpre').show();
//                } else {
//                    $('#WEupto').show();
//                    $('#WEupTpre').hide();
//                }

//                $('#work input[type=checkbox]').each(function(){
//                    
//                    $(this).on('change', function () {
//                        
//                        if ($(this).is(':checked')) {
//                            $(this).closest('div').find('div:eq(1)').show()
//                            $(this).closest('div').find('div:eq(0)').hide()
////                            $('#WEupto').hide();
////                            $('#WEupTpre').show();
//                        } else {
//                            $(this).closest('div').find('div:eq(1)').hide()
//                            $(this).closest('div').find('div:eq(0)').show()
////                            $('#WEupto').show();
////                            $('#WEupTpre').hide();
//                        }
//                    });
//                })







                $('#country').on('change', function () {
                    var countryID = $(this).val();
                    if (countryID) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajaxData.php',
                            data: 'country_id=' + countryID,
                            success: function (html) {
                                $('#state').html(html);
                                $('#state').selectpicker('refresh')
                                $('#city').html('<option value="">Select Province first</option>');
                                $('#barangay').html('<option value="">Select city first</option>');
                            }
                        });
                    } else {
                        $('#state').html('<option value="">Select region first</option>');
                        $('#city').html('<option value="">Select province first</option>');
                        $('#barangay').html('<option value="">Select city first</option>');
                    }
                });

                $('#state').on('change', function () {
                    var stateID = $(this).val();
                    if (stateID) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajaxData.php',
                            data: 'state_id=' + stateID,
                            success: function (html) {
                                $('#city').html(html);
                                $('#city').selectpicker('refresh')
                                $('#barangay').html('<option value="">Select city first</option>');
                            }
                        });
                    } else {
                        $('#city').html('<option value="">Select province first</option>');
                        $('#barangay').html('<option value="">Select city first</option>');
                    }
                });

                $('#city').on('change', function () {
                    var cityID = $(this).val();
                    if (cityID) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajaxData.php',
                            data: 'city_id=' + cityID,
                            success: function (html) {
                                $('#barangay').html(html);
                                $('#barangay').selectpicker('refresh')
                            }
                        });
                    } else {
                        $('#barangay').html('<option value="">Select city first</option>');
                    }
                });



                //permanent address

                $('#country2').on('change', function () {
                    var countryID2 = $(this).val();
                    if (countryID2) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajaxData.php',
                            data: 'country_id2=' + countryID2,
                            success: function (html) {
                                $('#state2').html(html);
                                $('#state2').selectpicker('refresh')
                                $('#city2').html('<option value="">Select Province first</option>');
                                $('#barangay2').html('<option value="">Select city first</option>');
                            }
                        });
                    } else {
                        $('#state2').html('<option value="">Select region first</option>');
                        $('#city2').html('<option value="">Select province first</option>');
                        $('#barangay2').html('<option value="">Select city first</option>');
                    }
                });

                $('#state2').on('change', function () {
                    var stateID2 = $(this).val();
                    if (stateID2) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajaxData.php',
                            data: 'state_id2=' + stateID2,
                            success: function (html) {
                                $('#city2').html(html);
                                $('#city2').selectpicker('refresh')
                                $('#barangay2').html('<option value="">Select city first</option>');
                            }
                        });
                    } else {
                        $('#city2').html('<option value="">Select province first</option>');
                        $('#barangay2').html('<option value="">Select city first</option>');
                    }
                });

                $('#city2').on('change', function () {
                    var cityID2 = $(this).val();
                    if (cityID2) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajaxData.php',
                            data: 'city_id2=' + cityID2,
                            success: function (html) {
                                $('#barangay2').html(html);
                                $('#barangay2').selectpicker('refresh')
                            }
                        });
                    } else {
                        $('#barangay2').html('<option value="">Select city first</option>');
                    }
                });

            });
        </script>
        <script>
            function submitChat() {
                if (form1.msg.value == '') {
                    alert('ALL FIELDS ARE MANDATORY!!!');
                    return;
                }
                $('#imageload').show();
                var msg = form1.msg.value;
                var xmlhttp = new XMLHttpRequest();
                form1.msg.value = "";

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                        $('#imageload').hide();
                    }
                }
                xmlhttp.open('GET', '../insert.php?msg=' + msg, true);
                xmlhttp.send();

            }

            function clearContents(element) {
                element.value = '';
            }

        </script>
        <script>
            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#online').load('../online.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#chatlogs').load('../logs.php');
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
                    $('#notif').load('../notif.php');
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
                    $('#badge4').load('../badge4.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#offline').load('../offline.php');
                }, 1000);
            });

            $(document).ready(function (e) {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    $('#table2').load('../table2.php');
                }, 1000);
            });
        </script>
        <script>
            $("#chatlogs").scrollTop($('#chatlogs').height())
        </script>
        <?php
        include '../includes/status.php';
        ?>
    </head>

    <body class="theme-red zoom90" style="background-color: #e0e0e0;">
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
        <!-- #Top Bar -->
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
                    <!--<div>
                        <hr>
                        <div style="height: 200px;">
                            &nbsp;
                        </div>
                        <div>
                            <textarea style="width: 100%; height: 50px;" ></textarea>
                        </div>
                    </div>
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="../files/">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href= <?php //echo "' . $directory . '/' .  . '";                                                                                         ?> >
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
                    </ul>-->
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; 2018 <a href="javascript:void(0);" style="color: #002451;">POPCOM</a>.
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

        <section class="content" style=" margin-top: 120px;">
            <div  class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    PERSONAL DATA SHEET
                                    <small>UPDATE PERSONAL DATA SHEET</small>
                                    <?php
                                    /* if (isset($_SESSION['INTRA_CID'])) {
                                      $cid = $_SESSION['INTRA_CID'];
                                      $query = mysql_query("select * from table_empinfo where Employee_Id = '$cid'");
                                      $row = mysql_fetch_assoc($query);
                                      if (empty($row['Middlename'])) {
                                      echo ucfirst($row['Firstname']) . " " . ucfirst($row['Lastname']);
                                      } else {
                                      echo ucfirst($row['Firstname']) . " " . ucfirst(substr($row['Middlename'], 0, 1)) . ". " . ucfirst($row['Lastname']);
                                      }
                                      } */
                                    ?>

                                </h2>
                                <div class="pull-right">

                                </div>
                            </div>
                            <div style="min-height: 80vh; background-color: #f6f6f6;" class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                </h2>
                                                <div class="body">
                                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                                        <li role="presentation" class="active"><a href="#personal" data-toggle="tab">I. PERSONAL</a></li>
                                                        <li role="presentation"><a href="#family" data-toggle="tab">II. FAMILY</a></li>
                                                        <li role="presentation"><a href="#educational" data-toggle="tab">III. EDUCATIONAL</a></li>
                                                        <li role="presentation"><a href="#civil" data-toggle="tab">IV. CIVIL SERVICE</a></li>
                                                        <li role="presentation"><a href="#work" data-toggle="tab">V. WORK</a></li>
                                                        <li role="presentation"><a href="#voluntary" data-toggle="tab">VI. VOLUNTARY WORK</a></li>
                                                        <li role="presentation"><a href="#training" data-toggle="tab">VII. TRAINING</a></li>
                                                        <li role="presentation"><a href="#others" data-toggle="tab">VIII. OTHERS</a></li>
                                                    </ul>
                                                    <form method="post" enctype="multipart/form-data"  action="EditMyPDS.php" novalidate>
                                                        <div class="tab-content">

                                                            <div role="tabpanel" class="tab-pane fade in active" id="personal">

                                                                <div class="body table-responsive">
                                                                    <?php
                                                                    $id = $_SESSION['INTRA_PDS_ID'];
                                                                    $query = mysql_query("Select * from table_empinfo where Id = '$id'");
                                                                    $row = mysql_fetch_assoc($query);
                                                                    ?>
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="4" style="background-color: #aaaaaa; color: white;">I. PERSONAL INFORMATION</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 11px;">STATUS OF APPOINTMENT</th> 
                                                                                <td style="height: 5px;" colspan="3">
                                                                                    <input name="PIsoa" type="radio" id="radio_1a" class="with-gap radio-col-indigo" value="Plantilla"  
                                                                                    <?php
                                                                                    if (isset($row['Status_ofappointment']) && $row['Status_ofappointment'] == 'Plantilla') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>
                                                                                           />
                                                                                    <label for="radio_1a">Plantilla</label>
                                                                                    <input name="PIsoa" type="radio" id="radio_2a" class="with-gap radio-col-indigo" value="Job Order" 
                                                                                    <?php
                                                                                    if (isset($row['Status_ofappointment']) && $row['Status_ofappointment'] == 'Job Order') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>
                                                                                           />
                                                                                    <label for="radio_2a">Job Order</label>
                                                                                    <input name="PIsoa" type="radio" id="radio_3a" class="with-gap radio-col-indigo" value="New Applicant" 
                                                                                    <?php
                                                                                    if (isset($row['Status_ofappointment']) && $row['Status_ofappointment'] == 'New Applicant') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>
                                                                                           />
                                                                                    <label for="radio_3a">New Applicant</label>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">Employee ID</th> 
                                                                                <td colspan="3">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 150px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" value="<?php echo $row['Employee_Id']; ?>" name="PIempid"  placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">SURNAME</th> 
                                                                                <td colspan="3">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" value="<?php echo $row['Lastname']; ?>" name="PIsname"  placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">FIRST NAME</th> 
                                                                                <td colspan="3">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIfname" value="<?php echo $row['Firstname']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">MIDDLE NAME</th> 
                                                                                <td colspan="">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PImname" value="<?php echo $row['Middlename']; ?>"  placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">NAME EXTENSION(e.g. Jr., Sr.)</th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PInamex" value="<?php echo $row['NameExt']; ?>"  placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">DATE OF BIRTH</th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group">
                                                                                        <div class="form-line">
                                                                                            <input type="text" name="PIdob" class="datepicker form-control" placeholder="------ "  value="<?php echo ($row['DateOfBirth'] == '0000-00-00') ? '' : date('F d, Y', strtotime($row['DateOfBirth'])); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td rowspan="4" style="background-color: #f8f8f8; font-size: 12px; font-weight: bold;">
                                                                                    <p style="text-align: left; margin-top: 5px; font-size: 14px;">RESIDENTIAL ADDRESS</p>
                                                                                    <p style="text-align: left; margin-top: 30px;">REGION</p>
                                                                                    <p style="text-align: left; margin-top: 35px;">PROVINCE</p>
                                                                                    <p style="text-align: left; margin-top: 40px;">CITY</p>
                                                                                    <p style="text-align: left; margin-top: 35px;">BARANGAY</p>
                                                                                    <p style="text-align: left; margin-top: 30px;">SUBDIVISION/VILLAGE</p>
                                                                                    <p style="text-align: left; margin-top: 20px;">STREET</p>
                                                                                    <p style="text-align: left; margin-top: 20px;">HOUSE/BLOCK/LOT NO.</p>
                                                                                    <p style="text-align: left; margin-top: 30px;">ZIP CODE</p>
                                                                                    <!--<p style="text-align: left; margin-top: 25px;">TELEPHONE NO.</p>-->
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top: 30px; width: 200px;" class="form-group form-float">
                                                                                        <!--<div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIresadd" value="<?php //echo $row['ResidentialAdd'];                                                           ?>" placeholder="-------">
                                                                                        </div>-->
                                                                                        <?php
//Include database configuration file
//Get all country data
                                                                                        $sel = mysql_query("SELECT * FROM table_region ORDER BY region ASC");

//Count total number of rows
                                                                                        $rowCount = mysql_num_rows($sel);
                                                                                        ?>

                                                                                        <select name="country" id="country">

                                                                                            <option value="">Select Region</option>
                                                                                            <?php
                                                                                            if ($rowCount > 0) {
                                                                                                while ($row21 = mysql_fetch_assoc($sel)) {
                                                                                                    echo '<option value="' . $row21['region_id'] . '">' . strtoupper($row21['region']) . '</option>';
                                                                                                }
                                                                                            } else {
                                                                                                echo '<option value="">Region not available</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select><br>

                                                                                        <select name="state" id="state">
                                                                                            <?php
                                                                                            $proid = $row['RA_province'];
                                                                                            $pro = mysql_query("select * from table_province where province_id = '$proid'");
                                                                                            $prow = mysql_fetch_assoc($pro);
                                                                                            $province = $prow['province'];

                                                                                            if ($row['RA_province'] == 0) {
                                                                                                echo '<option value="">Select region first</option>';
                                                                                            } elseif ($row['RA_province'] != 0) {
                                                                                                echo '<option value="' . $row['RA_province'] . '">' . $province . '</option>';
                                                                                            }
                                                                                            ?>

                                                                                        </select><br>

                                                                                        <select name="city" id="city">
                                                                                            <?php
                                                                                            $citid = $row['RA_city'];
                                                                                            $cit = mysql_query("select * from table_city where city_id = '$citid'");
                                                                                            $crow = mysql_fetch_assoc($cit);
                                                                                            $city = $crow['city'];

                                                                                            if ($row['RA_city'] == 0) {
                                                                                                echo '<option value="">Select province first</option>';
                                                                                            } elseif ($row['RA_city'] != 0) {
                                                                                                echo '<option value="' . $row['RA_city'] . '">' . $city . '</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select><br>

                                                                                        <select name="barangay" id="barangay">
                                                                                            <?php
                                                                                            $barid = $row['RA_barangay'];
                                                                                            $bar = mysql_query("select * from table_barangay where barangay_id = '$barid'");
                                                                                            $brow = mysql_fetch_assoc($bar);
                                                                                            $barangay = $brow['barangay'];

                                                                                            if ($row['RA_barangay'] == 0) {
                                                                                                echo '<option value="">Select city first</option>';
                                                                                            } elseif ($row['RA_barangay'] != 0) {
                                                                                                echo '<option value="' . $row['RA_barangay'] . '">' . $barangay . '</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                        <div style="margin-bottom: -6px; margin-top:-7px; width: 250px;" class="form-group form-float">
                                                                                            <div class="form-line">
                                                                                                <input style="font-family: Arial;font-size: 14px; height: 39px; padding: 7px 12px" class="form-control" type="text" name="subvil" value="<?php echo $row['RA_subvil']; ?>"  placeholder="Subdivision/Village">
                                                                                            </div>
                                                                                            <div class="form-line">
                                                                                                <input style="font-family: Arial;font-size: 14px; height: 39px; padding: 7px 12px" class="form-control" type="text" name="street" value="<?php echo $row['RA_street']; ?>" placeholder="Enter Street">
                                                                                            </div>
                                                                                            <div class="form-line">
                                                                                                <input style="font-family: Arial;font-size: 14px; height: 39px; padding: 7px 12px" class="form-control" type="text" name="house" value="<?php echo $row['RA_house']; ?>" placeholder="House/Block/Lot No.">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">PLACE OF BIRTH </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group">
                                                                                        <div class="form-line">
                                                                                            <input type="text" name="PIpob" class="form-control" value="<?php echo $row['PlaceOfBirth']; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIrzip" value="<?php echo $row['RZipCode']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">SEX </th> 
                                                                                <td colspan="1"> 
                                                                                    <input name="PIsex" type="radio" class="with-gap radio-col-indigo" id="radio_1" value="Male" <?php
                                                                                    if ($row['Sex'] == "Male") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_1">Male</label>
                                                                                    <input name="PIsex" type="radio" class="with-gap radio-col-indigo" id="radio_2" value="Female" <?php
                                                                                    if ($row['Sex'] == "Female") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>  />
                                                                                    <label for="radio_2">Female</label>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <!--                                                                                    <div class="form-line">
                                                                                                                                                                                <input class="form-control" type="text" name="PIrtellno" value="<?php echo $row['RTelephoneNo']; ?>" placeholder="-------">
                                                                                                                                                                            </div>-->
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">CIVIL STATUS </th> 
                                                                                <td colspan="1"> 
                                                                                    <input name="PIcs" type="radio" id="radio_7" class="with-gap radio-col-indigo" value="Single" <?php
                                                                                    if ($row['CivilStatus'] == "Single") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>   />
                                                                                    <label for="radio_7">Single</label>
                                                                                    <input name="PIcs" type="radio" id="radio_8" class="with-gap radio-col-indigo" value="Married" <?php
                                                                                    if ($row['CivilStatus'] == "Married") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>   />
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="radio_8">Married</label><br>
                                                                                    <!--  <input name="PIcs" type="radio" id="radio_3" class="with-gap radio-col-indigo" value="Annulled" <?php
                                                                                    if ($row['CivilStatus'] == "Annulled") {
                                                                                        //echo 'checked';
                                                                                    }
                                                                                    ?>   
                                                                                     <label for="radio_3">Annulled</label>/>-->
                                                                                    <input name="PIcs" type="radio" id="radio_5" class="with-gap radio-col-indigo" class="with-gap radio-col-indigo" value="Separated" <?php
                                                                                    if ($row['CivilStatus'] == "Separated") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>   />
                                                                                    <label for="radio_5">Separated</label>
                                                                                    <input name="PIcs" type="radio" id="radio_4" class="with-gap radio-col-indigo" value="Widowed" <?php
                                                                                    if ($row['CivilStatus'] == "Widowed") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>   />
                                                                                    &nbsp;&nbsp;<label for="radio_4">Widowed</label><br>

                                                                                    <input name="PIcs" type="radio" id="radio_6" class="with-gap radio-col-indigo" value="Others"  <?php
                                                                                    if ($row['CivilStatus'] != "Single" && $row['CivilStatus'] != "Married" && $row['CivilStatus'] != "Annulled" && $row['CivilStatus'] != "Widowed" && $row['CivilStatus'] != "Separated" && !empty($row['CivilStatus'])) {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>/>
                                                                                    <label for="radio_6">Others, Specify</label>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width:150px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIspecify" value="<?php
                                                                                            if ($row['CivilStatus'] != "Single" && $row['CivilStatus'] != "Married" && $row['CivilStatus'] != "Annulled" && $row['CivilStatus'] != "Widowed" && $row['CivilStatus'] != "Separated" && !empty($row['CivilStatus'])) {
                                                                                                echo $row['CivilStatus'];
                                                                                            }
                                                                                            ?>"  placeholder="Specify here...">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">
                                                                                    CITIZENSHIP: <br><br><br><br><br><br>
                                                                                    If holder of dual citizenship,<br>
                                                                                    please indicate the detail.
                                                                                </th> 
                                                                                <td colspan="1">
                                                                                    <!--    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                <div class="form-line">
                                                                                                    <input class="form-control" type="text" name="PIcitizen" value="<?php //echo $row['Citizenship'];                                      ?>" placeholder="-------">
                                                                                                </div>
                                                                                            </div>-->

                                                                                    <input name="PIcitizen" type="radio" id="radio_9" class="with-gap radio-col-indigo" value="Filipino" <?php
                                                                                    if ($row['Citizenship'] == "Filipino") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_9">Filipino</label>
                                                                                    <input name="PIcitizen" type="radio" id="radio_10" class="with-gap radio-col-indigo" value="Dual Citizenship" <?php
                                                                                    if ($row['Citizenship'] == "Dual Citizenship") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_10">Dual Citizenship</label>
                                                                                    <br>
                                                                                    <input name="PIby" type="radio" id="radio_11a" class="with-gap radio-col-indigo" value="by birth" <?php
                                                                                    if ($row['Citizenship_by'] == "by birth") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>/>
                                                                                    <label for="radio_11a">by birth</label>
                                                                                    <input name="PIby" type="radio" id="radio_12a" class="with-gap radio-col-indigo" value="by naturalization" <?php
                                                                                    if ($row['Citizenship_by'] == "by naturalization") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?>/>
                                                                                    <label for="radio_12a">by naturalization</label>
                                                                                    <br><br>
                                                                                    <select name="PIcounsel" data-live-search="true">
                                                                                        <?php
                                                                                        if (isset($row['Citizenship_country'])) {
                                                                                            echo '<option value="' . $row['Citizenship_country'] . '">' . $row['Citizenship_country'] . '</option>';
                                                                                        } else {
                                                                                            echo '<option value="">-- Select Country --</option>';
                                                                                        }
                                                                                        
                                                                                        $quer = mysql_query("SELECT * FROM table_countries");
                                                                                        while ($row10 = mysql_fetch_array($quer)) {
                                                                                            echo '<option value="' . $row10['country_name'] . '">' . $row10['country_name'] . '</option>';
                                                                                        }
                                                                                        ?>
                                                                                        
                                                                                        <option value="Philippines">Philippines</option>
                                                                                        <option value="China">China</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td rowspan="4" style="background-color: #f8f8f8; font-size: 12px; font-weight: bold;">
                                                                                    <!--                                                                                    PERMANENT ADDRESS <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                                                                                                                                                        ZIP CODE <br><br><br>
                                                                                                                                                                        TELEPHONE NO. <br><br>-->
                                                                                    <p style="text-align: left; margin-top: 5px; font-size: 14px;">PERMANENT ADDRESS</p>
                                                                                    <p style="text-align: left; margin-top: 30px;">REGION</p>
                                                                                    <p style="text-align: left; margin-top: 35px;">PROVINCE</p>
                                                                                    <p style="text-align: left; margin-top: 40px;">CITY</p>
                                                                                    <p style="text-align: left; margin-top: 35px;">BARANGAY</p>
                                                                                    <p style="text-align: left; margin-top: 30px;">SUBDIVISION/VILLAGE</p>
                                                                                    <p style="text-align: left; margin-top: 20px;">STREET</p>
                                                                                    <p style="text-align: left; margin-top: 20px;">HOUSE/BLOCK/LOT NO.</p>
                                                                                    <p style="text-align: left; margin-top: 30px;">ZIP CODE</p>
                                                                                    <p style="text-align: left; margin-top: 25px;">TELEPHONE NO.</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top: 30px; width: 200px;" class="form-group form-float">
                                                                                        <!--<div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIperadd" value="<?php //echo $row['PermanentAdd'];                       ?>" placeholder="-------">
                                                                                        </div>-->
                                                                                        <?php
//Include database configuration file
//Get all country data
                                                                                        $sel2 = mysql_query("SELECT * FROM table_region ORDER BY region ASC");

//Count total number of rows
                                                                                        $rowCount2 = mysql_num_rows($sel2);
                                                                                        ?>

                                                                                        <select name="country2" id="country2">
                                                                                            <option value="">Select Region</option>
                                                                                            <?php
                                                                                            if ($rowCount2 > 0) {
                                                                                                while ($row2 = mysql_fetch_assoc($sel2)) {
                                                                                                    echo '<option value="' . $row2['region_id'] . '">' . strtoupper($row2['region']) . '</option>';
                                                                                                }
                                                                                            } else {
                                                                                                echo '<option value="">Region not available</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select><br>

                                                                                        <select name="state2" id="state2">
                                                                                            <?php
                                                                                            $proid2 = $row['PA_province'];
                                                                                            $pro2 = mysql_query("select * from table_province where province_id = '$proid2'");
                                                                                            $prow2 = mysql_fetch_assoc($pro2);
                                                                                            $province2 = $prow2['province'];

                                                                                            if ($row['PA_province'] == 0) {
                                                                                                echo '<option value="">Select region first</option>';
                                                                                            } elseif ($row['PA_province'] != 0) {
                                                                                                echo '<option value="' . $row['PA_province'] . '">' . $province2 . '</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select><br>

                                                                                        <select name="city2" id="city2">
                                                                                            <?php
                                                                                            $citid2 = $row['PA_city'];
                                                                                            $cit2 = mysql_query("select * from table_city where city_id = '$citid2'");
                                                                                            $crow2 = mysql_fetch_assoc($cit2);
                                                                                            $city2 = $crow2['city'];

                                                                                            if ($row['PA_city'] == 0) {
                                                                                                echo '<option value="">Select province first</option>';
                                                                                            } elseif ($row['PA_city'] != 0) {
                                                                                                echo '<option value="' . $row['PA_city'] . '">' . $city2 . '</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select><br>

                                                                                        <select name="barangay2" id="barangay2">
                                                                                            <?php
                                                                                            $barid2 = $row['PA_barangay'];
                                                                                            $bar2 = mysql_query("select * from table_barangay where barangay_id = '$barid2'");
                                                                                            $brow2 = mysql_fetch_assoc($bar2);
                                                                                            $barangay2 = $brow2['barangay'];

                                                                                            if ($row['PA_barangay'] == 0) {
                                                                                                echo '<option value="">Select city first</option>';
                                                                                            } elseif ($row['PA_barangay'] != 0) {
                                                                                                echo '<option value="' . $row['PA_barangay'] . '">' . $barangay2 . '</option>';
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                        <div style="margin-bottom: -6px; margin-top:-7px; width: 250px;" class="form-group form-float">
                                                                                            <div class="form-line">
                                                                                                <input style="font-family: Arial;font-size: 14px; height: 39px; padding: 7px 12px" class="form-control" type="text" name="subvil2" value="<?php echo $row['PA_subvil']; ?>"  placeholder="Subdivision/Village">
                                                                                            </div>
                                                                                            <div class="form-line">
                                                                                                <input style="font-family: Arial;font-size: 14px; height: 39px; padding: 7px 12px" class="form-control" type="text" value="<?php echo $row['PA_street']; ?>" name="street2"  placeholder="Enter Street">
                                                                                            </div>
                                                                                            <div class="form-line">
                                                                                                <input style="font-family: Arial;font-size: 14px; height: 39px; padding: 7px 12px" class="form-control" type="text" name="house2" value="<?php echo $row['PA_house']; ?>"  placeholder="House/Block/Lot No.">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">WEIGHT (kg) </th> 
                                                                                <td colspan="1"> 
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIweight" value="<?php echo $row['Weight']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIpzip" value="<?php echo $row['PZipCode']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">HEIGHT (m) </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIheight" value="<?php echo $row['Height']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIptellno" value="<?php echo $row['PTelephoneNo']; ?>" placeholder="Ex: (00)-000-0000">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">BLOOD TYPE </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIbt" value="<?php echo $row['BloodType']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">GSIS ID NO. </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIgsis" value="<?php echo $row['GSIS']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">E-MAIL ADDRESS (if any) </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIemail" value="<?php echo $row['Email']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">PAG-IBIG ID NO. </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIpi" value="<?php echo $row['PAGIBIG']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">CELLPHONE NO. (if any) </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIcpno" value="<?php echo $row['CellphoneNo']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">PHILHEALTH NO. </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIph" value="<?php echo $row['PHILHEALTH']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">AGENCY EMPLOYEE NO. </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIaeno" value="<?php echo $row['AgencyEmpNo']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">SSS ID NO. </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PIsss" value="<?php echo $row['SSS']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">TIN </th> 
                                                                                <td colspan="1">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="PItin" value="<?php echo $row['TIN']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>


                                                                    </table>
                                                                    <input type="submit" class="btn bg-teal waves-effect" name="btnBack" value="Back">
                                                                </div>
                                                            </div>

                                                            <div role="tabpanel" class="tab-pane fade" id="family">
                                                                <div class="body table-responsive">
                                                                    <?php
                                                                    $query1 = mysql_query("Select * from table_empinfofb where Pds_Id = '$id'");
                                                                    $row1 = mysql_fetch_assoc($query1);
                                                                    ?>
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="4" style="background-color: #aaaaaa; color: white;">II. FAMILY BACKGROUND</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <table class="table table-bordered ">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-bottom: none; background-color: #f8f8f8; font-size: 12px;">SPOUSE'S SURNAME</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBssname" value="<?php echo $row1['Spouse_sname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-bottom: none; border-top: none; background-color: #f8f8f8; font-size: 12px;">FIRST NAME</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBsfname" value="<?php echo $row1['Spouse_fname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-bottom: none; border-top: none; background-color: #f8f8f8; font-size: 12px;">MIDDLE NAME</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBsmname" value="<?php echo $row1['Spouse_mname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-top: none; background-color: #f8f8f8; font-size: 12px;">NAME EXTENSION</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input class="form-control" type="text" name="FBsnameext" value="<?php echo $row1['Spouse_extname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">OCCUPATION</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBocc" value="<?php echo $row1['Spouse_occupation']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">EMPLOYER/BUS. NAME</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBebn" value="<?php echo $row1['Spouse_empbusname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">BUSINESS ADDRESS</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBbusadd" value="<?php echo $row1['Spouse_busadd']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="background-color: #f8f8f8; font-size: 12px;">TELEPHONE NO.</th> 
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBtellno" value="<?php echo $row1['Spouse_telephone']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-bottom: none; background-color: #f8f8f8; font-size: 12px;">FATHER'S SURNAME</th>
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBfsname" value="<?php echo $row1['Father_sname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-top: none; border-bottom: none; background-color: #f8f8f8; font-size: 12px;">FIRST NAME</th>
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBffname" value="<?php echo $row1['Father_fname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-top: none; border-bottom: none; background-color: #f8f8f8; font-size: 12px;">MIDDLE NAME</th>
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBfmname" value="<?php echo $row1['Father_mname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-top: none;  background-color: #f8f8f8; font-size: 12px;">NAME EXTENSION</th>
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input class="form-control" type="text" name="FBfnameext" value="<?php echo $row1['Father_extname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" colspan="2" style="border-bottom: none; background-color: #f8f8f8; font-size: 12px;">MOTHER'S MAIDEN NAME</th> 
                                                                                            </tr>
                                                                                            <tr> 
                                                                                                <th scope="row" style="border-top: none; border-bottom: none;  background-color: #f8f8f8; font-size: 12px;">SURNAME</th>
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBmsname" value="<?php echo $row1['Mother_sname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-top: none; border-bottom: none; background-color: #f8f8f8; font-size: 12px;">FIRST NAME</th>
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBmfname" value="<?php echo $row1['Mother_fname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="border-top: none;  background-color: #f8f8f8; font-size: 12px;">MIDDLE NAME</th>
                                                                                                <td colspan="">
                                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">
                                                                                                        <div class="form-line">
                                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="FBmmname" value="<?php echo $row1['Mother_mname']; ?>" placeholder="-------">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>

                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td>

                                                                                    <input type="button" id="btAdd" name="btAdd" value="+" class="btn btn-primary waves-effect bt" />&nbsp;
                                                                                    <input type="button" onclick="btRemove()" id="btRemove" name="btRemove" value="-" class="btn btn-primary waves-effect bt" />
                                                                                    <table id="qualificationTable" class="table table-bordered">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th style="background-color: #f8f8f8; font-size: 12px;">NAME OF CHILD</th>
                                                                                                <th style="background-color: #f8f8f8; font-size: 12px;">DATE OF BIRTH</th>
                                                                                                <th style="background-color: #f8f8f8; font-size: 12px;">ACTION</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody id='main'>
                                                                                            <?php
                                                                                            $query2 = mysql_query("Select * from table_empinfofbchild where Pds_Id = '$id'");
                                                                                            while ($row2 = mysql_fetch_array($query2)) {
                                                                                                $childdob = ($row2['Date_ofbirth'] == '0000-00-00') ? '' : date("F d, Y", strtotime($row2['Date_ofbirth']));
                                                                                                echo '<tr><td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">' .
                                                                                                '<div class="form-line"><input style="font-size: 12px;" value="' . $row2['Name_ofchild'] . '" class="form-control" name="FBupname' . $row2['Id'] . '" type="text" placeholder="-------"></div></div></td>' .
                                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">' .
                                                                                                '<div class="form-line"><input style="font-size: 12px;" value="' . $childdob . '" placeholder="------" class="datepicker form-control" name="FBupdob' . $row2['Id'] . '" type="text"></div></div></td>' .
                                                                                                '<td><a href="EditMyPDS.php?id=' . $_SESSION['INTRA_PDS_ID'] . '&cid=' . $row2['Id'] . '&act=del" style="font-size: 12px;" class="btn bg-red btn-xs waves-effect">Delete</a></td></tr>';
                                                                                            }
                                                                                            ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div role="tabpanel" class="tab-pane fade" id="educational" style="min-height: 68vh;">
                                                                <div class="body table-responsive">
                                                                    <input type="button" id="btAddEdu" value="+" class="btn btn-primary waves-effect btEdu" />&nbsp;
                                                                    <input type="button" id="btRemoveEdu" value="-" class="btn btn-primary waves-effect btEdu" />
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="10" style="background-color: #aaaaaa; color: white;">III. EDUCATIONAL BACKGROUND</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">LEVEL<br><br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">NAME OF SCHOOL<br> (Write in full)<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">DEGREE COURSE<br> (Write in full)<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">YEAR<br> GRADUATED<br> (if graduated)<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">HIGHEST GRADE/<br> LEVEL/<br> UNITS EARNED<br> (if not graduated)</th>
                                                                                <th colspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">INCLUSIVE DATE OF<br> ATTENDANCE</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">SCHOLARSHIP/<br> ACADEMIC HONORS<br> RECEIVED<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">ACTION<br><br>&nbsp;</th>
                                                                            </tr>
                                                                            <tr><th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">From</th><th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">To</th></tr>
                                                                        </thead>
                                                                        <tbody id="mainEdu">
                                                                            <?php
                                                                            $query3 = mysql_query("Select * from table_empinfoeb where Pds_Id = '$id'");
                                                                            $ebi = 1;
                                                                            while ($row3 = mysql_fetch_array($query3)) {

                                                                                echo '<tr><td>' .
                                                                                '<select name="EBuplevel' . $row3['Id'] . '" style="font-size: 12px;outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 150px;" class="form-control show-tick">' .
                                                                                '<option value="' . $row3['Level'] . '">' . $row3['Level'] . '</option>' .
                                                                                '<option value="Elementary">Elementary</option>' .
                                                                                '<option value="Secondary">Secondary</option>' .
                                                                                '<option value="Vocational/Trade Course">Vocational/Trade Course</option>' .
                                                                                '<option value="College">College</option>' .
                                                                                '<option value="Graduate Studies">Graduate Studies</option>' .
                                                                                '</select></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" name="EBupname' . $row3['Id'] . '" class="form-control" type="text" value="' . $row3['Name'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td>' .
                                                                                '<div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control" name="EBupdegree' . $row3['Id'] . '" type="text" value="' . $row3['Degree'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control" name="EBupyear' . $row3['Id'] . '" type="text" value="' . $row3['Year'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 180px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control" name="EBuphighest' . $row3['Id'] . '"type="text" value="' . $row3['Highest'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 80px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control" name="EBupfrom' . $row3['Id'] . '"type="text" value="' . $row3['Date_from'] . '" placeholder="mm/dd/yyyy" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 80px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control" name="EBupto' . $row3['Id'] . '" type="text" value="' . $row3['Date_to'] . '" placeholder="mm/dd/yyyy" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control" name="EBupscholar' . $row3['Id'] . '" type="text" value="' . $row3['Scholar'] . '" placeholder="-------"></div></div></td>'
                                                                                . '<td><a style="font-size: 12px;" href="EditMyPDS.php?id=' . $_SESSION['INTRA_PDS_ID'] . '&eid=' . $row3['Id'] . '&act=del" class="btn bg-red btn-xs waves-effect" >Delete</a></td></tr>';

//                                                                                <td>' .
//                                                                                '<select name="EBupba' . $row3['Id'] . '" style="font-size: 12px; outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 80px;" class="form-control show-tick">' .
//                                                                                '<option value="' . $deg[0] . '">' . $deg[0] . '</option>' .
//                                                                                '<option value="BS">BS</option>' .
//                                                                                '<option value="AB">AB</option>' .
//                                                                                '<option value="MS">MS</option>' .
//                                                                                '<option value="MA">MA</option>' .
//                                                                                '<option value="PHD Studies">PHD</option>' .
//                                                                                '<option value="MD Studies">MD</option>' .
//                                                                                '</select></td>
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div role="tabpanel" class="tab-pane fade" id="civil" style="min-height: 68vh;">
                                                                <div class="body table-responsive">
                                                                    <input type="button" id="btAddCiv" value="+" class="btn btn-primary waves-effect btCiv" />&nbsp;
                                                                    <input type="button" id="btRemoveCiv" value="-" class="btn btn-primary waves-effect btCiv" />
                                                                    <table class="table table-bordered ">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="9" style="background-color: #aaaaaa; color: white;">IV. CIVIL SERVICE ELIGIBILITY</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">CAREER SERVICE/ RA 1080(BOARD/BAR) UNDER<br>SPECIAL LAWS/ CES/ CSEE<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">RATING<br><br>&nbsp;</th>
                                                                                <th colspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">DATE OF EXAMINATION/<br> CONFERMENT&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">PLACE OF EXAMINATION / CONFERMENT<br><br>&nbsp;</th>
                                                                                <th colspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">LICENSE (if applicable)</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">UPLOAD<br><br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">ACTION<br><br>&nbsp;</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">FROM</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">TO</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">NUMBER</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">DATE OF<br> RELEASE</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id='mainCiv'>
                                                                            <?php
                                                                            $query4 = mysql_query("Select * from table_empinfocs where Pds_Id = '$id'");
//$query4 = mysql_query("Select table_empinfocs.*, table_eligibility.* from table_empinfocs CROSS JOIN table_eligibility where table_empinfocs.Pds_Id = '$id'");
                                                                            while ($row4 = mysql_fetch_array($query4)) {
                                                                                echo '<tr><td><div style="margin-bottom: -6px; margin-top:-7px; width: 290px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<select  name="CSupcareer' . $row4['Id'] . '" style="font-size: 12px; outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 290px;">' .
                                                                                '<option value="' . $row4['Career_service'] . '">' . $row4['Career_service'] . '</option>';
                                                                                $query5 = mysql_query("Select * from table_eligibility");
                                                                                while ($row5 = mysql_fetch_array($query5)) {
                                                                                    echo '<option value="' . $row5['Eligibility'] . '">' . $row5['Eligibility'] . '</option>';
                                                                                }
                                                                                $doe = explode(' ', $row4['Date_ofexam']);
                                                                                $csfrom = ($doe[0] == '0000-00-00') ? '' : date("F d, Y", strtotime($doe[0]));
                                                                                $csto = ($doe[1] == '0000-00-00') ? '' : date("F d, Y", strtotime($doe[1]));

                                                                                echo '</select>' .
                                                                                '</div></div></td><td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputCiv" value="' . $row4['Rating'] . '" type="number" name="CSuprating' . $row4['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 120px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="datepicker form-control inputCiv" value="' . $csfrom . '" type="text" placeholder="mm/dd/yyyy" name="CSupdoeFrom' . $row4['Id'] . '"></div></div></td><td>' .
                                                                                '<div style="margin-bottom: -6px; margin-top:-7px; width: 120px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="datepicker form-control inputCiv" value="' . $csto . '" type="text" placeholder="mm/dd/yyyy" name="CSupdoeTo' . $row4['Id'] . '"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 250px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputCiv" value="' . $row4['Place_ofexam'] . '" type="text" name="CSuppoe' . $row4['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 80px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputCiv" value="' . $row4['Number'] . '" type="text" name="CSupnumber' . $row4['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="datepicker form-control inputCiv" value="' . date("F d, Y", strtotime($row4['Date_ofrelease'])) . '" type="text" placeholder="mm/dd/yyyy" name="CSupdate' . $row4['Id'] . '"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top: 0px; width: 200px;" class="form-group form-float">' .
                                                                                '<input style="font-size: 12px;" type="file" value="' . $row4['Upload'] . '" name="CSupupload' . $row4['Id'] . '" id="CSupupload' . $row4['Id'] . '" disabled></div></td>' .
                                                                                '<td><a style="font-size: 12px;" href="EditMyPDS.php?id=' . $_SESSION['INTRA_PDS_ID'] . '&csid=' . $row4['Id'] . '&act=del" class="btn bg-red btn-xs waves-effect" >Delete</a></td></tr>';
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="work" style="min-height: 68vh;">
                                                                <div class="body table-responsive">

<!--<select name="position" style="width: 500px;" disabled>-->
                                                                    <?php
                                                                    $idd = $_SESSION['INTRA_PDS_ID'];
                                                                    $sele = mysql_query("Select * from table_empinfo where Id = '$idd'");
                                                                    $row5 = mysql_fetch_assoc($sele);
                                                                    $position = $row5['Position'];
                                                                    $sele2 = mysql_query("Select * from table_position where position_id = '$position'");
                                                                    $row6 = mysql_fetch_assoc($sele2);
//                                                                        echo '<option value="' . $row6['position_id'] . '">' . $row6['position_itemno'] . ' - ' . $row6['position_description'] . '</option>';
                                                                    if (!empty($position)) {
                                                                        echo '<h5 style="color: #607D8B;">POSITION: ' . strtoupper($row6['position_description']) . '</h5>';
                                                                    } else {
                                                                        echo '<h5 style="color: #607D8B;">POSITION: NONE</h5>';
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                    $query10 = mysql_query("select * from table_position");
                                                                    while ($row3 = mysql_fetch_array($query10)) {
                                                                        if ($row3['division_id'] == 1) {
                                                                            $div = 'Office of the Executive Director';
                                                                        }if ($row3['division_id'] == 2) {
                                                                            $div = 'Internal Audit Unit';
                                                                        }if ($row3['division_id'] == 3) {
                                                                            $div = 'Administrative Division';
                                                                        }if ($row3['division_id'] == 4) {
                                                                            $div = 'Financial & Management Division';
                                                                        }if ($row3['division_id'] == 5) {
                                                                            $div = 'Planning, Monitoring & Evaluation Division';
                                                                        }if ($row3['division_id'] == 6) {
                                                                            $div = 'Policy Analysis & Dev\'t. Division';
                                                                        }if ($row3['division_id'] == 7) {
                                                                            $div = 'Information Mgt. & Communications Division';
                                                                        }if ($row3['division_id'] == 8) {
                                                                            $div = 'NCR';
                                                                        }if ($row3['division_id'] == 9) {
                                                                            $div = 'RPO 1';
                                                                        }if ($row3['division_id'] == 10) {
                                                                            $div = 'RPO 2';
                                                                        }if ($row3['division_id'] == 11) {
                                                                            $div = 'RPO 3';
                                                                        }if ($row3['division_id'] == 12) {
                                                                            $div = 'RPO 4';
                                                                        }if ($row3['division_id'] == 13) {
                                                                            $div = 'RPO 5';
                                                                        }if ($row3['division_id'] == 14) {
                                                                            $div = 'RPO 6';
                                                                        }if ($row3['division_id'] == 15) {
                                                                            $div = 'RPO 7';
                                                                        }if ($row3['division_id'] == 16) {
                                                                            $div = 'RPO 8';
                                                                        }if ($row3['division_id'] == 17) {
                                                                            $div = 'RPO 9';
                                                                        }if ($row3['division_id'] == 18) {
                                                                            $div = 'RPO 10';
                                                                        }if ($row3['division_id'] == 19) {
                                                                            $div = 'RPO 11';
                                                                        }if ($row3['division_id'] == 20) {
                                                                            $div = 'RPO 12';
                                                                        }if ($row3['division_id'] == 21) {
                                                                            $div = 'CAR';
                                                                        }if ($row3['division_id'] == 22) {
                                                                            $div = 'CARAGA';
                                                                        }
                                                                        //echo '<option value="' . $row3['position_id'] . '">' . $div . ' - ' . $row3['position_itemno'] . ' -s ' . $row3['position_description'] . '</option>';
                                                                    }
                                                                    ?>
                                                                    <!--</select>-->
                                                                    <br><br>
                                                                    <input type="button" id="btAddWor" value="+" class="btn btn-primary waves-effect btWor" />&nbsp;
                                                                    <input type="button" id="btRemoveWor" value="-" class="btn btn-primary waves-effect btWor" />
                                                                    <table class="table table-bordered " style="margin-bottom: 100px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="9" style="background-color: #aaaaaa; color: white;">V. WORK EXPERIENCE (Include private employment. Start from your current work)</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">INCLUSIVE DATES<br>(dd/mm/yyyy)</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">POSITION TITLE<br>(Write in full)<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">DEPARTMENT/ AGENCY/ OFFICE/ COMPANY<br>(Write in full)<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">MONTHLY<br>SALARY<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">SALARY GRADE<br> & STEP<br> INCREMENT<br>(Format "00-0")</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">STATUS OF<br> APPOINTMENT<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">GOV'T<br> SERVICE<br>(Yes/No)<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">ACTION<br><br>&nbsp;</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="text-align: center; background-color: #f8f8f8; font-size: 12px;">From</th>
                                                                                <th style="text-align: center; background-color: #f8f8f8; font-size: 12px;">To</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id='mainWor'>
                                                                            <?php

                                                                            function customShift($array, $id) {
                                                                                foreach ($array as $key => $val) {     // loop all elements
                                                                                    if ($key == $id) {             // check for id $id
                                                                                        unset($array[$key]);         // unset the $array with id $id
                                                                                        array_unshift($array, $val); // unshift the array with $val to push in the beginning of array
                                                                                        return $array;               // return new $array
//                                                                                        $tmp = $array[$key];
//                                                                                        unset($array[$key]);
//                                                                                        array_push($array,$tmp);
//                                                                                        return $array;
                                                                                    }
                                                                                }
                                                                            }

                                                                            $array = [];
                                                                            $key = 0;
                                                                            $x = 0;
                                                                            $query5 = mysql_query("Select * from table_empinfowe where Pds_Id = '$id' order by Inclusive_to desc, Inclusive_from desc");
                                                                            while ($row5 = mysql_fetch_array($query5)) {
                                                                                $array[$x] = $row5;
                                                                                if ($row5['Inclusive_to'] == '1910-01-01') {
                                                                                    $key = $x;
                                                                                }
                                                                                $x++;
                                                                            }
                                                                            $array = customShift($array, $key);

                                                                            $row5 = "";

                                                                            if (count($array) > 0) {
                                                                                foreach ($array as $row5) {
                                                                                    if ($row5['Inclusive_from'] == '0000-00-00') {
                                                                                        $infrom = '';
                                                                                    } else {
                                                                                        $infrom = date('Y-m-d', strtotime($row5['Inclusive_from']));
                                                                                    }

                                                                                    if ($row5['Inclusive_to'] == '0000-00-00') {
                                                                                        $into = '';
                                                                                    } else {
                                                                                        $into = date('Y-m-d', strtotime($row5['Inclusive_to']));
                                                                                    }

//                                                                                if ($row5['Inclusive_to'] == '1910-01-02') {
//                                                                                    $hide = 'transparent';
//                                                                                } else {
//                                                                                    $hide = '';
//                                                                                } if ($row5['Inclusive_from'] == '1910-01-02') {
//                                                                                    $hide2 = 'transparent';
//                                                                                } else {
//                                                                                    $hide2 = '';
//                                                                                }

                                                                                    if ($row5['Inclusive_to'] == '1910-01-01') {
                                                                                        $check = 'checked';
                                                                                        $pre = '';
                                                                                        $dat = 'none';
                                                                                    } else {
                                                                                        $check = '';
                                                                                        $pre = 'none';
                                                                                        $dat = '';
                                                                                    }

                                                                                    echo '<tr><td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' .
                                                                                    '<input style="font-size: 12px;" class="form-control inputWor" name="WEupfrom' . $row5['Id'] . '" type="date" value="' . $infrom . '" placeholder="-------"></div></div></td>' .
                                                                                    '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="input-group input-group-lg"><span id="cb" class="input-group-addon">' .
                                                                                    '<input type="checkbox" name="WEuppre' . $row5['Id'] . '" class="filled-in" value="Present" id="ig_checkbox' . $row5['Id'] . '" ' . $check . '>' .
                                                                                    '<label for="ig_checkbox' . $row5['Id'] . '" data-toggle="tooltip" data-placement="right" data-original-title="Click this if date is present"></label>' .
                                                                                    '</span><div id="WEupTpre" class="form-line" style="display: ' . $pre . ';">' .
                                                                                    '<input style="font-size: 12px;" class="form-control inputWor" value="Present" type="text" placeholder="mm/dd/yyyy" name="WEupTpre' . $row5['Id'] . '" placeholder="-------" disabled></div><div id="WEupto" class="form-line" style="display: ' . $dat . ';">' .
                                                                                    '<input style="font-size: 12px;" class="form-control inputWor" value="' . $into . '" type="date" name="WEupto' . $row5['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                    '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' .
                                                                                    '<input style="font-size: 12px;" class="form-control inputWor" value="' . $row5['Position'] . '" type="text" name="WEuppt' . $row5['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                    '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 300px;" class="form-group form-float"><div class="form-line">' .
                                                                                    '<input style="font-size: 12px;" class="form-control inputWor" value="' . $row5['Department_agencyoffice'] . '" type="text" name="WEupdaoc' . $row5['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                    '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' .
                                                                                    '<input style="font-size: 12px;" class="form-control inputWor" value="' . $row5['Monthly_salary'] . '" type="text" name="WEupms' . $row5['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                    '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 130px;" class="form-group form-float"><div class="form-line">' .
                                                                                    '<input style="font-size: 12px;" class="form-control inputWor" value="' . $row5['Salary_grade'] . '" type="text" name="WEupsg' . $row5['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                    '<td><select style="font-size: 12px; outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 100px;" name="WEupsoa' . $row5['Id'] . '" class="form-control show-tick">' .
                                                                                    '<option value="' . $row5['Status_ofappointment'] . '">' . $row5['Status_ofappointment'] . '</option>' .
                                                                                    '<option value="Permanent">Permanent</option>' .
                                                                                    '<option value="Contractual">Contractual</option>' .
                                                                                    '<option value="Job Order">Job Order</option>' .
                                                                                    '<option value="Casual">Casual</option>' .
                                                                                    '</select></td>' .
                                                                                    '<td><select style="font-size: 12px; outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 100px;" name="WEupgs' . $row5['Id'] . '" class="form-control show-tick">' .
                                                                                    '<option value="' . $row5['Gov_service'] . '">' . $row5['Gov_service'] . '</option>' .
                                                                                    '<option value="Yes">Yes</option>' .
                                                                                    '<option value="No">No</option>' .
                                                                                    '</select></td>' .
                                                                                    '<td><a class = "btn bg-red btn-xs waves-effect" style = "font-size: 12px;" href = "EditMyPDS.php?id=' . $_SESSION['INTRA_PDS_ID'] . '&weid=' . $row5['Id'] . '&act=del">Delete</a></td></tr>';


//                                                                                <div style="margin-bottom: -6px; margin-top:-7px; width: 130px;" class="form-group form-float"><div class="form-line">' .
//                                                                                '<input style="font-size: 12px;" class="form-control inputWor" value="' . $row5['Status_ofappointment'] . '" type="text" name="WEupsoa' . $row5['Id'] . '" placeholder="-------"></div></div>
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="voluntary" style="min-height: 68vh;">
                                                                <div class="body table-responsive">
                                                                    <input type="button" id="btAddVol" value="+" class="btn btn-primary waves-effect btVol" />&nbsp;
                                                                    <input type="button" id="btRemoveVol" value="-" class="btn btn-primary waves-effect btVol" />
                                                                    <table class="table table-bordered " style="margin-bottom: 100px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="8" style="background-color: #aaaaaa; color: white;">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC/ NON-GOVERNMENT/ PEOPLE/ VOLUNTARY ORGANIZATION/S</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">NAME & ADDRESS OF ORGANIZATION<br>(Write in full)<br>&nbsp;</th>
                                                                                <th colspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;"><br>INCLUSIVE DATES<br></th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">NUMBER OF<br> HOURS<br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">POSITION/ NATURE OF WORK<br><br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">UPLOAD<br><br>&nbsp;</th>
                                                                                <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">ACTION<br><br>&nbsp;</th>
                                                                            </tr>
                                                                            <tr><th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">From</th><th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">To</th></tr>
                                                                        </thead>
                                                                        <tbody id='mainVol'>
                                                                            <?php
                                                                            $query6 = mysql_query("Select * from table_empinfovw where Pds_Id = '$id'");
                                                                            while ($row6 = mysql_fetch_array($query6)) {
                                                                                echo '<tr><td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputVol" value="' . $row6['Nameadd'] . '" type="text" name="VWupnameadd' . $row6['Id'] . '"  placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputVol" value="' . $row6['Inclusive_from'] . '" type="text" placeholder="mm/dd/yyyy" name="VWupfrom' . $row6['Id'] . '"  placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputVol" value="' . $row6['Inclusive_to'] . '" type="text" placeholder="mm/dd/yyyy" name="VWupto' . $row6['Id'] . '"  placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 90px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputVol" value="' . $row6['Number_ofhours'] . '" type="number" name="VWupnof' . $row6['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 240px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style="font-size: 12px;" class="form-control inputVol" value="' . $row6['Position'] . '" type="text" name="VWuppos' . $row6['Id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top: 0px; width: 200px;" class="form-group form-float">' .
                                                                                '<input style="font-size: 12px;" type="file" value="' . $row6['Upload'] . '" name="VWupupload' . $row6['Id'] . '" id="VWupupload' . $row6['Id'] . '" disabled></div></td>' .
                                                                                '<td style = "font-size: 12px;"><a style = "font-size: 12px;" href = "EditMyPDS.php?id=' . $_SESSION['INTRA_PDS_ID'] . '&vwid=' . $row6['Id'] . '&act=del" class = "btn bg-red btn-xs waves-effect" >Delete</a></td></tr>';
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="training" style="min-height: 68vh;">
                                                                <div class="body table-responsive">
                                                                    <input type="button" id="btAddTra" value="+" class="btn btn-primary waves-effect btTra" />&nbsp;
                                                                    <input type="button" id="btRemoveTra" value="-" class="btn btn-primary waves-effect btTra" />
                                                                    <table class="table table-bordered " style="margin-bottom: 100px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="9" style="background-color: #aaaaaa; color: white;">
                                                                                    VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED<br>
                                                                        <h6>(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial position.)</h6>
                                                                        </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">CATEGORY<br><br>&nbsp;</th>
                                                                            <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">TITLE OF SEMINAR/CONFERENCE/WORKSHOP/SHORT COURSES<br>(Write in full)<br>&nbsp;</th>
                                                                            <th colspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">INCLUSIVE DATES OF ATTENDANCE<br>(mm/dd/yyyy)</th>
                                                                            <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">NUMBER OF<br> HOURS<br>&nbsp;</th>
                                                                            <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">Type of LD<br>(Managerial/<br>Supervisory/<br>Technical/etc) </th>
                                                                            <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">CONDUCTED/ SPONSORED BY<br>(Write in full)<br>&nbsp;</th>
                                                                            <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">UPLOAD<br><br>&nbsp;</th>
                                                                            <th rowspan="2" style="text-align: center; font-size: 12px; background-color: #f8f8f8;">ACTION<br><br>&nbsp;</th>
                                                                        </tr>
                                                                        <tr><th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">From</th><th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">To</th></tr>
                                                                        </thead>
                                                                        <tbody id='mainTra'>
                                                                            <?php
                                                                            $query7 = mysql_query("SELECT *, A.Id as a_id, A.Category as a_cat, B.Id as b_id, B.Category as b_cat, C.Id as c_id FROM table_empinfotp A"
                                                                                    . "             LEFT JOIN table_trainingcategory B"
                                                                                    . "                 ON A.Category = B.Id"
                                                                                    . "             LEFT JOIN table_typeofld C"
                                                                                    . "                 ON A.LD_type = C.Id WHERE Pds_Id = '$id' order by  Inclusive_to desc, Inclusive_from desc");
                                                                            while ($row7 = mysql_fetch_array($query7)) {
                                                                                echo '<tr><td><select style="font-size: 12px; outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 160px;" name="TPupcat' . $row7['a_id'] . '" class="form-control show-tick">' .
                                                                                '<option value="' . $row7['b_id'] . '">' . $row7['b_cat'] . '</option>';
                                                                                $query6 = mysql_query("Select * from table_trainingcategory");
                                                                                while ($row6 = mysql_fetch_array($query6)) {
                                                                                    echo '<option value="' . $row6['Id'] . '">' . $row6['Category'] . '</option>';
                                                                                }
                                                                                $infrom1 = ($row7['Inclusive_from'] == '0000-00-00') ? '' : date('Y-m-d', strtotime($row7['Inclusive_from']));
                                                                                $into1 = ($row7['Inclusive_to'] == '0000-00-00') ? '' : date('Y-m-d', strtotime($row7['Inclusive_to']));
                                                                                //<input style = "font-size: 12px;" value="' . $row7['LD_type'] . '" class="form-control inputTra" type="text" name="TPuld' . $row7['Id'] . '" placeholder="-------">
                                                                                echo '</select>' .
                                                                                '</td><td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $row7['Title_ofseminar'] . '" class="form-control inputTra" type="text" name="TPuptos' . $row7['a_id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 155px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $infrom1 . '" class="form-control inputTra" type="date" name="TPupfrom' . $row7['a_id'] . '"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 155px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $into1 . '" class="form-control inputTra" type="date" name="TPupto' . $row7['a_id'] . '"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 90px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $row7['Number_ofhours'] . '" class="form-control inputTra" type="number" name="TPupnoh' . $row7['a_id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td>';
                                                                                echo '<select style="font-size: 12px; outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 160px;" name="TPuld' . $row7['a_id'] . '" class="form-control show-tick">' .
                                                                                '<option value="' . $row7['c_id'] . '">' . $row7['Type_ofld'] . '</option>';
                                                                                $query7a = mysql_query("Select * from table_typeofld");
                                                                                while ($row7a = mysql_fetch_array($query7a)) {
                                                                                    echo '<option value="' . $row7a['Id'] . '">' . $row7a['Type_ofld'] . '</option>';
                                                                                }


                                                                                echo '</select></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 240px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $row7['Sponsored_by'] . '" class="form-control inputTra" type="text" name="TPupconducted' . $row7['a_id'] . '" placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top: 0px; width: 200px;" class="form-group form-float">' .
                                                                                '<input style = "font-size: 12px;" value="' . $row7['Upload'] . '" type="file" name="TPupupload' . $row7['a_id'] . '" id="TPupupload' . $row7['a_id'] . '" disabled></div></td>' .
                                                                                '<td><a style = "font-size: 12px;" href = "EditMyPDS.php?id=' . $_SESSION['INTRA_PDS_ID'] . '&tpid=' . $row7['a_id'] . '&act=del" class = "btn bg-red btn-xs waves-effect" >Delete</a></td></tr>';
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="others">

                                                                <div class="body table-responsive">
                                                                    <input type="button" id="btAddOth" value="+" class="btn btn-primary waves-effect btOth" />&nbsp;
                                                                    <input type="button" id="btRemoveOth" value="-" class="btn btn-primary waves-effect btOth" />
                                                                    <table class="table table-bordered " style="margin-bottom: 100px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="8" style="background-color: #aaaaaa; color: white;">VIII. OTHER INFORMATION</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">SPECIAL SKILLS/ HOBBIES<br>&nbsp;</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">NON-ACADEMIC DISTINCTION/ RECOGNITION:<br>(Write in full)</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">MEMBERSHIP IN<br> ASSOCIATION/ ORGANIZATION<br>(Write in full)</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">ACTION<br>&nbsp;</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id='mainOth'>
                                                                            <?php
                                                                            $query8 = mysql_query("Select * from table_empinfooiskills where Pds_Id = '$id'");
                                                                            while ($row8 = mysql_fetch_array($query8)) {
                                                                                echo '<tr><td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $row8['Special_skills'] . '" class="form-control inputOth" type="text" name="OIupssh' . $row8['Id'] . '"  placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $row8['Recognition'] . '" class="form-control inputOth" type="text" name="OIupndr' . $row8['Id'] . '"  placeholder="-------"></div></div></td>' .
                                                                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' .
                                                                                '<input style = "font-size: 12px;" value="' . $row8['Organization'] . '" class="form-control inputOth" type="text" name="OIupmao' . $row8['Id'] . '"  placeholder="-------"></div></div></td>' .
                                                                                '<td><a style = "font-size: 12px;" href = "EditMyPDS.php?id=' . $_SESSION['INTRA_PDS_ID'] . '&oiid=' . $row8['Id'] . '&act=del" class = "btn bg-red btn-xs waves-effect" >Delete</a></td></tr>';
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div><br><br>


                                                                <div class="body table-responsive">

                                                                    <?php
                                                                    $query9 = mysql_query("Select * from table_empinfooi where Pds_Id = '$id'");
                                                                    $row9 = mysql_fetch_assoc($query9);
                                                                    ?>
                                                                    <table class="table table-bordered " style="margin-bottom: 100px;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size: 16px; background-color: #f8f8f8;">
                                                                                    34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;chief of bureau or office or to the person who has immediate supervision over you in the Office,<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bureau or Department where you will be apppointed,
                                                                                    <br><br>
                                                                                    a. within the third degree?<br>
                                                                                    b. within the fourth degree (for Local Government Unit - Career Employees)?

                                                                                </td>
                                                                                <td><br><br><br>
                                                                                    <input name="OI1" type="radio" id="radio_11" class="with-gap radio-col-indigo" value="Yes"  <?php
                                                                                    if ($row9['Que34_a'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_11">Yes</label>
                                                                                    <input name="OI1" type="radio" id="radio_12" class="with-gap radio-col-indigo" value="No"  <?php
                                                                                    if ($row9['Que34_a'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_12">No</label><br>


                                                                                    <input name="OI2" type="radio" id="radio_13" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que34_b'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_13">Yes</label>
                                                                                    <input name="OI2" type="radio" id="radio_14" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que34_b'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_14">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI1details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details1']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-size: 16px; background-color: #f8f8f8;">
                                                                                    35 a. Have you ever been formally charged<br><br><br><br><br><br><br><br>
                                                                                    b. Have you ever been guilty of any administrative offense?
                                                                                </td>
                                                                                <td>
                                                                                    <input name="OI3" type="radio" id="radio_15" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que35_a'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_15">Yes</label>
                                                                                    <input name="OI3" type="radio" id="radio_16" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que35_a'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_16">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI2details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details2']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <input name="OI4" type="radio" id="radio_17" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que35_b'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_17">Yes</label>
                                                                                    <input name="OI4" type="radio" id="radio_18" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que35_b'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_18">No</label><br>
                                                                                    Date Filed:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI3details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details3']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    Status of Case/s: 
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI4details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details4']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-size: 16px; background-color: #f8f8f8;">

                                                                                    36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by any court or tribunal?
                                                                                </td>
                                                                                <td>
                                                                                    <input name="OI5" type="radio" id="radio_19" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que36'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_19">Yes</label>
                                                                                    <input name="OI5" type="radio" id="radio_20" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que36'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_20">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI5details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details5']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-size: 16px; background-color: #f8f8f8;">

                                                                                    37. Have you ever been separated from the service in any of the following modes: resignation,<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;out (abolition) in the public or private sector?<br>

                                                                                </td>
                                                                                <td>
                                                                                    <input name="OI6" type="radio" id="radio_21" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que37'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_21">Yes</label>
                                                                                    <input name="OI6" type="radio" id="radio_22" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que37'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_22">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI6details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details6']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-size: 16px; background-color: #f8f8f8;">

                                                                                    38 a. Have you ever been a candidate in a national or local election held within the last year (except<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Barangay election)?<br><br><br><br><br><br><br><br>
                                                                                    b. Have you resigned from the government service during the three (3)-month period before the last<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;election to promote/actively campaign for a national or local candidate?
                                                                                </td>
                                                                                <td>
                                                                                    <input name="OI7" type="radio" id="radio_23" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que38_a'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_23">Yes</label>
                                                                                    <input name="OI7" type="radio" id="radio_24" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que38_a'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_24">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI7details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details7']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <input name="OI8" type="radio" id="radio_23a" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que38_b'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_23a">Yes</label>
                                                                                    <input name="OI8" type="radio" id="radio_24a" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que38_b'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_24a">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI8details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details8']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-size: 16px; background-color: #f8f8f8;">

                                                                                    39. Have you acquired the status of an immigrant or permanent resident of another country?

                                                                                </td>
                                                                                <td>
                                                                                    <input name="OI9" type="radio" id="radio_23b" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que39'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_23b">Yes</label>
                                                                                    <input name="OI9" type="radio" id="radio_24b" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que39'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_24b">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI9details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details9']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="font-size: 16px; background-color: #f8f8f8;">

                                                                                    40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA<br>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:<br><br><br>
                                                                                    a. Are you a member of any indigenous group?<br><br><br><br><br><br><br><br>
                                                                                    b. Are you a person with disability?<br><br><br><br><br><br><br><br>
                                                                                    c. Are you a solo parent?<br>
                                                                                </td>
                                                                                <td><br><br><br>
                                                                                    <input name="OI10" type="radio" id="radio_25" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que40_a'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_25">Yes</label>
                                                                                    <input name="OI10" type="radio" id="radio_26" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que40_a'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_26">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI10details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details10']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input name="OI11" type="radio" id="radio_27" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que40_b'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_27">Yes</label>
                                                                                    <input name="OI11" type="radio" id="radio_28" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que40_b'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_28">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI11details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details11']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input name="OI12" type="radio" id="radio_29" class="with-gap radio-col-indigo" value="Yes" <?php
                                                                                    if ($row9['Que40_c'] == "Yes") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_29">Yes</label>
                                                                                    <input name="OI12" type="radio" id="radio_30" class="with-gap radio-col-indigo" value="No" <?php
                                                                                    if ($row9['Que40_c'] == "No") {
                                                                                        echo 'checked';
                                                                                    }
                                                                                    ?> />
                                                                                    <label for="radio_30">No</label><br>
                                                                                    if YES, give details:
                                                                                    <div class="row clearfix">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <div class="form-line">
                                                                                                    <textarea style="font-size: 12px;" rows="4" name="OI12details" class="form-control no-resize" placeholder="Type details here..."><?php echo $row9['Details12']; ?></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered " style="margin-bottom: 100px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="3" style="background-color: #f8f8f8;">REFERENCES (Person not related by consanguinity or affinity to applicant / appointee)</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">NAME</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">ADDRESS</th>
                                                                                <th style="text-align: center; font-size: 12px; background-color: #f8f8f8;">TEL. NO.</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input class="form-control" type="text" name="OIname" value="<?php echo $row9['Name']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIaddress" value="<?php echo $row9['Address']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OItellno" value="<?php echo $row9['Telephone']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIname2" value="<?php echo $row9['Name2']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIaddress2" value="<?php echo $row9['Address2']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OItellno2" value="<?php echo $row9['Telephone2']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIname3" value="<?php echo $row9['Name3']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIaddress3" value="<?php echo $row9['Address3']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OItellno3" value="<?php echo $row9['Telephone3']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="2" style="font-size: 12px; background-color: #f8f8f8;">
                                                                                    Upload ID picture taken within the last 6 months 3.5cm. X 4.5 cm (passport size)
                                                                                </th>
                                                                                <td>
                                                                                    <input type="file" name="OIphoto" id="OIphoto">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="3" style="background-color: #f8f8f8; font-size: 11px;">
                                                                                    I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete<br>
                                                                                    statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.<br><br>
                                                                                    I also authorize the agency head/ authorized representative to verify / validate the contents stated herein. I trust that<br>
                                                                                    this information shall remain confidential.
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="font-size: 12px; background-color: #f8f8f8;">
                                                                                    GOVERNMENT ISSUED ID:
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIctc" value="<?php echo $row9['Gov_ID']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="font-size: 12px; background-color: #f8f8f8;">
                                                                                    ID/LICENSE/PASSPORT NO.
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIia" value="<?php echo $row9['ID_No']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="font-size: 12px; background-color: #f8f8f8;">
                                                                                    DATE/PLACE OF ISSUANCE:.
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="form-control" type="text" name="OIio" value="<?php echo $row9['Issuance']; ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="font-size: 12px; background-color: #f8f8f8;">
                                                                                    DATE ACCOMPLISHED.
                                                                                </th>
                                                                                <td colspan="2">
                                                                                    <div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                            <input style="font-size: 12px;" class="datepicker form-control" type="text" name="OIdate" value="<?php echo ($row9['Date_acc'] == '0000-00-00' || !isset($row9['Date_acc'])) ? '' : date("F d, Y", strtotime($row9['Date_acc'])); ?>" placeholder="-------">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="submit" class="btn bg-indigo waves-effect" name="OIsubmit" value="Submit">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        if (isset($_SESSION['HRIS_INDICATOR']) && $_SESSION['HRIS_INDICATOR'] == 'true') {
            ?>
            <script>
                $(document).ready(function () {
                    swal("Successful!", "Personal Data Sheet has been updated!", "success");
                })
            </script>
            <?php
        }
        ?>

        <script type="text/javascript">
            $(document).ready(function () {
                //var tbl = $('#qualificationTable').DataTable();
//                $('#qualificationTable').on('click', 'a.deleteme', function (e) {
//                    e.preventDefault();
//
//                    var a = $(this);
//                    var delid = $(this).attr('data-id')
//
//                    swal({
//                        title: "Are you sure?",
//                        text: "You will not be able to recover this data!",
//                        type: "warning",
//                        showCancelButton: true,
//                        confirmButtonColor: "#DD6B55",
//                        confirmButtonText: "Yes, delete it!",
//                        closeOnConfirm: false
//                    },
//                    function () {
//                        //window.location.href = 'AddQualificationStandard.php?del_id=' + delid + '&act=del';
//
//                        $.ajax({
//                            type: 'POST',
//                            url: 'EditMyPDS.php?id=' + <?php //echo $_GET['id'];                         ?> + '&cid=' + delid + '&act=del',
//                            success: function () {
//                                //tbl.row(a.parents('tr')).remove().draw();
                //                                swal("Deleted!", "Data has been deleted.", "success");
                //                            }
//                        });
//
//
//                    });
                //                })

                var iCnt = 0;
                var container = '';
                // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.


                $('#btAdd').on('click', function () {

                    if (iCnt <= 19) {

                        iCnt = iCnt + 1;


                        // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                        $('#main').append('<tr id=trs' + iCnt + '><td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">' + '<div class="form-line"><input class="form-control input" placeholder="-------" name=FBname' + iCnt + ' type=text id=tb' + iCnt + ' ' +
                                '"></div></div></td><td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float">'
                                + '<div class="form-line"><input class="datepicker form-control input2" name=FBdob' + iCnt + ' type=text id=tb2' + iCnt + ' ' +
                                '"></div></div></td></tr>');
                    }
                    // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                    // (20 IS THE LIMIT WE HAVE SET)
                    else {
                        $(container).append('<label>Reached the limit</label>');
                        $('#btAdd').attr('class', 'bt-disable');
                        $('#btAdd').attr('disabled', 'disabled');
                    }

                    $('.datepicker').bootstrapMaterialDatePicker({
                        time: false,
                        format: 'MMMM D, YYYY',
                        observer: true,
                        min: [1396, 2, 10],
                        max: [1396, 2, 20],
                        clearButton: true
                    });
                });

                // REMOVE ONE ELEMENT PER CLICK.
                $('#btRemove').click(function () {
                    if (iCnt != 0) {
                        $('#trs' + iCnt).remove();
                        iCnt = iCnt - 1;
                    }

                    if (iCnt == 0) {
                        $(container)
                                .empty()
                                .remove();

                        $('#btSubmit').remove();
                        $('#btAdd')
                                .removeAttr('disabled')
                                .attr('class', 'btn btn-primary waves-effect bt');
                    }
                });


            });

            // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
            var divValue, values = '';

            function GetTextValue() {

                values = '';
                $('.input').each(function () {
                    values += this.value;

                });
                $('body').append(values);
            }
        </script>

        <!--Civil service javascript-->

        <script type="text/javascript">
            $(document).ready(function () {

                var iCntCiv = 0;
                var containerCiv = '';
                // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.


                $('#btAddCiv').click(function () {
                    if (iCntCiv <= 19) {

                        iCntCiv = iCntCiv + 1;
                        // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                        $('#mainCiv').append('<tr id=trsCiv' + iCntCiv + '><td><select name=CScareer' + iCntCiv + ' style="outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 290px;"><?php
        $sq = mysql_query("select * from table_eligibility");
        echo '<option value="">Select CS Eligibility</option>';
        while ($row1 = mysql_fetch_array($sq)) {
            echo '<option value="' . $row1['Eligibility'] . '">' . $row1['Eligibility'] . '</option>';
        }
        ?></select></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputCiv" type="text" name=CSrating' + iCntCiv + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="datepicker form-control inputCiv" type="text" placeholder="mm/dd/yyyy" name=CSdoeTo' + iCntCiv + '></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="datepicker form-control inputCiv" type="text" placeholder="mm/dd/yyyy" name=CSdoeFrom' + iCntCiv + '></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 250px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputCiv" type="text" name=CSpoe' + iCntCiv + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 80px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputCiv" type="text" name=CSnumber' + iCntCiv + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="datepicker form-control inputCiv" type="text" placeholder="mm/dd/yyyy" name=CSdate' + iCntCiv + '></div></div></td>' + '<td><div style="margin-bottom: -6px; margin-top: 0px; width: 200px;" class="form-group form-float">' +
                                '<input type="file" name=CSupload' + iCntCiv + ' id=CSupload' + iCntCiv + ' disabled></div></td></tr>');
                    }
                    // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                    // (20 IS THE LIMIT WE HAVE SET)
                    else {
                        $(containerCiv).append('<label>Reached the limit</label>');
                        $('#btAddCiv').attr('class', 'btCiv-disable');
                        $('#btAddCiv').attr('disabled', 'disabled');
                    }

                    $('.datepicker').bootstrapMaterialDatePicker({
                        time: false,
                        format: 'MMMM D, YYYY',
                        observer: true,
                        min: [1396, 2, 10],
                        max: [1396, 2, 20],
                        clearButton: true
                    });
                });
                // REMOVE ONE ELEMENT PER CLICK.
                $('#btRemoveCiv').click(function () {
                    if (iCntCiv != 0) {
                        $('#trsCiv' + iCntCiv).remove();
                        iCntCiv = iCntCiv - 1;
                    }


                    if (iCntCiv == 0) {
                        $(containerCiv)
                                .empty()
                                .remove();
                        $('#btSubmitCiv').remove();
                        $('#btAddCiv')
                                .removeAttr('disabled')
                                .attr('class', 'btn btn-primary waves-effect btCiv');
                    }
                });
            });
            // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
            var divValueCiv, valuesCiv = '';
            function GetTextValueCiv() {

                valuesCiv = '';
                $('.inputCiv').each(function () {
                    valuesCiv += this.value;
                });
                $('body').append(valuesCiv);
            }
        </script>

        <!--Work javascript-->

        <script type="text/javascript">
            $(document).ready(function () {

                var iCntWor = 0;
                var containerWor = '';
                // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.

                $('body').on('change', '#work input[type=checkbox]', function () {
                    //                        alert($(this).attr('name'))

//                        alert()
                    if ($(this).is(':checked')) {
                        $(this).closest('div').find('#WEto').hide()
                        $(this).closest('div').find('#WEtpre').show()
                        //                            $('#WEupto').hide();
//                            $('#WEupTpre').show();
                    } else {
                        $(this).closest('div').find('#WEto').show()
                        $(this).closest('div').find('#WEtpre').hide()
                        //                            $('#WEupto').show();
                        //                            $('#WEupTpre').hide();
                    }
                });

                $('#btAddWor').click(function () {
                    if (iCntWor <= 21) {

                        iCntWor = iCntWor + 1;
                        // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                        $('#mainWor').append('<tr id=trsWor' + iCntWor + '><td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' +
                                '<input style="font-size: 12px;" class="form-control inputWor" type="date" name=WEfrom' + iCntWor + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="input-group input-group-lg"><span class="input-group-addon">' +
                                '<input type="checkbox" name="WEpre' + iCntWor + '" class="filled-in" value="Present" id="ig_checkbox' + iCntWor + '">' +
                                '<label for="ig_checkbox' + iCntWor + '" data-toggle="tooltip" data-placement="right" data-original-title="Click this if date is present"></label>' +
                                '</span><div id="WEtpre" class="form-line" style="display: none;">' +
                                '<input style="font-size: 12px;" class="form-control inputWor" value="Present" type="text" name="WEtpre' + iCntWor + '" placeholder="-------" disabled></div>' +
                                '<div id="WEto" class="form-line">' +
                                '<input style="font-size: 12px;" class="form-control inputWor" type="date" name=WEto' + iCntWor + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputWor" type="text" name=WEpt' + iCntWor + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 300px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputWor" type="text" name=WEdaoc' + iCntWor + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputWor" type="text" name=WEms' + iCntWor + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 130px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputWor" type="text" name=WEsg' + iCntWor + ' placeholder="-------"></div></div></td>' +
                                '<td><select style="font-size: 12px; outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 100px;" name="WEsoa' + iCntWor + '" class="form-control show-tick">' +
                                '<option value="">Select</option>' +
                                '<option value="Permanent">Permanent</option>' +
                                '<option value="Contractual">Contractual</option>' +
                                '<option value="Job Order">Job Order</option>' +
                                '<option value="Casual">Casual</option>' +
                                '</select></td>' +
                                '<td><select style="outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 100px;" name=WEgs' + iCntWor + ' class="form-control show-tick">' +
                                '<option value="">Select</option>' +
                                '<option value="Yes">Yes</option>' +
                                '<option value="No">No</option>' +
                                '</select></td></tr>');


                        //                        <div style="margin-bottom: -6px; margin-top:-7px; width: 130px;" class="form-group form-float"><div class="form-line">' +
                        //                                '<input class="form-control inputWor" type="text" name=WEsoa' + iCntWor + ' placeholder="-------"></div></div>
                    }
                    // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                    // (20 IS THE LIMIT WE HAVE SET)
                    else {
                        $(containerWor).append('<label>Reached the limit</label>');
                        $('#btAddWor').attr('class', 'btWor-disable');
                        $('#btAddWor').attr('disabled', 'disabled');
                    }

                    $(function () {
                        $("[data-toggle='tooltip']").tooltip();
                    });


                    $('.datepicker').bootstrapMaterialDatePicker({
                        time: false,
                        format: 'MMMM D, YYYY',
                        observer: true,
                        min: [1396, 2, 10],
                        max: [1396, 2, 20],
                        clearButton: true
                    });






//                    if (document.getElementById('ig_checkbox2').checked) {
//                        $('#WEto').hide();
//                        $('#WEtpre').show();
//                    } else {
//                        $('#WEto').show();
//                        $('#WEtpre').hide();
//                    }
//                    
//                    $('#ig_checkbox2').on('change', function () {
//                        if (document.getElementById('ig_checkbox2').checked) {
//                            $('#WEto').hide();
//                            $('#WEtpre').show();
                    //                        } else {
                    //                            $('#WEto').show();
                    //                            $('#WEtpre').hide();
                    //                        }
//                    }); 
                });
                // REMOVE ONE ELEMENT PER CLICK.
                $('#btRemoveWor').click(function () {
                    if (iCntWor != 0) {
                        $('#trsWor' + iCntWor).remove();
                        iCntWor = iCntWor - 1;
                    }


                    if (iCntWor == 0) {
                        $(containerWor)
                                .empty()
                                .remove();
                        $('#btSubmitWor').remove();
                        $('#btAddWor')
                                .removeAttr('disabled')
                                .attr('class', 'btn btn-primary waves-effect btWor');
                    }
                });
            });
            // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
            var divValueWor, valuesWor = '';
            function GetTextValueWor() {

                valuesWor = '';
                $('.inputWor').each(function () {
                    valuesWor += this.value;
                });
                $('body').append(valuesWor);
            }
        </script>

        <!--Voluntary Work javascript-->

        <script type="text/javascript">
            $(document).ready(function () {

                var iCntVol = 0;
                var containerVol = '';
                // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.


                $('#btAddVol').click(function () {
                    if (iCntVol <= 19) {
                        iCntVol = iCntVol + 1;
                        // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                        $('#mainVol').append('<tr id=trsVol' + iCntVol + '><td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputVol" type="text" name=VWnameadd' + iCntVol + '  placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputVol" type="text" placeholder="mm/dd/yyyy" name=VWfrom' + iCntVol + '  placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputVol" type="text" placeholder="mm/dd/yyyy" name=VWto' + iCntVol + '  placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 90px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputVol" type="number" name=VWnof' + iCntVol + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 240px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputVol" type="text" name=VWpos' + iCntVol + '  placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top: 0px; width: 200px;" class="form-group form-float">' +
                                '<input type="file" name=VWupload' + iCntVol + ' id="fileToUpload" disabled></div></td></tr>');
                    }
                    // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                    // (20 IS THE LIMIT WE HAVE SET)
                    else {
                        $(containerVol).append('<label>Reached the limit</label>');
                        $('#btAddVol').attr('class', 'btVol-disable');
                        $('#btAddVol').attr('disabled', 'disabled');
                    }
                });
                // REMOVE ONE ELEMENT PER CLICK.
                $('#btRemoveVol').click(function () {
                    if (iCntVol != 0) {
                        $('#trsVol' + iCntVol).remove();
                        iCntVol = iCntVol - 1;
                    }


                    if (iCntVol == 0) {
                        $(containerVol)
                                .empty()
                                .remove();
                        $('#btSubmitVol').remove();
                        $('#btAddVol')
                                .removeAttr('disabled')
                                .attr('class', 'btn btn-primary waves-effect btVol');
                    }
                });
            });
            // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
            var divValueVol, valuesVol = '';
            function GetTextValueVol() {

                valuesVol = '';
                $('.inputVol').each(function () {
                    valuesVol += this.value;
                });
                $('body').append(valuesVol);
            }
        </script>

        <!--Training Programs javascript-->

        <script type="text/javascript">
            $(document).ready(function () {

                var iCntTra = 0;
                var containerTra = '';
                // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.


                $('#btAddTra').click(function () {
                    if (iCntTra <= 21) {

                        iCntTra = iCntTra + 1;
                        // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                        $('#mainTra').append('<tr id=trsTra' + iCntTra + '><td><select style="outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 160px;" name=TPcat' + iCntTra + ' class="form-control show-tick"><?php
        $sq2 = mysql_query("select * from table_trainingcategory");
        echo '<option value="">Select Category</option>';

        while ($row2 = mysql_fetch_array($sq2)) {
            echo '<option value="' . $row2['Id'] . '">' . $row2['Category'] . '</option>';
            //<input class="form-control inputTra" type="text" name=TPld' + iCntTra + ' placeholder="-------">
        }
        ?></select></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputTra" type="text" name=TPtos' + iCntTra + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 155px;" class="form-group form-float"><div class="form-line">' +
                                '<input style="font-size: 12px;" class="form-control inputTra" type="date" name=TPfrom' + iCntTra + '></div></div></td>' + '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 155px;" class="form-group form-float"><div class="form-line">' +
                                '<input style="font-size: 12px;" class="form-control inputTra" type="date" name=TPto' + iCntTra + '></div></div></td>' + '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 90px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputTra" type="number" name=TPnoh' + iCntTra + ' placeholder="-------"></div></div></td><td>' +
                                '<select style="outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 160px;" name=TPld' + iCntTra + ' class="form-control show-tick"><?php
        $sq3 = mysql_query("select * from table_typeofld");
        echo '<option value="">Select Type LD</option>';
        while ($row2 = mysql_fetch_array($sq3)) {
            echo '<option value="' . $row2['Id'] . '">' . $row2['Type_ofld'] . '</option>';
        }
        ?></select></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 240px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputTra" type="text" name=TPconducted' + iCntTra + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top: 0px; width: 200px;" class="form-group form-float">' +
                                '<input type="file" name=TPupload' + iCntTra + ' id=TPupload' + iCntTra + ' disabled></div></td></tr>');
                    }
                    // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                    // (20 IS THE LIMIT WE HAVE SET)
                    else {
                        $(containerTra).append('<label>Reached the limit</label>');
                        $('#btAddTra').attr('class', 'btTra-disable');
                        $('#btAddTra').attr('disabled', 'disabled');
                    }

                    $('.datepicker').bootstrapMaterialDatePicker({
                        time: false,
                        format: 'MMMM D, YYYY',
                        observer: true,
                        min: [1396, 2, 10],
                        max: [1396, 2, 20],
                        clearButton: true
                    });
                });
                // REMOVE ONE ELEMENT PER CLICK.
                $('#btRemoveTra').click(function () {
                    if (iCntTra != 0) {
                        $('#trsTra' + iCntTra).remove();
                        iCntTra = iCntTra - 1;
                    }


                    if (iCntTra == 0) {
                        $(containerTra)
                                .empty()
                                .remove();
                        $('#btSubmitTra').remove();
                        $('#btAddTra')
                                .removeAttr('disabled')
                                .attr('class', 'btn btn-primary waves-effect btTra');
                    }
                });
            });
            // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
            var divValueTra, valuesTra = '';
            function GetTextValueTra() {

                valuesTra = '';
                $('.inputTra').each(function () {
                    valuesTra += this.value + '<br>';
                });
                $('body').append(valuesTra);
            }
        </script>

        <!--Others javascript-->

        <script type="text/javascript">
            $(document).ready(function () {

                var iCntOth = 0;
                var containerOth = '';
                // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.


                $('#btAddOth').click(function () {
                    if (iCntOth <= 19) {

                        iCntOth = iCntOth + 1;
                        // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                        $('#mainOth').append('<tr id=trsOth' + iCntOth + '><td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputOth" type="text" name=OIssh' + iCntOth + '  placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputOth" type="text" name=OIndr' + iCntOth + '  placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 430px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control inputOth" type="text" name=OImao' + iCntOth + '  placeholder="-------"></div></div></td></tr>');
                    }
                    // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                    // (20 IS THE LIMIT WE HAVE SET)
                    else {
                        $(containerOth).append('<label>Reached the limit</label>');
                        $('#btAddOth').attr('class', 'btOth-disable');
                        $('#btAddOth').attr('disabled', 'disabled');
                    }
                });
                // REMOVE ONE ELEMENT PER CLICK.
                $('#btRemoveOth').click(function () {
                    if (iCntOth != 0) {
                        $('#trsOth' + iCntOth).remove();
                        iCntOth = iCntOth - 1;
                    }


                    if (iCntOth == 0) {
                        $(containerOth)
                                .empty()
                                .remove();
                        $('#btSubmitOth').remove();
                        $('#btAddOth')
                                .removeAttr('disabled')
                                .attr('class', 'btn btn-primary waves-effect btOth');
                    }
                });
            });
            // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
            var divValueOth, valuesOth = '';
            function GetTextValueOth() {

                valuesOth = '';
                $('.inputOth').each(function () {
                    valuesOth += this.value + '<br>';
                });
                $('body').append(valuesOth);
            }
        </script>

        <!--Educational javascript-->

        <script type="text/javascript">
            $(document).ready(function () {

                var iCntEdu = 0;
                var containerEdu = '';
                // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.


                $('#btAddEdu').click(function () {
                    if (iCntEdu <= 19) {

                        iCntEdu = iCntEdu + 1;
                        // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                        $('#mainEdu').append('<tr id=trsEdu' + iCntEdu + '><td><select style="outline: none; border: 0; box-shadow: inset 0px 0px 0px 0px black; border-radius:0px; border-bottom:1px solid #cccccc; margin-bottom: -6px; margin-top:-7px; width: 150px;" name=EBlevel' + iCntEdu + ' class="form-control show-tick">' +
                                '<option value="">Select Level</option>' + '<option value="Elementary">Elementary</option>' +
                                '<option value="Secondary">Secondary</option>' +
                                '<option value="Vocational/Trade Course<">Vocational/Trade Course</option>' +
                                '<option value="College">College</option>' +
                                '<option value="Graduate Studies">Graduate Studies</option>' +
                                '</select></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control" type="text" name=EBname' + iCntEdu + ' placeholder="-------"></div></div></td>' +
                                '<td>' +
                                '<div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control" type="text" name=EBdegree' + iCntEdu + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 100px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control" type="text" name=EBzyear' + iCntEdu + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control" type="text" name=EBhighest' + iCntEdu + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control" type="text" placeholder="mm/dd/yyyy" name=EBfrom' + iCntEdu + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 160px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control" type="text" placeholder="mm/dd/yyyy" name=EBto' + iCntEdu + ' placeholder="-------"></div></div></td>' +
                                '<td><div style="margin-bottom: -6px; margin-top:-7px; width: 200px;" class="form-group form-float"><div class="form-line">' +
                                '<input class="form-control" type="text" name=EBscholar' + iCntEdu + ' placeholder="-------"></div></div></td></tr>');
                    }
                    // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                    // (20 IS THE LIMIT WE HAVE SET)
                    else {
                        $(containerEdu).append('<label>Reached the limit</label>');
                        $('#btAddEdu').attr('class', 'btEdu-disable');
                        $('#btAddEdu').attr('disabled', 'disabled');
                    }
                });
                // REMOVE ONE ELEMENT PER CLICK.
                $('#btRemoveEdu').click(function () {
                    if (iCntEdu != 0) {
                        $('#trsEdu' + iCntEdu).remove();
                        iCntEdu = iCntEdu - 1;
                    }


                    if (iCntEdu == 0) {
                        $(containerEdu)
                                .empty()
                                .remove();
                        $('#btSubmitEdu').remove();
                        $('#btAddEdu')
                                .removeAttr('disabled')
                                .attr('class', 'btn btn-primary waves-effect btEdu');
                    }
                });
            });
            // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
            var divValueEdu, valuesEdu = '';
            function GetTextValueEdu() {

                valuesEdu = '';
                $('.inputEdu').each(function () {
                    valuesEdu += this.value + '<br>';
                });
                $('body').append(valuesEdu);
            }
        </script>

        <!--<footer>Copyright © POPCOM 2016</footer>-->
        <script type="text/javascript">

            $("#click").click(function () {
                $("#hide").hide();
            });

        </script>

        <script type="text/javascript">

            /**
             *  BootTree Treeview plugin for Bootstrap.
             *
             *  Based on BootSnipp TreeView Example by Sean Wessell
             *  URL:	http://bootsnipp.com/snippets/featured/bootstrap-30-treeview
             *
             *	Revised code by Leo "LeoV117" Myers
             *
             */
            var FileTypes = [<?php if (count($_extensions[1]) != 0) echo "'" . implode("','", $_extensions[1]) . "'"; ?>];
            var ImgTypes = [<?php if (count($_extensions[2]) != 0) echo "'" . implode("','", $_extensions[2]) . "'"; ?>];
            var units = [<?php if (count($units) != 0) echo "'" . implode("','", $units) . "'"; ?>];
            var maxFileSize = parseInt('<?php echo $_maxFileSize ?>');
            $.fn.extend({
                treeview: function () {
                    return this.each(function () {
                        var tree = $(this);

                        tree.addClass('treeview-tree');
                        tree.find('li').each(function () {
                            var stick = $(this);
                        });
                        tree.find('li').has("ul").each(function () {
                            var branch = $(this);
                            branch.prepend("<i class='tree-indicator CFolderIcon'></i>");
                            branch.addClass('tree-branch');
                            branch.on('click', function (e) {
                                if (this == e.target) {
                                    var icon = $(this).children('i:first');

                                    icon.toggleClass("OFolderIcon");
                                    $(this).children().children().toggle();
                                }
                            })
                            branch.children().children().toggle();
                            branch.children('.tree-indicator, button, a').click(function (e) {
                                branch.click();

                                e.preventDefault();
                            });
                        });
                    });
                }
            });


            /*************************************************************/


            $('#FileUploadForm').on('submit', (function (e) {
                $('#FileUploadLabelsuccess').html('<?php echo $lang[17]; ?>');
                $("#FileUploadBtn").attr("disabled", "disabled");
                e.preventDefault();
                var formData = new FormData(this);
                var dir = $('#UploadFileDir').val();
                $.ajax({
                    xhr: function ()
                    {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                                $('#FileUploadLabelsuccess').html('<?php echo $lang[17] ?> ' + percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    type: 'POST',
                    url: '?uploadfile&dir=' + dir,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#FileUploadLabelsuccess').html('');
                        $('#inputFileUpload').val('');
                        $('#UploadFile').modal('hide');
                        //$("#FileUploadBtn").attr("disabled", "disabled");
                        getContent("dir=" + dir, 0);
                    },
                    error: function (data) {
                        $('#FileUploadLabelsuccess').html('<?php echo $lang[33] ?>');
                    }


                });
            }));
            function formatFileSize(bytes) {

                for (var pos = 0; bytes >= 1000; pos++, bytes /= 1024)
                    ;
                var d = Math.round(bytes * 10);
                return pos ? [parseInt(d / 10), ".", d % 10, " ", units[pos]].join('') : bytes + units[0];
            }


            var LoadingHtml = '<div class="container_01"><center><span class="Loading"></span><br><br><?php echo $lang[35] ?></center></div>';
            $(function () {
                $('body').tooltip({selector: '[data-toggle="tooltip"]'});
            });
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                        numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
                var Tsize = 0;
                var Tlabel = '';
                for (i = 0; i < numFiles; i++) {
                    Tsize = Tsize + this.files[i].size;
                    Tlabel = Tlabel + ',' + this.files[i].name;
                }
                // alert(Tlabel);

                $("#UploadFileSize").html(formatFileSize(Tsize));

                if (numFiles == 0)
                    $("#FileUploadBtn").attr("disabled", "disabled");
                else
                    $("#FileUploadBtn").removeAttr("disabled");



                if (numFiles > 1)
                    $('#inputFileUpload').val('<?php echo $lang[10]; ?> ' + numFiles);
                else
                {

                    $('#inputFileUpload').val(label);

                    if (Tsize > maxFileSize)
                    {
                        $('#FileUploadLabelsuccess').html('<?php echo $lang[33] . ' : ' . $lang[37] ?>  ' + formatFileSize(maxFileSize));
                        $("#FileUploadBtn").attr("disabled", "disabled");
                    } else
                        $('#FileUploadLabelsuccess').html('');


                }



            });


            $("#content").html(LoadingHtml);
            $.getJSON("?table&page=1", function (result) {
                $("#content").html(result.table);
                $('#breadcrumb').html(result.dirHtml);
                $('#directory').val(result.dir);
                // init bootpag -sm
                $('#alert').html(result.alert);

                $('#pagination').twbsPagination({
                    totalPages: result.total,
                    visiblePages: 5,
                    first: '<?php
        if ($is_rtl)
            echo '→';
        else
            echo '↿'
            ?>',
                    prev: '«',
                    next: '»',
                    last: '<?php
        if ($is_rtl)
            echo '↿';
        else
            echo '→'
            ?>',
                    onPageClick: function (event, page) {
                        $("#content").html(LoadingHtml);
                        $.getJSON("?table&page=" + page + "&alert=" + result.alert, function (result) {
                            $("#content").html(result.table);
                            $('#breadcrumb').html(result.dirHtml);
                            $('#alert').html(result.alert);
                        });
                    }
                });
            });


            function setCookie(key, value) {
                var expires = new Date();
                expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
                document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
            }
            function getCookie(key) {
                var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
                return keyValue ? keyValue[2] : null;
            }
            function escapeTags(str) {
                return String(str)
                        .replace(/&/g, '&amp;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#39;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;');
            }

            function replace_dir(str) {
                return String(str).replace('///', '/').replace('//', '/');
            }

            function isFile(pathname) {
                return pathname.split('/').pop().split('.').length > 1;
            }
            function isDir(pathname) {
                return !isFile(pathname);
            }

            function getContent(url, type)
            {
                setCookie('url', url);
                $("#content").html(LoadingHtml);
                url = replace_dir(url);
                $.getJSON("?table&" + url, function (data) {
                    //  alert("?table&"+url);			  
                    $("#content").html(data.table);
                    $('#breadcrumb').html(data.dirHtml);
                    $('#dirInputSearch').val(data.dir);
                    $("#Result").html(data.table);
                    $('#directory').val(data.dir);
                    $('#pagination').empty().removeData("twbs-pagination").unbind("page");
                    $('#alert').html(data.alert);
                    $('#pagination').twbsPagination({
                        totalPages: data.total,
                        visiblePages: 5, first: '<?php
        if ($is_rtl)
            echo '→';
        else
            echo '↿'
            ?>',
                        prev: '«',
                        next: '»',
                        last: '<?php
        if ($is_rtl)
            echo '↿';
        else
            echo '→'
            ?>',
                        onPageClick: function (event, page) {
                            if (type == 0) {
                                $("#content").html(LoadingHtml);
                                $.getJSON("?dir=" + data.dir + "&table&page=" + page + "&alert=" + data.alert, function (data) {
                                    $("#content").html(data.table);
                                    $("#Result").html(data.table);
                                    $('#breadcrumb').html(data.dirHtml);
                                    $('#alert').html(data.alert);
                                });
                            }
                        }
                    });
                });

            }
            ;

            function Search()
            {
                getContent("dir=" + $('#dirInputSearch').val() + '&search=' + $('#inputSearch').val(), 1)
            }



            function SetRenameModalattr(dir)
            {
                //var filename= SplitFileName(dir,"/").split("&")[0];
                dir = replace_dir(dir);
                var filename = SplitFileName(dir.split("&")[0], "/");
                $('#renameInput').val(filename);
                $('#renameDir').val(dir);
                $('#RenamefileName').html(filename);
                $('#ShowFile').modal('hide');
                $('#Rename').modal('show');
                $("#renameInput").focus();
            }
            ;



            function SetNewFolderModalattr()
            {
                dir = $('#directory').val();
                dir = replace_dir(dir);
                $('#NewFolderDir').val(dir);
                $('#ShowFile').modal('hide');
                $('#NewFolder').modal('show');
                $("#NewFolderDir").focus();
            }
            ;

            function SetUploadFileModalattr()
            {
                dir = $('#directory').val();
                dir = replace_dir(dir);
                $('#UploadFileDir').val(dir);
                $('#inputFileUpload').val('');
                $("#UploadFileSize").html('');
                $('#ShowFile').modal('hide');
                $("#FileUploadBtn").attr("disabled", "disabled");
                $('#maxFileSize').html(formatFileSize(maxFileSize));
                $('#FileUploadLabelsuccess').html('');
                $('#UploadFile').modal('show');
            }
            ;

            function SetCopyFileModalattr(dir)
            {

                dir = replace_dir(dir);
                //var filename = SplitFileName(dir.split("&")[0],"/"); 
                var filename = dir.split("&")[0];
                //var filename = filename.split("/")[filename.split("/").length-1]+'/'; 
                $('#FromFolderDir').val(dir);
                $('#ToFolderInput').val(filename); //filename.slice( 0, filename.lastIndexOf("/"))+'/'
                $('#ShowFile').modal('hide');
                $('#CopyFolder').modal('show');
                $("#ToFolderInput").focus();
            }
            ;

            function SetZipFileModalattr(dir) {

                dir = replace_dir(dir);
                //var filename = ; 		 
                $('#Zipdir').val(dir);
                var filename = dir.split("&")[0];
                $('#ZipfileName').html(SplitFileName(dir.split("&")[0], "/"));
                $('#FolderUnzipInput').val(filename.slice(0, filename.lastIndexOf("/")) + '/');
                $('#ShowFile').modal('hide');
                $('#ZipFile').modal('show');
                $("#FolderUnzipInput").focus();
            }
            ;




            function SetRemoveModalattr(dir)
            {
                dir = replace_dir(dir);
                var filename = SplitFileName(dir.split("&")[0], "/");
                $('#RemoveInput').val(filename);
                $('#Removedir').val(dir);
                $('#RemovefileName').html(filename);
                $('#ShowFile').modal('hide');
                $('#Remove').modal('show');
            }
            ;

            function getExt(filename)
            {
                return filename.substr(filename.lastIndexOf('.') + 1).toLowerCase();
                //return filename.split('.').pop();
            }

            function SplitFileName(dir, split)
            {
                var file_name_array = dir.split(split);
                return file_name_array[file_name_array.length - 1];
            }

            function SetShowFileModalattr(dir)
            {
                $("#FileWriteBtn").hide();
                dir = replace_dir(dir);
                if (dir.indexOf("#") != -1)
                    var filename = SplitFileName(dir, "#");
                else
                    var filename = SplitFileName(dir, "/");

                $('#filenameInput').val(filename);
                // var dir = file_name_array[file_name_array.length - 2];
                $('.nav-tabs a[href="#_browse"').tab('show');
                $("#listFolderFiles").html('');
                $("#HrefBrowse").html('<?php echo $lang[3]; ?>');
                $("#HrefTree").html('');

                $("#Result").html('<center><br><br><span class="Loading"></span><br><br><?php echo $lang[35] ?></center>');
                $('#filenameDir').val(dir);
                $('#imgUrl').html(filename);
                $('#ShowFile').modal('show');

                if (filename == 'directory') {

                    $("#HrefTree").html('<?php echo $lang[39]; ?>');
                    $("#HrefBrowse").html('<?php echo $lang[18]; ?>');
                    $.getJSON("?table&dir=" + dir + "&#directory", function (result) {
                        $("#Result").html(result.table);
                        $('#imgUrl').html('#<?php echo $lang[18]; ?>');
                    });
                    $("#listFolderFiles").html('<li><center><span class="Loading"></span><br><br><?php echo $lang[35] ?></center></li>');
                    $.get("?listFolderFiles&dir=" + dir, function (data) {
                        $("#listFolderFiles").html(data);
                        $('.treeview').treeview();

                    });


                    return;
                }
                ;

                if ($.inArray(getExt(filename), ImgTypes) !== -1)
                {
                    $("#Result").html('<center><br><img src="' + dir + '" class="img-rounded img-responsive" alt=""></center>');
                    return;
                }
                ;


                if ($.inArray(getExt(filename), FileTypes) !== -1 || FileTypes.length == 0) {

                    $.get("?read=" + dir, function (result) {
                        $("#FileWriteBtn").show();
                        $('#FileWriteLabelsuccess').html('');
                        $("#FileWriteBtn").removeAttr("disabled");
                        $("#Result").html('<input id="FileTxt_OK" type="hidden" ><textarea id="FileTxt" class="form-control" rows="15" style="border-top: 0px ; box-shadow: inset 0 0px 1px rgba(0,0,0,.075);border-top-left-radius: 0px; ">' + escapeTags(result) + '</textarea>');
                    });
                    return;
                }
                ;



            }
            ;



            function writeAndContent()
            {

                if (!$('#FileTxt_OK').length) {
                    $("#FileWriteBtn").attr("disabled", "disabled");
                    $('#FileWriteLabelsuccess').html('<?php echo $lang[33] ?>');
                    return;
                }


                $("#FileTxt").attr("disabled", "disabled");
                $("#FileWriteBtn").attr("disabled", "disabled");
                $('#FileWriteLabelsuccess').html('<?php echo $lang[17]; ?>');
                dir = replace_dir($('#filenameDir').val());
                txtData = $('#FileTxt').val();

                $.post("?write", {write: dir, txt: txtData}, function (data, status) {

                    if (status == 'success') {
                        $('#ShowFile').modal('hide');
                        $('#FileWriteLabelsuccess').html('');
                        $('#FileTxt').val('');
                    } else
                        $('#FileWriteLabelsuccess').html('<?php echo $lang[33] ?>');

                    $("#FileTxt").removeAttr("disabled");
                    $("#FileWriteBtn").removeAttr("disabled");

                    delete txtData;

                });

            }
            ;


            function renameAndContent()
            {
                $("#renameInput").attr("disabled", "disabled");
                $('#RenameLabelsuccess').html('<?php echo $lang[17]; ?>');
                dir = replace_dir($('#renameDir').val());
                $.getJSON("?rename=" + dir + "&table&newrename=" + $('#renameInput').val(), function (data) {
                    $("#content").html(data.table);
                    $('#alert').html(data.alert);
                    $('#Rename').modal('hide');
                    $("#renameInput").removeAttr("disabled");
                    $('#RenameLabelsuccess').html('');
                    $('#renameInput').val('');

                });

            }
            ;



            function newfolderAndContent()
            {
                $('#NewFolderLabelsuccess').html('<?php echo $lang[17]; ?>');
                dir = replace_dir($('#NewFolderDir').val());
                $.getJSON("?newfolder=" + $('#NewFolderInput').val() + "&table&dir=" + dir, function (data) {
                    $("#content").html(data.table);
                    $('#alert').html(data.alert);
                    $('#NewFolderLabelsuccess').html('');
                    $('#NewFolderInput').val('');
                    $('#NewFolder').modal('hide');
                });
            }


            function RemoveAndContent()
            {
                $('#RemoveLabelsuccess').html('<?php echo $lang[17]; ?>');
                dir = replace_dir($('#Removedir').val());
                $.getJSON("?Remove=" + dir + "&table", function (data) {
                    $("#content").html(data.table);
                    $('#alert').html(data.alert);
                    $('#RemoveLabelsuccess').html('');
                    $('#Remove').modal('hide');
                });
            }

            function copyAndContent()
            {
                $("#ToFolderInput").attr("disabled", "disabled");
                $('#CopyLabelsuccess').html('<?php echo $lang[17]; ?>');
                dir = replace_dir($('#FromFolderDir').val());
                $.getJSON("?copy=" + dir + "&table&to=" + $('#ToFolderInput').val(), function (data) {
                    $("#content").html(data.table);
                    $('#alert').html(data.alert);
                    $('#CopyFolder').modal('hide');
                    $("#ToFolderInput").removeAttr("disabled");
                    $('#CopyLabelsuccess').html('');
                    $('#ToFolderInput').val('');

                });
            }
            ;


            function zipAndContent()
            {

                $("#ZipLoad").html('<center><br><br><span class="Loading"></span><br><br><?php echo $lang[35] ?></center>');
                $("#FolderUnzipInput").attr("disabled", "disabled");
                $('#ZipLabelsuccess').html('<?php echo $lang[17]; ?>');
                dir = replace_dir($('#Zipdir').val());
                $.getJSON("?unzip=" + dir + "&table&to=" + $('#FolderUnzipInput').val(), function (data) {
                    $("#content").html(data.table);
                    $('#alert').html(data.alert);
                    $('#ZipFile').modal('hide');
                    $("#FolderUnzipInput").removeAttr("disabled");
                    $('#ZipLabelsuccess').html('');
                    $('#FolderUnzipInput').val('');
                    $("#ZipLoad").html('');
                });

            }
            ;
            delete LoadingHtml;
            /*
             for ( var i in window ) {
             console.log(i, typeof window[i], window[i]);
             }*/


        </script>

        <script src="../plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js 
        <script src="../plugins/bootstrap/js/bootstrap.js"></script>-->

        <!-- Moment Plugin Js -->
        <script src="../plugins/momentjs/moment.js"></script>

        <!-- date-picker -->
        <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Sweet Alert Plugin Js -->
        <script src="../plugins/sweetalert/sweetalert.min.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="../plugins/node-waves/waves.js"></script>

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

        <!-- Custom Js -->
        <script src="../js/admin.js"></script>
        <!-- Demo Js -->
        <script src="../js/demo.js"></script>
        <script src="../js/bootstrap-tooltip.js" type="text/javascript"></script>

        <script src="../js/pages/ui/tooltips-popovers.js"></script>
        <script>
            $('.message a').click(function () {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            }
            );
        </script>
        <script>
            $(document).ready(function () {
                $('#btAdd,#btAddCiv,#btAddWor,#btAddTra').click(function () {
                    $('.datepicker').bootstrapMaterialDatePicker({
                        time: false,
                        format: 'MMMM D, YYYY',
                        observer: true,
                        min: [1396, 2, 10],
                        max: [1396, 2, 20],
                        clearButton: true

                    });
                });
            });
            $('.datepicker').bootstrapMaterialDatePicker({
                time: false,
                format: 'MMMM D, YYYY',
                observer: true,
                min: [1396, 2, 10],
                max: [1396, 2, 20],
                clearButton: true
            });
        </script>


    </body>

</html>

<?php
unset($_SESSION['HRIS_INDICATOR']);
// free memory
unset($lang);
unset($icon);
unset($_extensions);

unset($directory);
unset($page);
unset($total_pages);
unset($LoginDialog);
unset($login_user);
unset($login_pass);
unset($is_rtl);
unset($units);
unset($charset);
unset($_maxFileSize);
unset($_SERVER);
unset($_SESSION);
unset($_COOKIE);
unset($_GET);
unset($_POST);
unset($_FILES);
unset($_ENV);
unset($_REQUEST);
/*
  echo  memory_get_usage();
  $arr = get_defined_vars();

  echo '<pre>';
  print_r($arr);
  echo '</pre>'; */
?>