<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use DB;
use App\Beer;
use App\Brewery;
use App\Collection;

class BeersController extends Controller
{
    public function index() {
    	$userId = Auth::id();

      $user_info = DB::table('users')
          ->where('users.id', '=', $userId)
          ->distinct()->get();
      return view('beers.index', compact('user_info'));
    }

    public function show($brewery_untappd_id) {
        return view('beers.show', compact('beer'));
    }
}
