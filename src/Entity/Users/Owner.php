<?php

namespace App\Entity\Users;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OwnerRepository")
 */
class Owner extends User
{
    #region constantes
    #endregion


    #region properties
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\House", mappedBy="owner")
     * @ORM\JoinColumn(nullable=false)
     */
    private $house;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Payment", mappedBy="owner")
     */
    private $payment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contract", mappedBy="owner")
     */
    private $contract;
    #endregion

    #region constructor
    public function __construct()
    {
        parent::__construct();
        $this->house = new ArrayCollection();
        $this->payment = new ArrayCollection();
        $this->contract = new ArrayCollection();
        $this->setRoles([self::ROLE_OWNER]);
    }
    #endregion


    #region getters / setters
    /**
     * @return ArrayCollection
     */
    public function getHouse(): ArrayCollection
    {
        return $this->house;
    }

    /**
     * @param ArrayCollection $house
     */
    public function setHouse(ArrayCollection $house): void
    {
        $this->house = $house;
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
    public function getContract(): ArrayCollection
    {
        return $this->contract;
    }
    #endregion


    #region methods
    #endregion
}
