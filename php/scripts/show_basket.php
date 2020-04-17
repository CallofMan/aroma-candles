<?php

    session_start();

    require_once "script_check_auth.php";
    require_once "connection.php";

?>

<main class='main'>

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

        <section class='position_order'>

<a href='candle_page' class='specifications'>свечии</a>

<section class='do_order'>

    <input class='quantity' type='number' value='10'></input>
    <button class='quantity'>Изменить</button>
    <button class='delete_position'>Удалить</button>

</section>

<p class='specifications'>Итого: 1000 руб</p>

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

<section class='position_order'>

<a href='candle_page' class='specifications'>свечии</a>

<section class='do_order'>

    <input class='quantity' type='number' value='10'></input>
    <button class='quantity'>Изменить</button>
    <button class='delete_position'>Удалить</button>

</section>

<p class='specifications'>Итого: 1000 руб</p>

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

</main>