@extends('layouts.template')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
    <title>SIGN-UP</title>
</head>
<body>
<div class="bg-auth">  
  
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-black" style="border-radius: 1rem; background:#ADC178;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h1>SIGN-UP</h1>
                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-warning">{{ $error }}
                                @endforeach
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-warning">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                <p>{{ $message }}</p>
                                </div>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                        
                            <div class="row">
                                <div class="col">
                                    @csrf
                                    <div class="mt-5">
                                        <input type="text" name="name" id="name" class="form-input form-control" autofocus placeholder="Nama">
                                    </div>
                                    <div class="mt-5">
                                        <input type="text" name="email" id="email" class="form-input form-control" autofocus placeholder="Email">
                                    </div>
                                    <div class="mt-5">
                                        <input type="text" name="alamat" id="alamat" class="form-input form-control" autofocus placeholder="Alamat">
                                    </div>
                                    <div class="mt-5">
                                        <input type="text" name="phone" id="phone" class="form-input form-control" autofocus placeholder="No Telepon">
                                    </div>
                                    <div class="mt-5">
                                        <input type="password" name="password" id="password" class="form-input form-control" autofocus placeholder="Password">
                                    </div>
                                    <div class="mt-5">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input form-control" autofocus placeholder="Confirmation Password">
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="btn-primary mb-4" style="color: black">Register</button>
                                        <p>Sudah punya akun? Login <a href="{{ route('login') }}" class="text-decoration-none">disini</a></p>
                                    </div>
                                 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection