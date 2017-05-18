<?php

namespace app\Dao;

use SG\common\UsuarioException;

class EgresadoDao{

    private $database;
    private static $instance = null;

    //UsuarioDao constructor.

    private function __construct(){
        $this->database = new Database();
        $this->database->conectar();
    }

    //Método para obtener la instancia de la clase.

    public static function getInstance(){
        if (static::$instance == null){
            static::$instance = new self();
        }
        return static::$instance;
    }

    //Método para obtener un usuario pasando su id.

    public function get($id){
        $where = "Usuario_idUsuario = " . "'" . $id . "'";
        $usuario = $this->database->select("Egresado","*", $where, null);
        if (count($usuario) === 0){
            throw new UsuarioException(
                Database::getMgs(5000,$this->getModel()),
                "el usuario no se encuentra en la base de datos"
            );
        }
        return $usuario;
    }

    //Método para obtener una lista de todos los usuarios registrados

    public function getAll($order_attribute){
        $order_by = null;

        if ($order_attribute != null) {
            $order_by = "order by " . $order_attribute . " asc";
        }

        $list_usuario = $this->database->select("Egresado","*", null, $order_by);
        return $list_usuario;

    }
    private function getModel(){
        return [
            'elemento_null' => ['Usuario','registrado']

        ];
    }

}