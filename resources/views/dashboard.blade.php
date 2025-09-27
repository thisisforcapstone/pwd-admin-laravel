<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - PWD Panel</title>
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
        /* Scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: var(--light-green);
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        /* Card hover effect */
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px rgba(46, 125, 50, 0.3);
        }
        /* Smooth transform */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        /* Scrollbar for card content */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: var(--light-green);
            border-radius: 10px;
        }
        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }
    </style>
</head>
<body>
    <button id="toggleBtn" aria-label="Toggle Sidebar" class="fixed top-5 left-0.5 z-50 bg-yellow-400 text-black p-3 rounded-lg shadow-md hover:bg-yellow-300 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 md:hidden">
        <i class="fas fa-bars fa-lg"></i>
    </button>

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

        <!-- Main Content -->
        <main id="mainContent" class="flex-grow ml-0 md:ml-64 p-8 bg-bg-color min-h-screen transition-all duration-300">
            <header class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-10 gap-4">
                <h1 class="text-3xl font-extrabold text-main-green select-none" style="color: var(--main-green);">Welcome, Admin 👋</h1>
                <form role="search" class="w-full sm:w-auto">
                    <label for="searchInput" class="sr-only">Search here</label>
                    <input id="searchInput" type="search" placeholder="Search here..." aria-label="Search here" class="w-full sm:w-64 px-4 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition" />
                </form>
            </header>

            <section aria-label="Dashboard Cards" class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-5xl mx-auto">
                <!-- Announcements Card -->
                <article role="region" aria-labelledby="announcementsTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-bullhorn text-yellow-400 text-3xl"></i>
                        <h2 id="announcementsTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Announcements</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Stay updated with the latest news and important messages from the administration.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>Access:</strong> Click the "Announcements" tab in the sidebar to view all announcements.</li>
                            <li><strong>Read:</strong> Browse through recent announcements to stay informed about events, updates, and alerts.</li>
                            <li><strong>Details:</strong> Click on any announcement to see full details and related documents if available.</li>
                            <li><strong>Notifications:</strong> Enable notifications in settings to receive alerts for new announcements.</li>
                        </ol>
                    </div>
                    <a href="/announcements" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Announcements &rarr;</a>
                </article>

                <!-- Attendance Card -->
                <article role="region" aria-labelledby="attendanceTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-clipboard-list text-yellow-400 text-3xl"></i>
                        <h2 id="attendanceTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Attendance</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Manage and monitor attendance records efficiently.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>View Records:</strong> Click "Attendance" in the sidebar to see daily and monthly attendance logs.</li>
                            <li><strong>Mark Attendance:</strong> Use the attendance form to mark present, absent, or late for individuals.</li>
                            <li><strong>Reports:</strong> Generate attendance reports for specific dates or periods.</li>
                            <li><strong>Alerts:</strong> Set up alerts for frequent absences or late arrivals in settings.</li>
                        </ol>
                    </div>
                    <a href="/attendance" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Attendance &rarr;</a>
                </article>

                <!-- Reports Card -->
                <article role="region" aria-labelledby="reportsTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-chart-line text-yellow-400 text-3xl"></i>
                        <h2 id="reportsTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Reports</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Analyze data and generate comprehensive reports.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>Access Reports:</strong> Navigate to "Reports" from the sidebar to view existing reports.</li>
                            <li><strong>Create New:</strong> Use the report creation tool to compile data from attendance, classifications, and announcements.</li>
                            <li><strong>Filter:</strong> Apply filters by date, category, or location to customize reports.</li>
                            <li><strong>Export:</strong> Download reports in PDF or Excel formats for sharing and archiving.</li>
                        </ol>
                    </div>
                    <a href="/reports" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Reports &rarr;</a>
                </article>

                <!-- Classifications Card -->
                <article role="region" aria-labelledby="classificationsTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-folder-open text-yellow-400 text-3xl"></i>
                        <h2 id="classificationsTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Classifications</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Organize and review classification data for individuals in the municipality.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>View Categories:</strong> Click "Classifications" in the sidebar to see all classification types.</li>
                            <li><strong>Add New:</strong> Use the form to add new classification records with detailed information.</li>
                            <li><strong>Edit & Update:</strong> Modify existing classifications to keep data accurate and current.</li>
                            <li><strong>Reports & Analytics:</strong> Access charts and reports to analyze classification trends and distributions.</li>
                        </ol>
                    </div>
                    <a href="/classifications" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Classifications &rarr;</a>
                </article>

                <!-- Add Account Card -->
                <article role="region" aria-labelledby="addAccountTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-user-plus text-yellow-400 text-3xl"></i>
                        <h2 id="addAccountTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Add Account</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Create new user accounts for administrators or staff members.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>Access Form:</strong> Click the button below to access the account creation form.</li>
                            <li><strong>Fill Details:</strong> Provide all required information including username, email, and password.</li>
                            <li><strong>Set Permissions:</strong> Assign appropriate access levels and permissions for the new account.</li>
                            <li><strong>Confirmation:</strong> Receive confirmation once the account has been successfully created.</li>
                        </ol>
                    </div>
                    <a href="/addacc" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Add Account &rarr;</a>
                </article>

                <!-- Benefits Card -->
                <article role="region" aria-labelledby="benefitsTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-gift text-yellow-400 text-3xl"></i>
                        <h2 id="benefitsTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Benefits</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Explore the various benefits available for persons with disabilities in the municipality.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>Financial Assistance:</strong> Information on grants and subsidies provided to eligible individuals.</li>
                            <li><strong>Healthcare:</strong> Access to specialized medical services and support programs.</li>
                            <li><strong>Education:</strong> Scholarships and inclusive education initiatives.</li>
                            <li><strong>Employment:</strong> Job placement services and vocational training opportunities.</li>
                        </ol>
                    </div>
                    <a href="/benefits" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Benefits &rarr;</a>
                </article>

                <!-- Policies Card -->
                <article role="region" aria-labelledby="policiesTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-file-alt text-yellow-400 text-3xl"></i>
                        <h2 id="policiesTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Laws & Policies</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Review the legal framework and policies supporting persons with disabilities.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>Disability Rights Act:</strong> Overview of rights and protections under the law.</li>
                            <li><strong>Accessibility Standards:</strong> Guidelines for public and private facilities to ensure accessibility.</li>
                            <li><strong>Employment Policies:</strong> Regulations promoting equal employment opportunities.</li>
                            <li><strong>Social Welfare Programs:</strong> Policies related to social services and benefits.</li>
                        </ol>
                    </div>
                    <a href="/policies" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Policies &rarr;</a>
                </article>

                <!-- Charity Section Card -->
                <article role="region" aria-labelledby="charityTitle" class="bg-white rounded-3xl shadow-lg p-8 flex flex-col justify-between border-2 border-main-green card-hover" style="border-color: var(--main-green);">
                    <header class="flex items-center gap-4 mb-6">
                        <i class="fas fa-hand-holding-heart text-yellow-400 text-3xl"></i>
                        <h2 id="charityTitle" class="text-2xl font-bold text-main-green" style="color: var(--main-green);">Charity Section</h2>
                    </header>
                    <div class="text-gray-700 text-base leading-relaxed space-y-4 flex-grow scrollbar-thin overflow-y-auto max-h-56 pr-2">
                        <p>Support and participate in charitable activities aimed at improving lives.</p>
                        <ol class="list-decimal list-inside space-y-2 pl-4">
                            <li><strong>Donation Drives:</strong> Information on ongoing and upcoming donation campaigns.</li>
                            <li><strong>Volunteer Opportunities:</strong> Ways to get involved and contribute time and skills.</li>
                            <li><strong>Community Projects:</strong> Initiatives focused on infrastructure and service improvements.</li>
                            <li><strong>Partnerships:</strong> Collaborations with NGOs and local organizations.</li>
                        </ol>
                    </div>
                    <a href="/charity" class="mt-8 inline-block text-main-green font-semibold hover:text-yellow-400 transition-colors self-start text-lg" style="color: var(--main-green);">Go to Charity Section &rarr;</a>
                </article>
            </section>
        </main>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggleBtn = document.getElementById('sidebar-toggle');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            if (sidebar.classList.contains('-translate-x-full')) {
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            } else {
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            }
        });

        sidebarToggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            if (sidebar.classList.contains('-translate-x-full')) {
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            } else {
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            }
        });

        // Initialize sidebar state for small screens
        function handleResize() {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('-translate-x-full');
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            }
        }

        handleResize();

        window.addEventListener('resize', handleResize);
    </script>
</body>
</html>