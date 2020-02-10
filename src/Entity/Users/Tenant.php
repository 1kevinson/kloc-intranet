<?php

namespace App\Entity\Users;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TenantRepository")
 */
class Tenant extends User
{
    #region constantes
    const ACCOUNT_ACTIVE = 'ACCOUNT_ACTIVE';
    const ACCOUNT_SUSPENDED = 'ACCOUNT_SUSPENDED';
    const ACCOUNT_DEACTIVATED = 'ACCOUNT_DEACTIVATED';
    #endregion

    #region properties
    private $account_status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\House", inversedBy="tenant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $house;
    #endregion

    #region constructor
    public function __construct()
    {
        parent::__construct();
        $this->account_status = self::ACCOUNT_DEACTIVATED;
        $this->setRoles([self::ROLE_USER]);
    }

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
    #endregion

    #region getters / setters

    #endregion

    #region methods
    #endregion
}
