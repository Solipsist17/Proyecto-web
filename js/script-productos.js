
/* Agregamos los productos dinámicamente */

let productos = ["../img/Productos/mancuerna-20kg1.jpg", "../img/Productos/banco-ejercicios.jpg", "../img/Productos/bandas_elasticas.jpg", "../img/Productos/chaleco_de_peso.jpg", "../img/Productos/bicicleta.jpg", "../img/Productos/caminadora.jpg"];


let container = document.querySelector(".producto-container");
for (let i=0; i<productos.length; i++){
    let cardDiv = document.createElement("div");
    cardDiv.className = "producto-card";
    let imgDiv = document.createElement("div");
    imgDiv.className = "producto-img";
    let descuentoSpan = document.createElement("span");
    descuentoSpan.className = "descuento-tag";
    descuentoSpan.textContent = "50% off";
    let img = document.createElement("img");
    img.className = "producto-miniatura";
    img.src = productos[i];
    let button = document.createElement("button");
    button.className = "card-btn";
    button.textContent = "Agregar al carrito";

    imgDiv.appendChild(descuentoSpan);
    imgDiv.appendChild(img);
    imgDiv.appendChild(button);

    cardDiv.appendChild(imgDiv);

    container.appendChild(cardDiv);
}
    


/* Slider en productos  */

const productoContainers = [...document.querySelectorAll(".producto-container")];

const nxtBtn = [...document.querySelectorAll(".nxt-btn")];
const preBtn = [...document.querySelectorAll(".pre-btn")];
       
productoContainers.forEach((item, i) => {
    let containerDimensiones = item.getBoundingClientRect();
    let containerWidth = containerDimensiones.width;
    console.log(i);
    console.log(item);
    nxtBtn[i].addEventListener("click", () => {
        item.scrollLeft += containerWidth;
    });
    
    preBtn[i].addEventListener("click", () => {
    item.scrollLeft -= containerWidth;
    });
});
    
    
        
/* Carrito de compras */
let numProductos = 0;

function cargar(item) {

    let body = document.body;
    let mostrador = document.getElementById("producto");
    let banner = document.getElementById("producto-banner");
    let seleccion = document.getElementById("seleccion");
    /* let cerrar = document.getElementById("cerrar"); */
    let imgSeleccionada = document.getElementById("imgSeleccionada");

    /* ESTO SE VA A IMPLEMENTAR (agregar los productos y que se guarden en el carrito) */
    
    /* console.log("Se clickeó el botón");
    if (item != null) {
        numProductos++;
        console.log("La cantidad de productos seleccionados: " + numProductos);
    } */


    /* mostrador.style.width = "60%"; */
    seleccion.style.width = "40%";
    seleccion.style.opacity = "1";
    console.log();
    console.log(item.parentNode.getElementsByClassName("producto-miniatura")[0]);
    imgSeleccionada.src = item.parentNode.getElementsByClassName("producto-miniatura")[0].src;
    imgSeleccionada.style.height = "100%"/* "100px" */;
    imgSeleccionada.style.width = "100%"/* "150px" */;
    imgSeleccionada.style.border = "solid";
    /* imgSeleccionada.style. */
    /* cerrar.style.opacity = "1"; */

    body.style.overflow = "hidden"; /* Bloqueamos el scroll */

    mostrador.style.opacity = "0.4";
    banner.style.opacity = "0.4";

    let rect = item.getBoundingClientRect(); 
    let posicionVertical = window.pageYOffset || document.documentElement.scrollTop;
    console.log(posicionVertical);
    seleccion.style.top = posicionVertical + "px";

    /* cerrar.addEventListener("click", cerrar(mostrador, seleccion)); */
}

function cerrar() {
    let body = document.body;
    let mostrador = document.getElementById("producto");
    let seleccion = document.getElementById("seleccion");
    let banner = document.getElementById("producto-banner");
    mostrador.style.width = "100%";
    seleccion.style.width = "0%";
    mostrador.style.opacity = "1";
    banner.style.opacity = "1";
    body.style.overflow = "auto";
}

/*Rodrigo agrego esto*/
/* let mostrador = document.getElementById("mostrador");
let seleccion = document.getElementById("seleccion");
let imgSeleccionada = document.getElementById("img");
let modeloSeleccionado = document.getElementById("modelo");
let descripSeleccionada = document.getElementById("descripcion");
let precioSeleccionado = document.getElementById("precio");

function cargar(item){
    quitarBordes();
    mostrador.style.width = "60%";
    seleccion.style.width = "40%";
    seleccion.style.opacity = "1";
    item.style.border = "2px solid red";

    imgSeleccionada.src = item.getElementsByTagName("img")[0].src;

    modeloSeleccionado.innerHTML =  item.getElementsByTagName("p")[0].innerHTML;

    descripSeleccionada.innerHTML = "Descripción del modelo ";

    precioSeleccionado.innerHTML =  item.getElementsByTagName("span")[0].innerHTML;


}
function cerrar(){
    mostrador.style.width = "100%";
    seleccion.style.width = "0%";
    seleccion.style.opacity = "0";
    quitarBordes();
}
function quitarBordes(){
    var items = document.getElementsByClassName("item");
    for(i=0;i <items.length; i++){
        items[i].style.border = "none";
    }
} */
/*Hasta aca*/