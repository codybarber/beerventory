<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use App\Beer;
use App\Brewery;
use App\Collection;

class AddBeersController extends Controller
{
    public function index() {
        return view('add_beer.index', compact('beer'));
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

        // $brewery = new Brewery();
        // $brewery->untappd_id = $request['brewery_untappd_id'];
        // $brewery->name = $request['brewery_name'];
        // $brewery->brewery_label = $request['brewery_label'];
        // $brewery->city = $request['city'];
        // $brewery->state = $request['state'];
        // $brewery->save();

        $brewery = Brewery::firstOrCreate(
            ['untappd_id' => $request['brewery_untappd_id']],
            ['name' => $request['brewery_name']],
            ['brewery_label' => $request['brewery_label']],
            ['city' => $request['city']],
            ['state' => $request['state']]
        );

        $beer = Beer::firstOrCreate(
            ['untappd_id' => $request['untappd_id']],
            ['name' => $request['name']],
            ['brewery_name' => $request['brewery_name']],
            ['brewery_untappd_id' => $request['brewery_untappd_id']],
            ['beer_label' => $request['beer_label']],
            ['style' => $request['style']],
            ['abv' => $request['abv']]
        );

        // $beer = new Beer();
        // $beer->untappd_id = $request['untappd_id'];
        // $beer->name = $request['name'];
        // $beer->brewery_name = $request['brewery_name'];
        // $beer->brewery_untappd_id = $request['brewery_untappd_id'];
        // $beer->beer_label = $request['beer_label'];
        // $beer->style = $request['style'];
        // $beer->abv = $request['abv'];
        // $beer->save();

        $collection = new Collection();
        $collection->user_id = $user->id;
        $collection->beer_id = $beer->id;
        $collection->save();

        return response($beer->jsonSerialize(), Response::HTTP_CREATED);
    }
}
