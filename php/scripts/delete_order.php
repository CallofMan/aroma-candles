<?php

    session_start();

    require_once "script_check_auth.php";
    require_once "connection.php";

    $idOrder = $_GET['id_order'];

    $delete = mysqli_query($connect, "DELETE FROM orders WHERE id_order = $idOrder");

?>

