document.getElementById("shopping-cart-button").addEventListener("click", function () {
    const cartPanel = document.getElementById("shopping-cart-panel");

    // Realizar petición AJAX al servidor
    fetch("load_cart.php")
        .then(response => response.json())
        .then(data => {
            // Limpiar contenido previo del carrito
            cartPanel.innerHTML = "";

            // Comprobar si hay productos
            if (data.products.length === 0) {
                cartPanel.innerHTML = `<div class="p-4 text-gray-500 text-center">Your cart is empty.</div>`;
            } else {
                let productList = "";
                data.products.forEach(product => {
                    productList += `
              <li class="flex py-6">
                <div class="h-24 w-24 shrink-0 overflow-hidden rounded-md border border-gray-200">
                  <img src="${product.image}" alt="${product.name}" class="h-full w-full object-cover object-center">
                </div>
                <div class="ml-4 flex flex-1 flex-col">
                  <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                      <h3>${product.name}</h3>
                      <p class="ml-4">$${(product.price).toFixed(2)}</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">${product.description}</p>
                  </div>
                  <div class="flex flex-1 items-end justify-between text-sm">
                    <p class="text-gray-500">Qty ${product.quantity}</p>
                    <button data-id="${product.id}" class="remove-btn font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                  </div>
                </div>
              </li>`;
                });

                // Renderizar productos y subtotal
                cartPanel.innerHTML = `
            <div class="bg-white shadow-xl max-w-md mx-auto p-4">
              <h2 class="text-lg font-medium text-gray-900 mb-4">Shopping Cart</h2>
              <ul class="-my-6 divide-y divide-gray-200">
                ${productList}
              </ul>
              <div class="border-t border-gray-200 py-6">
                <div class="flex justify-between text-base font-medium text-gray-900">
                  <p>Subtotal</p>
                  <p>$${(data.subtotal).toFixed(2)}</p>
                </div>
                <div class="mt-6">
                  <a href="checkout.php" class="block text-center bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Checkout</a>
                </div>
              </div>
            </div>`;
            }

            // Mostrar el carrito
            cartPanel.classList.remove("hidden");
        })
        .catch(err => {
            console.error("Error loading cart:", err);
            alert("Could not load the cart.");
        });
});

//para eliminar productos del carrito
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-btn")) {
        const productId = e.target.getAttribute("data-id");

        fetch("load_cart.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ action: "remove", product_id: productId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Product removed!");
                    // Actualizar carrito
                    document.getElementById("shopping-cart-button").click();
                }
            })
            .catch(err => console.error("Error removing product:", err));
    }
});
