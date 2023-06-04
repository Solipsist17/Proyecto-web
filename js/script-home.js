let imgs_inicio = new Array ( "../img/Inicio/imagen_menu1.jpg", 
"../img/Inicio/imagen_menu2.jpg", 
"../img/Inicio/imagen_menu3.jpg", 
"../img/Inicio/imagen_menu4.jpg", 
"../img/Inicio/imagen_menu5.jpg", 
"../img/Inicio/imagen_menu6.jpg", 
"../img/Inicio/imagen_menu7.jpg", 
"../img/Inicio/imagen_menu8.jpg"
);
let i=0;
let count=0;
//GENERAMOS DINAMICAMENTE LAS IMAGENES
let container = document.querySelector(".galeria");
do{
    let imageDiv = document.createElement("div");
    imageDiv.className = "galeria";
    
    let img = document.createElement("img");
    img.className= "imagen";
    img.src=imgs_inicio[i];

    imageDiv.appendChild(img);
    container.appendChild(imageDiv);

    i++;
}while (i<imgs_inicio.length);

//INTENTO DE HACER CAMBIAR LAS IMAGENES
 /* function rotarImagenes()
 {
    count++
    document.getElementsByClassName("imagen").src=imgs_inicio[count%imgs_inicio.length][0];
    
 }

 onload=function() {
    rotarImagenes();

    setInterval(rotarImagenes,5000);
 } */
