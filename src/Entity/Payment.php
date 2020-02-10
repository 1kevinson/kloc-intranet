<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaymentRepository")
 */
class Payment
{

    #region constantes
    const PERIOD_JANUARY        =  'JANUARY';
    const PERIOD_FEBRUARY       =  'FEBRUARY';
    const PERIOD_MARCH          =  'MARCH';
    const PERIOD_APRIL          =  'APRIL';
    const PERIOD_MAY            =  'MAY';
    const PERIOD_JUNE           =  'JUNE';
    const PERIOD_JULY           =  'JULY';
    const PERIOD_AUGUST         =  'AUGUST';
    const PERIOD_SEPTEMBER      =  'SEPTEMBER';
    const PERIOD_OCTOBER        =  'OCTOBER';
    const PERIOD_NOVEMBER       =  'NOVEMBER';
    const PERIOD_DECEMBER       =  'DECEMBER';


    const NOT_PAID              = 'NOT_PAID';
    const PARTIALLY_PAID        = 'PARTIALLY_PAID';
    const FULLY_PAID            = 'FULLY_PAID';
    #endregion

    #region properties
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $period;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $payment_status;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $payment_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Owner", inversedBy="payment")
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Tenant", inversedBy="payment")
     */
    private $tenant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="payment")
     */
    private $room;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Receipt" , inversedBy="payment")
     */
    private $receipt;

    private $annualPeriod = [
        self::PERIOD_JANUARY,
        self::PERIOD_FEBRUARY,
        self::PERIOD_MARCH,
        self::PERIOD_APRIL,
        self::PERIOD_MAY ,
        self::PERIOD_JUNE,
        self::PERIOD_JULY ,
        self::PERIOD_AUGUST ,
        self::PERIOD_SEPTEMBER,
        self::PERIOD_OCTOBER,
        self::PERIOD_NOVEMBER,
        self::PERIOD_DECEMBER
    ];

    private $paidStatus = [
      self::NOT_PAID,
      self::PARTIALLY_PAID,
      self::FULLY_PAID
    ];
    #endregion

    #region constructor
    public function __construct()
    {
        $this->amount = 0;
        $this->payment_status = self::NOT_PAID;
    }
    #endregion

    #region getters / setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period): void
    {
        $this->period = $period;
    }

    /**
     * @return string
     */
    public function getPaymentStatus(): string
    {
        return $this->payment_status;
    }

    /**
     * @param string $payment_status
     */
    public function setPaymentStatus(string $payment_status): void
    {
        $this->payment_status = $payment_status;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->payment_date;
    }

    /**
     * @param mixed $payment_date
     */
    public function setPaymentDate($payment_date): void
    {
        $this->payment_date = $payment_date;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getTenant()
    {
        return $this->tenant;
    }

    /**
     * @param mixed $tenant
     */
    public function setTenant($tenant): void
    {
        $this->tenant = $tenant;
    }

    /**
     * @return array
     */
    public function getAnnualPeriod(): array
    {
        return $this->annualPeriod;
    }

    /**
     * @param array $annualPeriod
     */
    public function setAnnualPeriod(array $annualPeriod): void
    {
        $this->annualPeriod = $annualPeriod;
    }

    /**
     * @return array
     */
    public function getPaidStatus(): array
    {
        return $this->paidStatus;
    }

    /**
     * @param array $paidStatus
     */
    public function setPaidStatus(array $paidStatus): void
    {
        $this->paidStatus = $paidStatus;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @return mixed
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * @param mixed $receipt
     */
    public function setReceipt($receipt): void
    {
        $this->receipt = $receipt;
    }

    #endregion

    #region methods
    #endregion
}
