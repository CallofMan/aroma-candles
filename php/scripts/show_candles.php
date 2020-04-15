<main class='main'>

    <?php

        $query = mysqli_query($connect, "SELECT * FROM candles WHERE id_category != 1 ORDER BY total_sold DESC");
        
        while ($showCandles = mysqli_fetch_assoc($query))
        {
            $idCandle = $showCandles['id_candle'];
            $nameImage = mysqli_query($connect, "SELECT path FROM images WHERE id_candle = $idCandle");
            $nameImage = mysqli_fetch_array($nameImage);


            $idAroma = $showCandles['id_aroma'];
            $aroma = mysqli_query($connect, "SELECT name FROM aromas WHERE id_aroma = $idAroma");
            $aroma = mysqli_fetch_array($aroma);

            $idColor = $showCandles['id_color'];
            $color = mysqli_query($connect, "SELECT name FROM colors WHERE id_color = $idColor");
            $color = mysqli_fetch_array($color);

            $idShape = $showCandles['id_shape'];
            $shape = mysqli_query($connect, "SELECT name FROM shapes WHERE id_shape = $idShape");
            $shape = mysqli_fetch_array($shape);

            $idSize = $showCandles['id_size'];
            $size = mysqli_query($connect, "SELECT name FROM sizes WHERE id_size = $idSize");
            $size = mysqli_fetch_array($size);
            
            $idCategory = $showCandles['id_category'];
            $category = mysqli_query($connect, "SELECT name FROM categories WHERE id_category = $idCategory");
            $category = mysqli_fetch_array($category);

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
                            echo "<img src='../../images/nothing.jpg' alt='Изображение отсутствует' class='image_candle'>";
                        }
                        
            echo
            "
                    </article>
            
                    <section class='specifications_block'>
            
                        <p class='specifications'>Аромат: " . $aroma[0] . "</p>
                        <p class='specifications'>Цвет: " . $color[0] . "</p>
                        <p class='specifications'>Форма: " . $shape[0] . "</p>
                        <p class='specifications'>Размер: " . $size[0] . "</p>
                        <p class='specifications'>Категория: " . $category[0] . "</p>
            
                    </section>
                    
            
                    <section class='priceAndQuantity'>
            
                        <p class='specifications'>Цена: " . $showCandles['price'] . "</p>
                        <p class='specifications'>Кол: " . $showCandles['quantity'] . "</p>
            
                    </section>
            
                    <button class='button' id='candleBasket" . $idCandle . "'>В корзину</button>
            
                </section>
            ";
        } 

    ?>

</main>

