<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [

    	'first_name',
		'last_name',
		'contact_number',
		'contact_email',
		'position_id',

    ];

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function gadget_logs()
    {
    	return $this->hasMany('App\Models\GadgetLog');
    }
}
