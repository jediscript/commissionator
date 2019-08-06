<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Controllers\Math;

class MathTest extends \PHPUnit_Framework_TestCase
{
    public $math;

    public function setUp()
    {
        $this->math = new Math();
    }

    public function testIfMathExist()
    {
        $this->assertInstanceOf(Math::class, $this->math);
    }
}
