<?php

namespace App\Controllers;

use App\Models\Media;
use App\Models\Location;

class HomepageController extends BaseController
{
    public function show()
    {
        $data = [
            'greeting' => 'Ah que coucou !',
            'medias' => Media::getHomepageSocialMedias(),
            'fromLocations' => Location::getHomepageLocations()
        ];
        var_dump($data['fromLocations']);
        die();
        return $this->view('homepage', $data);
    }

    public function save($data)
    {
        // $data contient les données envoyées par le formulaire
        // qu'il faudra gérer ici.
    }
}