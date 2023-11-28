class Pokemon{
    constructor(id, nombre, cantidad , precio, imagen){
        this._id = id;
        this._nombre = nombre;
        this._cantidad = cantidad;
        this._precio = precio;
        this._imagen = imagen;
      
    }
    get id(){
        return $this._id
    }
    set id(nuevoId){
       this._id = nuevoId
    }
    get nombre(){
        return this._nombre;
    }
    set nombre(nuevoNombre){
        this._nombre = nuevoNombre;
    }

    get cantidad(){
        return this._cantidad;
    }

    set cantidad(nuevoCantidad){
        this._cantidad = nuevoCantidad;
    }

     get precio(){
    return this._precio;
 }

     set precio(nuevoPrecio){
    this._precio =nuevoPrecio
 }

     get imagen(){
    return this._imagen;
 }

    set imagen(nuevoImagen){
     this._imagen = nuevoImagen
 }
}