<?php

function parseDateForSQL($rawDate) {
    $parsedDate = explode('/', $rawDate);
    $parsedDate = $parsedDate[2] . '-' . $parsedDate[0] . '-' . $parsedDate[1] . ' 00:00:00'; 
    return $parsedDate;
}