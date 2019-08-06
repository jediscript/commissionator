<?php
namespace Commissionator\Controllers;

use \DateTime;

class PrintOutput
{
	public function printOutput($input)
	{
        $previousWeekDay = 0;
		$previousDate = new DateTime('1900-01-01');
		$table = array();

		$legalCashOut = new LegalCashOut();
		$legalCashIn = new LegalCashIn();
		$naturalCashOut = new NaturalCashOut();
		$naturalCashIn = new NaturalCashIn();

		foreach ($input as $value) {
			$currentDate = new DateTime(date('Y-m-d', strtotime($value[0])));
			$interval = $previousDate->diff($currentDate);
			if (($previousWeekDay == 0 && date('w', strtotime($value[0])) > $previousWeekDay)
                || (date('w', strtotime($value[0])) != 0
                    && date('w', strtotime($value[0])) < $previousWeekDay)
				|| ($interval->d > 7)) {
				if (!empty($table)) {
                    unset($table);
                }
				$table = array();
			}

			$previousWeekDay = date('w', strtotime($value[0]));

			$previousDate = $currentDate;

			$discountAvailable = 3;

			$count = 0;

			foreach ($table as $discounts) {
				if($discounts['userId'] == $value[1]) {
                    $discountAvailable = $discountAvailable - $discounts['discount'];
                    if ($count > 3) {
                        $discountAvailable = 0;
                        break;
                    }
                    if ($discountAvailable < 0) {
                        $discountAvailable = 0;
                        break;
                    }
                    $count++;
                }
			}

			switch (true) {
				case ($value[2] == 'legal' && $value[3] == 'cash_out'):
				    echo $legalCashOut->transaction($value[4], $value[5]) . "\n";
				    break;
				case ($value[2] == 'legal' && $value[3] == 'cash_in'):
				    echo $legalCashIn->transaction($value[4], $value[5]) . "\n";
				    break;
				case ($value[2] == 'natural' && $value[3] == 'cash_out'):
				    echo $naturalCashOut->transaction($value[4], $value[5], $discountAvailable) . "\n";
                    if ($discountAvailable > 0) {
                        if ($naturalCashOut->transaction($value[4], $value[5], $discountAvailable) > 0) {
                            $discount = 3;
                        } else {
                            $discount=$naturalCashOut->calculateCommissionValue($value[4]);
                            $discount=$naturalCashOut->discount($discount, $value[5]);
                        }
                        $transaction = array(
                                'userId' =>  $value[1],
                                'discount' =>  $discount,
                        );
                        array_push($table, $transaction);
                    }
				    break;
				case ($value[2] == 'natural' && $value[3] == 'cash_in'):
				    echo $naturalCashIn->transaction($value[4], $value[5]) . "\n";
				    break;
				default:
				    var_dump($value);
				    break;
			}
		}
	}
}
