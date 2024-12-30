<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel 11 Multi Auth :: Register</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="card border border-light-subtle rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <h4 class="text-center">Register Here</h4>
                                        </div>
                                    </div>
                                </div>
                                <form id="registrationForm" action="{{ route('account.processRegister') }}" method="POST">
                                    @csrf 
                                    <div class="row gy-3">
                                        <!-- Name Field -->
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input 
                                                    type="text" 
                                                    value="{{ old('name') }}" 
                                                    class="form-control @error('name') is-invalid @enderror" 
                                                    name="name" 
                                                    id="name" 
                                                    placeholder="Name" 
                                                    autocomplete="name" 
                                                    required 
                                                    aria-describedby="nameHelp">
                                                <label for="name">Name</label>
                                                @error('name')
                                                    <p class="invalid-feedback" id="nameHelp">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Email Field -->
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input 
                                                    type="email" 
                                                    value="{{ old('email') }}" 
                                                    class="form-control @error('email') is-invalid @enderror" 
                                                    name="email" 
                                                    id="email" 
                                                    placeholder="name@example.com" 
                                                    autocomplete="email" 
                                                    required 
                                                    aria-describedby="emailHelp">
                                                <label for="email">Email</label>
                                                @error('email')
                                                    <p class="invalid-feedback" id="emailHelp">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Password Field -->
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input 
                                                    type="password" 
                                                    class="form-control @error('password') is-invalid @enderror" 
                                                    name="password" 
                                                    id="password" 
                                                    placeholder="Password" 
                                                    autocomplete="new-password" 
                                                    required 
                                                    aria-describedby="passwordHelp">
                                                <label for="password">Password</label>
                                                <small class="form-text text-muted" id="passwordHelp">
                                                    Must be at least 8 characters, include an uppercase letter and a number.
                                                </small>
                                                @error('password')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Password Confirmation Field -->
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input 
                                                    type="password" 
                                                    class="form-control @error('password_confirmation') is-invalid @enderror" 
                                                    name="password_confirmation" 
                                                    id="password_confirmation" 
                                                    placeholder="Confirm Password" 
                                                    autocomplete="new-password" 
                                                    required>
                                                <label for="password_confirmation">Confirm Password</label>
                                                @error('password_confirmation')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary py-3" type="submit">Register Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Login Link -->
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                            <a href="{{ route('account.login') }}" class="link-secondary text-decoration-none">Click here to login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <script>
            document.getElementById('registrationForm').addEventListener('submit', function(event) {
                let isValid = true;

                // Name validation: Only letters and spaces allowed, no special characters or numbers
                const name = document.getElementById('name');
                const nameRegex = /^[A-Za-z\s]+$/; // Only English letters and spaces
                if (!nameRegex.test(name.value.trim())) {
                    name.classList.add('is-invalid');
                    isValid = false;
                } else {
                    name.classList.remove('is-invalid');
                }

                // Email validation
                const email = document.getElementById('email');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.value.trim())) {
                    email.classList.add('is-invalid');
                    isValid = false;
                } else {
                    email.classList.remove('is-invalid');
                }

                // Password validation
                const password = document.getElementById('password');
                if (password.value.length < 6) {
                    password.classList.add('is-invalid');
                    isValid = false;
                } else {
                    password.classList.remove('is-invalid');
                }

                // Confirm password validation
                const passwordConfirmation = document.getElementById('password_confirmation');
                if (passwordConfirmation.value !== password.value) {
                    passwordConfirmation.classList.add('is-invalid');
                    isValid = false;
                } else {
                    passwordConfirmation.classList.remove('is-invalid');
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        </script>
    </body>
</html>


