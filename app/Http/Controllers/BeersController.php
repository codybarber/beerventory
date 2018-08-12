<?php

namespace App\Http\Controllers;

use App\Beer;

class BeersController extends Controller
{
    public function index() {
        $beers = Beer::all();

        return view('beers.index', compact('beers'));
    }

    public function show(Beer $beer) {
        return view('beers.show', compact('beer'));
    }
}
