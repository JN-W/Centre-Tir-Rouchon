<?php

namespace App\DataFixtures;

use App\Entity\News;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user1 = New User($this->passwordHasher);
        $user1
            ->setUsername('jn')
            ->setPassword('123')
            ->setRoles(['ROLE_USER']);
        $manager->persist($user1);

        $user2 = New User($this->passwordHasher);
        $user2
            ->setUsername('lolo')
            ->setPassword('456')
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user2);

        $news1= New News();
        $news1
            ->setTitle('Welcome Tortuga')
            ->setCategory('actualite')
            ->setContent('Recrutement du meilleur tireur des iles galapagos. La valeur n\'attend pas le nombre des années, et il peut déjà émasculer un bourdon à 50m les yeux fermés')
            ->setRecap('Tortuga s\'est inscrit au CTR')
            ->setImage('https://www.consoglobe.com/wp-content/uploads/2016/12/adopter-tortue-1.jpg');
        $manager->persist($news1);

        $news2= New News();
        $news2
            ->setTitle('12 points !')
            ->setCategory('actualite')
            ->setContent('Le CTR est heureux d\'avoir contribué à la cagnotte litchee de son adhérent Rodrigo de la Muerte pour l\'aider à trouver un moyen de transport jusqu\'au club pour ses entrainements.' )
            ->setRecap('Rodrigo has been picked up')
            ->setImage('https://alma-de-chiapas.com/wp-content/uploads/2021/07/Cartels-Mexique.jpg');
        $manager->persist($news2);


        $news3= New News();
        $news3
            ->setTitle('champion du monde !')
            ->setCategory('results')
            ->setContent('le CTR est champion du monde dans la catégorie enfant de plus de 75kg ! C\'est une belle victoire pour Serge Abitbol Junior qui a écrasé la compétition' )
            ->setRecap('On est les champions !')
            ->setImage('https://blogcartonblanc.files.wordpress.com/2017/01/7772403173_le-trophee-de-la-coupe-du-monde.jpg?w=256&h=256&crop=1');
        $manager->persist($news3);

        $news4= New News();
        $news4
            ->setTitle('bazook instinct !')
            ->setCategory('results')
            ->setContent('le CTR est heureux de faire concourir 3 de ses adhérents dans la catégorie bazooka à l\'open de tir du cap d\'agde. Fatal n\'a qu\'a bien se tenir !' )
            ->setRecap('Ca défonce tout')
            ->setImage('https://c-fa.cdn.smule.com/rs-s30/arr/e3/20/c3c4cd93-016c-40a9-92fe-dba71128bad1.jpg');
        $manager->persist($news4);
//
        $manager->flush();
    }
}
