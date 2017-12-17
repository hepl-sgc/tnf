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

    public function locationIdFromCode($code)
    {
        $response = $this->get('SELECT id FROM locations WHERE code = :code;', [
            'code' => $code
        ]);
        return $response[0]->id;
    }
}