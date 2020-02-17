<?php


namespace App\DataFixtures;


use App\Entity\Users\Admin;
use App\Entity\Users\Owner;
use App\Entity\Users\Tenant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private const TENANTS = [
        [
            'login'  => 'john_doe',
            'email'     => 'john_doe@doe.com',
            'password'  => 'john123',
            'fullName'  => 'John Doe',
            'profile_picture' => 'profile.jpeg'
        ],
        [
            'login'  => 'luc_page',
            'email'     => 'luc_page@page.com',
            'password'  => 'page123',
            'fullName'  => 'Luc Page',
            'profile_picture' => 'profile.jpeg'
        ],
        [
            'login'  => 'marry_gold',
            'email'     => 'marry_gold@marry.com',
            'password'  => 'marry123',
            'fullName'  => 'Marry Gold',
            'profile_picture' => 'profile.jpeg'
        ],
        [
            'login'  => 'arsene_kevin',
            'email'     => 'arsene_kevin@kevin.com',
            'password'  => 'arsene123',
            'fullName'  => 'Arsene Kevin',
            'profile_picture' => 'profile.jpeg'
        ]
    ];

    private const OWNERS = [
        [
            'login'  => 'mathias_huss',
            'email'     => 'mathias_huss@mathias.com',
            'password'  => 'mathias123',
            'fullName'  => 'Mathias Huss',
            'profile_picture' => 'profile.jpeg'
        ],
        [
            'login'  => 'tony_lehmann',
            'email'     => 'tony_lehmann@tony.com',
            'password'  => 'tony123',
            'fullName'  => 'Tony Lehmann',
            'profile_picture' => 'profile.jpeg'
        ]
    ];

    private const ADMIN = [
        [
            'login'  => 'sir_kevinson',
            'email'     => 'sir_kevinson@admin.com',
            'password'  => 'admin123',
            'fullName'  => 'Sir Kevinson',
            'profile_picture' => 'profile.jpeg'
        ]
    ];

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
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
        foreach (self::TENANTS as $tenantData)
        {
            $tenant = new Tenant();
            $tenant->setUsername($tenantData['login']);
            $tenant->setFullName($tenantData['fullName']);
            $tenant->setEmail($tenantData['email']);
            $tenant->setPassword($this->passwordEncoder->encodePassword($tenant,$tenantData['password']));
            $tenant->setEnabled(true);

            $manager->persist($tenant);
        }

        $manager->flush();
    }

    public function loadOwner(ObjectManager $manager)
    {
        foreach ( self::OWNERS as $ownerData)
        {
            $owner = new Owner();
            $owner->setUsername($ownerData['login']);
            $owner->setFullName($ownerData['fullName']);
            $owner->setEmail($ownerData['email']);
            $owner->setPassword($this->passwordEncoder->encodePassword($owner,$ownerData['password']));
            $owner->setEnabled(true);

            $manager->persist($owner);
        }

        $manager->flush();
    }

    public function loadAdmin(ObjectManager $manager)
    {
        foreach ( self::ADMIN as $adminData)
        {
            $admin = new Admin();
            $admin->setUsername($adminData['login']);
            $admin->setFullName($adminData['fullName']);
            $admin->setEmail($adminData['email']);
            $admin->setPassword($this->passwordEncoder->encodePassword($admin,$adminData['password']));
            $admin->setEnabled(true);

            $manager->persist($admin);
        }

        $manager->flush();
    }

}