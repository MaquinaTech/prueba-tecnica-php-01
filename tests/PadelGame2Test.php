<?php

declare(strict_types=1);

namespace Sivsa\PadelGame\Tests;

use Sivsa\PadelGame\PadelGame2;

/**
 * PadelGame2 test case.
 */
class PadelGame2Test extends TestMaster
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->game = new PadelGame2('player1', 'player2');
    }

    /**
     * @dataProvider data
     */
    public function testScores(int $score1, int $score2, string $expectedResult): void
    {
        $this->seedScores($score1, $score2);
        $this->assertSame($expectedResult, $this->game->getScore());
    }
}
