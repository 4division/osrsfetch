<?php
include_once "config.php";

// connect to database
$db = new PDO("mysql:host=localhost;dbname=", "", "");



// check if form submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // get group name from form
    $group = $_POST['group'];
    
    // get selected users from form
    $users = $_POST['users'];
    
    // loop through selected users and add to group
    foreach($users as $user) {
        
        // check if user already in group
        $stmt = $db->prepare("SELECT COUNT(*) FROM users_groups WHERE user_id = ? AND group_id = ?");
        $stmt->execute(array($user, $group));
        $count = $stmt->fetchColumn();
        
        if($count == 0) {
            // add user to group
            $stmt = $db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (?, ?)");
            $stmt->execute(array($user, $group));


        }
    }
    
    // redirect to success page
    header("Location: success.php");
    exit;
}

// get list of groups from database
$stmt = $db->query("SELECT * FROM groups");
$groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

// get list of users from database
$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


$result = $link->query("SELECT id, name FROM groups");



// Close the database connection
$link->close();

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
  <title>Groups</title>
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
        <a href="index.php" class="button" >Home</a> <a href="edit-profile.php" class="button">Edit Profile</a> 
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
  <button class="tablinks" onclick="openCity(event, 'London')"id = "Overview">Groups</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Create Group</button>
  
  <button class="tablinks" onclick="openCity(event, 'Share')">Search</button>
</div>

<div id="London" class="tabcontent">    
<script type="text/javascript" src="./jquery.jPaginate.js"></script>
    
    <div style="overflow-x:auto;">

<table id = "example" class="display" style = "width:100%">
<thead>
<tr>
        
        <th>Name</th>
        <th>ID</th>
        

       
        
       
</tr>
</thead>
<tbody>
<tr>


<?php foreach($groups as $group): ?>

    
<td><a href = "https://osrsfetch.com/group.php?name=<?php echo $group['name'].""; ?>"><?php echo $group['name']."<br>"; ?></a></td>
<td> <?php echo $group['id']."<br>";?></td>  
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<div id="Paris" class="tabcontent">
<form method="post" action="group-create.php">
  Group name: <br><input type="text" name="group_id">
  <br>
  User ID: <br><input type="number" name="user_id"> 
  <input type="submit" value="Create Group">
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
      



   

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

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