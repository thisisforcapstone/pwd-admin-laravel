<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>PWD Portal Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; background: linear-gradient(135deg, #e8f5e9 0%, #f1f8e9 100%); }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #e6f4ea; }
    ::-webkit-scrollbar-thumb { background-color: #22c55e; border-radius: 10px; border: 2px solid #e6f4ea; }
    .table-card {
      background: #fff;
      border-radius: 1.2rem;
      box-shadow: 0 4px 24px 0 #bbf7d0;
      padding: 2rem 1.2rem 1.2rem 1.2rem;
      margin-bottom: 2.5rem;
      border: 1.5px solid #b2dfdb;
    }
    .section-title {
      font-size: 2rem;
      font-weight: 900;
      color: #22c55e;
      margin-bottom: 1.2rem;
      letter-spacing: 1px;
      text-shadow: 0 2px 8px #bbf7d0;
      display: flex;
      align-items: center;
      gap: 0.7rem;
    }
    .toggle-label {
      font-weight: 600;
      color: #166534;
      font-size: 1rem;
      margin-left: 0.5rem;
      user-select: none;
    }
    .dashboard-cards {
      display: flex;
      gap: 1.2rem;
      margin-bottom: 2.5rem;
      flex-wrap: wrap;
      justify-content: flex-start;
    }
    .dashboard-card {
      background: linear-gradient(135deg,#bbf7d0 0%,#86efac 100%);
      box-shadow: 0 4px 16px #bbf7d0;
      border-radius: 1rem;
      padding: 1.2rem 1rem;
      text-align: left;
      min-width: 220px;
      flex: 1 1 220px;
      transition: transform 0.3s, box-shadow 0.3s;
      border-left: 6px solid #22c55e;
      position: relative;
    }
    .dashboard-card:hover {
      transform: scale(1.04) translateY(-2px);
      box-shadow: 0 8px 24px #22c55e;
    }
    .dashboard-card .card-label {
      font-size: 1rem;
      color: #166534;
      font-weight: 700;
      margin-bottom: 0.2rem;
    }
    .dashboard-card .card-value {
      font-size: 2rem;
      font-weight: 900;
      color: #14532d;
      margin-bottom: 0.1rem;
    }
    .dashboard-card .card-icon {
      position: absolute;
      top: 1.2rem;
      right: 1.2rem;
      font-size: 2.2rem;
      color: #22c55e;
      opacity: 0.15;
      pointer-events: none;
    }
    .table th, .table td {
      padding: 0.85rem 0.7rem;
      font-size: 1rem;
    }
    .table th {
      background: linear-gradient(90deg,#bbf7d0,#86efac);
      color: #166534;
      font-weight: 700;
      border-bottom: 2px solid #a5d6a7;
      letter-spacing: 0.5px;
    }
    .table tbody tr {
      transition: background 0.2s, box-shadow 0.2s;
    }
    .table tbody tr:hover {
      background: #e8f5e9 !important;
      box-shadow: 0 2px 8px #bbf7d0;
    }
    .table tbody tr[data-status="inactive"] {
      opacity: 0.7;
      background: #f0fdf4 !important;
    }
    .status-btn {
      font-weight: 700;
      border-radius: 9999px;
      padding: 0.4rem 1.2rem;
      font-size: 0.95rem;
      transition: background 0.2s, color 0.2s;
      border: none;
      cursor: pointer;
      outline: none;
      box-shadow: 0 2px 8px #bbf7d0;
    }
    .status-btn.active {
      background: #bbf7d0;
      color: #166534;
    }
    .status-btn.inactive {
      background: #e5e7eb;
      color: #6b7280;
    }
    .action-btn {
      font-size: 0.95rem;
      font-weight: 600;
      border-radius: 0.7rem;
      padding: 0.35rem 1rem;
      margin-right: 0.2rem;
      transition: background 0.2s, color 0.2s;
      border: none;
      cursor: pointer;
      outline: none;
    }
    .action-btn.view { background: #38bdf8; color: #fff; }
    .action-btn.view:hover { background: #0ea5e9; }
    .action-btn.edit { background: #fbbf24; color: #fff; }
    .action-btn.edit:hover { background: #f59e42; }
    .action-btn.delete { background: #ef4444; color: #fff; }
    .action-btn.delete:hover { background: #dc2626; }
    @media (max-width: 900px) {
      .dashboard-cards { flex-direction: column; gap: 1rem; }
      .table-card { padding: 1rem 0.3rem; }
      .section-title { font-size: 1.3rem; }
      .dashboard-card { min-width: unset; }
    }
  </style>
</head>
<body class="bg-green-50 min-h-screen flex flex-col">
  <!-- Navbar -->
  <nav class="bg-green-700 text-green-50 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
      <div class="flex items-center space-x-3">
        <img alt="PWD Portal logo" class="rounded-full" src="https://placehold.co/40x40/png?text=PWD"/>
        <span class="font-bold text-xl tracking-wide">PWD Portal Admin</span>
      </div>
    </div>
  </nav>

  <div class="flex flex-1 overflow-hidden max-h-[calc(100vh-64px)]">
    <!-- Sidebar -->
    <aside class="fixed top-16 left-0 h-[calc(100vh-4rem)] w-64 bg-green-800 text-green-50 p-6 flex flex-col overflow-y-auto z-40 md:translate-x-0">
      <h2 class="text-3xl font-extrabold text-yellow-400 mb-6">Admin Panel</h2>
      <nav class="flex flex-col space-y-3 text-green-100 text-lg font-semibold">
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/dashboard">
          <i class="fas fa-chart-bar"></i><span>Dashboard</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/attendance">
          <i class="fas fa-clipboard-list"></i><span>Attendance</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/reports">
          <i class="fas fa-chart-line"></i><span>Reports</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/announcements">
          <i class="fas fa-bullhorn"></i><span>Announcements</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/classifications">
          <i class="fas fa-folder-open"></i><span>Classifications</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/addacc">
          <i class="fas fa-cog"></i><span>Add Account</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 bg-green-600 rounded-lg" href="{{ route('assistances.index') }}">
          <i class="fas fa-gift"></i><span>Benefits</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/policies">
          <i class="fas fa-file-alt"></i><span>Policies</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/charity">
          <i class="fas fa-hand-holding-heart"></i><span>Charity</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/settings">
          <i class="fas fa-cog"></i><span>Settings</span>
        </a>
        <a class="flex items-center gap-3 mt-auto bg-red-600 px-4 py-3 rounded-lg hover:bg-red-700" href="/logupchoose">
          <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6 ml-0 md:ml-64">
      <!-- Dashboard Cards -->
      <section class="mb-8">
        <h1 class="section-title"><i class="fas fa-tachometer-alt"></i>Dashboard Overview</h1>
        <div class="dashboard-cards">
          <div class="dashboard-card">
            <span class="card-label">Active Benefits</span>
            <span class="card-value">{{ $benefits->count() }}</span>
            <i class="fas fa-gift card-icon"></i>
          </div>
          <div class="dashboard-card">
            <span class="card-label">Privileges Available</span>
            <span class="card-value">{{ $privileges->count() }}</span>
            <i class="fas fa-star card-icon"></i>
          </div>
          <div class="dashboard-card">
            <span class="card-label">Discount Offers</span>
            <span class="card-value">{{ $discounts->count() }}</span>
            <i class="fas fa-tags card-icon"></i>
          </div>
        </div>
      </section>

      <!-- Benefits Table -->
      <div class="table-card">
        <div class="flex items-center justify-between mb-2">
          <h2 class="section-title"><i class="fas fa-gift"></i>Benefits Management</h2>
          <label for="showInactiveBenefits" class="flex items-center cursor-pointer select-none">
            <input type="checkbox" id="showInactiveBenefits" class="form-checkbox h-5 w-5 text-green-600 transition mr-2" onchange="toggleInactiveRows('Benefits')" />
            <span class="toggle-label">Show Inactive</span>
          </label>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full table rounded-lg overflow-hidden">
            <thead>
              <tr>
                <th>Benefit Name</th>
                <th>Program</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th class="w-40">Actions</th>
              </tr>
            </thead>
            <tbody id="benefitsTableBody">
              @foreach($benefits as $item)
              <tr data-status="{{ $item->status }}">
                <td>{{ $item->benefit_name }}</td>
                <td>{{ $item->program }}</td>
                <td>{{ $item->date_granted }}</td>
                <td>{{ $item->date_expiry }}</td>
                <td>
                  @if($item->status === 'active')
                    <span class="status-btn active">Active</span>
                  @else
                    <span class="status-btn inactive">Inactive</span>
                  @endif
                </td>
                <td class="flex gap-1">
                  <button onclick="openViewModal('benefit', '{{ $item->benefit_name }}', '{{ $item->program }}', '{{ $item->date_granted }}', '{{ $item->date_expiry }}')" class="action-btn view">View</button>
                  <button onclick="openEditModal('benefit', {{ $item->id }}, '{{ $item->benefit_name }}', '{{ $item->program }}', '{{ $item->date_granted }}', '{{ $item->date_expiry }}', '{{ route('assistances.update', $item->id) }}')" class="action-btn edit">Edit</button>
                  <form method="POST" action="{{ route('assistances.destroy', $item->id) }}" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn delete"
                            onclick="return confirm('Are you sure you want to delete this benefit?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4 flex justify-end">
          <button onclick="openAddModal('benefit')" class="bg-green-700 hover:bg-green-800 text-white px-4 py-1.5 rounded shadow text-sm">
            <i class="fas fa-plus mr-2"></i>Add New Benefit
          </button>
        </div>
      </div>

      <!-- Privileges Table -->
      <div class="table-card">
        <div class="flex items-center justify-between mb-2">
          <h2 class="section-title"><i class="fas fa-star"></i>Privileges Management</h2>
          <label for="showInactivePrivileges" class="flex items-center cursor-pointer select-none">
            <input type="checkbox" id="showInactivePrivileges" class="form-checkbox h-5 w-5 text-green-600 transition mr-2" onchange="toggleInactiveRows('Privileges')" />
            <span class="toggle-label">Show Inactive</span>
          </label>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full table rounded-lg overflow-hidden">
            <thead>
              <tr>
                <th>Privilege Name</th>
                <th>Description</th>
                <th>Validity Period</th>
                <th>Status</th>
                <th class="w-40">Actions</th>
              </tr>
            </thead>
            <tbody id="privilegesTableBody">
              @foreach($privileges as $item)
              <tr data-status="{{ $item->status }}">
                <td>{{ $item->privilege_name }}</td>
                <td>{{ $item->privilege_description }}</td>
                <td>{{ $item->validity_period }}</td>
                <td>
                  <form method="POST" action="{{ route('assistances.update', $item->id) }}" onsubmit="return confirm('Are you sure you want to change the status of this privilege?')">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="privilege">
                    <input type="hidden" name="privilege_name" value="{{ $item->privilege_name }}">
                    <input type="hidden" name="privilege_description" value="{{ $item->privilege_description }}">
                    <input type="hidden" name="validity_period" value="{{ $item->validity_period }}">
                    <input type="hidden" name="status" value="{{ $item->status === 'active' ? 'inactive' : 'active' }}">
                    <button type="submit"
                      class="status-btn {{ $item->status === 'active' ? 'active' : 'inactive' }}">
                      {{ $item->status === 'active' ? 'Active' : 'Inactive' }}
                    </button>
                  </form>
                </td>
                <td class="flex gap-1">
                  <button onclick="openViewModal('privilege', '{{ $item->privilege_name }}', '{{ $item->privilege_description }}', '{{ $item->validity_period }}')" class="action-btn view">View</button>
                  <button onclick="openEditModal('privilege', {{ $item->id }}, '{{ $item->privilege_name }}', '{{ $item->privilege_description }}', '{{ $item->validity_period }}', '', '{{ route('assistances.update', $item->id) }}')" class="action-btn edit">Edit</button>
                  <form method="POST" action="{{ route('assistances.destroy', $item->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this privilege?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn delete">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4 flex justify-end">
          <button onclick="openAddModal('privilege')" class="bg-green-700 hover:bg-green-800 text-white px-4 py-1.5 rounded shadow text-sm">
            <i class="fas fa-plus mr-2"></i>Add New Privilege
          </button>
        </div>
      </div>

      <!-- Discounts Table -->
      <div class="table-card">
        <div class="flex items-center justify-between mb-2">
          <h2 class="section-title"><i class="fas fa-tags"></i>Discounts Management</h2>
          <label for="showInactiveDiscounts" class="flex items-center cursor-pointer select-none">
            <input type="checkbox" id="showInactiveDiscounts" class="form-checkbox h-5 w-5 text-green-600 transition mr-2" onchange="toggleInactiveRows('Discounts')" />
            <span class="toggle-label">Show Inactive</span>
          </label>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full table rounded-lg overflow-hidden">
            <thead>
              <tr>
                <th>Discount Name</th>
                <th>Establishment</th>
                <th>Discount Rate</th>
                <th>Status</th>
                <th class="w-40">Actions</th>
              </tr>
            </thead>
            <tbody id="discountsTableBody">
              @foreach($discounts as $item)
              <tr data-status="{{ $item->status }}">
                <td>{{ $item->discount_name }}</td>
                <td>{{ $item->establishment }}</td>
                <td>{{ $item->discount_rate }}</td>
                <td>
                  <form method="POST" action="{{ route('assistances.update', $item->id) }}" onsubmit="return confirm('Are you sure you want to change the status of this discount?')">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="discount">
                    <input type="hidden" name="discount_name" value="{{ $item->discount_name }}">
                    <input type="hidden" name="establishment" value="{{ $item->establishment }}">
                    <input type="hidden" name="discount_rate" value="{{ $item->discount_rate }}">
                    <input type="hidden" name="status" value="{{ $item->status === 'active' ? 'inactive' : 'active' }}">
                    <button type="submit"
                      class="status-btn {{ $item->status === 'active' ? 'active' : 'inactive' }}">
                      {{ $item->status === 'active' ? 'Active' : 'Inactive' }}
                    </button>
                  </form>
                </td>
                <td class="flex gap-1">
                  <button onclick="openViewModal('discount', {{ $item->id }}, '{{ $item->discount_name }}', '{{ $item->establishment }}', '{{ $item->discount_rate }}')" class="action-btn view">View</button>
                  <button onclick="openEditModal('discount', {{ $item->id }}, '{{ $item->discount_name }}', '{{ $item->establishment }}', '{{ $item->discount_rate }}', '', '{{ route('assistances.update', $item->id) }}')" class="action-btn edit">Edit</button>
                  <form method="POST" action="{{ route('assistances.destroy', $item->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this discount?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn delete">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4 flex justify-end">
          <button onclick="openAddModal('discount')" class="bg-green-700 hover:bg-green-800 text-white px-4 py-1.5 rounded shadow text-sm">
            <i class="fas fa-plus mr-2"></i>Add New Discount
          </button>
        </div>
      </div>
    </main>
  </div>

  <!-- Add Modal -->
  <div id="add-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
      <h3 class="text-xl font-bold text-green-900 mb-4" id="add-modal-title"></h3>
      <form method="POST" action="{{ route('assistances.store') }}" id="add-modal-form" class="space-y-4">
        @csrf
        <input type="hidden" id="add-type" name="type">
        <div id="add-form-fields"></div>
        <div class="flex justify-end space-x-3 mt-4">
          <button type="button" onclick="closeAddModal()" class="bg-gray-300 px-4 py-2 rounded text-sm">Cancel</button>
          <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded text-sm">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- View Modal -->
  <div id="view-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 border-l-4 border-green-600">
      <div class="flex items-center space-x-3 mb-4">
        <i id="view-modal-icon" class="text-2xl text-green-700"></i>
        <h3 class="text-xl font-bold text-green-900" id="view-modal-title"></h3>
      </div>
      <div id="view-modal-content" class="space-y-4 bg-green-50 p-4 rounded-lg">
      </div>
      <div class="flex justify-end space-x-3 mt-4">
        <button type="button" onclick="closeViewModal()" class="bg-gray-300 px-4 py-2 rounded text-sm hover:bg-gray-400">Close</button>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div id="edit-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
      <h3 class="text-xl font-bold text-green-900 mb-4" id="edit-modal-title"></h3>
      <form method="POST" id="edit-modal-form" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="hidden" id="edit-type" name="type">
        <div id="edit-form-fields"></div>
        <div class="flex justify-end space-x-3 mt-4">
          <button type="button" onclick="closeEditModal()" class="bg-gray-300 px-4 py-2 rounded text-sm">Cancel</button>
          <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded text-sm">Update</button>
        </div>
      </form>
    </div>
  </div>

  <script>
function openAddModal(type) {
  document.getElementById('add-modal').classList.remove('hidden');
  document.getElementById('add-modal-title').innerText = "Add New " + type.charAt(0).toUpperCase() + type.slice(1);
  document.getElementById('add-type').value = type;

  let fields = "";
  if (type === "benefit") {
    fields = `
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Benefit Name</label>
        <input name="benefit_name" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Program</label>
        <input name="program" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div class="flex gap-2">
        <div class="flex-1">
          <label class="block mb-2 text-sm font-semibold text-green-900">Start Date</label>
          <input type="date" name="date_granted" class="w-full border rounded px-3 py-2 text-sm" required>
        </div>
        <div class="flex-1">
          <label class="block mb-2 text-sm font-semibold text-green-900">End Date</label>
          <input type="date" name="date_expiry" class="w-full border rounded px-3 py-2 text-sm" required>
        </div>
      </div>
    `;
  } else if (type === "privilege") {
    fields = `
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Privilege Name</label>
        <input name="privilege_name" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Description</label>
        <textarea name="privilege_description" class="w-full border rounded px-3 py-2 text-sm" required></textarea>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Validity Period</label>
        <input name="validity_period" class="w-full border rounded px-3 py-2 text-sm" required placeholder="e.g. Feb 12, 2025 to Dec 25, 2025 only">
      </div>
    `;
  } else if (type === "discount") {
    fields = `
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Discount Name</label>
        <input name="discount_name" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Establishment</label>
        <input name="establishment" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Discount Rate</label>
        <input name="discount_rate" class="w-full border rounded px-3 py-2 text-sm" required placeholder="e.g. 20% or Free Delivery">
      </div>
    `;
  }
  document.getElementById('add-form-fields').innerHTML = fields;
}

function closeAddModal() {
  document.getElementById('add-modal').classList.add('hidden');
}

function openEditModal(type, id, field1, field2, field3, field4, updateUrl) {
  document.getElementById('edit-modal').classList.remove('hidden');
  document.getElementById('edit-modal-title').innerText = "Edit " + type.charAt(0).toUpperCase() + type.slice(1);
  document.getElementById('edit-type').value = type;
  document.getElementById('edit-modal-form').action = updateUrl;
  let fields = "";
  if (type === "benefit") {
    // field1 = benefit_name, field2 = program, field3 = date_granted, field4 = date_expiry
    fields = `
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Benefit Name</label>
        <input name="benefit_name" value="${field1}" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Program</label>
        <input name="program" value="${field2}" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div class="flex gap-2">
        <div class="flex-1">
          <label class="block mb-2 text-sm font-semibold text-green-900">Start Date</label>
          <input type="date" name="date_granted" value="${field3}" class="w-full border rounded px-3 py-2 text-sm" required>
        </div>
        <div class="flex-1">
          <label class="block mb-2 text-sm font-semibold text-green-900">End Date</label>
          <input type="date" name="date_expiry" value="${field4}" class="w-full border rounded px-3 py-2 text-sm" required>
        </div>
      </div>
    `;
  } else if (type === "privilege") {
    // field1 = privilege_name, field2 = privilege_description, field3 = validity_period
    fields = `
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Privilege Name</label>
        <input name="privilege_name" value="${field1}" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Description</label>
        <textarea name="privilege_description" class="w-full border rounded px-3 py-2 text-sm" required>${field2}</textarea>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Validity Period</label>
        <input name="validity_period" value="${field3}" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
    `;
  } else if (type === "discount") {
    // field1 = discount_name, field2 = establishment, field3 = discount_rate
    fields = `
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Discount Name</label>
        <input name="discount_name" value="${field1}" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Establishment</label>
        <input name="establishment" value="${field2}" class="w-full border rounded px-3 py-2 text-sm" required>
      </div>
      <div>
        <label class="block mb-2 text-sm font-semibold text-green-900">Discount Rate</label>
        <input name="discount_rate" value="${field3}" class="w-full border rounded px-3 py-2 text-sm" required placeholder="e.g. 20% or Free Delivery">
      </div>
    `;
  }
  document.getElementById('edit-form-fields').innerHTML = fields;
}

function closeEditModal() {
  document.getElementById('edit-modal').classList.add('hidden');
}

function openViewModal(type, field1, field2, field3, field4) {
  document.getElementById('view-modal').classList.remove('hidden');
  let content = "";
  if(type === "benefit") {
    // field1 = benefit_name, field2 = program, field3 = date_granted, field4 = date_expiry
    document.getElementById('view-modal-title').innerText = "View Benefit";
    document.getElementById('view-modal-icon').className = "text-2xl text-green-700 fas fa-gift";
    content = `
      <div class="border-b border-green-200 pb-2">
        <p class="text-sm font-semibold text-green-700">Benefit Name</p>
        <p class="text-base text-green-800">${field1}</p>
      </div>
      <div class="border-b border-green-200 pb-2">
        <p class="text-sm font-semibold text-green-700">Program</p>
        <p class="text-base text-green-800">${field2}</p>
      </div>
      <div class="border-b border-green-200 pb-2">
        <p class="text-sm font-semibold text-green-700">Start Date</p>
        <p class="text-base text-green-800">${field3}</p>
      </div>
      <div>
        <p class="text-sm font-semibold text-green-700">End Date</p>
        <p class="text-base text-green-800">${field4}</p>
      </div>`;
  } else if(type === "privilege") {
    // field1 = privilege_name, field2 = privilege_description, field3 = validity_period
    document.getElementById('view-modal-title').innerText = "View Privilege";
    document.getElementById('view-modal-icon').className = "text-2xl text-green-700 fas fa-star";
    content = `
      <div class="border-b border-green-200 pb-2">
        <p class="text-sm font-semibold text-green-700">Privilege Name</p>
        <p class="text-base text-green-800">${field1}</p>
      </div>
      <div class="border-b border-green-200 pb-2">
        <p class="text-sm font-semibold text-green-700">Description</p>
        <p class="text-base text-green-800">${field2}</p>
      </div>
      <div>
        <p class="text-sm font-semibold text-green-700">Validity Period</p>
        <p class="text-base text-green-800">${field3}</p>
      </div>`;
  } else if(type === "discount") {
    // field1 = discount_name, field2 = establishment, field3 = discount_rate
    document.getElementById('view-modal-title').innerText = "View Discount";
    document.getElementById('view-modal-icon').className = "text-2xl text-green-700 fas fa-tags";
    content = `
      <div class="border-b border-green-200 pb-2">
        <p class="text-sm font-semibold text-green-700">Discount Name</p>
        <p class="text-base text-green-800">${field1}</p>
      </div>
      <div class="border-b border-green-200 pb-2">
        <p class="text-sm font-semibold text-green-700">Establishment</p>
        <p class="text-base text-green-800">${field2}</p>
      </div>
      <div>
        <p class="text-sm font-semibold text-green-700">Discount Rate</p>
        <p class="text-base text-green-800">${field3}</p>
      </div>`;
  }
  document.getElementById('view-modal-content').innerHTML = content;
}

function closeViewModal() {
  document.getElementById('view-modal').classList.add('hidden');
}

// Hide inactive rows by default
document.addEventListener('DOMContentLoaded', function() {
  toggleInactiveRows('Benefits');
  toggleInactiveRows('Privileges');
  toggleInactiveRows('Discounts');
});

function toggleInactiveRows(type) {
  let checked, rows;
  if(type === 'Benefits') {
    checked = document.getElementById('showInactiveBenefits').checked;
    rows = document.querySelectorAll('#benefitsTableBody tr[data-status]');
  } else if(type === 'Privileges') {
    checked = document.getElementById('showInactivePrivileges').checked;
    rows = document.querySelectorAll('#privilegesTableBody tr[data-status]');
  } else if(type === 'Discounts') {
    checked = document.getElementById('showInactiveDiscounts').checked;
    rows = document.querySelectorAll('#discountsTableBody tr[data-status]');
  }
  rows.forEach(row => {
    if (row.getAttribute('data-status') === 'inactive') {
      row.style.display = checked ? '' : 'none';
    }
  });
}
</script>
</body>
</html>