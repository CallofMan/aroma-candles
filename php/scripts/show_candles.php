<?php

    session_start();

    require_once "connection.php";

    $idUser = $_SESSION['id_user'];

    echo "<main class='main'>";

        $query = mysqli_query($connect, "SELECT * FROM candles WHERE id_category != 1 ORDER BY total_sold DESC");
        
        while ($showCandles = mysqli_fetch_assoc($query))
        {
            $idCandle = $showCandles['id_candle'];
            $idAroma = $showCandles['id_aroma'];
            $idColor = $showCandles['id_color'];
            $idShape = $showCandles['id_shape'];
            $idSize = $showCandles['id_size'];
            $idCategory = $showCandles['id_category'];

            $specifications = mysqli_query($connect, "SELECT aromas.name, colors.name, shapes.name, sizes.name, categories.name FROM aromas, colors, shapes, sizes, categories WHERE aromas.id_aroma = $idAroma AND colors.id_color = $idColor AND shapes.id_shape = $idShape AND sizes.id_size = $idSize AND categories.id_category = $idCategory");
            $specifications = mysqli_fetch_array($specifications);

            $nameImage = mysqli_query($connect, "SELECT path FROM images WHERE id_candle = $idCandle");
            $nameImage = mysqli_fetch_array($nameImage);


            // $idAroma = $showCandles['id_aroma'];
            // $aroma = mysqli_query($connect, "SELECT name FROM aromas WHERE id_aroma = $idAroma");
            // $aroma = mysqli_fetch_array($aroma);

            // $idColor = $showCandles['id_color'];
            // $color = mysqli_query($connect, "SELECT name FROM colors WHERE id_color = $idColor");
            // $color = mysqli_fetch_array($color);

            // $idShape = $showCandles['id_shape'];
            // $shape = mysqli_query($connect, "SELECT name FROM shapes WHERE id_shape = $idShape");
            // $shape = mysqli_fetch_array($shape);

            // $idSize = $showCandles['id_size'];
            // $size = mysqli_query($connect, "SELECT name FROM sizes WHERE id_size = $idSize");
            // $size = mysqli_fetch_array($size);
            
            // $idCategory = $showCandles['id_category'];
            // $category = mysqli_query($connect, "SELECT name FROM categories WHERE id_category = $idCategory");
            // $category = mysqli_fetch_array($category);

            echo 
            "
                <section class='candle'>

                    <h1 id='candle" . $idCandle . "'>" . $showCandles['name'] . "</h1>

                    
                    
                    <article class='image_block'>";

                        if ($nameImage[0])
                        {
                            echo "<img src='../../images/" . $nameImage[0] . "' alt='Изображение отсутствует' class='image_candle'>";
                        }
                        else 
                        {
                            echo "<img src='../../images/sys/nothing.jpg' alt='Изображение отсутствует' class='image_candle'>";
                        }
                        
            echo
            "
                    </article>
            
                    <section class='specifications_block'>
            
                        <p class='specifications'>Аромат: " . $specifications[0] . "</p>
                        <p class='specifications'>Цвет: " . $specifications[1] . "</p>
                        <p class='specifications'>Форма: " . $specifications[2] . "</p>
                        <p class='specifications'>Размер: " . $specifications[3] . "</p>
                        <p class='specifications'>Категория: " . $specifications[4] . "</p>
            
                    </section>
                    
            
                    <section class='priceAndQuantity'>
            
                        <p class='specifications'>Цена: " . $showCandles['price'] . " руб</p>
                        <p class='specifications'>Кол: " . $showCandles['quantity'] . "</p>
            
                    </section>
            ";

                        $candleBasket = 0;

                        if ($idUser)
                        {

                            $idOrder = mysqli_query($connect, "SELECT id_order FROM orders WHERE id_user = $idUser AND id_status = 1");
                            $idOrder = mysqli_fetch_array($idOrder);
                            $idOrder = $idOrder[0];

                            if($idOrder)
                            {
    
                                $candleBasket = mysqli_query($connect, "SELECT id_candle FROM details_order WHERE id_candle = $idCandle AND id_order = $idOrder");
                                $candleBasket = mysqli_fetch_array($candleBasket);
                                $candleBasket = $candleBasket[0];
    
                            }
                           
                        }

        


                        if ($candleBasket)
                        {
                            echo "<button class='add_basket_empty'>В корзине</button>";
                        }
                        else if ($showCandles['quantity'] && $_SESSION['id_user'])
                        {
                            echo "<button class='add_basket' id='candleBasket" . $idCandle . "'>В корзину</button>";
                        }
                        else if ($_SESSION['id_user'] && !$showCandles['quantity'])
                        {
                            echo "<button class='add_basket_empty' id='candleBasket" . $idCandle . "'>Нет в наличии</button>";
                        }
                        else
                        {
                            echo "<a href='php/authorization.php' class='button'>Авторизируйся</a>";
                        }

                        



            echo 
            "
                </section>
            ";
        } 


    echo "</main>";

?>