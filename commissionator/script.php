<?php
require_once 'app/start.php';

use Commissionator\Controllers\ParseCommandLine;
use Commissionator\Controllers\ParseInput;
use Commissionator\Controllers\PrintOutput;

$cmd = new ParseCommandLine($argv);
$input = new ParseInput();
$rows = $input -> parseCsv($cmd->getArgv());
$output = new PrintOutput();
$output->printOutput($rows);
