<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eye-Invest Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .circle {
      transition: stroke-dasharray 9s ease-in-out;
    }
  </style>
</head>

<body class="font-sans bg-gray-100">

  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-800 text-white p-5">
      <h2 class="text-xl font-semibold">Eye-Invest Dashboard</h2>
      <nav class="mt-10">
        <ul>
          <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Dashboard</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Savings History</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Settings</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
    <div class="flex justify-between mb-5">
        <h1 class="text-3xl font-semibold mb-5">Welcome to Eye-Invest</h1>
        <a href="{{url('/logout')}}">
            <button class="bg-red-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700">Logout</button>
        </a>
    </div>
    
    <!-- Savings Progress -->
    <section class="bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-3">Savings Progress</h2>
        
        <!-- Circle Progress (Speedometer) -->
        <div class="flex justify-center items-center">
            <svg class="w-40 h-40" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
            <circle class="circle" cx="60" cy="60" r="50" stroke="#e2e8f0" stroke-width="10" fill="none" />
            <circle class="circle" cx="60" cy="60" r="50" stroke="#48bb78" stroke-width="10" fill="none" stroke-dasharray="314" stroke-dashoffset="314" id="progressCircle" />
            </svg>
        </div>

        <p class="mt-3 text-center" id="progressText"></p>
        </section>

      <!-- Savings History -->
      <section class="bg-white p-5 rounded-lg shadow-lg mb-6">
        <h2 class="text-xl font-semibold mb-3">Previous Savings History</h2>
        <table class="w-full text-sm text-left">
          <thead class="bg-gray-200">
            <tr>
              <th class="px-4 py-2">Date</th>
              <th class="px-4 py-2">Amount Saved</th>
              <th class="px-4 py-2">Target</th>
              <th class="px-4 py-2">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t">
              <td class="px-4 py-2">2025-03-20</td>
              <td class="px-4 py-2">$500</td>
              <td class="px-4 py-2">$600</td>
              <td class="px-4 py-2 text-red-500">Need to Save More</td>
            </tr>
            <tr class="border-t">
              <td class="px-4 py-2">2025-03-18</td>
              <td class="px-4 py-2">$750</td>
              <td class="px-4 py-2">$700</td>
              <td class="px-4 py-2 text-green-500">Goal Achieved</td>
            </tr>
          </tbody>
        </table>
      </section>

      <!-- Savings Check Options -->
      <section class="bg-white p-5 rounded-lg shadow-lg mb-6">
        <h2 class="text-xl font-semibold mb-3">Check Savings</h2>
        <div class="flex space-x-4">
          <button class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700">Daily Check</button>
          <button class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700">Weekly Check</button>
          <button class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700">Monthly Check</button>
        </div>
      </section>

      <!-- Financial Insights -->
      <section class="bg-white p-5 rounded-lg shadow-lg mb-6">
        <h2 class="text-xl font-semibold mb-3">Financial Insights</h2>
        <p>Your spending habits indicate that you are saving sufficiently, but you could increase your savings by cutting back on unnecessary subscriptions.</p>
      </section>
    </main>
  </div>

  <script>
    // Percentage to animate
    const percentage = 75; // Change this value to reflect actual progress

    const circle = document.getElementById('progressCircle');
    const radius = circle.r.baseVal.value;
    const circumference = 2 * Math.PI * radius;
    const offset = circumference + (percentage / 100) * circumference;

    // Set initial state
    circle.style.strokeDashoffset = circumference;

    // Animate the circle (slowly)
    setTimeout(() => {
      circle.style.strokeDashoffset = offset;
      document.getElementById('progressText').innerText = `${percentage}% towards your savings goal for the month!`;
    }, 2000);
  </script>
</body>

</html>
