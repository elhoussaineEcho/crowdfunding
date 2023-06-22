@extends('layouts.app')

@section('content')
<!-- star of register -->
<section id="register" class="">
    
                   @if(Session::has('error'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif 
      <div class="container-fluid d-flex flex-column align-items-center py-4">
        <div class="title text-center mt-5">S'inscrire</div>
        <div class="title_register container d-flex justify-content-center">
          <div class="d-inline-block pe-2 mb-5">
            Vous avez déjà un compte existant ?
          </div>
          <div class="d-inline-block mb-5">
            <a class="link_connect" href="{{route('login')}}">Connectez-vous !</a>
          </div>
        </div>

        <form class="col-8 col-sm-7 col-md-5 col-lg-4" method="POST" action="{{ route('register') }}">
        @csrf
          <div class="form-floating mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

       @error('email')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
       </span>
          @enderror
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

     @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
       @enderror
            <label for="floatingPassword">Password</label>
          </div>


          <div class="form-floating" style="margin-top:10px">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <label for="password-confirm" >{{ __('Confirm Password') }}</label>
          </div>
          <button type="submit" class="btn btn-success p-3 mt-4 w-100">
            S'INSCRIRE
          </button>
        </form>
      </div>
    </section>

 <!-- end of register -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
