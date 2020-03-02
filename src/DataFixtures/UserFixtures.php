<?php


namespace App\DataFixtures;


use App\Entity\Users\Admin;
use App\Entity\Users\Owner;
use App\Entity\Users\Tenant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    public const TENANT_PASSWORD = 'tenant_pass';

    public const OWNER_PASSWORD = 'owner_pass';


    private $passwordEncoder;
    private $faker ;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder )
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $this->loadTenant($manager);
        $this->loadOwner($manager);
        $this->loadAdmin($manager);
    }

    public function loadTenant(ObjectManager $manager)
    {
        for($i =0; $i < 10 ; $i++)
        {
            $tenant = new Tenant();
            $tenant->setUsername($this->faker->firstName);
            $tenant->setFullName($this->faker->name);
            $tenant->setEmail($this->faker->safeEmail);
            $tenant->setPassword($this->passwordEncoder->encodePassword($tenant,self::TENANT_PASSWORD));
            $tenant->setEnabled(true);

            $manager->persist($tenant);
        }

        $manager->flush();
    }

    public function loadOwner(ObjectManager $manager)
    {
        for($i =0; $i < 4 ; $i++)
        {
            $owner = new Owner();
            $owner->setUsername($this->faker->firstName);
            $owner->setFullName($this->faker->name);
            $owner->setEmail($this->faker->safeEmail);
            $owner->setPassword($this->passwordEncoder->encodePassword($owner,self::OWNER_PASSWORD));
            $owner->setEnabled(true);

            $manager->persist($owner);
        }
        
        $manager->flush();
    }

    public function loadAdmin(ObjectManager $manager)
    {
        for($i =0; $i < 2 ; $i++)
        {
            $admin = new Admin();
            $admin->setUsername($this->faker->firstName);
            $admin->setFullName($this->faker->name);
            $admin->setEmail($this->faker->safeEmail);
            $admin->setPassword($this->passwordEncoder->encodePassword($admin,'admin'));
            $admin->setEnabled(true);

            $manager->persist($admin);
        }
        $manager->flush();
    }

}