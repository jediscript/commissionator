<?php
namespace Commissionator\Controllers;

use \Commissionator\Config\ConfigCommission;

class LegalCashOut
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
			ConfigCommission::LEGAL_CASH_OUT_MINIMUM,
			ConfigCommission::ROUND_PRECISION_JPY
			);
	}
	protected function transactionUsd($amount)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_USD,
			ConfigCommission::LEGAL_CASH_OUT_MINIMUM,
			ConfigCommission::ROUND_PRECISION
			);
	}
	protected function transactionEur($amount)
	{
		return $this->calculateCommission(
			$amount,
			ConfigCommission::RATE_EUR_EUR,
			ConfigCommission::LEGAL_CASH_OUT_MINIMUM,
			ConfigCommission::ROUND_PRECISION
			);
	}

	protected function calculateCommission($amount, $rate, $minimum, $precision)
	{
	    $math = new Math();

		$commission = $this->calculateCommissionValue($amount);

		if ($commission / $rate < $minimum) {
			return $math->roundUp($minimum * $rate, $precision);
		} else {
			return $math->roundUp($commission, $precision);
		}
	}
	protected function calculateCommissionValue($number)
	{
		return $number * ConfigCommission::LEGAL_CASH_OUT_PERCENTAGE / 100;
	}
}
