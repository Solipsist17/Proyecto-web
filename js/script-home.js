let imgs_inicio = new Array ( "../img/Inicio/imagen_menu11.jpg", 
"../img/Inicio/imagen_menu2.jpg", 
"../img/Inicio/imagen_menu10.jpg"
);
let reemplazo =["../img/Inicio/imagen_menu12.jpg",
"../img/Inicio/imagen_menu13.jpg", 
"../img/Inicio/imagen_menu14.jpg", 
"../img/Inicio/imagen_menu15.jpg"];

let reemplazo2 =["../img/Inicio/imagen_menu4.jpg",
"../img/Inicio/imagen_menu17.jpg", 
"../img/Inicio/imagen_menu18.jpg", 
"../img/Inicio/imagen_menu19.jpg"];
   
let i=0;
let indice = 0;
let tiempo = 4000;
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
function cambiarImagen() {
    let img1 = document.getElementById("imagen_mision");
    let img2 = document.getElementById("imagen_vision");
    img1.style.animationPlayState = "paused";
    img2.style.animationPlayState = "paused";
    
    setTimeout(function() {
      img1.src = reemplazo[indice];
      img2.src = reemplazo2[indice];
      img1.style.animationPlayState = "running";
      img2.style.animationPlayState = "running";
      
      indice++;
      if (indice === reemplazo.length) {
        indice = 0;
      }
    }, ); 
  }
function fadeInOut() {
    let img1 = document.getElementById("imagen_mision");
    let img2 = document.getElementById("imagen_vision");
    if (img1.style.opacity === "0" && img2.style.opacity === "0") {
      img1.style.opacity = "1";
      img2.style.opacity = "1";
    } else {
      img1.style.opacity = "0";
      img2.style.opacity = "0";
    }

  }
  
  // Ejecutar la función cada cierto tiempo
  setInterval(cambiarImagen, tiempo);
  // Llamar a la función fadeInOut cada 2 segundos
  setInterval(fadeInOut, 2000);
