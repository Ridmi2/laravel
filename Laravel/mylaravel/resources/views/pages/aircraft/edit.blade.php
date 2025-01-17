@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Aircraft</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('aircraft.update', $aircraft->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">

                        <div class="col-md-6">
                            <label>airnumber</label>
                            <input type="text" class="form-control" name="airnumber" value="{{ $aircraft->airnumber }}">
                        </div>

                        <div class="col-md-6">
                            <label>model</label>
                            <input type="text" class="form-control" name="model" value="{{ $aircraft->model }}">
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