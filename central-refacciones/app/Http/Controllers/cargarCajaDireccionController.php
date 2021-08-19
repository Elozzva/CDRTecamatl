<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Product;
use App\Models\CarProduct;

class cargarCajaDireccionController extends Controller
{
    public function import()
    {
    	$path = public_path('Caja_direccion.csv');
    	//$content = utf8_decode(file_get_contents($path));
    	$lineas = file($path);
    	$utf8_lineas = array_map ('utf8_encode', $lineas);
    	$array = array_map('str_getcsv', $utf8_lineas);

        for ($i=1; $i<sizeof($array); ++$i){
    		$relation                 = new CarProduct();//se cargaran registros a la pivote
    		$relation->car_id         = $this->getCarId($array[$i][7], $array[$i][8]);
           // $relation->year_id         = $this->getYearId($array[$i][8]);
            $relation->product_id     = $this->getProducId($array[$i][3]);
    		$relation->save();
    	}
    }

    public function getCarId($nameCar, $modelCar){
    	$car = Car::where('name', $nameCar)->where('model', $modelCar)->first();
       // $car -> $year->first();



        if ($car){
            return $car->id;
        }
    }



    public function getProducId($keyProd){
        $product = Product::where('key_prod', $keyProd)->first();
        if ($product){
            return $product->id;
        }
    }
}
