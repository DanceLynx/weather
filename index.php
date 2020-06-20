<?php
require "./vendor/autoload.php";

use DanceLynx\Weather\Weather;
$key = 'b000b27d42c0150c51cbf3612f466cd6';

$weather = new Weather($key);

$result = $weather->getWeather('西宁','base','xml');

var_dump($result);

