<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 14/05/2017
 * Time: 0:47
 */

namespace SG\Dao;
include_once "Database.php";


$test = new Database();

$order_by = null;

$test->conectar();

$array_valores = ["idUsuario" => "1111111111", "nombre" => "cristhian", "apellido" => "hernandez","cedula" => "1111111111" ,"contrasenia" => "1111111111","rol" => "user" ,"correo" => "hernandez"];
$test->insertar('usuario', $array_valores);

$list_usuario = $test->select(
    "usuario",
    "*",
    null,
    $order_by
);
echo json_encode($list_usuario);
