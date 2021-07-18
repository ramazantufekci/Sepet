<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service\Order;

use App\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Order;
/**
 * Description of CartSessionStorage
 *
 * @author lcladmin
 */
class CartSessionStorage {
    private $session;
    
    private $cartRepository;
    
    const CART_KEY_NAME = 'cart_id';
    
    public function __construct(SessionInterface $session, OrderRepository $cartRepository) {
        $this->session = $session;
        $this->cartRepository = $cartRepository;
    }
    
    public function getCart():?Order
    {
        return $this->cartRepository->findOneBy([
            'id'=>$this->getcartId(),
            'status'=>Order::STATUS_CART
        ]);
    }
    
    public function setCart(Order $cart):void
    {
        $this->session->set(self::CART_KEY_NAME,$cart->getId());
    }
    
    private function getCartId(): ?int
    {
        return $this->session->get(self::CART_KEY_NAME);
    }
}
