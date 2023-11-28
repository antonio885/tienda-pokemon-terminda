<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <script src="../view/assets/js/bootstrap.js"></script>
    <script src="../view/assets/js/login.funcion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../view/assets/css/vista.compra.css">
</head>
<body style="background-image: url(../view/assets/img/pokemon-in-the-wild.png); background-repeat: no-repeat; background-size: cover;">
    <div class="container-fluid ">
        <div class="navbarLink" ><nav  class="navbar navbar-expand-lg  ">
  <div class="container-fluid">
    <a class="navbar-brand" href="../view/trabajo.php">inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../view/typepokemon.php">tienda</a>
        </li>
        <li class="nav-item">
        <button style=" border: none;   background-color:  rgb(16, 129, 203) ;" onclick="deletelogin()"><img src="../view/assets/img/images-removebg-preview.png" width="60px" height="40px" alt=""></button>

        </li>
      
       
      </ul>
    </div>
  </div>
</nav>
</div>
<div>
<table id="tablerol" class="table table-info ">
      <thead>
        <tr>
        <th scope="col" >#</th>
          <th scope="col" >codigoped</th>
        
          <th scope="col">nombre</th>
          <th scope="col">direccion</th>
          <th scope="col">telefono</th>
          <th scope="col">toal pedido</th>
          <th scope="col">forma de pago</th>
          <th scope="col">fecha de pedido</th>
          <th scope="col">estado pendiente</th>
          <th scope="col">funciones </th>
        </tr>
      </thead>
      <tbody id="tableBOdypoke">

      </tbody>
    </table>
</div>
    </div>
    <div class="modal fade" id="UpdateEstad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">estados</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-floating">
            <select id="estadoP" class="form-control">
            <option value="Recibido">Recibido</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Enviado">Enviado</option>
                <option value="Pendiente" >Pendiente</option>
            </select>
           
            <label for="floatingInput">Forma de pago</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateEstado()" data-bs-dismiss="modal">modificar</button>
        <!-- <button type="button" class="btn btn-primary" onclick="updateQuantity()" data-bs-dismiss="modal">modificar</button> -->
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="../view/assets/js/mostrar.pedido.compra.js">

</script>