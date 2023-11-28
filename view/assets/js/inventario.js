const productos = [];
var id
const descontarpoke = []
const idDescontar = []
function agregarPoke() {
  fetch("https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0")
    .then(response => response.json())
    .then(data => {
 
      data.results.forEach(result => {
        let urlParts = result.url.split('/');
        let id = urlParts[urlParts.length - 2];
        productos.push({
          id: id
        });
      });
      detallepokemon();
    });
}

function detallepokemon() {
  productos.forEach(producto => {
    let elementos = producto.id;
    const url = `https://pokeapi.co/api/v2/pokemon/${elementos}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
    
        let id = data.id;
        let nombre = data.name;
        let precio = data.base_experience * 100;
        let cantidad = data.stats[0].base_stat * 100;
        let descripcion = "";

        fetch(`https://pokeapi.co/api/v2/pokemon-species/${elementos}`)
          .then(response => response.json())
          .then(data => {
            descripcion = data.flavor_text_entries[0].flavor_text;
          })
          .then(() => {
            readproduct(id, nombre, cantidad, precio, descripcion);
          });
      });
  });
}

function readproduct(id, nombre, cantidad, precio, descripcion) {
  let data = new URLSearchParams();
  data.append("id", id);
  data.append("nombre", nombre);
  data.append("cantidad", cantidad);
  data.append("precio", precio);
  data.append("descripcion", descripcion);

  const options = {
    method: "POST",
    body: data,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
  };

  fetch("../controller/agregar.producto.php", options)
    .then(response => response.json())
    .then(data => {
      console.log(data);
    });
}
function visualizarpoke(){
  let tabla = ''
  fetch("../controller/read.inventario.php")
  .then(response => response.json())
  .then(data =>{
    console.log(data)

    data.forEach((element,index)=>{
      let cantidad = element.cantidadPro
      tabla += `<tr>`
      tabla +=  `<td>${index + 1}</td>`
      tabla +=  `<td>${element.nombrePro}</td>`
      tabla +=  `<td>${element.precioPro}</td>`
      tabla +=  `<td>${cantidad}</td>`
      tabla +=  `<td>${element.descripPro}</td>`
      tabla +=  `<td>${element.estado}</td>`
      tabla += `<td><button class="btn btn-warning" onclick='uptadeRead(${element.id})' data-bs-toggle="modal" data-bs-target="#UpdateModal">modificar</button></td>`
      tabla +=`</tr>`
      readPokemon(element.id,cantidad)
      
    })
document.getElementById("tableBodyPoke").innerHTML = tabla

  })
}
function uptadeRead(id){

fetch(`../controller/update.read.php?id=${id}`)
.then(response => response.json())
.then(data =>{


  modprecio.value = data[0].precioPro
  modcantidad.value = data[0].cantidadPro
 this.id = data[0].id
})
}
function updatedPoke(){
  let datos = `id=${id}&precio=${modprecio.value}&cantidad=${modcantidad.value}`
  const options = {
    method: "POST",
    body: datos,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    }
  }
  fetch("../controller/product.update.php", options)
  .then(response => response.json())
  .then(data =>{
    console.log(data)
    visualizarpoke()
  })
} 
function readPokemon(id,cantidad){

  fetch(`../controller/descontar.php?id=${id}`)
  .then(response => response.json())
  .then(data =>{
    console.log(data)
    let cantidadDescontar = parseInt(cantidad - data[0].cantidadPro)
  let ids = data[0].idPro
  updateDescontar(cantidadDescontar,ids)
  estadoCompra(ids)
  })
}

function updateDescontar(cantidadDescontar,ids) {

  // console.log(descontarpoke)
  // let formData = new FormData();
  // formData.append("id", JSON.stringify(idDescontar));
  // formData.append("cantidad", JSON.stringify(descontarpoke));
  let datos = `id=${ids}&cantidad=${cantidadDescontar}`

  const options = {
    method: "POST",
    body: datos,
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    }
  };

  fetch("../controller/update.descontar.php", options)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      visualizarpoke();
  
    
    });
}
function estadoCompra(ids){
  let datos = `id=${ids}`
  const optionss = {
    method: "POST",
    body: datos,
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
    }

}
fetch("../controller/actualizacion.estado.inventario.php" ,optionss)
.then(response => response.json())
.then(data =>{
    console.log(data)
})

}
estadoCompra()
updateDescontar()
visualizarpoke()

