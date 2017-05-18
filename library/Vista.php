<?php namespace vista;

	class Vista {

		public static function crear($path, $key=null, $value=null) {
			$paths = explode(".", $path);

			if ($path != "") {
				$paths = explode(".", $path);
				$ruta = "";

				for($i = 0; $i < count($paths); $i++) {
					if ($i == count($paths)-1) {
						$ruta .= $paths[$i].".php";
					} else {
						$ruta .= $paths[$i]."/";
					}
				}

				if (file_exists(VISTA_RUTA.$ruta)) {
					if (!is_null($key)) {
						if (is_array($key)) {
							extract($key, EXTR_PREFIX_SAME, "");
						} else {
							${$key} = $value;
						}

					}
					include VISTA_RUTA.$ruta;

				} else {
					die ("no existe la vista");
				}

			}
			return null;
		}

	}

?>