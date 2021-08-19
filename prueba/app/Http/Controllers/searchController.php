<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipowner;
use App\Models\Car;
use Illuminate\View\View;

class searchController extends Controller
{
    public function index()
    {
        $Armadoras=Shipowner::all();
        //dd($Armadoras);
        return view('Search.welcome', ['Armadoras'=>$Armadoras]);
    }
    public function searchCar($id)
    {
        $Armadora=Shipowner::find($id);
        $Armadoras=Shipowner::all();
        $Carros=$Armadora->cars;
        $nombreActual='';
        $Autos=[];
        foreach ($Carros as $carro) {
            if ($nombreActual == '' || $nombreActual != $carro->name)  {
                $nombreActual=$carro->name;
                $Auto = array(
                    'id'=> $carro->id,
                    'name' => $nombreActual,
                    'model' => array($carro->model)
                );
                array_push($Autos, $Auto);

            } if($nombreActual == $carro->name){
                for ($i=0; $i < sizeof($Autos); $i++) {
                    if ($Autos[$i]['name'] == $nombreActual) {
                      array_push($Autos[$i]['model'], $carro->model);
                    }
                }
            }

        }

        //dd($Armadora->cars->first());
        return view('Search.searchByShipowner', ['Armadoras'=>$Armadoras, 'Carros'=>$Autos, 'id'=>$id]);
    }

    public function searchProduct($id)
    {
        $Carro=Car::find($id);
        $Carros=Car::all();

        return view('Search.searchByCar', ['Productos'=>$Carro->products, 'Carro'=>$Carro]);
        //dd('Productos');
    }

    public function searchYear($name)
    {
        $Armadoras=Shipowner::all();
        $Carros=Car::where('name', $name)->orderBy('model')->get();
        $id = $Carros->first()->Shipowner_id;
        //dd($Armadoras);
        return view('Search.searchByYears', ['Armadoras'=>$Armadoras, 'Carros'=>$Carros, 'id'=>$id]);
    }

     public function search(Request $request)
    {
        dd($request);
        $Carro = Car::find($request);
        $Carros = Car::all();
       return view('Search.searchByCar', ['Productos'=>$Carros->products, 'Carro'=>$Carro]);
    }

}
