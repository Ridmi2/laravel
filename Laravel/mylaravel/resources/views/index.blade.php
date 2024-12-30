@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Flight Master</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('flightmaster.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                        <label>DepartureCity</label>
                         <input type="text" class="form-control" name="DepartureCity">
                        </div>

                        <div class="col-md-6">
                            <label>ArrivalCity</label>
                            <input type="text" class="form-control" name="ArrivalCity">
                        </div>

                        <div class="col-md-6">
                            <label>DepartureTime</label>
                             <input type="text" class="form-control" name="DepartureTime">
                            </div>

                            <div class="col-md-6">
                                <label>ArrivalTime</label>
                                <input type="text" class="form-control" name="ArrivalTime">
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
                        <th scope="col">DepartureCity</th>
                        <th scope="col">ArrivalCity</th>
                        <th scope="col">DepartureTime</th>
                        <th scope="col">ArrivalTime</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $flightmasters as $key => $flightmaster )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $flightmaster->DepartureCity }}</td>
                            <td scope="col">{{ $flightmaster->ArrivalCity }}</td>
                            <td scope="col">{{ $flightmaster->DepartureTime }}</td>
                            <td scope="col">{{ $flightmaster->ArrivalTime }}</td>
                            <td scope="col">

                            <a href="{{  route('flightmaster.edit', $flightmaster->id) }}">
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
