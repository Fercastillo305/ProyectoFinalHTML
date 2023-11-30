<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <!-- Agrega la referencia a tu hoja de estilos aquí -->
    <link rel="stylesheet" href="{{ asset('resources/css/sesion.css') }}">

    
</head>
<body>
<div id="login">
  <form id="login_form" action="{{ route('login') }}" method="POST">
    @csrf

    <div class="field_container">
      <input type="email" placeholder="Email Address" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="field_container">
      <input type="password" placeholder="Password" class="form-control" id="password" name="password" required autocomplete="current-password">
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="field_container">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Remember Me</label>
      </div>
    </div>

    <div class="field_container">
      <button type="submit" class="login_link" id="sign_in_button">
        Sign In
      </button>

     
        </a>
     
    </div>
  </form>

  <div id="dont_have_an_account">
    <h2>
      Necesitas <a href="/register" class="login_link">crear</a> una cuenta?
    </h2>
  </div>
</div>
