<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Product;
use App\Models\CarProduct;



class CarProductController extends Controller
{
    public function import($idArchivo)
    {
        $urlPath = '';
        !$idArchivo ? $urlPath ='prueba_productos.csv' : $urlPath = 'prueba_productos_2.csv';
        $path = public_path($urlPath);


        /* if (!$idArchivo) { // si el parametro es 0
            $path = public_path('prueba_productos.csv');
        } else { // si el parametro es 1
            $path = public_path('prueba_productos2.csv');
        } */
    	//$content = utf8_decode(file_get_contents($path));
    	$lineas = file($path);
    	$utf8_lineas = array_map ('utf8_encode', $lineas);
    	$array = array_map('str_getcsv', $utf8_lineas);

    	for ($i=1; $i<sizeof($array); ++$i){
    		$relation                 = new CarProduct();
    		$relation->car_id         = $this->getCarId($array[$i][7], $array[$i][8]);
            $relation->product_id     = $this->getProducId($array[$i][3]);
    		$relation->save();
    	}

    }

    public function getCarId($nameCar, $modelCar){
    	$car = Car::where('name', $nameCar)->where('model', $modelCar)->first();


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
//dd($car);
//dd($model);
    	/* if ($car != null && $model != null){
            return $car->id;
    	} else {
            return 1;
        }


    }
    public function getProducId($keyProd){
    	$product = Product::where('key_prod', $keyProd)->first();
    	if ($product != null ){
            return $product->id;
    	} else {
            return 1;
        }

    }

    public function testCarName($name)
    {
    	$car = Car::where('name', $name)->first();
        dd($car);

    } */


}
