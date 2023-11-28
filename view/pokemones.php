<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="../view/assets/js/login.funcion.js"></script>
  <script src="../view/assets/js/archivo.js"></script>

</head>

<body onload="traerInfo()" style="background-image:url(../view/assets/img/pokemon-in-the-wild.png) ; background-size: cover; ">
<nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand">  <button ondrop="drop(event)" ondragover="allowDrop(event)" type="button"
                    class="btn btn-primary position-relative w-50" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-sharp fa-regular fa-cart-plus "></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        id="carri">
                        0+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button></a>
    <form class="d-flex" role="search">
    <div>
            <button class="btn btn-warning" onclick="deletelogin()"><img src="../view/assets/img/images-removebg-preview.png" width="60px" height="40px" alt=""></button>
        </div>
    </form>
  </div>
</nav>

   <div class="container-fluid mt-3 " >
    <div class="row align-content-center text-uppercase  ">
    <div class="row d-flex justify-content-center align-content-center"  id="asa"></div>
    
</div>
</div>
<div class=" d-flex align-content-center ">
   
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="offcanvas-body" id="listacarritoPoke">
                            <div class="row my-3">
                                <div class="col-4 text-center">
                                    <img src="" alt="">
                                </div>
                                <div class="col-8">
                                    <div class="row fw-bold">nombre</div>
                                    <div class="row fw-bold">precio</div>
                                    <div class="row fw-bold">cantidad</div>
                                </div>
                         
                        </div>
                      
                    </div>
                </div>
                <div class="offcanvas-bottom">
                  <h2 id="totalcantidad"></h2>
                </div>
                <div class="offcanvas-bottom">
                 <a onclick="onloadProduct()" href="../view/pedido.php"><h2>comprar</h2></a>
                </div>
            </div>
          
  
    <h1 class="text-center text-uppercase mt-5 mb-5 " style="  text-shadow: 8px 10px 10px ;" id="titulo">sa</h1>
    <div class="row justify-content-center " id="listpoke">
   
    </div>
    
    </div>
</body>

</html>
<script>
  const carritoCompras = []
  // let descripcionPoke = []
  
    function traerInfo() {
       
        return new Promise(Response => {
            let urlDetalles = localStorage.urlDetalles
            fetch(urlDetalles)
                .then((response) => response.json())
                .then((data) => {
                    
              //     let  localizacion = data.location_area_encounters
              //   fetch(localizacion) 
              //     .then( Response.json())
              //   })  
              //   .then(descripcionPoke =>{
              //  localidadpoke = descripcionPoke
               
             
                    document.getElementById("asa").innerHTML = `<div class="card " style="width: 21rem; background-color:#FE0000 ;  ">
  <img src=" ${data.sprites.other["official-artwork"].front_default}" style="background-image: url(../view/assets/img/desktop-wallpaper-pokeball-background-live-pokeball-pokebola.jpg); background-size: cover; background-position: center; " class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title text-white text-center fs-2">${data.name}</h5>
    <p class="card-text fw-semibold text-white text-center">numero: ${data.order}</p>
  </div>
  <ul class="list-group list-group-flush rounded  ">
    <li class="list-group-item fw-semibold fs-5 bg-info ">Peso: ${(data.weight * 0.1).toFixed(1)+"kg"} </li>
    <li class="list-group-item fw-semibold fs-5 bg-info">Altura: ${(data.height * 0.1).toFixed(1)+ "cm"}</li>
    <li id= "hp${data.name}" class="list-group-item fw-semibold fs-5 bg-info"></li>
    <li id="ataque${data.name}" class="list-group-item fw-semibold fs-5 bg-info ">A third item</li>
    <li id="defensa${data.name}" class="list-group-item fw-semibold fs-5 bg-info">A third item</li>
    <li id="velocidad${data.name}" class="list-group-item fw-semibold fs-5 bg-info">A third item</li>
    <li id="defensaSpec${data.name}" class="list-group-item fw-semibold fs-5 bg-info">A third item</li>
    <li id="ataqueSpec${data.name}" class="list-group-item fw-semibold fs-5 bg-info">A third item</li>
    <input id="cantidadpoke${data.name}" type="number"  min="0" placeholder="cantidad">
    <button onclick="backInfoPekemon('${data.name}')">Comprar</button>
   

</div>`
                    // document.getElementById("nombre").innerHTML = 
                    //  document.getElementById("imagenpoke").src =  data.sprites.other["official-artwork"].front_default
                    let hp = data.stats[0].base_stat
                    let attack = data.stats[1].base_stat
                    let defense = data.stats[2].base_stat
                    let speed = data.stats[5].base_stat
                    let ataqSpecial = data.stats[3].base_stat
                    let defeSpecial = data.stats[4].base_stat
                  
                   
        
           

document.getElementById(`hp${data.name}`).innerHTML = `hp: ${hp}` 
document.getElementById(`ataque${data.name}`).innerHTML = `ataque: ${attack}` 
document.getElementById(`defensa${data.name}`).innerHTML = `defensa: ${defense}`   
document.getElementById(`velocidad${data.name}`).innerHTML = `velocidad: ${speed}`  
document.getElementById(`defensaSpec${data.name}`).innerHTML = `Defensa Especial: ${speed}`  
document.getElementById(`ataqueSpec${data.name}`).innerHTML = `ataque especial: ${ataqSpecial}` 
  
                })
               
        })
      
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
    let dato = ` id=${element._id}&nombre=${element._nombre}&cantidad=${element._cantidad}&precio=${element._precio}&precioTotal=${element._precio * element._cantidad}`
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
  
</script>