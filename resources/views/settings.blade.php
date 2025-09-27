@extends('layouts.app')

@section('content')
    <style>
        :root {
            --main-green: #2e7d32;
            --light-green: #66bb6a;
            --yellow: #fdd835;
            --bg-color: #f9fbe7;
            --text-color: #1a1a1a;
        }

        body {
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease, font-size 0.3s ease;
            margin: 0;
            padding: 0;
        }

        /* Themes */
        .theme-light {
            background-color: #f0fdf4;
            color: #1f2937;
        }

        .theme-dark {
            background-color: #1f2937;
            color: #f9fafb;
        }

        .theme-green {
            background-color: #d1fae5;
            color: #065f46;
        }

        /* Font Sizes */
        .text-sm {
            font-size: 0.875rem;
        }

        .text-base {
            font-size: 1rem;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        /* Ensure inputs and selects inherit text color in dark theme */
        .theme-dark input,
        .theme-dark select,
        .theme-dark textarea {
            background-color: #374151;
            color: #f9fafb;
            border-color: #4b5563;
        }

        .theme-dark input::placeholder,
        .theme-dark textarea::placeholder {
            color: #9ca3af;
        }

        .theme-dark select option {
            background-color: #374151;
            color: #f9fafb;
        }

        /* Focus ring override for dark theme */
        .theme-dark input:focus,
        .theme-dark select:focus,
        .theme-dark textarea:focus {
            border-color: #facc15;
            box-shadow: 0 0 0 3px rgb(250 204 21 / 0.5);
            outline: none;
        }


        /* Sidebar styles */
        .sidebar {
            width: 16rem;
            min-height: 100vh;
            background-color: var(--main-green);
            color: white;
            padding: 1.5rem;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 50;
        }

        .sidebar h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--yellow);
            text-align: center;
        }

        .sidebar nav a {
            display: block;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-weight: 500;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background-color: var(--light-green);
        }

        .sidebar nav a i {
            margin-right: 0.5rem;
        }

        /* Main content styles */
        .main-content {
            margin-left: 16rem; /* same as sidebar width */
            padding: 2rem 3rem;
            min-height: 100vh;
            background-color: var(--bg-color);
            color: var(--text-color);
            box-sizing: border-box;
        }

        h1.page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            color: var(--main-green);
        }

        h1.page-title i {
            margin-right: 0.75rem;
            color: var(--yellow);
        }

        form.settings-form {
            background: white;
            border-radius: 1rem;
            padding: 2.5rem 3rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
            max-width: 720px;
        }

        form.settings-form section {
            margin-bottom: 3rem;
        }

        form.settings-form section h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            color: var(--main-green);
        }

        form.settings-form section h2 i {
            margin-right: 0.75rem;
            color: var(--yellow);
        }

        form.settings-form label {
            display: block;
            font-weight: 600;
            color: #065f46;
            margin-bottom: 0.5rem;
        }

        form.settings-form input[type="text"],
        form.settings-form input[type="email"],
        form.settings-form input[type="tel"],
        form.settings-form input[type="password"],
        form.settings-form select,
        form.settings-form textarea {
            width: 100%;
            border: 1px solid #a7d39c;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            color: var(--text-color);
            background: white;
            box-sizing: border-box;
        }

        form.settings-form input[type="text"]:focus,
        form.settings-form input[type="email"]:focus,
        form.settings-form input[type="tel"]:focus,
        form.settings-form input[type="password"]:focus,
        form.settings-form select:focus,
        form.settings-form textarea:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 3px rgba(102, 187, 106, 0.25);
            outline: none;
        }

        form.settings-form p.info {
            max-width: 30rem;
            color: #2e7d32;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        form.settings-form p.info a {
            color: var(--yellow);
            text-decoration: underline;
        }

        form.settings-form .grid-two-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        form.settings-form .full-width {
            grid-column: 1 / -1;
        }

        form.settings-form button[type="submit"] {
            background-color: var(--main-green);
            color: white;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 1rem;
            font-size: 1.125rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }

        form.settings-form button[type="submit"]:hover {
            background-color: #276127;
            transform: translateY(-2px);
        }

        form.settings-form button[type="submit"]:active {
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
                flex-direction: row;
                padding: 0.5rem 1rem;
                justify-content: space-around;
            }

            .sidebar h2 {
                display: none;
            }

            .sidebar nav a {
                margin-bottom: 0;
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem 1.5rem;
            }

            form.settings-form {
                padding: 1.5rem 2rem;
            }

            form.settings-form .grid-two-cols {
                grid-template-columns: 1fr;
            }

            form.settings-form .full-width {
                grid-column: auto;
            }
        }
    </style>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <nav>
                <a href="/dashboard"><i class="fas fa-chart-bar"></i> Dashboard</a>
                <a href="/attendance"><i class="fas fa-clipboard-list"></i> Attendance</a>
                <a href="/reports"><i class="fas fa-chart-line"></i> Reports</a>
                <a href="/announcements"><i class="fas fa-bullhorn"></i> Announcements</a>
                <a href="/classifications"><i class="fas fa-folder-open"></i> Classifications</a>
                <a href="/addacc"><i class="fas fa-user-plus"></i> Add Account</a>
                <a href="/settings" class="active"><i class="fas fa-cog"></i> Settings</a>
                <a href="/logupchoose" style="margin-top: auto; background-color: #ef4444; border-radius: 0.5rem; padding: 0.5rem 1rem; color: white; text-align: center;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <h1 class="page-title"><i class="fas fa-cog"></i> Settings</h1>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('settings.update') }}" class="settings-form" novalidate>
                @csrf
                @method('PUT')

                <!-- Account Information -->
                <section>
                    <h2><i class="fas fa-user"></i> Account Information</h2>
                    <div class="grid-two-cols">
                        <div>
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="fullName" value="{{ old('fullName', $user->name ?? '') }}" required />
                        </div>
                        <div class="full-width">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required />
                        </div>
                        <div class="full-width">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="+63 912 345 6789" value="{{ old('phone', $user->phone ?? '') }}" pattern="^\+63\s9\d{2}\s\d{3}\s\d{4}$" />
                        </div>
                    </div>
                </section>

                <!-- Password Management -->
                <section>
                    <h2><i class="fas fa-lock"></i> Password Management</h2>
                    <p class="info">
                        To change your password, please enter your current password and your new password below.
                        If you forgot your password, use the <a href="/password/recover">password recovery</a> page.
                    </p>
                    <div class="grid-two-cols">
                        <div>
                            <label for="currentPassword">Current Password</label>
                            <input type="password" id="currentPassword" name="currentPassword" autocomplete="current-password" />
                        </div>
                        <div>
                            <label for="newPassword">New Password</label>
                            <input type="password" id="newPassword" name="newPassword" autocomplete="new-password" />
                        </div>
                        <div class="full-width">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" autocomplete="new-password" />
                        </div>
                    </div>
                </section>

                <!-- Font Size Settings -->
                <section>
                    <h2><i class="fas fa-text-height"></i> Font Size</h2>
                    <select id="fontSizeSelect" onchange="applySettings()">
                        <option value="text-sm">Small</option>
                        <option value="text-base" selected>Medium</option>
                        <option value="text-lg">Large</option>
                    </select>
                </section>

                <!-- Theme Settings -->
                <section>
                    <h2><i class="fas fa-palette"></i> Theme Settings</h2>
                    <select id="themeSelect" onchange="applySettings()">
                        <option value="theme-light">Light</option>
                        <option value="theme-dark">Dark</option>
                        <option value="theme-green" selected>Green</option>
                    </select>
                </section>

                <!-- Submit Button -->
                <button type="submit">Save Settings</button>
            </form>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Retrieve saved settings
            const savedTheme = localStorage.getItem('theme') || 'theme-green';
            const savedFontSize = localStorage.getItem('fontSize') || 'text-base';

            // Apply saved settings
            document.body.classList.add(savedTheme);
            document.body.classList.add(savedFontSize);
            document.getElementById('themeSelect').value = savedTheme;
            document.getElementById('fontSizeSelect').value = savedFontSize;
        });

        function applySettings() {
            const theme = document.getElementById('themeSelect').value;
            const fontSize = document.getElementById('fontSizeSelect').value;

            // Remove old theme and font size classes
            document.body.classList.remove('theme-light', 'theme-dark', 'theme-green');
            document.body.classList.remove('text-sm', 'text-base', 'text-lg');

            // Add new classes
            document.body.classList.add(theme);
            document.body.classList.add(fontSize);

            // Save settings to localStorage
            localStorage.setItem('theme', theme);
            localStorage.setItem('fontSize', fontSize);
        }
    </script>
@endsection