<?php

/*La arquitectura de la aplicacion es MVC (Modelo Vista Controlador)
en la carpeta colntrollers estan los controladores, estos se encargar de recibir y/o procesar 
informacion para despues mediante un modelo hacer la consulta en la base de datos. En la carpeta views viene toda la
parte visual, el codigo HTML lo pueden encontrar ahi dentro en la carpera modules. La procamamcion es orientada a objetos por lo que cada formulario tiene un objeto de tipo controlador.*/

/*Archivos que se trabajaran constantemente

    controladores = carpeta controllers
    javascript = direccion -> views / js
    modulos = carpeta modules
    modelos = carpeta models
    
*/

require_once "controllers/template.controller.php";
require_once "controllers/usuarios.controller.php";
require_once "controllers/contacto.controller.php";
require_once "controllers/estadisticas.controller.php";
require_once "controllers/maquinaria.controller.php";
require_once "controllers/eventos.controller.php";
require_once "controllers/categorias.controller.php";
require_once "controllers/productos.controller.php";
require_once "controllers/ventas.controller.php";
require_once "controllers/clientes.controller.php";

require_once "models/usuarios.model.php";
require_once "models/maquinaria.model.php";
require_once "models/estadisticas.model.php";
require_once "models/contacto.model.php";
require_once "models/eventos.model.php";
require_once "models/categorias.model.php";
require_once "models/productos.model.php";
require_once "models/ventas.model.php";
require_once "models/clientes.model.php";


$template = new ControllerTemplate();

$template->ctrTemplate();