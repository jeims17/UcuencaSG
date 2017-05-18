<?php
	
	class Ruta {

		//método que nos permite ingresar controladores con sus rutas
		private $_controladores = array();

		public function controladores($controlador) {
			$this->_controladores = $controlador;
			// llamada al método del proceso de rutas
			self::submit();
		}

		public function submit() {
			$uri = isset($_GET["uri"]) ? $_GET["uri"] : "/"; // recupera la url del proyecto
			$paths = explode("/",$uri); // divide la url en partes y forma un array
			if ($uri == "/") {
				// principal
				$res = array_key_exists("/", $this->_controladores);
				if ($res != "" && $res == 1) {
					foreach ($this->_controladores as $ruta => $controller) {
						if ($ruta == "/") {
							$controlador = $controller;
						}
					}
					$this->getController("index", $controlador);
				}

			} else {
				// controladores y métodos
				$estado = false;
				foreach ($this->_controladores as $ruta => $cont) {
					if (trim($ruta,"/") == $paths[0]) {
						$estado = true;
						$controlador = $cont;
						$metodo = "";

						if (count($paths) > 1) {
							$metodo = $paths[1];
						}
						$this->getController($metodo, $controlador);

					}
				}
				if ($estado == false) {
					die ("Error en la ruta");
				}

			}

		}

		public function getController($metodo, $controlador) {
			$metodoController = "";

			if ($metodo == "index" || $metodo == "") {
				$metodoController = "index";
			} else {
				$metodoController = $metodo;	
			}

			$this->incluirControlador($controlador);

			if (class_exists($controlador)) {
				$claseTemp = new $controlador();
				if (is_callable(array($claseTemp, $metodoController))) {
					$claseTemp->$metodoController();
				} else {
					die ("No existe el método");
				}
			} else {
				die ( "No existe la clase");
			}
		}

		public function incluirControlador($controlador) {
			if (file_exists(APP_RUTA."controller/".$controlador.".php")) {
				include APP_RUTA."controller/".$controlador.".php";
			} else {
				die ("Error al encontrar el archivo del controlador");
			}
		}

	}

?>