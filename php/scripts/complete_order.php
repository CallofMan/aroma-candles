<?php

    session_start();

    require_once "script_check_auth.php";
    require_once "connection.php";

    $idOrder = $_GET['id_order'];

    $queryPosition = mysqli_query($connect, "SELECT id_candle, quantity FROM details_order WHERE id_order = $idOrder");

    while ($position = mysqli_fetch_assoc($queryPosition))
    {
        $idCandle = $position['id_candle'];
        $quantity = $position['quantity'];

        $candle = mysqli_query($connect, "SELECT quantity, total_sold FROM candles WHERE id_candle = $idCandle");
        $candle = mysqli_fetch_assoc($candle);

        $totalQuantity = $candle['quantity'] - $quantity;
        $total_sold = $candle['quantity'] + $quantity;
        
        $update = mysqli_query($connect, "UPDATE candles SET quantity = $totalQuantity, total_sold = $total_sold WHERE id_candle = $idCandle");

    }

    $date = date("Y-m-d");

    $update = mysqli_query($connect, "UPDATE orders SET date_of_end = '$date', id_status = 3 WHERE id_order = $idOrder");