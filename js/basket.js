document.querySelector('body').addEventListener('click', (event) => 
{

    if(event.target.getAttribute('class') == 'delete_position')
    {
        let idPosition = event.target.id.replace(/[^0-9]/g, "");

        console.log("Delete candle id: " + idPosition);
    }

    if(event.target.getAttribute('class') == 'edit_quantity')
    {
        let idPosition = event.target.id.replace(/[^0-9]/g, "");

        console.log("Edit candle id: " + idPosition);

        let quantity = document.getElementById('quantity_candle' + idPosition).value;

        console.log("Количествео: " + quantity);
    }

    if(event.target.getAttribute('class') == 'pay_order')
    {
        let idOrder = event.target.id.replace(/[^0-9]/g, "");

        console.log("Pay order id: " + idOrder);
    }

    if(event.target.getAttribute('class') == 'delete_order')
    {
        let idOrder = event.target.id.replace(/[^0-9]/g, "");

        console.log("Delete order id: " + idOrder);
    }
})