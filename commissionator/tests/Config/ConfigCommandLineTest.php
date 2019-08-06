<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Config\ConfigCommandLine;

class ConfigCommandLineTest extends \PHPUnit_Framework_TestCase
{

    public $configCommandLine;

    public function setUp()
    {
        $this->configCommandLine = new ConfigCommandLine();
    }

    public function testIfConfigCommandLineExist()
    {
        $this->assertInstanceOf(ConfigCommandLine::class, $this->configCommandLine);
    }
}
