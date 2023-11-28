var ids
function readView(){
    let table = ""

    fetch("../controller/view.administrador.pedido.php")
    .then(response => response.json())
    .then(data =>{
        console.log(data)
        data.forEach((element,index) => {
            table += `<tr>`
            table += `<td>${index + 1}</td>`
            // tabla += `<td>${element.codigoPed}</td>`
            // tabla += `<td>${element.nombre}</td>`
            // tabla += `<td>${element.direccion}</td>`
            // tabla += `<td>${element.telefono}</td>`
            // tabla += `<td>${element.totalPed}</td>`
            // tabla += `<td>${element.formaPago}</td>`
            // tabla += `<td>${element.fechaEnvPedido}</td>`
            // tabla += `<td>${element.estadoPedido}</td>`
            table += `<td>${element.nombrePro}</td>`
            table += `<td>${element.cantidadPro}</td>`
            // tabla += `<td>${element.estado}</td>`
            table += `</tr>`     
        });
document.getElementById("idview").innerHTML = table

    })
}
function readPedido(){
    tabla = ""
    fetch("../controller/controlador.pedidos.php")
    .then(response => response.json())
    .then(data =>{
        console.log(data)
        data.forEach((element,index) => {
             tabla += `<tr>`
            tabla += `<td>${index + 1}</td>`
            tabla += `<td>${element.codigoPed}</td>`
            tabla += `<td>${element.nombre}</td>`
            tabla += `<td>${element.direccion}</td>`
            tabla += `<td>${element.telefono}</td>`
            tabla += `<td>${element.totalPed}</td>`
            tabla += `<td>${element.formaPago}</td>`
            tabla += `<td>${element.fechaEnvPedido}</td>`
          
            tabla += `<td>  <button type="button" class="btn btn-primary w-75" onclick='pedidoEstado(${element.id})' data-bs-toggle="modal" data-bs-target="#UpdateEstad">${element.estadoPedido}</button> </td>`
                tabla += `<td>${element.estado}</td>`
              
                tabla += `<td> <button type="button" class="btn btn-success "  data-bs-toggle="modal" data-bs-target="#UpdateModal">Pedido</button></td>`
            tabla += `</tr>`     
        })
        document.getElementById("tableBodyPoke").innerHTML = tabla
    })
    
}
function pedidoEstado(id){

    fetch(`../controller/update.estado.php?id=${id}`)
    .then(response => response.json())
    .then(data =>{
        estadoP.value = data[0].estadoPedido
this.ids = data[0].id
        console.log(data)
    })
    
}
function updateEstado(){
    let datos = `id=${ids}&estado=${estadoP.value}`
    const options = {
        method: "POST",
        body: datos,
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        }
    }
    fetch("../controller/UpdateEstado.pedido.php", options)
    .then(response => response.json())
    .then(data=>{
        console.log(data)
        readPedido()
    })
}
readView()
readPedido()