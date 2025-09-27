<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        :root {
            --main-green: #2e7d32;
            --light-green: #66bb6a;
            --yellow: #fdd835;
            --bg-color: #f9fbe7;
            --text-color: #1a1a1a;
            --card-bg: #ffffff;
        }
        body {
            background-color: var(--bg-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            margin: 0;
        }
        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-thumb { background-color: var(--light-green); border-radius: 10px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 30px rgba(46, 125, 50, 0.3); }
        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .scrollbar-thin::-webkit-scrollbar { width: 6px; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background-color: var(--light-green); border-radius: 10px; }
        .scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
    </style>
</head>
<body class="bg-[var(--bg-color)] text-[var(--text-color)] min-h-screen flex flex-col">

<div id="dashboard" class="flex min-h-screen transition-all duration-300">
    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-screen w-64 bg-green-800 text-green-50 p-6 flex flex-col overflow-y-auto z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300" id="sidebar" role="navigation" aria-label="Sidebar Navigation">
            <div class="flex items-center justify-between mb-6 pt-6">
                <h2 class="text-3xl font-extrabold text-yellow-400 text-center select-none flex-1">
                    Admin Panel
                </h2>
                <button aria-label="Toggle Sidebar" class="text-green-200 hover:text-yellow-400 focus:outline-none ml-3 hidden md:block" id="sidebar-toggle" title="Toggle Sidebar">
                    <i class="fas fa-angle-double-left"></i>
                </button>
            </div>
            <nav aria-label="Primary Navigation" class="flex flex-col space-y-3 text-green-100 text-lg font-semibold">
                <a aria-current="page" class="flex items-center gap-3 rounded-lg px-4 py-3 bg-green-600 hover:bg-green-700 transition-colors" href="/dashboard">
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
                <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/addacc">
                    <i class="fas fa-cog"></i>
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
                <a class="flex items-center gap-3 rounded-lg px-4 py-3 bg-green-600 hover:bg-green-700 transition-colors" href="/charity">
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

    <main class="flex-grow ml-64 bg-[var(--bg-color)] text-[var(--text-color)] min-h-screen flex flex-col">
        <div class="container mx-auto px-4 py-10 flex-grow">
            <header class="flex flex-col sm:flex-row justify-between items-center mb-10">
                <h1 class="text-3xl font-extrabold text-[var(--main-green)] mb-4 sm:mb-0">Announcements</h1>
                <div class="w-full sm:w-auto flex flex-col sm:flex-row gap-2">
                    <div class="bg-white rounded-xl shadow-md p-4 flex items-center space-x-4 w-full sm:w-auto">
                        <div class="text-[var(--main-green)] text-3xl">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-600">Total Announcements</p>
                            <p class="text-xl font-bold" id="total-announcements">0</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Success Alert -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-8" role="alert">
                    <strong class="font-bold">Success! </strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Create Announcement Form -->
            <section class="bg-white rounded-2xl shadow-xl p-8 mb-12 max-w-3xl mx-auto border border-[var(--light-green)]">
                <div class="flex items-center gap-3 mb-6">
                    <div class="bg-[var(--main-green)] text-white rounded-full p-3 shadow">
                        <i class="fas fa-bullhorn fa-lg"></i>
                    </div>
                    <h2 class="text-xl font-bold text-[var(--main-green)] tracking-tight">Create New Announcement</h2>
                </div>
                <form method="POST" action="{{ route('announcements.store') }}" id="create-announcement-form" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="title" placeholder="Title" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-[var(--main-green)] transition" />
                        <input type="text" name="location" placeholder="Location" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-[var(--main-green)] transition" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 font-semibold text-[var(--main-green)]">Start Date & Time</label>
                            <input type="datetime-local" name="start_time" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-[var(--main-green)] transition" />
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold text-[var(--main-green)]">End Date & Time</label>
                            <input type="datetime-local" name="end_time" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-[var(--main-green)] transition" />
                        </div>
                    </div>
                    <div>
                        <label for="target_audience" class="block mb-2 font-semibold text-[var(--main-green)]">Audience</label>
                        <select id="target_audience" name="target_audience" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-[var(--main-green)] transition">
                            <option value="" disabled selected>Select audience</option>
                            <option value="all">All</option>
                            <option value="presidents">Presidents Only</option>
                            <option value="members">Members Only</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full bg-[var(--main-green)] text-white py-3 px-4 rounded-lg text-base font-semibold hover:bg-[var(--light-green)] shadow transition-colors">
                        <i class="fas fa-paper-plane mr-2"></i>Post Announcement
                    </button>
                </form>
            </section>

            <!-- Announcements List -->
            <section class="max-w-5xl mx-auto">
                <h2 class="text-2xl font-semibold text-[var(--main-green)] mb-6">Announcement History</h2>
                <div id="announcements-list" class="space-y-6">
                    @php $total = 0; @endphp
                    @foreach($announcements as $i => $announcement)
                        @php
                            $total++;
                            $audienceLabel = 'All';
                            if ($announcement->target_audience === 'presidents') {
                                $audienceLabel = 'Presidents Only';
                            } elseif ($announcement->target_audience === 'members') {
                                $audienceLabel = 'Members Only';
                            }
                        @endphp
                        <div class="bg-white rounded-xl shadow-md p-6 flex flex-col md:flex-row justify-between items-start md:items-center card-hover announcement-item {{ $i > 0 ? 'hidden' : '' }}">
                            <div class="flex flex-col gap-2">
                                <h3 class="font-bold text-lg text-[var(--main-green)]">{{ $announcement->title }}</h3>
                                <p class="text-sm text-gray-500">{{ $announcement->location }}</p>
                                <p class="text-sm text-gray-500">
                                    Start: {{ date('F d, Y h:i A', strtotime($announcement->start_time)) }}
                                    <br>
                                    End: {{ date('F d, Y h:i A', strtotime($announcement->end_time)) }}
                                </p>
                                <p class="text-sm text-gray-500">Audience: {{ $audienceLabel }}</p>
                            </div>
                        </div>
                    @endforeach
                    <script>
                        document.getElementById('total-announcements').textContent = {{ $total }};
                    </script>
                </div>
                <div class="flex justify-center mt-4">
                    <button id="seeAllBtn" class="bg-[var(--main-green)] text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-[var(--light-green)] transition-colors">
                        See All
                    </button>
                    <button id="seeLessBtn" class="bg-gray-300 text-[var(--main-green)] px-6 py-2 rounded-lg font-semibold shadow hover:bg-gray-400 transition-colors ml-2 hidden">
                        See Less
                    </button>
                </div>
            </section>

        </div>
    </main>
</div>

<script>
    // Show all announcements
    document.getElementById('seeAllBtn').onclick = function() {
        document.querySelectorAll('.announcement-item').forEach(el => el.classList.remove('hidden'));
        this.classList.add('hidden');
        document.getElementById('seeLessBtn').classList.remove('hidden');
    };
    // Show only one announcement
    document.getElementById('seeLessBtn').onclick = function() {
        document.querySelectorAll('.announcement-item').forEach((el, i) => {
            if (i === 0) el.classList.remove('hidden');
            else el.classList.add('hidden');
        });
        this.classList.add('hidden');
        document.getElementById('seeAllBtn').classList.remove('hidden');
    };
</script>
</body>
</html>
