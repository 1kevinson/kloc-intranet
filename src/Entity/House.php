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
    const RENTAL_AVAILABLE      = 'RENTAL_AVAILABLE';
    const RENTAL_UNAVAILABLE    = 'RENTAL_UNAVAILABLE';
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
     * @ORM\Column(type="string")
     */
    private $rental_status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users\Tenant", mappedBy="house")
     */
    private $tenant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Owner", inversedBy="house")
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Room", mappedBy="house")
     */
    private $room;
    #endregion

    #region constructor
    public function __construct()
    {
        $this->rental_status    = self::RENTAL_AVAILABLE;
        $this->tenant           = new ArrayCollection();
        $this->room             = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getRoom(): ArrayCollection
    {
        return $this->room;
    }
    #endregion

    #region methods
    #endregion
}
