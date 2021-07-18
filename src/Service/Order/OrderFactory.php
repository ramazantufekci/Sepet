<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service\Order;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use DateTime;

/**
 * Description of OrderFactory
 *
 * @author lcladmin
 */
class OrderFactory {
    public function create()
    {
        $order = new Order();
        $order->setStatus(Order::STATUS_CART)
                ->setCreatedAt(new DateTime())
                ->setUpdatedAt(new DateTime());
        
        return $order;
    }
    
    public function createItem(Product $product): OrderItem
    {
        $item = new OrderItem();
        $item->setProduct($product);
        $item->setQuantity(1);
        
        return $item;
    }
}
