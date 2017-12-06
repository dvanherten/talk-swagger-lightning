<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Demo;
use Exception;

class DemoController extends Controller
{
    public function index()
    {
        $demo = new Demo();
        return response()->json($demo->getExamples(), 200);
    }

    public function show($id)
    {
        $demo = new Demo();
        $items = $demo->getExamples();
        $item = findObjectById($items, $id);
        if ($item == false)
            throw new ModelNotFoundException();
        return response()->json($item, 200);
    }
}

function findObjectById($array, $id){
    foreach ( $array as $element ) {
        if ( $id == $element->id ) {
            return $element;
        }
    }

    return false;
}
