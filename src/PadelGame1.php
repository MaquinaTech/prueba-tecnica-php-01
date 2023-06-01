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

    /**
     * PadelGame1 constructor.
     * @param string $player1
     * @param string $player2
     */
    public function __construct(string $player1, string $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    /**
     * Function to add a point to a player
     * @param string $playerName
     * @return void
     */
    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->scorePlayer1++;
        } else {
            $this->scorePlayer2++;
        }
    }

    /**
     * Function to get the score
     * @return string
     */
    public function getScore(): string
    {
        //Score
        $sc = '';

        //If the score is equal
        if ($this->scorePlayer1 === $this->scorePlayer2) {
            $sc = $this->handleTie();
        } elseif ($this->scorePlayer1 >= 4 || $this->scorePlayer2 >= 4) {
            //If the score is greater than 4
            $sc = $this->handleAdvantageAndWin();
        } else {
            //If the score is normal
            $sc = $this->handleNormalScore();
        }

        //Return the score
        return $sc;
    }

    /**
     * Function to handle the tie
     * @return string
     */
    private function handleTie(): string
    {
        $scoreDescriptions = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        $score = $this->scorePlayer1;
        
        if ($score >= count($scoreDescriptions)) {
            return 'Deuce';
        }

        return $scoreDescriptions[$score] . '-All';
    }

    /**
     * Function to handle the advantage and win
     * @return string
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
     * @return string
     */
    private function handleNormalScore(): string
    {
        $scoreDescriptions = ['Love', 'Fifteen', 'Thirty', 'Forty'];
        $scorePlayer1 = $scoreDescriptions[$this->scorePlayer1];
        $scorePlayer2 = $scoreDescriptions[$this->scorePlayer2];
        
        return $scorePlayer1 . '-' . $scorePlayer2;
    }
}
