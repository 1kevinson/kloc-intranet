<?php


namespace App\DataFixtures;


use App\Entity\Contract;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class ContractFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $this->loadContract($manager);
    }

    public function loadContract(ObjectManager $manager)
    {
        $fakeDatas = Factory::create();

        for($i =0; $i < 30 ; $i++)
        {
           $contract = new Contract();

           $contract->setReference($fakeDatas->swiftBicNumber);
           $contract->setDateStart(new \DateTime());
           $contract->setDateEnd(new \DateTime($fakeDatas->dateTimeBetween('now','+1 year')->format('Y-m-d')));
           $contract->setAuthor('KevinFixtures');

           $manager->persist($contract);
        }

        $manager->flush();
    }


}