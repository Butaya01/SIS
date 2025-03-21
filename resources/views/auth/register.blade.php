<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Register</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="student_id" value="{{ old('student_id') }}" required placeholder="Student ID">
                                    @error('student_id') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}" required placeholder="Full Name">
                                    @error('name') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                                    @error('email') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <select name="course" class="form-control rounded-pill px-3 py-2" style="height: 50px; font-size: 0.8rem;" required>
                                        <option value="" disabled selected>Select Course</option>
                                        <option value="BSIT">BSIT - Bachelor of Science in Information Technology</option>
                                        <option value="BSCS">BSCS - Bachelor of Science in Computer Science</option>
                                        <option value="BSIS">BSIS - Bachelor of Science in Information Systems</option>
                                        <option value="BSEMC">BSEMC - Bachelor of Science in Entertainment and Multimedia Computing</option>
                                    </select>
                                    @error('course') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <select name="year_level" class="form-control rounded-pill px-3 py-2" style="height: 50px; font-size: 0.8rem;" required>
                                        <option value="" disabled selected>Select Year Level</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                    @error('year_level') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" required placeholder="Password">
                                        @error('password') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation" required placeholder="Confirm Password">
                                    </div>
                                </div>
                                <input type="hidden" name="role" value="student">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @push('scripts')
    <script>
    $(document).ready(function() {
        // Show student fields by default since role is now fixed to student
        $('#student-fields').show();
    });
    </script>
    @endpush
</body>

</html>
