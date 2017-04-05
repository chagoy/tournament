<?php

namespace App\Http\Controllers;
use App\Boxer;
use Illuminate\Http\Request;

class BoxerController extends Controller
{
    public function index()
    {
    	$boxers = Boxer::orderBy('id', 'asc')
    		->filter(request(['country', 'weight']))
    		->get();
    	return view('boxers.index', compact('boxers'));
    }
    public function show(Boxer $boxer)
    {
        $a = [$boxer->power, $boxer->speed, $boxer->offense, $boxer->defense, $boxer->chin, $boxer->stamina];
        $a = array_sum($a);
    	return view('boxers.show', compact('boxer', 'a'));
    }
}
