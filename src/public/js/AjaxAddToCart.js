function addToCart(id, name, price) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/Tienda/src/server/actions/ActionAddToCart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                try {
            
                    if (xhr.responseText.trim() === "") {
                        throw new Error("Respuesta vacía del servidor");
                    }

                    let response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        alert(response.success); 
                    } else {
                        alert(response.error || "Error desconocido.");
                    }
                } catch (e) {
                    console.error("Error procesando respuesta del servidor:", e, xhr.responseText);
                    alert("El servidor devolvió una respuesta inválida.");
                }
            } else {
                alert("Error en la solicitud. Código de estado: " + xhr.status);
            }
        }
    };

    // Enviar datos al servidor
    xhr.send("product_id=" + encodeURIComponent(id) + "&product_price=" + encodeURIComponent(price));
}
