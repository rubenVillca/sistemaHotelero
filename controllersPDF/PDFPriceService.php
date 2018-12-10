<?php
require_once "libs/fpdf/fpdf.php";

class PDFPriceService extends FPDF {
	var $widths;
	var $aligns;
	var $empresa;

	public function setHotel($empresa) {
		$this->empresa = $empresa;
	}

	function Header() {
		if ($this->page==1) {
			// Título
			$title = 'Lista de Precios de Servicios Disponibles';
			$this->SetTitle($title);
			$this->SetFont('Arial', 'BU', 15);
			$this->Cell(0, 10, $title, 0, 0, 'C');
			$this->Ln(10);
			$this->SetFont('Arial', '', 7);
			$this->Cell(0, 10, 'Nombre del Hotel: ' . $this->empresa['NAME_HOTEL'], 0, 2, 'L');
			$this->Cell(0, 0, 'Direccion: ' . $this->empresa['ADDRESS_HOTEL'], 0, 2, 'L');
			$this->Cell(0, 10, 'Coordenadas. Longitud:' . $this->empresa['ADDRESS_GPS_X_HOTEL'] . ', Latitud: ' . $this->empresa['ADDRESS_GPS_Y_HOTEL'], 0, 2, 'L');
			$this->Cell(0, 0, 'Correo Electronico: ' . $this->empresa['EMAIL_HOTEL'], 0, 2, 'L');
			$this->Cell(0, 10, 'Telefono: ' . $this->empresa['PHONE_HOTEL'], 0, 2, 'L');
			$this->Cell(0, 0, 'Tipo de hotel: ' . $this->empresa['NAME_TYPE_HOTEL'], 0, 2, 'L');
			// Logo
			$this->Image($this->empresa['LOGO_HOTEL'], 160, 10, 35, 25);
			$this->Line(10, 56, 200, 56);
			$this->Ln(20);// Salto de línea
		}
	}

	function Footer() {
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Número de página
		$this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
	}

	function rowHead($head) {
		$this->SetFont('Arial', 'B', 11); //cambia tipo de letra
		$nb = 0;
		for($i = 0; $i < count($head); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $head[$i]));
		}
		$h = 5*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i = 0; $i < count($head); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h);
			//Print the text
			$this->MultiCell($w, 5, $head[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function NbLines($w, $txt) {
		//Computes the number of lines a MultiCell of width w will take
		$cw =& $this->CurrentFont['cw'];
		if($w == 0) {
			$w = $this->w-$this->rMargin-$this->x;
		}
		$wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);
		if($nb > 0 and $s[$nb-1] == "\n") {
			$nb--;
		}
		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while($i < $nb) {
			$c = $s[$i];
			if($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if($c == ' ') {
				$sep = $i;
			}
			$l += $cw[$c];
			if($l > $wmax) {
				if($sep == -1) {
					if($i == $j) {
						$i++;
					}
				}
				else {
					$i = $sep+1;
				}
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			}
			else {
				$i++;
			}
		}

		return $nl;
	}

	function CheckPageBreak($h) {
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h > $this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
		}
	}

	function row($data) {
		$this->SetFont('Arial', '', 9); //cambia tipo de letra
		//Calculate the height of the row
		$nb = 0;
		for($i = 0; $i < count($data); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		}
		$h = 5*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		$this->SetFillColor(150, 125, 255);
		$this->SetTextColor(0, 0, 0);
		$this->SetDrawColor(0, 0, 255);
		//Draw the cells of the row
		for($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h);
			//Print the text
			$this->MultiCell($w, 5, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function SetWidths($w) {
		//Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a) {
		//Set the array of column alignments
		$this->aligns = $a;
	}
}