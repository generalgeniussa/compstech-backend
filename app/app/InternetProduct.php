<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternetProduct extends Model
{
    protected $fillable = [
        'name',
        'shortcode',
        'description',
        'capped',
        'shaped',
        'cap',
        'speed',
        'price'
    ];

    public function internetSubcategory()
    {
        return $this->belongsTo('\App\InternetSubcategory');
    }

    public function internetCategory()
    {
        return $this->belongsTo('\App\InternetCategory');
    }
}
