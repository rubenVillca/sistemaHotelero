<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 05/06/2017
 * Time: 17:00
 */
require_once "libs/fpdf/fpdf.php";

class PDFBill extends FPDF {
	private $check;
	private $hotel;
	private $document;
	private $listConsumeFood;
	private $listConsumeService;

	public function setCheck($check) {
		$this->check = $check;
	}

	public function setHotel($hotel) {
		$this->hotel = $hotel;
	}

	public function setDocumentPerson($document) {
		$this->document = $document;
	}

	public function setConsumeFood($listConsumeFood) {
		$this->listConsumeFood = $listConsumeFood;
	}

	public function setConsumeService($listConsumeService) {
		$this->listConsumeService = $listConsumeService;
	}

	public function printBill() {
		if(!empty($this->check)) {
			//Recibir detalles de factura
			$id_factura = 10;
			$fecha_factura = date('d-M-Y');
			//Recibir los datos de la empresa
			$name_hotel = $this->hotel['NAME_HOTEL'];
			$address_hotel = $this->hotel['ADDRESS_HOTEL'];
			$type_hotel = html_entity_decode($this->hotel['NAME_TYPE_HOTEL']);
			$date_foundation_hotel = $this->hotel['DATE_FOUNDATION_HOTEL'];
			$dominio = $this->hotel['DOMINIO_HOTEL'];
			$phone_hotel = $this->hotel['PHONE_HOTEL'];
			$email_hotel = $this->hotel['EMAIL_HOTEL'];
			$identificacion_fiscal_tienda = '';
			//Recibir los datos del cliente
			$nombre_cliente = $this->check['NAME_PERSON'];
			$apellidos_cliente = $this->check['LAST_NAME_PERSON'];
			$direccion_cliente = $this->check['ADDRESS_PERSON'];
			$city_person = $this->check['CITY_PERSON'];
			$country_person = $this->check['COUNTRY_PERSON'];
			if(!empty($this->document)) {
				$number_document = $this->document[0]['NUMBER_DOCUMENT'];
				$type_document = $this->document[0]['NAME_TYPE_DOCUMENT'];
			}
			else {
				$number_document = '';
				$type_document = '';
			}
			$identificacion_fiscal_cliente = '';
			//Recibir los datos de los productos
			$iva = 13;
			$gastos_de_envio = 0;
			$this->AddPage();//añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.
			//logo de la tienda
			$this->Image('img/system/logo.png', 0, 0, 30, 30);
			// Encabezado de la factura
			$this->SetFont('Arial', 'B', 14);
			$this->Cell(190, 10, "FACTURA", 0, 2, "C");
			$this->SetFont('Arial', 'B', 10);
			$this->MultiCell(190, 5, utf8_decode("Número de factura: $id_factura"."\n"."Fecha: $fecha_factura"), 0, "C", false);
			$this->Ln(2);
			// Datos de la tienda
			$this->SetFont('Arial', 'B', 12);
			$top_datos = 45;
			$this->SetXY(40, $top_datos);
			$this->Cell(190, 10, "Datos del Hotel:", 0, 2, "J");
			$this->SetFont('Arial', '', 9);
			$this->MultiCell(190,            //posición X
				5,            //posición Y
				utf8_decode($name_hotel."\n"."Dirección: ".$address_hotel."\n"."Tipo de hotel: ".$type_hotel."\n"."Fecha de fundación: ".$date_foundation_hotel."\n"."Página web: ".$dominio."\n"."Teléfono: ".$phone_hotel."\n"."Email: ".$email_hotel), 0,            // bordes 0 = no | 1 = si
				"J",            // texto justificado
				false);
			// Datos del cliente
			$this->SetFont('Arial', 'B', 12);
			$this->SetXY(125, $top_datos);
			$this->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
			$this->SetFont('Arial', '', 9);
			$this->MultiCell(190,            //posición X
				5,            //posicion Y
				utf8_decode("Nombre: ".$nombre_cliente."\n"."Apellidos: ".$apellidos_cliente."\n"."Dirección: ".$direccion_cliente."\n"."Ciudad: ".$city_person."\n"."País: ".$country_person."\n"."Número de documento: ".$number_document."\n"."Tipo de documento: ".$type_document), 0,            // bordes 0 = no | 1 = si
				"J",            // texto justificado
				false);
			//Salto de línea
			$this->Ln(2);
			$this->Line(20, 45, 210-20, 45); // 20mm from each edge
			$this->Line(50, 45, 210-50, 45); // 50mm from each edge
			//Creación de la tabla de los detalles de los productos productos
			$top_productos = 110;
			$this->SetXY(45, $top_productos);
			$this->Cell(40, 5, 'UNIDADES', 0, 1, 'C');
			$this->SetXY(80, $top_productos);
			$this->Cell(40, 5, 'PRODUCTOS', 0, 1, 'C');
			$this->SetXY(115, $top_productos);
			$this->Cell(40, 5, 'PRECIO', 0, 1, 'C');
			$this->Line(50, 115, 210-50, 115); // 50mm from each edge
			$precio_subtotal = 0;            // variable para almacenar el subtotal
			$y = 115;            // variable para la posición top desde la cual se empezarán a agregar los datos
			foreach($this->listConsumeFood as $consumeFood) {
				$this->SetFont('Arial', '', 8);
				$this->SetXY(45, $y);
				$this->Cell(40, 5, $consumeFood['UNIT_COST_FOOD'], 0, 1, 'C');
				$this->SetXY(80, $y);
				$this->Cell(40, 5, utf8_decode($consumeFood['NAME_FOOD']), 0, 1, 'C');
				$this->SetXY(115, $y);
				$this->Cell(40, 5, $consumeFood['PRICE_CONSUME_FOOD']." ".$consumeFood['NAME_TYPE_MONEY'], 0, 1, 'C');
				//Cálculo del subtotal
				$precio_subtotal += $consumeFood['PRICE_CONSUME_FOOD'];
				// aumento del top 5 cm
				$y = $y+5;
			}
			$this->Line(50, $y, 160, $y); // 20mm from each edge
			foreach($this->listConsumeService as $consumeService) {
				$this->SetFont('Arial', '', 8);
				$this->SetXY(45, $y);
				$this->Cell(40, 5, $consumeService['UNIT_CONSUME_SERVICE'], 0, 1, 'C');
				$this->SetXY(80, $y);
				$this->Cell(40, 5, $consumeService['NAME_SERVICE'], 0, 1, 'C');
				$this->SetXY(115, $y);
				$this->Cell(40, 5, $consumeService['PRICE_CONSUME_SERVICE']." ".$consumeService['NAME_TYPE_MONEY'], 0, 1, 'C');
				//Cálculo del subtotal
				$precio_subtotal += $consumeService['PRICE_CONSUME_SERVICE'];
				// aumento del top 5 cm
				$y = $y+5;
			}
			$this->Line(20, $y, 180, $y); // 50mm from each edge
			//Cálculo del Impuesto
			$add_iva = $precio_subtotal*$iva/100;
			//Cálculo del precio total
			$total_mas_iva = round($precio_subtotal+$add_iva+$gastos_de_envio, 2);
			$this->Ln(2);
			$this->SetFont('Arial', 'B', 10);
			$this->Cell(190, 5, "I.V.A: $iva %", 0, 1, "C");
			$this->Cell(190, 5, "Subtotal: $precio_subtotal $", 0, 1, "C");
			$this->Cell(190, 5, "TOTAL: ".$total_mas_iva." $", 0, 1, "C");
			//variable que guarda el nombre del archivo PDF
			$idCheck = $this->check['ID_CHECK'];
			$archivo = "factura-$idCheck.pdf";
			$archivo_de_salida = $archivo;
			$this->Output();//cierra el objeto pdf
			//Creacion de las cabeceras que generarán el archivo pdf
			header("Content-Type: text/html; charset=iso-8859-1 ");
			header("Content-Type: application/download");
			header("Content-Disposition: attachment; filename=$archivo");
			header("Content-Length: ".filesize("$archivo"));
			$fp = fopen($archivo, "r");
			fpassthru($fp);
			fclose($fp);
			//Eliminación del archivo en el servidor
			unlink($archivo);
		}
	}
}