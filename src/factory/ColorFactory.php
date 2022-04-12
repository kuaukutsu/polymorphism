<?php

declare(strict_types=1);

namespace kuaukutsu\polymorphism\factory;

use InvalidArgumentException;
use kuaukutsu\polymorphism\entity\BlueColor;
use kuaukutsu\polymorphism\entity\Color;
use kuaukutsu\polymorphism\entity\YellowColor;

final class ColorFactory
{
    private const COLOR_YELLOW = 'yellow';
    private const COLOR_BLUE = 'blue';

    private array $map = [
        self::COLOR_YELLOW => YellowColor::class,
        self::COLOR_BLUE => BlueColor::class,
    ];

    public function create(string $name): Color
    {
        /** @var class-string<Color>|null $class */
        $class = $this->map[$name] ?? null;
        if ($class === null) {
            throw new InvalidArgumentException(sprintf('[%s] Color not defined.', $name));
        }

        $color = new $class();
        if ($color instanceof Color) {
            return $color;
        }

        throw new InvalidArgumentException(sprintf('[%s] name must implement Color.', $name));
    }

    public function createFromSwitch(string $name): Color
    {
        switch ($name) {
            case self::COLOR_YELLOW:
                return new YellowColor();
            case self::COLOR_BLUE:
                return new BlueColor();
        }

        throw new InvalidArgumentException(sprintf('[%s] Color not defined.', $name));
    }
}
