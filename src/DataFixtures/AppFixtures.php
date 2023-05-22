<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Entity\Local;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User(); 
        $user = new User();
        $frLocale = new Local();
        $enLocale = new Local();

        $frLocale->setLabel('Français')
                 ->setCode('fr');

        $manager->persist($frLocale);
                 
        $enLocale->setLabel('English')
                 ->setCode('en');

        $manager->persist($enLocale);


        $admin->setEmail('admin@email.com')
              ->setRoles(['ROLE_ADMIN'])
              ->setPassword($this->userPasswordHasher->hashPassword($admin, 'admin'))
              ->setlocal($frLocale)
              ->setFirstName('Admin')
              ->setLastName('Admin')
              ->setIsVerified(true);

        $manager->persist($admin);

        $user->setEmail('user@email.com')
              ->setRoles([])
              ->setPassword($this->userPasswordHasher->hashPassword($user, 'user'))
              ->setlocal($enLocale)
              ->setFirstName('User')
              ->setLastName('User')
              ->setIsVerified(false);
        
        $manager->persist($user);

        $manager->flush();
    }
}
