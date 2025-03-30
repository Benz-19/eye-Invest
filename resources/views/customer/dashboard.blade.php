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
    #input-expense{
      display: none;
    }
 
  </style>
</head>

<body class="font-sans bg-gray-100 bod">

  @if (session('success'))
      <div class="bg-green h-fit w-fit text-white-400">
        {{session('success')}}
      </div>
  @endif

  @if (session('error'))
  <div class="bg-red h-fit w-fit text-white-400">
    {{session('error')}}
      </div>
  @endif

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

        <!-- Create a new Track -->
        <div>
          <section class="bg-white p-5 rounded-lg shadow-lg mb-6 flex flex-col items-center">
            <h2 class="text-xl font-bold">Current Salary: <span>${{$salary}}</span></h2>
            <button class="bg-blue-700 text-white py-2 px-6 hover:bg-blue-500">Update Salary</button>
          </section>
          <section class="bg-white p-5 rounded-lg shadow-lg mb-6">
            <h2 class="text-xl font-semibold mb-3">+ Insert new Expense(s)</h2>
            <button class="bg-green-700 text-white py-2 px-6 rounded hover:bg-green-500" id="showInputExpense">Create +</button>
            
            <!-- Overlay Background -->
            <div id="expense-overlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center">
              <div class="bg-white p-7 rounded-lg shadow-lg w-96">
                <h1 class="text-center mb-4">
                  <i>Give your Expense based on the <span class="text-red-600 font-bold">Period</span></i>
                </h1>

                <form action="/createExpense" method="post" class="flex flex-col">
                  @csrf
                  <div class="mb-4">
                    <label class="font-bold">Period:</label>
                    <select name="period" class="w-full border p-2 mt-1">
                      <option value="">---------- Select a period ----------</option>
                      <option value="monthly">Monthly</option>
                      <option value="weekly">Weekly</option>
                      <option value="daily">Daily</option>
                    </select>
                  </div>

                  <div class="mb-4">
                    <label class="font-bold">Amount:</label>
                    <input type="number" name="amount" class="w-full border p-2 mt-1" placeholder="Amount" autocomplete="off">
                  </div>

                  <div class="mb-4">
                    <label class="font-bold">Vendor Name:</label>
                    <input type="text" name="vendor" class="w-full border p-2 mt-1 text-center" placeholder="Where was this amount spent?" autocomplete="off">
                  </div>

                  <i class="text-gray-600">Note: can only specify a <span class="text-red-600">single</span> place</i>

                  <div class="flex justify-between">
                    <!-- Close Button -->
                    <button type="button" id="close-expense-form" class="mt-2 bg-red-500 text-white py-2 px-6 rounded hover:bg-red-700">
                      Close
                    </button>
  
                    <button type="submit" class="mt-2 bg-green-700 text-white p-5 px-6 rounded hover:bg-green-500">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>

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


      const expenseOverlay = document.getElementById("expense-overlay");
      const showExpenseForm = document.getElementById("showInputExpense");
      const closeExpenseForm = document.getElementById("close-expense-form");

    // Show the form overlay when clicking "Create +"
    showExpenseForm.addEventListener("click", function () {
      expenseOverlay.classList.remove("hidden");
      document.body.classList.add("overflow-hidden"); // Prevent scrolling
    });

    // Hide the form overlay when clicking "Close"
    closeExpenseForm.addEventListener("click", function () {
      expenseOverlay.classList.add("hidden");
      document.body.classList.remove("overflow-hidden");
    });

    // Hide overlay if user clicks outside the form
    expenseOverlay.addEventListener("click", function (event) {
      if (event.target === expenseOverlay) {
        expenseOverlay.classList.add("hidden");
        document.body.classList.remove("overflow-hidden");
      }
    });

    
  </script>
</body>

</html>
