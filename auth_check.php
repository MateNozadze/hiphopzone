<?php
session_start();

// შემოწმება, თუ მომხმარებელი შესულია
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // თუ არა - გადამისამართება ლოგინზე
    exit;
}

$username = htmlspecialchars($_SESSION['user_id']); // უსაფრთხო გამოსაყენებლად
?>