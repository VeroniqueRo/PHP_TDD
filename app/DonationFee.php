<?php
/**
 * Created by PhpStorm.
 * User: laurentbeauvisage
 * Date: 07/05/2018
 * Time: 14:07
 */

namespace App;


use App\Providers\Commission;

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
        $commission = (($this->donation/100)*$this->commissionPercentage);
        return $commission;
    }

    public function getAmountCollected()
    {
        $amount = $this->donation-$this->getCommissionAmount();
        return $amount;
    }

    public function getFixedAndCommissionFeeAmount()
    {
        /** @var TYPE_NAME $commission */
        $fixedAndCommission = ($this->getCommissionAmount())+Commission::fixedFee;

        if ($fixedAndCommission < 500)
        {
            $fixedAndCommission = ($this->getCommissionAmount())+Commission::fixedFee;

        } else  {

            $fixedAndCommission = 500;
        }
        echo "\nSi le montant de la commission variable est de ".($this->getCommissionAmount()/100)." Euros";
        echo "\nEt les frais fixes de ".(Commission::fixedFee/100)." Euros";
        echo "\nAlors le montant de la commission finale est de ".($fixedAndCommission/100)." Euros\n";
        return $fixedAndCommission;
    }

    public function getSummary()
    {
        $summary = array (
            "donation" => $this->donation,
            "fixedFee" => Commission::fixedFee,
            "commission" => $this->getCommissionAmount(),
            "fixedAndCollected" => $this->getFixedAndCommissionFeeAmount(),
            "amountCollected" => $this->donation-$this->getFixedAndCommissionFeeAmount()
        );
        echo "\nValeurs du tableau Summary \n";
        foreach ($summary as $key => $value)
        {
            echo "Clé : ". $key . " | Valeur : ". $value . " \n";

        }

        return $summary;

    }

}