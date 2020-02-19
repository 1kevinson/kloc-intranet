<?php


namespace App\Mailer;


use App\Entity\Users\User;
use Twig\Environment as Twig_Environment;

class Mailer
{
    private $mailer;
    private $twig;
    private $mailFrom;

    public function __construct(\Swift_Mailer $mailer, Twig_Environment $twig, string $mailFrom)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->mailFrom = $mailFrom;
    }

    public function sendConfirmationEmail(User $user)
    {
        $body = $this->twig->render('emails/registration.html.twig', [
            'user' => $user,
            'token' => $user->getConfirmationToken()
        ]);

        $message = (new \Swift_Message())
            ->setSubject('Bienvenue sur Kloc-Intranet !')
            ->setFrom($this->mailFrom)
            ->setTo($user->getEmail())
            ->setBody($body,'text/html');

        $this->mailer->send($message);
    }



}
