<?php

/**
 * 
 */
class Forma extends Controller
{
	public function dodaj($r)
	{

		$this->test_input($r["osiguranje"]);
		$this->test_input($r["pocetak_putovanja"]);
		$this->test_input($r["kraj_putovanja"]);
		$this->test_input($r["ime_nosilac"]);
		$this->test_input($r["prezime_nosilac"]);
		$this->test_input($r["telefon_nosilac"]);
		$this->test_input($r["email_nosilac"]);
		$this->test_input($r["datum_rodjenja_nosilac"]);

		$model = new Model;
		$polisa_id = $model->dodajPolisu($r["osiguranje"],$r["pocetak_putovanja"],$r["kraj_putovanja"]);
		$nosilac_osiguranja_id = $model->dodajKorisnika($r["ime_nosilac"], $r["prezime_nosilac"], $r["telefon_nosilac"], $r["email_nosilac"], $r["datum_rodjenja_nosilac"]);

		$model->korisnik_polisa($nosilac_osiguranja_id, $polisa_id, 1);


		if(isset($r['osiguranik']))
		{
			foreach ($r['osiguranik'] as $key => $value) {
				//echo($value[0]."</br>");
				//echo($value[1]."</br>");
				//echo($value[2]."</br>");
				$this->test_input($value[0]);
				$this->test_input($value[1]);
				$this->test_input($value[2]);
				$this->test_input($value[3]);
				$korisnik_osiguranja_id=$model->dodajKorisnika($value[0], $value[1], null, $value[2], $value[3]);
				$model->korisnik_polisa($korisnik_osiguranja_id, $polisa_id, 0);	
			}
			
		}

		$this->posaljiPDFMailom($polisa_id);

		echo json_encode(["status" => 1]);
    }

	  private  function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}

	public function posaljiPDFMailom($id) 
	{
		$model = new Model;
		$nosilac = $model->nosilac_polisa($id);
		$odsiguranici = $model->osiguranici_polisa($id);
		//var_dump ($podaci[0]);
		//var_dump ($podaci1);

		$pdf = new ZPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		foreach ($nosilac[0] as $key => $value) {
		    $pdf->Cell(0,10,$key.": ".$value,1,1);
		}

		for ($i =0;$i<count($odsiguranici);$i++) {

		    foreach ($odsiguranici[$i] as $key => $value) {
		        $pdf->Cell(0,10,$key.": ".$value,1,1);
		    }
		}

		$attachment = './public/pdf/'.$id.'.pdf';

		$pdf->Output('F', $attachment);

		$mail = new ZMail;

		$to=$nosilac[0]['email'];

		$from = 'noreplay@osiguranje.com';

		$message = 'Polisa vaseg osiguranja je u attachment-u.';
		$subject = 'Polisa osiguranja';

		$mail->posljiMail($to, $from, $subject, $message, $attachment);


	}

}

?>