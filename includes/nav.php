
<style type="text/css">
    #navDropdown {
        color: white !important;
    }

</style>


<div class="collapse navbar-collapse" id="navbar-collapse">
    <ul class="nav navbar-nav navbar-right" style="margin-top: 7px; margin-right: 40px;">
        <!-- Call Search -->
        <!-- #END# Call Search -->
        <!-- Notifications -->
        <li class="dropdown">

            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" id="navDropdown">
                
                <?php
                if(!empty($_REQUEST) && $_SESSION == '')
                {
                    $empid = $_REQUEST['emp_id'];
                    $query = mysql_query("select * from table_empinfo where Employee_Id = '$empid'");
                    $row = mysql_fetch_assoc($query);
                    $pdsid = $row['Id'];
                    $query2 = mysql_query("select * from table_empinfooi where Pds_Id = '$pdsid'");
                    $row2 = mysql_fetch_assoc($query2);
                    if ($row2['Photo'] != '') {
                        echo '<img style="width:50px;height:50px;border-radius: 50%;" src="../' . $row2['Photo'] . '">&nbsp;&nbsp;&nbsp;&nbsp;';
                    } elseif ($row2['Photo'] == '') {
                        if ($row['Sex'] == "Male") {
                            echo '<img style="width:50px;height:50px;border-radius: 50%;" src="../images/user.png">&nbsp;&nbsp;&nbsp;&nbsp;';
                        } else {
                            echo '<img style="width:50px;height:50px;border-radius: 50%;" src="../images/user2.png">&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                    }
                    echo ucfirst($row['Firstname']) . " " . ucfirst($row['Lastname']);
                }
                else
                {
                    $empid = $_SESSION['INTRA_EMP_ID'];
                    $query = mysql_query("select * from table_empinfo where Employee_Id = '$empid'");
                    $row = mysql_fetch_assoc($query);
                    $pdsid = $row['Id'];
                    $query2 = mysql_query("select * from table_empinfooi where Pds_Id = '$pdsid'");
                    $row2 = mysql_fetch_assoc($query2);
                    if ($row2['Photo'] != '') {
                        echo '<img style="width:50px;height:50px;border-radius: 50%;" src="../' . $row2['Photo'] . '">&nbsp;&nbsp;&nbsp;&nbsp;';
                    } elseif ($row2['Photo'] == '') {
                        if ($row['Sex'] == "Male") {
                            echo '<img style="width:50px;height:50px;border-radius: 50%;" src="../images/user.png">&nbsp;&nbsp;&nbsp;&nbsp;';
                        } else {
                            echo '<img style="width:50px;height:50px;border-radius: 50%;" src="../images/user2.png">&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                    }
                    echo ucfirst($row['Firstname']) . " " . ucfirst($row['Lastname']);
                }
                ?>
                <span style="color: yellow;" class="caret"></span>
            </a>

            <ul class="dropdown-menu">
                <li class="header">Menu</li>
                <li class="body">
                    <ul class="menu">
                        <li>
                            <a href="newPass.php">
                                <div class="icon-circle bg-teal">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="menu-info">
                                    <h4>Change Password</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../../portal">
                                <div class="icon-circle bg-green">
                                    <i class="material-icons">exit_to_app</i>
                                </div>
                                <div class="menu-info">
                                    <h4>Back to Intranet</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../logout.php">
                                <div class="icon-circle bg-green">
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
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown" style="margin-top: 10px;">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                <i class="material-icons" id="navDropdown">message</i>
                <span style="background-color: tomato;" class="label-count"><div id='badge'></div></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">Messages</li>
                <div style="margin: 5px;" id='notif'>

                </div>
                <li class="footer">
                    <a href="javascript:void(0);">View All Messages</a>
                </li>
            </ul>
        </li>
        <?php
        if (accelvl4() != 0) {
            ?>

            <!-- <li class="dropdown" style="margin-top: 10px;">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="material-icons">people</i>
                    <span style="background-color: tomato;" class="label-count"><div id='badge2'></div></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">New Account Notifications</li>
                    <div style='margin: 5px;' id='notif2'>


                    </div>
                    <li class="footer">
                        <a href="javascript:void(0);">View All Notifications</a>
                    </li>
                </ul>
            </li> -->
            <?php
        }
        ?>
        <?php
        if (accelvl4() != 0) {
            ?>

            <li class="dropdown" style="margin-top: 10px;">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="material-icons">room_service</i>
                    <span style="background-color: tomato;" class="label-count"><div id='badge3'></div></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">Service Request Notifications</li>
                    <div style='margin: 5px;' id='notif3'>


                    </div>
                    <li class="footer">
                        <a href="javascript:void(0);">View All Notifications</a>
                    </li>
                </ul>
            </li>
            <?php
        }
        ?>

        <?php
        if (accelvl5() != 0) {
            ?>

            <li class="dropdown" style="margin-top: 10px;">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="material-icons">room_service</i>
                    <span style="background-color: tomato;" class="label-count"><div id='badge4'></div></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">Service Request Notifications</li>
                    <div style='margin: 5px;' id='notif4'>


                    </div>
                    <li class="footer">
                        <a href="javascript:void(0);">View All Notifications</a>
                    </li>
                </ul>
            </li>
            <?php
        }
        ?>
        <li class="dropdown" style="margin-top: 10px;">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                <i class="material-icons" id="navDropdown">notifications</i>
                <span style="background-color: tomato;" class="label-count"><div id='badge6'></div></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">Notifications</li>
                <div style='margin: 5px;' id='notif6'>


                </div>
                <li class="footer">
                    <a href="javascript:void(0);">View All Notifications</a>
                </li>
            </ul>
        </li>
    </ul>



    <?php
    if (accelvl4() != 0) {
        ?>
        <ul class="nav navbar-nav navbar-right" style="margin-top: 20px; margin-right: 40px;">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">Accounts <span style="color: yellow;" class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class="header">Menu</li>
                    <li class="body">
                        <ul class="menu">
                            <li>
                                <a href="ManageAccounts.php">
                                    <div class="icon-circle bg-deep-purple">
                                        <i class="material-icons">people</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Manage Accounts</h4>
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
        <?php
    }
    ?>


    <ul class="nav navbar-nav navbar-right" style="margin-top: 20px; margin-right: 40px;">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" id="navDropdown">Services <span style="color: yellow;" class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class="header">Menu</li>
                <li class="body">
                    <ul class="menu">
                        <li>
                            <a href="ServiceRequest.php">
                                <div class="icon-circle bg-light-blue">
                                    <i class="material-icons">fiber_new</i>
                                </div>
                                <div class="menu-info">
                                    <h4>New Service Request</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="MyRequest.php">
                                <div class="icon-circle bg-cyan">
                                    <i class="material-icons">date_range</i>
                                </div>
                                <div class="menu-info">
                                    <h4>My Service Request</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <?php
                        if (accelvl4() != 0) {
                            ?>
                            <li>
                                <a href="ManageServiceReq.php">
                                    <div class="icon-circle bg-blue">
                                        <i class="material-icons">content_paste</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Manage Service Request</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }

                        if (accelvl5() != 0) {
                            ?>
                            <li>
                                <a href="ManageServiceReq2.php">
                                    <div class="icon-circle bg-blue">
                                        <i class="material-icons">content_paste</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Manage Service Request</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        if (accelvl8() == 'true') {
                            ?>
                            <li>
                                <a href="PayrollList.php">
                                    <div class="icon-circle bg-cyan">
                                        <i class="material-icons">rate_review</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Verify Salary</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        if (accelvl8() == 'true') {
                            ?>
                            <li>
                                <a href="OBList.php">
                                    <div class="icon-circle bg-blue">
                                        <i class="material-icons">rate_review</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Verify Other Benefits</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="InterviewAssessmentList.php">
                                <div class="icon-circle bg-blue">
                                    <i class="material-icons">content_paste</i>
                                </div>
                                <div class="menu-info">
                                    <h4>Interview Assessment</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="PotentialAssessmentList.php">
                                <div class="icon-circle bg-blue">
                                    <i class="material-icons">content_paste</i>
                                </div>
                                <div class="menu-info">
                                    <h4>Potential Assessment</h4>
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

    <?php
    if (accelvl6() != 0 || accelvl7() != 0) {
        ?>
        <ul class="nav navbar-nav navbar-right" style="margin-top: 20px; margin-right: 40px;">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">Assessment <span style="color: yellow;" class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class="header">Menu</li>
                    <?php
                    if (accelvl6() != 0) {
                        ?>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="InterviewAssessmentList.php">
                                        <div class="icon-circle bg-deep-purple">
                                            <i class="material-icons">people</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Interview Assessment</h4>
                                            <p>
                                                &nbsp;
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    if (accelvl7() != 0) {
                        ?>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="PotentialAssessmentList.php">
                                        <div class="icon-circle bg-blue">
                                            <i class="material-icons">people</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Potential Assessment</h4>
                                            <p>
                                                &nbsp;
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
        <?php
    }
    ?>

    <ul class="nav navbar-nav navbar-right" style="margin-top: 20px; margin-right: 40px;">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" id="navDropdown">My Info <span style="color: yellow;" class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class="header">Menu</li>
                <li class="body">
                    <ul class="menu">
                        <li>
                            <a href="../files/ViewPDS.php" target="_blank">
                                <div class="icon-circle bg-indigo">
                                    <i class="material-icons">pageview</i>
                                </div>
                                <div class="menu-info">
                                    <h4>View My Personal Data Sheet</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="EditMyPDS.php">
                                <div class="icon-circle bg-blue">
                                    <i class="material-icons">content_paste</i>
                                </div>
                                <div class="menu-info">
                                    <h4>Update My Personal Data Sheet</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="PayslipList.php">
                                <div class="icon-circle bg-indigo">
                                    <i class="material-icons">pageview</i>
                                </div>
                                <div class="menu-info">
                                    <h4>View Payslip</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="LeaveApplicationList.php">
                                <div class="icon-circle bg-blue">
                                    <i class="material-icons">pageview</i>
                                </div>
                                <div class="menu-info">
                                    <h4>Leave Application Record</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="CTOApplicationList.php">
                                <div class="icon-circle bg-indigo">
                                    <i class="material-icons">pageview</i>
                                </div>
                                <div class="menu-info">
                                    <h4>CTO Application Record</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="ATApplicationList.php">
                                <div class="icon-circle bg-blue">
                                    <i class="material-icons">pageview</i>
                                </div>
                                <div class="menu-info">
                                    <h4>AT Application Record</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                       <!--  <?php
                        $accelvl0 = accelvl0();
                       
                        if ($accelvl0['position'] == 12) {
                        ?>
                            <li>
                                <a href="ViewEmployeePayslip.php">
                                    <div class="icon-circle bg-cyan">
                                        <i class="material-icons">pageview</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>View Employee Payslip</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?> -->
                        <?php
                        $accelvl0 = accelvl0();
                       
                        if ($accelvl0['position'] == 12 OR $accelvl0['position'] == 23 OR $accelvl0['position'] == 95) {
                        ?>
                        <li>
                                <a href="PayrollList.php">
                                    <div class="icon-circle bg-cyan">
                                        <i class="material-icons">rate_review</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Verify Salary</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="#">
                                <div class="icon-circle bg-indigo">
                                    <i class="material-icons">pageview</i>
                                </div>
                                <div class="menu-info">
                                    <h4>View Accountable Properties</h4>
                                    <p>
                                        &nbsp;
                                    </p>
                                </div>
                            </a>
                        </li>
                        <?php
                        $accelvl0 = accelvl0();

                        if ($accelvl0['position'] == 32) {
                        ?>
                            <li>
                                <a href="UploadPayroll.php">
                                    <div class="icon-circle bg-cyan">
                                        <i class="material-icons">file_upload</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Upload Payslip</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        </li>
                        <?php
                        $accelvl0 = accelvl0();
                       
                        if ($accelvl0['position'] == 34) {
                        ?>
                            <li>
                                <a href="UploadOtherBenefits.php?<?= 'position='.$accelvl0['position']; ?>">
                                    <div class="icon-circle bg-cyan">
                                        <i class="material-icons">file_upload</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Upload Other Benefits</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        $accelvl0 = accelvl0();
                       
                        if ($accelvl0['position'] == 37) {
                        ?>
                            <li>
                                <a href="UploadSpecialPayroll.php">
                                    <div class="icon-circle bg-cyan">
                                        <i class="material-icons">file_upload</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>Upload Special Payroll</h4>
                                        <p>
                                            &nbsp;
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </li>
            </ul>
        </li>
    </ul>

</div>