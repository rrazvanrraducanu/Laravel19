<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Validator;
use Request;
use App\Flower;


class FlowersController extends Controller
{
    public function index()
    {
        $flowers = Flower::all();
        return view('pages.flowers')->with('title', 'Flowers data')
            ->with('flowers', $flowers);
    }

    public function show($nume)
    {
        //select * from flowers where flower=$flower LIMIT 1
        $flower = Flower::where('nume', '=', $nume)->first();
        return view('flowers.showflower', ['flower' => $flower]);
    }
    public function add(){
        return view('pages.flowers.addflower');
    }

    public function store()
    {
        $validation = Validator::make(Request::all(), [
            'nume' => 'required',
            'culoare' => 'required',
            'marime' => 'required',
            'pret' => 'required'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation->messages());
        }
        $flower = new Flower;
        $flower->nume = Request::input('nume');
        $flower->marime = Request::input('marime');
        $flower->culoare = Request::input('culoare');
        $flower->pret = Request::input('pret');
        $flower->save();

        return redirect('/flowers');
    }
}
