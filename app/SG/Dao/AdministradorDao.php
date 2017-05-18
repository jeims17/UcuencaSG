<?php

namespace SG\Dao;

use SG\Common\UsuarioException;
use app\Dao\Database;

class AdministradorDao{
    private $data_base;
    private static $instance = null;

    private function __construct(){
        $this->data_base = new Database();
        $this->data_base->conectar();
    }

    //Método para obtener la instancia de la clase.

    public static function getInstance(){
        if (static::$instance == null){
            static::$instance = new self();
        }
        return static::$instance;
    }

    //Método para obtener un administrador pasando su id.

    public function get($id){
        $where = "Usuario_idUsuario = " . "'" . $id . "'";
        $admin = $this->data_base->select("Administador", "*", $where, null);
        if (count($admin) === 0){
            throw new UsuarioException(
                Database::getMgs(
                    5000,
                    $this->getModel()
                ),
                "el administrador no se encuentra en la base de datos"
            );
        }
        return $admin;
    }

    //Método para obtener una lista de todos los administradores registrados

    public function getAll($order_attribute){
        $order_by = null;

        if ($order_attribute != null) {
            $order_by = "order by " . $order_attribute . " asc";
        }
        $list_admin = $this->data_base->select("Administrador", "*", null, $order_by);

        return $list_admin;
    }

    private function getModel(){
        return [
            'elemento_null' => ['Administrador','registrado']

        ];
    }
}