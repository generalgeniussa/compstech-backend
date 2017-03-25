<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternetSubcategory extends Model
{
    protected $fillable = ['name'];

    public function internetCategory()
    {
        return $this->belongsTo('App\InternetCategory');
    }
}
