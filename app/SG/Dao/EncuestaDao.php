<?php

namespace SG\dao;

use app\dao\Database;
use SG\common\UsuarioException;

class EncuestaDao{

    private $database;
    private static $instance = null;

    //EncuestaDao constructor.

    private function __construct(){
        $this->database = new Database();
        $this->database->select();
    }

    //Método para obtener la instancia de la clase.

    public static function getInstance(){
        if (static::$instance == null){
            static::$instance = new self();
        }
        return static::$instance;
    }

    //Método para obtener una encuesta pasando su id.

    public function get($id){
        $where = "idEncuesta = " . "'" . $id . "'";
        $encuesta = $this->database
            ->select(
                "encuesta",
                "*",
                $where,
                null
            );
        if (count($encuesta) === 0){
            throw new UsuarioException(
                Database::getMgs(5000,$this->getModel()),
                "la encuesta no se encuentra en la base de datos"
            );
        }
        return $encuesta;
    }

    //Método para obtener todas la encuestas Relizados por un Administrador

    public function getAllAdmin($order_attribute){
        $order_by = null;

        if ($order_attribute != null) {
            $order_by = "order by " . $order_attribute . " asc";
        }

        $lista_encuestas = $this->database
            ->select(
                "encuestas",
                "*",
                null,
                $order_by
            );
        return $lista_encuestas;

    }

    //Método para obtener todas las encuestas  Relizados por un Graduado
    public function getAllUser($order_attribute){
        $order_by = null;

        if ($order_attribute != null) {
            $order_by = "order by " . $order_attribute . " asc";
        }

        $lista_encuestas = $this->database
            ->select(
                "repuesta",
                "*",
                null,
                $order_by
            );
        return $lista_encuestas;

    }
    /**
     * Método para obtener todas las preguntas relacionadas con una encuesta
     */
    public function getPreguntas($id){
        $where_mod = "Encuesta_idEncuesta = " . "'" . $id . "'";
        $lista_preguntas = $this->database
            ->select(
                "pregunta",
                "*",
                $where_mod,
                null
            );

        return $lista_preguntas;
    }
    private function getModel(){
        return [
            'elemento_null' => ['Encuesta','registrado']

        ];
    }

}