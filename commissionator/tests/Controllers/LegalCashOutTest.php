<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Controllers\LegalCashOut;

class LegalCashOutTest extends \PHPUnit_Framework_TestCase
{
    public $legalCashOut;

    public function setUp()
    {
        $this->legalCashOut = new LegalCashOut();
    }

    public function testIfLegalCashOutExist()
    {
        $this->assertInstanceOf(LegalCashOut::class, $this->legalCashOut);
    }
}
