<?php


namespace App\DataFixtures;


use App\Entity\Contract;
use App\Entity\Users\Tenant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ContractFixtures extends Fixture
{

    private const CONTRACTS =  [
            'reference'     => 'KLOC-INTRA-N',
            'author'  => 'FRIDAY-14'
        ];


    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $this->loadContract($manager);

    }

    public function loadContract(ObjectManager $manager)
    {

        $tenants = $manager->getRepository(Tenant::class)->findAll();

//        dump(self::CONTRACTS);die;

        for($i =0; $i < 50 ; $i++)
        {
           $contract = new Contract();
           $contract->setReference(self::CONTRACTS['reference'].'_'.$i);
           $contract->setTenant(
               $this->getReference($tenants[rand(0,count($tenants))]->getUsername())
           );

        }

        $manager->flush();
    }


}