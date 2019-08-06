<?php


namespace CommissionatorTest;

use Commissionator\Controllers\LegalCashIn;

class LegalCashInTest extends \PHPUnit_Framework_TestCase
{
    public $legalCashIn;

    public function setUp()
    {
        $this->legalCashIn = new LegalCashIn();
    }

    public function testIfLegalCashInExist()
    {
        $this->assertInstanceOf(LegalCashIn::class, $this->legalCashIn);
    }
}
