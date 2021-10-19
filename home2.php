<?php
//autoloader sans composer
use App\Database;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$db  = new Database('','','','');
$datas=$db->query('SELECT NOM FROM oeuvres WHERE THEME="divers"');
var_dump($datas);//affichage du resultat

?>