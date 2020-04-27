<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $fillable = [
        'ingredients',
        'instructions', 
        'title',
        'desc',
        'prep',
        'cook',
        'regimen',
        'created_by'
    ];

        /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'title' => 'delicious recipe',
    ];
}
