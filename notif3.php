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

    
      if (isset($_REQUEST['id']) && $_REQUEST['act'] == "set") {
      $id1 = $_REQUEST['id'];
      
      mysql_query("UPDATE table_servicereq SET Ind = '0' WHERE Id = '$id1'");
      header("Location: files/ManageServiceReq.php");
      } 
//$id = $_SESSION['INTRA_EMP_ID'];
    $id = $_SESSION['INTRA_EMP_ID'];
    $result2 = mysql_query("SELECT * FROM table_servicereq WHERE Ind = '1' AND Status != 'Finished' ORDER BY Id DESC LIMIT 10");


    while ($extract2 = mysql_fetch_array($result2)) {

        echo '<li class="body ">
            <ul class="menu tasks body2">
                                        <li>
                                            <a class="a" href="../notif3.php?id='.$extract2['Id'].'&act=set">
                                                <h4>
                                                    ' . $extract2['ReqBy']. '
                                                    <small>' . $extract2['DateofReq'] . '</small>
                                                </h4>
                                                <div>
                                                    ' . $extract2['DivUnitRPO'] . '
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
