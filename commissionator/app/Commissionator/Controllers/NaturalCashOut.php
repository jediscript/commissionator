<?php
namespace Commissionator\Controllers;

use \Commissionator\Config\ConfigCommission;

class NaturalCashOut
{
    public $math;

    public function __construct()
    {
        $this->math = new Math();
    }

    public function transaction($amount, $currency, $discountAvailable)
	{
		switch($currency)
		{
			case 'JPY':
			return $this->transactionJpy($amount, $discountAvailable);
			break;
			case 'USD':
			return $this->transactionUsd($amount, $discountAvailable);
			break;			
			default:
			return $this->transactionEur($amount, $discountAvailable);
			break;
			break;
		}
	}
	public function discount($discount,$currency)
	{
		switch($currency)
		{
			case 'JPY':
			return $this->math->roundUp(
				$discount/ConfigCommission::RATE_EUR_JPY,
				ConfigCommission::ROUND_PRECISION
				);
			break;
			case 'USD':
			return $this->math->roundUp(
				$discount/ConfigCommission::RATE_EUR_USD,
				ConfigCommission::ROUND_PRECISION
				);
			break;
			default:
			return $this->math->roundUp(
				$discount/ConfigCommission::RATE_EUR_EUR,
				ConfigCommission::ROUND_PRECISION
				);
			break;	

		}
	}
	protected function transactionJpy($amount, $discountAvailable)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_JPY,
			$discountAvailable,
			ConfigCommission::ROUND_PRECISION_JPY
			);
	}
	protected function transactionUsd($amount, $discountAvailable)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_USD,
			$discountAvailable,
			ConfigCommission::ROUND_PRECISION
			);	
	}
	protected function transactionEur($amount, $discountAvailable)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_EUR,
			$discountAvailable,
			ConfigCommission::ROUND_PRECISION
			);
	}

	protected function calculateCommission($amount, $rate, $discountAvailable, $precision)
	{
	    $math = new Math();

		$commision = $this->calculateCommissionValue($amount);
		if($discountAvailable>0)
		{
			if($commision-$discountAvailable*$rate<0)
			{
				return $math->roundUp(
					0,
					$precision
				);
			}
			else
			{
				return $math->roundUp(
					$commision-$discountAvailable*$rate,
					$precision
				);
			}

		}
		else
		{
			return $math->roundUp(
				$commision,
				$precision
			);
		}
	}
	public function calculateCommissionValue($number)
	{
		return $number*ConfigCommission::NATURAL_CASH_OUT_PERCENTAGE/100;
	}
}
