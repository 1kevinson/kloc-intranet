<?php

namespace App\Entity\Users;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TenantRepository")
 */
class Tenant extends User
{
    #region constantes
    const ACCOUNT_ACTIVE        = 'ACCOUNT_ACTIVE';
    const ACCOUNT_SUSPENDED     = 'ACCOUNT_SUSPENDED';
    const ACCOUNT_DEACTIVATED   = 'ACCOUNT_DEACTIVATED';
    #endregion

    #region properties
    /**
     * @ORM\Column(type="string")
     */
    private $account_status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\House", inversedBy="tenant")
     * @ORM\JoinColumn(nullable=true)
     */
    private $house;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Request", mappedBy="tenant")
     */
    private $request;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="tenant")
     */
    private $document;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Payment", mappedBy="tenant")
     */
    private $payment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Receipt", mappedBy="tenant")
     */
    private $receipt;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Room", inversedBy="tenant")
     */
    private $room;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Contract", inversedBy="tenant")
     * @ORM\JoinColumn(nullable=true)
     */
    private $contract;
    #endregion

    #region constructor
    public function __construct()
    {
        parent::__construct();
        $this->account_status = self::ACCOUNT_DEACTIVATED;
        $this->request = new ArrayCollection();
        $this->document = new ArrayCollection();
        $this->payment = new ArrayCollection();
        $this->receipt = new ArrayCollection();
        $this->setRoles([self::ROLE_USER]);
    }
    #endregion

    #region getters / setters
    /**
     * @return mixed
     */
    public function getAccountStatus()
    {
        return $this->account_status;
    }

    /**
     * @param mixed $account_status
     */
    public function setAccountStatus($account_status): void
    {
        $this->account_status = $account_status;
    }

    /**
     * @return mixed
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * @param mixed $house
     */
    public function setHouse($house): void
    {
        $this->house = $house;
    }

    /**
     * @return ArrayCollection
     */
    public function getRequest(): ArrayCollection
    {
        return $this->request;
    }

    /**
     * @return ArrayCollection
     */
    public function getDocument(): ArrayCollection
    {
        return $this->document;
    }

    /**
     * @return ArrayCollection
     */
    public function getPayment(): ArrayCollection
    {
        return $this->payment;
    }

    /**
     * @return ArrayCollection
     */
    public function getReceipt(): ArrayCollection
    {
        return $this->receipt;
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
    public function getContract()
    {
        return $this->contract;
    }

    #endregion

    #region methods
    #endregion
}
