<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

/**
 * Class PadelGame1
 * @package Sivsa\PadelGame
 */
class PadelGame1 implements PadelGame
{
    //Score of the players
    private int $scorePlayer1 = 0;

    private int $scorePlayer2 = 0;

    //Names of the players
    private string $player1;

    private string $player2;

    //Score descriptions
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

    /**
     * Function to add a point to a player
     * @parameters string $playerName
     * @returns void
     */
    public function wonPoint(string $playerName): void
    {
        if ($playerName === $this->player1) {
            $this->scorePlayer1++;
        } else {
            $this->scorePlayer2++;
        }
    }

    /**
     * Function to get the score
     * @returns string
     */
    public function getScore(): string
    {
        //Score
        $score = '';

        //If the score is equal
        if ($this->scorePlayer1 === $this->scorePlayer2) {
            $score = $this->handleTie();
        } elseif ($this->scorePlayer1 >= 4 || $this->scorePlayer2 >= 4) {
            //If the score is greater than 4
            $score = $this->handleAdvantageAndWin();
        } else {
            //If the score is normal
            $score = $this->handleNormalScore();
        }

        //Return the score
        return $score;
    }

    /**
     * Function to handle the tie
     * @returns string
     */
    private function handleTie(): string
    {
        $score = $this->scorePlayer1;

        if ($score >= count($this->scoreDescriptions) - 2) {
            //Return Deuce
            return $this->scoreDescriptions[4];
        }

        return $this->scoreDescriptions[$score] . '-All';
    }

    /**
     * Function to handle the advantage and win
     * @returns string
     */
    private function handleAdvantageAndWin(): string
    {
        $scoreDifference = $this->scorePlayer1 - $this->scorePlayer2;

        if (abs($scoreDifference) === 1) {
            $leadingPlayer = ($scoreDifference > 0) ? $this->player1 : $this->player2;
            return 'Advantage ' . $leadingPlayer;
        }

        $leadingPlayer = ($scoreDifference > 0) ? $this->player1 : $this->player2;
        return 'Win for ' . $leadingPlayer;
    }

    /**
     * Function to handle the normal score
     * @returns string
     */
    private function handleNormalScore(): string
    {
        $scorePlayer1 = $this->scoreDescriptions[$this->scorePlayer1];
        $scorePlayer2 = $this->scoreDescriptions[$this->scorePlayer2];

        return $scorePlayer1 . '-' . $scorePlayer2;
    }
}
