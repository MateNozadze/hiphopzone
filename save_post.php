<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    exit("Unauthorized");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = trim($_POST['text'] ?? '');
    $username = $_SESSION['user_id'];
    $date = date('Y-m-d');
    $imagePath = '';

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                die("Failed to create upload directory.");
            }
        }
        $filename = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $filename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    $line = "$username|$date|$text|$imagePath\n";
    file_put_contents('posts.txt', $line, FILE_APPEND);

    echo "Post saved!";
}
