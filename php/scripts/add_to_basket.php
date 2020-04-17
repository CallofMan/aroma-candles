<?php

    session_start();

    require_once "connection.php";

    $idCandle = $_GET['id_candle'];
    $idUser = $_SESSION['id_user'];

    $candle = mysqli_query($connect, "SELECT price, quantity, total_sold FROM candles WHERE id_candle = $idCandle");
    $candle = mysqli_fetch_assoc($candle);

    $totalSold = $candle['total_sold'] + 1;
    $quantityCandle = $candle['quantity'] - 1;
    $priceCandle = $candle['price'];

    $checkingOrder = mysqli_query($connect, "SELECT id_order, total_sum FROM orders WHERE id_user = $idUser AND id_status = 1");
    $checkingOrder = mysqli_fetch_assoc($checkingOrder);

    if (isset($checkingOrder))
    {
        $idOrder = $checkingOrder['id_order'];
        $totalSumOrder = $checkingOrder['total_sum'];
        (float)$totalSumOrder += (float)$priceCandle;
        
        $checkingPosition = mysqli_query($connect, "SELECT id_position, quantity FROM details_order WHERE id_candle = $idCandle AND id_order = $idOrder");
        $checkingPosition = mysqli_fetch_assoc($checkingPosition);

        if (isset($checkingPosition))
        {
            $idPosition = $checkingPosition['id_position'];
            $totalQuantity = $checkingPosition['quantity'] + 1;
            $totalSumPosition = $totalQuantity * $priceCandle;

            $update = mysqli_query($connect, "UPDATE details_order SET quantity = $totalQuantity, position_sum = $totalSumPosition WHERE id_position = $idPosition");

            $update = mysqli_query($connect, "UPDATE orders SET total_sum = $totalSumOrder WHERE id_order = $idOrder");
        }
        else 
        {
            $insert = mysqli_query($connect, "INSERT INTO details_order VALUES (NULL, $idOrder, $idCandle, 1, $priceCandle)");

            $update = mysqli_query($connect, "UPDATE orders SET total_sum = $totalSumOrder WHERE id_order = $idOrder");
        }
    }
    else 
    {
        $date = date("Y-m-d");

        $insert = mysqli_query($connect, "INSERT INTO orders VALUES (NULL, $idUser, 0.00, '$date', NULL, 1)");

        $idOrder = mysqli_query($connect, "SELECT id_order FROM orders WHERE id_user = $idUser AND id_status = 1");
        $idOrder = mysqli_fetch_array($idOrder);
        $idOrder = $idOrder[0];

        $insert = mysqli_query($connect, "INSERT INTO details_order VALUES (NULL, $idOrder, $idCandle, 1, $priceCandle)");

        $update = mysqli_query($connect, "UPDATE orders SET total_sum = $priceCandle WHERE id_order = $idOrder");
    }

    $update = mysqli_query($connect, "UPDATE candles SET quantity = $quantityCandle, total_sold = $totalSold WHERE id_candle = $idCandle");