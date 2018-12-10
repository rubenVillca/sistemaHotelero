<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 05/06/2017
 * Time: 17:00
 */
require_once "libs/fpdf/fpdf.php";

class PDFCheck extends FPDF {
	private        $check;
	private        $hotel;
	private        $document;
	private        $listConsumeFood;
	private        $listConsumeService;
	private static $WITH_TEXT  =40;
	private static $HEIGHT_TEXT =5;

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
			//Recibir los datos de los productos
			$gastos_de_envio = 0;
			$this->AddPage();//añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.
			$this->cabeceraPrint();
			$top_datos = 45;
			$this->tiendaPrint($top_datos);
			$this->clientPrint($top_datos);
			//Creación de la tabla de los detalles de los productos productos
			$precio_subtotal = 0;
			$this->tableHeader();
			$y = 115;            // variable para la posición top desde la cual se empezarán a agregar los datos
			list($precio_subtotal, $y) = $this->consumeFoodPrint($y, $precio_subtotal);
			list($precio_subtotal, $y) = $this->consumeServicePrint($y, $precio_subtotal);
			//Cálculo del Impuesto
			$this->totalConsume($precio_subtotal);
			//variable que guarda el nombre del archivo PDF
			$idCheck = $this->check['ID_CHECK'];
			$archivo = "factura-$idCheck.pdf";
			$archivo_de_salida = $archivo;
			$this->Output();//cierra el objeto pdf
			//Creacion de las cabeceras que generarán el archivo pdf
			$this->seetingsFood($archivo);
		}
	}

	/**
	 * @param $fecha_factura
	 */
	private function cabeceraPrint() {
		$fecha_factura = date('d-M-Y');
		//logo de la tienda
		$this->Image('img/system/logo.png', 15, 5, 35, 35);
		// Encabezado de la factura
		$this->SetFont('Arial', 'B', 14);
		$this->Cell(190, 10, "CHECK", 0, 2, "C");
		$this->SetFont('Arial', 'B', 10);
		$this->MultiCell(190, 5, utf8_decode("Fecha de impresion: $fecha_factura"), 0, "C", FALSE);
		$this->Ln(2);
	}

	/**
	 * @param $top_datos
	 * @param $nombre_cliente
	 * @param $apellidos_cliente
	 * @param $direccion_cliente
	 * @param $city_person
	 * @param $country_person
	 * @param $number_document
	 * @param $type_document
	 */
	private function clientPrint($top_datos) {
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

		$this->SetFont('Arial', 'B', 12);
		$this->SetXY(125, $top_datos);
		$this->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
		$this->SetFont('Arial', '', 9);
		$this->MultiCell(
			190,            //posición X
			5,            //posicion Y
			utf8_decode("Nombre: " . $nombre_cliente . "\n" . "Apellidos: " . $apellidos_cliente . "\n" . "Dirección: " . $direccion_cliente . "\n" . "Ciudad: " . $city_person . "\n" . "País: " . $country_person . "\n" . "Número de documento: " . $number_document . "\n" . "Tipo de documento: " . $type_document), 0,            // bordes 0 = no | 1 = si
			"J",            // texto justificado
			FALSE
		);

		//Salto de línea
		$this->Ln(2);
		$this->Line(20, 45, 210-20, 45); // 20mm from each edge
		$this->Line(50, 45, 210-50, 45); // 50mm from each edge
	}

	/**
	 * @param $y
	 * @param $precio_subtotal
	 * @return array
	 */
	private function consumeFoodPrint($y, $precio_subtotal) {
		foreach ($this->listConsumeFood as $consumeFood) {
			$this->SetFont('Arial', '', 8);
			$this->SetXY(5, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeFood['UNIT_COST_FOOD'], 0, 1, 'C');
			$this->SetXY(30, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeFood['DATE_CONSUME_FOOD'], 0, 1, 'C');
			$this->SetXY(90, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, utf8_decode($consumeFood['NAME_FOOD']), 0, 1, 'C');
			$this->SetXY(115, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeFood['PRICE_CONSUME_FOOD'] . " " . $consumeFood['NAME_TYPE_MONEY'], 0, 1, 'C');
			$this->SetXY(150, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeFood['PAY_CONSUME_FOOD'] . " " . $consumeFood['NAME_TYPE_MONEY'], 0, 1, 'C');
			//Cálculo del subtotal
			$precio_subtotal += $consumeFood['PRICE_CONSUME_FOOD'];
			// aumento del top 5 cm
			$y = $y + 5;
		}
		return array($precio_subtotal,
		             $y);
	}

	/**
	 * @param $y
	 * @param $precio_subtotal
	 * @return array
	 */
	private function consumeServicePrint($y, $precio_subtotal) {
		foreach ($this->listConsumeService as $consumeService) {
			$this->SetFont('Arial', '', 8);
			$this->SetXY(5, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeService['UNIT_CONSUME_SERVICE'], 0, 1, 'C');
			$this->SetXY(30, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeService['DATE_START_CONSUME_SERVICE'], 0, 1, 'C');
			$this->SetXY(60, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeService['DATE_END_CONSUME_SERVICE'], 0, 1, 'C');
			$this->SetXY(90, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeService['NAME_SERVICE'], 0, 1, 'C');
			$this->SetXY(115, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeService['PRICE_CONSUME_SERVICE'] . " " . $consumeService['NAME_TYPE_MONEY'], 0, 1, 'C');
			$this->SetXY(150, $y);
			$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, $consumeService['PAY_CONSUME_SERVICE'] . " " . $consumeService['NAME_TYPE_MONEY'], 0, 1, 'C');
			//Cálculo del subtotal
			$precio_subtotal += $consumeService['PRICE_CONSUME_SERVICE'];
			// aumento del top 5 cm
			$y = $y + 5;
		}
		$this->Line(50, $y, 160, $y); // 20mm from each edge
		$this->Line(20, $y, 180, $y); // 50mm from each edge
		return array($precio_subtotal, $y);
	}

	/**
	 * @param $archivo
	 */
	private function seetingsFood($archivo) {
		header("Content-Type: text/html; charset=iso-8859-1 ");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment; filename=$archivo");
		header("Content-Length: " . filesize("$archivo"));
		$fp = fopen($archivo, "r");
		fpassthru($fp);
		fclose($fp);
		//Eliminación del archivo en el servidor
		unlink($archivo);
	}

	/**
	 * @return int
	 */
	private function tableHeader() {
		$top_productos = 110;
		$this->SetXY(5, $top_productos);
		$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, 'UNIDADES', 0, 1, 'C');
		$this->SetXY(30, $top_productos);
		$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, 'FECHA INICIO', 0, 1, 'C');
		$this->SetXY(60, $top_productos);
		$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, 'FECHA FIN', 0, 1, 'C');
		$this->SetXY(90, $top_productos);
		$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, 'PRODUCTOS', 0, 1, 'C');
		$this->SetXY(115, $top_productos);
		$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, 'PRECIO', 0, 1, 'C');
		$this->SetXY(150, $top_productos);
		$this->Cell(PDFCheck::$WITH_TEXT, PDFCheck::$HEIGHT_TEXT, 'PAGADO', 0, 1, 'C');
		$this->Line(18, 115, 180, 115); // 50mm from each edge
	}

	/**
	 * @param $name_hotel
	 * @param $address_hotel
	 * @param $type_hotel
	 * @param $date_foundation_hotel
	 * @param $dominio
	 * @param $phone_hotel
	 * @param $email_hotel
	 * @return int
	 */
	private function tiendaPrint($top_datos) {
		//Recibir los datos de la empresa
		$name_hotel = $this->hotel['NAME_HOTEL'];
		$address_hotel = $this->hotel['ADDRESS_HOTEL'];
		$type_hotel = html_entity_decode($this->hotel['NAME_TYPE_HOTEL']);
		$date_foundation_hotel = $this->hotel['DATE_FOUNDATION_HOTEL'];
		$dominio = $this->hotel['DOMINIO_HOTEL'];
		$phone_hotel = $this->hotel['PHONE_HOTEL'];
		$email_hotel = $this->hotel['EMAIL_HOTEL'];

		$this->SetFont('Arial', 'B', 12);
		$this->SetXY(40, $top_datos);
		$this->Cell(190, 10, "Datos del Hotel:", 0, 2, "J");
		$this->SetFont('Arial', '', 9);
		$this->MultiCell(
			190,            //posición X
			5,            //posición Y
			utf8_decode($name_hotel . "\n" . "Dirección: " . $address_hotel . "\n" . "Tipo de hotel: " . $type_hotel . "\n" . "Fecha de fundación: " . $date_foundation_hotel . "\n" . "Página web: " . $dominio . "\n" . "Teléfono: " . $phone_hotel . "\n" . "Email: " . $email_hotel), 0,            // bordes 0 = no | 1 = si
			"J",            // texto justificado
			FALSE
		);
	}

	/**
	 * @param $precio_subtotal
	 * @param $iva
	 */
	private function totalConsume($precio_subtotal) {
		$iva = 13;
		$add_iva = $precio_subtotal * $iva / 100;
		//Cálculo del precio total
		$this->Ln(2);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(190, 5, "Total: $precio_subtotal $", 0, 1, "C");
	}
}