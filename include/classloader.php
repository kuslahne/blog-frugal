<?php
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

spl_autoload_register(function ($classname) {
    require 'class/'.$classname.'.php'; });

require 'vendor/autoload.php';
$db   = new Database($dsn, $db_user, $db_pass);
$view = new View();
$valid= new Valid();
$pagin= new Pagin();

// Define your configuration, if needed
$config = [];

// Configure the Environment with all the CommonMark parsers/renderers
$environment = new Environment($config);
$environment->addExtension(new CommonMarkCoreExtension());

// Add this extension
$environment->addExtension(new AttributesExtension());

// Instantiate the converter engine and start converting some Markdown!
$cebe = new MarkdownConverter($environment);
