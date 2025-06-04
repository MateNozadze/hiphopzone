<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <header>
      <h1 class="title"><a href="index.php">Hip-Hop Zone</a></h1>
    </header>
    <main class="login-main">
      <form action="#">
        <input type="text" name="name" id="name" placeholder="enter name">
        <input type="password" name="password" id="password" placeholder="enter password">
        <input class="log" type="submit" value="log in">
        <p class="have-no-acc">Don't you have an account? <a href="register.php"> register</a></p>
      </form>
    </main>

<?php include 'fragments/footer.php'; ?>
