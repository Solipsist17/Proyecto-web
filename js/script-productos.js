
/* Creamos los productos dinámicamente */
let productosBanner = ["../img/Productos/mancuerna-20kg1.jpg", "../img/Productos/banco-ejercicios.jpg", "../img/Productos/bandas_elasticas.jpg", "../img/Productos/chaleco_de_peso.jpg", "../img/Productos/bicicleta.jpg", "../img/Productos/caminadora.jpg"];

let container = document.querySelector(".producto-container");

for (let i=0; i<productosBanner.length; i++){
    let cardDiv = document.createElement("div");
    cardDiv.className = "producto-card";
    let imgDiv = document.createElement("div");
    imgDiv.className = "producto-img";
    let descuentoSpan = document.createElement("span");
    descuentoSpan.className = "descuento-tag";
    descuentoSpan.textContent = "50% off";
    let img = document.createElement("img");
    img.className = "producto-miniatura";
    img.src = productosBanner[i];
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
    /* console.log(i); */
    console.log(nxtBtn[i]);
    nxtBtn[i].addEventListener("click", () => {
        item.scrollLeft += containerWidth;
    });
    
    preBtn[i].addEventListener("click", () => {
    item.scrollLeft -= containerWidth;
    });
});

/* Mostrador de productos */
let productos = [
    {nombre: "Mancuernas", descripcion: "Par de mancuernas de 20kg cada una", precio: 90, img: "../img/Productos/mancuerna-20kg1.jpg"},
    {nombre: "Banco ejercicios", descripcion: "Banco para realizar ejercicios", precio: 250, img: "../img/Productos/banco-ejercicios.jpg"},
    {nombre: "Bandas elasticas", descripcion: "Bandas para ejercicios", precio: 20, img: "../img/Productos/bandas_elasticas.jpg"},
    {nombre: "Chaleco peso", descripcion: "Chaleco con pesos para 20kg máximo", precio: 100, img: "../img/Productos/chaleco_de_peso.jpg"},
    {nombre: "bicicleta", descripcion: "Bicicleta para ejercicios", precio: 160, img: "../img/Productos/Bicicleta.jpg"},
    {nombre: "Caminadora", descripcion: "Múltiples funcionalidades", precio: 300, img: "../img/Productos/caminadora.jpg"}
]

let mostrador = document.getElementById("producto");
cargarMostrador(productos);
function cargarMostrador(productos) {
    let productoMostrador = document.getElementById("productoMostrador");

    for (let i = 0; i < productos.length; i++) {
        let productoCard = document.createElement("div");
        productoCard.className = "producto-card";


        let productoImg = document.createElement("div");
        productoImg.className = "producto-img";

        let descuentoTag = document.createElement("span");
        descuentoTag.className = "descuento-tag";
        descuentoTag.textContent = "50% off";
        /* productoImg.appendChild(descuentoTag); */
        let img = document.createElement("img");
        img.className = "producto-miniatura";
        img.src = productos[i].img;
        /* productoImg.appendChild(img); */
        let btnAgregar = document.createElement("button");
        btnAgregar.className = "card-btn";
        btnAgregar.addEventListener("click", function() {
            cargar(this);
        });
        btnAgregar.textContent = "Agregar al carrito";
        /* productoImg.appendChild(btnAgregar); */
        
        let productoInfo = document.createElement("div");
        productoInfo.className = "producto-info";

        let productoNombre = document.createElement("h2");
        productoNombre.className = "producto-marca";
        productoNombre.textContent = productos[i].nombre;
        let productoDescripcion = document.createElement("p");
        productoDescripcion.className = "producto-descripcion";
        productoDescripcion.textContent = productos[i].descripcion;
        let precio = document.createElement("span");
        precio.className = "precio";
        precio.textContent = "S/" + productos[i].precio.toFixed(2);
        let precioActual = document.createElement("span");
        precioActual.className = "precio-actual";
        precioActual.textContent = "S/300.00";

        productoImg.appendChild(descuentoTag);
        productoImg.appendChild(img);
        productoImg.appendChild(btnAgregar);
        productoInfo.appendChild(productoNombre);
        productoInfo.appendChild(productoDescripcion);
        productoInfo.appendChild(precio);
        productoInfo.appendChild(precioActual);

        productoCard.appendChild(productoImg);
        productoCard.appendChild(productoInfo);
        
        productoMostrador.appendChild(productoCard);
    }
}

        
/* Carrito de compras */

let numProductos = [];
let productosCarrito = []; /* Productos agregados al carrito */

function cargar(item) { /* Cargamos el carrito de compras */

    let body = document.body;
    let mostrador = document.getElementById("producto");
    let banner = document.getElementById("producto-banner");

    let seleccion = document.getElementById("seleccion");
    /* let productCard = item.closest(".producto-card");  */
    /* let nombreProducto = document.getElementById("nombreProducto"); */
    let imgSeleccionada = document.getElementById("imgSeleccionada"); 

    seleccion.style.width = "40%";
    seleccion.style.opacity = "1";
    /* imgSeleccionada.src = item.parentNode.getElementsByClassName("producto-miniatura")[0].src; */
    /* imgSeleccionada.style.height = "100%";
    imgSeleccionada.style.width = "100%";
    imgSeleccionada.style.border = "solid"; */
    /* imgSeleccionada.style. */
    /* cerrar.style.opacity = "1"; */

    body.style.overflow = "hidden"; /* Bloqueamos el scroll */
    /* Opacamos el fondo */
    mostrador.style.opacity = "0.4";
    banner.style.opacity = "0.4";

    /* Obtenemos las dimensiones y posicionamos */
    let rect = item.getBoundingClientRect(); 
    let posicionVertical = window.pageYOffset || document.documentElement.scrollTop;
    console.log(posicionVertical);
    seleccion.style.top = posicionVertical + "px";

    /* Agregamos los productos al array carrito */
    /* productosCarrito.push(productCard); 
    console.log(productosCarrito); */
    agregarCarrito(item);
    cargarArrayCarrito(productosCarrito); /* Cargamos los datos del producto en el carrito */
}

function agregarCarrito(item) {
    let productCard = item.closest(".producto-card");
    productosCarrito.push(productCard); /* Agregamos los productos al array carrito */
    console.log(productosCarrito);
}

function quitarCarrito(index) {
    /* let index = productosCarrito.indexOf(item); */
    console.log("Indice eliminado: " + index);
    productosCarrito.splice(index, 1);
    cargarArrayCarrito(productosCarrito);
}

function cargarArrayCarrito (productosCarrito) {
    let seleccionContainer = document.getElementById("seleccionContainer"); 
    seleccionContainer.innerHTML = ""; /* Limpiamos el contenedor */
    /* console.log(productosCarrito[0].querySelector(".precio").textContent); */
    for (let i=0; i < productosCarrito.length; i++) {
        let productoSeleccion = document.createElement("div");
        productoSeleccion.className = "producto-seleccion";

        let nombreProducto = document.createElement("p"); 
        nombreProducto.id = "nombreProducto";
        nombreProducto.textContent = productosCarrito[i].querySelector(".producto-marca").textContent;
        let imagenSeleccion = document.createElement("div");
        imagenSeleccion.className = "imagen-seleccion";
        let img = document.createElement("img");
        img.id = "imgSeleccionada";
        img.className = "producto-miniatura";
        img.src =  productosCarrito[i].querySelector(".producto-miniatura").src;
        imagenSeleccion.appendChild(img);
        let selectUnidades = document.createElement("select");
        selectUnidades.className = "select-unidades";
        for (let j=0; j < 5; j++) {
            let option = document.createElement("option");
            option.textContent = j+1;
            selectUnidades.appendChild(option);
        }
        let productoEliminar = document.createElement("div");
        productoEliminar.className = "producto-eliminar";
        let imgEliminar = document.createElement("img");
        imgEliminar.src = "../img/Productos/eliminar.png";
        imgEliminar.addEventListener("click", () => { /* Al clickear se quita del carrito */
            quitarCarrito(i);
        });
        productoEliminar.appendChild(imgEliminar);
        let precioUnitario = document.createElement("p");
        precioUnitario.className = "precio-unitario";
        precioUnitario.textContent = productosCarrito[i].querySelector(".precio").textContent;

        productoSeleccion.appendChild(nombreProducto);
        productoSeleccion.appendChild(imagenSeleccion);
        productoSeleccion.appendChild(selectUnidades);
        productoSeleccion.appendChild(productoEliminar);
        productoSeleccion.appendChild(precioUnitario);

        seleccionContainer.appendChild(productoSeleccion);

    }

    /* AQUI ACTUALIZAR SUBTOTAL Y PRECIO DE ENVIO */
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