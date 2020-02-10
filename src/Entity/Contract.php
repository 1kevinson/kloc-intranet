<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContractRepository")
 */
class Contract
{

    #region constantes
    const CONTRACT_ACTIVE   = 'CONTRACT_ACTIVE';
    const CONTRACT_CLOSE    = 'CONTRACT_CLOSE';
    #endregion

    #region properties
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Users\Tenant", mappedBy="contract")
     */
    private $tenant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Owner", inversedBy="contract")
     */
    private $owner;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Room", inversedBy="contract")
     */
    private $room;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ContractDetail", mappedBy="contract")
     */
    private $contract_details;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $reference;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $date_start;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $date_end;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $status;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $author;
    #endregion

    #region constructor
    public function __construct()
    {
        $this->status = self::CONTRACT_ACTIVE;
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
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room): void
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getContractDetails()
    {
        return $this->contract_details;
    }

    /**
     * @param mixed $contract_details
     */
    public function setContractDetails($contract_details): void
    {
        $this->contract_details = $contract_details;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * @param mixed $date_start
     */
    public function setDateStart($date_start): void
    {
        $this->date_start = $date_start;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * @param mixed $date_end
     */
    public function setDateEnd($date_end): void
    {
        $this->date_end = $date_end;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }
    #endregion

    #region methods
    #endregion

}
