<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Config\ConfigCommission;

class ConfigCommissionTest extends \PHPUnit_Framework_TestCase
{
    public $configCommission;

    public function setUp()
    {
        $this->configCommission = new ConfigCommission();
    }

    public function testIfConfigCommissionExist()
    {
        $this->assertInstanceOf(ConfigCommission::class, $this->configCommission);
    }
}
