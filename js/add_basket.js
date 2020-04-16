let showCandles = () =>
{
    fetch('../php/scripts/show_candles.php')

    .then((response) => 
    {
        return response.text();
    })
    .then((data) => 
    {
        document.querySelector('main').remove();
        document.querySelector('body').insertAdjacentHTML('beforeend', data);
    })
}

document.querySelector('body').addEventListener('click', (event) => 
{
    if (event.target.getAttribute('class') == 'add_basket')
    {
        let idCandle = event.target.id.replace(/[^0-9]/g, "");
    
        console.log(idCandle);

        fetch('../php/scripts/add_to_basket.php?id_candle=' + idCandle)
        // .then((response) => {return response.text()})
        // .then((text) => {console.log(text)})
        .then((response) => 
        {
            // window.location.href = "../php/scripts/add_to_basket.php?id_candle=" + idCandle;
            alert('Свеча добавлена в корзину');
            showCandles();
        })
    }

    // let allCandlesButton = document.querySelectorAll('.add_basket');

    // allCandlesButton.forEach(element => 
    // {
    //     element.addEventListener('click', () => 
    //     {
    //         let idCandle = element.id.replace(/[^0-9]/g, "");
    
    //         console.log(idCandle);
    
    //         fetch('../php/scripts/add_to_basket.php?id_candle=' + idCandle)
    //         // .then((response) => {return response.text()})
    //         // .then((text) => {console.log(text)})
    //         .then((response) => 
    //         {
    //             //window.location.href = "../php/scripts/add_to_basket.php?id_candle=" + idCandle;
    //             alert('Свеча добавлена в корзину');
    //             showCandles();
    //             allCandlesButton = document.querySelectorAll('.add_basket');
    //         })
    //     })
    // });
})