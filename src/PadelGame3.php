<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

class PadelGame3 implements PadelGame
{
    //Score of the players
    private int $scorePlayer1 = 0;

    private int $scorePlayer2 = 0;

    //Names of the players
    private string $player1;

    private string $player2;

    /**
     * PadelGame1 constructor.
     * @parameters string $player1
     * @parameters string $player2
     */
    public function __construct(string $player1, string $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function getScore(): string
    {
        if ($this->scorePlayer1 < 4 && $this->scorePlayer2 < 4 && ! ($this->scorePlayer1 + $this->scorePlayer2 === 6)) {
            $p = ['Love', 'Fifteen', 'Thirty', 'Forty'];
            $s = $p[$this->scorePlayer1];
            return ($this->scorePlayer1 === $this->scorePlayer2) ? "{$s}-All" : "{$s}-{$p[$this->scorePlayer2]}";
        }
        if ($this->scorePlayer1 === $this->scorePlayer2) {
            return 'Deuce';
        }
        $s = $this->scorePlayer1 > $this->scorePlayer2 ? $this->player1 : $this->player2;
        return (($this->scorePlayer1 - $this->scorePlayer2) * ($this->scorePlayer1 - $this->scorePlayer2) === 1) ? "Advantage {$s}" : "Win for {$s}";
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->scorePlayer1++;
        } else {
            $this->scorePlayer2++;
        }
    }
}
