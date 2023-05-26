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