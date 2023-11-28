<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/assets/css/trabajo.css">
    <link rel="stylesheet" href="../view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../view/assets/css/carusel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
    <script src="../view/assets/js/archivo.js"></script>
    <script src="../view/assets/js/login.funcion.js"></script>
</head>
<?php 
session_start();

$idUsuario = isset($_SESSION["id"]) ? $_SESSION["id"]: "";
$idCuenta = isset($_SESSION["idRol"]) ? $_SESSION["idRol"]: "";

?>
<body onload="slideCategoriapokemon(); loadpokemon(); llevarpokemon()">
    <div class="container-fluid">

        <div class="navegador  " >
            <div class="d-flex"> 

            <div > <h3 id="rolUsuario"></h3>
            <h3 id="nombreUser"></h3>
        <input id="clienteId" value="<?php echo $idUsuario ?>" hidden type="text">
<input id="cuentaUser" value="<?php echo $idCuenta ?>" hidden  type="text">
</div> 
                <input style="font-size: 21px ; width: 300px;  height:50px ; margin-left: 500px;" name="btnbuscar" type="text" id="btnbuscar"
                    onkeyup="autocomplePokemon()">
                <img src="../view/assets/img/download-removebg-preview.png " height="27px" alt="">


                <button ondrop="drop(event)" ondragover="allowDrop(event)" type="button"
                class="btn btn-primary position-relative  h-75" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-sharp fa-regular fa-cart-plus "></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        id="carri">
                        0+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
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
            </div>
        </div>

</div>
        <!-- <button onclick="carrito()">Registrar</button> -->
    
    <div class="col-12  d-flex " id="listpoke"></div>
   

    <div class="barra ">
        <div>
            <button id="refrescar" onclick="recargar()">inicio</button>
        </div>
        <div>
            <button href="#" id="cate" onclick=" mostrarcate()">Categoria</button>
        </div>
        <div>
            <button><a  href="../view/vista.dompra.php"> Mis Compras</a></button>
        </div>
        <div>
            <button onclick="deletelogin()"><img src="../view/assets/img/images-removebg-preview.png" width="60px" height="40px" alt=""></button>
        </div>

    </div>

    <div class="publicidad">
        <div class="cajon1 " id="fondoNuevo">

            <div class="carrusel">
                <marquee direction="left">
                    <img id="pokemonUno" src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/384_f2.png"
                        height="370px" alt="logopopsy">
                    <img id="pokemonDos" src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/248.png"
                        height="370px" alt="logopopsy">
                    <img id="pokemonTres" src="https://assets.pokemon.com/assets/cms2/img/pokedex/full/150.png"
                        height="370px" alt="logopopsy">
                </marquee>
            </div>
     
        </div>

        <div class="cajon2 ">
            <p style="color: rgb(6, 0, 0) ; margin-top: 20px; ">Lorem ipsum dolor, sit amet consectetur adipisicing
                elit. Accusamus cum minima quam lauda</p>
            <button style="background-color: aqua ;">presionar</button>
        </div>
    </div>
    <div class="barra2 " style="background-image: url(../view/assets/img/pokemon-in-the-wild.png); background-size: cover;">
        <div class="content">
            <div class="container my-3 mt-5" id="featureContainer">

                <div class="row mx-auto my-auto justify-content-center ">
                    <div id="featureCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class=" d-flex justify-content-between position-relative top-50 " style="z-index: 1;">
                            <a class="indicator" href="#featureCarousel" role="button" data-bs-slide="prev">
                                <span class="fas fa-chevron-left" aria-hidden="true"></span>
                            </a> &nbsp;&nbsp;
                            <a class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
                                <span class="fas fa-chevron-right" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="carousel-inner" id="carosel-cat" role="listbox">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="publicidad3">
        <div class="card ms-4 mb-3 " draggable="true" ondragstart="drag(event)" id="cardcharizard"
            style="max-width: 500px; background-image: url(../view/assets/img/desktop-wallpaper-pokeball-background-live-pokeball-pokebola.jpg);  background-size: cover;  background-position: center; ">
            <div class="row g-0">
                <div class="col-md-4">
                    <a onclick="localUrlDetalles('${element.pokemon.url}')" href="pokemones.php">
                        <img id="imgcharizard" src="" class="img-fluid rounded-start">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase me-5 ">charizard</h5>
                        <div>
                            <p class="card-text mb-1 fw-semibold  " id="number ${element.pokemon.name}" style="margin-left: 180px"></p>

                            <p  style="margin-left: 180px" 
                                class="card-text mb-1 fw-semibold"><small id="altura${element.pokemon.name}" class="text-muted"></small></p>

                            <p class="card-text fw-semibold" style="margin-left: 180px" ><small id="peso${element.pokemon.name}" class="text-muted"></small></p>
                        </div>
                        <div>
                            <input type="number" id="cantidadcha" min="0" placeholder="cantidad">
                        </div>
                    </div>
               
            </div>
        </div>
    </div>

    </div>
    <div class="publicidad4">
        <div class="carta4 ">
            <div class="descripcion4">
                <p>Lorem, ipsum. Lorem ipsum dolor sit.</p>
            </div>
        </div>
        <div class="carta5">
            <div class="descripcion5">
                <p>Lorem, ipsum. Lorem ipsum dolor sit.</p>
            </div>
        </div>
        <div class="carta6">
            <div class="descripcion6">
                <p>Lorem, ipsum. Lorem ipsum dolor sit.</p>
            </div>
 
    </div>

    </div>
    <div class="publicidad5">
        <div>
            <img src="../view/assetsimg/download-removebg-preview (32).png" alt="">
        </div>
        <div>
            <img style="margin-top: 15px; " src="../view/assetsimg/download-removebg-preview (32).png" alt="">
        </div>
        <div>
            <img style="margin-top: 15px; " src="../view/assetsimg/download-removebg-preview (32).png" alt="">
        </div>
    </div>
  

</div>
</body>

</html>
<script src="../view/assets/js/trabajo.js"></script>