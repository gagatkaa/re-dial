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
  ),
  'idea1' => array(
    'controller' => 'Content',
    'action' => 'idea1'
  ),
  'stories' => array(
    'controller' => 'Content',
    'action' => 'stories'
  ),
  'challenge_CTA' => array(
    'controller' => 'Content',
    'action' => 'challengeCTA'
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
