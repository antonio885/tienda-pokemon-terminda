<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="../view/assets/js/login.funcion.js"></script>
</head>
<body style="background-image:url(./assets/img/pokemon-in-the-wild.png) ; background-repeat: no-repeat; background-size: cover;">
    <div class="container-fluid">
      <div>
      <nav class="navbar navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../view/vista.administrador.php">regresar</a>
    <form class="d-flex" role="search">
    <button style="border: none; background-color:rgb(0, 123, 255);" onclick="deletelogin()"><img src="../view/assets/img/images-removebg-preview.png" width="60px" height="40px" alt=""></button>
    </form>
  </div>
</nav>
      </div>
        <div>
        <div>
    <table class="table table-warning" id="tablepoke">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">codigos del pedido</th>
                            <th scope="col">nombre del cliente</th>
                            <th scope="col">direccion</th>
                            <th scope="col">telefono</th>
                            <th scope="col">Total de pedido</th>
                            <th scope="col">forma de pago</th>
                            <th scope="col">fecha de envio</th>
                            <th scope="col">estado del pedido</th>

                            <th scope="col">estado</th>
                            <th scope="col">pedido</th>
                           
                        </tr>
                    </thead>
                    <tbody id="tableBodyPoke">


                    </tbody>
                </table>
        </div>

    </div>
    <div class="modal fade" id="UpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">pedidos del cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table class="table" id="tablepoke">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nombre del producto</th>
                            <th scope="col">cantidad</th>
                           
                        
                           
                        </tr>
                    </thead>
                    <tbody id="idview">


                    </tbody>
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" onclick="updateQuantity()" data-bs-dismiss="modal">modificar</button> -->
      </div>
    </div>
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
            <option value="Pendiente" >Pendiente</option>
                <option value="Enviado">Enviado</option>
                <option value="Cancelado">Cancelado</option>
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
<script src="../view/assets/js/mostrar.vista.pedido.js"></script>