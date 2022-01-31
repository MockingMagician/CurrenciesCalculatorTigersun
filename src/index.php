<?php

/**
 * @author Moreau Marc <moreau.marc.web@gmail.com>
 */

use DI\ContainerBuilder;
use Tigersun\Interview\CommandLine;

require_once __DIR__."/../vendor/autoload.php";

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__."/../config/di.php");
$containerBuilder->useAutowiring(true);
$containerBuilder->enableCompilation(__DIR__.'/../var/di-cache.php');
$container = $containerBuilder->build();

$commandLine = $container->get(CommandLine::class);
$commandLine($argv);
