<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RequestRepository")
 */
class Request
{

    #region constantes
    const REQUEST_NOT_SEEN  = 'REQUEST_NOT_SEEN';
    const REQUEST_READ      = 'REQUEST_READ';
    const REQUEST_OPEN      = 'REQUEST_OPEN';
    const REQUEST_CLOSE     = 'REQUEST_CLOSE';
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
    private $request_reason;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_modify;

    /**
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users\Tenant", inversedBy="request")
     */
    private $tenant;
    #endregion


    #region constructor
    public function __construct()
    {
        $this->status = self::REQUEST_NOT_SEEN;
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
    public function getRequestReason()
    {
        return $this->request_reason;
    }

    /**
     * @param mixed $request_reason
     */
    public function setRequestReason($request_reason): void
    {
        $this->request_reason = $request_reason;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created): void
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getDateModify()
    {
        return $this->date_modify;
    }

    /**
     * @param mixed $date_modify
     */
    public function setDateModify($date_modify): void
    {
        $this->date_modify = $date_modify;
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
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
    #endregion


    #region methods
    #endregion



}
