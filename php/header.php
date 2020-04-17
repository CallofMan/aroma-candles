<?php

    session_start();

    require_once "scripts/connection.php";

    echo "<header class='header'>";

        $idUser = $_SESSION['id_user'];

        if (empty($idUser))
        {
            echo '<a href="php/authorization.php" class="headElem">Авторизация</a>';
        }
        else 
        {
            $orderSum = mysqli_query($connect, "SELECT total_sum FROM orders WHERE id_user = $idUser AND id_status = 1");
            $orderSum = mysqli_fetch_array($orderSum);
            $orderSum = $orderSum[0];

            $personalData = mysqli_query($connect, "SELECT first_name, second_name FROM users WHERE id_user = $idUser");
            $personalData = mysqli_fetch_array($personalData);

            echo '<a href="php/scripts/logout.php" class="headElem">Выйти (<span class="little_font_size">' . $personalData[0] . ' ' . $personalData[1] . '</span>)</a>';
            echo '<a href="php/personalAccount.php" class="headElem">Личный кабинет</a>';
            echo '<a href="../index.php" class="headElem"><img src="../images/sys/Black_Cart.png" alt="Не грузит"> <span style="font-size: small;">  ' . $orderSum . ' рублей </span></a>';
        }

    echo "</header>";

?>

