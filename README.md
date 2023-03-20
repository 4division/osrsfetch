
# OSRSfetch

OSRSfetch is an Open Source Oldschool Runescape Hiscore landing page for players that generates title cards based on their username. Players can retrieve their stats, create groups, customize their profiles including avatars and bios, and share on Twitter. 


![Logo](https://osrsfetch.com/images/logo.png)


## Features

- Title card generation based on username   
- Profile creation and customization features
- Create groups to track sets of players
- Sharing options including Twitter


## Installation

    git clone https://github.com/4division/osrsfetch
Replace lines config.php and groups.php

```bash
config.php:
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'users');

groups.php:
$db = new PDO("mysql:host=localhost;dbname=", "", "");
```
    


## Authors

- [@4division](https://www.github.com/4division)

