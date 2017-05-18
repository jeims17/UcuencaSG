<?php

require_once("help/helps.php");
define("APP_RUTA",RUTA_BASE."app/SG/");
define("VISTA_RUTA",RUTA_BASE."view/");
define("ASSETS_PATH",RUTA_BASE."assets/");
define("LIBRERIA",RUTA_BASE."library/");
define("RUTA",APP_RUTA."Rutas/");
define("MODELS",APP_RUTA."Model/");

//configuraciones
define("CONFIG_FILE", RUTA_BASE . "config/config.json");
require_once(RUTA_BASE . "util/Database.php");
//require_once("help/class.inputfilter.php");

//librerias
//require_once("vendor/Redirecciona.php");
//require_once("vendor/Session.php");

includeModels();
require_once("Vista.php");
include "Ruta.php";
include RUTA."rutas.php";
//echo APP_RUTA;

?>