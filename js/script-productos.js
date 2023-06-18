
/* Banner de anuncios */
/* let productosBanner = ["../img/Productos/banner1.png", "../img/Productos/banner2.png", "../img/Productos/banner3.png"];
 
let container = document.querySelector(".producto-container");

for (let i=0; i<productosBanner.length; i++){
    let cardDiv = document.createElement("div");
    cardDiv.className = "producto-card";
    cardDiv.style.width = "100%";
    cardDiv.style.height = "100%";
    let imgDiv = document.createElement("div");
    imgDiv.className = "producto-img";
    imgDiv.style.height = "100%";
    let img = document.createElement("img");
    img.style.width = "100%";
    img.style.height = "100%";
    img.src = productosBanner[i];
    imgDiv.append(img);
    cardDiv.appendChild(imgDiv);
    container.appendChild(cardDiv);
}  
 */
/* Slider en banner de anuncios  */
const productoContainers = [...document.querySelectorAll(".producto-container")];

const nxtBtn = [...document.querySelectorAll(".nxt-btn")];
const preBtn = [...document.querySelectorAll(".pre-btn")];
       
productoContainers.forEach((item, i) => {
    console.log(item);

    nxtBtn[i].addEventListener("click", () => {
        let banner = document.getElementById("producto-banner");
        let containerWidth = banner.getBoundingClientRect().width;
        console.log("Ancho del contenedor " + containerWidth);
      
        item.scrollLeft += containerWidth;
        if (item.scrollLeft >= item.scrollWidth - containerWidth) {
            item.scrollLeft = 0; // Vuelve al inicio cuando alcanza el final
        }
    });
    
    preBtn[i].addEventListener("click", () => {
        let banner = document.getElementById("producto-banner");
        let containerWidth = banner.getBoundingClientRect().width;
        console.log("Ancho del contenedor " + containerWidth);

        item.scrollLeft -= containerWidth;
        if (item.scrollLeft <= 0) {
            item.scrollLeft = item.scrollWidth - containerWidth + 100; // + 100 para arreglar el ligero desfase de la última imagen
        }
    });
});

// se ejecuta el slider
function ejecutarNextBtn() {
    let item = document.querySelector(".producto-container");
    let banner = document.getElementById("producto-banner");
        let containerWidth = banner.getBoundingClientRect().width;
        console.log("Ancho del contenedor " + containerWidth);
      
        item.scrollLeft += containerWidth;
        if (item.scrollLeft >= item.scrollWidth - containerWidth) {
            item.scrollLeft = 0; // Vuelve al inicio cuando alcanza el final
        }
}
setInterval(ejecutarNextBtn, 15000); // Ejecutamos cada 15 segundos


/* Mostrador de productos */
/* let productosEquipamiento = [
    {nombre: "Mancuernas", descripcion: "Par de mancuernas de 20kg cada una", precio: 90, img: "../img/Productos/mancuerna-20kg1.jpg"},
    {nombre: "Banco ejercicios", descripcion: "Banco para realizar ejercicios", precio: 250, img: "../img/Productos/banco-ejercicios.jpg"},
    {nombre: "Bandas elásticas", descripcion: "Set de 5 bandas", precio: 20, img: "../img/Productos/bandas-elasticas.jpg"},
    {nombre: "Chaleco peso", descripcion: "Chaleco con pesos para 20kg máximo", precio: 100, img: "../img/Productos/chaleco_de_peso.jpg"},
    {nombre: "bicicleta", descripcion: "Bicicleta para ejercicios", precio: 160, img: "../img/Productos/bicicleta-ejercicios.jpg"},
    {nombre: "Caminadora", descripcion: "Múltiples funcionalidades", precio: 300, img: "../img/Productos/caminadora.jpg"}
]

let productosSuplementos = [
    {nombre: "Creatina", descripcion: "Creatina en polvo", precio: 60.00, img: "../img/Productos/creatina.jpg"},
    {nombre: "Proteína", descripcion: "Proteína en polvo", precio: 65.90, img: "../img/Productos/proteina.jpg"},
    {nombre: "Glutamina", descripcion: "Glutamina en polvo", precio: 104.90, img: "../img/Productos/glutamina.jpg"},
    {nombre: "Omega 3", descripcion: "Capsulas", precio: 67.80, img: "../img/Productos/omega3.jpg"},
    {nombre: "Vitamina C", descripcion: "Tabletas", precio: 54.90, img: "../img/Productos/vitaminaC.jpg"},
    {nombre: "Oxido Nitrico", descripcion: "Solución", precio: 84.90, img: "../img/Productos/oxido_nitrico.jpg"}
]

let productosAccesorios = [
    {nombre: "Rodilleras", descripcion: "Par de rodilleras adidas", precio: 75.90, img: "../img/Productos/rodilleras.jpg"},
    {nombre: "Muñequeras", descripcion: "Par de muñequeras nike", precio: 30.90, img: "../img/Productos/muñequeras.jpg"},
    {nombre: "Guantes", descripcion: "Par de guantes adidas", precio: 59.90, img: "../img/Productos/guantes.jpg"},
    {nombre: "Banda cabeza", descripcion: "Banda de cabeza adidas", precio: 60.50, img: "../img/Productos/banda-cabeza.png"},
    {nombre: "Tobillera", descripcion: "Par de tobilleras deportivas", precio: 20.00, img: "../img/Productos/tobillera.jpg"},
    {nombre: "Codera", descripcion: "Par de coderas nike", precio: 35.90, img: "../img/Productos/codera.jpg"},
    {nombre: "Correas Levantamiento", descripcion: "Par de correas", precio: 39.90, img: "../img/Productos/correas_levantamiento.jpg"},
    {nombre: "Ejercitador dedos", descripcion: "Ejercitador para los dedos", precio: 29.00, img: "../img/Productos/ejercitador_dedos.jpg"},
    {nombre: "Mat", descripcion: "Mat para yoga", precio: 30.50, img: "../img/Productos/mat.jpg"}
]

let productos = [...productosEquipamiento, ...productosSuplementos, ...productosAccesorios]; */

/*let mostrador = document.getElementById("producto");

// Limpiamos el contenido del mostrador
let categorias = [...document.querySelectorAll(".categorias a")];
 for (let i = 0; i < categorias.length; i++) { // Asignamos los eventos a los link de categorías
    categorias[i].addEventListener("click", () => {
        console.log("Se limpió el mostrador");
        let productoMostrador = document.getElementById("productoMostrador");
        productoMostrador.innerHTML = ""; // Limpiamos el mostrador
        //seleccionarCategoria(categorias[i].id);
    })
} 
//////

function seleccionarCategoria(categoria) {
    switch (categoria) {
        case "equipamiento": 
            cargarMostrador(productosEquipamiento, categoria);
            break;
        case "suplementos": 
            cargarMostrador(productosSuplementos, categoria);
            break;
        case "accesorios": 
            cargarMostrador(productosAccesorios, categoria);
            break;
        default:   
            alert("Categoría inválida");
    }
}

// Cargar el mostrador de acuerdo a la categoría seleccionada 
 function cambiarNumFilasMostrador(productoMostrador, cantidadProductos) {
    let numFilas = (cantidadProductos/3);
    let filas = Math.ceil(numFilas); // Redondeo al superior
    productoMostrador.style.gridTemplateRows = `repeat(${filas}, 1fr)`;
    console.log(`Número de filas del mostrador: ` + filas);
} 

//cargarMostrador(productos, "Todos"); // Cargamos todos los productos

function cargarMostrador(productos, categoria) { 
    let productoMostrador = document.getElementById("productoMostrador");
    productoMostrador.innerHTML = ""; // Limpiamos el mostrador

    let categoriaTitulo = document.querySelector(".producto-categoria"); 
    categoriaTitulo.id = categoria;
    categoriaTitulo.textContent = categoria;
    
    //productoMostrador.style.gridTemplateRows = "repeat(5, 1fr)";
    cambiarNumFilasMostrador(productoMostrador, productos.length); 
        
    for (let i = 0; i < productos.length; i++) {
        let productoCard = document.createElement("div");
        productoCard.className = "producto-card";


        let productoImg = document.createElement("div");
        productoImg.className = "producto-img";

        let img = document.createElement("img");
        img.className = "producto-miniatura";
        img.src = productos[i].img;
        let btnAgregar = document.createElement("button");
        btnAgregar.className = "card-btn";
        btnAgregar.addEventListener("click", function() {
            cargar(this);
        });
        btnAgregar.textContent = "Agregar al carrito";
        
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

        productoImg.appendChild(img);
        productoImg.appendChild(btnAgregar);
        productoInfo.appendChild(productoNombre);
        productoInfo.appendChild(productoDescripcion);
        productoInfo.appendChild(precio);

        productoCard.appendChild(productoImg);
        productoCard.appendChild(productoInfo);
        
        productoMostrador.appendChild(productoCard);
    }
} */

        
/* Carrito de compras */

let productosCarrito = []; /* Productos agregados al carrito */
//let subtotal = 0;

function cargar(item) { /* Mostramos el carrito de compras cuando se clickea en agregar carrito*/

    let body = document.body;
    let mostrador = document.getElementById("producto");
    let banner = document.getElementById("producto-banner");

    let seleccion = document.getElementById("seleccion");
    let imgSeleccionada = document.getElementById("imgSeleccionada"); 

    seleccion.style.width = "40%";
    seleccion.style.opacity = "1";

    body.style.overflow = "hidden"; /* Bloqueamos el scroll */
    /* Opacamos el fondo */
    mostrador.style.opacity = "0.4";
    banner.style.opacity = "0.4";

    /* Obtenemos las dimensiones y posicionamos */
    //let rect = item.getBoundingClientRect(); 
    let posicionVertical = window.pageYOffset || document.documentElement.scrollTop;
    console.log(posicionVertical);
    seleccion.style.top = posicionVertical + "px";

    // HACEMOS LA SOLICITUD 
    /* let datos = {
        id: item.id,
        accion: "agregar"
    };

    fetch('../php/php-productos-carrito.php', {
        method: 'POST',
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        
        //let subtotal = data.subTotal;

        productosCarrito = data.productosCarrito; // Agregamos al array para construirlo con esos datos
        console.log(data.productosCarrito);

        cargarArrayCarrito(data.productosCarrito, data.subtotal); // Cargamos los datos del producto en el carrito 
    }); */

    agregarCarrito(item);    
}

function agregarCarrito(item) {
    let datos = {
        id: item.id,
        accion: "agregar"
    };

    fetch('../php/php-productos-carrito.php', {
        method: 'POST',
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        
        //let subtotal = data.subTotal;

        productosCarrito = data.productosCarrito; // Agregamos al array para construirlo con esos datos
        console.log(data.productosCarrito);

        cargarArrayCarrito(data.productosCarrito, data.subtotal); /* Cargamos los datos del producto en el carrito */
    });
}

function quitarCarrito(item) {
    let datos = {
        id: item.id,
        accion: "quitar"
    };

    fetch('../php/php-productos-carrito.php', {
        method: 'POST',
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        //let subtotal = data.subTotal;
        console.log(data.subtotal);

        productosCarrito = data.productosCarrito; // Agregamos al array para construirlo con esos datos
        console.log("Tamaño del array carrito" + productosCarrito.length);
        console.log(data.productosCarrito);

        cargarArrayCarrito(data.productosCarrito, data.subtotal); /* Cargamos los datos del producto en el carrito */
    });
}

function cargarArrayCarrito (productosCarrito, subtotal) { // Creamos los elementos del array carrito 
    let seleccionContainer = document.getElementById("seleccionContainer"); 
    seleccionContainer.innerHTML = ""; // Limpiamos el contenedor 
    for (let i=0; i < productosCarrito.length; i++) {
        console.log("iteracion: "+i);

        let productoSeleccion = document.createElement("div");
        productoSeleccion.className = "producto-seleccion";

        let nombreProducto = document.createElement("p"); 
        nombreProducto.id = "nombreProducto";
        nombreProducto.textContent = productosCarrito[i].nombre;
        let imagenSeleccion = document.createElement("div");
        imagenSeleccion.className = "imagen-seleccion";
        let img = document.createElement("img");
        img.id = "imgSeleccionada";
        img.className = "producto-miniatura";
        img.src =  productosCarrito[i].imagen;
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
        imgEliminar.addEventListener("click", () => { // Al clickear se quita del carrito 
            quitarCarrito(productosCarrito[i]); // le pasamos el producto
        });
        productoEliminar.appendChild(imgEliminar);
        let precioUnitario = document.createElement("p");
        precioUnitario.className = "precio-unitario";
        precioUnitario.textContent = "S/" + productosCarrito[i].precio;

        productoSeleccion.appendChild(nombreProducto);
        productoSeleccion.appendChild(imagenSeleccion);
        productoSeleccion.appendChild(selectUnidades);
        productoSeleccion.appendChild(productoEliminar);
        productoSeleccion.appendChild(precioUnitario);

        seleccionContainer.appendChild(productoSeleccion);
    }

    // AQUI ACTUALIZAR SUBTOTAL Y PRECIO DE ENVIO 

    //let subTotal = 0;
    console.log(subtotal);
    let spanSubTotal = document.querySelector(".subtotal");
    spanSubTotal.textContent = "";
    spanSubTotal.textContent += "SubTotal: " + "S/" + subtotal.toFixed(2);
}


/* function cargarArrayCarrito (productosCarrito) { // Creamos los elementos del array carrito 
    let seleccionContainer = document.getElementById("seleccionContainer"); 
    seleccionContainer.innerHTML = ""; // Limpiamos el contenedor 
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
        imgEliminar.addEventListener("click", () => { // Al clickear se quita del carrito 
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

    // AQUI ACTUALIZAR SUBTOTAL Y PRECIO DE ENVIO 
    //let subTotal = document.querySelector(".subtotal");
    calcularSubTotal(productosCarrito);
} */

function calcularSubTotal(productosCarrito) {
    let subTotal = 0;
    let spanSubTotal = document.querySelector(".subtotal");
    productosCarrito.forEach((item) => {
        txtPrecio = item.querySelector(".precio").textContent.substring(2);
        precio = parseFloat(txtPrecio);
        subTotal += precio;
        // console.log(precio); 
    });
    console.log(subTotal.toFixed(2));
    spanSubTotal.textContent = "";
    spanSubTotal.textContent += "SubTotal: " + "S/" + subTotal.toFixed(2);
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
