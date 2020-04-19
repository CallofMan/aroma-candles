let showBasket = () =>
{
    fetch(`../php/scripts/show_basket.php`)

    .then((response) =>
    {
        return response.text();
    })
    .then((data) => 
    {
        document.querySelector('.main').remove();
        document.querySelector('body').insertAdjacentHTML('beforeend', data);
    })
}

document.querySelector('body').addEventListener('click', (event) => 
{

    if(event.target.getAttribute('class') == 'delete_position')
    {
        let idCandle = event.target.id.replace(/[^0-9]/g, "");

        console.log("Delete candle id: " + idCandle);

        fetch(`../php/scripts/delete_position.php?id_candle=${idCandle}`)

        .then((response) =>
        {
            showBasket();
        })
    }

    if(event.target.getAttribute('class') == 'edit_quantity')
    {
        let idCandle = event.target.id.replace(/[^0-9]/g, "");

        console.log("Edit candle id: " + idCandle);

        let quantity = document.getElementById('quantity_candle' + idCandle).value;

        console.log("Количествео: " + quantity);

        fetch(`../php/scripts/edit_quantity.php?id_candle=${idCandle}&quantity=${quantity}`)

        .then((response) =>
        {
            showBasket();
        })
        // .then((response) => {return response.text()})
        // .then((text) => {console.log(text)})
    }

    if(event.target.getAttribute('class') == 'pay_order')
    {
        let idOrder = event.target.id.replace(/[^0-9]/g, "");

        console.log("Pay order id: " + idOrder);

        fetch(`../php/scripts/complete_order.php?id_order=${idOrder}`)

        .then((response) => 
        {  
            showBasket();
        })

        // .then((response) => {return response.text()})
        // .then((text) => {console.log(text)})
    }

    if(event.target.getAttribute('class') == 'delete_order')
    {
        let idOrder = event.target.id.replace(/[^0-9]/g, "");

        console.log("Delete order id: " + idOrder);

        fetch(`../php/scripts/delete_order.php?id_order=${idOrder}`)

        .then((response) =>
        {
            showBasket();
        })
    }
})