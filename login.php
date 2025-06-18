<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $password = trim($_POST['password'] ?? '');

  if (!$name || !$password) {
    $error = 'Fill all fields!';
  } else {
    $file = 'users.txt';
    $key = 'my_secret_key_1234';
    $cipher = 'AES-128-CTR';
    $found = false;

    $handle = fopen($file, 'r');
    if ($handle) {
      while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        list($stored_name, $stored_encrypted) = explode(',', $line, 2);

        if ($name === $stored_name) {
          list($encrypted_b64, $iv_b64) = explode('::', $stored_encrypted);
          $encrypted = base64_decode($encrypted_b64);
          $iv = base64_decode($iv_b64);

          $decrypted = openssl_decrypt($encrypted, $cipher, $key, 0, $iv);

          if ($password === $decrypted) {
            $_SESSION['user_id'] = $name;
            session_regenerate_id(true);
            setcookie('user_id', $name, time() + 3600, '/');
            fclose($handle);
            header('Location: profile.php');
            exit;
          }
        }
      }
      fclose($handle);
    } else {
      $error = 'Cannot open users file!';
    }

    if (!$found) {
      $error = 'Invalid name or password!';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Hip-Hop Zone</title>
  <link rel="icon" type="image/png" href="img/hip-hop.png">

  <link rel="stylesheet" href="style/style.css" />
</head>

<body>
  <header>
    <div class="title"><a href="index.php">Hip-Hop Zone</a></div>
  </header>

  <main class="login-main">
    <form action="login.php" class="log-form" method="POST">
      <fieldset>
        <legend>Log in</legend>

        <?php if ($error): ?>
          <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter name" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter password" required>

        <input class="log" type="submit" value="Log in">

        <p class="have-no-acc">Don't have an account? <a href="register.php">Register</a></p>
      </fieldset>
    </form>
  </main>

  <?php include 'fragments/footer.php'; ?>
</body>

</html>