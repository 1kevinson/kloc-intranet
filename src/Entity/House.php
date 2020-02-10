<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HouseRepository")
 */
class House
{
    #region constantes
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
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users\Tenant", mappedBy="house")
     */
    private $tenant;
    #endregion

    #region constructor
    public function __construct()
    {
        $this->tenant = new ArrayCollection();
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
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return ArrayCollection
     */
    public function getTenant(): ArrayCollection
    {
        return $this->tenant;
    }
    #endregion

    #region methods
    #endregion
}
