<?php namespace app\SG\Model;

use SG\Dao\EncuestaDao;
use Symfony\Component\Console\Command\ListCommand;

/**
 * Representación de un laboratorio, el cual debe estar coordinado
 * por al menos un moderador.
 */
class Encuesta {
    public $idEncuesta;
    public $titulo;
    public $descripcionEncuesta;
    public $estado;
    public $Administrador_Usuario_idUsuario;
    public $fechaCreacion;


    private function __construct($idEncuesta, $titulo, $descripcionEncuesta, $estado, $Adminitrador_Usuario_idUsuario, $fechaCreacion)
    {
        $this->idEncuesta = $idEncuesta;
        $this->titulo = $titulo;
        $this->descripcionEncuesta= $descripcionEncuesta;
        $this->estado = $estado;
        $this->Administrador_Usuario_idUsuario = $Adminitrador_Usuario_idUsuario;
        $this->fechaCreacion = $fechaCreacion;
    }


    private static function get_object($array, $get_element = true){

        return new Encuesta($array[0]["idEncuesta"], $array[0]["titulo"], $array[0]["descripcionEncuesta"],
                $array[0]["estado"], $array[0]["Administrador_Usuario_idUsuario"], $array[0]["fechaCreacion"] );


    }

    public static function getInstance($id) {
        return Encuesta::get_object(EncuestaDao::getInstance()->get($id));
    }

    private function convertArray($lista){
        $array = [];
        foreach ($lista as $fila){
            array_push($array,$fila['id']);
        }

        return $array;
    }

    public function getModeradores() {
        return $this->convertArray(LaboratorioDao::getInstance()->getModeradores($this->id));
    }

    public static function getAll($order_atribute = null){
        return Laboratorio::get_object(LaboratorioDao::getInstance()->getAll($order_atribute), false);
    }

}
