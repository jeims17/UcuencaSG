<?php namespace app\SG\Model;

/**
 * Representación de una persona en el sistema.
 */
abstract class Usuario {
    public $idUsuario;
    public $nombre;
    public $apellido;
    public $cedula;
    public $correo;
    public $contrasenia;
    public $rol;

    protected $is_save = true;

    protected function __construct($idUsuario, $nombre, $apellido, $cedula, $correo, $contrasenia, $rol , $is_save = null) {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->correo = $correo;
        $this->contrasenia = $contrasenia;
        $this -> rol =$rol;
        $this->is_save = $this->is_save && $is_save;
    }

}
