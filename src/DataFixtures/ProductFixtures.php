<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1;$i<=10;$i++)
        {
            $product = new Product();
            $product->setName('Product'.$i)
                    ->setDescription('Rastgele birşeyler yaz işte')
                    ->setPrice(mt_rand(10,600));
            $manager->persist($product);
        }
        $manager->flush();
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
