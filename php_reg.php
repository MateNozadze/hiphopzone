<?php
session_start();

$name = trim($_POST['name'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm = trim($_POST['Re-enter-password'] ?? '');

if (!$name || !$password || !$confirm) {
    $_SESSION['error'] = 'Fill all fields!';
    header('Location: register.php');
    exit;
}

if ($password !== $confirm) {
    $_SESSION['error'] = 'Passwords don\'t match!';
    header('Location: register.php');
    exit;
}

$file = 'users.txt';
if (!file_exists($file)) {
    // ფაილის შექმნა თუ არ არსებობს
    $create = fopen($file, 'w');
    fclose($create);
}

// ვხსნით ფაილს წაკითხვისთვის
$handle = fopen($file, 'r');
if (!$handle) {
    $_SESSION['error'] = 'Cannot read user file!';
    header('Location: register.php');
    exit;
}

// უნიკალურობის შემოწმება
while (($line = fgets($handle)) !== false) {
    $line = trim($line);
    $parts = explode(',', $line, 2);
    $stored_name = $parts[0] ?? '';
    if ($stored_name === $name) {
        fclose($handle);
        $_SESSION['error'] = 'User with this name already exists!';
        header('Location: register.php');
        exit;
    }
}
fclose($handle);

// პაროლის დაშიფვრა
$key = 'my_secret_key_1234';
$cipher = 'AES-128-CTR';
$iv = random_bytes(16);
$encrypted = openssl_encrypt($password, $cipher, $key, 0, $iv);
$stored = base64_encode($encrypted) . '::' . base64_encode($iv);

// ვხსნით ფაილს ჩასამატებლად
$handle = fopen($file, 'a');
if (!$handle) {
    $_SESSION['error'] = 'Cannot write to user file!';
    header('Location: register.php');
    exit;
}

fwrite($handle, "$name,$stored\n");
fclose($handle);

$_SESSION['success'] = 'Registered!';
header('Location: login.php');
exit;
?>
