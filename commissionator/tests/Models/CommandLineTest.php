<?php
/**
 * @author Jediscript <jed.lagunday@gmail.com>
 */

namespace CommissionatorTest;

use Commissionator\Models\CommandLine;

class CommandLineTest extends \PHPUnit_Framework_TestCase
{
    public $commandLine;
    protected $args;

    public function setUp()
    {
        $this->commandLine = new CommandLine($this->args);
    }

    public function testIfCommandLineExist()
    {
        $this->assertInstanceOf(CommandLine::class, $this->commandLine);
    }
}
