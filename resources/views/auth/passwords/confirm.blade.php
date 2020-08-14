@extends('layouts.app')

@section('content')
<div class="container">

 <!-- Page white section -->
 <section class="page-white-section">
        <div class="container">
            <h2>Подтверждение пароля</h2>
        </div>
    </section>
    <!-- Page white section end -->

    <div class="row justify-content-center">
        <div class="col-md-12">

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-auth">
                                    {{ __('Confirm Password') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
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
