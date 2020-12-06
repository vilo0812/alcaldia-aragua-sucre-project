<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GadgetLog extends Model
{
    use HasFactory;
    protected $table = 'gadget_logs';
    protected $fillable = [

    	'description',
		'employee_id',
		'gadget_id',

    ];

     public function gadget()
    {
        return $this->belongsTo('App\Models\Gadget');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

}
