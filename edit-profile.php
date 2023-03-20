<?php
// Initialize the session
session_start();

$uid = (isset($_GET['username'])) ? $_GET['username'] : $_SESSION['username'];
$uid2 = $_SESSION['username'];
$uid3 = $_SESSION['id'];
$query = "SELECT * FROM users WHERE username = $uid";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>




<?php

use BertW\RunescapeHiscoresApi\OSRSHiscores;

require __DIR__.'/vendor/autoload.php';

$username = $_SESSION['username'];

$player = (new OSRSHiscores([
    'headers' => [
        // Use Chrome user-agent so the Hiscores page doesn't return an error.
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36',
    ],
]))->player($username);

?>

<?php

if(file_exists("images/$username.jpg"))
    $fileName = "$username.jpg";
else
    $fileName = "default.png";
?>



<?php
include ("bio.php");
?>


<?php

if(file_exists("images/$username.jpg"))
    $fileName = "$username.jpg";
else
    $fileName = "default.png";
?>


<?php
$url = 'http://osrsfetch.com/images/'.$username.'.jpg';
$data = json_decode(file_get_contents('http://api.rest7.com/v1/detect_nudity.php?url=' . $url, true));
$imagepath = "images/$fileName";

if (@$data->success !== 1)
{

  
    
}

if ($data->nudity_percentage > "0.06") {
    
    unlink($imagepath);
}

?>





<html lang="en">
<head>
  <style>
    /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<style>
body {
  background-image: url('background.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Edit Profile</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<center>
  <div class="container">

<div class="row">
<div class="two columns">
&nbsp;
</div>
<div class="eight columns" style="background-color: #686d71;" >
<a href="https://osrsfetch.com"><img class="u-max-full-width" img src="images/logo.png" width = "528" height = "150"></a>
<br>

</div>
</div>
<div class ="row">
<div class="two columns">
&nbsp;
</div>



<div class="eight columns" style="background-color: white; border:1px solid black;opacity: 0.9;">


<center>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')"id = "Overview">Avatar</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Bio</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Settings</button>
</div>

<br>

<div id="London" class="tabcontent">
<div class="artimg"><img src="images/<?php echo $fileName;?>"  height="250px" width="250px"/></div>
<br>
Avatar:
<?php



?>
<form method="post" action="upload.php" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Upload File' name='but_upload'>
</form>

<p>jpg file format with a max size of 1 megabyte.</p>  
<br>
<br>
<br>
</div>
<div id="Paris" class="tabcontent">



<?php
$bioname = "bio/$username.txt";
$myfile = fopen("$bioname", "r") ;

if (file_exists($bioname)) {

echo fread($myfile,filesize("$bioname"));
fclose($myfile);

} else {
    echo "";

}
?>

<form action="" method="POST" enctype='multipart/form-data'>
<input name="field1" type="text" maxlength="50"/>

<input type="submit" name="submit" value="Edit Bio">
</form>
</div>

<br>
<br>
<div id="Tokyo" class="tabcontent">
<a href="index.php" class="button" >Home</a> 
<br>
<a href="logout.php" class="button">Logout</a>
<br>
<a href="reset-password.php" class="button">Reset Password</a>
<br>
<form action="name.php" method="post">
Change Username <br><input type="text" name="new_username">
<br>
<input type="submit">
<br>
Username <?php echo "$uid2";?>
<br>
ID: <?php echo "$uid3";?>

</div>

  
      </div>
    </div>
    <div class ="row">
    <div class="two columns">
&nbsp;
</div>

      <div class="eight columns" style="background-color: white; border:1px solid black;opacity: 0.9;" >
      <a href="https://discord.gg/5sYWWf6TnM">Discord</a>
</div>

    </div>
  </div>

   

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript">
</script>

<script>
$(document).ready(function(){ 
    $("img").each(function(index) {
        $(this).error(function() {
            

            $(this).hide();//You can simply Hide it using this.
        });
        $(this).attr("src", $(this).attr("src"));
  });    
});
</script>



<script src="scripts/jquery.profanityfilter.min.js"></script>

<script>
// Change the replacement character from an astrisk (*) to a pound sign (#)
$(document).profanityFilter({
    externalSwears: 'scripts/swearWords.json',
    replaceWith: '*'
});
</script>
    
<script>
  function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("Overview").click();
</script>