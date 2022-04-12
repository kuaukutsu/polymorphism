<?php

declare(strict_types=1);

namespace kuaukutsu\polymorphism\di;

use DI\Container;
use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Exception;
use kuaukutsu\polymorphism\entity\Color;
use kuaukutsu\polymorphism\entity\YellowColor;
use function DI\create;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $class = getContainer()->get(Color::class);
} catch (DependencyException | NotFoundException | Exception $e) {
    echo $e->getMessage();
    exit(0);
}

echo $class->getColor() . PHP_EOL;

/**
 * @return Container
 * @throws Exception
 */
function getContainer(): Container
{
    $builder = new ContainerBuilder();
    $builder->addDefinitions(
        [
            Color::class => create(YellowColor::class)
        ]
    );

    return $builder->build();
}
