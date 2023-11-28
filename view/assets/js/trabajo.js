const buscar = []
const categorias = []
var carritoCompras = []



// function carrito() {
//     let nuevaImagen = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/658_f2.png"
//     let nuevaImagenDos = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/445.png"
//     let nuevaImagenTres = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/006_f2.png"
//     let fondouno = "https://images3.alphacoders.com/119/119629.jpg"
//     // alert("hola")
//  let buscador =   document.getElementById("btnbuscar").value
//  switch(buscador){
//     case "pokemonUno":
//         let pokemon = document.getElementById("pokemonUno")
//         pokemonUno.src = nuevaImagen

//     break;

//     case"pokemonDos":
//     let pokemonDos = document.getElementById("pokemonDos")
//     pokemonDos.src = nuevaImagenDos
//     break;

//     case"pokemonTres":
//     let pokemonTres = document.getElementById("pokemonTres")
//     pokemonTres.src = nuevaImagenTres
//     break;

//         case"fondoNuevo":
// let fondoNuevo = document.getElementById("fondoNuevo")
// fondoNuevo.style.backgroundImage =  `url(${fondouno})`;
// fondoNuevo.style.width= "80%"
// fondoNuevo.style.height= "400px"
// fondoNuevo.style.backgroundSize= "cover"
// fondoNuevo.style.backgroundPosition= "center"
// fondoNuevo.style.backgroundRepeat = " no-repeat"
//         break;

//         default:
//         buscar.push(buscador)
//     console.log(buscar)
//      }




//  }

function getTypePokemon() {
    return new Promise((resolve) => {
        fetch("https://pokeapi.co/api/v2/type")
            .then(Response => Response.json())
            .then(data => {
                console.log(data.results)
                data.results.forEach(element => {
                    categorias.push(element)
                });
                resolve("categorias ok")
            })
    })
}


//  function getallpokemon(){
//     fetch()
//     .then(response => response.json())
//     .then(data =>{

//     })
//  }
function slideCategoriapokemon() {
    getTypePokemon().then(Response => {
        let categoria = ""

        categorias.forEach((element, index) => {
            if (index === 0) {
                categoria += ` <div class="carousel-item active "> 
                             <div class="col-md-2">
                                <div class="card">
                                    
                                    <div class="card-img">
                                        <a onclick= "localurlpoke('${element.url}')"  href= "typepokemon.php">
                                        <img src="https://cdn-icons-png.flaticon.com/512/528/528101.png?w=740&t=st=1677371805~exp=1677372405~hmac=98d13fbdd8141906b35b3f138ac02f89ef1188af32353064e7aa16e7120af1f4" class="img-fluid">
                                    </a>
                                        </div>
                                   
                                    <div class="card-im g-overlays">${element.name}</div>
                                </div>
                            </div>
                        </div> `
            } else {
                categoria += `  <div class="carousel-item "> 
                             <div class="col-md-2">
                                <div class="card">
                                    <div class="card-img">
                                        <a  onclick= "localurlpoke('${element.url}')" href= "typepokemon.php">
                                        <img src="https://cdn-icons-png.flaticon.com/512/528/528101.png?w=740&t=st=1677371805~exp=1677372405~hmac=98d13fbdd8141906b35b3f138ac02f89ef1188af32353064e7aa16e7120af1f4" class="img-fluid">
                                    </a>
                                        </div>

                                    <div class="card-img-overlays">${element.name}</div>
                                </div>
                            </div>
                        </div> `

            }


        });
        document.getElementById("carosel-cat").innerHTML = categoria;
        flipcarrusel()
    })

}
function recargar() {

    document.getElementById("refrescar")
    location.reload();
}
function localurlpoke(urlType) {
    localStorage.setItem("url", urlType)

}
slideCategoriapokemon()
// averiguar sobre la funcion flecha


//     const frutas = ["manzana", "pera", "bananno", "fresa"]
//     const verduras = ["espinaca", "papa", "yuca", "tomate"]
//     const mercados = frutas.concat[verduras]


//     const persona = {
//         nombre: "juan",
//  ciudad:"neiva",
//  edad: "32",
//  cargo: "medico"
//     }
// console.log("nombre:"+  presona.nombre + ""+"ciudad"+ persona.ciudad+ ""+ "edad:" + persona.edad + "cargo:"+ persona.cargo)
// console.log(`nombre: ${persona.nombre} edad: ${persona.edad}`  )
// //     const numeros = [ 23, 74 , 76, 82 , 34, 54]
// // let result = Array.isArray(numero)
// //  console.log(result) /* verificar si funciona el array*/
// //    push agrega
// //    pop elimina

// //     console.log(mercados.fill("manzana", 6))
// // mercado.array.forEach(element => {
// //     console.log(index +""+ element)


// // });



// //     const numero = [ 23,70 , 76, 87 , 32, 54]
// //     const resultado = numero.find(filtro)
// // function filtro(num){
// // return num>= 60
// // }

// //    mercado.forEach((frutas,index  => {
// //     console.log (index + 1 + " " + frutas)
// //    }));
//https://assets.pokemon.com/assets/cms2/img/pokedex/full/129.png
var arreglopokemon = []

function loadpokemon() {
    fetch("https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0")
        .then(response => response.json())
        .then(data => {
            console.log(data.results)
            arreglopokemon = Object.values(data.results)
        })
}   
function autocomplePokemon() {
    let textobuscar = document.getElementById("btnbuscar").value
    if (textobuscar.length >= 3) {
        const filtropokemon = arreglopokemon.filter(filtrarpokemon);
        console.log(filtropokemon)

        let lista = `<div class="list-group position-absolute ">`
        filtropokemon.forEach(element => {
            iconoPokemon(element.url)
            lista += `<a onclick="detapoke('${element.url}')" href="pokemones.php" class="list-group-item list-group-item-action active ">${element.name}  <img class="w-25" id="icono${element.name}" ></a>`

        })
        lista += `</div>`
        document.getElementById("listpoke").innerHTML = lista
        document.getElementById("listpoke").style = "  overflow:scroll; height:400px; width:22%;  position: absolute;   background-color: rgb(13, 110, 253); z-index: 4;"
    } else {
        document.getElementById("listpoke").innerHTML = ""
        document.getElementById("listpoke").style = "overflow: hidden;"
    }

    // const filtropokemon = arreglopokemon.filter(filtrarpokemon);
}

function detapoke(urlDetalle) {
    localStorage.urlDetalles = urlDetalle
}

function filtrarpokemon(element) {
    let textobuscar = document.getElementById("btnbuscar").value
    let nombre = element.name
    return nombre.includes(textobuscar.toLowerCase())

}

function iconoPokemon(urlpokemon) {
    fetch(urlpokemon)
        .then(response => response.json())
        .then(data => {
            let icono = data.sprites.other["official-artwork"].front_default
            document.getElementById(`icono${data.name}`).src = icono

        })

}

//  function categoriadesple(){
//     fetch(getTypePokemon())
//     .then(response => response.json())
//     .then(data =>{
//         data.results.forEach(element => {
//         catepoke.push(element)  
//         console.log(data.results)  
//         });

//     })

function mostrarcate() {
    getTypePokemon().then((response) => {
        let catepokes = ""
        categorias.forEach((element) => {

            catepokes += `<div ><a onclick= "localurlpoke('${element.url}')"    class="list-group-item list-group-item-action active " style="z-index: 4;"  href="typepokemon.php">${element.name}</a></div>`

        })
        document.getElementById("cate").innerHTML = catepokes
        document.getElementById("cate").style = "z-index:2; position:absolute; "
    })
}


function allowDrop(ev) {
    ev.preventDefault()

}

function drag(ev) {
    let name
    switch (ev.target.nodeName) {
        case "DIV":
            name = ev.target.id.slice(4)
            break;
        case "IMG":
            name = ev.target.id.slice(3)
            break;

}
    ev.dataTransfer.setData("name", name)

}

function drop(ev) {
    ev.preventDefault()
    backInfoPekemon(ev.dataTransfer.getData("name"))

}

function backInfoPekemon(name) {
    fetch("https://pokeapi.co/api/v2/pokemon/"+ name)

        .then(response => response.json())
        .then(data => {
            console.log(data)
            let cantidad = document.getElementById("cantidadcha").value
            console.log(cantidad)  
            if (cantidad > 0) {
                let pokemon = new Pokemon(data.name, cantidad, data.base_experience * 100,  data.sprites.other["official-artwork"].front_default)
                carritoCompras.push(pokemon)
                        localStorage.datopoke = JSON.stringify(carritoCompras)
                carritoPOkemon()
                const offcanvas = document.getElementById('offcanvasRight')
                const offcanvasIntance = new bootstrap.Offcanvas(offcanvas)
                offcanvasIntance.show()
            } else {
                alert("error: cantidad insuficiente")
            }
        })

}

function carritoPOkemon() {
    let item = ''
let total = 0
    carritoCompras.forEach((element ,index) => {
        total += element._precio * element._cantidad
        item += `   <div class="offcanvas-body" id="listacarritoPoke">
                        <div class="row my-3">
                            <div class="col-4 text-center">
                                <img src="${element._imagen}" alt="">
                            </div>
                            <div class="col-8">
                                <div class="row fw-bold">${element._nombre}</div>
                                <div class="row fw-bold">${element._precio}</div>
                                 <div class="row fw-bold">${element._cantidad} x ${element._precio  } = ${element._precio * element._cantidad}</div>
                              
                                </div>
                               <div>
                                <input type="number" onclick= "actulizarcanti(this,${index})" onkeyup="actulizarcanti(this, ${index})">
                                <button onclick="eliminarpo('${index}')" type="button" class="btn btn-danger">BORRAR</button>
                           </div>
                                </div>
                    </div>`
    })
    document.getElementById("listacarritoPoke").innerHTML = item
    document.getElementById("carri").innerHTML = `${carritoCompras.length}+`
    document.getElementById("totalcantidad").innerHTML = "Total:"+ "  " +total
}

function llevarpokemon(){
    let dato = JSON.parse(localStorage.datopoke)
    dato.forEach(element => {
        carritoCompras.push(element)
    })
    carritoPOkemon()
}

function eliminarpo(index) {
    carritoCompras.splice(1, index)
    localStorage.datopoke = JSON.stringify(carritoCompras)
 carritoPOkemon()
}

function actulizarcanti(element, index) {
carritoCompras[index]._cantidad = element.value
localStorage.datopoke = (JSON.stringify(carritoCompras))
carritoPOkemon()
//     console.log(element.value )
//  console.log(index)
}
function obtenerRol(){
    fetch(`../controller/rol.usuario.php?rol=${cuentaUser.value}`)
    .then(response => response.json())
    .then(data =>{
      console.log(data)
      document.getElementById("rolUsuario").innerHTML = `bienvenido sr ${data[0].nombreRol}`
    })
  }
  function obtenerNombre(){
    fetch(`../controller/Nombre.usuario.php?nombre=${clienteId.value}`)
    .then(response => response.json())
    .then(data =>{
      console.log(data)
      document.getElementById("nombreUser").innerHTML = `${data[0].nombre} ${data[0].apellido}`
    //   document.getElementById("rolUsuario").innerHTML = data[0].nombreRol
    })
  }
  obtenerNombre()
  obtenerRol()
function flipcarrusel() {
    let myCarousel = document.querySelectorAll('#featureContainer .carousel .carousel-item');
    myCarousel.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i = 1; i < minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = myCarousel[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling

        }
    })
}