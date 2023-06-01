<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

interface PadelGame
{
    public function wonPoint(string $playerName): void;

    public function getScore(): string;
}
