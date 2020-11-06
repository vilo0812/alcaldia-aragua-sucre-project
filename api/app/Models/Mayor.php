<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mayor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function departaments()
    {
    	return $this->hasMany('App\Models\Departament');
    }

}
