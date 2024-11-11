document.querySelector('#cesta').addEventListener('click', mostrarCesta);

function mostrarCesta(){

    var xhttp = new XMLHttpRequest();

    xhttp.open("GET","../shoppingCart.php", true);

    xhttp.send();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.querySelector("#contenCart").innerHTML = this.responseText;
        }
    }
}