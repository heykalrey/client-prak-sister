<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Todo List</title>
    <link rel="stylesheet" href="{{asset('style.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div class="auth-container">
      <header>
        <h1>Login</h1>
        <p>Welcome back! Please login to continue.</p>
      </header>

      <div class="auth-form-container">
        <input type="email" id="loginEmail" placeholder="Email" class="auth-input" />
        <input type="password" id="loginPassword" placeholder="Password" class="auth-input" />
        <button id="loginButton" class="btn-auth">Login</button>
        <p>Don't have an account? <a href="{{route('register')}}">Register</a></p>
      </div>
    </div>

    <script src="{{asset('script.js')}}"></script>
  </body>
</html>
