<?php

    session_start();

    require_once "script_check_auth.php";
    require_once "connection.php";

    $idUser = $_SESSION['id_user'];

    $count = mysqli_query($connect, "SELECT count(id_order) FROM orders WHERE id_user = $idUser");
    $count = mysqli_fetch_array($count);
    $count = $count[0];

    $key = 0;

    $queryOrder = mysqli_query($connect, "SELECT * FROM orders WHERE id_user = $idUser ORDER BY id_order DESC");

    echo 
    "
        <main class='main'>
    ";

    while ($order = mysqli_fetch_assoc($queryOrder))
    {
        $key = 1;

        $idOrder = $order['id_order'];

        $status = $order['id_status'];
        $status = mysqli_query($connect, "SELECT name FROM statuses WHERE id_status = $status");
        $status = mysqli_fetch_array($status);
        $status = $status[0];

        if ($order['id_status'] == 1)
        {
            echo 
            "
                <section class='order_block'>

                    <section class='info_order'>
            
                        <h1 id='order" . $idOrder . "'>Заказ №" . $count . "</h1>
            
                        <hr>
            
                        <p class='specifications_order'>Дата создания: " . $order['date_of_start'] . "</p>
                        <p class='specifications_order'>Статус: " . $status . "</p>
                        <p class='specifications_order'>Итого: " . $order['total_sum'] . " руб</p>
            
                        <section class='do_order'>
            
                            <button class='pay_order' id='pay_order" . $idOrder . "'>Оформить</button>
                            <button class='delete_order' id='delete_order" . $idOrder . "'>Удалить</button>
            
                        </section>
            
                    </section>";

                    $queryPosition = mysqli_query($connect, "SELECT * FROM details_order WHERE id_order = $idOrder");

                    while ($position = mysqli_fetch_assoc($queryPosition))
                    {

                        $nameCandle = $position['id_candle'];
                        $nameCandle = mysqli_query($connect, "SELECT name FROM candles WHERE id_candle = $nameCandle");
                        $nameCandle = mysqli_fetch_array($nameCandle);
                        $nameCandle = $nameCandle[0];

                        echo 
                        "
                
                        <section class='position_order'>
                
                            <a href='candle_page?id_candle=" . $position['id_candle'] . "' class='specifications'>" . $nameCandle . "</a>
                
                            <section class='do_order'>
                
                                <input class='quantity' max='' id='quantity_candle" . $position['id_candle'] . "' type='number' value='" . $position['quantity'] . "'></input>
                                <button class='edit_quantity' id='edit_candle" . $position['id_candle'] . "'>Изменить</button>
                                <button class='delete_position' id='delete_candle" . $position['id_candle'] . "'>Удалить</button>
                
                            </section>
                
                            <p class='specifications'>Итого: " . $position['position_sum'] . " руб</p>
                            
                        </section>";
                    }
                
            echo
            "
                
                </section>

            ";
        }
        else
        {
            echo 
            "

            <section class='order_block'>

                <section class='info_order'>
        
                    <h1>Заказ №" . $count . "</h1>
        
                    <hr>
        
                    <p class='specifications_order'>Дата создания: " . $order['date_of_start'] . "</p>
                    <p class='specifications_order'>Дата окончания: " . $order['date_of_end'] . "</p>
                    <p class='specifications_order'>Итого: " . $order['total_sum'] . " руб</p>
                    <p class='specifications_order'>Статус: исполнен</p>
        
                </section>
            ";

                $queryPosition = mysqli_query($connect, "SELECT * FROM details_order WHERE id_order = $idOrder");

                    while ($position = mysqli_fetch_assoc($queryPosition))
                    {

                        $nameCandle = $position['id_candle'];
                        $nameCandle = mysqli_query($connect, "SELECT name FROM candles WHERE id_candle = $nameCandle");
                        $nameCandle = mysqli_fetch_array($nameCandle);
                        $nameCandle = $nameCandle[0];

                        echo 
                        "

                        <section class='position_order'>
        
                            <a href='candle_page?id_candle=" . $position['id_candle'] . "' class='specifications'>" . $nameCandle . "</a>
                
                            <p class='specifications'>Кол: " . $position['quantity'] . "</p>
                
                            <p class='specifications'>Итого: " . $position['position_sum'] . " руб</p>
                            
                        </section>

                        ";
                    }

            echo 
            "
                
                </section>

            ";
        }
        
        $count--; 
    }

    echo 
    "
        </main>
    ";

    if (!$key)
    {
        echo 
        "

            <h1 style='width: 300px;'> Заказов пока нет </h1>

        ";
    }

?>