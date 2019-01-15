<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use DB;
use App\Beer;
use App\Brewery;
use App\Collection;

class AddBeersController extends Controller
{
    public function index() {
        $userId = Auth::id();

        $user_info = DB::table('users')
            ->where('users.id', '=', $userId)
            ->distinct()->get();
        
        return view('add_beer.index', compact('user_info'));
    }

    /**
     * Store a new beer.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $brewery = Brewery::firstOrCreate([
            'untappd_id' => $request['brewery_untappd_id'],
            'name' => $request['brewery_name'],
            'brewery_label' => $request['brewery_label'],
            'city' => $request['city'],
            'state' => $request['state']
        ]);

        $beer = Beer::firstOrCreate([
            'untappd_id' => $request['untappd_id'],
            'name' => $request['name'],
            'brewery_name' => $request['brewery_name'],
            'brewery_untappd_id' => $request['brewery_untappd_id'],
            'beer_label' => $request['beer_label'],
            'style' => $request['style'],
            'abv' => $request['abv']
        ]);

        $collection = Collection::firstOrNew(['user_id' => $user->id, 'beer_id' => $beer->id]);
        $collection->untappd_id = $request['untappd_id'];
        $collection->quantity = (intval($collection->quantity) + intval($request['quantity']));
        $collection->save();

        return response($beer->jsonSerialize(), Response::HTTP_CREATED);
    }
}
