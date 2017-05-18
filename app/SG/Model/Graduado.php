<?php namespace app\SG\Model;
use app\SG\Dao\UsuarioDao;


class Graduado extends Usuario {
    protected function __construct($idUsuario, $nombre, $apellido, $cedula, $correo, $contrasenia, $rol) {
        parent::__construct($idUsuario, $nombre, $apellido, $cedula, $correo, $contrasenia, $rol);
    }

    //Metodo para obtener el objeto usuario del array devuelto de la
    private static function get_object($array, $get_element = true){
        if ($get_element){
            return new Graduado(
                $array[0]["idUsuario"],
                $array[0]['nombre'],
                $array[0]["apellido"],
                $array[0]['cedula'],
                $array[0]["correo"],
                $array[0]['contrasenia'],
                $array[0]['rol']
            );

        }else {
            $usuarios = array();
            foreach ($array as $fila){
                array_push($usuarios,new Graduado(
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
            return $usuarios;
        }
    }

    //Metodo para obtener un usuario de la base de datos.

    public static function getInstance($id) {
        return Administrador::get_object(UsuarioDao::getInstance()->get($id));
    }

    // Metodo para obtener una lista de todos los usuarios.

    public static function getAll($order_attribute = null){
        return self::get_object(UsuarioDao::getInstance()->getAll($order_attribute), false);
    }
}
