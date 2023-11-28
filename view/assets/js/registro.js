function readselrol(){
    let option = ""
    fetch("../controller/registro.controller.php")
    .then(response => response.json())
    .then(data =>{
        console.log(data)
        data.forEach(element => {
            option += `<option value='${element.id}' >${element.nombreRol}</option>`
        });
       document.getElementById("selrol").innerHTML = option
    })
}

function registro(){
let datos = `tipoDoc=${SelTipoDoc.value}&identificacion=${txtidentificacion.value}&nombre=${txtnombre.value}&apellido=${txtapellido.value}&email=${txtcorreo.value}&password=${txtpassword.value}&direccion=${txtdireccion.value}&telefono=${txttelefono.value}&genero=${txtgenero.value}&rol=${selrol.value}`
const options = {
    method: "POST",
    body: datos, 
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
    }

}
fetch("../controller/create.registro.php", options)
.then(response => response.json())
.then(data =>{
    console.log(data)
})
}
readselrol()

