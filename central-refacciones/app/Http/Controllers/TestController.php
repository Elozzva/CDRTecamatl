<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Shipowner;

class TestController extends Controller
{
    public function import()
    {
    $path = public_path('totalCars.csv');
    //$content = utf8_decode(file_get_contents($path));
    $lineas = file($path);
    $utf8_lineas = array_map ('utf8_encode', $lineas);
    $array = array_map('str_getcsv', $utf8_lineas);

    for ($i=1; $i<sizeof($array); ++$i){
        $car = new Car();
        $car->name = $array[$i][0];
        $car->model =$array[$i][1];
        $car->shipowner_id = $this->getShipownerId($array[$i][2]);
        $car->save();
    }

}

public function getShipownerId($shipownerName){
    $shipowner = Shipowner::where('name', $shipownerName)->first();
    if ($shipowner){
        return $shipowner->id;
    }

    $shipowner = new Shipowner();
    $shipowner->name = $shipownerName;
    $shipowner->save();
    return $shipowner->id;
}
}
