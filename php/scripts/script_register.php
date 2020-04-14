<?php

    session_start();

    require_once "connection.php";

    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    $address = $_POST['address'];

    $key = 1;

    // Проверка на телефон
    $query = mysqli_query($connect, "SELECT id_user FROM users WHERE telephone = '$telephone'");
    $query = mysqli_fetch_array($query);
    $query = $query[0];

    if ($query)
    {
        $key = 0;
        header ("Location: ../registration.php?text=Такой телефон уже зарегистрирован. Введите другой.");
    }


    // Проверка на email
    $query = mysqli_query($connect, "SELECT id_user FROM users WHERE email = '$email'");
    $query = mysqli_fetch_array($query);
    $query = $query[0];

    if ($query)
    {
        $key = 0;
        header ("Location: ../registration.php?text=Такой email уже зарегистрирован. Введите другой.");
    }


    // Проверка на совпадение паролей
    if ($password != $passwordRepeat)
    {
        $key = 0;
        header ("Location: ../registration.php?text=Пароли не совпадают! Введите ещё раз.");
    }


    if ($key)
    {
        $query = mysqli_query($connect, "INSERT INTO users VALUES (NULL, '$telephone', '$email', '$password', '$firstname', '$secondname', '$address', 2)");

        $idUser = mysqli_query($connect, "SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1");
        $idUser = mysqli_fetch_array($idUser);
        $idUser = $idUser[0];

        $_SESSION['id_user'] = $idUser;

        header ("Location: ../../index.php");
    }