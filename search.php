
<?php

use BertW\RunescapeHiscoresApi\OSRSHiscores;

require __DIR__.'/vendor/autoload.php';

$username = ''. htmlspecialchars($_GET["name"]) .'';




$player = (new OSRSHiscores([
    'headers' => [
        // Use Chrome user-agent so the Hiscores page doesn't return an error.
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36',
    ],
]))->player($username);

$ranklevel=$player->get('Overall')->rank;

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

<?php
require_once "config.php";

// check if the connection was successful
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}

// get the user_id from the URL parameter
$user_id = "1";
$username2 = ''. htmlspecialchars($_GET["name"]) .'';
$sql2 = "SELECT id FROM users WHERE username = '$username2' ";
$result2 = mysqli_query($link, $sql2);


if (mysqli_num_rows($result2) > 0) {
    // fetch the value and assign it to a variable
    $row2 = mysqli_fetch_assoc($result2);
    $var = $row2['id'];

}

// query the database to get the groups for the given user
$sql = "SELECT groups.name, groups.id
        FROM groups
        INNER JOIN users_groups ON groups.id = users_groups.group_id
        WHERE users_groups.user_id = '$var'";
$result = mysqli_query($link, $sql);




// close the database connection
mysqli_close($link);
?>


<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.css" rel="stylesheet"/>
 
 <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.4/jquery.min.js"></script>    
<meta name="format-detection" content="telephone=no">
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
  <title>Search</title>
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
<div class="two-half column" style="background-color: #686d71; " >
<a href="https://osrsfetch.com"><img class="u-max-full-width" img src="images/logo.png" width = "528" height = "150"></a>
<br>
</div>
</div>
<div class ="row">




<div class="two-half column" style="background-color: white; border:1px solid black; opacity: 0.9;">
<center>
<br>
        <a href="index.php" class="button" >Home</a> <a href="edit-profile.php" class="button">Edit Profile</a><a href="groups.php" class="button">Groups</a> 
        <br>
        <br>
              <form action="search.php" method="get">
Name: <input type="text" name="name">
<br>
<input type="submit">
        </form>
        </center>
</div>
</div>

<div class ="row">





<div class="two-half column" style="background-color: white; border:1px solid black; opacity: 0.9;">
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')"id = "Overview">Overview</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Avatar</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Stats</button>
  <button class="tablinks" onclick="openCity(event, 'angel')">Groups</button>
  <button class="tablinks" onclick="openCity(event, 'Share')">Share</button>
</div>
<div id="London" class="tabcontent">

<br>
<br>
<div class="artimg"><img src="images/<?php echo $fileName;?>"  height="250px" width="250px"/></div>


<?php echo $player->username() ?>
<br>
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

<p>Total level: <?php echo $player->totalLevel() ?> <?php echo $player->noTotalLevelFound() ? '(estimate)' : '' ?></p>


<a href="https://wiseoldman.net/players/ <?php echo $username?> "class="button">Wise Old Man</a>
<a href="https://templeosrs.com/player/overview.php?player=<?php echo $username?>" class="button">TempleOSRS</a>
<div style="overflow-x:auto;">

<table class="u-max-full-width">
<thead>
<tr>
    <td></td>
    <td>Skill</td>
    <td>Rank</td>
    <td>Level</td>
    <td>Experience</td>
    <td></td>
    <td></td>
   
</tr>
</thead>
<tbody>
<?php foreach ($player->skills() as $skill): ?>
    <tr>
        <td><img src="<?php echo $skill->icon ?>" alt="<?php echo $skill->name ?>"/></td>
        <td><?php echo $skill->name ?></td>
        <td><?php echo $skill->rank ?></td>
        <td><?php echo $skill->level ?></td>
        <td><?php echo $skill->experience ?></td>
    </tr>
<?php endforeach ?>
<tr>
    <td colspan="5">
        <hr/>
    </td>
</tr>
<tr>
    <td></td>
    <td>Minigame</td>
    <td>Rank</td>
    <td></td>
    <td>Score</td>
    <td></td>
    <td></td>
   
</tr>
<?php foreach ($player->minigames() as $skill): ?>
    <tr>
        <td><img src="<?php echo $skill->icon ?>" alt="<?php echo $skill->name ?> " onerror="this.style.display='none'"/></td>
        <td><?php echo $skill->name ?></td>
        <td><?php echo $skill->rank ?></td>
        <td></td>
        <td><?php echo $skill->score ?></td>
    </tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>

<div id="Paris" class="tabcontent">
<div class="artimg"><img src="images/<?php echo $fileName;?>"  height="250px" width="250px"/></div>
<br>
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
</div>

<div id="Tokyo" class="tabcontent">




    <br>
    <br>
    
    
    



<p>Total level: <?php echo $player->totalLevel() ?> <?php echo $player->noTotalLevelFound() ? '(estimate)' : '' ?></p>


<a href="https://wiseoldman.net/players/ <?php echo $username?> "class="button">Wise Old Man</a>
<a href="https://templeosrs.com/player/overview.php?player=<?php echo $username?>" class="button">TempleOSRS</a>
<div style="overflow-x:auto;">

<table class="u-max-full-width">
<thead>
<tr>
        <td></td>
        <td>Skill</td>
        <td>Rank</td>
        <td>Level</td>
        <td>Experience</td>
        <td></td>
        <td></td>
       
</tr>
</thead>
<tbody>
    <?php foreach ($player->skills() as $skill): ?>
        <tr>
            <td><img src="<?php echo $skill->icon ?>" alt="<?php echo $skill->name ?>"/></td>
            <td><?php echo $skill->name ?></td>
            <td><?php echo $skill->rank ?></td>
            <td><?php echo $skill->level ?></td>
            <td><?php echo $skill->experience ?></td>
        </tr>
    <?php endforeach ?>
    <tr>
        <td colspan="5">
            <hr/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>Minigame</td>
        <td>Rank</td>
        <td></td>
        <td>Score</td>
        <td></td>
        <td></td>
       
</tr>
    <?php foreach ($player->minigames() as $skill): ?>
        <tr>
            <td><img src="<?php echo $skill->icon ?>" alt="<?php echo $skill->name ?> " onerror="this.style.display='none'"/></td>
            <td><?php echo $skill->name ?></td>
            <td><?php echo $skill->rank ?></td>
            <td></td>
            <td><?php echo $skill->score ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
    </div>
   
    </div>
    <div id="angel" class="tabcontent">
        
        <script type="text/javascript" src="./jquery.jPaginate.js"></script>
        
        <div style="overflow-x:auto;">
    
    <table id = "example" class="display" style = "width:100%">
    <thead>
    <tr>
            
            <td>Name</td>
            <td>ID</td>
            <td></td>
            
    
           
            
           
    </tr>
    </thead>
    <tbody>
    <tr>
    
    
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    
        
    <td><a href = "https://osrsfetch.com/group.php?name=<?php echo $row['name'].""; ?>"><?php echo $row['name']."<br>"; ?></a></td>
    <td><?php echo $row['id']."<br>";?></td>  
    <td></td>
    
    </tr>
    <?php }?>
    </tbody>
    </table>
</div>



    </div>
    <div id="Share" class="tabcontent">
        
        <button class="button" data-sharer="twitter" data-title="<?php echo $username?> - Rank:<?php echo $ranklevel ?>" data-url="http://osrsfetch.com/search.php?name=<?php echo $username?>"  >Share on Twitter</button>
            </div>
      </div>
    </div>
    
    <div class ="row">


    <div class="two-half column" style="background-color: white; border:1px solid black;opacity: 0.9;" >
      <a href="https://discord.gg/5sYWWf6TnM">Discord</a>
      
</div>

    </div>
  </div>


   

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

</html>



<script>
var images = document.querySelectorAll('img');

for (var i = 0; i < images.length; i++) {
  images[i].onerror = function() {
    this.style.display='none';
  }
}
</script>

<script src="scripts/sharer.min.js"></script>

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
<script>
  $.fn.dataTable.ext.errMode = 'none';
$(document).ready(function () {
    $('#example').DataTable({
      
        


        
     
    });
});
</script>