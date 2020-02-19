<?php


namespace App\Event;


use App\Entity\Users\User;

class UserRegisterEvent
{

    #region constantes
    const NAME = 'user.register';
    #endregion

    #region properties
    private $registeredUser;
    #endregion

    #region constructor
    public function __construct(User $registeredUser)
    {
        $this->registeredUser = $registeredUser;
    }
    #endregion

    #region getters / setters
    /**
     * @return User
     */
    public function getRegisteredUser(): User
    {
        return $this->registeredUser;
    }
    #endregion

    #region methods
    #endregion

}