<?php

	class Img {
		public static function uploadImg($path) {
			$img = array('mesaje' => '', 'urlImg' => '');
			if(isset($_FILES["imgAddress"])) {
				if($_FILES["imgAddress"]["error"] > 0) {
					switch($_FILES['imgAddress']['error']) {
						case 1:
							$img['mesaje'] = ' El fichero ocupa más de lo permitido por PHP';
							break;
						case 2:
							$img['mesaje'] = 'El fichero ocupa más de lo permitido por el formulario';
							break;
						case 3:
							$img['mesaje'] = ' Sólo se subio una parte del fichero';
							break;
						case 4:
							$img['mesaje'] = 'No se ha subido un fichero.';
							break;
						default:
							$img['mesaje'] = "no se ha enviado ninguna imagen";
							break;
					}
				} else {
					//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
					//y que el tamano del archivo no exceda los 512KB
					$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png","application/octet-stream");
					$limite_kb = 3096;
					if(in_array($_FILES['imgAddress']['type'], $permitidos) && $_FILES['imgAddress']['size'] <= $limite_kb * 1024) {
						if(!file_exists($path)) {
							if(!mkdir($path, 0777, true)) {
								die("No se puedo crear el directorio");
							}
						}
						//obtener extension del archivo
						$addressExt = explode('.', $_FILES['imgAddress']['name']);
						$extension = end($addressExt);
						$urlImg=$path.date("YmdHis").'.'.$extension;
						if(move_uploaded_file($_FILES['imgAddress']['tmp_name'], $urlImg)){
							$img['urlImg'] = $_FILES['imgAddress']['name'] == ''?'':$urlImg;
						} else {
							$img['mesaje'] = "Ha ocurrido un error al subir la imagen, trate de nuevo!";
						}
					} elseif(!in_array($_FILES['imgAddress']['type'], $permitidos)) {
						$img['mesaje'] = "formato de archivo no permitido";
					}else{
						$img['mesaje'] = "La imagen excede el tamano de $limite_kb Kilobytes";
					}
				}
			} else {
				$img['mesaje'] = 'Variable ImgAddres no encontrada';
			}
			return $img;
		}
		public static function uploadIcon($imgAddressIcon,$path,$nameFile) {//para el logo de inicio del hotel
			$img = array('mesaje' => '', 'urlImg' => '');
			if(!isset($_FILES[$imgAddressIcon]) || $_FILES[$imgAddressIcon]["error"] > 0) {
				switch($_FILES[$imgAddressIcon] ['error']) {
					case 1:
						$img['mesaje'] = ' El fichero ocupa más de lo permitido por PHP';
						break;
					case 2:
						$img['mesaje'] = 'El fichero ocupa más de lo permitido por el formulario';
						break;
					case 3:
						$img['mesaje'] = ' Sólo se subio una parte del fichero';
						break;
					case 4:
						$img['mesaje'] = 'No se ha subido un fichero.';
						break;
					default:
						$img['mesaje'] = "no se ha enviado ninguna imagen";
						break;
				}
			} else {
				//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
				//y que el tamano del archivo no exceda los 16MB
				$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png", 'image/icon');
				$limite_kb = 512;
				if(in_array($_FILES[$imgAddressIcon]['type'],
				            $permitidos) && $_FILES[$imgAddressIcon]['size'] <= $limite_kb * 1024
				) {
					if(!file_exists($path)) {
						if(!mkdir($path, 0777, true)) {
							die("No se puedo crear el directorio");
						}
					}
					if(move_uploaded_file($_FILES[$imgAddressIcon]['tmp_name'],$path.$nameFile)) {
						$img['urlImg'] = $path.$nameFile;
					} else {
						$img['mesaje'] = "Ha ocurrido un error al subir la imagen, trate de nuevo!";
					}
				} else {
					$img['mesaje'] = "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
				}
			}
			return $img;
		}

		public static function uploadImages($path,$nameInput) {
			$img = array();
			$message='';
			if(isset($_FILES[$nameInput])) {
				$i = 0;
				foreach($_FILES[$nameInput]['error'] as $clave => $error) {
					$i++;
					if($error == UPLOAD_ERR_OK) {
						if(!isset($_FILES["img"]['name'][$clave]) || $_FILES["img"]["error"][$clave] > 0) {
							$message="no se ha enviado ninguna imagen";
						}
						else {
							//ahora vamosa verificar si el tipo de archivo es un tipo de imagen permitido.
							$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
							//y que el tamano del archivo no exceda los 16MB
							$limite_kb = 2048;
							if(in_array($_FILES[$nameInput]['type'][$clave], $permitidos) && $_FILES[$nameInput]['size'][$clave] <= $limite_kb*1024) {
								if(!file_exists($path)) {
									if(!mkdir($path, 0777, true)) {
										die("No se puedo crear el directorio");
									}
								}
								$url = $path.date("YmdHis").$i.".".substr($_FILES[$nameInput]['type'][$clave], 6);
								if(move_uploaded_file($_FILES[$nameInput]['tmp_name'][$clave], $url)) {
									array_push($img, $url);
								}
								else {
									$message= "Ha ocurrido un error al subir la imagen, trate de nuevo!";
								}
							}
							else {
								$message= "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
							}
						}
					}
				}
			}

			return array('images'=>$img,'message'=>$message);
		}
	}