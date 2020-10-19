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
        session()->forget('word');
        session()->forget('lifes');

        return view('game.show', compact('word_in_page'));
    }
    
    public function play($seed)
    {
        $word_in_page = "";
        $ch = "";

        if(request()->has('play')) {
            // Define used word
            session()->put('word', strtoupper(Words::find($seed)->name));
            session()->put('lifes', 5);

            // Display
            session()->put('display.head', 'disabled');
            session()->put('display.body', 'disabled');
            session()->put('display.arms', 'disabled');
            session()->put('display.lleg', 'disabled');
            session()->put('display.rleg', 'disabled');
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
                    return redirect()->route('game.failed');
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
        
        // Check victory
        if(checkVictory($word_in_page)) {
            return redirect()->route('game.win');
        }

        changeDisplay();

        return view('game.show', compact('word_in_page'));
    }

    public function win() {
        return view('game.congratulations');
    }

    public function fail() {
        return view('game.failed');
    }
}
