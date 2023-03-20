<?php
// Initialize the session
session_start();


$username = $_SESSION['username'];
$fileName = "$username.jpg";
$imagepath = "images/$fileName";






if(isset($_POST['but_upload'])){
 
    $temp = explode(".", $_FILES["file"]["name"]); 
      $name = $username. '.' . end($temp);;
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
      // Valid file extensions
      $extensions_arr = array("jpg");
    
      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
         // Upload file
         if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
            
         }
    
      }
     
    }
    
 

// Redirect to login page
echo "<script type='text/javascript'>window.top.location='edit-profile.php';</script>"; exit;
exit;
?>