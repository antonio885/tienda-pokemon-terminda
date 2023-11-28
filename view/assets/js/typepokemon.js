const pokemon = []
var categoria = ""
const evolutions = []
const carritoCompras = []

function recuperacionlocal() {
  return new Promise((resolve) => {
    let url = localStorage.url
    fetch(url)
      .then(response => response.json())
      .then(data => {
        document.getElementById("titulo").innerHTML = `pokemon tipo ${data.name}`
        document.getElementById("titulobarra").innerHTML = `categoria tipo ${data.name}`
        data.pokemon.forEach(element => {
          pokemon.push(element)
          detallepokemon(element)
          categoria = data.name
        });

        resolve("categorias pokemon ok")
        console.log(data)
      })
  })

}
function getevolucion(){
      return new Promise((resolve)=> {
          fetch("https://pokeapi.co/api/v2/evolution-chain")
          .then(Response => Response.json())
          .then(data => {
              console.log(data.results)
data.results.forEach(element => {
  evolutions.push(element)
});
resolve("evolucioness ok")

          })
       
      })

  }
  
 
  

function verpokemon() {
  let listapoke = ""

  recuperacionlocal()
    .then(response => {
      pokemon.forEach(element => {

        listapoke += `<div class="card ms-4 mb-3 "  draggable="true" ondragstart="drag(event)" id="cardcharizard"  style="max-width: 500px; background-image: url(../view/assets/img/desktop-wallpaper-pokeball-background-live-pokeball-pokebola.jpg); background-repeat: no-repeat;  background-size: cover;  background-position: center; ">
<div class="row g-0" >
  <div class="col-md-4" >
    <a  onclick= "localUrlDetalles('${element.pokemon.url}')" href= "../view/pokemones.php">
       <img  id= "img${element.pokemon.name}"  src=""   class="img-fluid mt-4 rounded-start" > 
       </a>
  </div>
  <div class="col-md-8">
    <div class="card-body">
      <h5 class="card-title text-uppercase me-5 text-white text-center"  >${element.pokemon.name}</h5>
 
      <p class="card-text   fw-semibold  "  style="margin-left: 187px; margin-top:80px;" id= "number${element.pokemon.name}">dsd</p>
     
      <p id= "altura${element.pokemon.name}" style="margin-left: 188px" class="card-text  fw-semibold"   ><small class="text-muted">Last updated 3 mins ago</small></p>
    
      <p class="card-text fw-semibold" style="margin-left: 189px" id= "peso${element.pokemon.name}" ><small class="text-muted">Last updated 3 mins ago</small></p>
      <p class="card-text mb-1 fw-semibold  "  style="margin-left: 132px" id="tipos${element.pokemon.name}">dsd</p>

      </div>
      
      <input id="cantidadpoke${element.pokemon.name}" type="number"  min="0" placeholder="cantidad">
      <button onclick="backInfoPekemon('${element.pokemon.name}')">Comprar</button>
  </div>
</div>
</div>`
      })
      document.getElementById("listpoke").innerHTML = listapoke
    })
    
}

function localUrlDetalles(urlDetalle) {
localStorage.urlDetalles = urlDetalle
}


function detallepokemon(pokemon) {
  fetch(pokemon.pokemon.url)
    .then(response => response.json())
    .then(data => {
      let imagen = data.sprites.other["official-artwork"].front_default
      let numero = data.order 
      let altura = (data.height * 0.1 ).toFixed(1)
      let peso = (data.weight * 0.1 ).toFixed(1)
     
      let tipos = "Tipos(s)"
      data.types.forEach(element => {
        if (element.type.name == categoria){
tipos += `${element.type.name}`
}else{
tipos += `<a onclick= "localurlpoke('${element.type.url}')" href="typepokemon.html">${element.type.name} </a>`
}
})
      document.getElementById(`tipos${pokemon.pokemon.name}`).innerHTML = tipos
      document.getElementById(`img${pokemon.pokemon.name}`).src = imagen
      document.getElementById(`number${pokemon.pokemon.name}`).innerHTML = `Numero: ${numero}`
      document.getElementById(`peso${pokemon.pokemon.name}`).innerHTML = `Peso: ${peso}kg`
      document.getElementById(`altura${pokemon.pokemon.name}`).innerHTML = `Altura: ${altura}cm` 
     
    })


}

function infopokemon(urlpokemon) {
  fetch(urlpokemon.pokemon.url)
    .then(response => response.json())
    .then(data => {
      document.getElementById(`img${urlpokemon.pokemon.name}`).src = data.sprites.other["official-artwork"].front_default

      
    })
}
function localurlpoke(urlType){
  localStorage.setItem("url",urlType)
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
              let cantidad = document.getElementById(`cantidadpoke${name}`).value
              console.log(cantidad)  
              if (cantidad > 0) {
                  let pokemon = new Pokemon(data.id, data.name, cantidad, data.base_experience * 100,  data.sprites.other["official-artwork"].front_default)
                  carritoCompras.push(pokemon)
                          localStorage.url = JSON.stringify(carritoCompras)
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
      carritoCompras.forEach((element, index) => {
        total += element._precio * element._cantidad
          item += `   <div class="offcanvas-body" id="listacarritoPoke">
                          <div class="row my-3">
                              <div class="col-4">
                                  <img src="${element._imagen}" alt="">
                              </div>
                              <div class="col-8">
                                  <div class="row fw-bold">${element._nombre}</div>
                                  <div class="row fw-bold">${element._precio}</div>
                                  <div class="row fw-bold">${element._cantidad} x ${element._precio} = ${element._precio * element._cantidad}</div>
                          </div>
                          <input type="text" onclick= "actulizarcanti(this, ${index})" onkeyup="actulizarcanti(this, ${index})">
                                  <button onclick="eliminarpo('${index}')" type="button" class="btn btn-danger">BORRAR</button> 
                             
                                </div>
                              </div>    
                      </div>`
      })
      document.getElementById("listacarritoPoke").innerHTML = item
      document.getElementById("carri").innerHTML = `${carritoCompras.length}+`
      document.getElementById("totalcantidad").innerHTML = "Total:"+ "  " +total
  }
  carritoPOkemon()
  
  function llevarpokemon(){
      let dato = JSON.parse(localStorage.datopoke)
      dato.forEach(element =>{
          carritoCompras.push(element)
      })
      carritoPOkemon()
  }
  function eliminarpo(index) {
      carritoCompras.splice(1, index)
      localStorage.url = JSON.stringify(carritoCompras)
   carritoPOkemon()
  }
  function actulizarcanti(element, index) {
  carritoCompras[index]._cantidad = element.value
  localStorage.datopoke = (JSON.stringify(carritoCompras))
 carritoPOkemon()

}
function onloadProduct(){
  carritoCompras.forEach(element =>{
    let dato = ` id=${element._id}&nombre=${element._nombre}&cantidad=${element._cantidad}&precio=${element._precio}&precioTotal=${element._precio * element._cantidad}&idCliente=${clienteId.value}`
    const options = {
      method:"POST",
      body: dato,
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      }
    }
    fetch("../controller/carritocomp.php", options)
    .then(response => response.json())
    .then(data =>{
      console.log(data)
    })
  })


}
function obtenerRol(){
  fetch(`../controller/rol.usuario.php?rol=${cuentaUser.value}`)
  .then(response => response.json())
  .then(data =>{
    console.log(data)
    document.getElementById("rolUsuario").innerHTML = data[0].nombreRol
  })
}
obtenerRol()
// function comprarPoke(){


//     fetch("../controller/agregar.carrito.php",carritoCompras)
//     .then(response => response.json)
//     .then(data =>{
//         console.log(data)
//     })
// }