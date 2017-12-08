<?php

namespace App\Models;

class Media extends BaseModel
{
    public function homepageSocialMedias()
    {
        return $this->get('SELECT m.name AS icon, m.url, t.label FROM medias m JOIN media_translations t ON m.id = t.media_id WHERE m.name IN (:fb,:ig,:yt);', [
            'fb' => 'facebook',
            'ig' => 'instagram',
            'yt' => 'youtube'
        ]);
    }
}