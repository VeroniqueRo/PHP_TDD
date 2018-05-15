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
        $this->donation = $donation;
        $this->commissionPercentage = $commissionPercentage;
    }

    /**
     * @return float|int
     */
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