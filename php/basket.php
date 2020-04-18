<?php

    session_start();

    require_once "scripts/script_check_auth.php";
    require_once "scripts/connection.php";

    $_SESSION['page'] = 2;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/basket.css">
</head>
<body>

    <?php

        require_once "header.php";

        require_once "scripts/show_basket.php";

    ?>

</body>

    <script src='../js/basket.js'></script>

</html>