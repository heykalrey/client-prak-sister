<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Todo List</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="auth-container">
        <header>
            <h1>Register</h1>
            <p>Create a new account to start using Todo List.</p>
        </header>
        <form action="{{ route('register_post') }}" method="POST" class="auth-form-container">
            @csrf
            <input type="text" placeholder="Full Name" class="auth-input" name="name" />
            <input type="text" placeholder="User Name" class="auth-input" name="username" />
            <input type="email" placeholder="Email" class="auth-input" name="email" />
            <input type="password" placeholder="Password" class="auth-input" name="password" />
            <button type="submit" class="btn-auth">Register</button>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </form>
    </div>
</body>

</html>
