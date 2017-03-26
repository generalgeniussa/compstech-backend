<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternetCategory extends Model
{
    protected $fillable = ['name'];

    public function subcategories()
    {
        return $this->hasMany('App\InternetSubcategory');
    }
}
