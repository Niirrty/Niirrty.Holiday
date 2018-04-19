<?php


$loader = include dirname( __DIR__ ) . '/vendor/autoload.php';

$loader->add( 'Niirrty\\Holiday\\Tests', __DIR__ );
$loader->register();
