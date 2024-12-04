<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Todo List</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="auth-container">
        <header>
            <h1>Login</h1>
            <p>Welcome back! Please login to continue.</p>
        </header>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login_post') }}" method="post" class="auth-form-container">
            @csrf
            <input type="email" placeholder="Email" class="auth-input" name="email"/>
            <input type="password" placeholder="Password" class="auth-input" name="password"/>
            <button type="submit" class="btn-auth">Login</button>
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
</body>

</html>
