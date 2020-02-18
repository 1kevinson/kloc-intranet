<?php


namespace App\Controller\Security;


use App\Entity\Users\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    #region constantes
    #endregion

    #region properties
    #endregion

    #region constructor
    #endregion

    #region getters / setters
    #endregion

    #region methods
    /**
     * @Route("/login", name="security_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        if($this->getUser() != null){
            return $this->redirectToRoute('home_page');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Authentication/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }


    /**
     * @Route("/logout", name="security_logout")
     *
     */
    public function logout()
    {

    }
    #endregion

}