<?php

namespace Morris\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class ExampleTest extends TestCase
{
    /**
     * Just assert something is true.
     */
    public function testTrue()
    {
        $this->assertTrue(true);
    }

    /**
     * Test for SetCount().
     */
    public function testSetIf()
    {
        $dice = new Dice();
        $this->assertEquals($dice->getIf(), $dice->setIf(0));
    }

    /**
    * Test for getCount().
    */
    public function testGetIf()
    {
        $dice = new Dice();
        $this->assertEquals($dice->getScore(), $dice->setScore(0));
    }

    /**
    * Test for getPlayerScore().
    */
    public function testGetScore()
    {
        $dice = new Dice();
        $this->assertEquals($dice->getScore(), $dice->setScore(0));
    }

    /**
     * Test for setPlayerScore().
     */
    public function testSetScore()
    {
        $dice = new Dice();
        $this->assertEquals($dice->getScore(), $dice->setScore(0));
    }

    /**
    * Test for getTempScore().
    */
    public function testGetTempVar()
    {
        $dice = new Dice();
        $this->assertEquals($dice->getTempVar(), $dice->setTempVar(0));
    }

    /**
     * Test for setTempScore().
     */
    public function testSetTempVar()
    {
        $dice = new Dice();
        $this->assertEquals($dice->getTempVar(), $dice->setTempVar(0));
    }

    /**
     * Test for setTempScoreToZero().
     */
    public function testSetTempVarToZero()
    {
        $dice = new Dice();
        $this->assertEquals($dice->getScore(), $dice->setTempVarToZero(0));
    }
}
