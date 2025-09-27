<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel - Reports</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    body { font-family: 'Inter', sans-serif; background: linear-gradient(120deg, #e0f2fe 60%, #bbf7d0 100%); }
    .table-section {
      background: linear-gradient(120deg, #f0fdf4 80%, #bbf7d0 100%);
      border-radius: 1.5rem;
      box-shadow: 0 4px 24px 0 #bbf7d0;
      padding: 1.2rem 0.7rem 0.7rem 0.7rem;
      margin-bottom: 1.5rem;
      border: 1px solid #b2dfdb;
    }
    .section-header {
      background: linear-gradient(90deg,#bbf7d0,#86efac);
      border-radius: 1.5rem 1.5rem 0 0;
      box-shadow: 0 2px 8px #bbf7d0;
      padding: 2rem 1rem 1rem 1rem;
      text-align: center;
      margin-bottom: 0;
    }
    .section-title {
      font-size: 1.5rem;
      font-weight: 900;
      color: #22c55e;
      margin-bottom: 0.3rem;
      letter-spacing: 0.5px;
      text-shadow: 0 1px 4px #bbf7d0;
    }
    .section-desc {
      font-size: 1rem;
      color: #166534;
      margin-bottom: 0.2rem;
    }
    .search-bar-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 1.2rem;
      margin-top: 0.7rem;
      width: 100%;
    }
    .search-bar-container input {
      max-width: 350px;
      font-size: 1rem;
      padding: 0.6rem 1.2rem;
      border-radius: 0.8rem;
      border: 1.5px solid #bbf7d0;
      box-shadow: 0 2px 8px #bbf7d0;
      transition: border 0.2s, box-shadow 0.2s;
    }
    .search-bar-container input:focus {
      border-color: #22c55e;
      box-shadow: 0 4px 16px #bbf7d0;
      outline: none;
    }
    .tab-btn {
      min-width: 140px;
      font-size: 1rem;
      padding: 0.7rem 1.2rem;
      border-radius: 0.8rem;
      margin: 0 0.2rem;
      background: #e0fbe4;
      color: #166534;
      transition: all 0.2s;
      font-weight: 600;
      border: 2px solid transparent;
    }
    .tab-btn.active {
      background: linear-gradient(90deg,#bbf7d0,#86efac);
      color: #166534;
      font-weight: bold;
      box-shadow: 0 2px 8px #bbf7d0;
      border: 2px solid #22c55e;
    }
    .tab-btn:not(.active):hover {
      background: #d1fae5;
      color: #166534;
    }
    .tab-card {
      background: linear-gradient(120deg, #f0fdf4 80%, #bbf7d0 100%);
      border-radius: 1.2rem;
      box-shadow: 0 4px 16px 0 rgba(16,185,129,0.10);
      padding: 1.2rem 1rem 1rem 1rem;
      margin-bottom: 1.5rem;
      border: 1px solid #bbf7d0;
      margin-top: 0;
    }
    .tab-card.hidden { display: none; }
    .table-head {
      font-size: 0.98rem;
      padding-top: 0.7rem;
      padding-bottom: 0.7rem;
      background: linear-gradient(90deg,#bbf7d0,#86efac);
      color: #166534;
    }
    .table-row td {
      font-size: 0.98rem;
      padding: 0.6rem 0.5rem;
    }
    .rank-badge {
      font-size: 0.93rem;
      padding: 0.2rem 0.7rem;
      border-radius: 9999px;
      background: linear-gradient(90deg,#bbf7d0,#86efac);
      color: #166534;
      font-weight: 700;
    }
    .pagination-btn {
      font-size: 0.95rem;
      padding: 0.35rem 1rem;
      border-radius: 0.7rem;
      margin: 0 2px;
      background: #e0fbe4;
      color: #166534;
      font-weight: 600;
      border: none;
      transition: background 0.2s, color 0.2s;
    }
    .pagination-btn.active, .pagination-btn:focus {
      background: linear-gradient(90deg,#bbf7d0,#86efac);
      color: #166534;
      font-weight: bold;
      box-shadow: 0 2px 8px #bbf7d0;
    }
    .pagination-btn:hover:not(.active) {
      background: #d1fae5;
      color: #166534;
    }
    @media (max-width: 900px) {
      .table-section { padding: 0.7rem 0.2rem; }
      .tab-card { padding: 0.7rem 0.2rem; }
      .tab-btn { font-size: 0.93rem; padding: 0.5rem 0.7rem; }
      .search-bar-container input { font-size: 0.93rem; }
      .table-head, .table-row td { font-size: 0.93rem; }
      .section-header { padding: 1.2rem 0.3rem 0.7rem 0.3rem; }
      .section-title { font-size: 1.1rem; }
    }
  </style>
</head>
<body class="flex min-h-screen">

  <!-- Sidebar -->
  <aside class="sidebar fixed top-0 left-0 h-screen w-64 bg-green-800 text-green-50 p-6 flex flex-col overflow-y-auto z-40 transition-transform duration-300" id="sidebar" role="navigation" aria-label="Sidebar Navigation">
    <div class="flex items-center justify-between mb-6 pt-6">
      <h2 class="text-3xl font-extrabold text-yellow-400 text-center select-none flex-1">
        Admin Panel
      </h2>
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
      <a class="flex items-center gap-3 rounded-lg px-4 py-3 bg-green-600 hover:bg-green-700 transition-colors" href="/reports">
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

  <!-- Main content -->
  <main class="flex-1 ml-64 p-8 sm:p-12 bg-gradient-to-b from-blue-50 to-green-50 min-h-screen flex flex-col">
    <section class="max-w-6xl w-full mx-auto rounded-2xl shadow-xl p-0 mb-10 table-section">
      <div class="section-header flex flex-col items-center">
        <h2 class="section-title">
          <i class="fas fa-chart-line mr-2"></i>
          Presidents Attendance Summary
        </h2>
        <p class="section-desc">See the top performing presidents by attendance category.</p>
      </div>
      <!-- Centered Search Bar -->
      <div class="search-bar-container">
        <input
          type="text"
          id="search-bar"
          placeholder="Search president or barangay..."
          class="w-full max-w-xs"
          oninput="searchSummary()"
          autocomplete="off"
        />
      </div>
      <!-- Tabs -->
      <div class="flex gap-2 mb-6 justify-center bg-gradient-to-r from-green-100 via-emerald-50 to-blue-50 py-4 rounded-b-2xl shadow">
        <button class="tab-btn active" id="tab-present">
          <i class="fas fa-check-circle text-green-600 mr-2"></i> Present
        </button>
        <button class="tab-btn" id="tab-late">
          <i class="fas fa-clock text-yellow-500 mr-2"></i> Late
        </button>
        <button class="tab-btn" id="tab-absent">
          <i class="fas fa-times-circle text-red-600 mr-2"></i> Absent
        </button>
      </div>
      <!-- Present Tab -->
      <div id="present-panel" class="tab-card">
        <div class="overflow-x-auto rounded-xl shadow">
          <table class="min-w-full border rounded-xl overflow-hidden">
            <thead class="table-head">
              <tr>
                <th class="px-6 py-4 text-left">Rank</th>
                <th class="px-6 py-4 text-left">President Name</th>
                <th class="px-6 py-4 text-left">Barangay</th>
                <th class="px-6 py-4 text-center">Present</th>
                <th class="px-6 py-4 text-center">Total</th>
                <th class="px-6 py-4 text-center">Present %</th>
              </tr>
            </thead>
            <tbody id="present-tbody">
              <!-- Filled by JS -->
            </tbody>
          </table>
        </div>
        <div class="flex justify-center mt-4" id="present-pagination"></div>
      </div>
      <!-- Late Tab -->
      <div id="late-panel" class="tab-card hidden">
        <div class="overflow-x-auto rounded-xl shadow">
          <table class="min-w-full border rounded-xl overflow-hidden">
            <thead class="table-head" style="background: linear-gradient(90deg,#fef9c3,#fde68a); color: #a16207;">
              <tr>
                <th class="px-6 py-4 text-left">Rank</th>
                <th class="px-6 py-4 text-left">President Name</th>
                <th class="px-6 py-4 text-left">Barangay</th>
                <th class="px-6 py-4 text-center">Late</th>
                <th class="px-6 py-4 text-center">Total</th>
                <th class="px-6 py-4 text-center">Late %</th>
              </tr>
            </thead>
            <tbody id="late-tbody">
              <!-- Filled by JS -->
            </tbody>
          </table>
        </div>
        <div class="flex justify-center mt-4" id="late-pagination"></div>
      </div>
      <!-- Absent Tab -->
      <div id="absent-panel" class="tab-card hidden">
        <div class="overflow-x-auto rounded-xl shadow">
          <table class="min-w-full border rounded-xl overflow-hidden">
            <thead class="table-head" style="background: linear-gradient(90deg,#fecaca,#fca5a5); color: #991b1b;">
              <tr>
                <th class="px-6 py-4 text-left">Rank</th>
                <th class="px-6 py-4 text-left">President Name</th>
                <th class="px-6 py-4 text-left">Barangay</th>
                <th class="px-6 py-4 text-center">Absent</th>
                <th class="px-6 py-4 text-center">Total</th>
                <th class="px-6 py-4 text-center">Absent %</th>
              </tr>
            </thead>
            <tbody id="absent-tbody">
              <!-- Filled by JS -->
            </tbody>
          </table>
        </div>
        <div class="flex justify-center mt-4" id="absent-pagination"></div>
      </div>
    </section>
  </main>
  <script>
  const summary = @json($summary);
  let filteredSummary = summary;
  let currentTab = 'present';
  let currentPage = 1;

  function paginate(array, page_size, page_number) {
    return array.slice((page_number - 1) * page_size, page_number * page_size);
  }

  function renderTable(tab, data, columns, page, pageSize, totalPages) {
    const tbody = document.getElementById(tab + '-tbody');
    tbody.innerHTML = '';
    if (data.length === 0) {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td colspan="6" class="text-center py-8 text-emerald-500">No attendance data found.</td>`;
      tbody.appendChild(tr);
      return;
    }
    data.forEach((row, i) => {
      const tr = document.createElement('tr');
      tr.className = 'table-row';
      tr.innerHTML = `
        <td class="px-6 py-3"><span class="rank-badge">${(page - 1) * pageSize + i + 1}</span></td>
        <td class="px-6 py-3 font-semibold">${row.president_name}</td>
        <td class="px-6 py-3">${row.barangay_name}</td>
        <td class="px-6 py-3 text-center font-bold ${columns[0].color}">${row[columns[0].field]}</td>
        <td class="px-6 py-3 text-center">${row.total}</td>
        <td class="px-6 py-3 text-center font-bold ${columns[1].color}">${row[columns[1].field]}%</td>
      `;
      tbody.appendChild(tr);
    });

    // Pagination buttons
    const pagDiv = document.getElementById(tab + '-pagination');
    pagDiv.innerHTML = '';
    if (totalPages > 1) {
      for (let p = 1; p <= totalPages; p++) {
        const btn = document.createElement('button');
        btn.className = 'pagination-btn' + (p === page ? ' active' : '');
        btn.innerText = p;
        btn.onclick = () => renderTab(tab, p);
        pagDiv.appendChild(btn);
      }
    }
  }

  function getFiltered(tab) {
    let filtered = filteredSummary;
    if (tab === 'present') {
      filtered = filtered.filter(r => r.present_percent >= 50)
        .sort((a, b) => b.present_percent - a.present_percent);
    } else if (tab === 'late') {
      filtered = filtered.filter(r => r.late > 0)
        .sort((a, b) => b.late_percent - a.late_percent);
    } else if (tab === 'absent') {
      filtered = filtered.filter(r => r.absent > 0)
        .sort((a, b) => b.absent_percent - a.absent_percent);
    }
    return filtered;
  }

  function renderTab(tab, page = 1) {
    currentTab = tab;
    currentPage = page;
    let columns = [];
    if (tab === 'present') {
      columns = [
        { field: 'present', color: 'text-green-700' },
        { field: 'present_percent', color: 'text-green-700' }
      ];
    } else if (tab === 'late') {
      columns = [
        { field: 'late', color: 'text-yellow-600' },
        { field: 'late_percent', color: 'text-yellow-600' }
      ];
    } else if (tab === 'absent') {
      columns = [
        { field: 'absent', color: 'text-red-600' },
        { field: 'absent_percent', color: 'text-red-600' }
      ];
    }
    const filtered = getFiltered(tab);
    const pageSize = 10;
    const totalPages = Math.ceil(filtered.length / pageSize) || 1;
    const pageData = paginate(filtered, pageSize, page);
    renderTable(tab, pageData, columns, page, pageSize, totalPages);
  }

  function searchSummary() {
    const q = document.getElementById('search-bar').value.trim().toLowerCase();
    if (!q) {
      filteredSummary = summary;
    } else {
      filteredSummary = summary.filter(row =>
        row.president_name.toLowerCase().includes(q) ||
        row.barangay_name.toLowerCase().includes(q)
      );
    }
    renderTab(currentTab, 1);
  }

  // Tab switching
  document.getElementById('tab-present').onclick = function() {
    this.classList.add('active');
    document.getElementById('tab-late').classList.remove('active');
    document.getElementById('tab-absent').classList.remove('active');
    document.getElementById('present-panel').classList.remove('hidden');
    document.getElementById('late-panel').classList.add('hidden');
    document.getElementById('absent-panel').classList.add('hidden');
    renderTab('present', 1);
  };
  document.getElementById('tab-late').onclick = function() {
    this.classList.add('active');
    document.getElementById('tab-present').classList.remove('active');
    document.getElementById('tab-absent').classList.remove('active');
    document.getElementById('present-panel').classList.add('hidden');
    document.getElementById('late-panel').classList.remove('hidden');
    document.getElementById('absent-panel').classList.add('hidden');
    renderTab('late', 1);
  };
  document.getElementById('tab-absent').onclick = function() {
    this.classList.add('active');
    document.getElementById('tab-present').classList.remove('active');
    document.getElementById('tab-late').classList.remove('active');
    document.getElementById('present-panel').classList.add('hidden');
    document.getElementById('late-panel').classList.add('hidden');
    document.getElementById('absent-panel').classList.remove('hidden');
    renderTab('absent', 1);
  };

  // Initial render
  renderTab('present', 1);
</script>
</body>
</html>