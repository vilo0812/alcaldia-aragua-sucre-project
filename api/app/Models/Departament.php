<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

      public function gadgets()
    {
    	return $this->hasMany('App\Models\Gadget');
    }

     public function mayor()
    {
    	return $this->belongsTo('App\Models\Mayor');
    }
}
