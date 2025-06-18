<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/hiphopzone/style/style.css" />
  <title>Community - Hip-Hop Zone</title>
  <link rel="icon" type="image/png" href="img/hip-hop.png">

</head>

<body class="com-body">
  <header>
    <div class="title"><a href="index.php">Hip-Hop Zone</a></div>
  </header>

  <main class="community-main">
    <div class="com-h1">
      <h1>Community posts</h1>
    </div>

    <div id="posts-container">
      <?php
      $posts = [];
      $file = fopen('posts.txt', 'r');
      if ($file) {
        while (($line = fgets($file)) !== false) {
          $posts[] = trim($line);
        }
        fclose($file);
      }
      if ($posts) {
        foreach (array_reverse($posts) as $line) {
          list($username, $date, $text, $imagePath) = explode('|', $line);
          echo '<div class="post">';
          echo '  <div class="post-header">';
          echo '    <img src="img/hprofile.png" alt="profile picture" class="post-profile" />';
          echo '    <div class="post-user-info">';
          echo "      <span class='post-username'>" . htmlspecialchars($username) . "</span>";
          echo "      <span class='post-date'>" . htmlspecialchars($date) . "</span>";
          echo '    </div>';
          echo '  </div>';
          echo '  <div class="post-content">';
          echo "    <p class='post-text'>" . nl2br(htmlspecialchars($text)) . "</p>";
          if (!empty($imagePath)) {
            echo "    <img src='" . htmlspecialchars($imagePath) . "' alt='user uploaded' class='post-image' />";
          }
          echo '  </div>';
          echo '</div>';
        }
      } else {
        echo "<p>No posts yet.</p>";
      }
      ?>
    </div>
  </main>

  <?php include 'fragments/footer.php'; ?>