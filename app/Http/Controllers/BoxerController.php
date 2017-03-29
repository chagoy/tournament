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
    	return view('boxers.show', compact('boxer'));
    }
}
