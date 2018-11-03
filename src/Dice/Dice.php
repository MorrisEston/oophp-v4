<?php

namespace Morris\Dice;

/**
 * Dice class for dice100 game.
 */
class Dice extends CreateDie
{
    /**
     * @var int $whatIf       Var to check which IF-statement to enter.
     * @var int $score        Var to keep track of the players score.
     * @var int $tempVar      Temporary variable used for storing a temporary value
     */

    private $whatIf;
    private $score;
    public $tempVar;

    /**
     * Set function to set var whatIf..
     */
    public function setIf($arg)
    {
        $this->whatIf = $arg;
    }

    /**
     * Get function to get whatIf.
     */
    public function getIf()
    {
        return $this->whatIf;
    }

    /**
     * get function to get player score.
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * set function to get player score.
     */
    public function setScore()
    {
        $this->score += $this->tempVar;
    }

    /**
     * get function to get temp score.
     */
    public function getTempVar()
    {
        return $this->tempVar;
    }

    /**
     * set function to set temp score.
     */
    public function setTempVar($score)
    {
        $this->tempVar = $score;
    }

    /**
     * set function to set temp score to zero.
     */
    public function setTempVarToZero()
    {
        $this->tempVar = 0;
    }
}
