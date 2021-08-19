<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Line;
use App\Models\Product;
use App\Models\Mark;
use App\Models\ElemenType;


class ProductController extends Controller
{
    public function import()
    {
    	$path = public_path('prueba_prod.csv');
    	//$content = utf8_decode(file_get_contents($path));
    	$lineas = file($path);
    	$utf8_lineas = array_map ('utf8_encode', $lineas);
    	$array = array_map('str_getcsv', $utf8_lineas);

    	for ($i=1; $i<sizeof($array); ++$i){
    		$product                  = new Product();
    		$product->key_prod        = $array[$i][3];
    		$product->name            = $array[$i][4];
            $product->measure         = $array[$i][5];
            $product->m_unit          = $array[$i][6];
            $product->equivalence     = $array[$i][7];
            $product->description     = $array[$i][8];
            $product->alternate       = $array[$i][10];
    		$product->line_id         = $this->getLineId($array[$i][0], $array[$i][1]);
            $product->mark_id         = $this->getMarkId($array[$i][2]);
            $product->Element_type_id = $this->getElementTypeId($array[$i][9]);
    		$product->save();
    	}

    }

    public function getLineId($lineNum, $descriptionLine){
    	$line = Line::where('line', $lineNum)->first();
    	if ($line){
    		return $line->id;
    	}

    	$line = new Line();
    	$line->line = $lineNum;
        $line->description = $descriptionLine;
    	$line->save();
    	return $line->id;
    }

    public function getMarkId($markName){
        $mark = Mark::where('name', $markName)->first();
        if ($mark){
            return $mark->id;
        }

        $mark = new Mark();
        $mark->name = $markName;
        $mark->save();
        return $mark->id;
    }

    public function getElementTypeId($elementTypeName){
        $elementType = ElemenType::where('name', $elementTypeName)->first();
        if ($elementType){
            return $elementType->id;
        }

        $elementType = new ElemenType();
        $elementType->name = $elementTypeName;
        $elementType->save();
        return $elementType->id;
    }

}


