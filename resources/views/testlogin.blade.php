@extends('layouts.template_acceuil')

@section('content')
<section class="content" style="position:relative;left:50%; top:100px;>
<body class="hold-transition login-page">
	<div class="login-box">
	  <div class="login-logo">
		<a href="../../index2.html">easy<b>Admin</b></a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="card">
		<div class="card-body login-card-body">
		  <p class="login-box-msg"><center><h5>Connectez vous a easyadmin</h5></center></p>
			<p>Entrez vos identifiants ci-dessous </p> 
	
		  <form action="../../index3.html" method="post">
			<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Identifiants') }}</label><br>
			<div class="input-group mb-3">
			
			  <input type="text" class="form-control" placeholder="Email">
			  <div class="input-group-append">
				<div class="input-group-text">
				  <span class="fas fa-user"></span>
				</div>
			  </div>
			</div>
			<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label><br>
			<div class="input-group mb-3">
			
			  <input type="password" class="form-control" placeholder="Password">
			  <div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-key"></span>
				</div>
			  </div>
			</div>
			 
		  </form>
	
		  <div class="social-auth-links text-center mb-3">
			<a href="#" class="btn btn-block btn-primary"></i>CONNEXION
			</a>
		  </div>
		</form>
		  <!-- /.social-auth-links -->
	
		</div>
		<!-- /.login-card-body -->
	  </div>
	</div>
	@endsection