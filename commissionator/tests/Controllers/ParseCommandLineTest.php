<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Controllers\ParseCommandLine;

class ParseCommandLineTest extends \PHPUnit_Framework_TestCase
{
    public $parseCommandLine;
    protected $args;

    public function setUp()
    {
        $this->parseCommandLine = new ParseCommandLine($this->args);
    }

    public function testIfParseCommandLineExist()
    {
        $this->assertInstanceOf(ParseCommandLine::class, $this->parseCommandLine);
    }
}
