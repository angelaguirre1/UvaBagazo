<?php

require_once "controllers/template.controller.php";
require_once "controllers/usuarios.controller.php";
require_once "controllers/contacto.controller.php";
require_once "controllers/estadisticas.controller.php";
require_once "controllers/maquinaria.controller.php";
require_once "controllers/eventos.controller.php";

require_once "models/usuarios.model.php";
require_once "models/maquinaria.model.php";
require_once "models/estadisticas.model.php";
require_once "models/contacto.model.php";
require_once "models/eventos.model.php";


$template = new ControllerTemplate();

$template->ctrTemplate();