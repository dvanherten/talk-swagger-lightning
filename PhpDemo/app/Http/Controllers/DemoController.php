<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Demo;
use Exception;

/**
 * Class DemoController
 *
 * @package App\Http\Controllers
 */
class DemoController extends Controller
{
    /**
     * Display a listing of our demo items.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/api/demo",
     *     description="Returns demo items.",
     *     operationId="api.demo.index",
     *     produces={"application/json"},
     *     tags={"demo"},
     *     @SWG\Response(
     *         response=200,
     *         description="Demo array."
     *     )
     * )
     */
    public function index()
    {
        $demo = new Demo();
        return response()->json($demo->getExamples(), 200);
    }

    /**
     * Display a single demo item.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/api/demo/{id}",
     *     description="Returns demo overview.",
     *     operationId="api.demo.index",
     *     produces={"application/json"},
     *     tags={"demo"},
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="The id of the demo item to retrieve",
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="A Demo item."
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Demo item missing."
     *     ),
     * )
     */
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
