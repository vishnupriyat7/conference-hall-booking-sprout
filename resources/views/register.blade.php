@extends('layout.authlayout')

@section('content')

    <body class="bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h2 text-gray-900 mb-4">Register</h1>
                                        </div>

                                        {{-- <h1>Register</h1> --}}

                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p style="color:red;">{{ $error }}</p>
                                            @endforeach
                                        @endif

                                        <form action="{{ route('register') }}" method="POST" class="user"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="text" name="name" class="form-control form-control-user "
                                                id="exampleInputName" placeholder="Name">
                                            <br><br>
                                            <input type="email" name="email" class="form-control form-control-user "
                                                id="exampleInputEmail" placeholder="Email Address">

                                            <input type="hidden" name="role" value="0">
                                            <br><br>
                                            <input type="password" name="password" class="form-control form-control-user "
                                                id="exampleInputPassword" placeholder="Password">
                                            <br><br>
                                            <input type="password" name="password_confirmation"
                                                class="form-control form-control-user " id="exampleInputPassword"
                                                placeholder="Password">
                                            <br><br>
                                            <input type="submit" value="Register">

                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('login') }}">Already Have an Account!</a>
                                        </div>

                                        @if (Session::has('success'))
                                            <p style="color:green;">{{ Session::get('success') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
