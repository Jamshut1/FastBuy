<?php
session_start();
$filename = 'users.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $fileContents = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($fileContents as $line) {
        list($storedUser, $storedPass) = explode(':', trim($line));
        if ($username === $storedUser && password_verify($password, $storedPass)) {
            $_SESSION['user'] = $username;
            echo "Успешный вход!<script>setTimeout(() => { window.location = 'index.php'; }, 3000);</script>";
            exit;
        }
    }
    echo "Неверный логин или пароль!<script>setTimeout(() => { window.location = 'login.html'; }, 3000);</script>";
}
?>
