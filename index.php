<?php

    session_start();

    require_once "php/scripts/connection.php";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/show_candles.css">
</head>
<body>

    <?php 
    
        require_once "php/header.php"; 

        require_once "php/scripts/show_candles.php";
    
    ?>


</body>

<script src="js/index.js"></script>

</html>