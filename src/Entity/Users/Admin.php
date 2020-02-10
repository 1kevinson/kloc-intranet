<?php

namespace App\Entity\Users;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 */
class Admin extends User
{
    #region constantes
    #endregion

    #region properties
    #endregion

    #region constructor
    public function __construct()
    {
        parent::__construct();
        $this->setRoles([self::ROLE_ADMIN]);
    }
    #endregion

    #region getters / setters
    #endregion

    #region methods
    #endregion

}
