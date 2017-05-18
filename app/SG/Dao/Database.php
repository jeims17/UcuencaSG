<?php
namespace app\dao;
define('CONFIG_FILE', __DIR__ . '/../../../config/database.json');

class Database
{
    //Declaracion de Variables
    private $servidor;
    private $usuario;
    private $clave_db;
    private $name;
    private $puerto;

    private $conexion;

    //Constructor
    public function __construct()
    {
        $this->configuracion();
    }

    // Configurando la conexion con base de datos
    private function configuracion()
    {
        $json = file_get_contents(CONFIG_FILE);
        $config = json_decode($json, true);

        $this->servidor = $config['server'];
        $this->usuario = $config['usuario'];
        $this->clave_db = $config['clave_db'];
        $this->name = $config['name'];
        $this->puerto = $config['puerto'];
    }

    //Conexion con la Base de Datos
    public function conectar()
    {
        $this->conexion = new \mysqli(
            $this->servidor,
            $this->usuario,
            $this->clave_db,
            $this->name,
            $this->puerto);
        if ($this->conexion->connect_error) {
            throw new \Exception(
                "Conexion fallida. {$this->conexion->connect_error}"
            );
        }
    }

    //Desconexion
    public function desconectar()
    {
        if (isset($this->conexion)) {
            $this->conexion->close();
        }
    }

    //Obtener mensaje de Error de la base de datos
    public function error()
    {
        return $this->conexion->error;
    }

    //Método para consulta
    private function query($sql)
    {
        return $this->conexion->query($sql);
    }

    //Obtener el codigo de error de la base de datos
    public function code_Error()
    {
        return $this->conexion->errno;
    }

    //Metodo Para Insertar Valores en un tabla
    public function insertar($tabla, $valores)
    {
        $array = $this->capturarValoresArray($valores);
        $claves = implode(',', $array['keys']);
        $valores = implode(',', $array['values']);
        $sql = "INSERT INTO  {$tabla} ({$claves}) VALUES ({$valores})";
        if (!$this->query($sql)) {
            throw new \Exception(
                "Error al insertar {$valores}. {$this->error()}",
                $this->code_Error()
            );
        }

    }

    //Captura clave y valores
    private function capturarValoresArray($array)
    {
        $clave = array_keys($array);
        $valor = $this->conversion_String(array_values($array));
        return array(
            'keys' => $clave,
            'values' => $valor
        );

    }

    //Saca un arreglo
    private function conversion_String($array)
    {
        $values = array();
        foreach ($array as $value) {
            $values[] = $this->citar_string($value);
        }
        return $values;

    }

    private function citar_string($string)
    {
        return "'{$string}'";
    }

    public function select($nombre_tabla, $columnas = "*", $where = null, $order = null
    )
    {

        if ($columnas !== '*') {
            $columnas = implode(',', $columnas);
        }
        $sql = "SELECT {$columnas} FROM {$nombre_tabla}";
        if ($where != null) {
            $sql .= "WHERE  {$where}";
        }

        if ($order != null) {
            $sql .= "ORDER BY {$order}";
        }

        $result = $this->query($sql);


        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Método para actualizar los registros de la tabla
    public function actualizar($nombre_tabla, $columnas, $where)
    {
        $sql = "UPDATE {$nombre_tabla}";
        $columnas_set = array();
        foreach ($columnas as $key => $valor) {
            array_push(
                $columnas_set,
                $key . '=' . $this->citar_string($valor)
            );
        }
        $sql .= "SET " . implode(',', $columnas_set);
        $sql .= "WHERE {$where}";

        if (!$this->query($sql)) {
            throw new \Exception(
                $this->error(),
                $this->code_Error()
            );
        }
    }

    //Método para capturas de código de errores
    public static function getMgs($code, $data)
    {
        switch ($code) {
            // Clave foránea no existente
            case 1452:
                return "El {$data['clave_foranea'][0]} no se encuentra {$data['clave_foranea'][1]}";
            // clave primaria duplicada
            case 1062:
                return "El {$data['clave_pk_duplicate'][0]} ya existe";
            //cuando un elemento no se encuentra registrado en la base de datos.
            case 5000:
                return "El {$data['elemento_null'][0]} no se encuentra {$data['elemento_null'][1]}";
            default:
                return "No se puede agregar el {$data['clave_pk_duplicate'][0]}";
        }
    }

}