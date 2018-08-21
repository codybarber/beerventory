<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'untappd_id',
        'name',
        'brewery_label',
        'city',
        'state',
    ];
}
