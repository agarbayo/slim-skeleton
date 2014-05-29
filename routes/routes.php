<?php


$app->group('/group', function() use ($container, $app) {
  
  $app->get('/test', function() use ($container, $app) {
    $reply = [];
    echo json_encode($reply);
  });

});

