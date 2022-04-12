<?php

declare(strict_types=1);

namespace kuaukutsu\polymorphism\entity;

final class BlackColor implements Color
{
    public function getColor(): string
    {
        return 'black';
    }
}
