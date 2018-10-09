<?php

namespace Morris\Dice;

/**
 * A class for the game Dice100
 */
class CreateDie
{
    /**
     * @var int $dice          store dice for the game.
     */

    public $dice;

    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the number.
     *
     * @param int $dice The current dice, default rand(1, 6)
     */

    public function __construct()
    {
        $this->dice = rand(1, 6);
    }


    /**
     * get function to get $dice.
     */
    public function getDice()
    {
        return $this->dice;
    }
}
