<?php

    session_start();

    require_once "script_check_auth.php";
    require_once "connection.php";
    
    $idCandle = $_GET['id_candle'];
    $quantity = $_GET['quantity'];
    $idUser = $_SESSION['id_user'];

    $candle = mysqli_query($connect, "SELECT price, quantity FROM candles WHERE id_candle = $idCandle");
    $candle = mysqli_fetch_assoc($candle);

    $totalSumPosition = $quantity * $candle['price'];

    $checkingOrder = mysqli_query($connect, "SELECT id_order FROM orders WHERE id_user = $idUser AND id_status = 1");
    $checkingOrder = mysqli_fetch_assoc($checkingOrder);

    $idOrder = $checkingOrder['id_order'];

    if ($quantity <= 0)
    {
        $delete = mysqli_query($connect, "DELETE FROM details_order WHERE id_candle = $idCandle AND id_order = $idOrder");
    }
    else
    {
        $update = mysqli_query($connect, "UPDATE details_order SET quantity = $quantity, position_sum = $totalSumPosition WHERE id_candle = $idCandle AND id_order = $idOrder");
    }

    $update = mysqli_query($connect, "UPDATE orders SET total_sum = (SELECT SUM(position_sum) FROM details_order WHERE id_order = $idOrder) WHERE id_order = $idOrder"); 

?>