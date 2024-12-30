<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    
    
    protected $table = 'aircrafts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'airnumber',
        'model',
        'description'
        
    ];


    public function flighttransaction()
    {
        return $this->hasMany('App\Models\FlightTransaction','aircraft_id','id');
    }

    use HasFactory;

    
}
