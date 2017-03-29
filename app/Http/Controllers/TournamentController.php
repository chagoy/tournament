<?php

namespace App\Http\Controllers;
use App\Boxer;
use App\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index() 
    {
    	$weights = Boxer::select('weight')
    		->groupBy('weight')
    		->get();
    	return view('tourney.create', compact('weights'));
    }
    public function show($weight)
    {
    	$boxers = Boxer::where('weight', $weight)
    		->get();
    	return view('tourney.show', compact('boxers'));
    }
    public function store(Request $request)
    {
    	$data = $request->input();
    	$newData = \Illuminate\Support\Arr::orderedValues($data);
    	$boxer = [];
    	foreach ($newData as $seed => $seedNo) {
    				$boxer[] = Boxer::where('id', $seedNo)->first();
    	}
		return view('tourney.bracket', compact('data', 'boxer'));
    }
}
