<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Controllers\PrintOutput;

class PrintOutputTest extends \PHPUnit_Framework_TestCase
{
    public $printOutput;

    public function setUp()
    {
        $this->printOutput = new PrintOutput();
    }

    public function testIfPrintOutputExist()
    {
        $this->assertInstanceOf(PrintOutput::class, $this->printOutput);
    }
}
