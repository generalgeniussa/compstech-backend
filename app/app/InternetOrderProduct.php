<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternetOrderProduct extends Model
{
    protected $fillable = [
        'internet_product_id',
        'name',
        'shortcode',
        'description',
        'capped',
        'shaped',
        'cap',
        'speed',
        'price',
        'internet_category_id',
        'internet_subcategory_id'
    ];

    public function order()
    {
        return $this->belongsTo('\App\InternetOrder');
    }
}
