<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../view/assets/css/login.css">
</head>
<style>
 @font-face {
  font-family: fuente;
  src: url(assets/font/pokemon/Pokemon\ Solid.ttf);
 }
</style>
<body>
  <div class="container-fluid ">
    <div class="etiqueta">
        <h1 class="ms-3">pokemon</h1>
    </div>
    <div class="content img">
      <div class=" caja">
        <div class=" titulo">
            <h3 class="mt-4 ">Inicio De Sesion</h3>
        </div>
        <div class="input">
          <div class="Nombreuser">
            <input type="text" id="txtnombre" placeholder="usuario">
          </div>
          <div class="password">
            <input type="text" id="txtcontraseña" placeholder="contraseña">
          </div>
        </div>
        <div class="boton">
          <button onclick="loginUser()">Ingresar</button>
        </div>
        <div class="registro">
          <p>no tienes una cuenta?<a href="../view/registro.php">registrate</a> </p>
        </div>
        
        </div>
    </div>

  </div>  
</body>
</html>
<script src="../view/assets/js/login.js"></script>