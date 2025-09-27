@extends('layouts.app')

@section('content')
    <div class="card">
        <h2>Login to Your Account</h2>

        {{-- Error message --}}
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>
@endsection
<script>
// Assuming this is called when the login form is submitted
function loginUser() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch('/your-backend-login-url', {  // Replace with the correct backend URL
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email, password }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // If login is successful, store the token in localStorage (this is optional for future requests)
            localStorage.setItem('auth_token', data.token); 

            // Redirect to the dashboard after successful login
            window.location.href = '/dashboard'; // Adjust this with the actual dashboard URL
        } else {
            // Handle error if login fails
            alert(data.message || 'Login failed!');
        }
    })
    .catch(error => {
        console.error('Error during login:', error);
    });
}
</script>
