<?php


namespace App\Controller;


use App\Entity\Users\Tenant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tenant")
 */
class TenantController extends AbstractController
{

    #region constantes
    #endregion

    #region properties
    private $manager;
    #endregion

    #region constructor
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }
    #endregion

    #region getters / setters
    #endregion

    #region methods
    /**
     * @Route("/{username}", name="tenant_page")
     */
    public function tenantView(string $username)
    {
        if($this->getUser() != null)
        {
            $username = $this->getUser()->getUsername();
            $tenant = $this->manager->getRepository(Tenant::class)->findOneBy(['username' => $username ]);

            return $this->render('Tenant Page/base-area.html.twig', [
                'tenant' => $tenant
            ]);
        }

        return $this->redirectToRoute('home_page');
    }
    #endregion

}