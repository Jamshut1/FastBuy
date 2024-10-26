<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { display: flex; justify-content: flex-end; padding: 10px; }
        .button { margin-left: 10px; padding: 5px 10px; }
    </style>
</head>
<body>

<div class="header">
    <?php if (isset($_SESSION['user'])): ?>
        <a href="profile.php" class="button">Профиль</a>
        <a href="logout.php" class="button">Выйти</a>
    <?php else: ?>
        <a href="login.html" class="button">Войти</a>
    <?php endif; ?>
</div>

<h1>Добро пожаловать на главную страницу!</h1>

</body>
</html>
