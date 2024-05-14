<?php
session_start();
include("dbcon.php");

$id = mysqli_real_escape_string($db, $_POST['service_id']);
$sp = ucwords(strtolower($_POST['service_position']));
$ma = str_replace(',', '', $_POST['service_amount']);
$my = mysqli_real_escape_string($db, $_POST['service_year']);

if (!empty($ma) && is_numeric($ma)) {
    $dy = date('Y');
    $d = $dy + 1;

    // Check if the record exists
    $result = mysqli_query($db, "SELECT service_year, service_setid FROM finance_fundoperation_psset WHERE `service_setid`='$id'");

    if (mysqli_num_rows($result) > 0) {
        // Record exists, proceed with update
        $sql = "UPDATE `finance_fundoperation_psset` SET `service_position` = ?, `service_amount` = ?, `service_year` = ?  WHERE `service_setid` = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssds", $sp, $ma, $my, $id);

        if ($stmt->execute()) {
            echo '<script>alert("Data Updated")</script>';
            echo '<script>window.location = "ServiceFundOperationSetView.php"</script>';
        } else {
            echo '<script>alert("Error updating record")</script>';
            echo '<script>window.location = "ServiceFundOperationSetView.php"</script>';
        }

        $stmt->close();
    } else {
        // Record does not exist
        echo '<script>alert("Record does not exist or cannot be updated")</script>';
        echo '<script>window.location = "ServiceFundOperationSetView.php"</script>';
    }
} else {
    // Invalid amount
    echo '<script>alert("Please enter a valid amount")</script>';
    echo '<script>window.location = "ServiceFundOperationSetView.php"</script>';
}
?>
