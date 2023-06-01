<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

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

    public function wonPoint(string $playerName): void
    {
        if ($playerName === 'player1') {
            $this->scorePlayer1++;
        } else {
            $this->scorePlayer2++;
        }
    }

    public function getScore(): string
    {
        
        $sc = '';

        //If the score is equal
        if ($this->scorePlayer1 === $this->scorePlayer2) {
            $sc = $this->handleTie();
        } elseif ($this->scorePlayer1 >= 4 || $this->scorePlayer2 >= 4) {
            $minor = $this->scorePlayer1 - $this->scorePlayer2;
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
                    $temp = $this->scorePlayer1;
                } else {
                    $sc .= '-';
                    $temp = $this->scorePlayer2;
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
}
