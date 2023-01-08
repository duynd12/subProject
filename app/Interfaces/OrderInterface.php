<?php

namespace App\Interfaces;

interface OrderInterface
{
    public function getAll();
    public function getOrderWithPanigator($quantity);
    public function getTotalPrice();
    public function getOrderById($id);
}
