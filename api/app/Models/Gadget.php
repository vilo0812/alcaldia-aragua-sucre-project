<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gadget extends Model
{
    use HasFactory;

    protected $fillable = [

    	'name',
		'code',
		'status',
		'departament_id',

    ];

    public function departament()
    {
        return $this->belongsTo('App\Models\Departament');
    }

    public function gadget_logs()
    {
    	return $this->hasMany('App\Models\GadgetLog');
    }

}
