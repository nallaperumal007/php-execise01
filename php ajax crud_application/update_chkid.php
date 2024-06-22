<?php
// Include your database connection file
include "config.php";

// Check if chkid value is sent via POST
if(isset($_POST['chkid'])) {
    // Sanitize the chkid value to prevent SQL injection
    $chkid = mysqli_real_escape_string($con, $_POST['chkid']);

    // Update the chkid value in the database
    $updateQuery = "UPDATE user SET CHKID = '$chkid'";
    $result = $con->query($updateQuery);

    if($result) {
        // Return success response if update is successful
        echo "Chkid value updated successfully.";
    } else {
        // Return error response if update fails
        echo "Error updating chkid value.";
    }
} else {
    // Return error response if chkid value is not provided
    echo "Chkid value not provided.";
}
?>
