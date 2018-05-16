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

    /**
     * DonationFee constructor.
     * @param $donation
     * @param $commissionPercentage
     * @throws \Exception
     */
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

    /**
     * @return Montant de la commission prélevée par le site
     */
    public function getCommissionAmount()
    {
        $commission = (($this->donation/100)*$this->commissionPercentage);
        return $commission;
    }

    /**
     * @return Montant perçu par le porteur du projet
     */
    public function getAmountCollected()
    {
        $amount = $this->donation-$this->getCommissionAmount();
        return $amount;
    }

    /**
     * @return Somme des frais fixes et de la commission
     * @var $fixedAndCommission
     */
    public function getFixedAndCommissionFeeAmount()
    {
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

    /**
     * @return array Résumé des montants donnés et calculés
     * @var array $summary
     */
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