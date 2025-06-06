<?php
// set routes
$routes = array(
  'home' => array(
    'controller' => 'Content',
    'action' => 'home'
  ),
  'form' => array(
    'controller' => 'Content',
    'action' => 'form'
  )


  // 'api-create-pizza' => array(
  //   'controller' => 'Pizza',
  //   'action' => 'apiCreate'
  // )
);

if (empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if (empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
