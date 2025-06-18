<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$deleteUsername = $_SESSION['user_id'];
$file = 'users.txt';

// შემოწმება, არსებობს თუ არა ფაილი
if (!file_exists($file)) {
    $_SESSION['error'] = 'Users file not found!';
    header('Location: profile.php');
    exit;
}

// ვხსნით ფაილს წაკითხვისთვის
$handle = fopen($file, 'r');
if (!$handle) {
    $_SESSION['error'] = 'Cannot open users file!';
    header('Location: profile.php');
    exit;
}

$newLines = [];
$found = false;

// ვკითხულობთ ხაზ-ხაზად
while (($line = fgets($handle)) !== false) {
    $line = trim($line);
    $parts = explode(',', $line, 2);
    $username = $parts[0] ?? '';
    if ($username !== $deleteUsername) {
        $newLines[] = $line;
    } else {
        $found = true;
    }
}
fclose($handle);

if (!$found) {
    $_SESSION['error'] = 'User not found!';
    header('Location: profile.php');
    exit;
}

// ახლა ვხსნით ფაილს, წერისთვის (ფაილის თავიდან დასაწერად)
$handle = fopen($file, 'w');
if (!$handle) {
    $_SESSION['error'] = 'Cannot write to users file!';
    header('Location: profile.php');
    exit;
}

// ვწერთ ახალ ხაზებს
foreach ($newLines as $line) {
    fwrite($handle, $line . PHP_EOL);
}

fclose($handle);

// ქუქის წაშლა
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/');
}

session_destroy();

header('Location: index.php');
exit;
?>
