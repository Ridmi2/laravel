<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlightMaster - Aviation Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="bg-gradient-to-r from-blue-700 to-blue-900 text-white shadow-xl">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <i class="fas fa-plane-departure text-2xl"></i>
                    <span class="text-2xl font-bold">FlightMaster</span>
                </div>
                <div class="space-x-6">
                    @auth
                        <a href="{{ route('account.dashboard') }}" class="hover:text-blue-200">
                            <i class="fas fa-tachometer-alt mr-2"></i>User Dashboard
                        </a>
                        <a href="{{ route('account.logout') }}" class="hover:text-blue-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    @else
                        <a href="{{ route('account.login') }}" class="hover:text-blue-200">
                            <i class="fas fa-user mr-2"></i>User Login
                        </a>
                        <a href="{{ route('account.register') }}" class="hover:text-blue-200">
                            <i class="fas fa-user-plus mr-2"></i>Register
                        </a>
                        <a href="{{ route('admin.login') }}" class="bg-yellow-500 px-4 py-2 rounded-lg hover:bg-yellow-600">
                            <i class="fas fa-lock mr-2"></i>Admin Portal
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-white">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-transparent opacity-90"></div>
        <div class="container mx-auto px-6 py-32 relative">
            <div class="max-w-2xl text-white">
                <h1 class="text-5xl font-bold mb-6">Welcome to FlightMaster</h1>
                <p class="text-xl mb-8">Your comprehensive aviation management solution for seamless flight operations</p>
                @guest
                    <div class="space-x-4">
                        <a href="{{ route('account.register') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                            Get Started
                        </a>
                        <a href="{{ route('account.login') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg hover:bg-white hover:text-blue-900 transition">
                            Sign In
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- User Section -->
    <div class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Passenger Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Flight Booking</h3>
                <p class="text-gray-600 mb-4">Easy and quick flight reservations with real-time availability</p>
                @auth
                    <a href="{{ route('flighttransaction.create') }}" class="text-blue-600 hover:text-blue-800">
                        Book Now →
                    </a>
                @endauth
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Passenger Profile</h3>
                <p class="text-gray-600 mb-4">Manage your profile and view booking history</p>
                @auth
                    <a href="{{ route('passenger.index') }}" class="text-blue-600 hover:text-blue-800">
                        View Profile →
                    </a>
                @endauth
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-plane"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Flight Schedule</h3>
                <p class="text-gray-600 mb-4">Check available flights and their schedules</p>
                @auth
                    <a href="{{ route('flightmaster.index') }}" class="text-blue-600 hover:text-blue-800">
                        View Flights →
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Admin Section -->
    @auth('admin')
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Administrative Controls</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="fas fa-plane-departure"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Flight Management</h3>
                    <p class="text-gray-600 mb-4">Manage flight schedules and routes</p>
                    <a href="{{ route('flightmaster.index') }}" class="text-indigo-600 hover:text-indigo-800">
                        Manage →
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="fas fa-plane"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Aircraft Registry</h3>
                    <p class="text-gray-600 mb-4">Maintain aircraft fleet information</p>
                    <a href="{{ route('aircraft.index') }}" class="text-indigo-600 hover:text-indigo-800">
                        Manage →
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Passenger Database</h3>
                    <p class="text-gray-600 mb-4">Access and manage passenger information</p>
                    <a href="{{ route('passenger.index') }}" class="text-indigo-600 hover:text-indigo-800">
                        Manage →
                    </a>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Transactions</h3>
                    <p class="text-gray-600 mb-4">Monitor and manage flight transactions</p>
                    <a href="{{ route('flighttransaction.index') }}" class="text-indigo-600 hover:text-indigo-800">
                        Manage →
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <!-- Features Section -->
    <div class="bg-gradient-to-b from-blue-50 to-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose FlightMaster?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Secure System</h3>
                    <p class="text-gray-600">Advanced security measures to protect your data</p>
                </div>

                <div class="text-center">
                    <div class="bg-blue-100 rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-tachometer-alt text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Real-time Updates</h3>
                    <p class="text-gray-600">Instant updates on flight status and bookings</p>
                </div>

                <div class="text-center">
                    <div class="bg-blue-100 rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                        <i class="fas fa-headset text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Round-the-clock customer support assistance</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-4">About FlightMaster</h4>
                    <p class="text-gray-400">Your trusted aviation management system for efficient flight operations.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('account.login') }}" class="hover:text-white">Login</a></li>
                        <li><a href="{{ route('account.register') }}" class="hover:text-white">Register</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-white">Admin Portal</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2"></i> support@flightmaster.com</li>
                        <li><i class="fas fa-phone mr-2"></i> +1 (555) 123-4567</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} FlightMaster. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>