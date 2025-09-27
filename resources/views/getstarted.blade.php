<html class="scroll-smooth" lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>PWD Portal Introduction</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: "Inter", sans-serif;
      background: #e6f4ea;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-12 select-none">
  <main
    aria-label="PWD Portal Introduction and Application Process"
    class="relative max-w-5xl w-full bg-white rounded-3xl shadow-2xl p-10 md:p-16 ring-4 ring-green-300 ring-opacity-40"
    role="main"
  >
    <!-- INTRO SECTION -->
    <section
      aria-labelledby="intro-title"
      class="space-y-10"
      id="intro"
      tabindex="0"
    >
      <h1
        class="text-5xl font-extrabold text-green-900 text-center leading-tight drop-shadow-md"
        id="intro-title"
      >
        Welcome to the
        <span class="text-green-700">PWD Portal</span>
      </h1>
      <div class="flex flex-col md:flex-row items-center gap-10 max-w-6xl mx-auto">
        <img
          alt="Illustration showing diverse persons with disabilities engaging in community activities with smiles and support"
          class="rounded-2xl shadow-lg w-full md:w-1/2 object-cover"
          decoding="async"
          height="300"
          loading="lazy"
          src="https://storage.googleapis.com/a1aa/image/f4073df1-c7a7-45a1-9688-e25c3823fcef.jpg"
          width="400"
        />
        <div class="text-green-800 space-y-6 md:w-1/2">
          <p class="text-lg leading-relaxed tracking-wide">
            Our
            <span class="font-semibold text-green-700">PWD Portal</span> is a
            dedicated platform designed to empower Persons With Disabilities by
            providing seamless access to essential services, real-time
            analytics, and a transparent application process. We strive to
            bridge gaps and foster inclusivity through technology.
          </p>
          <div>
            <h2
              class="text-2xl font-bold mb-3 border-l-4 border-green-600 pl-4 drop-shadow-sm"
            >
              Purpose of the System
            </h2>
            <ul
              class="list-disc list-inside space-y-2 text-green-700 text-base leading-relaxed"
            >
              <li>Deliver insightful analytics on PWD demographics and service utilization.</li>
              <li>Streamline benefit applications with a user-friendly digital process.</li>
              <li>Enhance transparency and accountability in service delivery.</li>
              <li>Provide a centralized hub for resources, updates, and support.</li>
            </ul>
          </div>
          <div>
            <h2
              class="text-2xl font-bold mb-3 border-l-4 border-green-600 pl-4 drop-shadow-sm"
            >
              Core Functionalities
            </h2>
            <ul
              class="list-disc list-inside space-y-2 text-green-700 text-base leading-relaxed"
            >
              <li>Intuitive online application and document upload system.</li>
              <li>Eligibility verification powered by government standards.</li>
              <li>Dynamic dashboard with real-time analytics for administrators.</li>
              <li>Automated notifications for application status and renewals.</li>
              <li>Comprehensive resource center tailored for PWD needs.</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex justify-center mt-12 space-x-6">
        <button
          aria-label="Next: Application Process and Eligibility Criteria"
          class="group flex items-center space-x-3 bg-green-700 hover:bg-green-800 focus:bg-green-900 text-white font-semibold px-8 py-4 rounded-full shadow-xl transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-400"
          id="nextBtn"
        >
          <span class="text-lg tracking-wide">Next</span>
          <i
            aria-hidden="true"
            class="fas fa-arrow-right text-xl transform group-hover:translate-x-2 transition-transform duration-300"
          ></i>
        </button>
        <button
          aria-label="Go to Portal and show Get Started section"
          class="group flex items-center space-x-3 bg-green-600 hover:bg-green-700 focus:bg-green-800 text-white font-semibold px-8 py-4 rounded-full shadow-xl transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-400"
          id="goToPortalBtn"
          type="button"
        >
          <span class="text-lg tracking-wide">Go to Portal</span>
          <i aria-hidden="true" class="fas fa-door-open text-xl"></i>
        </button>
      </div>
    </section>

    <!-- PROCESS SECTION -->
    <section
      aria-labelledby="process-title"
      class="hidden space-y-10"
      id="process"
      tabindex="0"
    >
      <h1
        class="text-5xl font-extrabold text-green-900 text-center leading-tight drop-shadow-md"
        id="process-title"
      >
        Application Process &amp; Eligibility Criteria
      </h1>
      <p
        class="max-w-4xl mx-auto text-green-800 text-lg leading-relaxed tracking-wide text-center"
      >
        Navigating the path to access your rightful benefits has never been
        easier. Follow the clear steps below to apply, and understand the
        eligibility requirements to ensure a smooth approval.
      </p>
      <div
        class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 text-green-700"
      >
        <article aria-label="Step-by-step application process" class="space-y-6">
          <h2
            class="text-3xl font-bold text-green-800 border-b-4 border-green-600 pb-2 drop-shadow-sm"
          >
            How to Apply
          </h2>
          <ol class="list-decimal list-inside space-y-4 text-lg leading-relaxed">
            <li>
              <strong>Create your account:</strong> Register with your valid
              email and personal details to start your journey.
            </li>
            <li>
              <strong>Complete the application form:</strong> Provide accurate
              information about your disability and upload supporting documents.
            </li>
            <li>
              <strong>Submit required documents:</strong> Upload medical
              certificates, valid IDs, and proof of residency securely.
            </li>
            <li>
              <strong>Verification process:</strong> Our dedicated team reviews
              your submission to confirm eligibility.
            </li>
            <li>
              <strong>Receive status updates:</strong> Stay informed with
              real-time notifications via email or SMS.
            </li>
            <li>
              <strong>Access your benefits:</strong> Once approved, enjoy your
              entitled services and support through the portal.
            </li>
          </ol>
        </article>
        <article aria-label="Eligibility criteria and benefits" class="space-y-6">
          <h2
            class="text-3xl font-bold text-green-800 border-b-4 border-green-600 pb-2 drop-shadow-sm"
          >
            Eligibility &amp; Benefits
          </h2>
          <div>
            <h3 class="text-2xl font-semibold mb-3">Eligibility Criteria</h3>
            <ul class="list-disc list-inside space-y-3 text-lg leading-relaxed">
              <li>Must be a citizen or legal resident of the country.</li>
              <li>Possess a certified disability as recognized by government authorities.</li>
              <li>Provide valid medical and identification documents.</li>
              <li>Not currently receiving duplicate benefits from other government programs.</li>
              <li>Comply with any additional local government requirements.</li>
            </ul>
          </div>
          <div>
            <h3 class="text-2xl font-semibold mt-8 mb-3">Benefits of Applying</h3>
            <ul class="list-disc list-inside space-y-3 text-lg leading-relaxed">
              <li>Access to exclusive government subsidies and discounts.</li>
              <li>Priority healthcare and social service access.</li>
              <li>Eligibility for livelihood, education, and training programs.</li>
              <li>Timely reminders for renewals and important updates.</li>
              <li>Dedicated support and resources tailored to your needs.</li>
            </ul>
          </div>
        </article>
      </div>
      <div class="flex justify-center mt-14 space-x-8">
        <button
          aria-label="Previous: Introduction"
          class="group flex items-center space-x-3 bg-green-700 hover:bg-green-800 focus:bg-green-900 text-white font-semibold px-8 py-4 rounded-full shadow-xl transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-400"
          id="prevBtn"
        >
          <i
            aria-hidden="true"
            class="fas fa-arrow-left text-xl transform group-hover:-translate-x-2 transition-transform duration-300"
          ></i>
          <span class="text-lg tracking-wide">Back</span>
        </button>
      </div>
    </section>
  </main>

  <!-- GET STARTED CARD (initially hidden) -->
  <div
    class="card max-w-md w-full bg-white rounded-3xl shadow-2xl p-8 mt-12 ring-4 ring-green-300 ring-opacity-40 text-center select-none hidden"
    id="getStartedCard"
    tabindex="0"
  >
    <h1 class="text-3xl font-extrabold text-green-900 mb-4">
      Welcome to the PWD Portal with Analytics
    </h1>
    <p class="text-green-800 text-lg mb-8">
      Empowering persons with disabilities through a centralized system and
      smart analytics.
    </p>
    <a
      href="{{ route('logupchoose') }}"
      class="inline-block bg-green-700 hover:bg-green-800 focus:bg-green-900 text-white font-semibold px-8 py-4 rounded-full shadow-xl transition duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-400"
      aria-label="Get Started with PWD Portal"
    >
      🚀 Get Started
    </a>
  </div>

  <script>
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const introSection = document.getElementById("intro");
    const processSection = document.getElementById("process");
    const goToPortalBtn = document.getElementById("goToPortalBtn");
    const getStartedCard = document.getElementById("getStartedCard");

    nextBtn.addEventListener("click", () => {
      introSection.classList.add("hidden");
      processSection.classList.remove("hidden");
      getStartedCard.classList.add("hidden");
      processSection.focus();
      window.scrollTo({ top: processSection.offsetTop - 20, behavior: "smooth" });
    });

    prevBtn.addEventListener("click", () => {
      processSection.classList.add("hidden");
      introSection.classList.remove("hidden");
      getStartedCard.classList.add("hidden");
      introSection.focus();
      window.scrollTo({ top: introSection.offsetTop - 20, behavior: "smooth" });
    });

    goToPortalBtn.addEventListener("click", () => {
      introSection.classList.add("hidden");
      processSection.classList.add("hidden");
      getStartedCard.classList.remove("hidden");
      getStartedCard.focus();
      window.scrollTo({ top: getStartedCard.offsetTop - 20, behavior: "smooth" });
    });
  </script>
</body>
</html>