<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Words;

class GameController extends Controller
{
    /**
     * Handle the incoming request
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    
    public function __invoke(Request $request) {
        $user = auth()->user()->name;
        $word_in_page = "";

        $display = array(
            "head" => "disabled",
            "body" => "disabled",
            "arms" => "disabled",
            "lleg" => "disabled",
            "rleg" => "disabled",
            "state" => "state",
            "stateText" => "",
            "game" => "disabled"
        );

        if (request()->has('play')) {
            $seed = "123";
            return view('game.show', ['seed' => $seed]);
        }

        return view('game.show', compact('user', 'display', 'word_in_page'));
    }
    
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
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function play($seed)
    {
        return Words::find($seed);
    }

    public function win() {
        return view('game.congratulations');
    }

    public function fail() {
        return view('game.failed');
    }
}
