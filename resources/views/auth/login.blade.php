@extends('layouts.app')

@section('title')
    Авторизация
@endsection

@section('content')
<div class="container">

     <!-- Page white section -->
     <section class="page-white-section">
        <div class="container">
            <h2>Авторизация</h2>
        </div>
    </section>
    <!-- Page white section end -->

    <div class="row justify-content-center">
        <div class="col-md-12">
            
                                   
                    <form class="auth-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check"> 
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}> 
                                        <label class="custom-control-label" for="remember">Запомнить меня</label>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn button btn primary-btn btn-auth">
                                    Войти
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link btn-style-blue" href="{{ route('password.request') }}">
                                        Забыли пароль?
                                    </a>
                                @endif -->

                                @if (Route::has('register'))
                                    <a class="btn btn-link btn-style-blue" href="{{ route('register') }}">
                                        Зарегистрироватся?                                      
                                    </a>
                                @endif
                               
                            </div>
                        </div>
                    </form>  

        </div>
    </div>

     <!-- Page white section -->
     <section class="page-white-section">
        <div class="container">

        </div>
    </section>
    <!-- Page white section end -->

</div>
@endsection
