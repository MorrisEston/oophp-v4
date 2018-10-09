<?php

namespace Morris\Dice;

class DiceOneHundred extends CreateDie
{
    public $playerScore;
    public $computerScore;
    public $tempScore;
    public $diceSerie = [];

    public function rollDices()
    {
        for ($i=0; $i < 2; $i++) {
            $this->diceSerie[] = parent::getDice();
        }
        var_dump($this->diceSerie);
    }

    public function getDices()
    {
        return $this->diceSerie[0] . " and " . $this->diceSerie[1];
    }

    public function saveRound($player)
    {
        $this->tempScore += array_sum($this->diceSerie);
        var_dump(array_sum($this->diceSerie));

        if ($player == "player") {
            echo "skrrr player";
            $this->playerScore = $this->tempScore;
        } elseif ($player == "computer") {
            $this->computerScore = $this->tempScore;
        }
        var_dump($this->playerScore);
    }

    public function resetTempScore()
    {
        $this->tempScore = 0;
    }

    public function resetPlayersScore()
    {
        $this->playerScore = 0;
        $this->computerScore = 0;
    }

    public function getScore($which)
    {
        if ($which == "player") {
            return $this->playerScore;
        } elseif ($which == "computer") {
            return $this->computerScore;
        } elseif ($which == "temp") {
            return $this->tempScore;
        }
    }
}
