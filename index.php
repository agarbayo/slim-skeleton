<?php
require_once('vendor/autoload.php');

$app = new \Slim\Slim(array(
    'debug'       => true,
    'log.enabled' => true,
    'log.level'   => \Slim\Log::DEBUG,
));


$container = new \PimpleContainers\AutowiredContainer();

// Init logger
$log = new \Monolog\Logger('slim-skeleton');
$log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
$container['Logger'] = $log;

// Init Routes
$pathRoutes = 'src/routes/';
$routeFiles = array_diff(scandir($pathRoutes), array('..', '.'));
foreach ($routeFiles as $routeFile) {
  require($pathRoutes . $routeFile);
}

$app->run();
