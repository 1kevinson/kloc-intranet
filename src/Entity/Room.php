<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 */
class Room
{
    #region constantes
    const VERY_CLEAN            = 'VERY_CLEAN';
    const CLEAN                 = 'CLEAN';
    const AVERAGE_CLEAN         = 'AVERAGE_CLEAN';
    const NOT_CLEAN             = 'NOT_CLEAN';
    #endregion

    #region properties
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $room_size;

    /**
     * @ORM\Column(type="string")
     */
    private $room_state;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Contract", mappedBy="room")
     */
    private $contract;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Users\Tenant", mappedBy="room")
     */
    private $tenant;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Payment", mappedBy="room")
     */
    private $payment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\House", inversedBy="room")
     */
    private $house;
    #endregion

    #region constructor
    public function __construct()
    {
        $this->room_state = self::CLEAN;
        $this->payment = new ArrayCollection();
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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getRoomSize()
    {
        return $this->room_size;
    }

    /**
     * @param mixed $room_size
     */
    public function setRoomSize($room_size): void
    {
        $this->room_size = $room_size;
    }

    /**
     * @return string
     */
    public function getRoomState(): string
    {
        return $this->room_state;
    }

    /**
     * @param string $room_state
     */
    public function setRoomState(string $room_state): void
    {
        $this->room_state = $room_state;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param mixed $contract
     */
    public function setContract($contract): void
    {
        $this->contract = $contract;
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
     * @return ArrayCollection
     */
    public function getPayment(): ArrayCollection
    {
        return $this->payment;
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

    #region methods
    #endregion
}
