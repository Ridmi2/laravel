@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Passenger</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('passenger.update', $passenger->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $passenger->name }}">
                        </div>
                        <div class="col-md-6">
                            <label>Age</label>
            <input type="text" class="form-control" name="age" value="{{ $passenger->age }}">
                        </div>

                        <div class="col-md-6">
             <label>Gender</label>
        <select class="form-select" aria-label="default select example" value="{{ $passenger->gender }}">
                            <option selected>Open this select menu</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $passenger->phone }}">
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
            background-color:#c957ac;
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