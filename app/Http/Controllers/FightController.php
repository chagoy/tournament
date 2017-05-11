<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boxer;

class FightController extends Controller
{
    public function index() 
    {
    	$weights = Boxer::select('weight')
    		->groupBy('weight')
    		->get();
    	return view('fight.index', compact('weights'));
    }
    public function show($weight)
    {
    	$boxers = Boxer::where('weight', $weight)
    		->get();
    	return view('fight.show', compact('boxers'));
    }
}
