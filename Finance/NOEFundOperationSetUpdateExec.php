<?php
session_start();
include("dbcon.php");

$id = $_POST['noe_id'];
$mc = str_replace(',', '', $_POST['noe_amount']);
$mt = $_POST['noe_year'];

// Ensure noe_amount is a valid numeric value
if (!is_numeric($mc) || $mc <= 0) {
    echo '<script>alert("Please enter a valid amount")</script>';
    echo '<script>window.location = "NOEFundOperationSetView.php"</script>';
    exit(); // Stop execution to prevent further processing
}

$dy = date('Y');
$d = $dy + 1;

// Check if the record exists
$result = mysqli_query($db, "SELECT noe_year, noe_setid FROM finance_fundoperation_noeset WHERE `noe_setid`='$id'");

if (mysqli_num_rows($result) > 0) {
    // Record exists, proceed with update using prepared statement
    $sql = "UPDATE `finance_fundoperation_noeset` SET `noe_amount` = ?, `noe_year` = ? WHERE `noe_setid` = ?";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("dsd", $mc, $mt, $id);

    if ($stmt->execute()) {
        echo '<script>alert("Data Updated")</script>';
        echo '<script>window.location = "NOEFundOperationSetView.php"</script>';
    } else {
        echo '<script>alert("Error updating record")</script>';
        echo '<script>window.location = "NOEFundOperationSetView.php"</script>';
    }

    $stmt->close();
} else {
    // Record does not exist
    echo '<script>alert("Record not found or cannot be updated")</script>';
    echo '<script>window.location = "NOEFundOperationSetView.php"</script>';
}
?>
