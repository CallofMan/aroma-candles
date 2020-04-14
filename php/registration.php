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

    <a href="authorization.php" class="authA">Авторизация</a>

    <form action="scripts/script_register.php" method="POST" class="auth">

        <?php 
        
            $text = (empty($_GET['text'])) ? 'Регистрация' : $_GET['text'];
            
            echo "<h1>" . $text . "</h1>";
        
        ?>
        
        <input type="tel" name="telephone" placeholder="Введите телефон *" required class="regInp" autofocus>
        <input type="email" name="email" placeholder="Введите email" class="regInp">
        <input type="password" name="password" placeholder="Придумайте пароль *" required class="regInp">
        <input type="password" name="passwordRepeat" placeholder="Повторите пароль *" required class="regInp">
        <input type="text" name="firstname" placeholder="Введите имя *" required class="regInp">
        <input type="text" name="secondname" placeholder="Введите фамилию *" required class="regInp">
        <input type="text" name="address" placeholder="Введите адрес для доставки *" required class="regInp">

        <input type="submit" name="submit" value="Зарегистрироваться" class="button">

    </form>

</body>
</html>