<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if($score = Score::create($request->all())) {
            if ($score) {
                return response()->json([
                    'message' => "puntuación guardada",
                    'code' => "200"
                ]);
            }
            return response()->json([
                'message' => "No se ha podido guardar la puntuación",
                'code' => "400"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $score = Score::find($request->id);
        if ($score) {
            if ($score->update($request->all())) {
                return response()->json([
                        'message' =>'Actualización exitosa',
                        'code' =>'200'
                ]);
            }else{
                return response()->json([
                        'message' =>'Actualización no exitosa',
                        'code' =>'400'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
