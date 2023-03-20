<?php
session_start();
require_once "config.php";
// check for errors
if ($link->connect_errno) {
    echo "Failed to connect to MySQL: " . $link->connect_error;
    exit();
}

// get the user ID and group ID from the form
$user_id = $_POST['user_id'];
$group_id = $_POST['group_id'];

// add the user to the group
$sql = "INSERT INTO users_groups (user_id, group_id) VALUES ('$user_id', '$group_id')";

if (!$link->query($sql)) {
    echo "Error: " . $sql . "<br>" . $link->error;
}

// close the database connection
$link->close();

echo "<script type='text/javascript'>window.top.location='groups.php';</script>"; exit;
exit;
?>





