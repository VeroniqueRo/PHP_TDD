<?php

namespace Tests\Unit;

use App\DonationFee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DonationFeeTest extends TestCase
{

//    public $donation = 100;
//    public $commissionPercentage = 10;


    /**
     * Test de la commission prélevée par le site.
     *
     * @throws \Exception
     */
    public function testCommissionAmountGetter()
    {
        // Etant donné une donation de 100 et commission de 10%
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appelle la méthode getCommissionAmount()
        $actual = $donationFees->getCommissionAmount();

        // Alors la Valeur de la commission doit être de 10
        $expected = 10;
        $this->assertEquals($expected, $actual);

    }

    /**
     * @param $result
     */
    public function testgetAmountCollectedGetter()
    {
        // Etant donné une commission de 10% le porteur du projet reçoit un montant de 90
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appelle la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();

        // Alors le montant perçu doit être de 90
        $expected = 90;
        $this->assertEquals($expected, $actual);

    }

}
