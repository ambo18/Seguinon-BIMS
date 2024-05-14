<?php
session_start();
include("dbcon.php");

$id = mysqli_real_escape_string($db, $_POST['income_id']);
$ma = str_replace(',', '', $_POST['income_amount']);  // Remove the thousands separator
$my = mysqli_real_escape_string($db, $_POST['income_year']);

if (!empty($ma) && is_numeric($ma)) {
    $dy = date('Y');
    $d = $dy + 1;

    // Check if the record exists
    $result = mysqli_query($db, "SELECT income_year, income_setid FROM finance_fundoperation_incomeset WHERE `income_setid`='$id'");

    if (mysqli_num_rows($result) > 0) {
        // Record exists, proceed with update
        $sql = "UPDATE `finance_fundoperation_incomeset` SET `income_amount` = ?, `income_year` = ? WHERE `income_setid` = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("dss", $ma, $my, $id);

        if ($stmt->execute()) {
            echo '<script>alert("Data Updated")</script>';
            echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
        } else {
            echo '<script>alert("Error updating record")</script>';
            echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
        }

        $stmt->close();
    } else {
        // Record does not exist
        echo '<script>alert("Record does not exist or cannot be updated")</script>';
        echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
    }
} else {
    // Invalid amount
    echo '<script>alert("Please enter a valid amount")</script>';
    echo '<script>window.location = "IncomeFundOperationSetView.php"</script>';
}
?>
