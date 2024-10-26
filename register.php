<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $ipAddress = $_SERVER['REMOTE_ADDR']; // Получение IP-адреса

    $filename = 'users.txt';
    $fileContents = file($filename, FILE_IGNORE_NEW_LINES);

    foreach ($fileContents as $line) {
        list($storedUser, $storedPass, $storedIP) = explode(':', trim($line));
        if ($username === $storedUser) {
            echo "Пользователь уже зарегистрирован!<script>setTimeout(() => { window.location = 'login.html'; }, 3000);</script>";
            exit;
        }
        if ($storedIP === $ipAddress) {
            echo "С этого IP-адреса уже зарегистрирован аккаунт!<script>setTimeout(() => { window.location = 'login.html'; }, 3000);</script>";
            exit;
        }
    }

    file_put_contents($filename, "$username:$password:$ipAddress\n", FILE_APPEND);
    echo "Регистрация успешна!<script>setTimeout(() => { window.location = 'login.html'; }, 3000);</script>";
}
?>
