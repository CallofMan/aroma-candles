

<header class='header'>

    <a href="../index.php" class="headElem">Свеча.РУ</a>

    <?php 

        if (empty($_SESSION['id_user']))
        {
            echo '<a href="php/authorization.php" class="headElem">Авторизация</a>';
        }
        else 
        {
            echo '<a href="php/personalAccount.php" class="headElem">Личный кабинет</a>';
            echo '<a href="php/scripts/logout.php" class="headElem">Выйти</a>';
        }

    ?>

</header>