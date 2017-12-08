<?php

namespace App\Models;

class Order extends BaseModel
{
    // public function myRequest()
    // {
    //     return $this->get('SELECT ...', [':argument' => 'value']);
    // }

    public function newOrder($from, $to, $departure, $return, $oneway)
    {
        $this->create('INSERT INTO orders 
            (from_location_id, to_location_id, departure_at, return_at, one_way, created_at, updated_at)
            VALUES
            (:from, :to, :departure, :return, :oneway, NOW(), NOW());',
        [
            ':from' => $from,
            ':to' => $to,
            ':departure' => $departure,
            ':return' => $return,
            ':oneway' => $oneway
        ]);
    }
}