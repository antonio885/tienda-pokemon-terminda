// const rol = []
// const user = []
function loginUser(){
let datos = `nombre=${txtnombre.value}&contraseña=${txtcontraseña.value}`

fetch("../controller/loginCreate.php?" + datos)
.then(response => response.json())
.then(data =>{
    console.log(data)

    try {
    
     if(data[0].correo == txtnombre.value){
        extraerRol(data[0].idRol)
//        let nombreRol = user
//         if(nombreRol === "cliente")
// window.location.href = "trabajo.php"
//      }
//      else if(nombreRol === "administrador"){
//         window.location.href = "vista.administrador.php"
     }
    } catch (error) {
        alert = "usuario no existente"
    }
})

}
function extraerRol(idRol){
    fetch(`../controller/roles.busqueda.php?id=${idRol}`)
    .then(response => response.json())
    .then(data =>{
        console.log(data)
 
        pageRol(data[0].nombreRol)
    })

}
function pageRol(nombreRol) {
  try {
    if (nombreRol === "cliente") {
        window.location.href = "trabajo.php";
    } else if (nombreRol === "administrador") {
        window.location.href = "vista.administrador.php";
    }  
  } catch (error) {
    alert = "usuario no existente"
  }
  
}
loginUser()
