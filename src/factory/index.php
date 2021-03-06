<?php

declare(strict_types=1);

namespace kuaukutsu\polymorphism\factory;

require __DIR__ . '/../../vendor/autoload.php';

$factory = new ColorFactory();
$class = $factory->create('yellow');

echo $class->getColor() . PHP_EOL;

$class = $factory->createFromSwitch('blue');
echo $class->getColor() . PHP_EOL;
