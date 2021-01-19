class Imagen{
    
constructor(Nombre,Ruta,Categoria){
 this.nombre=Nombre;
this.ruta=Ruta;
this.categoria=Categoria;
}  
    
getNombre(){
     return this.nombre;
 } 
getRuta(){
     return this.ruta;
}   
    
getCategoria(){
     return this.categoria;
}   

setNombre(Nombre){
    this.nombre=Nombre; 
 } 
setRuta(Ruta){
    this.ruta=Ruta;
}   
    
setCategoria(Categoria){
    this.categoria=Categoria;
} 
    
    
    
}