<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlightTransaction;
use App\Models\FlightMaster;
use App\Models\Passenger;
use App\Models\Aircraft;


class FlightTransactionController extends Controller
{
    protected $flighttransaction;

    public function __construct(){
    
        $this->flighttransaction = new FlightTransaction();
        
    }


    public function index()
    {
    $flighttransactions=FlightTransaction::with('passenger','flightmaster','aircraft')->get();
    $passengers=Passenger::all();
    $flightmasters=FlightMaster::all();
    $aircrafts=Aircraft::all();

    return view('pages.flighttransaction.index',compact('passengers','flightmasters','aircrafts','flighttransactions'));
   
    }
    
    public function create()
    {
      
    }
    
    
    
    public function store(Request $request)
    {
      
    
        $this->flighttransaction->create($request->all());
        return redirect()->back();
    
    }
    
    
    public function show(string $id)
    {
        
       
    }
    
}






