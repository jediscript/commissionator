<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Controllers\NaturalCashIn;

class NaturalCashInTest extends \PHPUnit_Framework_TestCase
{
    public $naturalCashIn;

    public function setUp()
    {
        $this->naturalCashIn = new NaturalCashIn();
    }

    public function testIfNaturalCashInExist()
    {
        $this->assertInstanceOf(NaturalCashIn::class, $this->naturalCashIn);
    }
}
