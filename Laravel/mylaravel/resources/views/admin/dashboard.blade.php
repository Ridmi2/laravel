<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FlightMaster - Admin Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .stat-card {
            transition: transform 0.3s;
            border-radius: 10px;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .nav-link {
            padding: 0.8rem 1rem;
        }
        .nav-link:hover {
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .action-card {
            border-left: 4px solid #0d6efd;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark shadow-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-plane-departure me-2"></i>
                <strong>FlightMaster Admin</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <i class="fas fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Admin Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" data-bs-toggle="dropdown">
                                <i class="fas fa-user-shield me-2"></i>Hello, {{Auth::guard('admin')->user()->name}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block bg-white shadow-sm sidebar collapse mt-4 rounded">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('flightmaster.index') }}">
                                <i class="fas fa-plane me-2"></i>Flight Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aircraft.index') }}">
                                <i class="fas fa-plane-departure me-2"></i>Aircraft Registry
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('passenger.index') }}">
                                <i class="fas fa-users me-2"></i>Passenger Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('flighttransaction.index') }}">
                                <i class="fas fa-ticket-alt me-2"></i>Flight Transactions
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 ms-sm-auto px-md-4 mt-4">
                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-12 col-sm-6 col-xl-3 mb-4">
                        <div class="card border-0 shadow stat-card bg-primary text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title mb-0">Total Flights</h5>
                                        <h2 class="fw-bold mb-0">{{ $totalFlights ?? '150' }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-plane fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mb-4">
                        <div class="card border-0 shadow stat-card bg-success text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title mb-0">Active Aircraft</h5>
                                        <h2 class="fw-bold mb-0">{{ $activeAircraft ?? '25' }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-plane-departure fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mb-4">
                        <div class="card border-0 shadow stat-card bg-info text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title mb-0">Total Passengers</h5>
                                        <h2 class="fw-bold mb-0">{{ $totalPassengers ?? '1,250' }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 mb-4">
                        <div class="card border-0 shadow stat-card bg-warning text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title mb-0">Today's Bookings</h5>
                                        <h2 class="fw-bold mb-0">{{ $todayBookings ?? '45' }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-ticket-alt fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white">
                                <h5 class="card-title mb-0">Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <a href="{{ route('flightmaster.create') }}" class="btn btn-primary w-100">
                                            <i class="fas fa-plus-circle me-2"></i>Add New Flight
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('aircraft.create') }}" class="btn btn-success w-100">
                                            <i class="fas fa-plane-arrival me-2"></i>Register Aircraft
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('passenger.create') }}" class="btn btn-info w-100 text-white">
                                            <i class="fas fa-user-plus me-2"></i>Add Passenger
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('flighttransaction.create') }}" class="btn btn-warning w-100 text-white">
                                            <i class="fas fa-ticket-alt me-2"></i>New Booking
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Recent Transactions</h5>
                                <a href="{{ route('flighttransaction.index') }}" class="btn btn-sm btn-primary">
                                    View All
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Flight No</th>
                                                <th>Passenger</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentTransactions ?? [] as $transaction)
                                            <tr>
                                                <td>#{{ $transaction->id ?? '12345' }}</td>
                                                <td>{{ $transaction->flight_number ?? 'FM101' }}</td>
                                                <td>{{ $transaction->passenger_name ?? 'John Doe' }}</td>
                                                <td>{{ $transaction->date ?? '2024-12-30' }}</td>
                                                <td>
                                                    <span class="badge bg-success">{{ $transaction->status ?? 'Confirmed' }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('flighttransaction.show', $transaction->id ?? 1) }}" 
                                                       class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('flighttransaction.edit', $transaction->id ?? 1) }}" 
                                                       class="btn btn-sm btn-outline-warning me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>