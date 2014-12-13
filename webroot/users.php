<?php
/**
 * This is a Anax pagecontroller.
 *
 */

// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php';

// Create services and inject into the app.
$di = new \Anax\DI\CDIFactoryDefault();
$di->set('form', '\Mos\HTMLForm\CForm');

$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});


$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

$di->set('CommentController', function() use ($di) {
    $controller = new \Anax\Comment\CommentDbController();
    $controller->setDI($di);
    return $controller;
});
$di->set('statusMessage', function() use ($di) {
  $flashMessage = new \Anax\FlashingMessage\CStatusMessage($di);
  $flashMessage->setDI($di);
  return $flashMessage;
});

$app = new \Anax\Kernel\CAnax($di);

$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');

$app->session;
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_user.php');


// $app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);


$app->router->add('', function() use ($app) {

    $app->theme->setTitle("Users");

    $app->views->add('me/page', [
        'content' => "<h1 style='border: 0;'>Welcome to the user database!</h1>",
    ]);

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action' => 'view',
    ]);

});

// Finish off the page ----------------------------------------------

// Run the route handler
$app->router->handle();

// Set configuration for theme


// Set the title of the page
$app->theme->setVariable('title', "PHPMVC v2 - User database");


// Add extra styling
$app->theme->addStylesheet('css/table.css');
$app->theme->addStylesheet('../webroot/css/flash.css');

// Navigation

// Render the response using theme engine.
$app->theme->render();
