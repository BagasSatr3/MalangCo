<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
    <title>Login</title>
</head>

<body class="bg-auth">
    @include('layouts.menu')

    <div class="bg-auth">  
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" style="border-radius: 1rem; background:#ADC178;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                    
                                <div class="d-flex flex-column align-items-center">
                                    <h1>Log In</h1>
                                    <div class="text-center" >Hallo kawan KOJO
                                        <br>
                                        Silahkan login di bawah ini!
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="form-auth">
                                    @csrf
                                    <div class="mt-5">
                                        <input id="email" type="email" class="form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="current-email" autofocus placeholder="Email Address">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mt-4">
                                        <input id="password" type="password" class="form-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                         @enderror
                                    </div>
                                    <br>
                                    @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                    
                                    <br>
                                    <br>

                                    <button type="submit" class="btn-auth">
                                        {{ __('Login') }}
                                    </button>
                                    

                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>        
</body>

</html>