@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Flight Master</h3>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="form-area">
                    <form id="flightForm" method="POST" action="{{ route('flightmaster.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>DepartureCity</label>
                                <input type="text" class="form-control" name="DepartureCity" id="DepartureCity" required>
                                <small class="text-danger" id="departureCityError"></small>
                            </div>

                            <div class="col-md-6">
                                <label>ArrivalCity</label>
                                <input type="text" class="form-control" name="ArrivalCity" id="ArrivalCity" required>
                                <small class="text-danger" id="arrivalCityError"></small>
                            </div>

                            <div class="col-md-6">
                                <label>DepartureTime</label>
                                <input type="text" class="form-control" name="DepartureTime" id="DepartureTime" placeholder="HH:MM" required>
                                <small class="text-danger" id="departureTimeError"></small>
                            </div>

                            <div class="col-md-6">
                                <label>ArrivalTime</label>
                                <input type="text" class="form-control" name="ArrivalTime" id="ArrivalTime" placeholder="HH:MM" required>
                                <small class="text-danger" id="arrivalTimeError"></small>
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
                        <th scope="col">DepartureCity</th>
                        <th scope="col">ArrivalCity</th>
                        <th scope="col">DepartureTime</th>
                        <th scope="col">ArrivalTime</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($flightmasters as $key => $flightmaster)
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $flightmaster->DepartureCity }}</td>
                            <td scope="col">{{ $flightmaster->ArrivalCity }}</td>
                            <td scope="col">{{ $flightmaster->DepartureTime }}</td>
                            <td scope="col">{{ $flightmaster->ArrivalTime }}</td>
                            <td scope="col">
                                <a href="{{ route('flightmaster.edit', $flightmaster->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                
                                <form action="{{ route('flightmaster.destroy', $flightmaster->id) }}" method="POST" style="display:inline">
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
        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: #bfd2f6;
        }

        .is-invalid {
            border-color: red;
            background-color: #ffe6e6;
        }

        .text-danger {
            font-size: 0.875em;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById('flightForm').addEventListener('submit', function (e) {
            let valid = true;

            // Clear previous errors
            document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

            // Validate DepartureCity
            const departureCity = document.getElementById('DepartureCity');
            if (!departureCity.value.trim()) {
                valid = false;
                document.getElementById('departureCityError').textContent = 'Departure city is required.';
                departureCity.classList.add('is-invalid');
            } else {
                departureCity.classList.remove('is-invalid');
            }

            // Validate ArrivalCity
            const arrivalCity = document.getElementById('ArrivalCity');
            if (!arrivalCity.value.trim()) {
                valid = false;
                document.getElementById('arrivalCityError').textContent = 'Arrival city is required.';
                arrivalCity.classList.add('is-invalid');
            } else {
                arrivalCity.classList.remove('is-invalid');
            }

            // Validate DepartureTime
            const departureTime = document.getElementById('DepartureTime');
            if (!/^\d{2}:\d{2}$/.test(departureTime.value.trim())) {
                valid = false;
                document.getElementById('departureTimeError').textContent = 'Invalid time format. Use HH:MM.';
                departureTime.classList.add('is-invalid');
            } else {
                departureTime.classList.remove('is-invalid');
            }

            // Validate ArrivalTime
            const arrivalTime = document.getElementById('ArrivalTime');
            if (!/^\d{2}:\d{2}$/.test(arrivalTime.value.trim())) {
                valid = false;
                document.getElementById('arrivalTimeError').textContent = 'Invalid time format. Use HH:MM.';
                arrivalTime.classList.add('is-invalid');
            } else {
                arrivalTime.classList.remove('is-invalid');
            }

            // Prevent form submission if any validation fails
            if (!valid) {
                e.preventDefault();
            }
        });
    </script>
@endpush
