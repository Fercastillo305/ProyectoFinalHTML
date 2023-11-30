<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    
    <!-- Agrega la referencia a tu hoja de estilos aquí -->
    <link rel="stylesheet" href="{{ asset('resources/css/sesion.css') }}">

    
</head>
<body>
<div id="login">
  <form id="register_form" action="{{ route('register') }}" method="POST">
    @csrf

    <div class="field_container">
      <input type="text" placeholder="Nombre" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="field_container">
      <input type="email" placeholder="Email Address" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
      @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="field_container">
      <input type="password" placeholder="Password" class="form-control" id="password" name="password" required autocomplete="new-password">
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="field_container">
      <input type="password"placeholder="Confirm Password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="field_container">
      <button type="submit" class="btn btn-primary" id="sign_in_button">
        Register
      </button>
    </div>
  </form>
</div>
