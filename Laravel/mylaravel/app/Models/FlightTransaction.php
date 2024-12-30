<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightTransaction extends Model
{
    
    protected $table = 'flighttransactions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'seatnumber',
        'date',
        'amount',
        'passenger_id',
        'flightmaster_id',
        'aircraft_id',
        
    ];

    public function passenger()
    {
        return $this->belongsTo('App\Models\Passenger','passenger_id','id');
    }

    
    public function flightmaster()
    {
        return $this->belongsTo('App\Models\FlightMaster','flightmaster_id','id');
    }

    public function aircraft()
    {
        return $this->belongsTo('App\Models\Aircraft','aircraft_id','id');
    }
    
    use HasFactory;


}
