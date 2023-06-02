<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

class PadelGame2 implements PadelGame
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
     * @returns void
     */
    public function __construct(string $player1, string $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    /**
     * Function to get the score
     * @returns string
     */
    public function getScore(): string
    {
        //If the score is equals and less than 4
        if ($this->isTie()) {
            return $this->handleTie();
        }
        //If the score is equals and greater than 3
        if ($this->isDeuce()) {
            //Return Deuce
            return $this->scoreDescriptions[4];
        }
        //If a player is winning or has advantage
        if ($this->isPlayerWinning()) {
            //Get the leading player
            $leadingPlayer = ($this->scorePlayer1 > $this->scorePlayer2) ? $this->player1 : $this->player2;
            //Get the score difference
            $scoreDifference = abs($this->scorePlayer1 - $this->scorePlayer2);
            //If the score difference is 1
            if ($scoreDifference === 1) {
                return 'Advantage ' . $leadingPlayer;
            }
            //If the score difference is greater than 1
            return 'Win for ' . $leadingPlayer;
        }
        //If none of the above
        $p1ScoreDescription = $this->scoreDescriptions[$this->scorePlayer1];
        $p2ScoreDescription = $this->scoreDescriptions[$this->scorePlayer2];
        //Return the score
        return $p1ScoreDescription . '-' . $p2ScoreDescription;
    }

    /**
     * Function to add a point to a player
     * @parameters string $player
     * @returns void
     */
    public function wonPoint(string $player): void
    {
        if ($player === $this->player1) {
            $this->scorePlayer1++;
        } else {
            $this->scorePlayer2++;
        }
    }

    /**
     * Function to check if the score is a tie
     * @returns bool
     */
    private function isTie(): bool
    {
        return $this->scorePlayer1 === $this->scorePlayer2 && $this->scorePlayer1 < 4;
    }

    /**
     * Function to handle the tie
     * @returns string
     */
    private function handleTie(): string
    {
        if ($this->scorePlayer1 >= count($this->scoreDescriptions) - 2) {
            return 'Deuce';
        }

        return $this->scoreDescriptions[$this->scorePlayer1] . '-All';
    }

    /**
     * Function to check if the score is a deuce
     * @returns bool
     */
    private function isDeuce(): bool
    {
        return $this->scorePlayer1 === $this->scorePlayer2 && $this->scorePlayer1 >= 3;
    }

    /**
     * Function to check if a player is winning
     * @returns bool
     */
    private function isPlayerWinning(): bool
    {
        return ($this->scorePlayer1 > $this->scorePlayer2 && $this->scorePlayer1 >= 4) || ($this->scorePlayer2 > $this->scorePlayer1 && $this->scorePlayer2 >= 4);
    }
}
