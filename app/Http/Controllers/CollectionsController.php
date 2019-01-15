<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use DB;
use App\Beer;
use App\Brewery;

class CollectionsController extends Controller
{
	/**
     * Update a beer in collection.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $collection = Collection::firstOrNew([
            'user_id' => $user->id, 
            'beer_id' => $request['beer_id']
        ]);
        $collection->untappd_id = $request['untappd_id'];
        $collection->quantity = $request['quantity'];
        $collection->save();

        return response('');
    }

    /**
     * Delete a beer from the collection.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();

        $collection = Collection::firstOrNew(['user_id' => $user->id, 'beer_id' => $request['beer_id']]);
        $collection->quantity = 0;
        $collection->save();

        return response('');
    }
}
