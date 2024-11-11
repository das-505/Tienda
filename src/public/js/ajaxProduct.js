function catalogo() {

    var card = document.getElementById("card");
    var buscarElement = document.getElementById("busqueda-producto");
    var nombre = buscarElement.value;
    var catalogoContainer = document.getElementById("catalogo-container-row");

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/Tienda/src/server/controllers/ajaxController.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhr.responseText);
            var respuesta = JSON.parse(xhr.responseText);

            respuesta.forEach(producto => {
                var auxCard = card.cloneNode(true);
                auxCard.style.cssText = "http://localhost/Tienda";
                var title = auxCard.getElementsByClassName("card-title")[0];
                var precio = auxCard.getElementsByClassName("card-text ")[0];

                addToCartButton.addEventListener('click', function () {
                    addToCart(producto.id, producto.nombre, producto.precio);
                });
                title.innerText = producto.nombre;
                title.href = "http://localhost/Tienda/product.php?product_id=" + producto.id;
                precio.innerText = producto.precio;

                catalogoContainer.appendChild(auxCard);
            });
        }
    };


    xhr.send('busqueda-producto=' + encodeURIComponent(nombre) + '&action=filtroCatalogo');

}