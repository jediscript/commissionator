<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Config\ConfigInput;

class ConfigInputTest extends \PHPUnit_Framework_TestCase
{
    public $configInput;

    public function setUp()
    {
        $this->configInput = new ConfigInput();
    }

    public function testIfConfigInputExist()
    {
        $this->assertInstanceOf(ConfigInput::class, $this->configInput);
    }
}
