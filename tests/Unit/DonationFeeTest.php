<?php

namespace Tests\Unit;

use App\DonationFee;
use ClassesWithParents\E;
use Psy\Exception\ErrorException;
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

    public function testGetAmountCollectedGetter()
    {
        // Etant donné une commission de 10% le porteur du projet reçoit un montant de 90
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appelle la méthode getAmountCollected()
        $actual = $donationFees->getAmountCollected();

        // Alors le montant perçu doit être de 90
        $expected = 90;
        $this->assertEquals($expected, $actual);
    }

    public function testCommisionPercentException()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(500, 50);

    }

    public function testDonationException()
    {
        $this->expectException(\Exception::class);
        $donationFees = new DonationFee(-10.5, 10);
    }

    public function testFixedAndCommissionAmountFeeGetter()
    {
        // Etant donné une donation de 100 et commission de 10% et un frais fixe de 50
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appelle la méthode getFixedAndCommissionAmount
        $actual = $donationFees->getFixedAndCommissionFeeAmount();

        // Alors la Valeur de la commission + les frais fixe doit être de 60
        $expected = 60;
        $this->assertEquals($expected, $actual);

    }

    public function testFixedAndCommissionFeeAmountWithLimitGetter()
    {
        // Etant donné des frais fixes constants, quelque soit le montant du don
        $donationFees = new DonationFee(50000, 10);

        // Lorsqu'on appelle la méthode getFixedAndCommissionFeeAmount
        $actual = $donationFees->getFixedAndCommissionFeeAmount();

        // La Valeur de la commission finale doit être au maximum de 5 € (500)
        $expected = 500;
        $this->assertEquals($expected, $actual);

    }

    public function testGetSummaryFailure()
    {
        // Etant donné un tableau associatif contenant 5 clés et leurs valeurs associées
        $donationFees = new DonationFee(100, 10);

        // Lorsqu'on appelle la méthode getSummary
        $actual = $donationFees->getSummary();

        // Les clés existent
        $this->assertArrayHasKey("donation",$actual);
        $this->assertArrayHasKey("fixedFee",$actual);
        $this->assertArrayHasKey("commission",$actual);
        $this->assertArrayHasKey("fixedAndCollected",$actual);
        $this->assertArrayHasKey("amountCollected",$actual);

        // Les valeurs s'affichent
        $this->assertEquals(100,$actual["donation"]);
        $this->assertEquals(50,$actual["fixedFee"]);
        $this->assertEquals(10,$actual["commission"]);
        $this->assertEquals(60,$actual["fixedAndCollected"]);
        $this->assertEquals(40,$actual["amountCollected"]);

    }

}
