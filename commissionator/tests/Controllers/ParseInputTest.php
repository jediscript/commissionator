<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Controllers\ParseInput;

class ParseInputTest extends \PHPUnit_Framework_TestCase
{
    public $parseInput;

    public function setUp()
    {
        $this->parseInput = new ParseInput();
    }

    public function testIfParseInputExist()
    {
        $this->assertInstanceOf(ParseInput::class, $this->parseInput);
    }
}
