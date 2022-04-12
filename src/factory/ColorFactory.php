<?php

declare(strict_types=1);

namespace kuaukutsu\polymorphism\factory;

use InvalidArgumentException;
use kuaukutsu\polymorphism\entity\BlueColor;
use kuaukutsu\polymorphism\entity\Color;
use kuaukutsu\polymorphism\entity\YellowColor;

final class ColorFactory
{
    private array $map = [
        'yellow' => YellowColor::class,
        'blue' => BlueColor::class,
    ];

    /**
     * @param string $name
     * @return Color
     */
    public function create(string $name): Color
    {
        if (isset($this->map[$name]) === false) {
            throw new InvalidArgumentException(sprintf('[%s] Color not defined.', $name));
        }

        return new $this->map[$name]();
    }
}
