



<?php
include_once('config.php');
$query = mysqli_query($link,"SELECT username FROM users");
$sql = " SELECT username, created_at FROM users";
$result = $link->query($sql);





?>





<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.css" rel="stylesheet"/>
 
 <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/r-2.4.1/sc-2.1.1/sr-1.2.2/datatables.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.4/jquery.min.js"></script>
<meta name="format-detection" content="telephone=no">
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
  <title>Home</title>
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
<body >


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 <center>
  <div class="container">
    


<div class="row">
<div class="two columns">
&nbsp;
</div>
<div class="eight columns" style="background-color: #686d71; " >
<a href="https://osrsfetch.com"><img class="u-max-full-width" img src="images/logo.png" width = "528" height = "150"></a>
<br>

</div>
</div>
<div class ="row">
<div class="two columns">
&nbsp;
</div>
        

        <div class="eight columns" style="background-color: white; border:1px solid black; opacity: 0.9;">
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
    <div class="two columns">
&nbsp;
</div>
    <div class="eight columns" style="background-color: white; border:1px solid black;opacity: 0.9;">
    <br>
    <h4> OSRSFetch </h4>
    <br>
    <h1> Records This Week: </h1>
    <br>
    <script type="text/javascript" src="./jquery.jPaginate.js"></script>
    
    <div style="overflow-x:auto;">

<table id = "example" class="display" style = "width:100%">
<thead>
<tr>
        <td></td>
        <td></td>
        <td>Name</td>
        <td></td>
        <td></td>
        
       
</tr>
</thead>
<tbody>
<?php

                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
                  $picture = $rows['username'];
                  
                  
                  if(file_exists("images/$picture.jpg"))
    $fileName = "images/$picture.jpg";
else
    $fileName = "default.png";

            ?>
        <tr>
            <td><img src="<?php echo $fileName; ?>" width = "150" height = "150"/></td>
            <td></td>
          
            <td><a href = "https://osrsfetch.com/search.php?name=<?php echo $rows['username'].""; ?>"><?php echo $rows['username']."<br>"; ?></a></td>
            <td><?php echo date('Y-m-d H:i:s', strtotime($rows['created_at']));?></td>
            <td><?php echo $pc["player"]["ehp"]."<br>";?></td>
       
        </tr>
    <?php } ?>
    </tbody>
    </table>

    </div>
   
   
    <br>
    

<br>
<p style="text-align: center;">Developed by <a href="https://www.4-division.com/">4-division</a></p> 
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

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

<script>
$(document).ready(function () {
    $('#example').DataTable({
        searching: false


        
     
    });
});
</script>
