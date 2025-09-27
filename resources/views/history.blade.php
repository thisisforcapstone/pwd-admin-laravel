<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Attendance History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 100%);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1a1a1a;
        }
        .main-card {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 8px 32px 0 rgba(46,125,50,0.15);
            border: 1.5px solid #b2dfdb;
            padding: 2.5rem 2.5rem 2rem 2.5rem;
            margin-bottom: 2rem;
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }
        .history-title {
            font-size: 2.5rem;
            font-weight: 900;
            letter-spacing: 1px;
            color: #2e7d32;
            margin-bottom: 2.2rem;
            text-shadow: 0 2px 8px #a5d6a7;
        }
        .nav-tabs {
            justify-content: center;
            border-bottom: none;
            margin-bottom: 2.5rem;
        }
        .nav-tabs .nav-item {
            margin: 0 0.5rem;
        }
        .nav-tabs .nav-link {
            font-weight: 700;
            color: #388e3c;
            border-radius: 2rem 2rem 0 0;
            background: #e8f5e9;
            margin: 0 0.5rem;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.15s;
            border: none;
            font-size: 1.15rem;
            padding: 0.9rem 2.5rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            box-shadow: 0 2px 8px 0 #e0f2f1;
        }
        .nav-tabs .nav-link.active {
            background: linear-gradient(90deg, #43a047 60%, #388e3c 100%);
            color: #fff;
            box-shadow: 0 6px 24px 0 #a5d6a7;
            transform: scale(1.06);
            z-index: 2;
        }
        .nav-tabs .nav-link.present {
            border: 2.5px solid #43a047;
        }
        .nav-tabs .nav-link.late {
            border: 2.5px solid #fbc02d;
        }
        .nav-tabs .nav-link.absent {
            border: 2.5px solid #e53935;
        }
        .nav-tabs .nav-link.present.active {
            background: linear-gradient(90deg, #43a047 60%, #66bb6a 100%);
            color: #fff;
        }
        .nav-tabs .nav-link.late.active {
            background: linear-gradient(90deg, #fbc02d 60%, #fff176 100%);
            color: #fff;
        }
        .nav-tabs .nav-link.absent.active {
            background: linear-gradient(90deg, #e53935 60%, #ff8a80 100%);
            color: #fff;
        }
        .tab-content {
            margin-top: 1.5rem;
        }
        .table {
            border-radius: 1.2rem;
            overflow: hidden;
            background: #fff;
            margin-bottom: 0;
        }
        .table thead th {
            background: linear-gradient(90deg, #e8f5e9 60%, #c8e6c9 100%);
            color: #2e7d32;
            font-weight: 800;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #a5d6a7;
            font-size: 1.1rem;
        }
        .table tbody tr {
            transition: background 0.2s;
        }
        .row-present {
            background-color: #e8f5e9 !important;
        }
        .row-late {
            background-color: #fffde7 !important;
        }
        .row-absent {
            background-color: #ffebee !important;
        }
        .table tbody tr:hover {
            background: #f1f8e9 !important;
        }
        .bold-barangay {
            font-weight: bold;
            color: #388e3c;
            font-size: 1.05rem;
        }
        .full-name {
            font-weight: 700;
            color: #2e7d32;
            letter-spacing: 0.5px;
            font-size: 1.05rem;
        }
        .date-cell {
            font-size: 0.98rem;
            color: #607d8b;
        }
        .no-records {
            text-align: center;
            color: #bdbdbd;
            font-size: 1.1rem;
            padding: 2rem 0;
        }
        .btn-secondary {
            border-radius: 9999px !important;
            font-weight: 700;
            background: linear-gradient(90deg, #bdbdbd 60%, #757575 100%) !important;
            border: none !important;
            color: #fff !important;
            padding: 0.6rem 2rem;
            box-shadow: 0 2px 8px 0 #bdbdbd;
            transition: background 0.2s, box-shadow 0.2s;
        }
        .btn-secondary:hover {
            background: linear-gradient(90deg, #757575 60%, #424242 100%) !important;
            color: #fff !important;
        }
        .pro-status-cards {
            display: flex;
            justify-content: center;
            gap: 1.2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        .pro-status-card {
            min-width: 120px;
            max-width: 160px;
            background: #e8f5e9;
            border-radius: 1rem;
            box-shadow: 0 2px 12px 0 #e0f2f1;
            padding: 1rem 1.2rem 0.7rem 1.2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            border: 2px solid transparent;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s, border 0.2s, transform 0.15s;
            position: relative;
            margin-bottom: 0.2rem;
        }
        .pro-status-card .status-icon {
            font-size: 1.3rem;
            margin-bottom: 0.3rem;
            transition: color 0.2s;
        }
        .pro-status-card .status-label {
            font-size: 0.98rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 0.1rem;
        }
        .pro-status-card .status-count {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 0.1rem;
            border-radius: 9999px;
            padding: 0.1rem 0.7rem;
            background: #fff;
            box-shadow: 0 1px 4px 0 #b2dfdb;
            border: 1.5px solid #b2dfdb;
            color: #43a047;
            transition: background 0.2s, color 0.2s, border 0.2s;
        }
        .pro-status-card.late .status-count {
            color: #fbc02d;
            border-color: #ffe082;
        }
        .pro-status-card.absent .status-count {
            color: #e53935;
            border-color: #ff8a80;
        }
        .pro-status-card.present {
            border-color: #43a047;
        }
        .pro-status-card.late {
            border-color: #fbc02d;
        }
        .pro-status-card.absent {
            border-color: #e53935;
        }
        .pro-status-card.active,
        .pro-status-card:hover {
            background: linear-gradient(120deg, #43a047 60%, #66bb6a 100%);
            color: #fff;
            box-shadow: 0 4px 16px 0 #a5d6a7;
            transform: scale(1.04);
            z-index: 2;
        }
        .pro-status-card.late.active,
        .pro-status-card.late:hover {
            background: linear-gradient(120deg, #fbc02d 60%, #fff176 100%);
            color: #fff;
            box-shadow: 0 4px 16px 0 #ffe082;
        }
        .pro-status-card.absent.active,
        .pro-status-card.absent:hover {
            background: linear-gradient(120deg, #e53935 60%, #ff8a80 100%);
            color: #fff;
            box-shadow: 0 4px 16px 0 #ff8a80;
        }
        .pro-status-card.active .status-count,
        .pro-status-card:hover .status-count {
            background: #fffde7;
            color: #2e7d32;
            border-color: #a5d6a7;
        }
        .pro-status-card.late.active .status-count,
        .pro-status-card.late:hover .status-count {
            background: #fffde7;
            color: #fbc02d;
            border-color: #ffe082;
        }
        .pro-status-card.absent.active .status-count,
        .pro-status-card.absent:hover .status-count {
            background: #ffebee;
            color: #e53935;
            border-color: #ff8a80;
        }
        @media (max-width: 900px) {
            .main-card {
                padding: 1rem 0.5rem;
            }
            .table th, .table td {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }
            .history-title {
                font-size: 2rem;
            }
            .nav-tabs .nav-link {
                width: 100%;
                justify-content: center;
            }
            .pro-status-cards {
                flex-direction: column;
                gap: 0.7rem;
            }
            .pro-status-card {
                width: 100%;
                min-width: unset;
                max-width: unset;
                justify-content: center;
            }
        }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-screen w-64 bg-green-800 text-green-50 p-6 flex flex-col overflow-y-auto z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
        <div class="flex items-center justify-between mb-6 pt-6">
            <h2 class="text-3xl font-extrabold text-yellow-400 text-center select-none flex-1">
                Admin Panel
            </h2>
            <button aria-label="Toggle Sidebar" class="text-green-200 hover:text-yellow-400 focus:outline-none ml-3 hidden md:block" id="sidebar-toggle">
                <i class="fas fa-angle-double-left"></i>
            </button>
        </div>
        <nav class="flex flex-col space-y-3 text-green-100 text-lg font-semibold">
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 hover:bg-green-600 transition-colors" href="/dashboard">
                <i class="fas fa-chart-bar"></i>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center gap-3 rounded-lg px-4 py-3 bg-green-600 hover:bg-green-700 transition-colors" href="/attendance">
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
    <div class="flex-1 p-8 md:ml-64">
        <div class="main-card">
            <h1 class="history-title text-center"><i class="fas fa-history mr-2"></i>Attendance History</h1>

            <!-- Pro Status Cards Tabs -->
            @php
                $statuses = [
                    'present' => ['label' => 'Present', 'icon' => 'fas fa-user-check', 'class' => 'present'],
                    'late' => ['label' => 'Late', 'icon' => 'fas fa-user-clock', 'class' => 'late'],
                    'absent' => ['label' => 'Absent', 'icon' => 'fas fa-user-times', 'class' => 'absent'],
                ];
                $activeTab = old('activeTab', 'present');
            @endphp
            <div class="pro-status-cards" id="proStatusCards">
                @foreach($statuses as $key => $info)
                    @php
                        $count = $attendances->where('status', $key)->count();
                    @endphp
                    <div
                        class="pro-status-card {{ $info['class'] }} {{ $loop->first ? 'active' : '' }}"
                        data-tab="{{ $key }}"
                        tabindex="0"
                        role="button"
                        aria-label="{{ $info['label'] }} tab"
                    >
                        <i class="status-icon {{ $info['icon'] }}"></i>
                        <div class="status-label">{{ $info['label'] }}</div>
                        <div class="status-count">{{ $count }}</div>
                    </div>
                @endforeach
            </div>

            <div class="tab-content" id="statusTabsContent">
                @foreach($statuses as $key => $info)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $key }}">
                    <div class="overflow-x-auto">
                        <table class="table min-w-full divide-y divide-gray-200 shadow-lg">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Barangay</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Full Name</th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold">Date Recorded</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $filtered = $attendances->where('status', $key);
                                @endphp
                                @forelse($filtered as $attendance)
                                <tr class="row-{{ $key }}">
                                    <td class="px-6 py-4 text-sm bold-barangay">{{ $attendance->barangay_name }}</td>
                                    <td class="px-6 py-4 text-sm full-name">
                                        {{ $attendance->first_name }}
                                        @if($attendance->middle_name)
                                            {{ $attendance->middle_name }}
                                        @endif
                                        {{ $attendance->last_name }}
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm date-cell">{{ \Carbon\Carbon::parse($attendance->created_at)->format('F d, Y h:i A') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="no-records">No records.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Back button -->
            <div class="mt-6 text-center">
                <a href="/attendance" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Attendance
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Custom card tab switching
        document.querySelectorAll('.pro-status-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove active from all
                document.querySelectorAll('.pro-status-card').forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                // Hide all tab panes
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                // Show the selected tab pane
                const tab = this.getAttribute('data-tab');
                const pane = document.getElementById(tab);
                if (pane) {
                    pane.classList.add('show', 'active');
                }
            });
            // Keyboard accessibility
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        });

        // Sidebar toggle (optional)
        const sidebarToggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('.sidebar');
        sidebarToggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>
