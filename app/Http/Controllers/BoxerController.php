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
    public function category($category)
    {
        $boxers = Boxer::orderBy($category, 'desc')
            ->get();
        return view('boxers.index', compact('boxers'));
    }
    public function show(Boxer $boxer)
    {
        $a = [$boxer->power, $boxer->speed, $boxer->offense, $boxer->defense, $boxer->chin, $boxer->stamina];
        $a = array_sum($a);
    	return view('boxers.show', compact('boxer', 'a'));
    }
    public function create()
    {
        return view('boxers.create', [
            'boxers' => Boxer::all()
        ]);
    }
    public function store() 
    {
        $this->validate(request(), [
            'name' => 'required',
            'weight' => 'required'
        ]);

        Boxer::forceCreate([
            'name' => request('name'),
            'description' => request('description')
        ]);
        return ['message' => 'Project created!'];
    }
}
