<?php

use helpers\App;
use helpers\Container;
use helpers\Database;

$container = new Container();

$container->bind(Database::class, function () {
    return db_connect();
});


App::addContainer($container);



