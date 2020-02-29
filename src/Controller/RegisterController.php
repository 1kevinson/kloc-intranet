<?php


namespace App\Controller;


use App\Entity\Users\Owner;
use App\Entity\Users\Tenant;
use App\Event\UserRegisterEvent;
use App\Form\OwnerType;
use App\Form\TenantType;
use App\Security\TokenGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


/**
 * @Route("/register")
 */
class RegisterController extends AbstractController
{
    public function __construct() { }

    /**
     * @Route("/choice", name="register_choice")
     */
    public function registerViews(){

        if($this->getUser() != null){
            return $this->redirectToRoute('home_page');
        }

        return $this->render('Authentication/register-views.html.twig');
    }


    /**
     * @Route("/tenant", name="tenant_register")
     */
    public function registerTenant(UserPasswordEncoderInterface $passwordEncoder,
                                   Request $request,
                                   TokenGenerator $tokenGenerator,
                                   EventDispatcherInterface $eventDispatcher)
    {
        if($this->getUser() != null){
            return $this->redirectToRoute('home_page');
        }

        $tenant = new Tenant();

        $form = $this->createForm(TenantType::class, $tenant);
        $form->handleRequest($request);

        if($form->isSubmitted() )
        {
            $password  = $passwordEncoder->encodePassword($tenant, $tenant->getPlainPassword());
            $profilePicture = $form->get('profile_picture')->getData();
            $randomstring = new TokenGenerator();

            if($profilePicture)
            {
                $originalFilename = pathinfo($profilePicture->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $randomstring->getRandomSecureToken(7);
                $newProfileFilename = $safeFilename.'-'.uniqid().'.'.$profilePicture->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $profilePicture->move(
                        $this->getParameter('profile_pics_dir'),
                        $newProfileFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                    return $e->getMessage();
                }

            }

            /* SET PROPERTY VALUES */
            $tenant->setPassword($password);
            $tenant->setProfilePictureFile($newProfileFilename);
            $tenant->setConfirmationToken($tokenGenerator->getRandomSecureToken(25));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tenant);
            $entityManager->flush();

            /* DISPATCH REGISTRATION EMAIL */
            $userRegisterEvent = new UserRegisterEvent($tenant);
            $eventDispatcher->dispatch($userRegisterEvent,UserRegisterEvent::NAME);

            return $this->redirectToRoute('security_login');
        }

        return $this->render('Authentication/register-tenant.html.twig',[
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/owner", name="owner_register")
     */
    public function registerOwner(UserPasswordEncoderInterface $passwordEncoder,
                                     Request $request,
                                     TokenGenerator $tokenGenerator,
                                     EventDispatcherInterface $eventDispatcher)
    {
        if($this->getUser() != null){
            return $this->redirectToRoute('home_page');
        }

        $owner = new Owner();

        $form = $this->createForm(OwnerType::class, $owner);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $password  = $passwordEncoder->encodePassword($owner, $owner->getPlainPassword());
            $owner->setPassword($password);
            $owner->setConfirmationToken($tokenGenerator->getRandomSecureToken(25));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($owner);
            $entityManager->flush();

            $userRegisterEvent = new UserRegisterEvent($owner);
            $eventDispatcher->dispatch($userRegisterEvent, UserRegisterEvent::NAME);

            return $this->redirectToRoute('security_login');
        }

        return $this->render('Authentication/register-owner.html.twig',[
            'form' => $form->createView()
        ]);
    }
}