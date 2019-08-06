<?php
namespace Commissionator\Controllers;

use \Commissionator\Config\ConfigCommission;

class NaturalCashIn
{
	public function transaction($amount,$currency)
	{
		switch ($currency) {
			case 'JPY':
			    return $this->transactionJpy($amount);
			    break;
			case 'USD':
			    return $this->transactionUsd($amount);
			    break;
			default:
			    return $this->transactionEur($amount);
			    break;
		}
	}
	protected function transactionJpy($amount)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_JPY,
			ConfigCommission::NATURAL_CASH_IN_MAXIMUM,
			ConfigCommission::ROUND_PRECISION_JPY
			);
	}
	protected function transactionUsd($amount)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_USD,
			ConfigCommission::NATURAL_CASH_IN_MAXIMUM,
			ConfigCommission::ROUND_PRECISION
			);	
	}
	protected function transactionEur($amount)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_EUR,
			ConfigCommission::NATURAL_CASH_IN_MAXIMUM,
			ConfigCommission::ROUND_PRECISION
			);
	}

	protected function calculateCommission($amount, $rate, $maximum, $precision)
	{
	    $math = new Math();

		$commission = $this->calculateCommissionValue($amount);

		if ($commission/$rate>$maximum) {
			return $math->roundUp($maximum * $rate, $precision);
		} else {
			return $math->roundUp($commission, $precision);
		}
	}
	protected function calculateCommissionValue($number)
	{
		return $number * ConfigCommission::NATURAL_CASH_IN_PERCENTAGE / 100;
	}
}
