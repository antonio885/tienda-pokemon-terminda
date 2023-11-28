<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title id="titulobarra">Document</title>
  <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="../view/assets/js/archivo.js"></script>
<script src="../view/assets/js/login.funcion.js"></script>

</head>
<?php 
session_start();

$idUsuario = isset($_SESSION["id"]) ? $_SESSION["id"]: "";
$idCuenta = isset($_SESSION["idRol"]) ? $_SESSION["idRol"]: "";

?>
<body onload="verpokemon() , getevolucion(),llevarpokemon(),actulizarcanti()">

  <div class="container-fluid  " style="background-image: url(../view/assets/img/pokemon-in-the-wild.png);">
  <nav class="navbar bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand d-flex"> <div > <h2 id="rolUsuario"></h2>
        <input id="clienteId" value="<?php echo $idUsuario ?>" hidden type="text">
<input id="cuentaUser" value="<?php echo $idCuenta ?>" hidden  type="text">
</div>   <button   ondrop="drop(event)" ondragover="allowDrop(event)" type="button"
                    class="btn btn-primary position-relative w-25" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-sharp fa-regular fa-cart-plus "></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        id="carri">
                        0+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
           </a>
           <a class="nav-link active" aria-current="page" href="../view/vista.dompra.php"><button style="background-color: aqua;">compras</button></a>
                <div>
            <button style="border: none; background-color: mediumturquoise;" onclick="deletelogin()"><img src="../view/assets/img/images-removebg-preview.png" width="60px" height="40px" alt=""></button>
        </div>
  </div>
</nav>
    <div class="row d-flex align-content-center ">
  
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
  </div>
</body>

</html>



<script src="../view/assets/js/typepokemon.js"></script>