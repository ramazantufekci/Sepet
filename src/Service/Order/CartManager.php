<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service\Order;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Order;
/**
 * Description of CartManager
 *
 * @author lcladmin
 */
class CartManager {
    private $cartSessionStorage;
    private $cartFactory;
    private $entityManager;


    public function __construct(CartSessionStorage $cartStorage, OrderFactory $orderFactory,EntityManagerInterface $entityManager) {
        $this->cartSessionStorage = $cartStorage;
        $this->cartFactory = $orderFactory;
        $this->entityManager = $entityManager;
        
    }
    
    public function getCurrentCart(): Order
    {
        $cart = $this->cartSessionStorage->getCart();

        if(!$cart)
        {
            $cart = $this->cartFactory->create();
        }
        return $cart;
    }
    
    public function save(Order $cart): void
    {
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        $this->cartSessionStorage->setCart($cart);
    }
}
