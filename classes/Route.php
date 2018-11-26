<?php

/**
 * 
 */
class Route
{

	private $_listGet = array();
	private $_listPost = array();


	public function addGet($route, $dest)
	{
		$route = ltrim($route, '/');
		$this->_listGet[$route]=$dest;
	}

	public function addPost($route, $dest)
	{
		$route = ltrim($route, '/');
		$this->_listPost[$route]=$dest;
	}

	public function ispisi_rute()
	{
		print_r($this->_listGet);
		print_r($this->_listPost);
	}


	public function dispatch()
	{
		global $url;
		$dest='';
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$route = $_SERVER['REQUEST_URI'];
			$route = ltrim($route, '/');
			//print_r($route."</br>");
			//print_r($_GET['url']."</br>");
			//$url = $_GET['url'];
			$U = explode('/', $url);
			$R = explode('/', $route);

			foreach ($this->_listGet as $key => $value) 
			{
				$K = explode('/', $key);
				if($K[0] === $R[0])
				{
					//echo $R[0]."</br>";
					//echo $U[0]."</br>";
					$dest = $value;
					if ($R[0] === $U[0])
					{
						//echo count($U)."</br>";
						//echo count($R)."</br>";
						if (count($U) == count($R)) 
						{
							// rasturamo dest na clanove po @
							$D = explode('@', $dest); // $D sadrzi razdvojene delove dest-a. $D[0] je ime kontrolera, $D[1] je ime metode
							$K = new $D[0];
							array_shift($U);
							//exit();

							call_user_func_array(array($K, $D[1]), $U);
							return true;
						} 
					}
				}

			}
			return false;

		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//print_r( $_POST);

			$route = $_SERVER['REQUEST_URI'];
			$route = ltrim($route, '/');
			//print_r($route."</br>");
			//print_r($_GET['url']."</br>");
			//$url = $_GET['url'];
			$U = explode('/', $url);
			$R = explode('/', $route);

			foreach ($this->_listPost as $key => $value) {
				//echo $key."</br>";
				//echo $value."</br>";
				if($key === $route)
				{
					$dest = $value;
					if ($route === $url)
					{
						$D = explode('@', $dest); // $D sadrzi razdvojene delove dest-a. $D[0] je ime kontrolera, $D[1] je ime metode
						$K = new $D[0];
						call_user_func(array($K, $D[1]), $_POST);
						return true;
					}
				}
			}
			return false;
		}
	}


}

?>