<?php
session_start();
include("dbcon.php");

$id = $_POST['mooe_id'];
$ma = str_replace(',', '', $_POST['mooe_amount']);
$my = $_POST['mooe_year'];

// Ensure mooe_amount is a valid numeric value
if (!is_numeric($ma) || $ma <= 0) {
    echo '<script>alert("Please enter a valid amount")</script>';
    echo '<script>window.location = "MOOEFundOperationSetView.php"</script>';
    exit(); // Stop execution to prevent further processing
}

$dy = date('Y');
$d = $dy + 1;

// Check if the record exists
$result = mysqli_query($db, "SELECT mooe_year, mooe_setid FROM finance_fundoperation_mooeset WHERE `mooe_setid`='$id'");

if (mysqli_num_rows($result) > 0) {
    // Record exists, proceed with update using prepared statement
    $sql = "UPDATE `finance_fundoperation_mooeset` SET `mooe_amount` = ?, `mooe_year` = ? WHERE `mooe_setid` = ?";
    
    $stmt = $db->prepare($sql);
    $stmt->bind_param("dsd", $ma, $my, $id);

    if ($stmt->execute()) {
        echo '<script>alert("Data Updated")</script>';
        echo '<script>window.location = "MOOEFundOperationSetView.php"</script>';
    } else {
        echo '<script>alert("Error updating record")</script>';
        echo '<script>window.location = "MOOEFundOperationSetView.php"</script>';
    }

    $stmt->close();
} else {
    // Record does not exist
    echo '<script>alert("Record not found or cannot be updated")</script>';
    echo '<script>window.location = "MOOEFundOperationSetView.php"</script>';
}
?>
