<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Classifications Summary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #e6f4ea; }
        ::-webkit-scrollbar-thumb { background-color: #22c55e; border-radius: 10px; border: 2px solid #e6f4ea; }
        .sidebar-scroll { max-height: 85vh; overflow-y: auto; min-height: 0; }
        .active-president { background: #bbf7d0 !important; color: #166534 !important; }
        .member-table th, .member-table td { border: 1px solid #e5e7eb; padding: 0.75rem; }
        .member-table th { background: linear-gradient(90deg,#bbf7d0,#86efac); color: #166534; font-weight: 600; }
        .member-table tbody tr { transition: all 0.2s; }
        .member-table tbody tr:hover { background: #bbf7d0; transform: scale(1.02); box-shadow: 0 2px 8px #a7f3d0; }
        .member-table tbody tr:nth-child(even) { background: #f0fdf4; }
        .dashboard-card {
            background: linear-gradient(135deg,#bbf7d0 0%,#86efac 100%);
            box-shadow: 0 4px 16px #bbf7d0;
            border-radius: 1rem;
            padding: 1.5rem 1rem;
            text-align: center;
            transition: transform 0.3s;
        }
        .dashboard-card:hover { transform: scale(1.04) rotate(-1deg); box-shadow: 0 8px 24px #22c55e; }
        .dashboard-tab {
            @apply px-6 py-4 text-base font-semibold rounded-t-xl transition flex flex-col items-center gap-1 cursor-pointer;
            background: linear-gradient(90deg,#bbf7d0,#86efac);
            color: #166534;
            box-shadow: 0 2px 8px #bbf7d0;
        }
        .dashboard-tab.active {
            background: linear-gradient(90deg,#22c55e,#bbf7d0);
            color: #14532d;
            border-bottom: 3px solid #22c55e;
            box-shadow: 0 4px 16px #22c55e;
        }
        .dashboard-tab:not(.active):hover {
            background: linear-gradient(90deg,#bbf7d0,#86efac);
            color: #166534;
            box-shadow: 0 2px 12px #bbf7d0;
        }
        .dashboard-tab .tab-icon {
            font-size: 1.5rem;
            margin-bottom: 0.2rem;
            color: #22c55e;
            transition: color 0.2s;
            /* Remove animation for all icons by default */
            animation: none !important;
        }
        .dashboard-tab.active .tab-icon,
        .dashboard-tab:hover .tab-icon {
            color: #166534;
        }
        /* Remove spin animation for most common disability tab */
        .dashboard-tab[aria-controls="most-common-disability"] .tab-icon {
            animation: none !important;
        }
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .sidebar-open { display: block; position: fixed; inset: 0; z-50; background: #166534; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body class="bg-green-50 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-green-800 text-green-50 flex flex-col p-6 min-h-screen fixed top-0 sidebar" style="z-index: 1000;">
        <h2 class="text-3xl font-extrabold text-yellow-400 mb-6">Admin Panel</h2>
        <nav class="flex flex-col space-y-3 text-green-100 text-lg font-semibold sidebar-scroll">
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/dashboard">
                <i class="fas fa-chart-bar"></i><span>Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/attendance">
                <i class="fas fa-clipboard-list"></i><span>Attendance</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/reports">
                <i class="fas fa-chart-line"></i><span>Reports</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/announcements">
                <i class="fas fa-bullhorn"></i><span>Announcements</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 bg-green-600 rounded-lg transition" href="/classifications">
                <i class="fas fa-folder-open"></i><span>Classifications</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/addacc">
                <i class="fas fa-cog"></i><span>Add Account</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/benefits">
                <i class="fas fa-gift"></i><span>Benefits</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/charity">
                <i class="fas fa-hand-holding-heart"></i><span>Charity</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg transition" href="/settings">
                <i class="fas fa-cog"></i><span>Settings</span>
            </a>
            <a class="flex items-center gap-3 mt-auto bg-red-600 px-4 py-3 rounded-lg hover:bg-red-700 transition" href="/logupchoose">
                <i class="fas fa-sign-out-alt"></i><span>Logout</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col main-content ml-64">
        <!-- Mobile Menu Toggle -->
        <div class="md:hidden p-4 bg-green-700 text-green-50 shadow flex justify-between items-center">
            <h1 class="text-xl font-bold">Classifications</h1>
            <button id="mobileMenuToggle" class="text-green-100 hover:text-green-200">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Main Content Area -->
        <div class="max-w-7xl mx-auto px-0 sm:px-2 py-6">
            <!-- Tabs for Dashboard Metrics -->
            <div class="mb-8 flex flex-col sm:flex-row gap-4 justify-center items-center">
                <div class="dashboard-tab active" role="tab" aria-selected="true" aria-controls="presidents">
                    <i class="fas fa-user-tie tab-icon animate-bounce"></i>
                    <p class="text-2xl font-bold text-green-800">{{ count($data) }}</p>
                    <p class="text-green-700">Total Presidents</p>
                </div>
                <div class="dashboard-tab" role="tab" aria-selected="false" aria-controls="total-members">
                    <i class="fas fa-users tab-icon animate-pulse"></i>
                    <p class="text-2xl font-bold text-green-800">{{ collect($data)->sum('total_members') }}</p>
                    <p class="text-green-700">Total Members</p>
                </div>
                <div class="dashboard-tab" role="tab" aria-selected="false" aria-controls="most-common-disability">
                    <i class="fas fa-wheelchair tab-icon"></i>
                    <p class="text-2xl font-bold text-green-800">
                        {{ collect($data)->flatMap(fn($e) => array_keys($e['disability_counts'] ?? []))->countBy()->sortDesc()->keys()->first() ?? 'N/A' }}
                    </p>
                    <p class="text-green-700">Most Common Disability</p>
                </div>
            </div>

            <!-- President Selector and Chart/Member List -->
            <div class="flex flex-row gap-2">
                <!-- President Selector (flush to sidebar) -->
                <div class="w-72 bg-green-100 shadow-md rounded-xl p-4 ml-0">
                    <label for="presidentSearch" class="block font-semibold mb-2 text-green-800">Search President or Barangay</label>
                    <div class="relative">
                        <input type="text" id="presidentSearch" placeholder="Type to search..." class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400" />
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="mt-4 bg-green-50 rounded-lg shadow-inner sidebar-scroll">
                        <ul id="presidentList" class="divide-y divide-green-200">
                            <li data-index="overall" class="py-3 px-4 cursor-pointer font-semibold text-green-700 hover:bg-green-200 active-president transition">
                                <i class="fas fa-chart-pie mr-2"></i> Overall Summary
                            </li>
                            @foreach($data as $index => $entry)
                                <li data-index="{{ $index }}" class="py-3 px-4 cursor-pointer hover:bg-green-200 transition">
                                    <span class="font-semibold text-gray-900">{{ $entry['president_fullname'] }}</span>
                                    <br>
                                    <small class="text-green-700"><i class="fas fa-map-marker-alt mr-1"></i> {{ $entry['barangay_name'] }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Chart and Member List -->
                <div class="flex-1 bg-green-100 shadow-lg rounded-xl p-4 flex flex-col justify-start">
                    <div class="flex items-center justify-between mb-2">
                        <h3 id="panelTitle" class="text-xl font-extrabold text-green-900">Overall Disability Summary</h3>
                        <button id="backButton" class="hidden text-blue-600 hover:underline text-sm font-medium transition">
                            <i class="fas fa-arrow-left mr-1"></i> Back to Overall Summary
                        </button>
                    </div>
                    <div id="chartSection" class="mb-4" style="margin-top:0;">
                        <canvas id="pieChart" class="w-full h-[700px] rounded-lg shadow-md" style="display:block;margin-top:0;"></canvas>
                    </div>
                    <div id="membersSection" class="hidden">
                        <h4 class="text-lg font-semibold mb-4 text-green-800">Members List</h4>
                        <div class="overflow-x-auto">
                            <table id="membersTable" class="min-w-full member-table rounded-lg overflow-hidden">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Disability Type</th>
                                        <th>Barangay</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dynamically filled -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = @json($data);
        let pieChart;

        function createPieChart(labels, values) {
            const ctx = document.getElementById('pieChart').getContext('2d');
            if (pieChart) pieChart.destroy();
            pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Disability Percentage',
                        data: values,
                        backgroundColor: [
                            '#FF6386', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                            '#FF9F40', '#C9CBCF', '#8BC34A', '#E91E63', '#607D8B'
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right', labels: { font: { size: 14 } } },
                        tooltip: {
                            callbacks: {
                                label: ctx => ctx.label + ': ' + ctx.parsed.toFixed(2) + '%'
                            }
                        }
                    },
                    animation: {
                        duration: 1200,
                        easing: 'easeInOutQuart'
                    }
                }
            });
        }

        function computeOverallPercentages() {
            let totals = {};
            let totalMembers = 0;

            data.forEach(entry => {
                totalMembers += entry.total_members;
                Object.entries(entry.disability_counts).forEach(([type, count]) => {
                    totals[type] = (totals[type] || 0) + count;
                });
            });

            let percentages = {};
            for (const type in totals) {
                percentages[type] = totalMembers > 0 ? (totals[type] / totalMembers) * 100 : 0;
            }
            return percentages;
        }

        function showOverallSummary() {
            document.getElementById('panelTitle').innerText = 'Overall Disability Summary';
            document.getElementById('membersSection').classList.add('hidden');
            document.getElementById('chartSection').classList.remove('hidden');
            document.getElementById('backButton').classList.add('hidden');
            document.querySelectorAll('#presidentList li').forEach(li => li.classList.remove('active-president'));
            document.querySelector('#presidentList li[data-index="overall"]').classList.add('active-president');

            const percentages = computeOverallPercentages();
            createPieChart(Object.keys(percentages), Object.values(percentages));
        }

        function showPresidentDetails(index) {
            const president = data[index];
            document.getElementById('panelTitle').innerText = `Disability Summary - ${president.president_fullname}`;
            createPieChart(Object.keys(president.disability_percentages), Object.values(president.disability_percentages));
            document.getElementById('chartSection').classList.remove('hidden');

            const membersSection = document.getElementById('membersSection');
            const tbody = document.querySelector('#membersTable tbody');
            tbody.innerHTML = '';

            president.members.forEach((member, i) => {
                const tr = document.createElement('tr');
                tr.classList.add('transition', 'duration-300', 'ease-in-out');
                tr.style.opacity = 0;
                setTimeout(() => { tr.style.opacity = 1; }, 100 + i * 60);

                const nameTd = document.createElement('td');
                nameTd.innerHTML = `<span class="font-semibold text-green-900">${member.first_name} ${member.middle_name || ''} ${member.last_name}</span>`;
                const disabilityTd = document.createElement('td');
                disabilityTd.innerHTML = `<span class="px-2 py-1 rounded bg-green-200 text-green-800 font-medium">${member.disability_type || '-'}</span>`;
                const barangayTd = document.createElement('td');
                barangayTd.innerHTML = `<span class="text-green-700 font-semibold">${member.barangay_name || '-'}</span>`;
                tr.appendChild(nameTd);
                tr.appendChild(disabilityTd);
                tr.appendChild(barangayTd);
                tbody.appendChild(tr);
            });

            membersSection.classList.remove('hidden');
            document.getElementById('backButton').classList.remove('hidden');
            document.querySelectorAll('#presidentList li').forEach(li => li.classList.remove('active-president'));
            document.querySelector(`#presidentList li[data-index="${index}"]`).classList.add('active-president');
        }

        // President list click
        document.getElementById('presidentList').addEventListener('click', e => {
            let li = e.target.closest('li[data-index]');
            if (!li) return;
            const index = li.getAttribute('data-index');
            if (index === 'overall') {
                showOverallSummary();
            } else {
                showPresidentDetails(index);
            }
        });

        // Back button
        document.getElementById('backButton').addEventListener('click', showOverallSummary);

        // Search filter
        document.getElementById('presidentSearch').addEventListener('input', function() {
            const search = this.value.toLowerCase();
            document.querySelectorAll('#presidentList li[data-index]:not([data-index="overall"])').forEach(li => {
                const text = li.textContent.toLowerCase();
                li.style.display = text.includes(search) ? '' : 'none';
            });
        });

        // Mobile menu toggle
        document.getElementById('mobileMenuToggle').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('sidebar-open');
        });

        // Initial load
        showOverallSummary();
    </script>
</body>
</html>