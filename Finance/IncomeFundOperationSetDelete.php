<?php
include_once('dbcon.php');

if (isset($_GET['del_id'])) {
    $del_id = mysqli_real_escape_string($db, $_GET['del_id']);

    // Check if the record exists
    $result = mysqli_query($db, "SELECT income_year, income_setid FROM finance_fundoperation_incomeset WHERE `income_setid`='$del_id'");
    
    if (mysqli_num_rows($result) > 0) {
        // Record exists, proceed with deletion
        $select = "DELETE FROM finance_fundoperation_incomeset WHERE income_setid = ?";
        
        $stmt = $db->prepare($select);
        $stmt->bind_param("s", $del_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data Deleted.');</script>";
            echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
        } else {
            echo "<script>alert('Error deleting record');</script>";
            echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
        }

        $stmt->close();
    } else {
        // Record does not exist
        echo "<script>alert('Record does not exist or cannot be deleted');</script>";
        echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
    }
} else {
    // del_id not set
    echo "<script>alert('Invalid request');</script>";
    echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
}
?>
