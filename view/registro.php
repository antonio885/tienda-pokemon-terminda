<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../view/assets/css/registro.css">
</head>
<style>
@font-face {
  font-family: fuente;
  src: url(../view/assets/font/pokemon/Pokemon\ Solid.ttf);
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
            <h3 class="mt-4 ">Registro</h3>
        </div>
        <div class="input">
        <div class="form-floating">
            <select name="" id="SelTipoDoc" class="form-control">
                <option value="" selected disabled>Seleccionar</option>
                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="NUI">NUI</option>
            </select>

            <label for="floatingInput">tipo de Doc</label>
        </div>
        
          <div class="password">
            <input type="text" id="txtidentificacion" placeholder="identificacion">
          </div>
          <div class="password mt-4">
            <input type="text"  id="txtnombre" placeholder="nombre">
          </div>
          <div class="password mt-4">
            <input type="text"  id="txtapellido" placeholder="apellido">
          </div>
          <div class="password mt-4">
            <input type="text" id="txtcorreo"  placeholder="correo">
          </div>
          <div class="password mt-4">
            <input type="text"  id="txtpassword" placeholder="contraseña">
          </div>
          <div class="password mt-4">
            <input type="text" id="txtdireccion" placeholder="dirreccion">
          </div>
          <div class="password mt-4">
            <input type="text" id="txttelefono" placeholder="telefono">
          </div>
          <div class="mb-3 mt-4  form-floating">
                <select id="txtgenero" class=" form-control">
                    <option value="" selected disabled>seleccionar</option>
                    <option value="Hombre">Mujer</option>
                    <option value="Mujer">Hombre</option>
                </select>
                <label for="floatingInput">genero</label>
            </div>
            <div class="form-floating mb-4" >
                    <select class="form-control"  name="" id="selrol"></select >
                    <label for="floatingInput">Rol</label>
                </div>
         
        <div class="boton">
          <button onclick="registro()" ><a href="../view/login.php">registrarse</a></button>
        </div>
        <div class="registro">
          <p>ya tienes una cuenta creada?<a href="../view/login.php">registrate</a> </p>
        </div>
        
        </div>
    </div>
   
  </div>  
</body>
</html>

<script src="../view/assets/js/registro.js"></script>