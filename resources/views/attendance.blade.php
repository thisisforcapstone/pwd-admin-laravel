<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Attendance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background: linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 100%);
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1a1a1a;
            margin: 0;
        }
        .card-hover {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card-hover:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 0 12px 32px 0 rgba(46,125,50,0.13);
            border-color: #43a047;
        }
        .modal-content {
            border-radius: 1.2rem;
            box-shadow: 0 8px 32px 0 #a5d6a7;
        }
        .modal-header {
            background: linear-gradient(90deg, #43a047 60%, #388e3c 100%);
            color: #fff;
            border-top-left-radius: 1.2rem;
            border-top-right-radius: 1.2rem;
        }
        .modal-footer {
            border-bottom-left-radius: 1.2rem;
            border-bottom-right-radius: 1.2rem;
        }
        .btn-success, .btn-outline-success {
            background: linear-gradient(90deg, #43a047 60%, #388e3c 100%) !important;
            border: none !important;
            color: #fff !important;
            font-weight: 700;
            border-radius: 9999px !important;
            box-shadow: 0 2px 8px 0 #a5d6a7;
            transition: background 0.2s, box-shadow 0.2s;
        }
        .btn-success:hover, .btn-outline-success:hover {
            background: linear-gradient(90deg, #388e3c 60%, #2e7d32 100%) !important;
            box-shadow: 0 4px 16px 0 #81c784;
            color: #fff !important;
        }
        .btn-outline-warning {
            border-radius: 9999px !important;
            font-weight: 700;
        }
        .btn-outline-danger {
            border-radius: 9999px !important;
            font-weight: 700;
        }
        .btn-secondary {
            border-radius: 9999px !important;
            font-weight: 700;
        }
        .rounded-2xl {
            border-radius: 1.5rem !important;
        }
        .announcement-status {
            font-size: 1rem;
            font-weight: 700;
            padding: 0.35rem 1.2rem;
            border-radius: 9999px;
            display: inline-block;
            letter-spacing: 0.5px;
        }
        .status-pending {
            background: #fffbe6;
            color: #b59f00;
            border: 1px solid #ffe066;
        }
        .status-recorded {
            background: #e6ffed;
            color: #1b5e20;
            border: 1px solid #66bb6a;
        }
        .status-overdue {
            background: #ffeaea;
            color: #c62828;
            border: 1px solid #ff8a80;
        }
        .record-btn {
            background: linear-gradient(90deg, #43a047 60%, #388e3c 100%);
            color: #fff;
            font-weight: 700;
            border-radius: 9999px;
            padding: 0.6rem 2rem;
            box-shadow: 0 2px 8px 0 #a5d6a7;
            transition: background 0.2s, box-shadow 0.2s;
            border: none;
        }
        .record-btn:hover {
            background: linear-gradient(90deg, #388e3c 60%, #2e7d32 100%);
            box-shadow: 0 4px 16px 0 #81c784;
        }
        .recorded-btn {
            background: #e6ffed;
            color: #1b5e20;
            font-weight: 700;
            border-radius: 9999px;
            padding: 0.6rem 2rem;
            cursor: not-allowed;
            border: none;
        }
        .table thead th {
            background: linear-gradient(90deg, #e8f5e9 60%, #c8e6c9 100%);
            color: #2e7d32;
            font-weight: 800;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #a5d6a7;
        }
        .table tbody tr:hover {
            background: #f1f8e9 !important;
        }
        .font-bold.text-green-800 {
            font-size: 1.08rem;
            letter-spacing: 0.2px;
        }
        .form-select, .form-control {
            border-radius: 9999px !important;
            border: 2px solid #a5d6a7 !important;
            font-size: 1rem !important;
            padding-left: 1.1rem !important;
            padding-right: 1.1rem !important;
        }
        .flex.items-center.bg-white.rounded-xl.shadow.p-3.mb-2.border.border-green-100 {
            transition: box-shadow 0.2s, border 0.2s;
        }
        .flex.items-center.bg-white.rounded-xl.shadow.p-3.mb-2.border.border-green-100:hover {
            box-shadow: 0 4px 16px 0 #b2dfdb;
            border: 1.5px solid #43a047;
        }
        .btn-close-white {
            filter: invert(1);
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
    <div class="flex-1 p-8 md:ml-64 bg-gradient-to-br from-green-50 via-green-100 to-green-50 min-h-screen">
        <h1 class="text-4xl font-extrabold text-center text-green-800 mb-10 drop-shadow">Attendance</h1>

        <div class="overflow-x-auto bg-white rounded-2xl shadow-2xl p-6 max-w-4xl mx-auto">
            <table class="min-w-full divide-y divide-green-200">
                <thead class="bg-green-100 sticky top-0 z-10">
                    <tr>
                        <th class="px-6 py-4 text-left text-base font-bold text-green-800">Title</th>
                        <th class="px-6 py-4 text-left text-base font-bold text-green-800">Date</th>
                        <th class="px-6 py-4 text-left text-base font-bold text-green-800">Location</th>
                        <th class="px-6 py-4 text-center text-base font-bold text-green-800">Status</th>
                        <th class="px-6 py-4 text-center text-base font-bold text-green-800">History</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-green-100" id="attendance-tbody">
                @foreach ($announcements as $i => $announcement)
                    @php
                        $attendedCount = $announcement->attendances->whereIn('status', ['present', 'late', 'absent'])->count();
                        $totalBarangays = $barangays->count();
                        $attendedPercent = $totalBarangays > 0 ? round(($attendedCount / $totalBarangays) * 100) : 0;
                        $eventDate = \Carbon\Carbon::parse($announcement->event_date);
                        $isRecorded = $attendedCount >= $totalBarangays && $totalBarangays > 0;
                    @endphp

                    <tr class="hover:bg-green-50 transition attendance-row {{ $i > 2 ? 'hidden' : '' }}">
                        <td class="px-6 py-4 text-base text-green-900 font-semibold">{{ $announcement->title }}</td>
                        <td class="px-6 py-4 text-base text-green-700">{{ $eventDate->format('F d, Y h:i A') }}</td>
                        <td class="px-6 py-4 text-base text-green-700">{{ $announcement->location ?? 'Not specified' }}</td>
                        <td class="px-6 py-4 text-center">
                            @if($isRecorded)
                                <span class="px-4 py-1 rounded-full text-base font-bold bg-green-100 text-green-800 shadow-inner">
                                    Recorded
                                </span>
                            @else
                                <button class="bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white px-6 py-2 rounded-full text-base font-bold shadow transition flex items-center mx-auto"
                                        data-bs-toggle="modal" data-bs-target="#attendanceModal{{ $announcement->id }}">
                                    <i class="fas fa-clipboard-check mr-2"></i> Record
                                </button>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($attendedCount > 0)
                                <div class="flex flex-col items-center">
                                    <span class="{{ $attendedPercent >= 50 ? 'text-green-600' : 'text-yellow-600' }} font-bold text-lg">
                                        {{ $attendedCount }}/{{ $totalBarangays }}
                                    </span>
                                    <a href="{{ route('attendance.history', $announcement->id) }}" 
                                    class="text-blue-600 hover:text-blue-800 text-base hover:underline mt-1">
                                        View Details
                                    </a>
                                </div>
                            @else
                                <span class="text-gray-400">No records</span>
                            @endif
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="attendanceModal{{ $announcement->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $announcement->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form action="{{ route('attendance.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                                <div class="modal-content rounded-2xl shadow-lg">
                                    <div class="modal-header bg-gradient-to-r from-green-700 to-green-600">
                                        <h5 class="modal-title text-white font-bold" id="modalLabel{{ $announcement->id }}">
                                            <i class="fas fa-users mr-2"></i>Record Attendance for <span class="underline">{{ $announcement->title }}</span>
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-green-50">
                                        <div class="mb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <input type="text" class="form-control w-full md:w-1/3 rounded-full px-4 py-2 border-2 border-green-300 focus:border-green-600" id="barangay-search-{{ $announcement->id }}" placeholder="🔍 Search barangay...">
                                            <div class="flex gap-2 mt-2 md:mt-0">
                                                <button type="button" class="btn btn-outline-success btn-sm rounded-full px-4" onclick="setAllStatus('{{ $announcement->id }}', 'present')">
                                                    <i class="fas fa-user-check mr-1"></i> All Present
                                                </button>
                                                <button type="button" class="btn btn-outline-warning btn-sm rounded-full px-4" onclick="setAllStatus('{{ $announcement->id }}', 'late')">
                                                    <i class="fas fa-user-clock mr-1"></i> All Late
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm rounded-full px-4" onclick="setAllStatus('{{ $announcement->id }}', 'absent')">
                                                    <i class="fas fa-user-times mr-1"></i> All Absent
                                                </button>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-96 overflow-y-auto pr-2">
                                            @foreach($barangays as $barangay)
                                            <div class="flex items-center bg-white rounded-xl shadow p-3 mb-2 border border-green-100">
                                                <div class="flex-1">
                                                    <div class="font-bold text-green-800">{{ $barangay->barangay_name }}</div>
                                                    <div class="text-xs text-green-600">{{ $barangay->first_name ?? 'N/A' }} {{ $barangay->middle_name ?? '' }} {{ $barangay->last_name ?? '' }}</div>
                                                    <input type="hidden" name="barangays[{{ $barangay->id }}][user_id]" value="{{ $barangay->id }}">
                                                    <input type="hidden" name="barangays[{{ $barangay->id }}][barangay_name]" value="{{ $barangay->barangay_name }}">
                                                    <input type="hidden" name="barangays[{{ $barangay->id }}][first_name]" value="{{ $barangay->first_name }}">
                                                    <input type="hidden" name="barangays[{{ $barangay->id }}][middle_name]" value="{{ $barangay->middle_name }}">
                                                    <input type="hidden" name="barangays[{{ $barangay->id }}][last_name]" value="{{ $barangay->last_name }}">
                                                    <input type="hidden" name="barangays[{{ $barangay->id }}][email]" value="{{ $barangay->email }}">
                                                </div>
                                                <div>
                                                    <select name="barangays[{{ $barangay->id }}][status]" class="form-select barangay-status rounded-full border-2 border-green-300 focus:border-green-600" required>
                                                        <option value="">-- Select Status --</option>
                                                        <option value="present">Present</option>
                                                        <option value="late">Late</option>
                                                        <option value="absent">Absent</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-green-50 rounded-b-2xl">
                                        <button type="button" class="btn btn-secondary rounded-full px-4" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success rounded-full px-4 font-bold">
                                            <i class="fas fa-save mr-2"></i> Save Attendance
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            <div class="flex justify-center mt-4">
                <button id="seeAllBtn" class="bg-[var(--main-green)] text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-[var(--light-green)] transition-colors {{ count($announcements) <= 3 ? 'hidden' : '' }}">
                    See All
                </button>
                <button id="seeLessBtn" class="bg-gray-300 text-[var(--main-green)] px-6 py-2 rounded-lg font-semibold shadow hover:bg-gray-400 transition-colors ml-2 hidden">
                    See Less
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebarToggleBtn = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('.sidebar');

        sidebarToggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
    <script>
function setAllStatus(announcementId, status) {
    document.querySelectorAll(`#attendanceModal${announcementId} .barangay-status`).forEach(sel => {
        sel.value = status;
    });
}

// Barangay search filter
document.querySelectorAll('[id^="barangay-search-"]').forEach(input => {
    input.addEventListener('input', function() {
        const id = this.id.replace('barangay-search-', '');
        const filter = this.value.toLowerCase();
        document.querySelectorAll(`#attendanceModal${id} .flex.items-center`).forEach(row => {
            const barangay = row.querySelector('.font-bold').innerText.toLowerCase();
            row.style.display = barangay.includes(filter) ? '' : 'none';
        });
    });
});

// See All / See Less functionality for attendance table
document.getElementById('seeAllBtn')?.addEventListener('click', function() {
    document.querySelectorAll('.attendance-row').forEach(row => row.classList.remove('hidden'));
    this.classList.add('hidden');
    document.getElementById('seeLessBtn').classList.remove('hidden');
});
document.getElementById('seeLessBtn')?.addEventListener('click', function() {
    document.querySelectorAll('.attendance-row').forEach((row, i) => {
        if (i > 2) row.classList.add('hidden');
        else row.classList.remove('hidden');
    });
    this.classList.add('hidden');
    document.getElementById('seeAllBtn').classList.remove('hidden');
});
</script>
</body>
</html>
