<?php

declare(strict_types=1);

namespace Sivsa\PadelGame;

class PadelGame2 implements PadelGame
{
    private int $scorePlayer1 = 0;

    private int $scorePlayer2 = 0;

    private string $resultPlayer1 = '';

    private string $resultPlayer2 = '';

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
        $sc = '';
        //If the score is equals and less than 4
        if ($this->isTie()) {
            return $this->handleTie();
        }
        //If the score is equals and greater than 3
        if ($this->isDeuce()) {
            $sc = 'Deuce';
        }

        if ($this->scorePlayer1 > 0 && $this->scorePlayer2 === 0) {
            if ($this->scorePlayer1 === 1) {
                $this->resultPlayer1 = 'Fifteen';
            }
            if ($this->scorePlayer1 === 2) {
                $this->resultPlayer1 = 'Thirty';
            }
            if ($this->scorePlayer1 === 3) {
                $this->resultPlayer1 = 'Forty';
            }

            $this->resultPlayer2 = 'Love';
            $sc = "{$this->resultPlayer1}-{$this->resultPlayer2}";
        }

        if ($this->scorePlayer2 > 0 && $this->scorePlayer1 === 0) {
            if ($this->scorePlayer2 === 1) {
                $this->resultPlayer2 = 'Fifteen';
            }
            if ($this->scorePlayer2 === 2) {
                $this->resultPlayer2 = 'Thirty';
            }
            if ($this->scorePlayer2 === 3) {
                $this->resultPlayer2 = 'Forty';
            }
            $this->resultPlayer1 = 'Love';
            $sc = "{$this->resultPlayer1}-{$this->resultPlayer2}";
        }

        if ($this->scorePlayer1 > $this->scorePlayer2 && $this->scorePlayer1 < 4) {
            if ($this->scorePlayer1 === 2) {
                $this->resultPlayer1 = 'Thirty';
            }
            if ($this->scorePlayer1 === 3) {
                $this->resultPlayer1 = 'Forty';
            }
            if ($this->scorePlayer2 === 1) {
                $this->resultPlayer2 = 'Fifteen';
            }
            if ($this->scorePlayer2 === 2) {
                $this->resultPlayer2 = 'Thirty';
            }
            $sc = "{$this->resultPlayer1}-{$this->resultPlayer2}";
        }

        if ($this->scorePlayer2 > $this->scorePlayer1 && $this->scorePlayer2 < 4) {
            if ($this->scorePlayer2 === 2) {
                $this->resultPlayer2 = 'Thirty';
            }
            if ($this->scorePlayer2 === 3) {
                $this->resultPlayer2 = 'Forty';
            }
            if ($this->scorePlayer1 === 1) {
                $this->resultPlayer1 = 'Fifteen';
            }
            if ($this->scorePlayer1 === 2) {
                $this->resultPlayer1 = 'Thirty';
            }
            $sc = "{$this->resultPlayer1}-{$this->resultPlayer2}";
        }

        if ($this->scorePlayer1 > $this->scorePlayer2 && $this->scorePlayer2 >= 3) {
            $sc = 'Advantage player1';
        }

        if ($this->scorePlayer2 > $this->scorePlayer1 && $this->scorePlayer1 >= 3) {
            $sc = 'Advantage player2';
        }

        if ($this->scorePlayer1 >= 4 && $this->scorePlayer2 >= 0 && ($this->scorePlayer1 - $this->scorePlayer2) >= 2) {
            $sc = 'Win for player1';
        }

        if ($this->scorePlayer2 >= 4 && $this->scorePlayer1 >= 0 && ($this->scorePlayer2 - $this->scorePlayer1) >= 2) {
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

    private function p1Sc(): void
    {
        $this->scorePlayer1++;
    }

    private function P2Score(): void
    {
        $this->scorePlayer2++;
    }
}
