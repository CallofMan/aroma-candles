<header class='header'>

    <a href="../index.php" class="headElem">Свеча.РУ</a>

    <?php 

        $idUser = $_SESSION['id_user'];

        if (empty($idUser))
        {
            echo '<a href="php/authorization.php" class="headElem">Авторизация</a>';
        }
        else 
        {
            $personalData = mysqli_query($connect, "SELECT first_name, second_name FROM users WHERE id_user = $idUser");
            $personalData = mysqli_fetch_array($personalData);

            echo '<a href="php/personalAccount.php" class="headElem">Личный кабинет</a>';
            echo '<a href="php/scripts/logout.php" class="headElem">Выйти (<span class="little_font_size">' . $personalData[0] . ' ' . $personalData[1] . '</span>)</a>';
        }

    ?>

</header>