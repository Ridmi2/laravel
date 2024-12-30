<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - Laravel</title>
        <meta name="description" content="Login page for Laravel">
        <meta name="author" content="Your Name">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <!-- Card Container -->
                        <div class="card border border-light-subtle rounded-4 shadow-sm">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <!-- Header -->
                                <div class="text-center mb-5">
                                    <h4 class="fw-bold">Login Here</h4>
                                </div>

                                <!-- Flash Messages -->
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif

                                <!-- Login Form -->
                                <form action="{{ route('account.authenticate') }}" method="POST">
                                    @csrf
                                    <div class="row gy-3">
                                        <!-- Email Input -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input
                                                    type="text"
                                                    value="{{ old('email') }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email"
                                                    id="email"
                                                    placeholder="name@example.com">
                                                <label for="email" class="form-label">Email</label>
                                                @error('email')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Password Input -->
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input
                                                    type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password"
                                                    id="password"
                                                    placeholder="Password">
                                                <label for="password" class="form-label">Password</label>
                                                @error('password')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary py-3" type="submit">Log in now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Footer Links -->
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <div class="d-flex gap-2 flex-column flex-md-row justify-content-center">
                                            <a href="{{ route('account.register') }}" class="link-secondary text-decoration-none">Create new account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Card -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>
</html>
