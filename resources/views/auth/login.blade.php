@extends('layouts.app')

@section('content')
<!-- star login  -->
<section id="login" class="">
@if(Session::has('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif
                   @if(Session::has('error'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif 
      <div
        class="container-fluid d-flex justify-content-center align-items-center py-4"
      >
        <form class="col-8 col-sm-7 col-md-5 col-lg-4" method="POST"  action="{{ route('login')}}">
        @csrf
          <div class="title text-center mt-5 mb-5">Se connecter</div>

          <div class="form-floating mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
             </span>
                @enderror
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                          <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                @enderror
            <label for="floatingPassword">Password</label>
          </div>

          <div class="my-3">
            @if (Route::has('password.request'))
                                    <a class="forget_pass" href="{{ route('password.request') }}">
                                        {{ __('Vous avez oublié votre mot de passe ??') }}
                                    </a>
                                @endif
          </div>

          <button type="submit" class="btn btn-success p-3 mb-2 w-100">
            SE CONNECTER
          </button>

          <div class="title_register container d-flex justify-content-center">
            <div class="d-inline-block pe-2">Première fois sur Toogether ?</div>
            <div class="d-inline-block">
              <a class="link_register" href="{{ route('register') }}">Inscrivez-vous !</a>
            </div>
          </div>
        </form>
      </div>
    </section>

<!-- end login -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                   @if(Session::has('success'))
                   <div class="alert">{{Session::get('success')}}</div> 
                   @endif
                   @if(Session::has('error'))
                   <div class="alert alert-denger">{{Session::get('error')}}</div> 
                   @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
