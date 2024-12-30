@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Passenger</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('flightmaster.update', $flightmaster->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">

                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="DepartureCity" value="{{ $flightmaster->DepartureCity }}">
                        </div>

                        <div class="col-md-6">
                            <label>Age</label>
                            <input type="text" class="form-control" name="ArrivalCity" value="{{ $flightmaster->ArrivalCity }}">
                        </div>

                        
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" name="DepartureTime" value="{{ $flightmaster->DepartureTime }}">
                            </div> 

                            <div class="col-md-6">
                                <label>Age</label>
                                <input type="text" class="form-control" name="ArrivalTime" value="{{ $flightmaster->ArrivalTime }}">
                            </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#bfd2f6;
        }

        .bi-trash-fill{
            color:rgb(21, 2, 2);
            font-size: 18px;
        }

        .bi-pencil{
            color:rgb(128, 28, 0);
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush