const codigo = generarCodigoPedido(3);
var idUpdate;

function readpokemon() {
    let tabla = "";
    let total = 0;
    fetch("../controller/formcompra.php")
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                let idPro = element.idPro;

                tabla += `<tr>`;
                tabla += `<td>${element.nombrePro}</td>`;
                tabla += `<td><img width="90px" id="id${idPro}" src="" alt=""></td>`;
                tabla += `<td>${element.cantidadPro}</td>`;
                tabla += `<td>${element.precioUnit}</td>`;
               
                tabla += `<td> <button  onclick='updateRead(${element.id})' data-bs-toggle="modal" data-bs-target="#UpdateModal" type="button" class="btn btn-primary">modificar cantidad</button></td>`;
               
                tabla += `<td> <button type="button" onclick='deleted(${element.id})' class="btn btn-danger">eliminar</button></td>`
                tabla += `</tr>`;
                total += parseInt(element.precioTotal);
            });

            document.getElementById("tableBOdypoke").innerHTML = tabla;
            document.getElementById("txtpedido").innerHTML = total;
            viewpoke(data);
        });
}

function viewpoke(data) {
    data.forEach(element => {
        fetch(`https://pokeapi.co/api/v2/pokemon/${element.idPro}`)
            .then(response => response.json())
            .then(pokemonData => {
                let idPro = element.idPro;
                document.getElementById(`id${idPro}`).src = pokemonData.sprites.other["official-artwork"].front_default;
            });
    });
}

function updateRead(id) {
    fetch(`../controller/read.Update.product.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            pokemonCompra.innerHTML = data[0].nombrePro;
            modcantidad.value = data[0].cantidadPro;
            idUpdate = data[0].id;
            let totals = data[0].precioUnit * data[0].cantidadPro 
            UpdatePrecio(totals);
        });
}

function enviarDatos() {
    let datos = `idRol=${txtidRol.value}&codigo=${codigo}&nombre=${txtnombre.value}&direccion=${txtdireccion.value}&telefono=${txtTelefono.value}&fecha=${txtfecha.value}&total=${txtpedido.innerHTML}&pago=${formpago.value}`
    const option = {
      method: "POST",
      body: datos,
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      }  
    }
    fetch("../controller/transferencia.php", option)
    .then(response => response.json())
    .then(data =>{
        console.log(data)
    })

    updateEstadoCompra()
}
function updateEstadoCompra(){
    let datas = `idRol=${txtidRol.value}`
    const optionss = {
        method: "POST",
        body: datas,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
 
    }
    fetch("../controller/actualizacion.estado.php" ,optionss)
    .then(response => response.json())
    .then(data =>{
        console.log(data)
    })
}

function UpdatePrecio(totals) {
    let datos = `id=${idUpdate}&total=${totals}`;
    const options = {
        method: "POST",
        body: datos,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    };
    fetch("../controller/restablecer.precio.php", options)
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
}

function generarCodigoPedido(longitud) {
    let codigo = '';
    for (let i = 0; i < longitud; i++) {
        codigo += Math.floor(Math.random() * 10); 
    }
    return codigo;
}

function updateQuantity() {
    let datos = `id=${idUpdate}&cantidad=${modcantidad.value}`;
    const options = {
        method: "POST",
        body: datos,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    };
    fetch("../controller/Update.Pedido.php", options)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            readpokemon();
        });
       
}

function deleted(id){
    let datos = `id=${id}`
    const option = {
        method: "POST",
        body:datos,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    }
    fetch("../controller/Delete.pedido.php",option)
    .then(response => response.json())
    .then(data =>{
        console.log(data)
        readpokemon()
    })
    

}



updateRead();
readpokemon();
updateQuantity();