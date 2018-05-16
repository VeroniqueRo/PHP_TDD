<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


class DonationFee
{

    private $donation;
    private $commissionPercentage;



    public function __construct($donation, $commissionPercentage)
    {

        if (!is_int($donation/100) || $donation < 100)
        {
            throw new \Exception('Le montant de la donnation doit être supérieure à 100');
        }
        $this->donation = $donation;

        if ($commissionPercentage <= 0 || $commissionPercentage > 30)
        {
            throw new \Exception('Le montant de la commission est invalide');
        }
        $this->commissionPercentage = $commissionPercentage;

    }

    public function getCommissionAmount()
    {
        /** @var TYPE_NAME $commission */
        $commission = $this->donation/$this->commissionPercentage;
        return $commission;
    }

    public function getAmountCollected()
    {
        $amount = $this->donation-$this->getCommissionAmount();
        return $amount;
    }



}