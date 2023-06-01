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
     * Score descriptions
     * @var string[]
     */
    private array $scoreDescriptions = ['Love', 'Fifteen', 'Thirty', 'Forty', 'Deuce'];

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
        //If the score is normal
        if ($this->isNormalScore()) {
            //Get the score description
            $scorePlayer1 = $this->scoreDescriptions[$this->scorePlayer1];
            $scorePlayer2 = $this->scoreDescriptions[$this->scorePlayer2];

            return ($this->scorePlayer1 === $this->scorePlayer2) ? "{$scorePlayer1}-All" : "{$scorePlayer1}-{$scorePlayer2}";
        }
        //If the score is a tie
        if ($this->isDeuce()) {
            return 'Deuce';
        }
        //If a player is winning or has advantage
        $leadingPlayer = ($this->scorePlayer1 > $this->scorePlayer2) ? $this->player1 : $this->player2;
        $scoreDifference = abs($this->scorePlayer1 - $this->scorePlayer2);

        return ($scoreDifference === 1) ? "Advantage {$leadingPlayer}" : "Win for {$leadingPlayer}";
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->scorePlayer1++;
        } else {
            $this->scorePlayer2++;
        }
    }

    /**
     * Function to check if the score is normal
     * @returns bool
     */
    private function isNormalScore(): bool
    {
        return $this->scorePlayer1 < 4 && $this->scorePlayer2 < 4 && ! ($this->scorePlayer1 + $this->scorePlayer2 === 6);
    }

    /**
     * Function to check if the score is a deuce
     * @returns bool
     */
    private function isDeuce(): bool
    {
        return $this->scorePlayer1 === $this->scorePlayer2;
    }
}
