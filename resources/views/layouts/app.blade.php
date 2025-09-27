<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PWD Portal' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    :root {
        --green-dark: #1b5e20;
        --green: #2e7d32;
        --green-light: #a5d6a7;
        --mint: #10b981;
        --mint-dark: #059669;
        --gray: #e0e0e0;
        --light: #f8f9fa;
        --text-dark: #212121;
        --text-light: #757575;
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(to right, #f1f8e9, #ffffff);
        color: var(--text-dark);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .header {
        background-color: var(--green-dark);
        color: white;
        padding: 1.5rem;
        text-align: center;
        font-size: 2.2rem;
        font-weight: 700;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3rem 1rem;
    }

    .card {
        background: white;
        padding: 3rem 2.5rem;
        border-radius: 1.5rem;
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        max-width: 480px;
        width: 100%;
    }

    h1, h2 {
        font-size: 2rem;
        color: var(--green);
        text-align: center;
        margin-bottom: 1.5rem;
    }

    /* Form group spacing */
.form-group {
    margin-bottom: 1.5rem;
    text-align: left;
}

    /* Labels */
label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
    color: var(--text-light);
    font-size: 0.95rem;
}

/* Input Fields (textboxes) */
.form-control {
    width: 100%;
    padding: 0.95rem 1.1rem;
    font-size: 1.05rem;
    border-radius: 0.9rem;
    border: 1px solid var(--gray);
    background-color: #fff;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--mint);
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
    outline: none;
}

    /* Common button base */
.btn {
    display: inline-block;
    padding: 0.85rem 1.5rem;
    border: none;
    border-radius: 0.8rem;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    margin: 0.5rem 0;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
}

/* Login button */
.btn-login {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-login:hover {
    background: linear-gradient(135deg, #0f766e, #047857);
    transform: scale(1.03);
    box-shadow: 0 12px 25px rgba(16, 185, 129, 0.3);
}

/* Sign Up Button - Styled same as Login */
.btn-signup {
    display: inline-block;
    width: 100%;
    padding: 0.9rem 1.1rem;
    font-size: 1.05rem;
    font-weight: 700;
    background: linear-gradient(135deg, #34d399, #4ade80);
    color: white;
    border: none;
    border-radius: 0.75rem;
    cursor: pointer;
    transition: all 0.35s ease;
    margin-top: 1rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    letter-spacing: 0.5px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
}

.btn-signup:hover {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    transform: scale(1.03);
    box-shadow: 0 12px 25px rgba(74, 222, 128, 0.3);
}

/* Forgot Password button */
.btn-forgot {
    background: linear-gradient(135deg, #e0f2f1, #b2dfdb);
    color: #00695c;
    font-size: 0.9rem;
}

.btn-forgot:hover {
    background: linear-gradient(135deg, #b2dfdb, #80cbc4);
    color: #004d40;
    transform: scale(1.03);
    box-shadow: 0 10px 20px rgba(0, 105, 92, 0.2);
}

.get-started-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 2rem;
}

.get-started-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height to center vertically */
    text-align: center;
    background: linear-gradient(to right, #f1f8e9, #ffffff); /* optional background */
}

.card {
    background: white;
    padding: 3rem 2.5rem;
    border-radius: 1.5rem;
    box-shadow: 0 15px 30px rgba(0,0,0,0.05);
    max-width: 480px;
    width: 100%;
    margin: 2rem auto;
    text-align: center;
}

.btn-get-started {
    background: linear-gradient(135deg, #16a34a, #10b981);
    color: #fff;
    padding: 1rem 2.5rem;
    font-size: 1.3rem;
    font-weight: bold;
    border: none;
    border-radius: 1.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    letter-spacing: 1px;
    margin-top: 1.5rem;
}

.btn-get-started:hover {
    background: linear-gradient(135deg, #059669, #047857);
    transform: scale(1.05);
    box-shadow: 0 14px 35px rgba(5, 150, 105, 0.4);
}

/* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9; /* Light background for high contrast */
    color: #333;
    margin: 0;
    padding: 0;
    line-height: 1.6;
}

.main-content {
    margin: 40px auto;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    max-width: 1000px;
    font-size: 18px;
}

h1 {
    text-align: center;
    font-size: 2.5em;
    margin-bottom: 30px;
    color: #2e8b57; /* Dark green color */
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
    font-size: 18px;
}

th {
    background-color: #2e8b57; /* Dark green */
    color: white;
    font-weight: bold;
}

td {
    background-color: #f3f9f3; /* Light green for rows */
    border-bottom: 1px solid #ddd;
}

td a {
    color: #2e8b57;
    text-decoration: none;
    font-weight: 600;
}

td a:hover {
    text-decoration: underline;
    color: #ffd700; /* Yellow color for links on hover */
}

/* Button Styles */
button {
    padding: 12px 20px;
    font-size: 18px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    text-align: center;
}

button:focus {
    outline: 3px solid #ffd700; /* Yellow outline for focus */
}

button[type="submit"]:first-of-type {
    background-color: #28a745; /* Green for attend */
    color: white;
}

button[type="submit"]:first-of-type:hover {
    background-color: #218838; /* Darker green */
    transform: scale(1.05);
}

button[type="submit"]:last-of-type {
    background-color: #dc3545; /* Red for absent */
    color: white;
}

button[type="submit"]:last-of-type:hover {
    background-color: #c82333; /* Darker red */
    transform: scale(1.05);
}

/* Accessibility: High Contrast & User Focus */
a {
    font-size: 18px;
    font-weight: 600;
    margin-left: 10px;
    transition: color 0.3s ease;
}

a:hover {
    color: #ffd700; /* Yellow hover effect */
}

a:focus {
    outline: 3px solid #ffd700; /* Yellow focus outline */
}

/* Forms */
form {
    margin-top: 15px;
}

form button {
    margin-right: 10px;
}

/* Accessibility: Focus States for Accessibility */
button:focus, a:focus {
    outline: 3px solid #ffd700; /* Yellow outline for easy identification of focus */
}

h1, p {
    color: #2e8b57; /* Green text for headings and paragraph */
}

/* Responsive Design for Mobile and Tablets */
@media (max-width: 768px) {
    table {
        font-size: 16px;
    }

    th, td {
        padding: 12px;
    }

    h1 {
        font-size: 2em;
    }

    button {
        font-size: 16px;
        padding: 10px 18px;
    }

    a {
        font-size: 16px;
    }
}

/* Visual Aid for Users with Low Vision (high contrast) */
body {
    background-color: #fff;
    color: #333;
}

button, a {
    transition: all 0.2s ease-in-out;
}

button:focus, a:focus {
    outline: 4px solid #ffd700;
    background-color: #2e8b57; /* Provide contrast when focused */
}



    .alert {
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-radius: 0.75rem;
        font-size: 0.95rem;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
    }

    .alert-danger {
        background-color: #ffebee;
        color: #c62828;
    }

    .form-footer {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .form-footer a {
        color: var(--green);
        text-decoration: none;
        font-weight: 600;
    }

    .form-footer a:hover {
        text-decoration: underline;
    }

    footer {
        text-align: center;
        padding: 1rem;
        font-size: 0.9rem;
        color: #888;
        background-color: #f1f8e9;
    }

    @media (max-width: 576px) {
        .card {
            padding: 2rem 1.5rem;
        }

        .header {
            font-size: 1.5rem;
        }

        .btn {
            font-size: 1rem;
        }
    }
</style>
</head>
<body>
    <div class="header">
        PWD Portal with Analytics for Admin
    </div>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} PWD Portal - All rights reserved.
    </footer>
</body>
</html>
