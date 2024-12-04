<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Todo List</title>
    <link rel="stylesheet" href="{{asset('style.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div class="auth-container">
      <header>
        <h1>Register</h1>
        <p>Create a new account to start using Todo List.</p>
      </header>

      <div class="auth-form-container">
        <input type="text" id="registerName" placeholder="Full Name" class="auth-input" />
        <input type="email" id="registerEmail" placeholder="Email" class="auth-input" />
        <input type="password" id="registerPassword" placeholder="Password" class="auth-input" />
        <input type="password" id="registerConfirmPassword" placeholder="Confirm Password" class="auth-input" />
        <button id="registerButton" class="btn-auth">Register</button>
        <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
      </div>
    </div>

    <script src="{{asset('script.js')}}"></script>
  </body>
</html>
