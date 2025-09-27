<html class="scroll-smooth" lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   PWD Portal - Laws &amp; Policies
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   :root {
      --main-green: #166534;
      --light-green: #4ade80;
    }
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
 </head>
 <body class="bg-green-50 text-green-900 min-h-screen flex flex-col">
  <button aria-label="Toggle Sidebar" class="fixed top-5 left-2 z-50 bg-yellow-400 text-black p-3 rounded-lg shadow-md hover:bg-yellow-300 transition-colors focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 md:hidden" id="toggleBtn">
   <i class="fas fa-bars fa-lg">
   </i>
  </button>
  <div class="flex min-h-screen transition-all duration-300" id="dashboard">
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
   <!-- Main content wrapper -->
   <div class="flex flex-col flex-grow ml-0 md:ml-64 transition-all duration-300" id="mainContent">
    <header class="bg-green-800 shadow-md">
     <div class="container mx-auto px-6 py-5 flex flex-col md:flex-row items-center justify-between">
      <a class="flex items-center space-x-3" href="#">
       <img alt="Seal of San Carlos, Pangasinan, official municipal emblem in green and gold" class="w-12 h-12 rounded-full" height="48" src="https://placehold.co/48x48/png?text=SC" width="48"/>
       <div>
        <h1 class="text-white text-2xl font-extrabold leading-tight">
         San Carlos City, Pangasinan
        </h1>
        <p class="text-green-200 text-sm font-semibold tracking-wide">
         PWD Portal - Laws &amp; Policies
        </p>
       </div>
      </a>
      <nav class="mt-4 md:mt-0">
       <ul class="flex flex-col md:flex-row md:space-x-8 text-green-100 font-semibold text-lg">
        <li>
         <a class="block py-2 px-3 rounded-md hover:bg-green-700 transition" href="#laws">
          Laws &amp; Policies
         </a>
        </li>
        <li>
         <a class="block py-2 px-3 rounded-md hover:bg-green-700 transition" href="#updates">
          Policy Updates
         </a>
        </li>
        <li>
         <a class="block py-2 px-3 rounded-md hover:bg-green-700 transition" href="#contact">
          Contact
         </a>
        </li>
       </ul>
      </nav>
     </div>
    </header>
    <main class="flex-grow container mx-auto px-6 py-10 max-w-7xl">
     <section class="mb-16" id="laws">
      <h2 class="text-4xl font-extrabold mb-6 text-green-900 tracking-tight drop-shadow-sm">
       Laws &amp; Policies
      </h2>
      <p class="text-green-800 max-w-4xl mb-10 leading-relaxed text-lg">
       Welcome to the PWD Portal's Laws &amp; Policies section. Here you
            will find comprehensive information about the legal framework,
            policies, and rights that protect and empower Persons with
            Disabilities (PWD). Stay informed and empowered with the latest
            updates and detailed explanations of relevant laws.
      </p>
      <img alt="Illustration showing legal documents, a gavel, and accessibility icons representing laws and policies for persons with disabilities" class="w-full rounded-2xl shadow-2xl object-cover max-h-[400px]" height="400" src="https://storage.googleapis.com/a1aa/image/8d8476d6-61a9-4f80-d077-46b1de8fa8ec.jpg" width="1200"/>
     </section>
     <section>
      <h3 class="text-3xl font-bold mb-8 text-green-900 border-b-4 border-green-700 inline-block pb-3 tracking-wide">
       Key Laws &amp; Policies
      </h3>
      <div class="grid gap-10 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
       <article class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition-shadow flex flex-col">
        <img alt="Cover image of Republic Act No. 7277 - Magna Carta for Persons with Disabilities document with official seal" class="rounded-xl mb-6 w-full object-cover h-48" height="192" src="https://storage.googleapis.com/a1aa/image/03d8dd51-7157-49db-c75e-ff504499fcc6.jpg" width="400"/>
        <h4 class="text-2xl font-semibold text-green-900 mb-3 leading-snug">
         Republic Act No. 7277
        </h4>
        <p class="text-green-700 mb-6 flex-grow leading-relaxed text-base">
         Also known as the Magna Carta for Persons with Disabilities,
                this law promotes the rights and privileges of PWDs, ensuring
                equal opportunities and protection under the law.
        </p>
        <a class="text-green-700 font-semibold hover:text-green-900 inline-flex items-center transition" href="#">
         Read More
         <i class="fas fa-arrow-right ml-3 text-lg">
         </i>
        </a>
       </article>
       <article class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition-shadow flex flex-col">
        <img alt="Cover image of Republic Act No. 9442 - An Act Amending the Magna Carta for Persons with Disabilities document with official seal" class="rounded-xl mb-6 w-full object-cover h-48" height="192" src="https://storage.googleapis.com/a1aa/image/f634adcb-a2bc-48eb-7a64-b8404663cfd8.jpg" width="400"/>
        <h4 class="text-2xl font-semibold text-green-900 mb-3 leading-snug">
         Republic Act No. 9442
        </h4>
        <p class="text-green-700 mb-6 flex-grow leading-relaxed text-base">
         This act amends the Magna Carta for Persons with Disabilities to
                further strengthen the rights and privileges of PWDs,
                including employment and accessibility provisions.
        </p>
        <a class="text-green-700 font-semibold hover:text-green-900 inline-flex items-center transition" href="#">
         Read More
         <i class="fas fa-arrow-right ml-3 text-lg">
         </i>
        </a>
       </article>
       <article class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition-shadow flex flex-col">
        <img alt="Cover image of Republic Act No. 10524 - An Act Expanding the Positions Reserved for PWDs in Government Offices document with official seal" class="rounded-xl mb-6 w-full object-cover h-48" height="192" src="https://storage.googleapis.com/a1aa/image/e2399ac9-3024-4946-91be-c485b404fc51.jpg" width="400"/>
        <h4 class="text-2xl font-semibold text-green-900 mb-3 leading-snug">
         Republic Act No. 10524
        </h4>
        <p class="text-green-700 mb-6 flex-grow leading-relaxed text-base">
         This law expands the positions reserved for PWDs in government
                offices and promotes their integration into the mainstream
                workforce.
        </p>
        <a class="text-green-700 font-semibold hover:text-green-900 inline-flex items-center transition" href="#">
         Read More
         <i class="fas fa-arrow-right ml-3 text-lg">
         </i>
        </a>
       </article>
       <article class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition-shadow flex flex-col">
        <img alt="Cover image of Batas Pambansa 344 - Accessibility Law document with official seal" class="rounded-xl mb-6 w-full object-cover h-48" height="192" src="https://storage.googleapis.com/a1aa/image/18a18526-2f08-4a7d-df21-932c040ff4be.jpg" width="400"/>
        <h4 class="text-2xl font-semibold text-green-900 mb-3 leading-snug">
         Batas Pambansa 344
        </h4>
        <p class="text-green-700 mb-6 flex-grow leading-relaxed text-base">
         Known as the Accessibility Law, it mandates the installation of
                facilities and infrastructure to ensure accessibility for PWDs
                in public and private buildings.
        </p>
        <a class="text-green-700 font-semibold hover:text-green-900 inline-flex items-center transition" href="#">
         Read More
         <i class="fas fa-arrow-right ml-3 text-lg">
         </i>
        </a>
       </article>
       <article class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition-shadow flex flex-col">
        <img alt="Cover image of Republic Act No. 10911 - Anti-Age Discrimination in Employment Act document with official seal" class="rounded-xl mb-6 w-full object-cover h-48" height="192" src="https://storage.googleapis.com/a1aa/image/524d85e5-ed69-449f-8535-fff93971c28c.jpg" width="400"/>
        <h4 class="text-2xl font-semibold text-green-900 mb-3 leading-snug">
         Republic Act No. 10911
        </h4>
        <p class="text-green-700 mb-6 flex-grow leading-relaxed text-base">
         This act prohibits age discrimination in employment, which also
                benefits PWDs by promoting fair hiring and retention practices.
        </p>
        <a class="text-green-700 font-semibold hover:text-green-900 inline-flex items-center transition" href="#">
         Read More
         <i class="fas fa-arrow-right ml-3 text-lg">
         </i>
        </a>
       </article>
       <article class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-2xl transition-shadow flex flex-col">
        <img alt="Cover image of Republic Act No. 11210 - 105-Day Expanded Maternity Leave Law document with official seal" class="rounded-xl mb-6 w-full object-cover h-48" height="192" src="https://storage.googleapis.com/a1aa/image/35688099-ae55-4a24-61e0-127820a09ec4.jpg" width="400"/>
        <h4 class="text-2xl font-semibold text-green-900 mb-3 leading-snug">
         Republic Act No. 11210
        </h4>
        <p class="text-green-700 mb-6 flex-grow leading-relaxed text-base">
         This law provides expanded maternity leave benefits, supporting
                PWD mothers and promoting inclusive workplace policies.
        </p>
        <a class="text-green-700 font-semibold hover:text-green-900 inline-flex items-center transition" href="#">
         Read More
         <i class="fas fa-arrow-right ml-3 text-lg">
         </i>
        </a>
       </article>
      </div>
     </section>
     <section class="mt-20" id="updates">
      <h3 class="text-3xl font-bold mb-8 text-green-900 border-b-4 border-green-700 inline-block pb-3 tracking-wide">
       Latest Policy Updates
      </h3>
      <ul class="space-y-8 max-w-5xl mx-auto">
       <li class="bg-white rounded-3xl shadow-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between hover:shadow-2xl transition-shadow">
        <div class="flex items-center space-x-6 mb-6 md:mb-0">
         <img alt="Icon representing policy update with a document and megaphone in green tones" class="w-24 h-24 rounded-xl object-cover flex-shrink-0" height="96" src="https://storage.googleapis.com/a1aa/image/c599d249-e09c-4b94-025e-3f55493c0fac.jpg" width="96"/>
         <div>
          <h4 class="text-2xl font-semibold text-green-900 leading-snug">
           New Accessibility Guidelines Released
          </h4>
          <p class="text-green-700 mt-2 max-w-xl text-base leading-relaxed">
           The Department of Social Welfare and Development (DSWD)
                    released updated accessibility guidelines for public
                    buildings to enhance inclusivity.
          </p>
         </div>
        </div>
        <time class="text-green-700 font-semibold whitespace-nowrap text-lg md:text-xl" datetime="2024-06-01">
         June 1, 2024
        </time>
       </li>
       <li class="bg-white rounded-3xl shadow-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between hover:shadow-2xl transition-shadow">
        <div class="flex items-center space-x-6 mb-6 md:mb-0">
         <img alt="Icon representing policy update with a government building and checklist in green tones" class="w-24 h-24 rounded-xl object-cover flex-shrink-0" height="96" src="https://storage.googleapis.com/a1aa/image/ed382331-0338-4afd-c0b6-eb9ca325d188.jpg" width="96"/>
         <div>
          <h4 class="text-2xl font-semibold text-green-900 leading-snug">
           PWD Employment Incentives Expanded
          </h4>
          <p class="text-green-700 mt-2 max-w-xl text-base leading-relaxed">
           New incentives for companies hiring PWDs have been
                    introduced to encourage more inclusive employment practices
                    nationwide.
          </p>
         </div>
        </div>
        <time class="text-green-700 font-semibold whitespace-nowrap text-lg md:text-xl" datetime="2024-05-15">
         May 15, 2024
        </time>
       </li>
       <li class="bg-white rounded-3xl shadow-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between hover:shadow-2xl transition-shadow">
        <div class="flex items-center space-x-6 mb-6 md:mb-0">
         <img alt="Icon representing policy update with a calendar and clock in green tones" class="w-24 h-24 rounded-xl object-cover flex-shrink-0" height="96" src="https://storage.googleapis.com/a1aa/image/9a34f998-a95c-4689-20df-93bd5441fee3.jpg" width="96"/>
         <div>
          <h4 class="text-2xl font-semibold text-green-900 leading-snug">
           Deadline Extended for Accessibility Compliance
          </h4>
          <p class="text-green-700 mt-2 max-w-xl text-base leading-relaxed">
           The government extended the deadline for public and private
                    establishments to comply with accessibility standards by 6
                    months.
          </p>
         </div>
        </div>
        <time class="text-green-700 font-semibold whitespace-nowrap text-lg md:text-xl" datetime="2024-04-30">
         April 30, 2024
        </time>
       </li>
       <li class="bg-white rounded-3xl shadow-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between hover:shadow-2xl transition-shadow">
        <div class="flex items-center space-x-6 mb-6 md:mb-0">
         <img alt="Icon representing policy update with a handshake and agreement document in green tones" class="w-24 h-24 rounded-xl object-cover flex-shrink-0" height="96" src="https://storage.googleapis.com/a1aa/image/f2129466-2646-477f-a64b-75db1dcacd5a.jpg" width="96"/>
         <div>
          <h4 class="text-2xl font-semibold text-green-900 leading-snug">
           New Partnership for PWD Rights Advocacy
          </h4>
          <p class="text-green-700 mt-2 max-w-xl text-base leading-relaxed">
           PWD organizations and government agencies signed a new
                    partnership agreement to strengthen advocacy and support
                    programs.
          </p>
         </div>
        </div>
        <time class="text-green-700 font-semibold whitespace-nowrap text-lg md:text-xl" datetime="2024-04-10">
         April 10, 2024
        </time>
       </li>
       <li class="bg-white rounded-3xl shadow-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between hover:shadow-2xl transition-shadow">
        <div class="flex items-center space-x-6 mb-6 md:mb-0">
         <img alt="Icon representing policy update with a megaphone and speech bubble in green tones" class="w-24 h-24 rounded-xl object-cover flex-shrink-0" height="96" src="https://storage.googleapis.com/a1aa/image/fada6c2d-2628-45f2-6a0f-817ee2339bff.jpg" width="96"/>
         <div>
          <h4 class="text-2xl font-semibold text-green-900 leading-snug">
           Public Consultation on Disability Policies
          </h4>
          <p class="text-green-700 mt-2 max-w-xl text-base leading-relaxed">
           A nationwide public consultation was held to gather feedback
                    on proposed amendments to disability-related policies.
          </p>
         </div>
        </div>
        <time class="text-green-700 font-semibold whitespace-nowrap text-lg md:text-xl" datetime="2024-03-25">
         March 25, 2024
        </time>
       </li>
      </ul>
     </section>
    </main>
    <footer class="bg-green-900 text-green-100 py-10 mt-20 shadow-inner" id="contact">
     <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0">
      <div class="text-center md:text-left max-w-md">
       <h5 class="text-xl font-bold mb-3 tracking-wide">
        Municipality of San Carlos, Pangasinan
       </h5>
       <address class="not-italic text-green-200 leading-relaxed text-sm">
        City Hall, Beside City Health Office
        <br/>
        San Carlos City, Pangasinan
        <br/>
        Philippines 2420
        <br/>
        Phone: (075) 123-4567
        <br/>
        Email: info@sancarlospangasinan.gov.ph
       </address>
      </div>
      <p class="text-sm md:text-base">
       © 2024 PWD Portal. All rights reserved.
      </p>
      <div class="flex space-x-8 text-green-300">
       <a aria-label="Facebook" class="hover:text-green-400 transition" href="#">
        <i class="fab fa-facebook-f fa-lg">
        </i>
       </a>
       <a aria-label="Twitter" class="hover:text-green-400 transition" href="#">
        <i class="fab fa-twitter fa-lg">
        </i>
       </a>
       <a aria-label="LinkedIn" class="hover:text-green-400 transition" href="#">
        <i class="fab fa-linkedin-in fa-lg">
        </i>
       </a>
       <a aria-label="Instagram" class="hover:text-green-400 transition" href="#">
        <i class="fab fa-instagram fa-lg">
        </i>
       </a>
      </div>
     </div>
    </footer>
   </div>
  </div>
  <script>
   const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

    toggleBtn.addEventListener("click", () => {
      if (sidebar.classList.contains("-translate-x-full")) {
        sidebar.classList.remove("-translate-x-full");
        mainContent.classList.add("ml-64");
      } else {
        sidebar.classList.add("-translate-x-full");
        mainContent.classList.remove("ml-64");
      }
    });

    // Close sidebar on window resize if desktop
    window.addEventListener("resize", () => {
      if (window.innerWidth >= 768) {
        sidebar.classList.remove("-translate-x-full");
        mainContent.classList.add("ml-64");
      } else {
        sidebar.classList.add("-translate-x-full");
        mainContent.classList.remove("ml-64");
      }
    });

    // Initialize on load
    if (window.innerWidth >= 768) {
      sidebar.classList.remove("-translate-x-full");
      mainContent.classList.add("ml-64");
    } else {
      sidebar.classList.add("-translate-x-full");
      mainContent.classList.remove("ml-64");
    }
  </script>
 </body>
</html>
