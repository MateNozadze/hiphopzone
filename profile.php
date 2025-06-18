<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile - Hip-Hop Zone</title>
    <link rel="icon" type="image/png" href="img/hip-hop.png">

    <link rel="stylesheet" href="/hiphopzone/style/style.css" />
</head>

<body class="prof-body">

    <header>
        <div class="title"><a href="index.php">Hip-Hop Zone</a></div>
    </header>

    <main class="profile-main">
        <div class="prof-pic"></div>

        <div class="user-name"><?php echo $username; ?></div>

        <section class="post-section">
            <textarea id="post-text" placeholder="what you want to share?"></textarea>
            <input type="file" id="post-image" accept="image/*" />
            <button id="post-btn">post</button>
        </section>
        <form action="delete_account.php" method="POST" onsubmit="return confirm('do you really want to delete the account?');">
            <button class="del_acc" type="submit">Delete Account</button>
        </form>

    </main>

    <script src="/hiphopzone/js/post.js"></script>

    <?php include 'fragments/footer.php'; ?>