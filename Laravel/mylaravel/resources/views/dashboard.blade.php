<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FlightMaster - User Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .feature-card {
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .stats-card {
            border-left: 4px solid #0d6efd;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md bg-white shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-plane-departure text-primary me-2"></i>
                <strong>FlightMaster</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="fas fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('flightmaster.index') }}">
                                <i class="fas fa-calendar me-1"></i> Flight Schedule
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('flighttransaction.index') }}">
                                <i class="fas fa-ticket-alt me-1"></i> My Bookings
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i> Hello, {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('passenger.edit', Auth::user()->id) }}">
                                        <i class="fas fa-user-edit me-2"></i> Edit Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{route('account.logout')}}">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <!-- Welcome Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title">
                            <i class="fas fa-tachometer-alt text-primary me-2"></i>
                            Dashboard
                        </h4>
                        <p class="card-text">Welcome back, {{Auth::user()->name}}! Manage your flights and bookings easily.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
            <div class="col-12">
                <h5 class="mb-3">Quick Actions</h5>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm feature-card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-search me-2"></i>
                            Find Flights
                        </h5>
                        <p class="card-text">Search and book available flights for your next journey.</p>
                        <a href="{{ route('flightmaster.index') }}" class="btn btn-primary">
                            Search Flights
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm feature-card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-ticket-alt me-2"></i>
                            My Bookings
                        </h5>
                        <p class="card-text">View and manage your current flight bookings.</p>
                        <a href="{{ route('flighttransaction.index') }}" class="btn btn-primary">
                            View Bookings
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm feature-card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-user-edit me-2"></i>
                            Profile
                        </h5>
                        <p class="card-text">Update your personal information and preferences.</p>
                        <a href="{{ route('passenger.edit', Auth::user()->id) }}" class="btn btn-primary">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-history text-primary me-2"></i>
                            Recent Bookings
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Flight</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentBookings ?? [] as $booking)
                                    <tr>
                                        <td>#{{ $booking->id ?? 'N/A' }}</td>
                                        <td>{{ $booking->flight_number ?? 'N/A' }}</td>
                                        <td>{{ $booking->flight_date ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-success">{{ $booking->status ?? 'Active' }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('flighttransaction.show', $booking->id ?? 1) }}" class="btn btn-sm btn-outline-primary">
                                                View Details
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

        <!-- Help Section -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-headset fa-3x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1">Need Help?</h5>
                                <p class="mb-0">Our support team is here to assist you 24/7. Contact us anytime!</p>
                            </div>
                            <div class="flex-shrink-0">
                                <button class="btn btn-light">Contact Support</button>
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