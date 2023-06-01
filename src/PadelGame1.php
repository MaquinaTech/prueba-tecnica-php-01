<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

class PadelGame1 implements PadelGame
{
    private int $sc1 = 0;

    private int $sc2 = 0;

    public function __construct(
        private string $p1,
        private string $p2
    ) {
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->sc1++;
        } else {
            $this->sc2++;
        }
    }

    public function getScore(): string
    {
        
        $sc = '';

        if ($this->sc1 === $this->sc2) {
            $sc = match ($this->sc1) {
                0 => 'Love-All',
                1 => 'Fifteen-All',
                2 => 'Thirty-All',
                default => 'Deuce',
            };
        } elseif ($this->sc1 >= 4 || $this->sc2 >= 4) {
            $minor = $this->sc1 - $this->sc2;
            if ($minor == 1) {
                $sc = 'Advantage player1';
            } elseif ($minor == -1) {
                $sc = 'Advantage player2';
            } elseif ($minor >= 2) {
                $sc = 'Win for player1';
            } else {
                $sc = 'Win for player2';
            }
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i === 1) {
                    $temp = $this->sc1;
                } else {
                    $sc .= '-';
                    $temp = $this->sc2;
                }
                switch ($temp) {
                    case 0:
                        $sc .= 'Love';
                        break;
                    case 1:
                        $sc .= 'Fifteen';
                        break;
                    case 2:
                        $sc .= 'Thirty';
                        break;
                    case 3:
                        $sc .= 'Forty';
                        break;
                }
            }
        }
        return $sc;
    }
}
