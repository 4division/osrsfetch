<?php
// establish database connection
require_once "config.php";

// check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // get the group name from the form
    $group_name = $_GET["name"];

    // retrieve all users in the specified group
    $sql = "SELECT username FROM users,users_groups,groups 
            WHERE users.id = users_groups.user_id AND groups.id = users_groups.group_id 
            AND groups.name = '" . $group_name . "'";

    $result = mysqli_query($link, $sql);

    // check if there are any results
    if (mysqli_num_rows($result) > 0) {



   

// close connection
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.css" rel="stylesheet"/>
 
 <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.4/jquery.min.js"></script>
<meta name="format-detection" content="telephone=no">
    


  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Group</title>
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
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Add Player</button>
  <button class="tablinks" onclick="openCity(event, 'Share')">Search</button>
</div>
<div id="London" class="tabcontent">
<?php echo "<h2>" . $group_name . "</h2>";?>
<script type="text/javascript" src="./jquery.jPaginate.js"></script>
    
    <div style="overflow-x:auto;">

<table id = "example" class="display" style = "width:100%">
<thead>
<tr>
        
        <th>Name</th>
              
</tr>
</thead>
<tbody>
<tr>
<?php while ($row = mysqli_fetch_assoc($result)) {?>
   <td> <a href = "https://osrsfetch.com/search.php?name=<?php echo $row['username'].""; ?>"><?php echo $row['username']."<br>"; ?></a></td>  
    </tr>
    <?php     }
} else {
    // Redirect to login page
echo "<script type='text/javascript'>window.top.location='groups.php';</script>"; exit;
exit;
} ?>
    <?php }?>
    </tbody>
</table>
</div>
</div>






<div id="Tokyo" class="tabcontent">
<form method="post" action="add-member.php">
  Group ID: <br><input type="number" name="group_id"><br>
  User ID: <br><input type="number" name="user_id">
  <br>
  <input type="submit" value="Add Player">
  <br>
</form>
</div>

<div id="Share" class="tabcontent">
<form method="get" action="group.php">
  Group name: <input type="text" name="name">
  <input type="submit" value="Search">
    </form>
</div>
</div>
<div class ="row">


    <div class="two-half column" style="background-color: white; border:1px solid black;opacity: 0.9;" >
      <a href="https://discord.gg/5sYWWf6TnM">Discord</a>
      
</div>
</div>


   

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

</html>



</html>
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
$(document).ready(function () {
    $('#example').DataTable({
        


        
     
    });
});
</script>