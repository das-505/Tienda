function removeFromCart(productId) {
    fetch('/server/actions/removeFromCart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: productId }),
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Mostrar respuesta
        location.reload(); // Actualizar carrito
    })
    .catch(error => console.error('Error:', error));
}
