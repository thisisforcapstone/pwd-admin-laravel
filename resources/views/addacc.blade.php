<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register President Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass {
            background: rgba(255,255,255,0.92);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
            backdrop-filter: blur(8px);
            border-radius: 2rem;
            border: 1.5px solid rgba(34,197,94,0.12);
        }
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #22c55e;
        }
        .input-group {
            position: relative;
        }
        .input-group input, .input-group select, .input-group textarea {
            padding-left: 2.5rem !important;
        }
        .input-group .input-icon {
            pointer-events: none;
        }
        .sidebar {
            box-shadow: 2px 0 16px 0 rgba(34,197,94,0.08);
        }
        .sidebar a.active, .sidebar a[aria-current="page"] {
            background: linear-gradient(90deg, #22c55e 60%, #16a34a 100%);
            color: #fff !important;
            font-weight: 700;
        }
        .sidebar a:hover:not(.active) {
            background: #22c55e22;
            color: #22c55e;
        }
        .sidebar .fa {
            min-width: 1.5em;
            text-align: center;
        }
        .form-title-gradient {
            background: linear-gradient(90deg, #22c55e 60%, #16a34a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass {
            animation: fadeInUp 0.7s cubic-bezier(.39,.575,.565,1) both;
        }
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(40px);}
            100% { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-100 via-green-200 to-green-50 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-screen w-64 bg-gradient-to-b from-green-800 to-green-700 text-green-50 p-6 flex flex-col overflow-y-auto z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300" id="sidebar" role="navigation" aria-label="Sidebar Navigation">
        <div class="flex items-center justify-between mb-6 pt-6">
            <h2 class="text-3xl font-extrabold text-yellow-400 text-center select-none flex-1 tracking-tight drop-shadow">Admin Panel</h2>
            <button aria-label="Toggle Sidebar" class="text-green-200 hover:text-yellow-400 focus:outline-none ml-3 hidden md:block" id="sidebar-toggle" title="Toggle Sidebar">
                <i class="fas fa-angle-double-left"></i>
            </button>
        </div>
        <nav aria-label="Primary Navigation" class="flex flex-col space-y-3 text-green-100 text-lg font-semibold">
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/dashboard">
                <i class="fas fa-chart-bar"></i>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/attendance">
                <i class="fas fa-clipboard-list"></i>
                <span>Attendance</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/reports">
                <i class="fas fa-chart-line"></i>
                <span>Reports</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/announcements">
                <i class="fas fa-bullhorn"></i>
                <span>Announcements</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/classifications">
                <i class="fas fa-folder-open"></i>
                <span>Classifications</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors active" href="/addacc" aria-current="page">
                <i class="fas fa-user-plus"></i>
                <span>Add Account</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/benefits">
                <i class="fas fa-gift"></i>
                <span>Benefits</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/policies">
                <i class="fas fa-file-alt"></i>
                <span>Policies</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/charity">
                <i class="fas fa-hand-holding-heart"></i>
                <span>Charity Section</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/settings">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
            <a class="flex items-center gap-3 mt-auto bg-red-600 rounded-b-lg px-4 py-3 hover:bg-red-700 transition-colors" href="/logupchoose">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex justify-center items-center min-h-screen p-6 md:ml-64">
        <div class="glass shadow-2xl p-10 w-full max-w-3xl">
            <div class="flex flex-col items-center mb-8">
                <div class="bg-gradient-to-br from-green-200 to-green-400 rounded-full p-5 mb-2 shadow-lg">
                    <i class="fas fa-user-plus text-4xl text-green-700"></i>
                </div>
                <h2 class="text-center text-4xl font-extrabold form-title-gradient select-none tracking-tight mb-1">Register President Account</h2>
                <p class="text-green-600 mt-1 text-base">Fill in the form below to create a new president account.</p>
            </div>

            <!-- Success message -->
            <div id="success-message" class="hidden mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                <p>Success message goes here.</p>
            </div>

            <!-- Error messages -->
            <div id="error-messages" class="hidden mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                <ul class="list-disc list-inside space-y-1"></ul>
            </div>

            <form method="POST" action="{{ route('users.store') }}" class="space-y-7" novalidate autocomplete="off">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                        <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required placeholder="First Name *" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                        <input id="middle_name" name="middle_name" type="text" value="{{ old('middle_name') }}" placeholder="Middle Name" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-user"></i></span>
                        <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required placeholder="Last Name *" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-envelope"></i></span>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="Email *" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <input id="password" name="password" type="password" required placeholder="Password *" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Confirm Password *" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-wheelchair"></i></span>
                        <select id="disability_type" name="disability_type" required class="w-full rounded-lg border border-gray-300 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                            <option value="" disabled selected> Select Disability </option>
                            <option value="Deaf or Hard of Hearing">Deaf or Hard of Hearing</option>
                            <option value="Intellectual Disability">Intellectual Disability</option>
                            <option value="Learning Disability">Learning Disability</option>
                            <option value="Mental Disability">Mental Disability</option>
                            <option value="Physical Disability (Orthopedic)">Physical Disability (Orthopedic)</option>
                            <option value="Psychosocial Disability">Psychosocial Disability</option>
                            <option value="Speech and Language Impairment">Speech and Language Impairment</option>
                            <option value="Visual Disability">Visual Disability</option>
                            <option value="Cancer (RA11215)">Cancer (RA11215)</option>
                            <option value="Rare Disease (RA10747)">Rare Disease (RA10747)</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
                        <input id="barangay_name" name="barangay_name" type="text" value="{{ old('barangay_name') }}" required placeholder="Barangay Name *" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" />
                    </div>
                </div>

                <input type="hidden" name="role" value="president" />

                <div class="text-center mt-8">
                    <button type="submit" class="inline-block bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white font-semibold px-14 py-3 rounded-full shadow-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-green-300 text-lg tracking-wide">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Sidebar toggle for smaller screens
        const sidebarToggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');

        sidebarToggleBtn?.addEventListener('click', () => {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>