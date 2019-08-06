<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Controllers\NaturalCashOut;

class NaturalCashOutTest extends \PHPUnit_Framework_TestCase
{
    public $naturalCashOut;

    public function setUp()
    {
        $this->naturalCashOut = new NaturalCashOut();
    }

    public function testIfNaturalCashOutExist()
    {
        $this->assertInstanceOf(NaturalCashOut::class, $this->naturalCashOut);
    }
}
