<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>PWD Portal - Charity Requests Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-green-50 min-h-screen flex flex-col">
  <!-- Header -->
  <nav class="bg-green-700 text-green-50 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
      <div class="flex items-center space-x-3">
        <i class="fas fa-hand-holding-heart text-yellow-400 text-2xl"></i>
        <span class="font-bold text-xl tracking-wide">Charity Requests Dashboard</span>
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
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg" href="/benefits">
          <i class="fas fa-gift"></i><span>Benefits</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-3 hover:bg-green-600 rounded-lg bg-green-600" href="/charity">
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
      <!-- Summary Section -->
      <section class="mb-6">
        <h2 class="text-lg font-bold text-green-900 mb-3 flex items-center gap-2">
          <i class="fas fa-chart-bar text-green-700"></i> Summary
        </h2>
        @if(count($barangayList) > 0)
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($barangayList as $barangay)
              <div class="bg-white rounded-lg shadow flex flex-col items-center py-4 px-2 border border-green-100">
                <span class="text-green-700 font-bold text-base">{{ $barangay }}</span>
                <span class="text-2xl font-extrabold mt-2 flex items-center gap-2">
                  {{ $barangayCounts[$barangay] ?? 0 }}
                  <span class="text-green-500"><i class="fas fa-circle"></i></span>
                </span>
                <span class="text-xs text-gray-500">Requests</span>
              </div>
            @endforeach
          </div>
        @else
          <div class="bg-white rounded-lg shadow p-6 text-center text-green-700 font-semibold border border-green-100">
            <i class="fas fa-info-circle text-green-500 mr-2"></i>
            No new requests yet
          </div>
        @endif
      </section>

      <!-- Barangay Filter Dropdown (show all barangays of presidents) -->
      <section class="mb-6 flex items-center gap-3">
        <label for="barangayFilter" class="font-semibold text-green-700">Barangay Filter:</label>
        <select id="barangayFilter" class="border border-green-300 rounded px-3 py-2 text-sm">
          <option value="all">All Barangays</option>
          @foreach($allBarangays as $barangay)
            <option value="{{ $barangay }}">
              {{ $barangay }}
            </option>
          @endforeach
        </select>
      </section>

      <!-- Requests Table: New Requests -->
      <section>
        <div id="requests-section">
          <!-- New Requests (Pending/Endorsed) -->
          <div id="new-requests-table" class="mb-6">
            <h3 class="text-lg font-bold text-green-700 mb-2 flex items-center gap-2">
              <i class="fas fa-clock text-green-600"></i> New Requests
            </h3>
            <div class="overflow-x-auto bg-white rounded-lg shadow border border-green-100 mb-4">
              <table class="min-w-full divide-y divide-green-200">
                <thead class="bg-green-100">
                  <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Request ID</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Request Type</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Category</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Sub-Category</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Details</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-green-700 uppercase">Action</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-green-100" id="newRequestsBody">
                  @foreach($requests as $request)
                    @if(in_array($request->status, ['pending', 'endorsed']))
                      <!-- Update all table rows to use president's barangay for filtering -->
                      <tr class="hover:bg-green-50 request-row"
                          data-barangay="{{ $request->president->barangay_name ?? '' }}"
                          data-status="{{ $request->status }}">
                        <td class="px-4 py-3 font-semibold text-green-900">{{ str_pad($request->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-4 py-3">{{ $request->request_type }}</td>
                        <td class="px-4 py-3">{{ $request->category }}</td>
                        <td class="px-4 py-3">{{ $request->sub_category }}</td>
                        <td class="px-4 py-3">{{ $request->details }}</td>
                        <td class="px-4 py-3 text-center flex gap-2 justify-center">
                          <button type="button"
                            class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs approve-btn"
                            data-id="{{ $request->id }}"
                            data-type="{{ $request->request_type }}">
                            Approve
                          </button>
                          <form method="POST" action="/admin/charity/{{ $request->id }}/reject" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Reject</button>
                          </form>
                          <button class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded text-xs view-btn"
                            data-request="{{ json_encode([
                              'member' => [
                                'first_name' => $request->member->first_name ?? '',
                                'middle_name' => $request->member->middle_name ?? '',
                                'last_name' => $request->member->last_name ?? '',
                                'sex' => $request->member->sex ?? '',
                                'disability_type' => $request->member->disability_type ?? '',
                                'disability_cause' => $request->member->disability_cause ?? '',
                                'residence_address' => $request->member->residence_address ?? '',
                                'contact_details' => $request->member->contact_details ?? '',
                                'educational_attainment' => $request->member->educational_attainment ?? '',
                                'occupation' => $request->member->occupation ?? '',
                                'barangay_name' => $request->member->barangay_name ?? '',
                              ],
                              'president' => [
                                'first_name' => $request->president->first_name ?? '',
                                'middle_name' => $request->president->middle_name ?? '',
                                'last_name' => $request->president->last_name ?? '',
                                'barangay_name' => $request->president->barangay_name ?? ''
                              ]
                            ]) }}"
                            title="View Details">View</button>
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>

            <!-- Bar Graph: Monthly Request Summary for Selected Barangay (larger size) -->
            <div class="bg-white rounded-lg shadow border border-green-100 p-6 mb-4 flex flex-col items-center" style="max-width: 600px; margin: 0 auto;">
              <h4 class="text-base font-bold text-green-700 mb-2 flex items-center gap-2">
                <i class="fas fa-chart-bar"></i> Monthly Request Summary
              </h4>
              <canvas id="barangayBarChart" height="140" style="max-width: 520px;"></canvas>
            </div>

            <!-- Button to view processed requests -->
            <div class="flex justify-center mb-8">
              <button id="viewProcessedBtn" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded text-sm font-semibold flex items-center gap-2">
                <i class="fas fa-history"></i> View Processed Requests
              </button>
            </div>
          </div>

          <!-- Processed Requests Table (hidden by default) -->
          <div id="processed-requests-table" class="hidden">
            <h3 class="text-lg font-bold text-green-700 mb-2 flex items-center gap-2">
              <i class="fas fa-check-circle text-green-600"></i> Processed Requests
            </h3>
            <div class="overflow-x-auto bg-white rounded-lg shadow border border-green-100">
              <table class="min-w-full divide-y divide-green-200">
                <thead class="bg-green-100">
                  <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Request ID</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Request Type</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Category</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Sub-Category</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-green-700 uppercase">Details</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-green-700 uppercase">Action</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-green-100" id="processedRequestsBody">
                  @foreach($requests as $request)
                    @if(in_array($request->status, ['approved', 'rejected']))
                      <tr class="hover:bg-green-50 request-row"
                          data-barangay="{{ $request->president->barangay_name ?? '' }}"
                          data-status="{{ $request->status }}">
                        <td class="px-4 py-3 font-semibold text-green-900">{{ str_pad($request->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-4 py-3">{{ $request->request_type }}</td>
                        <td class="px-4 py-3">{{ $request->category }}</td>
                        <td class="px-4 py-3">{{ $request->sub_category }}</td>
                        <td class="px-4 py-3">{{ $request->details }}</td>
                        <td class="px-4 py-3 text-center flex gap-2 justify-center">
                          @if($request->status == 'approved')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded text-xs font-bold flex items-center gap-1">
                              <i class="fas fa-check-circle"></i> Approved
                            </span>
                          @elseif($request->status == 'rejected')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded text-xs font-bold flex items-center gap-1">
                              <i class="fas fa-times-circle"></i> Rejected
                            </span>
                          @endif
                          <button class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded text-xs view-btn"
                            data-request="{{ json_encode([
                              'member' => [
                                'first_name' => $request->member->first_name ?? '',
                                'middle_name' => $request->member->middle_name ?? '',
                                'last_name' => $request->member->last_name ?? '',
                                'sex' => $request->member->sex ?? '',
                                'disability_type' => $request->member->disability_type ?? '',
                                'disability_cause' => $request->member->disability_cause ?? '',
                                'residence_address' => $request->member->residence_address ?? '',
                                'contact_details' => $request->member->contact_details ?? '',
                                'educational_attainment' => $request->member->educational_attainment ?? '',
                                'occupation' => $request->member->occupation ?? '',
                                'barangay_name' => $request->member->barangay_name ?? '',
                              ],
                              'president' => [
                                'first_name' => $request->president->first_name ?? '',
                                'middle_name' => $request->president->middle_name ?? '',
                                'last_name' => $request->president->last_name ?? '',
                                'barangay_name' => $request->president->barangay_name ?? ''
                              ]
                            ]) }}"
                            title="View Details">View</button>
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="flex justify-center mt-4">
              <button id="hideProcessedBtn" class="bg-gray-300 hover:bg-gray-400 text-green-700 px-4 py-2 rounded text-sm font-semibold flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> Back to New Requests
              </button>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <!-- View Modal -->
  <div id="view-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 border-l-4 border-green-600">
      <div class="flex items-center space-x-3 mb-4">
        <i class="fas fa-map-marker-alt text-green-700 text-2xl"></i>
        <h3 class="text-xl font-bold text-green-900" id="view-modal-title"></h3>
      </div>
      <div id="view-modal-content" class="space-y-4 bg-green-50 p-4 rounded-lg"></div>
      <div class="flex justify-end space-x-3 mt-4">
        <button type="button" onclick="closeViewModal()" class="bg-gray-300 px-4 py-2 rounded text-sm hover:bg-gray-400">Close</button>
      </div>
    </div>
  </div>

  <!-- Approve Modal (no hidden input for request_id, just requirements) -->
  <div id="approve-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 border-l-4 border-green-600">
      <div class="flex items-center space-x-3 mb-4">
        <i class="fas fa-clipboard-list text-green-700 text-2xl"></i>
        <h3 class="text-xl font-bold text-green-900">Enter requirements for member</h3>
      </div>
      <form id="approveForm" method="POST">
        @csrf
        <label class="block text-green-700 font-semibold mb-2" for="requirements">Requirements:</label>
        <textarea name="requirements" id="requirementsText" rows="6" class="w-full border border-green-300 rounded px-3 py-2 mb-4 text-sm" required></textarea>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeApproveModal()" class="bg-gray-300 px-4 py-2 rounded text-sm hover:bg-gray-400">Cancel</button>
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-semibold">Approve</button>
        </div>
      </form>
    </div>
  </div>

  <footer class="bg-green-700 text-green-200 py-4 mt-auto w-full">
    <div class="container mx-auto px-4 text-center text-sm select-none">
      © 2024 PWD Portal. All rights reserved.
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Approve Button Modal
      const defaultRequirements = {
        "Medical Assistance": "Valid ID\nDoctor's Prescription\nMedical Certificate ",
        "Educational Assistance": "Valid ID\nSchool ID\nEnrollment Form or Certificate of Registration",
        "Equipment Support": "Valid ID\nBarangay Certificate"
      };

      document.querySelectorAll('.approve-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const requestId = btn.getAttribute('data-id');
          const requestType = btn.getAttribute('data-type');
          document.getElementById('requirementsText').value = defaultRequirements[requestType] || "";
          document.getElementById('approveForm').setAttribute('action', `/admin/charity/${requestId}/approve`);
          document.getElementById('approve-modal').classList.remove('hidden');
        });
      });

      window.closeApproveModal = function() {
        document.getElementById('approve-modal').classList.add('hidden');
        document.getElementById('requirementsText').value = '';
      };

      // View Details Modal
      document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const data = JSON.parse(btn.getAttribute('data-request'));
          document.getElementById('view-modal-title').textContent = data.member.barangay_name;
          let presidentFullName = `${data.president.first_name} ${data.president.middle_name ?? ''} ${data.president.last_name}`;
          let memberInfo = `
            <div class="mb-4 p-4 rounded-lg bg-gradient-to-r from-green-100 to-green-50 border-l-4 border-green-400 shadow">
              <h4 class="font-bold text-green-700 mb-2 flex items-center gap-2">
                <i class="fas fa-user-tie text-green-600"></i> President Endorsed
              </h4>
              <div class="text-green-900 text-base font-semibold"><b>President Name:</b> ${presidentFullName}</div>
            </div>
            <div class="mb-4 p-4 rounded-lg bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-400 shadow">
              <h4 class="font-bold text-green-700 mb-2 flex items-center gap-2">
                <i class="fas fa-user text-green-600"></i> Member Information
              </h4>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 text-green-900">
                <div><b>First Name:</b> ${data.member.first_name}</div>
                <div><b>Middle Name:</b> ${data.member.middle_name}</div>
                <div><b>Last Name:</b> ${data.member.last_name}</div>
                <div><b>Sex:</b> ${data.member.sex}</div>
                <div><b>Disability Type:</b> ${data.member.disability_type}</div>
                <div><b>Disability Cause:</b> ${data.member.disability_cause}</div>
                <div class="md:col-span-2"><b>Residence Address:</b> ${data.member.residence_address}</div>
                <div class="md:col-span-2"><b>Contact Details:</b> ${data.member.contact_details}</div>
                <div><b>Educational Attainment:</b> ${data.member.educational_attainment}</div>
                <div><b>Occupation:</b> ${data.member.occupation}</div>
                <div><b>Barangay:</b> ${data.member.barangay_name}</div>
              </div>
            </div>
          `;
          document.getElementById('view-modal-content').innerHTML = memberInfo;
          document.getElementById('view-modal').classList.remove('hidden');
        });
      });

      window.closeViewModal = function() {
        document.getElementById('view-modal').classList.add('hidden');
        document.getElementById('view-modal-content').innerHTML = '';
        document.getElementById('view-modal-title').textContent = '';
      };

      // Barangay Filter
      document.getElementById('barangayFilter').addEventListener('change', function() {
        let selected = this.value;
        document.querySelectorAll('.request-row').forEach(row => {
          if(selected === 'all' || row.getAttribute('data-barangay') === selected) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
        renderBarangayBarChart(getSelectedBarangay());
      });

      // Barangay Tabs
      document.querySelectorAll('.barangay-tab').forEach(tab => {
        tab.addEventListener('click', function() {
          let barangay = this.getAttribute('data-barangay');
          document.querySelectorAll('.request-row').forEach(row => {
            if(barangay === 'all' || row.getAttribute('data-barangay') === barangay) {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          });
          document.querySelectorAll('.barangay-tab').forEach(t => {
            t.classList.remove('bg-green-600', 'text-white');
            t.classList.add('bg-green-100', 'text-green-800');
          });
          this.classList.add('bg-green-600', 'text-white');
          this.classList.remove('bg-green-100', 'text-green-800');
          renderBarangayBarChart(getSelectedBarangay());
        });
      });

      // Default: show all in tabs and dropdown
      if(document.querySelector('.barangay-tab[data-barangay="all"]')) {
        document.querySelector('.barangay-tab[data-barangay="all"]').click();
      }
      document.getElementById('barangayFilter').value = 'all';
      document.getElementById('barangayFilter').dispatchEvent(new Event('change'));

      // Show/hide processed requests table
      document.getElementById('viewProcessedBtn').addEventListener('click', function() {
        document.getElementById('processed-requests-table').classList.remove('hidden');
        document.getElementById('new-requests-table').classList.add('hidden');
      });
      document.getElementById('hideProcessedBtn').addEventListener('click', function() {
        document.getElementById('processed-requests-table').classList.add('hidden');
        document.getElementById('new-requests-table').classList.remove('hidden');
      });

      // Bar Graph
      const barangayMonthlyData = @json($monthlyBarangayRequests ?? []);
      let chartInstance = null;
      function getSelectedBarangay() {
        let tab = document.querySelector('.barangay-tab.bg-green-600');
        if(tab && tab.getAttribute('data-barangay') !== 'all') {
          return tab.getAttribute('data-barangay');
        }
        let dropdown = document.getElementById('barangayFilter');
        if(dropdown && dropdown.value !== 'all') {
          return dropdown.value;
        }
        return 'all';
      }
      function renderBarangayBarChart(barangay) {
        const ctx = document.getElementById('barangayBarChart').getContext('2d');
        let data = barangayMonthlyData[barangay] || {};
        // Use month names as labels
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        let months = Object.keys(data).map(m => monthNames[m - 1] ?? m);
        let counts = Object.values(data);

        // If "all", sum all barangays per month
        if(barangay === 'all') {
          let allMonths = {};
          Object.values(barangayMonthlyData).forEach(bData => {
            Object.entries(bData).forEach(([month, count]) => {
              allMonths[month] = (allMonths[month] || 0) + count;
            });
          });
          months = Object.keys(allMonths).map(m => monthNames[m - 1] ?? m);
          counts = Object.values(allMonths);
        }

        if(chartInstance) chartInstance.destroy();
        chartInstance = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: months.length ? months : ['No Data'],
            datasets: [{
              label: 'Requests',
              data: counts.length ? counts : [0],
              backgroundColor: 'rgba(34,197,94,0.7)',
              borderColor: 'rgba(34,197,94,1)',
              borderWidth: 1,
            }]
          },
          options: {
            scales: {
              x: { title: { display: true, text: 'Month' } },
              y: { beginAtZero: true, title: { display: true, text: 'Requests' }, ticks: { stepSize: 1 } }
            },
            plugins: {
              legend: { display: false }
            }
          }
        });
      }
      renderBarangayBarChart(getSelectedBarangay());
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Prepare monthly request data for each barangay
    const barangayMonthlyData = @json($monthlyBarangayRequests ?? []);

    // Get selected barangay from dropdown or tab
    function getSelectedBarangay() {
      let tab = document.querySelector('.barangay-tab.bg-green-600');
      if(tab && tab.getAttribute('data-barangay') !== 'all') {
        return tab.getAttribute('data-barangay');
      }
      let dropdown = document.getElementById('barangayFilter');
      if(dropdown && dropdown.value !== 'all') {
        return dropdown.value;
      }
      return 'all';
    }

    // Render bar chart for selected barangay
    let chartInstance = null;
    function renderBarangayBarChart(barangay) {
      const ctx = document.getElementById('barangayBarChart').getContext('2d');
      let data = barangayMonthlyData[barangay] || {};
      // Use month names as labels
      const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      let months = Object.keys(data).map(m => monthNames[m - 1] ?? m);
      let counts = Object.values(data);

      // If "all", sum all barangays per month
      if(barangay === 'all') {
        let allMonths = {};
        Object.values(barangayMonthlyData).forEach(bData => {
          Object.entries(bData).forEach(([month, count]) => {
            allMonths[month] = (allMonths[month] || 0) + count;
          });
        });
        months = Object.keys(allMonths).map(m => monthNames[m - 1] ?? m);
        counts = Object.values(allMonths);
      }

      if(chartInstance) chartInstance.destroy();
      chartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: months.length ? months : ['No Data'],
          datasets: [{
            label: 'Requests',
            data: counts.length ? counts : [0],
            backgroundColor: 'rgba(34,197,94,0.7)',
            borderColor: 'rgba(34,197,94,1)',
            borderWidth: 1,
          }]
        },
        options: {
          scales: {
            x: { title: { display: true, text: 'Month' } },
            y: { beginAtZero: true, title: { display: true, text: 'Requests' }, ticks: { stepSize: 1 } }
          },
          plugins: {
            legend: { display: false }
          }
        }
      });
    }

    // Initial render
    document.addEventListener('DOMContentLoaded', function() {
      renderBarangayBarChart(getSelectedBarangay());
    });

    // Update chart on barangay tab or dropdown change
    document.querySelectorAll('.barangay-tab').forEach(tab => {
      tab.addEventListener('click', function() {
        setTimeout(() => renderBarangayBarChart(getSelectedBarangay()), 100);
      });
    });
    document.getElementById('barangayFilter').addEventListener('change', function() {
      setTimeout(() => renderBarangayBarChart(getSelectedBarangay()), 100);
    });

    // Show/hide processed requests table
    document.getElementById('viewProcessedBtn').addEventListener('click', function() {
      document.getElementById('processed-requests-table').classList.remove('hidden');
      document.getElementById('new-requests-table').classList.add('hidden');
    });
    document.getElementById('hideProcessedBtn').addEventListener('click', function() {
      document.getElementById('processed-requests-table').classList.add('hidden');
      document.getElementById('new-requests-table').classList.remove('hidden');
    });

    // Add confirmation to reject buttons
    document.querySelectorAll('form[action*="/reject"]').forEach(form => {
      form.addEventListener('submit', function(e) {
        if(!confirm('Are you sure you want to reject this request?')) {
          e.preventDefault();
        }
      });
    });
  </script>
</body>
</html>