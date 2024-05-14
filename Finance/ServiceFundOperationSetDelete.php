<?php
include_once('dbcon.php');

$dy = date('Y');
$d = $dy + 1;
$del_id = $_GET['del_id'];

// Check if the record exists
$result = mysqli_query($db, "SELECT service_year, service_setid FROM finance_fundoperation_psset WHERE `service_setid`='$del_id'");

if (mysqli_num_rows($result) > 0) {
    // Record exists, proceed with deletion
    $delete_query = "DELETE FROM finance_fundoperation_psset WHERE `service_setid`='$del_id'";
    $delete_result = mysqli_query($db, $delete_query);

    if ($delete_result) {
        echo "<script>alert('Data Deleted.');</script>";
        echo '<script>window.location = "ServiceFundOperationSetView.php"</script>';
    } else {
        echo "<script>alert('Error deleting record');</script>";
        echo '<script>window.location = "ServiceFundOperationSetView.php"</script>';
    }
} else {
    // Record does not exist
    echo "<script>alert('Record not found or cannot be deleted');</script>";
    echo '<script>window.location = "ServiceFundOperationSetView.php"</script>';
}
?>
