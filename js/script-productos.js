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
/* let productoContainers = [];
for(let i = 0; i<document.querySelectorAll(".producto-container").length; i++ ){
    let elemento = document.querySelectorAll(".producto-container")[i];
    productoContainers.push(elemento);
} */

const productoContainers = [...document.querySelectorAll(".producto-container")];

const nxtBtn = [...document.querySelectorAll(".nxt-btn")];
const preBtn = [...document.querySelectorAll(".pre-btn")];

productoContainers.forEach((item, i) => {
    let containerDimensiones = item.getBoundingClientRect();
    let containerWidth = containerDimensiones.width;
    
    nxtBtn[i].addEventListener("click", () => {
        item.scrollLeft += containerWidth;
        
    });

    preBtn[i].addEventListener("click", () => {
        item.scrollLeft -= containerWidth;
    });
});

/*  */
/* let mostrador = document.getElementById("producto");
let seleccion = document.getElementById("seleccion");
let imgSeleccioada = document.getElementById("img"); */


function cargar(item) {
    let body = document.body;
    let mostrador = document.getElementById("producto");
    let banner = document.getElementById("producto-banner");
    let seleccion = document.getElementById("seleccion");
    let imgSeleccionada = document.getElementById("img");

    console.log("Se clickeó el botón");
    /* mostrador.style.width = "60%"; */
    seleccion.style.width = "40%";
    seleccion.style.opacity = "1";

    body.style.overflow = "hidden"; /* Bloqueamos el scroll */

    mostrador.style.opacity = "0.4";
    banner.style.opacity = "0.4";

    let rect = item.getBoundingClientRect(); 
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    let posicionVertical = scrollTop;
    console.log(posicionVertical);
    seleccion.style.top = posicionVertical + "px";
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