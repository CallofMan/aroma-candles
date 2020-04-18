<?php

    session_start();

    require_once "script_check_auth.php";
    require_once "connection.php";

    $idUser = $_SESSION['id_user'];

    $queryOrder = mysqli_query($connect, "SELECT * FROM orders WHERE id_user = $idUser");
    $count = 0;
    while ($order = mysqli_fetch_assoc($queryOrder))
    {
        $count++;

        $idOrder = $order['id_order'];

        $status = $order['id_status'];
        $status = mysqli_query($connect, "SELECT name FROM statuses WHERE id_status = $status");
        $status = mysqli_fetch_array($status);
        $status = $status[0];

        echo 
        "
            <main class='main'>

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
                
                                <input class='quantity' id='quantity_candle" . $position['id_candle'] . "' type='number' value='" . $position['quantity'] . "'></input>
                                <button class='edit_quantity' id='edit_candle" . $position['id_candle'] . "'>Изменить</button>
                                <button class='delete_position' id='delete_candle" . $position['id_candle'] . "'>Удалить</button>
                
                            </section>
                
                            <p class='specifications'>Итого: " . $position['position_sum'] . " руб</p>
                            
                        </section>";
                    }
                
                echo
                "
                
                </section>

            </main>

        ";
    }

?>

<!-- <main class='main'>

    <section class='order_block'>

        <section class='info_order'>

            <h1>Заказ №1</h1>

            <hr>

            <p class='specifications_order'>Дата создания: 2020-02-20</p>
            <p class='specifications_order'>Статус: В корзине</p>
            <p class='specifications_order'>Итого: 19000.00 руб</p>

            <section class='do_order'>

                <button class='pay_order'>Оформить</button>
                <button class='delete_order'>Удалить</button>

            </section>

        </section>

        <section class='position_order'>

            <a href='candle_page' class='specifications'>свечии</a>

            <section class='do_order'>

                <input class='quantity' type='number' value='10'></input>
                <button class='quantity'>Изменить</button>
                <button class='delete_position'>Удалить</button>

            </section>

            <p class='specifications'>Итого: 1000 руб</p>
            
        </section>

        
    </section>


    <section class='order_block'>

        <section class='info_order'>

            <h1>Заказ №123</h1>

            <hr>

            <p class='specifications_order'>Дата создания: 2020-02-20</p>
            <p class='specifications_order'>Дата окончания: 2020-02-20</p>
            <p class='specifications_order'>Итого: 19000.00 руб</p>
            <p class='specifications_order'>Статус: исполнен</p>

        </section>

        <section class='position_order'>

            <a href='candle_page' class='specifications'>свечии</a>

            <p class='specifications'>Кол: 100</p>

            <p class='specifications'>Итого: 1000 руб</p>
            
        </section>

        <section class='position_order'>

<a href='candle_page' class='specifications'>свечии</a>

<p class='specifications'>Кол: 100</p>

<p class='specifications'>Итого: 1000 руб</p>

</section>

<section class='position_order'>

<a href='candle_page' class='specifications'>свечии</a>

<p class='specifications'>Кол: 100</p>

<p class='specifications'>Итого: 1000 руб</p>

</section>

<section class='position_order'>

<a href='candle_page' class='specifications'>свечии</a>

<p class='specifications'>Кол: 100</p>

<p class='specifications'>Итого: 1000 руб</p>

</section>

        
    </section>

</main> -->