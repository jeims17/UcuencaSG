<?php namespace app\SG\Model;
use app\SG\Dao\UsuarioDao;
//use app\SG\Model\Usuario;
require_once(APP_RUTA . "Model/Usuario.php");

class Administrador extends Usuario {
    protected function __construct($idUsuario, $nombre, $apellido, $cedula, $correo, $contrasenia, $rol) {
        parent::__construct($idUsuario, $nombre, $apellido, $cedula, $correo, $contrasenia, $rol);
    }

    //Método para obtener el objeto Administrador del array devuelto de la base de datos.

    public static function get_object($array, $get_element = true){
        if ($get_element){
            return new Administrador(

                $array[0]["idUsuario"],
                $array[0]['nombre'],
                $array[0]["apellido"],
                $array[0]['cedula'],
                $array[0]["correo"],
                $array[0]['contrasenia'],
                $array[0]['rol']

            );

        }else {
            $admins = array();
            foreach ($array as $fila){
                array_push(
                    $admins,
                    new Administrador(
                        $array[0]["idUsuario"],
                        $array[0]['nombre'],
                        $array[0]["apellido"],
                        $array[0]['cedula'],
                        $array[0]["correo"],
                        $array[0]['contrasenia'],
                        $array[0]['rol']
                    )
                );
            }
            return $admins;
        }
    }

    //Método para obtener un administrador de la base de datos.


    public static function getInstance($id) {
        return Administrador::get_object(UsuarioDao::getInstance()->get($id));
    }

    /**
     * Método para obtener una lista de todos los administradores.
     * @param null $order_attribute
     * @return Administrador|array
     */
    public static function getAll($order_attribute = null){
        return Administrador::get_object(UsuarioDao::getInstance()->getAll($order_attribute), false);
    }
}