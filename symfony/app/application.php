#!/usr/bin/env php
<?php

date_default_timezone_set('UTC');

set_time_limit(0);

(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';


use Symfony\Component\Console\Application;


$application = new Application();

$application->run();