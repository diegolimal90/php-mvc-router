<?php
//define diretorio raiz
define('APP_ROOT', 'framework');
use lib\System;
require_once 'helper/Bootstrap.php';



$system = new System();

$system->run();