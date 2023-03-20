<?php

require_once "config.php";



// check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}
// Check that form fields are not empty
if (!empty($_POST['group_id']) && !empty($_POST['user_id'])) {


// insert form data into groups table
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $group_name = $_POST['group_id'];
  $username = $_POST['user_id'];

  // insert group name into groups table
  $sql = "INSERT INTO groups (name) VALUES ('$group_name')";
  
  if ($link->query($sql) === TRUE) {
    // get the newly inserted group id
    $group_id = $link->insert_id;

    // insert username and group id into user_groups table
    $sql = "INSERT INTO users_groups (user_id, group_id) VALUES ('$username', '$group_id')";
    if ($link->query($sql) === TRUE) {
       
        header("Location: groups.php");
    }
}
}
} else {
    echo "Please fill out all form fields";
}

$link->close();
?>



