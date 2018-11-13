<?php
//require "./classes/View.php";
/**
 * 
 */
class Table extends Controller
{
	public function prokazi_podatke(){
		$model = new Model;
		$podaci =$model->polise();
		$view = new View('tabela');
	    $view->set("podaci", $podaci);
	    $view->render();	
	    // echo $id;
    }
	
	
}

?>
