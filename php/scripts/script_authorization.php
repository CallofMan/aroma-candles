<?php

    session_start();

    require_once "connection.php";

    $login = $_POST['login'];
    $password = $_POST['password'];


    // Проверка 
    $query = mysqli_query($connect, "SELECT id_user FROM users WHERE (telephone = '$login' OR email = '$login') AND password = $password");
    $query = mysqli_fetch_array($query);
    $idUser = $query[0];

    if ($idUser)
    {
        $_SESSION['id_user'] = $idUser;

        header("Location: ../../index.php");
    }
    else
    {
        header("Location: ../authorization.php?text=Неправильный логин или пароль.");
    }