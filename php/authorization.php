<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body>

    <a href="registration.php" class="authA">Регистрация</a>

    <form action="scripts/script_authorization.php" method="POST" class="auth">

        <?php 
        
            $text = (empty($_GET['text'])) ? 'Авторизация' : $_GET['text'];
            
            echo "<h1>" . $text . "</h1>";
        
        ?>
        
        <input type="tel" name="login" placeholder="Введите телефон или email *" required class="regInp" autofocus>
        <input type="password" name="password" placeholder="Введите пароль *" required class="regInp">

        <input type="submit" name="submit" value="Авторизироваться" class="button">

    </form>

</body>
</html>