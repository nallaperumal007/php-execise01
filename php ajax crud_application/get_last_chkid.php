<?php
    include "config.php";

    // Query to get the last chkid value
    $sql = "SELECT CHKID FROM user ORDER BY CHKID DESC LIMIT 1";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row["CHKID"];
    } else {
        echo "0";
    }
?>
