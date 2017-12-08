<?php

namespace App\Controllers;

use App\Models\Media;

class HomepageController extends BaseController
{
    public function show()
    {
        $data = [
            'greeting' => 'Ah que coucou !',
            'medias' => Media::getHomepageSocialMedias()
        ];
        return $this->view('homepage', $data);
    }

    public function save($data)
    {
        // $data contient les données envoyées par le formulaire
        // qu'il faudra gérer ici.
    }
}