<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'untappd_id',
        'name',
        'brewery_name',
        'brewery_untappd_id',
        'beer_label',
        'style',
        'year',
        'abv',
        // 'value',
        // 'purchase_date',
        // 'purchase_location',
        // 'purchase_location_city',
        // 'purchase_location_state',
    ];
}
