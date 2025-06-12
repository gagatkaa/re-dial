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
  'tool1' => array(
    'controller' => 'Content',
    'action' => 'tool1'
  ),
  'tool2' => array(
    'controller' => 'Content',
    'action' => 'tool2'
  ),
  'tool3' => array(
    'controller' => 'Content',
    'action' => 'tool3'
  ),
  'stories' => array(
    'controller' => 'Content',
    'action' => 'stories'
  ),
  'challenge_CTA' => array(
    'controller' => 'Content',
    'action' => 'challengeCTA'
  ),

  'api-add-story' => array(
    'controller' => 'Content',
    'action' => 'apiAddStory'
  )
);

if (empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if (empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
