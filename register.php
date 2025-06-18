
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <title>Registration - Hip-Hop Zone</title>    
  <link rel="icon" type="image/png" href="img/hip-hop.png">

</head>
<body>
  <header>
    <div class="title"><a href="index.php">Hip-Hop Zone</a></div>
  </header>

  <main class="login-main">
    <form action="php_reg.php" class="log-form" method="POST">
      <fieldset>
        <legend class="reg-leg">Registration</legend>

        <?php if (isset($_SESSION['error'])): ?>
          <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
          <p class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>
        <label for="name">name:</label>
        <input type="text" name="name" id="name" placeholder="Enter name" required>
        <label for="password">password:</label>
        <input type="password" name="password" id="password" placeholder="Enter password" required minlength="6">
        <label for="Re-enter-password">Re-Enter password:</label>
        <input type="password" name="Re-enter-password" id="Re-enter-password" placeholder="Repeat password" required minlength="6">
        
        <input class="register" type="submit" value="Register">
        <p class="have-no-acc">Already have an account? <a href="login.php">Log in</a></p>
      </fieldset>
    </form>
  </main>

  <?php include 'fragments/footer.php'; ?>

