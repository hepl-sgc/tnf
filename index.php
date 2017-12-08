<?php
include('./config.php');
include('./controllers/BaseController.php');
include('./controllers/HomepageController.php');
include('./Models/BaseModel.php');
include('./Models/Forecast.php');
include('./Models/Hotel.php');
include('./Models/HotelFeature.php');
include('./Models/Location.php');
include('./Models/Media.php');
include('./Models/Order.php');
include('./Models/Place.php');

$homepage = new \App\Controllers\HomepageController;
$homepage->handle();