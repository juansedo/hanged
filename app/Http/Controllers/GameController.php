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
        $word_in_page = "";

        session()->forget('display.game');

        return view('game.show', compact('word_in_page'));
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
        $word_in_page = "";
        $ch = "";

        if(request()->has('play')) {
            // Define used word
            session()->put('word', strtoupper(Words::find($seed)->name));
            session()->put('lifes', 5);
            session()->forget('state');

            // Display
            //session()->put('display.head', 'disabled');
            //session()->put('display.body', 'disabled');
            //session()->put('display.arms', 'disabled');
            //session()->put('display.lleg', 'disabled');
            //session()->put('display.rleg', 'disabled');
            session()->put('display.game',  '');

            // Used characters
            session()->forget('used-chars');
        }

        // If user types a letter
        if(request()->has('ch')) {
            $word = strtoupper(session()->get('word'));
            $ch = strtoupper(request()->get('ch'));
            session()->push('used-chars', e($ch));
            
            if(!checkAttempt($word, $ch)) {
                $lifes = session()->get('lifes');
                if($lifes <= 1) {
                    return view('game.failed');
                }
                session()->put('lifes', $lifes-1);
            }
        }


        // Define word in page template
        if (session()->has('used-chars')) {
            $word_in_page = fillDisplayedWord(session()->get('word'), session()->get('used-chars'));
        } else {
            $word_in_page = fillDisplayedWord(session()->get('word'));
        }

        return view('game.show', compact('word_in_page'));//session()->all();
    }

    public function win() {
        return view('game.congratulations');
    }

    public function fail() {
        return view('game.failed');
    }
}
