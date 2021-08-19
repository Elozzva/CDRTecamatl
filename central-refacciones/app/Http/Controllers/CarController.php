<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::orderBy('id')->paginate(10);
        return view('cars', compact('cars'));
    }
}
