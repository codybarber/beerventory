<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('dashboard.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userId = Auth::id();

        $user_beers = DB::table('beers')
            ->leftJoin('collections', 'beers.id', '=', 'collections.beer_id')
            ->where('collections.user_id', '=', $userId)
            ->distinct()->get();

        return compact('user_beers');
    }
}
