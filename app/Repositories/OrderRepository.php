<?php

namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Models\Order;
use App\Models\OrderDetail;


class OrderRepository implements OrderInterface
{
    public function getAll()
    {
        return Order::all();
    }

    public function getTotalPrice()
    {
        $data = Order::pluck('total_price');
        return $data;
    }
    public function getOrderById($id)
    {
        $data = OrderDetail::where('order_id', $id)->get();
        return $data;
    }
}
