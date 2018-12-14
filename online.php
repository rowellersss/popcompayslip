
<?php
include 'includes/session.php';
include 'includes/dbcon.php';

if (isset($_REQUEST['id']) && $_REQUEST['act'] == "set") {
    $_SESSION['INTRA_CID'] = $_REQUEST['id'];
    $id2 = $_SESSION['INTRA_EMP_ID'];
    mysql_query("DELETE FROM table_messnotif WHERE Id2 = '$id2' AND Id1 = " . $_REQUEST['id']);
    header("Location: files/chat.php");
}

$id = $_SESSION['INTRA_EMP_ID'];

$result2 = mysql_query("SELECT *, A.Id AS pds_id FROM table_empinfo A"
        . " LEFT JOIN table_empinfooi B"
        . "     ON A.Id = B.Pds_Id WHERE A.Status='1' AND A.Employee_Id = '$id' ORDER BY A.Lastname ASC");

// print_r($result2);
echo '<ul class="list"><li style="background-color: #36802d;" class="header"><a style="color: white; font-size:15px;  margin-top:5px;"  href="index.php"><i class="material-icons">home</i><p style="margin-top:8px; margin-left: 5px;">Home</p></a></li><br><li style="color: #676767; background-color: #c0cfb2;" class="header">Online</li>';

while ($extract2 = mysql_fetch_array($result2)) {

    if ($extract2['Photo'] != '') {
        if (empty($extract2['Middlename']) || $extract2['Middlename'] == 'N/A') {
            echo '<li style="background-color: #ececea;"><a href="../online.php?id=' . $extract2['pds_id'] . '&act=set" onclick="return popitup(\'../online.php?id=' . $extract2['pds_id'] . '&act=set\')"><img style="width:30px;height:30px;" src="../' . $extract2['Photo'] . '"><span style="color:#676767;">' . ucfirst($extract2['Firstname']) . " " . ucfirst($extract2['Lastname']) . '</span></a></li>';
        } else {
            echo '<li style="background-color: #ececea;"><a href="../online.php?id=' . $extract2['pds_id'] . '&act=set" onclick="return popitup(\'../online.php?id=' . $extract2['pds_id'] . '&act=set\')"><img style="width:30px;height:30px;" src="../' . $extract2['Photo'] . '"><span style="color:#676767;">' . ucfirst($extract2['Firstname']) . " " . ucfirst(substr($extract2['Middlename'], 0, 1)) . ". " . ucfirst($extract2['Lastname']) . '</span></a></li>';
        }
    } elseif ($extract2['Photo'] == '') {
        if ($extract2['Sex'] == "Male") {
            if (empty($extract2['Middlename']) || $extract2['Middlename'] == 'N/A') {
                echo '<li style="background-color: #ececea;"><a href="../online.php?id=' . $extract2['pds_id'] . '&act=set" onclick="return popitup(\'../online.php?id=' . $extract2['pds_id'] . '&act=set\')"><img style="width:30px;height:30px;" src="../images/user.png"><span style="color:#676767;">' . ucfirst($extract2['Firstname']) . " " . ucfirst($extract2['Lastname']) . '</span></a></li>';
            } else {
                echo '<li style="background-color: #ececea;"><a href="../online.php?id=' . $extract2['pds_id'] . '&act=set" onclick="return popitup(\'../online.php?id=' . $extract2['pds_id'] . '&act=set\')"><img style="width:30px;height:30px;" src="../images/user.png"><span style="color:#676767;">' . ucfirst($extract2['Firstname']) . " " . ucfirst(substr($extract2['Middlename'], 0, 1)) . ". " . ucfirst($extract2['Lastname']) . '</span></a></li>';
            }
        } else {
            if (empty($extract2['Middlename']) || $extract2['Middlename'] == 'N/A') {
                echo '<li style="background-color: #ececea;"><a href="../online.php?id=' . $extract2['pds_id'] . '&act=set" onclick="return popitup(\'../online.php?id=' . $extract2['pds_id'] . '&act=set\')"><img style="width:30px;height:30px;" src="../images/user2.png"><span style="color:#676767;">' . ucfirst($extract2['Firstname']) . " " . ucfirst($extract2['Lastname']) . '</span></a></li>';
            } else {
                echo '<li style="background-color: #ececea;"><a href="../online.php?id=' . $extract2['pds_id'] . '&act=set" onclick="return popitup(\'../online.php?id=' . $extract2['pds_id'] . '&act=set\')"><img style="width:30px;height:30px;" src="../images/user2.png"><span style="color:#676767;">' . ucfirst($extract2['Firstname']) . " " . ucfirst(substr($extract2['Middlename'], 0, 1)) . ". " . ucfirst($extract2['Lastname']) . '</span></a></li>';
            }
        }
    }
}
echo '</ul>';
?>

<script type="text/javascript">
    function popitup(url) {
        newwindow = window.open(url, 'name', 'height=850, width=500');
        if (window.focus) {
            newwindow.focus();
        }
        return false;
    }
</script>
