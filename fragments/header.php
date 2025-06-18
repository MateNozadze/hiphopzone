<!-- header.php -->
<?php
// session უნდა გაიშვას სანამ HTML დაიწყება
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hip-Hop Zone</title>
    <link rel="icon" type="image/png" href="img/hip-hop.png">
    <link rel="stylesheet" href="/hiphopzone/style/style.css">
</head>

<body class="index-body">
    <header>
        <div class="header-bar">
            <div class="title"><a href="#">Hip-Hop Zone</a></div>

            <nav class="navbar">
                <ul class="nav-left">
                    <li><a href="#">Home</a></li>
                    <!-- <li><a href="#">Artists</a></li> -->
                    <li><a href="community.php">Community</a></li>
                    <!-- <li><a href="#">Playlists</a></li> -->
                </ul>
            </nav>

            <div class="nav-right">
                <div class="dropdown">
                    <a href="#" class="dropbtn" id="profilebtn"></a>
                    <div class="dropdown-content" id="dropdownContent">
                        <?php if (isset($_SESSION['user_id']) || isset($_COOKIE['user_id'])): ?>
                            <a href="profile.php">Profile</a>
                            <a href="logout.php">Log Out</a>
                        <?php else: ?>
                            <a href="login.php">Log In</a>
                            <a href="register.php">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="/hiphopzone/js/scriptProfile.js"></script>