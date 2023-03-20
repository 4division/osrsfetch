<?php
session_start();
require_once "config.php";

$username = $_SESSION['id'];


// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input from text form
    $new_username = $_POST["new_username"];

    // Update username in database
    $sql = "UPDATE users SET username='$new_username' WHERE id='$username'"; // assumes the user you want to update has an ID of 1
    $result = $link->query($sql);

    // Check if update was successful
    if ($result === TRUE) {
        echo "Username updated successfully";
    } else {
        echo "Error updating username: " . $link->error;
    }
}

// Close database connection
$link->close();

echo "<script type='text/javascript'>window.top.location='edit-profile.php';</script>"; exit;
exit;
?>





