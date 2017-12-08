<?php

namespace App\Models;

class Location extends BaseModel
{
    public function homepageLocations()
    {
        return $this->get(
                'SELECT l.code, lt.country FROM locations l JOIN location_translations lt ON l.id = lt.location_id WHERE lt.locale = :lang ORDER BY lt.country ASC;',
                [
                    'lang' => 'fr'
                ]
            );
    }
}