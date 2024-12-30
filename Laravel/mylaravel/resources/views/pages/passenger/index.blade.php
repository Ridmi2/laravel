@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Passengers</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('passenger.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="col-md-6">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age">
                        </div>

                        <div class="col-md-6">
                            <label>Gender</label>
                            <select class="form-select" aria-label="default select example">
                            <option selected>Open this select menu</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone">

                        </div>
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
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $passengers as $key => $passenger )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $passenger->name }}</td>
                            <td scope="col">{{ $passenger->age }}</td>
                            <td scope="col">{{ $passenger->gender }}</td>
                            <td scope="col">{{ $passenger->phone }}</td>
                            <td scope="col">

                            <a href="{{  route('passenger.edit', $passenger->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>

                            <form action="{{ route('passenger.destroy', $passenger->id) }}" method="POST" style ="display:inline">
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
