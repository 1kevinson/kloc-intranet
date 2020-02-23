<?php


namespace App\Controller\Security;


use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
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

    /**
     * @Route("/confirm/{token}", name="security_confirm")
     *
     */
    public function confirm(string $token, UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $user = $userRepository->findOneBy([
            'confirmationToken' => $token
        ]);

        if($user !== null)
        {
            $user->setEnabled(true);
            $user->setConfirmationToken('');

            $entityManager->flush();
        }

        return $this->render('emails/confirmation.html.twig',[
            'user' => $user
        ]);
    }

    #endregion

}