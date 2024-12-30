<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightMaster extends Model
{
    protected $table = 'flightmasters';
    protected $primaryKey = 'id';
    protected $fillable = [
        'DepartureCity',
        'ArrivalCity',
        'DepartureTime',
        'ArrivalTime'
    ];

    public function flighttransaction()
    {
        return $this->hasMany('App\Models\FlightTransaction','flightmaster_id','id');
    }

    use HasFactory;

}
