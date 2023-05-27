const productoContainers = [...document.querySelectorAll(".producto-container")];

/* let productoContainers = [];
for(let i = 0; i<document.querySelectorAll(".producto-container").length; i++ ){
    let elemento = document.querySelectorAll(".producto-container")[i];
    productoContainers.push(elemento);
} */

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
/*Rodrigo agrego esto*/
let mostrador = document.getElementById("mostrador");
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
}
/*Hasta aca*/