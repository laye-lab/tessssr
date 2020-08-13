@extends('layouts.template_acceuil')

@section('content')

<div class="wrap-login100" >
      
    <form class="login100-form validate-form"  style="position: relative;bottom:200px;left:5%;">
<span class="login100-form-title p-b-34">
<center><h1> senAdmin</h1> </center>	


Connectez vous
<p>Entrez vos identifiants ci-dessous</p> 	
      </span>



  <label>{{ __('Identifiants') }}</label>

      <input id="email" type="text" class="input100" style="background-color:lightgrey;" placeholder="ecrivez ici" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <label>{{ __('Mot de passe') }}</label>
      <input id="password" type="password" style="background-color:lightgrey;"   placeholder="ecrivez ici" class="input100" ame="password" required autocomplete="current-password">

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

   
        
        <div class="container-login100-form-btn">
            <button class="login100-form-btn" style="position: relative;top:15px;">
                CONNEXION
            </button>
        </div>

    </form>

<div class="login100-more" style="background-image: url('imagelogs/nav17.png');width:35%; position: relative;right:15%;">
<aside class="main-sidebar ">
<!-- Brand Logo -->
<a  class="brand-link" style="color:white;" >
  <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">senAdmin</span>
</a>
</aside>        
</div>
</div>
</div>




<div class="container">
    <div class="row justify-content-center">
        
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                  <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
