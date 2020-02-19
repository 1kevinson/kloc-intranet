<?php


namespace App\Event;


use App\Mailer\Mailer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Twig\Environment as Twig;

class UserEventSubscriber implements EventSubscriberInterface
{

    #region constantes
    #endregion

    #region properties
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    #endregion

    #region constructor
    private $twig;

    public function __construct(Mailer $mailer, Twig $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }
    #endregion

    #region getters / setters
    #endregion

    #region methods
    public static function getSubscribedEvents()
    {
        return [
            // Subscribe with $key = event Name, $value = method to subscribe
            UserRegisterEvent::NAME => 'onUserRegister'
        ];
    }

    public function onUserRegister(UserRegisterEvent $event)
    {
        $user = $event->getRegisteredUser();

        $this->mailer->sendConfirmationEmail($user);
    }
    #endregion

}