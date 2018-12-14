<body>

    <style>
        .body2{
        list-style-type: none;
        background-color: #f5f5f5;
        border-radius: 4px;
        margin-bottom: 1px;
        }
        .body2:hover{
        background-color: #e5e5e5;
        border-radius: 4px;
        }
        .a{
        color: #005302;
        }
        .a:hover{
        color: #009d04;
        }
        
    </style>
    <?php
    include 'includes/session.php';
    include 'includes/dbcon.php';

    /*
      if (isset($_REQUEST['id1']) && $_REQUEST['act'] == "set") {
      $_SESSION['INTRA_CID'] = $_REQUEST['id1'];
      $id2 = $_SESSION['INTRA_EMP_ID'];
      $id3 = $_REQUEST['id1'];
      mysql_query("DELETE FROM table_messnotif WHERE ");
      header("Location: files/ManageAccounts.php");
      } */
//$id = $_SESSION['INTRA_EMP_ID'];
    $id = $_SESSION['INTRA_EMP_ID'];
    
    $result2 = mysql_query("SELECT * FROM table_empinfo"
        . "             LEFT JOIN table_position"
        . "                 ON table_position.position_id = table_empinfo.Position"
        . "             LEFT JOIN table_division"
        . "                 ON table_division.division_id = table_position.division_id WHERE Approve = 'No' ORDER BY Id DESC LIMIT 10");
    
    while ($extract2 = mysql_fetch_array($result2)) {

        echo '<li class="body ">
            <ul class="menu tasks body2">
                                        <li>
                                            <a class="a" href="ManageAccounts.php">
                                                <h4>
                                                    ' . $extract2['Firstname'] . " " . $extract2['Lastname'] . '
                                                    <small>' . $extract2['Employee_Id'] . '</small>
                                                </h4>
                                                <div >
                                                    ' . $extract2['position_descrption'] . '<br>' . $extract2['division_descrption'] . '
                                                </div>
                                            </a>
                                        </li>
            </ul>
          </li>';
    }
    if (mysql_affected_rows() == 0) {
        echo 'You have no notfication.';
    }
    ?>

</body>
