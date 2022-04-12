<?php

declare(strict_types=1);

namespace kuaukutsu\polymorphism\entity;

final class YellowColor implements Color
{
    public function getColor(): string
    {
        return 'yellow';
    }
}
