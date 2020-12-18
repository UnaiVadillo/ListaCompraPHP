<?php

include "ArrayBD.php";

session_start();

inicializarCesta();

if (isset($_GET["action"])){
    $action = $_GET["action"];
    realizarAccion($action);
}
if (isset($_SESSION["arrayLista"])){
    $arraySesion= $_SESSION["arrayLista"];
}


function inicializarCesta(){
    if(!isset($_SESSION["arrayLista"])){
        $_SESSION["arrayLista"] = array();
    }
}
function realizarAccion($action){
    switch ($action){
        case "comprar":
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                insertarObjetoLista($id);
            }else{
                 echo "ERROR";
            }
            break;
        case "borrar":
            session_unset();
            break;
        case "borrarProducto":
            $id= $_GET["id"];
            var_dump($_SESSION["arrayLista"]);
            unset($_SESSION["arrayLista"][1]);
            break;
    }
}
function insertarObjetoLista($id){
    array_push($_SESSION["arrayLista"],$id);
}

function calcularPrecio($arrayProductos, $arraySesion){
    $resultado=0;
    if ($arraySesion != null) {
        foreach ($arraySesion as $id) {
            $resultado += $arrayProductos[$id]["precio"];
        }
    }
    return $resultado;
}
function borrarProductoId($id){

}
require "listaCompra_view.php";
