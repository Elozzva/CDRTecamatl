<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views\vendor\pagination;

use App\Models\Car;
use App\Models\Shipowner;
use App\Models\Product;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name');
        $model = $request->get('model');
        //$nameowner = $request->get('nameowner');
       // $description = $request->get('description');
        //$name = $request->get('name');

        $cars = Car::orderBy('id')
        ->name($name)
        ->model($model)

        ->paginate(50);
        return view('Productos', compact('cars'));
    }
    public function searchProduct($id)
    {
        dd($id);
        $car=Car::find($id);
         return view('Search.searchByCar', ['Productos'=>$car->products, 'Carro'=>$car]);
        //dd('Productos');
    }
}
