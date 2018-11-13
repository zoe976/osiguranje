<?php
//echo 'index.php';
require 'config.php';

spl_autoload_register(function ($className) {
     if (file_exists('classes/'.$className.'.php')) {
      require_once('classes/'.$className.'.php');
    }
    else if (file_exists('Controllers/'.$className.'.php')) {
      require_once('Controllers/'.$className.'.php');
    }
});

require_once('Routes.php');



?>