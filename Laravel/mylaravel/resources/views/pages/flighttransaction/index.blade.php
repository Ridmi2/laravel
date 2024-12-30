@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Flight Transaction</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('flighttransaction.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                        <label>seatnumber</label>
                         <input type="text" class="form-control" name="seatnumber">
                        </div>

                        <div class="col-md-6">
                            <label>date</label>
                            <input type="text" class="form-control" name="date">
                        </div>

                            <div class="col-md-6">
                                <label>FlightMaster</label>
                                <select name="passenger_id" class="form-control">
                                    <option value="">Select Passenger</option>
                                    @foreach($passengers as $passenger)
                                    <option value="{{ $passenger->id}}">{{ $passenger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                    

                            <div class="col-md-6">
                                <label>FlightMaster</label>
                                <select name="flightmaster_id" class="form-control">
                                    <option value="">Select FlightMaster</option>
                                    @foreach($flightmasters as $flightmaster)
                                    <option value="{{ $flightmaster->id}}">{{ $flightmaster->id}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label>Aircraft</label>
                                <select name="aircraft_id" class="form-control">
                                    <option value="">Select Aircraft</option>
                                    @foreach($aircrafts as $aircraft)
                                    <option value="{{ $aircraft->id}}">{{ $aircraft->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                    
            
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">seatnumber</th>
                        <th scope="col">date</th>
                        <th scope="col">amount</th>
                        <th scope="col">Passenger</th>
                        <th scope="col">FlightMaster</th>
                        <th scope="col">Aircraft</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $flighttransactions as $key => $flighttransaction )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $flighttransaction->seatnumber }}</td>
                            <td scope="col">{{ $flighttransaction->date }}</td>
                            <td scope="col">{{ $flighttransaction->amount }}</td>
                            <td scope="col">{{ $flighttransaction->Passenger->name }}</td>
                            <td scope="col">{{ $flighttransaction->FlightMaster->name }}</td>
                            <td scope="col">{{ $flighttransaction->Aircraft->name }}</td>
                            <td scope="col">

                            <a href="{{  route('flighttransaction.edit', $flighttransaction->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{ route('flightmaster.destroy', $flightmaster->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#7299ee;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush