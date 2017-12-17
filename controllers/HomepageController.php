<?php

namespace App\Controllers;

use App\Models\Media;
use App\Models\Location;
use App\Models\Order;

class HomepageController extends BaseController
{
    public function show()
    {
        $data = [
            'greeting' => 'Ah que coucou !',
            'medias' => Media::getHomepageSocialMedias(),
            'locations' => Location::getHomepageLocations()
        ];
        return $this->view('homepage', $data);
    }

    public function save($data)
    {
        $from = Location::getLocationIdFromCode($data['from']);
        $to = Location::getLocationIdFromCode($data['to']);
        $departure = parseDateForSQL($data['departure']);
        $return = parseDateForSQL($data['return']);
        $oneway = ($data['trip'] == 'one-way') ? 1 : 0;

        Order::setNewOrder($from, $to, $departure, $return, $oneway);

        return $this->redirect('/');
    }
}