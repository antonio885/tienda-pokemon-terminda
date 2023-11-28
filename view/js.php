<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>java srcip</title>
</head>
<body>
    <input type="text" name="edad" id="edad">
    <br>
    <p id="respuesta"></p>
    <br>
    <button onclick="edad">validar</button>
</body>
</html>
<script>

    function edad(){
let edad = document.getElementById("edad");
let respuesta = document.getElementById("respuesta");
if(edad.Value >= 18){

respuesta.innerHTML = "mayor de edad"
    }else(edad.Value < 18); {

        respuesta.innerHTML= "menor de edad"
    }
    }
//    let documento = Number(documento)
    
//     if(nombre >= 18 ){
// console.log("mayor de edad")
//     }else {
// console.log("menor de edad")
//     }
     // let nombre = "document"; 
    // console.log("hola mundo" + typeof(nombre) );
    // alert("hola mundo" + nombre);
    // prompt("edad de los estudiantes " + nombre);
    // confirm("desea abri una cuenta  "+ nombre);
</script>