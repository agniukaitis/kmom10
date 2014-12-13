<?php

require __DIR__.'/config_with_app.php';


$app->theme->addStylesheet('../webroot/css/flash.css');

$status = new Anax\Flashingmessage\CStatusMessage($di);

$status->addDebugMessage("Debug: This is a debug message");
$status->addErrorMessage("Error: This is an error message");
$status->addWarningMessage("Warning: This is a warning message");
$status->addSuccessMessage("Success: #This is a success message");

$status->retrieveMessages();

// Prepare the page content
$app->theme->setVariable('title', "Test page for Flashingmessage")
->setVariable('main', "
<h1>Test page for Flashingmessage</h1>
<p>If four different messages how up below, it works!</p>
" . $status->messagesHtml());

// Render the response using theme engine.
$app->theme->render();
