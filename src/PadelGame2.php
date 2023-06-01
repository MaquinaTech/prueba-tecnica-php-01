<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

class PadelGame2 implements PadelGame
{
    private int $p1P = 0;

    private int $p2P = 0;

    private string $p1R = '';

    private string $p2R = '';

    public function __construct(
        private string $p1,
        private string $p2
    ) {
    }

    public function getScore(): string
    {
        $sc = '';
        if ($this->p1P === $this->p2P && $this->p1P < 4) {
            if ($this->p1P === 0) {
                $sc = 'Love';
            }
            if ($this->p1P === 1) {
                $sc = 'Fifteen';
            }
            if ($this->p1P === 2) {
                $sc = 'Thirty';
            }
            $sc .= '-All';
        }

        if ($this->p1P === $this->p2P && $this->p1P >= 3) {
            $sc = 'Deuce';
        }

        if ($this->p1P > 0 && $this->p2P === 0) {
            if ($this->p1P === 1) {
                $this->p1R = 'Fifteen';
            }
            if ($this->p1P === 2) {
                $this->p1R = 'Thirty';
            }
            if ($this->p1P === 3) {
                $this->p1R = 'Forty';
            }

            $this->p2R = 'Love';
            $sc = "{$this->p1R}-{$this->p2R}";
        }

        if ($this->p2P > 0 && $this->p1P === 0) {
            if ($this->p2P === 1) {
                $this->p2R = 'Fifteen';
            }
            if ($this->p2P === 2) {
                $this->p2R = 'Thirty';
            }
            if ($this->p2P === 3) {
                $this->p2R = 'Forty';
            }
            $this->p1R = 'Love';
            $sc = "{$this->p1R}-{$this->p2R}";
        }

        if ($this->p1P > $this->p2P && $this->p1P < 4) {
            if ($this->p1P === 2) {
                $this->p1R = 'Thirty';
            }
            if ($this->p1P === 3) {
                $this->p1R = 'Forty';
            }
            if ($this->p2P === 1) {
                $this->p2R = 'Fifteen';
            }
            if ($this->p2P === 2) {
                $this->p2R = 'Thirty';
            }
            $sc = "{$this->p1R}-{$this->p2R}";
        }

        if ($this->p2P > $this->p1P && $this->p2P < 4) {
            if ($this->p2P === 2) {
                $this->p2R = 'Thirty';
            }
            if ($this->p2P === 3) {
                $this->p2R = 'Forty';
            }
            if ($this->p1P === 1) {
                $this->p1R = 'Fifteen';
            }
            if ($this->p1P === 2) {
                $this->p1R = 'Thirty';
            }
            $sc = "{$this->p1R}-{$this->p2R}";
        }

        if ($this->p1P > $this->p2P && $this->p2P >= 3) {
            $sc = 'Advantage player1';
        }

        if ($this->p2P > $this->p1P && $this->p1P >= 3) {
            $sc = 'Advantage player2';
        }

        if ($this->p1P >= 4 && $this->p2P >= 0 && ($this->p1P - $this->p2P) >= 2) {
            $sc = 'Win for player1';
        }

        if ($this->p2P >= 4 && $this->p1P >= 0 && ($this->p2P - $this->p1P) >= 2) {
            $sc = 'Win for player2';
        }

        return $sc;
    }

    public function wonPoint(string $player): void
    {
        if ($player === 'player1') {
            $this->p1Sc();
        } else {
            $this->P2Score();
        }
    }

    private function SetP1Score(int $number): void
    {
        for ($i = 0; $i < $number; $i++) {
            $this->p1Sc();
        }
    }

    private function SetP2Score(int $number): void
    {
        for ($i = 0; $i < $number; $i++) {
            $this->P2Score();
        }
    }

    private function p1Sc(): void
    {
        $this->p1P++;
    }

    private function P2Score(): void
    {
        $this->p2P++;
    }
}
