<?php


namespace App\DataFixtures;


use App\Entity\Users\Tenant;
use App\Entity\Users\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private const TENANTS = [
        [
            'login'  => 'john_doe',
            'email'     => 'john_doe@doe.com',
            'password'  => 'john123',
            'fullName'  => 'John Doe',
            'roles'     => [User::ROLE_USER],
            'profile_picture' => 'profile.jpeg'
        ],
        [
            'login'  => 'luc_page',
            'email'     => 'luc_page@page.com',
            'password'  => 'page123',
            'fullName'  => 'Luc Page',
            'roles'     => [User::ROLE_USER],
            'profile_picture' => 'profile.jpeg'
        ],
        [
            'login'  => 'marry_gold',
            'email'     => 'marry_gold@marry.com',
            'password'  => 'marry123',
            'fullName'  => 'Marry Gold',
            'roles'     => [User::ROLE_USER],
            'profile_picture' => 'profile.jpeg'
        ]
    ];

    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
    }

    public function loadTenant(ObjectManager $manager)
    {
        $tenant = new Tenant();

        foreach ( self::TENANTS as $tenant_data)
        {
            $tenant->setLogin($tenant_data['login']);
            $tenant->setPassword($tenant_data['password']);
        }
    }
}